<?php
    $this->assets->collection('head');
    $this->assets->collection('footer');
?>
<style type="text/css">
    select {margin:5px 0px;}
    .table th, .table td {vertical-align: middle;}
    .table td input { margin:0px; }
</style>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <form action="tuangou.php" method="POST">
                    <table class="table table-striped table-bordered table-hover category-list-table">
                        <thead>
                            <tr>
                                <th class="span1"><!-- 编号 --></th>
                                <th class="span3">分类名称</th>
                                <th class="span1">排序</th>
                                <!-- <th class="span2">是否可用</th> -->
                                <!-- <th class="span2">修改时间</th> -->
                                <th class="span2">操作</th>
                            </tr>
                        </thead>
                        <tbody id="category-table-body">
                            {% if category_list is iterable %}
                            {% for key, item in category_list %}
                            <tr class="tuangrou_category_{$item.category_id}{if $item.enabled eq 0} error{/if}">
                                <td><!-- {$item.category_id} --></td>
                                <td>
                                    <div class="category-level-lv{{ item['level'] }}">
                                        {{ item['name'] }}({{ item['cid'] }})
                                    </div>
                                </td>
                                <td>{{ item['sort_order'] }}
                                <!-- <td>&nbsp;</td> -->
                                <td>
                                    <!-- <a href="tuangou.php?act=manage&id={$item.category_id}">更新</a> -->
                                    {% if item['is_parent'] == 'false' %}
                                    <a href="/taobao/property/index/{{item['cid']}}">查看属性</a>
                                    {% endif %}
                                </td>
                            </tr>
                            {% endfor %}
                            {% endif %}
                        </tbody>
                    </table>
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
    </script>