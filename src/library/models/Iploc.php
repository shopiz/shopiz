<?php

class Iploc extends \OKGJ\Base\Model
{
    protected $tableName = "region";
	
	protected static $_dicts = null;
	
	protected static $_region = null;
	
	public function __construct()
	{
        //
	}
	
	public function getRegionByIp($userIp, $allowCache = true)
	{
		$ip_prefix_length = $this->config->setting['iploc']['cacheKeyPrefixLength'];
		$ip_prefix = intval(substr(str_pad($userIp, 10, '0', STR_PAD_LEFT), 0, $ip_prefix_length));
		$ip_start = $ip_prefix * pow(10, 10 - $ip_prefix_length);
		$ip_end = ($ip_prefix + 1) * pow(10, 10 - $ip_prefix_length)-1;
		
		$s_cache_key = "shopiz::iploc::region::ip::{$userIp}";
		$m_cache_key = "shopiz::iploc::region::ip::prefix::{$ip_prefix}";
		if($allowCache && $this->cache) {
			/*
            $result = $this->memcache->get($s_cache_key);
			if($result !== false) {
				return unserialize($result, true);
			}*/
			
			//
			$result = $this->cache->get($m_cache_key);
			if($result !== false) {
				$result = unserialize($result);
				
				$region_id = 0;
				$ip_net_type = '';
				foreach($result as $k=>$v) {
					if($v[0]<=$userIp && $v[1]>=$userIp) {
						$region_id = $v[2];
						$ip_net_type = $v[3];
						break;
					}
				}
				
				if($region_id > 0) {
					//
					$result = array(
						'ip' => long2ip($userIp),
						'id' => $region_id,
						'code' => $this->getWeatherCodeById($region_id),
						'region' => $this->getRegionPath($region_id),
						'type' => $ip_net_type,
					);
					//$this->memcache->set($s_cache_key, $result);
					
					return $result;
				} else {
					//
				}
			}
		}
		
		return null;
	}
	
	public function getWeatherCodeById($regionId)
	{
		if($this->_region === null) {
			$this->_region = $this->getRegionByCache();
		}
		
		$weather_code = '';
		foreach($this->_region as $k=>$v) {
			if($v['region_id'] == $regionId) {
				if($v['weather_code'] == '' && $v['parent_id']>0) {
					$weather_code = $this->getWeatherCodeById($v['parent_id']);
				} else {
					$weather_code = $v['weather_code'];
				}
				break;
			}
		}
		
		return $weather_code;
	}
	
	public function getRegionPath($regionId)
	{
		if($this->_region === null) {
			$this->_region = $this->getRegionByCache();
		}
		
		$ret = array();
		if(isset($this->_region[$regionId])) {
			$region_nodes = $this->_region[$regionId]['region_nodes'];
			if($region_nodes != '') {
				$region_nodes = explode(',', $region_nodes);
				foreach($region_nodes as $k=>$v) {
					if(isset($this->_region[$v])) {
						$ret[] = $this->_region[$v]['region_name'];
					}
				}
			}
			$ret[] = $this->_region[$regionId]['region_name'];
		}
		
		return $ret;
	}
	
	public function getRegionByCache()
	{
		if($this->_region !== null) {
			return $this->_region;
		}
		
		if($this->cache) {
			$_cache_key = "shopiz::iploc::region";
			$this->_region = $this->cache->get($_cache_key);
			if($this->_region !== false) {
				$this->_region = unserialize($this->_region);
				return $this->_region;
			}
		}
		
		$this->_region = $this->read_region_array();
		if($this->cache) {
			$this->cache->set($_cache_key, serialize($this->_region));
		}
		unset($_cache_key);
		
		return $this->_region;
	}
	
