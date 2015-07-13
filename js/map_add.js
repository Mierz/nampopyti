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

	var add_from = (document.getElementById('add-from'));
	var autocomplete = new google.maps.places.Autocomplete(add_from);
	var add_to = (document.getElementById('add-to'));
	var autocomplete = new google.maps.places.Autocomplete(add_to);

	var p1 = (document.getElementById('p1'));
	var autocomplete2 = new google.maps.places.Autocomplete(p1);	
	var p2 = (document.getElementById('p2'));
	var autocomplete3= new google.maps.places.Autocomplete(p2);
	var p3 = (document.getElementById('p3'));
	var autocomplete4= new google.maps.places.Autocomplete(p3);
	var p4 = (document.getElementById('p4'));
	var autocomplete5= new google.maps.places.Autocomplete(p4);
	var p5 = (document.getElementById('p5'));
	var autocomplete6= new google.maps.places.Autocomplete(p5);
	var p6 = (document.getElementById('p6'));
	var autocomplete7= new google.maps.places.Autocomplete(p6);

	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		calcRoute();
	});	
	google.maps.event.addListener(autocomplete2, 'place_changed', function() {
		addPoint1();
	});	
	google.maps.event.addListener(autocomplete3, 'place_changed', function() {
		addPoint2();
	});
	google.maps.event.addListener(autocomplete4, 'place_changed', function() {
		addPoint3();
	});
	google.maps.event.addListener(autocomplete5, 'place_changed', function() {
		addPoint4();
	});
	google.maps.event.addListener(autocomplete6, 'place_changed', function() {
		addPoint5();
	});
	google.maps.event.addListener(autocomplete7, 'place_changed', function() {
		addPoint6();
	});	
}

function calcRoute() {
	  var start = document.getElementById('add-from').value;
	  var end = document.getElementById('add-to').value; 
	  var waypts = [];
	  var checkboxArray = document.getElementById('my_select');
	  for (var i = 0; i < checkboxArray.length; i++) {
		if (checkboxArray.options[i].selected == true) {
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

function addPoint1() {
	if(document.getElementById('p1').value.length >= 10) {
		$("#my_select").append( $('<option value="'+ $("input[id='p1']").val() +'">'+ $("input[id='p1']").val() +'</option>'));
		$("#my_select :last").attr("selected", "selected");
	}
	calcRoute();
}
function addPoint2() {
	if(document.getElementById('p2').value.length >= 10) {
		$("#my_select").append( $('<option value="'+ $("input[id='p2']").val() +'">'+ $("input[id='p2']").val() +'</option>'));
		$("#my_select :last").attr("selected", "selected");
	}
	calcRoute();
}
function addPoint3() {
	if(document.getElementById('p3').value.length >= 10) {
		$("#my_select").append( $('<option value="'+ $("input[id='p3']").val() +'">'+ $("input[id='p3']").val() +'</option>'));
		$("#my_select :last").attr("selected", "selected");
	}
	calcRoute();
}
function addPoint4() {
	if(document.getElementById('p4').value.length >= 10) {
		$("#my_select").append( $('<option value="'+ $("input[id='p4']").val() +'">'+ $("input[id='p4']").val() +'</option>'));
		$("#my_select :last").attr("selected", "selected");
	}
	calcRoute();
}
function addPoint5() {
	if(document.getElementById('p5').value.length >= 10) {
		$("#my_select").append( $('<option value="'+ $("input[id='p5']").val() +'">'+ $("input[id='p5']").val() +'</option>'));
		$("#my_select :last").attr("selected", "selected");
	}
	calcRoute();
}
function addPoint6() {
	if(document.getElementById('p6').value.length >= 10) {
		$("#my_select").append( $('<option value="'+ $("input[id='p6']").val() +'">'+ $("input[id='p6']").val() +'</option>'));
		$("#my_select :last").attr("selected", "selected");
	}	
	calcRoute();
}

function delPoint() {
	$("#my_select :last").remove();
	calcRoute();
}

google.maps.event.addDomListener(window, 'load', initialize);