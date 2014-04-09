<?php
    $this->assets->collection('head');
    $this->assets->collection('footer');
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

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <form action="/product/category/update" method="POST">
                    <table class="table table-striped table-bordered table-hover category-list-table">
                        <thead>
                            <tr>
                                <th class="span1">
                                    <input type="checkbox" class="group-checkable" data-set=".checkboxes" />
                                </th>
                                <th class="span1">排序</th>
                                <th class="span3">分类名称</th>
                                <th class="span3">分类标识</th>
                                <th class="span2">是否可用</th>
                                <!-- <th class="span2">修改时间</th> -->
                                <!-- <th class="span2">操作</th> -->
                            </tr>
                        </thead>
                        <tbody id="category-table-body">
                            {% if category_list is iterable %}
                            {% for key, item in category_list %}
                            <tr class="category_{{ item['category_id']}}{%if item['enabled'] == 0%} error{% endif %}">
                                <td>
                                    <input type="checkbox" class="checkboxes" value="1" />
                                </td>
                                <td><input type="text" name="category[{{ item['parent_id'] }}][{{ item['category_id'] }}][sort_order]" value="{{ item['sort_order'] }}" class="span12" /></td>
                                <td>
                                    <div class="category-level-lv{{ item['level'] }}">
                                        <input type="text" name="category[{{ item['parent_id'] }}][{{ item['category_id'] }}][category_name]" value="{{ item['category_name'] }}" />
                                        <a href="javascript:;" rel="{{ item['category_id'] }}" level="{{ item['level'] }}" class="category-add-children">添加子分类</a>
                                    </div>
                                </td>
                                <td><input type="text" name="category[{{ item['parent_id'] }}][{{ item['category_id'] }}][identify]" value="{{ item['identify'] }}" disabled="disabled" /></td>
                                <td>
                                    <div class="switch make-switch" data-on="primary" data-off="info">
                                        <input type="checkbox" name="category[{{ item['parent_id'] }}][{{ item['category_id'] }}][enabled]" value="1"{% if item['enabled'] == 1 %} checked{% endif %} rel="{{ item['category_id'] }}" class="switch-enabled" />
                                    </div>
                                </td>
                                <!-- <td>
                                    <a href="tuangou.php?act=manage&id={{ item['category_id'] }}">更新</a>
                                </td> -->
                            </tr>
                            {% endfor %}
                            {% endif %}
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
                                <!-- <td>&nbsp;</td> -->
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
                            <button type="submit" class="btn btn-primary">批量更新</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
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
            // lineHtml += "                            <td>";
            // lineHtml += "                                <a href=\"javascript:;\" rel=\"\" class=\"remove\">删除</a>";
            // lineHtml += "                            </td>";
            lineHtml += "                        </tr>";
            if (pid > 0) {
                $(this).parents('tr').after(lineHtml);
            } else {
                // $("#category-table-body").append(lineHtml);
                // console.log($(this).parents('tr'));
                $(this).parents('tr').before(lineHtml);
            }
            $(".category-list-table").find("input[name='category_new["+pid+"]["+category[pid].i+"][enabled]']")
                .parent().toggleButtons({
                    width: 100,
                    label: {
                        enabled: "可用",
                        disabled: "禁用"
                    }
                });
            // index += 1;
            category[pid].i++;
        });

        $('.make-switch').toggleButtons({
            width: 100,
            label: {
                enabled: "可用",
                disabled: "禁用"
            }
        });

        $('.group-checkable').change(function () {
            var set = $(this).attr("data-set");
            var checked = $(this).is(":checked");
            $(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            console.log(set);
            $.uniform.update(set);
        });
    </script>