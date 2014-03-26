<?php

/**
 *
 * @author Jacky Zhang <myself.fervor@gmail.com>
 * @version $Id activity_share.php Jun 20, 2013 $
 * @copyright 2012-2013 欧凯管家 <http://www.okgj.com>
 */


class Privilege_Menu extends \ShopIZ\Base\Model
{
    protected $tableName = "privilege_menu";

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
    public function getMenuList($params = array())
    {
        // $query = $this->query()
        //         ->where('is_delete=0');
        // print_r($query->fetchArray());
        //
        // $sql = "SELECT shop_id, shop_name, enabled, lasttime, dateline
        //         FROM {$this->tableName}
        //         WHERE is_delete=0";
        $builder = $this->modelsManager->createBuilder();
        // $res = $builder->from("shop")
        //     ->where('shop_name LIKE :keyword:', array('keyword', $params['keyword']))
        //     ->getQuery()
        //     ->execute();
        // $stmt->bindValue(':shop_id', $shop_id);
        // print_r($stmt->fetchArray());


        // if (isset($params['keyword'])) {
        //     $query->andWhere('keyword LIKE :keyword', array('keyword' => $params['keyword']));
        // }

        // $list = $query->execute();

        // echo $this->count($query->columns('COUNT(s.shop_id) as number'));
        //
        //

        // $query = $this->query()
        //         ->where('is_delete=0');

        // if (isset($params['keyword'])) {
        //     $query->andWhere('city_name LIKE :keyword', array('keyword' => "%{$params['keyword']}%"));
        // }
        // print_r($query);
    }
}
