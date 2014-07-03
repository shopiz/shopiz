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
            'category_id'         => 'category_id',
            'brand_id'            => 'brand_id',
            'product_name'        => 'product_name',
            'product_sn'          => 'product_sn',
            'product_price'       => 'product_price',
            'market_price'        => 'market_price',
            'product_description' => 'product_description',
            'product_tips'        => 'product_tips',
            'product_discount_rate' => 'product_discount_rate',
            'product_discount'    => 'product_discount',
            'is_on_sale'          => 'is_on_sale',
            'is_default'          => 'is_default',
            'is_show'             => 'is_show',
            'product_rank'        => 'product_rank',
            'product_attribute'   => 'product_attribute',
            'product_status'      => 'product_status',
            'is_other'            => 'is_other',
            'dateline'            => 'dateline',
            'lasttime'            => 'lasttime',

        );
    }

    public function getProductInfo($product_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE product_id=:product_id";
        $productInfo = $this->db->fetchOne($sql, PDO::FETCH_ASSOC, array('product_id' => $product_id));

        return $productInfo;
    }

    public function getProductList($params = array())
    {

        !isset($params['limit']) && $params['limit'] = 10;
        !isset($params['page']) && $params['page'] = 1;

        $builder = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('Products');

        $paginator = new Phalcon\Paginator\Adapter\QueryBuilder(
            array(
                "builder" => $builder,
                "limit" => $params['limit'],
                "page" => $params['page'],
            )
        );

        return $paginator->getPaginate();
    }
}
