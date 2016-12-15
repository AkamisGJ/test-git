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
							//Cordonné
						  var myLatLng_sso = {lat: 45.638927, lng: 4.867375};
						  var myLatLng_valence = {lat: 44.933869, lng: 4.888669};

						  //Création de la map
						  var map = new google.maps.Map(document.getElementById('map'), {
						    zoom: 8,
						    center: myLatLng_sso
						  });

						  //Marker avec animation
						  var marker = new google.maps.Marker({
						    position: myLatLng_valence,
						    map: map,
						    title: 'Valence',
						    animation : google.maps.Animation.BOUNCE
						  });

						  	var icone = 'icon.png';
						  	//Autre marker
						    var marker1 = new google.maps.Marker({
						    position: myLatLng_sso,
						    map: map,
						    animation : google.maps.Animation.DROP,
						    title: 'Maison !'
						  });

						  //Affichage d'une fenettre d'info quand on clique sur le marker
						  var info_content = '<h1>Valence</h1>'+
						  '<p>C\'est la que je vais ! </p>';

						  var infowindow = new google.maps.InfoWindow({
						   		content : info_content,
						   		maxWidth: 300
						   });

						   marker.addListener('click', function() {
						    infowindow.open(map, marker);
						    marker.setAnimation(null);
						  });

						  //Polyline
						  var path_chemin = [
						  {lat: 45.765136, lng: 4.835464},
						  {lat: 44.933869, lng: 4.888669}
						  ];
						  var chemin = new google.maps.Polyline({
						  	path : path_chemin,
						  	geodesic: true,
						  	editable : true,
						  	strokeColor : '#FF0000',
						  	strokeOpacity : 1
						  })

						  chemin.setMap(map);


						}

//<![CDATA[
var map = null;
function initialize() {
  var myOptions = {
    zoom: 8,
    center: new google.maps.LatLng(43.907787,-79.359741),
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("map_canvas"),
                                myOptions);
 
  google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
        });

  // Add markers to the map
  // Set up three markers with info windows 
    
      var point = new google.maps.LatLng(43.65654,-79.90138); 
      var marker = createMarker(point,'<div style="width:240px">Some stuff to display in the First Info Window. With a <a href="http://www.econym.demon.co.uk">Link<\/a> to Mike Williams&apos; home page<\/div>')
 
      var point = new google.maps.LatLng(43.91892,-78.89231);
      var marker = createMarker(point,'Some stuff to display in the<br>Second Info Window')
 
      var point = new google.maps.LatLng(43.82589,-79.10040);
      var marker = createMarker(point,'Some stuff to display in the<br>Third Info Window')

}
 
var infowindow = new google.maps.InfoWindow(
  { 
    size: new google.maps.Size(150,50)
  });
    
function createMarker(latlng, html) {
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
        });
}
 

    // This Javascript is based on code provided by the
    // Community Church Javascript Team
    // http://www.bisphamchurch.org.uk/   
    // http://econym.org.uk/gmap/
    // from the v2 tutorial page at:
    // http://econym.org.uk/gmap/basic1.htm 
//]]>


    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUDSoEIOBqX8sO4fNzdk2JgMXWOX7cPPE&callback=initMap">
    </script>
  </body>
</html>




