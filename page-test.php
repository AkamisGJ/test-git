<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Nisarg
 */

get_header(); ?>
<head>
    <style type="text/css">
      #map { height: 700px;}
    </style>
  </head>
		<div class="container">
            <div class="row">
				<div id="primary" class="col-md-9 content-area">
					<main id="main" class="site-main" role="main">
						 <body>
						 	<h2>Le trajet</h2>
						 		<ol>
						 			<li>Test</li>
						 		</ol>
						    <div id="map"></div>
						    <script type="text/javascript">

						function initMap() {
							//Cordonné
						  var myLatLng_home = {lat: 45.765136, lng: 4.835464};
						  var myLatLng_valence = {lat: 44.933869, lng: 4.888669};

						  //Création de la map
						  var map = new google.maps.Map(document.getElementById('map'), {
						    zoom: 8,
						    center: myLatLng_home
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
						    position: myLatLng_home,
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

						    </script>
						    <script async defer
						      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUDSoEIOBqX8sO4fNzdk2JgMXWOX7cPPE&callback=initMap">
						    </script>
						  </body>
					

					</main><!-- #main -->
				</div><!-- #primary -->

				<?php get_sidebar('sidebar-1'); ?>		

			</div> <!--.row-->            
        </div><!--.container-->
        <?php get_footer(); ?>
