<?php
    $this->assets->collection('head')
        ->addCss("ui/css/??select2_metro.css,DT_bootstrap.css");
    $this->assets->collection('footer')
        ->addJs("ui/js/??select2.min.js,jquery.dataTables.js")
        ->addJs("ui/js/??DT_bootstrap.js,table-editable.js,app/product.js");
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
                        <tr class="">
                            <td>alex</td>
                            <td>Alex Nilson</td>
                            <td>1234</td>
                            <td class="center">￥10.00</td>
                            <td class="center">￥10.00</td>
                            <td>
                                <a class="edit" href="javascript:;">编辑</a>
                                <a class="delete" href="javascript:;">删除</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row-fluid">
                    <div class="span6">
                        <div class="dataTables_info">共 6 件商品 当前第 1/2 页</div>
                    </div>
                    <div class="span6">
                        <style>
                            .page-select {margin:0 0 0 5px;}
                        </style>
                        <select class="form-control page-select select-search input-small pull-right" name="options2">
                            <option value="all">全部</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>

                        <div class="dataTables_paginate paging_bootstrap pagination">
                            <ul>
                                <li class="prev disabled">
                                    <span>
                                        ←
                                        <span class="hidden-480">上一页</span>
                                    </span>
                                </li>
                                <li class="active">
                                    <span>1</span>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li class="next">
                                    <a href="#">
                                        <span class="hidden-480">下一页</span>
                                        →
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>