	public function readRegionArray()
	{
		$_sql = "SELECT region_id, region_name, parent_id, region_level, region_nodes, weather_code
				FROM {{region}}
				WHERE region_level<:region_level
				ORDER BY parent_id ASC, region_rank ASC";
		$stmt = $this->db->prepare($_sql);
		$stmt->bindValue(':region_level', 4);
        $stmt->execute();
		$_r = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$_region = array();
		foreach($_r as $k=>$v) {
			$_region[$v['region_id']] = $v;
		}
		unset($_sql, $stmt, $_r, $k, $v);
		
		return $_region;
	}
	
	public function initRegion()
	{
		//
        $this->db->query('TRUNCATE shopiz_iploc_region;');
		
		//
		$regionIniFile = APP_PATH . '/ipdata/cn_region_list.txt';
		$regionIniContent = file_get_contents($regionIniFile);
		
		//国家
		$_r = preg_split('/\[(.+?)\]\r\n/', $regionIniContent, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
		$_parent_country_id = 0;
		$_region_country_rank = 1;
		for($i=0, $j=count($_r); $i<$j; $i+=2) {
			//
			$_sql = "INSERT INTO {{region}}(region_id, parent_id, region_name, region_level, region_nodes, weather_code, is_show, region_rank)
					VALUES(:region_id, :parent_id, :region_name, :region_level, :region_nodes, :weather_code, :is_show, :region_rank)";
			$stmt = $this->db->prepare($_sql);
			$stmt->bindValue(':region_id', 0);
			$stmt->bindValue(':parent_id', 0);
			$stmt->bindValue(':region_name', $_r[$i]);
			$stmt->bindValue(':region_level', 1);
			$stmt->bindValue(':region_nodes', '');
			$stmt->bindValue(':weather_code', '');
			$stmt->bindValue(':is_show', 1);
			$stmt->bindValue(':region_rank', $_region_country_rank++);
			$stmt->execute();
			
			if(!isset($_r[$i+1]) || trim($_r[$i+1], "\r\n") == '') {
				continue;
			}
			
			//省份
			$__r = preg_split('/\#(.+?)\#\r\n/', $_r[$i+1], -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
			$_parent_province_id = $this->db->getLastInsertID();
			$_region_province_rank = 1;
			for($k=0, $l=count($__r); $k<$l; $k+=2) {
				//
				$sql = "INSERT INTO {{region}}(region_id, parent_id, region_name, region_level, region_nodes, weather_code, is_show, region_rank)
						VALUES(:region_id, :parent_province_id, :region_name, :region_level, :region_nodes, :weather_code, :is_show, :region_rank)";
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(':region_id', 0);
				$stmt->bindValue(':parent_province_id', $_parent_province_id);
				$stmt->bindValue(':region_name', $__r[$k]);
				$stmt->bindValue(':region_level', 2);
				$stmt->bindValue(':region_nodes', "{$_parent_province_id}");
				$stmt->bindValue(':weather_code', '');
				$stmt->bindValue(':is_show', 1);
				$stmt->bindValue(':region_rank', $_region_province_rank++);
				$stmt->execute();
			
				if(!isset($__r[$i+1]) || trim($__r[$i+1], "\r\n") == '') {
					continue;
				}
				
				//城市
				$_parent_city_id = $this->db->getLastInsertID();
				$_region_city_rank = 1;
				$___r = preg_split('/\*(.+?)\*\r\n/', $__r[$k+1], -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				for($m=0, $n=count($___r); $m<$n; $m+=2) {
					//市
					$sql = "INSERT INTO {{region}}(region_id, parent_id, region_name, region_level, region_nodes, weather_code, is_show, region_rank)
						VALUES(:region_id, :parent_province_id, :region_name, :region_level, :region_nodes, :weather_code, :is_show, :region_rank)";
					$stmt = $this->db->prepare($sql);
					$stmt->bindValue(':region_id', 0);
					$stmt->bindValue(':parent_province_id', $_parent_city_id);
					$stmt->bindValue(':region_name', $___r[$m]);
					$stmt->bindValue(':region_level', 3);
					$stmt->bindValue(':region_nodes', "{$_parent_province_id},{$_parent_city_id}");
					$stmt->bindValue(':weather_code', '');
					$stmt->bindValue(':is_show', 1);
					$stmt->bindValue(':region_rank', $_region_city_rank++);
					$stmt->execute();
			
					if(!isset($___r[$i+1]) || trim($___r[$i+1], "\r\n") == '') {
						continue;
					}
					
					//地区
					$_parent_area_id = $this->db->getLastInsertID();
					$_region_area_rank = 1;
					$____r = preg_split('/\r\n/', $___r[$m+1], -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
					foreach($____r as $____k=>$____v) {
						if($____v == '') {
							continue;
						}
						
						$_sql = "INSERT INTO {{region}}(region_id, parent_id, region_name, region_level, region_nodes, weather_code, is_show, region_rank)
							VALUES(:region_id, :parent_province_id, :region_name, :region_level, :region_nodes, :weather_code, :is_show, :region_rank)";
						$stmt = $this->db->prepare($sql);
						$stmt->bindValue(':region_id', 0);
						$stmt->bindValue(':parent_province_id', $_parent_area_id);
						$stmt->bindValue(':region_name', $____v);
						$stmt->bindValue(':region_level', 4);
						$stmt->bindValue(':region_nodes', "{$_parent_province_id},{$_parent_city_id},{$_parent_area_id}");
						$stmt->bindValue(':weather_code', '');
						$stmt->bindValue(':is_show', 1);
						$stmt->bindValue(':region_rank', $_region_area_rank++);
						$stmt->execute();
						
						unset($stmt, $_sql);
					}
				}
			}
		}
		
	}
	
	public function initWeatherCode()
	{
		//
		$region_code_file = APP_PATH . '/ipdata/weather_code.txt';
		$region_code_content = file_get_contents($region_code_file);
		//
		$result = preg_split('/\r\n/', $region_code_content, -1, PREG_SPLIT_NO_EMPTY);
		
		foreach($result as $k=>$v) {
			//
			list($weather_code, $region_name) = preg_split('/ +|[\t+]/', $v, -1, PREG_SPLIT_NO_EMPTY);
			
			$sql = "SELECT region_id FROM {{region}} WHERE region_name=:region_name ORDER BY region_level DESC LIMIT 1";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(':region_name', $region_name);
			$stmt->execute();
			$region_id = $stmt->fetchColumn();
			if($region_id) {
				$sql = "UPDATE {{region}} SET weather_code=:weather_code WHERE region_id=:region_id";
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(':weather_code', $weather_code);
				$stmt->bindValue(':region_id', $region_id);
				$stmt->execute();
			}
		}
		
	}
	
	public function initRegionIp($page = 1)
	{
		$ip_wry_file = APP_PATH . '/ipdata/qqwry.dat';
		
		$chunks     = 100;
		$chunk_size = 100;
		$page       = intval($page)>0 ? intval($page) : 1;
		
		if($page == 1) {
			$ip_wry_ary = file($ip_wry_file);
			$this->queue->del('shopiz::iploc::ips');
			
			foreach($ip_wry_ary as $k=>$v) {
				$this->queue->lpush('shopiz::iploc::ips', $v);
                /*
                if ($k > 1000) {
                    break;
                }*/
			}
		}
		
		for($i=0, $j = 0; $i < $chunks; ) {
			if($j % $chunk_size == 0) {
				$sql = "INSERT INTO {{region_ip}}(`id`, `ip_start`, `ip_end`, `region_id`, `nettype`, `region_remark`, `manual`, `lasttime`, `dateline`) VALUES";
				$params = array();
			}
			//
			$region = $this->queue->lpop('shopiz::iploc::ips');
			
			$region = mb_convert_encoding($region, 'UTF-8', 'GBK');
			
			$region_ary = preg_split('/( +)/', $region);
			$ip_start   = hexdec(dechex(ip2long($region_ary[0])));
			$ip_end     = hexdec(dechex(ip2long($region_ary[1])));
			$country    = isset($region_ary[2]) ? $region_ary[2] : '';
			$area       = isset($region_ary[3]) ? trim($region_ary[3]) : '';
			$nettype    = isset($region_ary[3]) && preg_match('/电信|网通|联通|铁通|长城宽带|天威|教育网/', $region_ary[3], $ret) ? $ret[0] : '';
			
			$region_id = $this->get_region_id($country);
			if($region_id != 0) {
				//
				$sql .= "(:id_{$j}, :ip_start_{$j}, :ip_end_{$j}, :region_id_{$j}, :nettype_{$j}, :region_remark_{$j}, :manual_{$j}, :lasttime_{$j}, :dateline_{$j}),";
				
				$params[":id_{$j}"] = 0;
				$params[":ip_start_{$j}"]      = $ip_start;
				$params[":ip_end_{$j}"]        = $ip_end;
				$params[":region_id_{$j}"]     = $region_id;
				$params[":nettype_{$j}"]       = $nettype;
				$params[":region_remark_{$j}"] = $area;
				$params[":manual_{$j}"]        = 0;
				$params[":lasttime_{$j}"]      = $_SERVER['REQUEST_TIME'];
				$params[":dateline_{$j}"]      = $_SERVER['REQUEST_TIME'];
				$j ++;
				//$stmt->execute();
				//unset($stmt, $_sql);
			} else {
				//echo $_country, ', ', $_area, ', ', $_region_ary[0], '(', $_ip_start, '), ', $_region_ary[1], '(', $_ip_end, ')<br />';
				//ob_flush();
			}
			
			//
			$ips_queue_len = $this->queue->llen('shopiz::iploc::ips');
			if($j % $chunk_size == $chunk_size-1 || $ips_queue_len == 0) {
				if($j > 0) {
					$sql = trim($sql, ',');
                    $stmt = $this->db->prepare($sql);
					$flag = $stmt->execute($params);
					//echo $i, ': ', $_flag ? '成功' : '失败', '<br />';
				}
				
				// End
				if($ips_queue_len == 0) {
					break;
				}
				
				// Init
				$params = array();
				$i++;
				$j = 0;
			}
		}
		
		if($this->queue->llen('shopiz::iploc::ips') > 0) {
			$redirect_url = '/Ip/InitDB/page/'.($page+1);
			header("Content-Type: text/html; charset=utf-8");
			echo "
				第{$_page}页生成完成！
				<script type=\"text/javascript\">
				<!--
					setTimeout(function(){
							window.location.href = '{$redirect_url}';
						},
						3000);
				//-->
				</script>
				";
		} else {
			//
			echo 'init region ip ok...', "\r\n<br />";
		}
	}
	
	/**
	 * 根据分词取地区ID
	 * 
	 */
	public function getRegionId($country)
	{
		if($country == '') return 0;
		$region_ary = $this->splitWord($country);
		unset($country);
		//rsort($_region_ary);
		
		$sql = "SELECT region_id FROM {{region}} WHERE region_level<4";
		$params = array();
		$sql_addons = '';
		foreach($region_ary as $k=>$v) {
			$sql_addons .= (($sql_addons == '') ? '' : ' OR' ) . " region_name=:region_name_${k}";
			$params[":region_name_${_k}"] = $v; 
		}
		unset($region_ary, $k, $v);
		$sql .= " AND ({$sql_addons}) ORDER BY region_level DESC";
		$stmt = $this->db->prepare($sql);
		foreach($params as $k=>$v) {
			$stmt->bindValue($k, $v);
		}
		$stmt->execute();
		$region_id = $stmt->fetchColumn();
		if(!$region_id) {
			$region_id = 0;
		}
		unset($sql, $params, $k, $v, $stmt);
		
		return $region_id;
	}
	
	public function splitWord($waitSplitWord)
	{
		if (empty($waitSplitWord)) return array();
		
		if ($this->_dicts === null) {
			$sql = "SELECT region_name FROM {{region}}";
			$stmt = $this->db->prepare($sql);
            $stmt->execute();
            $this->_dicts = array();
            while ($this->_dicts[] = $stmt->fetchColumn()){};
            //var_dump($this->_dicts);exit;
            if (!$this->_dicts) {
				$this->_dicts = array();
			}
			unset($sql, $stmt);
		}
		
		$split_word = array();
		foreach($this->_dicts as $k=>$v) {
			if(strpos($waitSplitWord, $v) !== false) {
				$split_word[] = $v;
				$wait_words = explode($v, $waitSplitWord);
				for($i=0, $count=count($wait_words); $i<$count; $i++) {
					if($wait_words[$i] == '') continue;
					$split_word = array_merge($split_word, $this->splitWord($_wait_words[$i]));
				}
				unset($i, $count, $wait_words);
				break;
			}
		}
		
		if(empty($split_word)) {
			$split_word[] = $waitSplitWord;
		}
		
		foreach($split_word as $k=>$v) {
			if($v == '省' || $v == '市' || $v == '州' || $v == '区' || $v == '县') {
				unset($split_word[$k]);
			}
		}
		unset($k, $v);
		
		return $split_word;
	}
	
	public function buildCache($data = array(), $deepth = 1)
	{
		if ($deepth == 1) {
			$cache_content = "<?php\r\n\r\n/*\r\n * Create By Write Cache Function\r\n * Builder In {$_SERVER['REQUEST_TIME']}\r\n *\r\n*/\r\n\r\n\treturn Array(\r\n";
		} else {
			$cache_content = "";
		}

		if (is_array($data)) {
			
			foreach ($data as $k=>$v) {
				if(is_array($v)) {
					$cache_content .= str_repeat("\t", $deepth+1) . "'{$k}' => Array(\r\n";
					$cache_content .= $this->buildCache($v, $deepth+1);
					$cache_content .= str_repeat("\t", $deepth+1) . "),\r\n";
				} else if(is_numeric($v)) {
					$cache_content .= str_repeat("\t", $deepth+1) . "'{$k}' => {$v},\r\n";
				} else if(is_bool($v)) {
					$cache_content .= str_repeat("\t", $deepth+1) . "'{$k}' => " . ($v ? 'true' : 'false') . ",\r\n";
				} else if(is_string($v)) {
					$cache_content .= str_repeat("\t", $deepth+1) . "'{$k}' => '{$v}',\r\n";
				}
			}
		}
		
		if($deepth == 1) {
			$cache_content .= "\r\n\t);\r\n?>";
		}
		
		
		return $cache_content;
	}
	
	public function writeCache($cacheKey, $content)
	{
		//
		$cache_file = $this->signCacheFile($cacheKey);
		if(file_exists($cache_file)) {
			@unlink($cache_file);
		}
		file_put_contents($cache_file, $content);
	}
	
	public function signCacheFile($cacheKey)
	{
		$base_dir = APP_PATH . '/cache';
		$cache_dir = $base_dir . DIRECTORY_SEPARATOR . substr($cacheKey, 0, 2) . DIRECTORY_SEPARATOR;
		$this->init_cache_dir($cache_dir);
		$cache_file = "{$cache_dir}{$cacheKey}.cache.php";
		
		return $cache_file;
	}
	
	public function initCacheDir($cacheDir)
	{
		if(!file_exists($cacheDir) || !is_dir($cacheDir)) {
			$parent_dir = dirname($cacheDir);
			if(!file_exists($parent_dir) || !is_dir($parent_dir)) {
				$this->initCacheDir($parent_dir);
			}
			@mkdir($cacheDir);
		}
	}
}
