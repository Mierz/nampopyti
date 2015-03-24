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

		<div class="span4 man_top">
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
			footer
		</div>
	</div>
</div>

<script>
var from = (document.getElementById('from'));
var to = (document.getElementById('to'));
new google.maps.places.Autocomplete(from);
new google.maps.places.Autocomplete(to);


/*
var map;
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(-34.397, 150.644)
  };
  map = new google.maps.Map(document.getElementById('map'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);


function showroute() {
	alert('ok');
	var directionsDisplay = new google.maps.DirectionsRenderer();
	var directionsService = new google.maps.DirectionsService();
	var start = document.getElementById("from").innerHTML;
	var end = document.getElementById("to").innerHTML;
	var request = { origin:start, destination:end, travelMode: google.maps.DirectionsTravelMode.DRIVING };
	directionsService.route(request, function(response, status) {
	      if (status == google.maps.DirectionsStatus.OK) {
	        directionsDisplay.setDirections(response);
	        var myRoute = response.routes[0].legs[0];
	        document.getElementById("other").innerHTML+=start+' - '+end+': <b>'+myRoute.distance.text+'</b><br>';
	      }
	     });
	directionsDisplay.setMap(map);
}*/
</script>
</body>
</html>