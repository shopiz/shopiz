<?php
	$this->assets->collection("head")
		->addCss("ui/css/??jquery.tagsinput.css,colorpicker.css,bootstrap-toggle-buttons.css,daterangepicker.css,datetimepicker.css,multi-select-metro.css");
	$this->assets->collection("footer")
		->addJs("ui/js/??jquery.tagsinput.min.js,jquery.toggle.buttons.js,bootstrap-datetimepicker.js,daterangepicker.js,bootstrap-colorpicker.js,jquery.multi-select.js,form-components.js,app/product.js");
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

						<li><a href="#portlet_tab3" data-toggle="tab">商品属性</a></li>

						<li><a href="#portlet_tab2" data-toggle="tab">商品图片</a></li>

						<li class="active"><a href="#portlet_tab1" data-toggle="tab">基本信息</a></li>

					</ul>

					<div class="tab-content">

						<div class="tab-pane active" id="portlet_tab1">

							<!-- BEGIN FORM-->

							<form action="#" class="form-horizontal">

								<div class="control-group">

									<label class="control-label">商品名称</label>

									<div class="controls">

										<input type="text" name="product_name" placeholder="" class="m-wrap large" />

										<span class="help-inline">请输入商品名称</span>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label">淘宝编号</label>

									<div class="controls">

										<input type="text" placeholder="small" class="m-wrap small" disabled />

										<span class="help-inline"></span>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label">商品货号</label>

									<div class="controls">

										<input type="text" name="product_sn" placeholder="" class="m-wrap medium" />

										<span class="help-inline">Some hint here</span>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label">Small Dropdown</label>

									<div class="controls">

										<select data-placeholder="Your Favorite Football Teams" class="chosen span6" multiple="multiple" tabindex="6">

											<option value=""></option>

											<optgroup label="NFC EAST">

												<option>Dallas Cowboys</option>

												<option>New York Giants</option>

												<option>Philadelphia Eagles</option>

												<option>Washington Redskins</option>

											</optgroup>

											<optgroup label="NFC NORTH">

												<option selected>Chicago Bears</option>

												<option>Detroit Lions</option>

												<option>Green Bay Packers</option>

												<option>Minnesota Vikings</option>

											</optgroup>

										</select>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label">Medium Dropdown</label>

									<div class="controls">

										<select class="medium m-wrap" tabindex="1">

											<option value="Category 1">Category 1</option>

											<option value="Category 2">Category 2</option>

											<option value="Category 3">Category 5</option>

											<option value="Category 4">Category 4</option>

										</select>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label">Large Dropdown</label>

									<div class="controls">

										<select class="large m-wrap" tabindex="1">

											<option value="Category 1">Category 1</option>

											<option value="Category 2">Category 2</option>

											<option value="Category 3">Category 5</option>

											<option value="Category 4">Category 4</option>

										</select>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label">Radio Buttons</label>

									<div class="controls">

										<label class="radio">

										<input type="radio" name="optionsRadios1" value="option1" />

										Option 1

										</label>

										<label class="radio">

										<input type="radio" name="optionsRadios1" value="option2" checked />

										Option 2

										</label>

										<label class="radio">

										<input type="radio" name="optionsRadios1" value="option2" />

										Option 3

										</label>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label">Radio Buttons</label>

									<div class="controls">

										<label class="radio line">

										<input type="radio" name="optionsRadios2" value="option1" />

										Option 1

										</label>

										<label class="radio line">

										<input type="radio" name="optionsRadios2" value="option2" checked />

										Option 2

										</label>

										<label class="radio line">

										<input type="radio" name="optionsRadios2" value="option2" />

										Option 3

										</label>

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

									<label class="control-label">Checkbox</label>

									<div class="controls">

										<label class="checkbox line">

										<input type="checkbox" value="" /> Checkbox 1

										</label>

										<label class="checkbox line">

										<input type="checkbox" value="" /> Checkbox 2

										</label>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label">上架状态</label>

									<div class="controls">

										<div class="text-toggle-button">

											<input type="checkbox" class="toggle" />

										</div>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label">Textarea</label>

									<div class="controls">

										<textarea class="medium m-wrap" rows="3"></textarea>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label">Large Textarea</label>

									<div class="controls">

										<textarea class="large m-wrap" rows="3"></textarea>

									</div>

								</div>

								<div class="form-actions">

									<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>

									<button type="button" class="btn">Cancel</button>

								</div>

							</form>

							<!-- END FORM-->

						</div>

						<div class="tab-pane " id="portlet_tab2">

							<form>

								<div class="controls controls-row">

									<input class="span12 m-wrap" type="text" placeholder=".span12" />

								</div>

								<div class="controls controls-row">

									<input class="span11 m-wrap" type="text" placeholder=".span11" />

									<input class="span1 m-wrap" type="text" placeholder=".span1" />

								</div>

								<div class="controls controls-row">

									<input class="span10 m-wrap" type="text" placeholder=".span10" />

									<input class="span2 m-wrap" type="text" placeholder=".span2" />

								</div>

								<div class="controls controls-row">

									<input class="span9 m-wrap" type="text" placeholder=".span9" />

									<input class="span3 m-wrap" type="text" placeholder=".span3" />

								</div>

								<div class="controls controls-row">

									<input class="span8 m-wrap" type="text" placeholder=".span8" />

									<input class="span4 m-wrap" type="text" placeholder=".span4" />

								</div>

								<div class="controls controls-row">

									<input class="span7 m-wrap" type="text" placeholder=".span7" />

									<input class="span5 m-wrap" type="text" placeholder=".span5" />

								</div>

								<div class="controls controls-row">

									<input class="span6 m-wrap" type="text" placeholder=".span6" />

									<input class="span6 m-wrap" type="text" placeholder=".span6" />

								</div>

								<div class="controls controls-row">

									<input class="span5 m-wrap" type="text" placeholder=".span5" />

									<input class="span7 m-wrap" type="text" placeholder=".span7" />

								</div>

								<div class="controls controls-row">

									<input class="span4 m-wrap" type="text" placeholder=".span4" />

									<input class="span8 m-wrap" type="text" placeholder=".span8" />

								</div>

								<div class="controls controls-row">

									<input class="span3 m-wrap" type="text" placeholder=".span3" />

									<input class="span9 m-wrap" type="text" placeholder=".span9" />

								</div>

								<div class="controls controls-row">

									<input class="span2 m-wrap" type="text" placeholder=".span2" />

									<input class="span10 m-wrap" type="text" placeholder=".span10" />

								</div>

								<div class="controls controls-row">

									<input class="span1 m-wrap" type="text" placeholder=".span1" />

									<input class="span11 m-wrap" type="text" placeholder=".span11" />

								</div>

								<div class="controls controls-row">

									<input class="span2 m-wrap" type="text" placeholder=".span2" />

									<input class="span3 m-wrap" type="text" placeholder=".span3" />

									<input class="span4 m-wrap" type="text" placeholder=".span4" />

									<input class="span2 m-wrap" type="text" placeholder=".span2" />

									<input class="span1 m-wrap" type="text" placeholder=".span1" />

								</div>

							</form>

						</div>

						<div class="tab-pane " id="portlet_tab3">

							<h4>Login Form</h4>

							<form action="#">

								<input type="text" class="m-wrap" placeholder="Email" /><br />

								<input type="password" class="m-wrap" placeholder="Password" />

								<label class="checkbox">

								<input type="checkbox" /> Remember me

								</label>

								<button type="submit" class="btn green">Sign in</button>

							</form>

							<hr />

							<h4>Login Form</h4>

							<form action="#">

								<div class="input-icon left">

									<i class="icon-envelope"></i>

									<input type="text" class="m-wrap" placeholder="Email" />

								</div>

								<div class="input-icon left">

									<i class="icon-lock"></i>

									<input type="password" class="m-wrap" placeholder="Password" />

								</div>

								<label class="checkbox">

								<input type="checkbox" /> Remember me

								</label>

								<button type="submit" class="btn purple">Sign in</button>

							</form>

							<hr />

							<form action="#">

								<div class="input-prepend">

									<button class="btn blue">Login</button><input class="m-wrap" size="16" type="password" placeholder="Your Password" />

								</div>

							</form>

							<h4>Search Form</h4>

							<form action="#">

								<div class="input-append hidden-phone">

									<input class="m-wrap medium" size="10" type="text" placeholder="Twitter Username" /><button class="btn red">Search</button><button class="btn black">Back</button>

								</div>

								<div class="input-append visible-phone">

									<input class="m-wrap" size="10" type="text" placeholder="Twitter Username" /><button class="btn red">Search</button><button class="btn black">Back</button>

								</div>

							</form>

							<hr />

							<form action="#" class="form-search">

								<div class="input-append">

									<input class="m-wrap" type="text" /><button class="btn green" type="button">Search!</button>

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