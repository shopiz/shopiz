<?php

namespace Privilege;

/**
 *
 * @author Jacky Zhang <myself.fervor@gmail.com>
 * @version $Id activity_share.php Jun 20, 2013 $
 * @copyright 2012-2013 欧凯管家 <http://www.okgj.com>
 */


class Menu extends \ShopIZ\Base\Model
{
    protected $tableName = "privilege_menu";

    private static $_menuList = null;
    private static $_handledMenuList = null;

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

    public function getMenuInfo($menu_id)
    {
        $sql = "SELECT menu_id, menu_name, enabled, identify, lasttime, dateline
                FROM {$this->tableName}
                WHERE menu_id=:menu_id AND is_delete=0";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':menu_id', $menu_id);
        $stmt->execute();
        $menuInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        return $menuInfo;
    }

    /**
     * 获得菜单列表
     * @param  array  $params 参数
     * @return array  $res
     */

    public function processMenuList($parent_id)
    {
        if (self::$_menuList === null) {
            $sql = "SELECT menu_id, menu_name, parent_id, enabled, is_delete, sort_order
                    FROM {$this->tableName}
                    ORDER BY parent_id, sort_order";
            $res = $this->db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);

            self::$_menuList = array();
            $index = array();
            $level = array();
            foreach ($res as $k => $v) {
                // $level[$v['menu_id']] = $level[$v['parent_cid']] + 1;
                $v['level'] = $level[$v['menu_id']] = $level[$v['parent_id']] + 1;
                $v['index'] = ++$index[$v['parent_id']];
                self::$_menuList[$v['parent_id']][$v['menu_id']] = $v;
            }
        }

        // $categoryList = array();
        if (isset(self::$_menuList[$parent_id]) && is_array(self::$_menuList[$parent_id])) {
            foreach (self::$_menuList[$parent_id] as $k => $v) {
                self::$_handledMenuList[] = $v;
                $this->processMenuList($v['menu_id']);
            }
        }

        return;
    }

    /**
     * 获取菜单列表
     * @param mixed $parent_id
     * @param int   $type
     *        1: 上级菜单ID为键
     *        2: 子菜单跟在父类后面
     *        3: 菜单ID为键
     *        4: 子菜单在children中
     * @param mixed $is_show
     */
    public function getMenuList($parent_id = 0, $type = 1, $is_show = null)
    {
        if (self::$_handledMenuList === null) {

            // 固定三级菜单
            $this->processMenuList($parent_id);
        }

        $ret = array();
        switch ($type) {
            case 1:
                if ($parent_id != 0) {
                    $ret = isset(self::$_menuList[$parent_id]) ? isset(self::$_menuList[$parent_id]) : array();
                } else {
                    $ret = self::$_menuList;
                }

                break;

            case 2:

                $ret = self::$_handledMenuList;
                break;

            case 3:
                $ret = array();
                if ($parent_id != 0) {
                    foreach (self::$_handledMenuList[$parent_id] as $k => $v) {
                        $ret[$v['category_id']] = $v;
                    }
                } else {
                    foreach (self::$_handledMenuList as $k => $v) {
                        $ret[$v['category_id']] = $v;
                    }
                }

                return $ret;
                break;
            case 4:
                foreach (self::$_menuList[$parent_id] as $k => $v) {
                    foreach (self::$_menuList[$v['category_id']] as $k1 => $v1) {
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
