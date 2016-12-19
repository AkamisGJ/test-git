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

					    <div id="map" style="margin-bottom: 40px;"></div>

					   <script type="text/javascript">

						//Cordonné ['Name', lat, lng]
						var pos_markers = [
							['Saint Symphorien D\'ozon', 45.638927, 4.867375],
							['Tournon sur Rhone', 45.031149, 4.776435],
							['Valence', 44.933869, 4.888669],
							['Longo-Mai', 43.977848, 5.744968],
						];

						var textcontent = [
							['<h3>La maison !</h3>'+
							"C'est ici que tout a commencer"],

							['<h3>LA GRANGE DE SUZEUX</h3>'+
'<div class="address">07300 PLATS</div>'+
'<div class="descr">Je vous accueille dans une petite ferme qui produit une grande variété de fruits et légumes.'+
'Située à quelques minutes de Tournon, charmante petite ville de la Vallée du Rhône, ma ferme est blottie dans un'+
' écrin de verdure paisible avec vue sur les collines et montagnes de l\'Ardèche verte. De belles randonnées '+
'sont possibles aux alentours. Entre ma ferme et Tournon, il y a de magnifiques points de vue sur la Vallée'+
' du Rhône et les Alpes. J\'ai eu la chance d\'avoir des parents qui ont été des pionniers de l\'agriculture '+
'biologique dés 1970. J\'ai vécu, de 2004 à 2010, dans un éco-lieu où l\'on expérimente pleins d\'alternatives '+
'pour un mode de vie très écologique et sobre. Ça m\'a beaucoup appris. J\'ai abandonné le labour et mis en '+
'pratique des techniques de permaculture et le BRF, qui permettent d\'aller encore plus loin dans le respect de '+
'la nature et la restauration des équilibres biologiques. L\'irrigation des légumes se fait à l\'eau de pluie'+
'stockée dans une grande citerne enterrée (130 m3). L\'électricité est fournie par Enercoop (coopérative'+
'd\'énergies renouvelables). Je vends mes productions sur les marchés de Tournon le samedi matin, et le mercredi '+'matin pendant la belle saison. Je participe aussi à quelques petites foires. Une serre bioclimatique vient '+
'd\'être réalisée pour mieux réussir la préparation des plants de légumes. Projets : installation '+
'd\'une autre serre, élevage de quelques poules pondeuses, plantations d\'arbres fruitiers, création d\'un réseau'+ 'd\'irrigation par goutte à goutte. Français parlé et quelques notions d\'anglais.</div>'],

							['<h3>Valence</h3>'+
							'Je vais rester quelques jours chez des amis qui m\'heberge avant que je rejoigne Longo-mai'],

							['<h3>Longo-Mai</h3>'+
							'La Coopérative européenne Longo Maï1 est une coopérative agricole et artisanale '+
							'autogérée, internationale, d’inspiration alternative, libertaire, laïque, rurale et anticapitaliste.'+
							'Fondée en 1973 à Limans (Alpes-de-Haute-Provence), elle regroupe aujourd\'hui en réseau dix coopératives en France, Allemagne, Autriche, Suisse, Ukraine, Costa Rica.'+
							'</br><a href="http://www.prolongomaif.ch/">Site web</a>'],

];


						function initMap() {
						  //Création de la map
						  var map = new google.maps.Map(document.getElementById('map'), {
						    zoom: 8,
						    center: {lat: 45.638927, lng: 4.867375}
						    });
						  setMarkers(map);
						}

						  function setMarkers(map) {
							  for (var i = 0; i < pos_markers.length; i++) {
							    var markers = pos_markers[i];
							    var marker = [];
							    marker[i] = new google.maps.Marker({
							      position: {lat: markers[1], lng: markers[2]},
							      map: map,
							      title: markers[0]
							    });


							  	var contentString = textcontent[i];
							  	var infowindow = new google.maps.InfoWindow({
							  		maxWidth : 430
							  	});

							  	google.maps.event.addListener(marker[i],'click', (function(marker,content,infowindow){ 
						        return function() {
						           infowindow.setContent(content);
						           infowindow.open(map,marker);
						        };
						    })(marker[i],contentString[0],infowindow)); 

			  	
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
