<?php
    $this->assets->collection('head');
    $this->assets->collection('footer');
?>
<style type="text/css">
    select {margin:5px 0px;}
    .table th, .table td {vertical-align: middle;}
    .table td input { margin:0px; }

    .tree-level-lv2 {
        padding-left: 45px;
        background: url(../images/bg_repno.png) no-repeat -270px -545px;
    }
    .tree-level-lv2-last {
        padding-left: 45px;
        background: url(../images/bg_repno.png) no-repeat -270px -595px;
    }
    .tree-level-lv3 {
        padding-left: 100px;
        background: url(../images/bg_repno.png) no-repeat -215px -550px;
    }
    .tree-level-lv3-last {
        padding-left: 100px;
        background: url(../images/bg_repno.png) no-repeat -215px -595px;
    }
    .tree-level-lv4 {
        padding-left: 155px;
        background: url(../images/bg_repno.png) no-repeat -160px -550px;
    }
    .tree-level-lv5 {
        padding-left: 210px;
        background: url(../images/bg_repno.png) no-repeat -105px -550px;
    }
    .tree-add-children {
        margin-right: 5px;
        padding-left: 17px;
        line-height: 25px;
        background: url(../images/bg_repno.png) no-repeat 0 -599px;
        color: #FFF;
        zoom: 1;
    }
    .tree-add-top {
        padding-left: 17px;
        line-height: 25px;
        background: url(../images/bg_repno.png) no-repeat 0 1px;
        color: #F60;
    }
    </style>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <form action="/privilege/menu/update" method="POST">
                    <table class="table table-striped table-bordered table-hover menu-list-table">
                        <thead>
                            <tr>
                                <th class="span1">
                                    <input type="checkbox" class="group-checkable" data-set=".checkboxes" />
                                </th>
                                <th class="span1">排序</th>
                                <th class="span3">菜单名称</th>
                                <th class="span3">URL</th>
                                <th class="span2">是否可用</th>
                                <!-- <th class="span2">修改时间</th> -->
                                <!-- <th class="span2">操作</th> -->
                            </tr>
                        </thead>
                        <tbody id="menu-table-body">
                            {% if menu_list is iterable %}
                            {% for key, item in menu_list %}
                            <tr class="tree_{{ item['menu_id']}}{%if item['enabled'] == 0%} error{% endif %}">
                                <td>
                                    <input type="checkbox" class="checkboxes" value="1" />
                                </td>
                                <td><input type="text" name="menu[{{ item['parent_id'] }}][{{ item['menu_id'] }}][sort_order]" value="{{ item['sort_order'] }}" class="span12" /></td>
                                <td>
                                    <div class="tree-level-lv{{ item['level'] }}">
                                        <input type="text" name="menu[{{ item['parent_id'] }}][{{ item['menu_id'] }}][menu_name]" value="{{ item['menu_name'] }}" />
                                        <a href="javascript:;" rel="{{ item['menu_id'] }}" level="{{ item['level'] }}" class="tree-add-children">添加子菜单</a>
                                    </div>
                                </td>
                                <td><input type="text" name="menu[{{ item['parent_id'] }}][{{ item['menu_id'] }}][menu_url]" value="{{ item['menu_url'] }}" /></td>
                                <td>
                                    <div class="switch make-switch" data-on="primary" data-off="info">
                                        <input type="checkbox" name="menu[{{ item['parent_id'] }}][{{ item['menu_id'] }}][enabled]" value="1"{% if item['enabled'] == 1 %} checked{% endif %} rel="{{ item['menu_id'] }}" class="switch-enabled" />
                                    </div>
                                </td>
                                <!-- <td>
                                    <a href="tuangou.php?act=manage&id={{ item['menu_id'] }}">更新</a>
                                </td> -->
                            </tr>
                            {% endfor %}
                            {% endif %}
                            <tr class="">
                                <td>&nbsp;</td>
                                <td><input type="text" name="menu_new[0][0][sort_order]" value="255" class="span12" /></td>
                                <td>
                                    <div class="tree-level-lv1">
                                        <input type="text" name="menu_new[0][0][menu_name]" value="" />
                                        <input type="hidden" name="menu_new[0][0][level]" value="1" />
                                    </div>
                                </td>
                                <td><input type="text" name="menu_new[0][0][menu_url]" value="" /></td>
                                <td>
                                    <div class="switch make-switch" data-on="primary" data-off="info">
                                        <input type="checkbox" name="menu_new[0][0][enabled]" value="1" checked rel="" class="switch-enabled" />
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
                                    <a href="javascript:;" rel="0" level="0" class="tree-add-top">添加顶级菜单</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" name="act" value="menu_update" />
                            <button type="submit" class="btn btn-primary">批量更新</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var menu = {
            0: {i:1, lv:1}
        };
        $(".tree-add-top, .tree-add-children").on('click', function(){
            var pid = parseInt($(this).attr('rel'));
            if (typeof menu[pid] == 'undefined') {
                menu[pid] = {};
                menu[pid].i = 0;
                menu[pid].lv = parseInt($(this).attr('level')) + 1;
            }
            var lineHtml = "";
            lineHtml += "                        <tr class=\"\">";
            lineHtml += "                            <td>&nbsp;</td>";
            lineHtml += "                            <td><input type=\"text\" name=\"menu_new["+pid+"]["+menu[pid].i+"][sort_order]\" value=\"255\" class=\"span12\" /></td>";
            lineHtml += "                            <td>";
            lineHtml += "                                <div class=\"tree-level-lv"+menu[pid].lv+"\">";
            lineHtml += "                                    <input type=\"text\" name=\"menu_new["+pid+"]["+menu[pid].i+"][menu_name]\" value=\"\" />";
            lineHtml += "                                    <input type=\"hidden\" name=\"menu_new["+pid+"]["+menu[pid].i+"][level]\" value=\""+menu[pid].lv+"\" />";
            lineHtml += "                                </div>";
            lineHtml += "                            </td>";
            lineHtml += "                            <td><input type=\"text\" name=\"menu_new["+pid+"]["+menu[pid].i+"][menu_url]\" value=\"\" /></td>";
            lineHtml += "                            <td>";
            lineHtml += "                                <div class=\"switch make-switch\" data-on=\"primary\" data-off=\"info\">";
            lineHtml += "                                    <input type=\"checkbox\" name=\"menu_new["+pid+"]["+menu[pid].i+"][enabled]\" value=\"1\" checked rel=\"\" class=\"switch-enabled\" />";
            lineHtml += "                                </div>";
            lineHtml += "                            </td>";
            // lineHtml += "                            <td>";
            // lineHtml += "                                <a href=\"javascript:;\" rel=\"\" class=\"remove\">删除</a>";
            // lineHtml += "                            </td>";
            lineHtml += "                        </tr>";
            if (pid > 0) {
                $(this).parents('tr').after(lineHtml);
            } else {
                // $("#tree-table-body").append(lineHtml);
                // console.log($(this).parents('tr'));
                $(this).parents('tr').before(lineHtml);
            }
            $(".menu-list-table").find("input[name='menu_new["+pid+"]["+menu[pid].i+"][enabled]']")
                .parent().toggleButtons({
                    width: 100,
                    label: {
                        enabled: "可用",
                        disabled: "禁用"
                    }
                });
            // index += 1;
            menu[pid].i++;
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