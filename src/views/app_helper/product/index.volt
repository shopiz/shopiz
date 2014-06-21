<?php
    $this->assets->collection('head')
        ->addCss("ui/css/??select2_metro.css,DT_bootstrap.css");
    $this->assets->collection('footer')
        ->addJs("ui/js/??select2.min.js,jquery.dataTables.js")
        ->addJs("ui/js/??DT_bootstrap.js,table-editable.js,app/product.js,showpage.js");
?>

<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-edit"></i>商品列表</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>

            <div class="portlet-body">
                <div class="clearfix">
                    <div class="btn-group">
                        <a href="/product/add" class="btn green">添加商品 <i class="icon-plus"></i></a>
                    </div>

                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">工具 <i class="icon-angle-down"></i>
                        </button>

                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">打印</a></li>
                            <li><a href="#">保存为PDF</a></li>
                            <li><a href="#">导出到Excel</a></li>
                        </ul>
                    </div>
                </div>

                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>商品编号</th>
                            <th>商品货号</th>
                            <th>商品名称</th>
                            <th>商品价格</th>
                            <th>市场价</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for item in product_list.items %}
                        <tr class="">
                            <td>{{item.product_id}}</td>
                            <td>{{item.product_sn}}</td>
                            <td>{{item.product_name}}</td>
                            <td class="center">￥{{item.product_price}}</td>
                            <td class="center">￥{{item.market_price}}</td>
                            <td>
                                <a class="edit" href="javascript:;"><i class="icon-pencil"></i> 编辑</a>
                                <a class="delete" href="javascript:;"><i class="icon-trash"></i> 删除</a>
                            </td>
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>

                <div class="row-fluid">
                    <style>
                        /*.page-select {margin:0 0 0 5px;}*/
                        /*.pagination select[class*="span"] {margin-top: -12px; margin-left: 5px;}*/
                        div.dataTables_paginate {float: none;}
                        .pagination div.dataTables_info {float:left;}
                        .pagination ul { float: right; }
                        .pagination select {float:right; margin-left:5px;}
                    </style>

                    <div class="dataTables_paginate paging_bootstrap pagination">
                    	<script type="text/javascript">
                    	var pg = new showPages('pg');
                    	pg.pagesize = {{pagesize}};//{{product_list.page_size}};
                    	pg.page = {{product_list.current}};
                    	pg.page_count = {{product_list.total_pages}};
                    	pg.item_count = {{product_list.total_items}};
                    	pg.printHtml(256 | 128 | 16 | 64);
                    	</script>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>