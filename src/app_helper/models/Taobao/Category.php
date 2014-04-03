<?php

namespace Taobao;

/**
 *
 * @author Jacky Zhang <myself.fervor@gmail.com>
 * @version $Id activity_share.php Jun 20, 2013 $
 * @copyright 2012-2013 欧凯管家 <http://www.okgj.com>
 */


class Category extends \ShopIZ\Base\Model
{
    protected $tableName = "taobao_category";

    private static $_catList = null;
    private static $_categoryList = null;

    public function columnMap() {
        return array(
            'menu_id'   => 'menu_id',
            'menu_name' => 'menu_name',
            'enabled'   => 'enabled',
            'identify'  => 'identify',
            'lasttime'  => 'lasttime',
            'dateline'  => 'dateline',
        );
    }

    public function processCategoryList($parentCid)
    {
        if (self::$_catList === null) {
            $sql = "SELECT cid, name, parent_cid, is_parent, status, sort_order FROM taobao_category
                    ORDER BY parent_cid, sort_order";
            $res = $this->db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);

            self::$_catList = array();
            $index = array();
            $level = array();
            foreach ($res as $k => $v) {
                // $level[$v['cid']] = $level[$v['parent_cid']] + 1;
                $v['level'] = $level[$v['cid']] = $level[$v['parent_cid']] + 1;
                $v['index'] = ++$index[$v['parent_cid']];
                self::$_catList[$v['parent_cid']][$v['cid']] = $v;
            }
        }

        // $categoryList = array();
        if (isset(self::$_catList[$parentCid])) {
            foreach (self::$_catList[$parentCid] as $k => $v) {
                self::$_categoryList[] = $v;
                if ($v['is_parent'] == 'true') {
                    $this->processCategoryList($v['cid']);
                }
            }
        }

        return;
    }

    /**
     * 获取分类列表
     * @param mixed $parent_id
     * @param int   $type
     *        1: 上级分类ID为键
     *        2: 子分类跟在父类后面
     *        3: 分类ID为键
     *        4: 子分类在children中
     * @param mixed $is_show
     */
    public function getCategoryList($parentCid = 0, $type = 1, $is_show = null)
    {
        $s1 = microtime(true);
        if (self::$_categoryList === null) {
            // $sql = "SELECT cid, name, parent_cid, is_parent, status, sort_order FROM taobao_category
            //         {$where}
            //         ORDER BY parent_cid, sort_order";
            // $res = $this->db->fetchAll($sql);

            // $catList = array();
            // $index = array();
            // foreach ($res as $k => $v) {
            //     $v['index'] = ++$index[$v['parent_cid']];
            //     $catList[$v['parent_cid']][$v['cid']] = $v;
            // }

            // 固定三级分类
            $this->processCategoryList($parentCid);
        }

        $ret = array();
        switch ($type) {
            case 1:
                if ($parentCid != 0) {
                    $ret = isset(self::$_catList[$parentCid]) ? isset(self::$_catList[$parentCid]) : array();
                } else {
                    $ret = self::$_catList;
                }

                break;

            case 2:

                $ret = self::$_categoryList;
                break;

            case 3:
                $ret = array();
                if ($parentCid != 0) {
                    foreach (self::$_categoryList[$parentCid] as $k => $v) {
                        $ret[$v['cid']] = $v;
                    }
                } else {
                    foreach (self::$_categoryList as $k => $v) {
                        $ret[$v['cid']] = $v;
                    }
                }

                return $ret;
                break;
            case 4:
                foreach (self::$_catList[$parentCid] as $k => $v) {
                    foreach (self::$_catList[$v['cid']] as $k1 => $v1) {
                        // $categoryList[] = $v1;
                        foreach ($catList[$v1['cid']] as $k2 => $v2) {
                            $v1['children'][] = $v2;
                        }
                        $v['children'][] = $v1;
                    }
                    $ret[] = $v;
                }
                break;

            default:
                return array();
        }

        return $ret;
    }

    /**
     * 获取分类列表
     * @param mixed $parent_id
     * @param int   $type
     *        1: 上级分类ID为键
     *        2: 子分类跟在父类后面
     *        3: 分类ID为键
     *        4: 子分类在children中
     * @param mixed $is_show
     */
    public function getPropList($cid = 0, $type = 1)
    {
        $s1 = microtime(true);

        $sql = "SELECT pid, name, parent_pid, parent_vid, must, multi, features, prop_values, child_template,
                    is_key_prop, is_sale_prop, is_color_prop, is_enum_prop, is_item_prop, prop_values, status, sort_order
                FROM taobao_category_prop
                WHERE cid=:cid
                ORDER BY sort_order";
        $res = $this->db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, array('cid' => $cid));

        $propList = array();
        foreach ($res as $k => $v) {
            $v['features'] = unserialize($v['features']);
            $v['prop_values'] = unserialize($v['prop_values']);
            $propList[] = $v;
        }

        return $propList;
    }
}
