<?php
namespace Import;

class TaobaoController extends \BaseController
{
    private $_sessionKey = '6101607b08b33df1a4da9bc126d6784fd4f8f1136506caa2074082786';

    public function indexAction()
    {
        // $sessionKey = '6101607b08b33df1a4da9bc126d6784fd4f8f1136506caa2074082786';
        /**
         * session: 6101923c8e08ae018deae939495ff5d1c38f3a219f0200584436708
         * refresh_token: 61014239f96a079d7c3ae82397cc1a01547d01f8848452e84436708
         */
        // $sessionKey = '6101923c8e08ae018deae939495ff5d1c38f3a219f0200584436708';
        // $userNick   = 'n百万';

    	// // $shop = new \Taobao\Shop();
    	// $items = new \Taobao\Shop\Items();


        // $item_list = $items->getInventoryList($sessionKey);
        // print_r($item_list);
        // exit;

        // $item_list = $items->getOnsaleList($sessionKey);
        // print_r($item_list);
        // exit;

        // $item_info = $items->getItemInfo($sessionKey, 2100508935783);
        // print_r($item_info);
        // exit;

        // $item_list = $items->getMultiItemInfo($sessionKey, '2100509624052,2100505125288,2100503045831');
        // print_r($item_list);
        // exit;



        // $category->getShopCategoryList();

        // $categoryInfo = array(
        //     'name' => '测试类目',
        //     'pic_url' => '',
        //     'parent_cid' => 0,
        //     'sort_order' => 0,
        // );
        // $category->addCategory($sessionKey, $categoryInfo);


        // $categoryInfo = array(
        //     'cid' => 410139930,
        //     'name' => '测试类目',
        //     'pic_url' => '',
        //     'sort_order' => 0,
        // );
        // $category->updateCategory($sessionKey, $categoryInfo);

        // $category = new \Taobao\Category();
        // // $category->getAuthorizeCategoryList($sessionKey);
        // // exit;

        // $category->getItemCategoryList(0);


        // $params = array(
        //     'cid' => 50012081,
        // );
        // $category->getItemPropList($sessionKey, $params);

        // exit;
    }

    public function categoryAction()
    {
        $category = new \Api\Taobao\Category();

        $parent_cids = array(0);
        do {
            $cids = array();
            foreach ($parent_cids as $parent_cid) {
                $category_list = $category->getItemCategoryList($parent_cid);

                if ($category_list['status'] == 1) {
                    foreach ($category_list['result'] as $k => $v) {
                        $sql = "INSERT INTO taobao_category(cid, parent_cid, name, is_parent, status, sort_order, lasttime)
                                VALUES(:cid, :parent_cid, :name, :is_parent, :status, :sort_order, :lasttime)
                                ON DUPLICATE KEY UPDATE parent_cid=:parent_cid, name=:name, is_parent=:is_parent, status=:status, sort_order=:sort_order, lasttime=:lasttime";

                        $params = array(
                                ':cid' => $v['cid'],
                                ':parent_cid' => $v['parent_cid'],
                                ':name' => $v['name'],
                                ':is_parent' => !!$v['is_parent'] ? 1 : 0,
                                ':status' => $v['status'],
                                ':sort_order' => $v['sort_order'],
                                ':lasttime' => $_SERVER['REQUEST_TIME'],
                            );
                        $this->db->query($sql, $params);

                        if ($v['is_parent'] == 'true') {
                            $cids[] = $v['cid'];
                        }
                    }
                }
            }

            $parent_cids = $cids;
        } while (!empty($parent_cids));


        echo \Api\Taobao\TopClient::$callTimes, ", success";
        exit;
    }

