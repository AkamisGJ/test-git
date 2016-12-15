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
					 		<?php //The Loop 
					 		while ( have_posts() ) : the_post(); 
								 the_content();
							endwhile; // End of the loop. ?>

					    <div id="map"></div>

					   <script type="text/javascript">

						//Cordonné ['Name', lat, lng]
						var pos_markers = [
							['Saint Symphorien D\'ozon', 45.638927, 4.867375],
							['Tournon sur Rhone', 45.031149, 4.776435],
							['Valence', 44.933869, 4.888669],
							['Longo-Mai', 43.977848, 5.744968],
						];

						var pos_info =
							'<div id="content">'+
						      '<div id="siteNotice">'+
						      '</div>'+
						      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
						      '<div id="bodyContent">'+
						      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
						      'sandstone rock formation in the southern part of the '+
						      'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
						      'south west of the nearest large town, Alice Springs; 450&#160;km '+
						      '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
						      'features of the Uluru - Kata Tjuta National Park. Uluru is '+
						      'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
						      'Aboriginal people of the area. It has many springs, waterholes, '+
						      'rock caves and ancient paintings. Uluru is listed as a World '+
						      'Heritage Site.</p>'+
						      '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
						      'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
						      '(last visited June 22, 2009).</p>'+
						      '</div>'+
						      '</div>';


						function initMap() {
						  //Création de la map
						  var map = new google.maps.Map(document.getElementById('map'), {
						    zoom: 8,
						    center: {lat: 45.638927, lng: 4.867375}
						    });
						  setMarkers(map, pos_info);
						}

						  function setMarkers(map, html) {
							  for (var i = 0; i < pos_markers.length; i++) {
							    var markers = pos_markers[i];
							    var marker = [];
							    marker[i] = new google.maps.Marker({
							      position: {lat: markers[1], lng: markers[2]},
							      map: map,
							      title: markers[0]
							    });
							  	
							  	var contentString = html;
							  	var infowindow = new google.maps.InfoWindow({
							  		
							  	});

			  				 	marker[i].addListener('click', function() {
			  				 		infowindow.setContent(contentString);
							 		infowindow.open(map, marker[i]);
							  	});

			  					
							}
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
