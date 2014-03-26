<?php
    $this->assets->collection('head')
        ->addCss("ui/css/??jquery.gritter.css,daterangepicker.css,fullcalendar.css,jqvmap.css,jquery.easy-pie-chart.css");
    $this->assets->collection('footer')
        ->addJs("ui/js/??index.js");
?>

<style type="text/css">
select {margin:5px 0px;}
.table th, .table td {vertical-align: middle;}
.table td input { margin:0px; }

.category-level-lv2 {
    padding-left: 45px;
    background: url(../images/bg_repno.png) no-repeat -270px -545px;
}
.category-level-lv2-last {
    padding-left: 45px;
    background: url(../images/bg_repno.png) no-repeat -270px -595px;
}
.category-level-lv3 {
    padding-left: 100px;
    background: url(../images/bg_repno.png) no-repeat -215px -550px;
}
.category-level-lv3-last {
    padding-left: 100px;
    background: url(../images/bg_repno.png) no-repeat -215px -595px;
}
.category-level-lv4 {
    padding-left: 155px;
    background: url(../images/bg_repno.png) no-repeat -160px -550px;
}
.category-level-lv5 {
    padding-left: 210px;
    background: url(../images/bg_repno.png) no-repeat -105px -550px;
}
.category-add-children {
    margin-right: 5px;
    padding-left: 17px;
    line-height: 25px;
    background: url(../images/bg_repno.png) no-repeat 0 -599px;
    color: #FFF;
    zoom: 1;
}
.category-add-top {
    padding-left: 17px;
    line-height: 25px;
    background: url(../images/bg_repno.png) no-repeat 0 1px;
    color: #F60;
}
</style>

<div class="row-fluid">
    <div class="span12">

        <form action="tuangou.php" method="POST">
            <table class="table table-striped table-bordered table-hover category-list-table">
                <thead>
                    <tr>
                        <th class="span1"><!-- 编号 --></th>
                        <th class="span1">排序</th>
                        <th class="span3">分类名称</th>
                        <th class="span3">分类标识</th>
                        <th class="span1">是否可用</th>
                        <!-- <th class="span2">修改时间</th> -->
                        <th class="span2">操作</th>
                    </tr>
                </thead>
                <tbody id="category-table-body">
                    {% for item in menu_list %}
                    <tr class="tuangrou_category_{$item.category_id}{if $item.enabled eq 0} error{/if}">
                        <td>{{ item.category_id }}</td>
                        <td><input type="text" name="category[{{item.parent_id}}][{{item.category_id}}][sort_order]" value="{$item.sort_order}" class="span12" /></td>
                        <td>
                            <div class="category-level-lv{{item.level}}">
                                <input type="text" name="category[{$item.parent_id}][{$item.category_id}][category_name]" value="{{item.category_name}}" />
                                <a href="javascript:;" rel="{{item.category_id}}" level="{{item.level}}" class="category-add-children">添加子分类</a>
                            </div>
                        </td>
                        <td><input type="text" name="category[{{item.parent_id}}][{$item.category_id}][identify]" value="{$item.identify}" disabled="disabled" /></td>
                        <td>
                            <div class="switch make-switch" data-on="primary" data-off="info">
                                <input type="checkbox" name="category[{$item.parent_id}][{$item.category_id}][enabled]" value="1"{if $item.enabled eq 1} checked{/if} rel="{$item.category_id}" class="switch-enabled" />
                            </div>
                        </td>
                        <td>
                            <a href="tuangou.php?act=manage&id={$item.category_id}">查看商品</a>
                            <a href="javascript:;" rel="{$item.category_id}" class="remove">删除</a>
                        </td>
                    </tr>
                    {% endfor %}
                    <tr class="">
                        <td>&nbsp;</td>
                        <td><input type="text" name="category_new[0][0][sort_order]" value="255" class="span12" /></td>
                        <td>
                            <div class="category-level-lv1">
                                <input type="text" name="category_new[0][0][category_name]" value="" />
                                <input type="hidden" name="category_new[0][0][level]" value="1" />
                            </div>
                        </td>
                        <td><input type="text" name="category_new[0][0][identify]" value="" /></td>
                        <td>
                            <div class="switch make-switch" data-on="primary" data-off="info">
                                <input type="checkbox" name="category_new[0][0][enabled]" value="1" checked rel="" class="switch-enabled" />
                            </div>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="4">
                            <a href="javascript:;" rel="0" level="0" class="category-add-top">添加顶级栏目</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="control-group">
                <div class="controls">
                    <input type="hidden" name="act" value="category_update" />
                    <button type="submit" class="btn btn-primary">批量修改</button>
                    <button type="reset" class="btn">重置</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
