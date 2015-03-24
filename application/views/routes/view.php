<div class="row-fluid">
	<div class="span9">

	<?php 
	foreach ($route as $item) {
		echo "<h4><span id=\"from\">$item->from</span> => <span id=\"to\">$item->to</span></h4>";	
	?>

	<div id="map" >
	</div>

	<table class="table table-bordered">
		<tr>
			<td>Дата и время отправления:</td>
			<td><?php echo $item->departure_date ?></td>
		</tr>		
	</table>

	<?php } ?>

	</div>

	<div class="span3">
	<?php
	foreach ($user as $item) {
		echo $item->username;
	}
	?>
	</div>
</div>

<script>

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var center = new google.maps.LatLng(41.850033, -87.6500523);
  var mapOptions = {
    zoom: 6,
    center: center,
    disableDefaultUI: true
  }
  map = new google.maps.Map(document.getElementById('map'), mapOptions);
  directionsDisplay.setMap(map);

  var start = document.getElementById('from').innerHTML;
  var end = document.getElementById('to').innerHTML;
  
  var waypts = [];
  /*var checkboxArray = document.getElementById('waypoints');
  for (var i = 0; i < checkboxArray.length; i++) {
    if (checkboxArray.options[i].selected == true) {
      waypts.push({
          location:checkboxArray[i].value,
          stopover:true});
    }
  }*/

  var request = {
      origin: start,
      destination: end,
      //waypoints: waypts,
      //optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING
  };

  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      /*var route = response.routes[0];
      var summaryPanel = document.getElementById('directions_panel');
      summaryPanel.innerHTML = '';
      // For each route, display summary information.
      for (var i = 0; i < route.legs.length; i++) {
        var routeSegment = i + 1;
        summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment + '</b><br>';
        summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
        summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
        summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
      }*/
    }
  });
}

  


google.maps.event.addDomListener(window, 'load', initialize);




/*
alert('ok');

	var directionsDisplay = new google.maps.DirectionsRenderer();
	var directionsService = new google.maps.DirectionsService();
	var start = document.getElementById("from").innerHTML;
	var end = document.getElementById("to").innerHTML;
	var request = { origin:start, destination:end, travelMode: google.maps.DirectionsTravelMode.DRIVING };
	directionsService.route(request, function(response, status) {
	      if (status == google.maps.DirectionsStatus.OK) {
	        directionsDisplay.setDirections(response);
	        alert('ok');
	        var myRoute = response.routes[0].legs[0];
	        document.getElementById("other").innerHTML+=start+' - '+end+': <b>'+myRoute.distance.text+'</b><br>';
	      }
	     });
	directionsDisplay.setMap(map);*/

</script>