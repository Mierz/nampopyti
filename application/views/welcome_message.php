<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Нам по пути</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
	<style>
	.logo {
		width: 310px;
		height: 51px;
		display: inline-block;
		background: url("/public/images/logo.png");
	}
	</style>
	
</head>
<body style="background: url('public/images/bg.png')">

<div class="container">

	<div class="row">
		<div class="col-md-12">
			<a href="/" class="logo"></a>
			<ul class="nav nav-pills pull-right">
			  <li role="presentation" class="active"><a href="/">Главная</a></li>
			  <li role="presentation"><a href="/routes/search">Поиск</a></li>
			  <li role="presentation"><a href="/session/register">Присоединится</a></li>
			  <li role="presentation"><a href="/session/login">Войти</a></li>
			</ul>
		</div>
	</div>

	<div class="jumbotron" style="background: #c3db65;">
		<div class="container">
		<div class="col-md-5">
		Найти попутку или<br/>попутчика не вставая<br/>с кресла?<br/>Легко!
		</div>
		<div class="col-md-3">
		</div>
		<div class="col-md-4">
			<form method="get" action="/routes/search">
				<div class="form-group">
					<input type="text" class="form-control" id="from" name="from" />
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="to" name="to" />
				</div>
				<div class="form-group">
					<input class="btn btn-default" style="background: #adc359; color: #fff; text-transform: uppercase;" type="submit" value="Поиск">
					<a href="/routes/create">Добавить</a>
				</div>
			</form>
		</div>		
	  </div>
	</div>

	

	<div class="row">

	<div class="col-md-6">
	<table class="table table-bordered">
		<tr>
			<th style="background: #f1464e;  color: #fff;">Ищут водителя</th>
		</tr>
		<?php		
		foreach ($companions as $companion) {
			echo "<tr><td style=\"background: #fff;\"><a href=\"/routes/view/$companion->id\">$companion->from => $companion->to</a></td></tr>";
		}
		?>
	</table>
	</div>

	<div class="col-md-6">
	<table class="table table-bordered">
		<tr>
			<th style="background: #b8e057; color: #fff;">Выезжающий транспорт</th>
		</tr>
		<?php		
		if(isset($driver)) 
		{
			foreach ($drivers as $driver) {
				echo "<tr><td style=\"background: #fff;\">$driver->from => $driver->to</td></tr>";
			}
		} else {
			echo "<tr><td>Нету маршрутов!</td></tr>";
		}		
		?>
	</table>
	</div>

	</div>

	<div class="jumbotron" style="background: #666666;">
		<div class="container">
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