<!--
    $('input.icheckbox').iCheck({checkboxClass: 'icheckbox_square-blue',radioClass: 'iradio_square-blue',increaseArea: '20%'});

    $(".table .remove").each(function(i, j) {
        $(this).popover({placement:'left',trigger:'click',title:'提示',content:'确定要删除该分类吗？<br /><button type="button" class="btn btn-primary btn-sure-del" category_id="'+$(this).attr('rel')+'" data-toggle="button">删除</button>&nbsp;<button type="button" class="btn btn-close" data-toggle="button">关闭</button>',html:true});
    });
    $(".table .remove").on('click', function(){
        $(".table .remove").not(this).popover('hide');
    })
    $(".btn-sure-del").live('click', function(){
        var category_id = $(this).attr('category_id');
        $(".table .remove").popover('hide');
        if (category_id != '') {
            $.getJSON("tuangou.php?act=category_remove&is_ajax=1&category_id=" + category_id, function(json) {
                if (json.ok == 1) {
                    $('.table tr.special_category_' + category_id).remove();
                } else {
                    alert(json.msg);
                }
            });
        } else {
            //
        }
    });
    $(".btn-close").live('click', function(){
        $(".table .remove").popover('hide');
    });

    /**
     * 添加分类
     */
    var category = {
        0: {i:1, lv:1}
    };
    $(".category-add-top, .category-add-children").on('click', function(){
        var pid = parseInt($(this).attr('rel'));
        if (typeof category[pid] == 'undefined') {
            category[pid] = {};
            category[pid].i = 0;
            category[pid].lv = parseInt($(this).attr('level')) + 1;
        }
        var lineHtml = "";
        lineHtml += "                        <tr class=\"\">";
        lineHtml += "                            <td>&nbsp;</td>";
        lineHtml += "                            <td><input type=\"text\" name=\"category_new["+pid+"]["+category[pid].i+"][sort_order]\" value=\"255\" class=\"span12\" /></td>";
        lineHtml += "                            <td>";
        lineHtml += "                                <div class=\"category-level-lv"+category[pid].lv+"\">";
        lineHtml += "                                    <input type=\"text\" name=\"category_new["+pid+"]["+category[pid].i+"][category_name]\" value=\"\" />";
        lineHtml += "                                    <input type=\"hidden\" name=\"category_new["+pid+"]["+category[pid].i+"][level]\" value=\""+category[pid].lv+"\" />";
        lineHtml += "                                </div>";
        lineHtml += "                            </td>";
        lineHtml += "                            <td><input type=\"text\" name=\"category_new["+pid+"]["+category[pid].i+"][identify]\" value=\"\" /></td>";
        lineHtml += "                            <td>";
        lineHtml += "                                <div class=\"switch make-switch\" data-on=\"primary\" data-off=\"info\">";
        lineHtml += "                                    <input type=\"checkbox\" name=\"category_new["+pid+"]["+category[pid].i+"][enabled]\" value=\"1\" checked rel=\"\" class=\"switch-enabled\" />";
        lineHtml += "                                </div>";
        lineHtml += "                            </td>";
        lineHtml += "                            <td>";
        // lineHtml += "                                <a href=\"javascript:;\" rel=\"\" class=\"remove\">删除</a>";
        lineHtml += "                            </td>";
        lineHtml += "                        </tr>";
        if (pid > 0) {
            $(this).parents('tr').after(lineHtml);
        } else {
            // $("#category-table-body").append(lineHtml);
            console.log($(this).parents('tr'));
            $(this).parents('tr').before(lineHtml);
        }
        $(".category-list-table").find("input[name='category_new["+pid+"]["+category[pid].i+"][enabled]']")
            .parent().bootstrapSwitch();
        // index += 1;
        category[pid].i++;
    });

    /**
     * 添加商品
     */
    $(".add-goods-button").live('click', function(){
        var special_id  = $(this).attr('special_id');
        var category_id = $(this).attr('rel');
        $("#modal-batch-add-goods").modal()
            .find('select[name=category_id]').val(category_id)
            .end().find('select[name=special_id]').val(special_id);
    });
    $(".batch-add-goods-button").live('click', function(){
        var self = this;
        var special_id  = $(this).parent().children('select[name=special_id]').val();
        var category_id = $(this).parent().children('select[name=category_id]').val();
        var ids = $(this).parent().children('textarea').val();
        $.getJSON('?act=category_batch_add_goods', {special_id: special_id, category_id: category_id, ids: ids}, function(json, textStatus){
            //
            if (json.ok == 1) {
                $(self).parents('form').next().removeClass('alert-error').addClass('alert-success').html(json.msg).show();
            } else {
                $(self).parents('form').next().removeClass('alert-success').addClass('alert-error').html(json.msg).show();
            }
        });
    });

    /**
     * 修改分类是否可用
     */
    $(".switch-enabled").on("change", function(){
        var category_id = $(this).attr('rel');
        var enabled = $(this).is(":checked");
        var self = this;

        if (category_id != "") {
            $.getJSON('tuangou.php?act=category_enabled_toggle',
                {
                    category_id:category_id,
                    enabled:enabled ? 1 : 0
                },
                function(json){
                    if (json.ok == 1) {
                        //
                        if (!enabled) {
                            $(self).parents('tr').addClass('error');
                        } else {
                            $(self).parents('tr').removeClass('error');
                        }
                    } else {
                        //
                    }
                }
            );
        }
    });
//-->
</script>
