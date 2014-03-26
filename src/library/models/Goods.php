<?php

/**
 * 
 * @author Jacky Zhang <myself.fervor@gmail.com>
 * @version $Id activity_share.php Jun 20, 2013 $
 * @copyright 2012-2013 欧凯管家 <http://www.okgj.com>
 */


class Goods extends \OKGJ\Base\Model
{
    protected $tableName = "goods";
    
    public function getRegionInfo($region_id)
    {
        $sql = "SELECT shop_id, shop_name, enabled, lasttime, dateline
                FROM {$this->tableName}
                WHERE shop_id=:shop_id AND is_delete=0";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':shop_id', $shop_id);
        $stmt->execute();
        $shopInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $shopInfo;
    }
}