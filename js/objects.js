function initialize() {

var from = (document.getElementById('from'));
var autocomplete = new google.maps.places.Autocomplete(from);
var to = (document.getElementById('to'));
var autocomplete = new google.maps.places.Autocomplete(to);
	
}

google.maps.event.addDomListener(window, 'load', initialize);