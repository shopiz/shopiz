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

    public function getCategoryList($params = array())
    {
        $sql = "";

        return $res;
    }
}
