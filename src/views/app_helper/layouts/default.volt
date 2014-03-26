<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>{{page_title}} - {{config.site_name}}</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="/ui/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="/ui/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="/ui/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="/ui/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="/ui/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="/ui/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="/ui/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="/ui/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->

	{{ assets.outputCss('head') }}

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="/ui/image/favicon.ico" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="{{page}}">

	{{ content() }}

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

	<script src="/ui/js/jquery-1.10.1.min.js" type="text/javascript"></script>

	<script src="/ui/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="/ui/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

	<script src="/ui/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="/ui/js/excanvas.min.js"></script>

	<script src="/ui/js/respond.min.js"></script>

	<![endif]-->

	<script src="/ui/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="/ui/js/jquery.blockui.min.js" type="text/javascript"></script>

	<script src="/ui/js/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="/ui/js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="/ui/js/jquery.validate.min.js" type="text/javascript"></script>

	<script src="/ui/js/jquery.backstretch.min.js" type="text/javascript"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="/ui/js/app.js" type="text/javascript"></script>

    {{ assets.outputJs('footer') }}

</body>

</html>
