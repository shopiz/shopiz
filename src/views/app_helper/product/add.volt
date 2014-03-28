<?php
	$this->assets->collection("head");
	$this->assets->collection("footer")
		->addJs("ui/js/tinymce/tinymce.min.js");
?>

<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN SAMPLE FORM PORTLET-->
		<div class="portlet box blue tabbable">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-reorder"></i>
					<span class="hidden-480">商品信息</span>
				</div>
			</div>

			<div class="portlet-body form">

				<div class="tabbable portlet-tabs">

					<ul class="nav nav-tabs">

						<li><a href="#portlet_attribute" data-toggle="tab">商品属性</a></li>
						<li><a href="#portlet_picture" data-toggle="tab">商品图片</a></li>
						<li><a href="#portlet_detail" data-toggle="tab">商品详情</a></li>
						<li class="active"><a href="#portlet_base" data-toggle="tab">基本信息</a></li>

					</ul>

					<div class="tab-content">

						<div class="tab-pane active" id="portlet_base">
							<!-- BEGIN FORM-->
							<form action="#" class="form-horizontal">
								<div class="control-group">
									<label class="control-label">商品名称</label>
									<div class="controls">
										<input type="text" name="product_name" placeholder="" class="m-wrap large" />
										<span class="help-inline">请输入商品名称</span>
									</div>
								</div>
								<!-- <div class="control-group">
									<label class="control-label">淘宝编号</label>
									<div class="controls">
										<input type="text" placeholder="small" class="m-wrap small" disabled />
										<span class="help-inline"></span>
									</div>
								</div> -->

								<div class="control-group">
									<label class="control-label">商品货号</label>
									<div class="controls">
										<input type="text" name="product_sn" placeholder="" class="m-wrap medium" />
										<span class="help-inline">唯一编号，不能修改</span>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">商品分类</label>
									<div class="controls">
										<select data-placeholder="请选择商品分类" class="chosen span6" multiple="multiple">
											<option value=""></option>
											<optgroup label="NFC EAST">
												<option>Dallas Cowboys</option>
												<option>&nbsp;&nbsp;New York Giants</option>
												<option>Philadelphia Eagles</option>
												<option>Washington Redskins</option>
											</optgroup>
										</select>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Checkbox</label>
									<div class="controls">
										<label class="checkbox">
										<input type="checkbox" value="" /> Checkbox 1
										</label>
										<label class="checkbox">
										<input type="checkbox" value="" /> Checkbox 2
										</label>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">上架状态</label>
									<div class="controls">
										<div class="text-toggle-button">
											<input name="is_on_sale" type="checkbox" class="toggle" value="1" />
										</div>
									</div>
								</div>

								<div class="form-actions">
									<button type="submit" class="btn blue"><i class="icon-ok"></i>保存</button>
									<button type="button" class="btn">取消</button>
								</div>
							</form>
							<!-- END FORM-->
						</div>

						<div class="tab-pane" id="portlet_detail">
							<form>

								<div class="control-group">
									<div class="controls">
										<div class="text-toggle-button">
											<textarea>Your content here.</textarea>
										</div>
									</div>
								</div>

								<div class="form-actions">
									<button type="submit" class="btn blue"><i class="icon-ok"></i>保存</button>
									<button type="button" class="btn">取消</button>
								</div>
							</form>
						</div>

						<div class="tab-pane" id="portlet_picture">
							<form>
								<div class="form-actions">
									<button type="submit" class="btn blue"><i class="icon-ok"></i>保存</button>
									<button type="button" class="btn">取消</button>
								</div>
							</form>
						</div>

						<div class="tab-pane " id="portlet_attribute">
							<form action="#">
								<div class="form-actions">
									<button type="submit" class="btn blue"><i class="icon-ok"></i>保存</button>
									<button type="button" class="btn">取消</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END SAMPLE FORM PORTLET-->
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {

	App.init();

	$("form input[name=is_on_sale]").parent().toggleButtons({
        width: 200,
        label: {
            enabled: "上架",
            disabled: "下架"
        }
    });

    tinymce.init({
    	selector:'textarea',
    	skin:'lightgray',
    	language:'zh_CN',
    	paste_data_images:true,
    	paste_as_text:true,
    	paste_preprocess: function(plugin, args) {
			console.log(args.content);
	        args.content += ' preprocess';
    	},
    	paste_postprocess: function(plugin, args) {
	        console.log(args.node);
	        args.node.setAttribute('id', '42');
	    },
	    paste_word_valid_elements: "b,strong,i,em,h1,h2",

    	autosave_interval: "30s",

    	plugins: [
    		"advlist autolink lists link image charmap print preview anchor",
	        "searchreplace visualblocks code fullscreen",
	        "insertdatetime table contextmenu paste"
    	],
    	image_advtab: true
    });
});
</script>