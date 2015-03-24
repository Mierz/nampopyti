<!DOCTYPE html>
<html lang="ru">
<head>
<title><?php $title_for_layout ?></title>
<link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<style>
div { border: 1px solid #000; }	
</style>
</head>
<body>
	
<div class="container">
	<div class="row-fluid">

		<div class="span3">
			<a href="/">logo</a>
		</div>

		<div class="span3">
		</div>

		<div class="span6">
			<? $nav ?>
			<ul class="nav nav-pills pull-right" style="margin-bottom: 0;">
				<li class="active">
			    	<a href="/">Главная</a>
			  	</li>			  	
			  	<li><a href="/session/register">Присоединится</a></li>
			  	<li><a href="/session/login">Войти</a></li>
			</ul>
		</div>
	</div>
	
	<?php echo $content_for_layout ?>

	<div class="row-fluid">
		<div class="span12">
			footer
		</div>
	</div>
</div>

<script>
var from = (document.getElementById('from'));
var to = (document.getElementById('to'));
new google.maps.places.Autocomplete(from);
new google.maps.places.Autocomplete(to);
</script>
</body>
</html>