<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script type="text/javascript">

function initMap() {
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 7,
    center: {lat: 45.85, lng: 4.65}
  });
  directionsDisplay.setMap(map);
  calculateAndDisplayRoute(directionsService, directionsDisplay);
}

var myLatLng = new google.maps.LatLng(45.765136,4.835464);
var myLatLng2 = new google.maps.LatLng(44.933869,4.888669);

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  directionsService.route({
    origin: myLatLng,
    destination: myLatLng2,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUDSoEIOBqX8sO4fNzdk2JgMXWOX7cPPE&callback=initMap">
    </script>
  </body>
</html>