    public function propsAction()
    {
        $category = new \Taobao\Category();
        $categoryList = $category->getCategoryList(0, 2);
        $category = new \Api\Taobao\Category();

        // $propList = array();
        // $categoryList = new \Taobao\Category()->getCategoryList(0, 2);
        $sTime = microtime(true);
        $sNum = 0;
        foreach ($categoryList as $k1 => $v1) {
            if ($v['is_parent'] != 'true') {
                $cid = $v1['cid'];
                $params = array(
                    'cid' => $cid,
                );
                $propList = $category->getItemPropList($this->_sessionKey, $params);

                if ($propList['status'] == 1) {
                    $propNumber = 0;
                    foreach ($propList['result'] as $k2 =>$v2) {
                        // print_r($v2);
                        // if (empty($v2)) {
                        if (!isset($v2['pid'])) {
                            print_r($v2);
                            echo 1, '<br />';
                            continue;
                        }
                        $sql = "INSERT INTO taobao_category_prop(pid, cid, parent_pid, parent_vid, name, must, multi, features, prop_values, child_template, is_input_prop, is_key_prop, is_sale_prop, is_color_prop, is_enum_prop, is_item_prop, is_allow_alias, status, sort_order, lasttime)
                                VALUES(:pid, :cid, :parent_pid, :parent_pid, :name, :must, :multi, :features, :prop_values, :child_template, :is_input_prop, :is_key_prop, :is_sale_prop, :is_color_prop, :is_enum_prop, :is_item_prop, :is_allow_alias, :status, :sort_order, :lasttime)
                                ON DUPLICATE KEY
                                UPDATE cid=:cid, parent_pid=:parent_pid, parent_vid=:parent_vid, name=:name, must=:must, multi=:multi, features=:features, prop_values=:prop_values, child_template=:child_template,
                                    is_input_prop=:is_input_prop, is_key_prop=:is_key_prop, is_sale_prop=:is_sale_prop, is_color_prop=:is_color_prop, is_enum_prop=:is_enum_prop, is_item_prop=:is_item_prop, is_allow_alias=:is_allow_alias,
                                    status=:status, sort_order=:sort_order, lasttime=:lasttime";

                        // if (!isset($v2['pid'])) {
                        //     print_r($v2);exit;
                        // }
                        $params = array(
                                ':pid' => $v2['pid'],
                                ':cid' => $cid,
                                ':parent_pid' => isset($v2['parent_pid']) ? $v2['parent_pid'] : 0,
                                ':parent_vid' => isset($v2['parent_pid']) ? $v2['parent_pid'] : 0,
                                ':name' => $v2['name'],
                                ':must' => !!$v2['must'] ? 1 : 0,
                                ':multi' => !!$v2['multi'] ? 1 : 0,
                                ':features' => isset($v2['features']) ? serialize($v2['features']) : '',
                                ':prop_values' => isset($v2['prop_values']) ? serialize($v2['prop_values']) : '',
                                ':child_template' => isset($v2['child_template']) ? serialize($v2['child_template']) : '',
                                ':is_input_prop' => !!$v2['is_input_prop'] ? 1 : 0,
                                ':is_key_prop' => !!$v2['is_key_prop'] ? 1 : 0,
                                ':is_sale_prop' => !!$v2['is_sale_prop'] ? 1 : 0,
                                ':is_color_prop' => !!$v2['is_color_prop'] ? 1 : 0,
                                ':is_enum_prop' => !!$v2['is_enum_prop'] ? 1 : 0,
                                ':is_item_prop' => !!$v2['is_item_prop'] ? 1 : 0,
                                ':is_allow_alias' => !$v2['is_allow_alias'] ? 1 : 0,
                                ':status' => $v2['status'],
                                ':sort_order' => $v2['sort_order'],
                                ':lasttime' => $_SERVER['REQUEST_TIME'],
                            );
                        $flag = $this->db->execute($sql, $params);

                        // if ($cid == '50004887') {
                        //     print_r($flag);exit;
                        // }
                        if ($flag == 1) {
                            // print_r($flag);exit;
                            $propNumber ++;
                            $sNum ++;
                            if ($sNum >= 500 && microtime(true) - $sTime<60) {
                                // echo 'sleep<br />';
                                // sleep(microtime(true) - $sTime);
                                $sTime = microtime(true);
                                $sNum = 0;
                            }
                        } else {
                            print_r($flag);exit;
                        }
                    }

                    $sql = "UPDATE taobao_category SET prop_number = :prop_number WHERE cid=:cid";
                    $flag = $this->db->execute($sql, array(':cid' => $cid, ':prop_number' => $propNumber));
                    // print_r($flag);exit;
                }
            }
        }
        // do {
        //     $cids = array();
        //     foreach ($parent_cids as $parent_cid) {

        //         if ($category_list['status'] == 1) {
        //             foreach ($category_list['result'] as $k => $v) {
        //                 $sql = "INSERT INTO taobao_category(cid, parent_cid, name, is_parent, status, sort_order, lasttime)
        //                         VALUES(:cid, :parent_cid, :name, :is_parent, :status, :sort_order, :lasttime)
        //                         ON DUPLICATE KEY UPDATE parent_cid=:parent_cid, name=:name, is_parent=:is_parent, status=:status, sort_order=:sort_order, lasttime=:lasttime";

        //                 $params = array(
        //                         ':cid' => $v['cid'],
        //                         ':parent_cid' => $v['parent_cid'],
        //                         ':name' => $v['name'],
        //                         ':is_parent' => $v['is_parent'],
        //                         ':status' => $v['status'],
        //                         ':sort_order' => $v['sort_order'],
        //                         ':lasttime' => $_SERVER['REQUEST_TIME'],
        //                     );
        //                 $this->db->query($sql, $params);

        //                 if ($v['is_parent'] == 'true') {
        //                     $cids[] = $v['cid'];
        //                 }
        //             }
        //         }
        //     }

        //     $parent_cids = $cids;
        // } while (!empty($parent_cids));


        echo \Api\Taobao\TopClient::$callTimes, ", success";
        exit;
    }

}

