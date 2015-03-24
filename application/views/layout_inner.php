<!DOCTYPE html>
<html lang="ru">
<head>
<title><?php $title_for_layout ?></title>
<link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet/less" type="text/css" href="/public/style/base.less">
<script src="/public/js/less.min.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<style>
div { border: 0px solid #000; }	
#map { height: 200px; }
</style>
</head>
<body>
	
<div class="container">
	<div class="row-fluid">

		<div class="span4">
			<a href="/" class="logo"></a>
		</div>

		<div class="span4">
		</div>

		<div class="span4">
			<? $nav ?>
			<ul class="nav nav-pills pull-right" style="margin-bottom: 0;">
				<li class="active">
			    	<a href="/">Главная</a>
			  	</li>			  	
			  	<li><a href="/auth/register">Присоединится</a></li>
			  	<li><a href="/auth/login">Войти</a></li>
			</ul>
		</div>
	</div>
	
	<?php echo $content_for_layout ?>

	<div class="row-fluid">
		<div class="span12">
			footerfdg
		</div>
	</div>
</div>
</body>
</html>