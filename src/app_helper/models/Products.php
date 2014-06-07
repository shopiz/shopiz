<?php

/**
 *
 * @author Jacky Zhang <myself.fervor@gmail.com>
 * @version $Id activity_share.php Jun 20, 2013 $
 * @copyright 2012-2013 欧凯管家 <http://www.okgj.com>
 */


class Products extends \ShopIZ\Base\Model
{
    protected $tableName = "products";

    public function columnMap() {
        return array(
            'product_id'          => 'product_id',
            'channel_id'          => 'channel_id',
            'channel_product_id'  => 'channel_product_id',
            'class_id'            => 'class_id',
            'product_name'        => 'product_name',
            'product_price'       => 'product_price',
            'product_description' => 'product_description',
            'product_tips'        => 'product_tips',
            'product_discount_rate' => 'product_discount_rate',
            'product_discount'    => 'product_discount',
            'is_default'    => 'is_default',
            'is_show'    => 'is_show',
            'product_rank'    => 'product_rank',
            'product_attribute'    => 'product_attribute',
            'product_status'    => 'product_status',
            'is_other' => 'is_other',
            'dateline'    => 'dateline',
            'lasttime'    => 'lasttime',

        );
    }

    public function getProductList($params = array())
    {
        $builder = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('Products');

        $paginator = new Phalcon\Paginator\Adapter\QueryBuilder(
            array(
                "builder" => $builder,
                "limit"=> 10,
                "page" => $page
            )
        );

        $page = $paginator->getPaginate();

        return $page;
    }
}
