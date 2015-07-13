var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var chicago = new google.maps.LatLng(50.449268, 30.519554);
  
  var mapOptions = {
    zoom:7,
	disableDefaultUI: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: chicago
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
}

function calcRoute() {	
	if(document.getElementById('from').value.length > 10 && document.getElementById('to').value.length > 10) {
  var start = document.getElementById('from').value;
  var end = document.getElementById('to').value;
	  var request = {
		  origin:start,
		  destination:end,
		  travelMode: google.maps.DirectionsTravelMode.DRIVING
	  };
	  directionsService.route(request, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
		  directionsDisplay.setDirections(response);
		}
	  });
  }
}

google.maps.event.addDomListener(window, 'load', initialize);