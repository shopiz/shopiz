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

						<button id="sample_editable_1_new" class="btn green">

						添加商品 <i class="icon-plus"></i>

						</button>

					</div>

					<div class="btn-group pull-right">

						<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>

						</button>

						<ul class="dropdown-menu pull-right">

							<li><a href="#">Print</a></li>

							<li><a href="#">Save as PDF</a></li>

							<li><a href="#">Export to Excel</a></li>

						</ul>

					</div>

				</div>

				<table class="table table-striped table-hover table-bordered" id="sample_editable_1">

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
								<a class="edit" href="javascript:;">Edit</a>
								<a class="delete" href="javascript:;">Delete</a>
							</td>

						</tr>

						<tr class="">

							<td>lisa</td>

							<td>Lisa Wong</td>

							<td>434</td>

							<td class="center">new user</td>

							<td><a class="edit" href="javascript:;">Edit</a></td>

							<td><a class="delete" href="javascript:;">Delete</a></td>

						</tr>

						<tr class="">

							<td>nick12</td>

							<td>Nick Roberts</td>

							<td>232</td>

							<td class="center">power user</td>

							<td><a class="edit" href="javascript:;">Edit</a></td>

							<td><a class="delete" href="javascript:;">Delete</a></td>

						</tr>

						<tr class="">

							<td>goldweb</td>

							<td>Sergio Jackson</td>

							<td>132</td>

							<td class="center">elite user</td>

							<td><a class="edit" href="javascript:;">Edit</a></td>

							<td><a class="delete" href="javascript:;">Delete</a></td>

						</tr>

						<tr class="">

							<td>webriver</td>

							<td>Antonio Sanches</td>

							<td>462</td>

							<td class="center">new user</td>

							<td><a class="edit" href="javascript:;">Edit</a></td>

							<td><a class="delete" href="javascript:;">Delete</a></td>

						</tr>

						<tr class="">

							<td>gist124</td>

							<td>Nick Roberts</td>

							<td>62</td>

							<td class="center">new user</td>

							<td><a class="edit" href="javascript:;">Edit</a></td>

							<td><a class="delete" href="javascript:;">Delete</a></td>

						</tr>

					</tbody>

				</table>

			</div>

		</div>

	</div>

</div>