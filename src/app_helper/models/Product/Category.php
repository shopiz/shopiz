<?php

namespace Product;

/**
 *
 * @author Jacky Zhang <myself.fervor@gmail.com>
 * @version $Id activity_share.php Jun 20, 2013 $
 * @copyright 2012-2013 欧凯管家 <http://www.okgj.com>
 */


class Category extends \ShopIZ\Base\Model
{
    protected $tableName = "product_category";

    private static $_catList = null;
    private static $_categoryList = null;

    private $category_id;

    public function columnMap() {
        return array(
            'category_id'   => 'category_id',
            'category_name' => 'category_name',
            'identify'      => 'identify',
            'parent_id'     => 'parent_id',
            'enabled'       => 'enabled',
            'sort_order'    => 'sort_order',
        );
    }

    public function processCategoryList($parent_id)
    {
        if (self::$_catList === null) {
            // $_s = microtime(true);
            // for ($i = 0; $i < 1000; $i++) {
            //     // \Phalcon\Mvc\Model\Criteria::query();
            //     // $sql = "SELECT category_id, category_name, identify, parent_id, sort_order
            //     //         FROM product_category
            //     //         ORDER BY parent_id, sort_order";
            //     // $res = $this->db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);
            //     // $sql = "SELECT category_id, category_name, identify, parent_id, enabled, sort_order
            //     //         FROM \Product\Category
            //     //         ORDER BY parent_id, sort_order";
            //     // $dataset = $this->modelsManager->createQuery($sql)
            //     //     ->execute();
            //     // $this->query()
            //     //     // ->columns('category_id, category_name, identify, parent_id, sort_order')
            //     //     ->columns(array('category_id'))
            //     //     // ->from('product_category')
            //     //     ->orderBy('parent_id, sort_order')
            //     //     ->execute();
            //     // $query = $this->modelsManager->createBuilder()
            //     //     ->columns('category_id, category_name, identify, parent_id, sort_order')
            //     //     ->from('Product\Category')
            //     //     ->orderBy(array('parent_id', 'sort_order'))
            //     //     ->getQuery()
            //     //     ->execute();
            // }
            // echo microtime(true) - $_s;
            $sql = "SELECT category_id, category_name, identify, parent_id, enabled, is_delete, sort_order
                    FROM product_category
                    ORDER BY parent_id, sort_order";
            $res = $this->db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);

            self::$_catList = array();
            $index = array();
            $level = array();
            foreach ($res as $k => $v) {
                // $level[$v['category_id']] = $level[$v['parent_cid']] + 1;
                $v['level'] = $level[$v['category_id']] = $level[$v['parent_id']] + 1;
                $v['index'] = ++$index[$v['parent_id']];
                self::$_catList[$v['parent_id']][$v['category_id']] = $v;
            }
        }

        // $categoryList = array();
        if (isset(self::$_catList[$parent_id]) && is_array(self::$_catList[$parent_id])) {
            foreach (self::$_catList[$parent_id] as $k => $v) {
                self::$_categoryList[] = $v;
                $this->processCategoryList($v['category_id']);
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
    public function getCategoryList($parent_id = 0, $type = 1, $is_show = null)
    {
        $s1 = microtime(true);
        if (self::$_categoryList === null) {
            // $sql = "SELECT category_id, category_name, parent_cid, is_parent, status, sort_order FROM taobao_category
            //         {$where}
            //         ORDER BY parent_cid, sort_order";
            // $res = $this->db->fetchAll($sql);

            // $catList = array();
            // $index = array();
            // foreach ($res as $k => $v) {
            //     $v['index'] = ++$index[$v['parent_cid']];
            //     $catList[$v['parent_cid']][$v['category_id']] = $v;
            // }

            // 固定三级分类
            $this->processCategoryList($parent_id);
        }

        $ret = array();
        switch ($type) {
            case 1:
                if ($parent_id != 0) {
                    $ret = isset(self::$_catList[$parent_id]) ? isset(self::$_catList[$parent_id]) : array();
                } else {
                    $ret = self::$_catList;
                }

                break;

            case 2:

                $ret = self::$_categoryList;
                break;

            case 3:
                $ret = array();
                if ($parent_id != 0) {
                    foreach (self::$_categoryList[$parent_id] as $k => $v) {
                        $ret[$v['category_id']] = $v;
                    }
                } else {
                    foreach (self::$_categoryList as $k => $v) {
                        $ret[$v['category_id']] = $v;
                    }
                }

                return $ret;
                break;
            case 4:
                foreach (self::$_catList[$parent_id] as $k => $v) {
                    foreach (self::$_catList[$v['category_id']] as $k1 => $v1) {
                        // $categoryList[] = $v1;
                        foreach ($catList[$v1['category_id']] as $k2 => $v2) {
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
}
