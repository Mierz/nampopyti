var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var kiev = new google.maps.LatLng(50.447124, 30.520241);
  var mapOptions = {
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
	disableDefaultUI: true,
    center: kiev
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
  
  calcRoute();
}

function calcRoute() { 
	  var start = document.getElementById('route-from').value;
	  var end = document.getElementById('route-to').value; 

	  var waypts = [];
	  var checkboxArray = document.getElementById('my_select');
	  for (var i = 0; i < checkboxArray.length; i++) {		
		  if (checkboxArray.options[i].value != '') {
		  waypts.push({
			  location:checkboxArray[i].value,
			  stopover:true});
		}
			
	  }  

	  var request = {
		  origin: start,
		  destination: end,
		  waypoints: waypts,
		  optimizeWaypoints: true,
		  travelMode: google.maps.TravelMode.DRIVING
	  };
	  
	  directionsService.route(request, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
		  directionsDisplay.setDirections(response);
		  
		}
	  });
 
}

google.maps.event.addDomListener(window, 'load', initialize);