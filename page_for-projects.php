<?php
/**
 * Template Name: Project Page Template
 * Template Post Type: post
**/

// TO SHOW THE PAGE CONTENTS

get_header(); 
while ( have_posts() ) : the_post(); ?>
	<!-- Left side with info -->
	<?php 
		$my_post_categories = get_the_category();
		$motorbikes_child_cat = "";
		
		foreach ( $my_post_categories as $post_cat ) {
			if ( $post_cat->cat_name !== "projects" ) {
				$motorbikes_child_cat = $post_cat->cat_name;
			}
		}
	?>
<div class="pseudo-select project-page">
</div>

<div class="row-fluid project-slider-container loaded">
	<div class="slideshow-custom-wrapper">
		<div class="main-carousel">
			<?php

				// check if the repeater field has rows of data
				if( have_rows('slider_images') ):

				// loop through the rows of data
				while ( have_rows('slider_images') ) : the_row(); ?>
					<?php $image = get_sub_field('slider_image') ?>
					<div class="carousel-cell">
						<img class="carousel-cell-image" src="<?php echo wp_get_attachment_image_src($image, "slider-small")[0]?>" title="#htmlcaption" alt="">
					</div>
				<?php 
				endwhile;

				else :

				// no rows found

				endif;

			?>
		</div>
		<div class="project-caption">
			<span class="projectName"><?php the_title() ?></span> 
			<span class="projectCategory"><?php echo get_the_category()[1]->cat_name ?></span>
        </div>
		<button class="custom-prev-next-button left"></button>
		<button class="custom-prev-next-button right"></button>
	
	</div>
	<div class="downArrow">
		<a href="#wrapper">
		</a>
	</div>
</div>
<div class="row-fluid single-project" id="wrapper">
	<div class="projectContent">
		<div class="row-fluid projectTitleHeader animate invisible">
			<div class="projectTitle">
				<h3><?php the_title() ?></h3>
				<p><?php echo $motorbikes_child_cat ?></p>
			</div>
			<div class="mapAndShare">
				<div class="projectMap">
				<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
				<a href="#map">查看地图</a>
				<?php else: ?>
				<a href="#map">View Map</a>
				<?php endif; ?>
				</div>
				<div class="projectShare">
					<a>Share</a>
				</div>
				<?php if(get_field('project_video')): ?>
				<div class="projectVideo">
					<a>Video</a>
				</div>
				<?php endif; ?>
				<div style="clear:both;"></div> 
			</div>
			<div style="clear:both;"></div> 
		</div>
		<div class="social-drop-down closed mobile-hidden">
			<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
			<ul class="shareLinks">
				<li id="shareOnFacebook">
					<a href="<?php "https://www.facebook.com/sharer/sharer.php?u=" . $actual_link?>">Facebook</a>
				</li>
				<li id="shareOnLinkedIn">
					<a href="">LinkedIn</a>
				</li>
				<li id="shareOnPintrest">
					<a href="">Pintrest</a>
				</li>
				<li id="shareOnInstagram">
					<a href="">Instagram</a>
				</li>
			</ul>
		</div>
		<div class="row-fluid projectDescription animate invisible">
			<p style="width: 66.66%"><?php echo get_the_content() ?></p>
		</div>
		<div class="row-fluid projectMeta closed">
			<div class="leftMeta animate invisible">
				<p><strong class="facts-and-figures">Facts + Figures</strong></p>
				<p><strong class="border-top">Location</strong></p>
				<p><?php echo get_field('project_city') ?>, <?php echo get_field('project_country') ?></p>
				<br>
				<?php if(get_field('project_area')): ?>
				<p><strong class="border-top">Area</strong></p>
				<p><?php the_field('project_area') ?></p>
				<?php endif; ?>
				<br>
				<?php if(get_field('scope')): ?>
				<p><strong class="border-top">Scope</strong></p>
				<p><?php the_field('scope') ?></p>
				<?php endif; ?>
				<br>
				<?php if(get_field('collaborators')): ?>
				<p><strong class="border-top">Collaborators</strong></p>
				<p><?php the_field('collaborators') ?></p>
				<?php endif; ?>
				<br>
				<?php if(get_field('client')): ?>
				<p><strong class="border-top">Client</strong></p>
				<p><?php the_field('client') ?></p>
				<?php endif; ?>
			</div>
			<div class="rightMeta animate invisible">
				<?php if(get_field('status')): ?>
				<p><strong class="border-top">Status</strong></p>
				<p><?php the_field('status') ?></p>
				<br>
				<?php endif; ?>
				<!-- <p><strong class="border-top">Program</strong></p>
				<p>Mixed-use retail and entertainment development on Shenzhen Bay including:</p>
				<br>
				<p><strong><a href="">57 Room Luxury Bay Breeze Hotel</a></strong></p>
				<br>
				<p><strong><a href="">Food and Beverage “Village”</a></strong></p>
				<br>
				<p><strong><a href="">O’Plaza Mall</a></strong></p>
				<br>
				<p><strong><a href="">Mariot Executive Apartments</a></strong></p>
				<br>
				<p><strong><a href="">IMAX Theater</a></strong></p> -->
			</div>
			<div style="clear:both;"></div> 
		</div>
	</div>
	<div class="map-row">
		<template class="video-template" data-video-url="<?php the_field('project_video') ?>"></template>
	</div>
	<div class="map-row">
		<div id="map" class="mobile-map"></div>
	</div>
	<div class="relatedProjectsContent active">
		<div class="row-fluid relatedProjectsHeader">
			<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
			<h3>相关项目</h3>
			<?php else: ?>
			<h3>Related Mixed Use Projects</h3>
			<?php endif; ?>
			<p class="sm-hidden"> &nbsp; </p>
		</div>
		<div class="related-projects grid-2 animate invisible">
			<?php 
				if(have_rows('related_projects')):
					while(have_rows('related_projects')): the_row();
						$post_o = get_sub_field('embedded_post');
						if($post_o): 
							$post = $post_o;
							setup_postdata($post);
						?>
						<a href="<?php the_permalink(); ?>" class="project-thumb">
							<?php the_post_thumbnail('medium') ?>
							<div class='project-info'>
								<span class='project-title'>
									<?php the_title(); ?>
								</span>
								<span class='project-location'>
									<?php the_field('project_city') ?>, <?php the_field('project_country') ?>
								</span>
								<span class='project-category'>
									<?php echo get_the_category()[1]->cat_name ?>
								</span>
							</div>
						</a>
						<?php
						wp_reset_postdata(); 
						endif;
					endwhile;
				else:
				endif;
			?>
		</div>
	</div>
	<div class="mapContent sm-hidden">
		<!-- Code for generating a map -->
		<div id="map"></div>
	</div>
	<div class="shareProjectContent sm-hidden">
		<div class="row-fluid shareProjectTitle">
		<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
		<h3>分享项目</h3>
		<?php else: ?>
		<h3>Share This project</h3>
		<?php endif; ?>
			<!-- <p> &nbsp; </p> -->
			<div class="closeButton">
				<a></a>
			</div>
		</div>
		<div class="shareProjectIcons">
			<ul class="shareLinks">
				<li id="shareOnFacebook">
					<a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=" . $actual_link?>">Facebook</a>
				</li>
				<li id="shareOnLinkedIn">
					<a href="">LinkedIn</a>
				</li>
				<li id="shareOnPintrest">
					<a href="">Pintrest</a>
				</li>
				<li id="shareOnInstagram">
					<a href="">Instagram</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="shareProjectContent sm-hidden">
		<div class="row-fluid shareProjectTitle">
			<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
			<h3>分享项目</h3>
			<?php else: ?>
			<h3>Share This project</h3>
			<?php endif; ?>
			<!-- <p> &nbsp; </p> -->
			<div class="closeButton">
				<a></a>
			</div>
		</div>
	</div>
	<div class="projectVideoContent sm-hidden">
			<template class="video-template" data-video-url="<?php the_field('project_video') ?>"></template>
		</div>
	<div style="clear:both;"></div> 
</div>

<!-- Script for Map -->
<script>
  // Initialize and add the map
  var maps = [];

  function initMap() {
    // The location of Uluru
	console.log(<?php the_field('location') ?>);
    var coordArr = "<?php the_field('location') ?>".split(",");
	console.log(coordArr)
	var coords = {lat: parseFloat(coordArr[0]), lng: parseFloat(coordArr[1])}
    // The map, centered at Uluru
	document.querySelectorAll("#map").forEach( (el, i) => {
		var map = new google.maps.Map(
        el, {zoom: 13, center: coords, mapTypeId: 'satellite'});

    	// The marker, positioned at Uluru
   		var marker = new google.maps.Marker({
			   position: coords, 
			   map: map,
			   styles: [
						{
							"elementType": "geometry",
							"stylers": [
							{
								"color": "#f5f5f5"
							}
							]
						},
						{
							"elementType": "labels.icon",
							"stylers": [
							{
								"visibility": "off"
							}
							]
						},
						{
							"elementType": "labels.text.fill",
							"stylers": [
							{
								"color": "#616161"
							}
							]
						},
						{
							"elementType": "labels.text.stroke",
							"stylers": [
							{
								"color": "#f5f5f5"
							}
							]
						},
						{
							"featureType": "administrative.land_parcel",
							"elementType": "labels.text.fill",
							"stylers": [
							{
								"color": "#bdbdbd"
							}
							]
						},
						{
							"featureType": "poi",
							"elementType": "geometry",
							"stylers": [
							{
								"color": "#eeeeee"
							}
							]
						},
						{
							"featureType": "poi",
							"elementType": "labels.text.fill",
							"stylers": [
							{
								"color": "#757575"
							}
							]
						},
						{
							"featureType": "poi.park",
							"elementType": "geometry",
							"stylers": [
							{
								"color": "#e5e5e5"
							}
							]
						},
						{
							"featureType": "poi.park",
							"elementType": "labels.text.fill",
							"stylers": [
							{
								"color": "#9e9e9e"
							}
							]
						},
						{
							"featureType": "road",
							"elementType": "geometry",
							"stylers": [
							{
								"color": "#ffffff"
							}
							]
						},
						{
							"featureType": "road.arterial",
							"elementType": "labels.text.fill",
							"stylers": [
							{
								"color": "#757575"
							}
							]
						},
						{
							"featureType": "road.highway",
							"elementType": "geometry",
							"stylers": [
							{
								"color": "#dadada"
							}
							]
						},
						{
							"featureType": "road.highway",
							"elementType": "labels.text.fill",
							"stylers": [
							{
								"color": "#616161"
							}
							]
						},
						{
							"featureType": "road.local",
							"elementType": "labels.text.fill",
							"stylers": [
							{
								"color": "#9e9e9e"
							}
							]
						},
						{
							"featureType": "transit.line",
							"elementType": "geometry",
							"stylers": [
							{
								"color": "#e5e5e5"
							}
							]
						},
						{
							"featureType": "transit.station",
							"elementType": "geometry",
							"stylers": [
							{
								"color": "#eeeeee"
							}
							]
						},
						{
							"featureType": "water",
							"elementType": "geometry",
							"stylers": [
							{
								"color": "#c9c9c9"
							}
							]
						},
						{
							"featureType": "water",
							"elementType": "labels.text.fill",
							"stylers": [
							{
								"color": "#9e9e9e"
							}
							]
						}
					]
			});
	
		maps.push(map)
	});
  }
  var elem = document.querySelector('.main-carousel');
  var flkty = new Flickity( elem, {
    // options
    contain: false,
    setGallerySize: false,
    draggable: false,
	wrapAround: true,
	autoPlay: 5000
  });

  function expandFacts(e) {
	e.currentTarget.classList.toggle("closed")
  }

  function expandSocialMedia(e) {
	document.querySelector(".social-drop-down").classList.toggle("closed");
  }

  document.querySelector(".projectMeta").addEventListener("click", expandFacts);
  document.querySelector(".projectShare").addEventListener("click", expandSocialMedia);

  document.querySelector(".custom-prev-next-button.right").addEventListener("click", playNext)
  document.querySelector(".custom-prev-next-button.left").addEventListener("click", playPrev)

  function playNext(e) {
    e.stopPropagation();
    flkty.next();
  }

  function playPrev(e) {
    e.stopPropagation();
    flkty.previous();
  }

  window.addEventListener("DOMContentLoaded", () => {
   setTimeout( ()=> {
     document.querySelector(".slideshow-custom-wrapper").classList.add("loaded")
   }, 2000)
  })
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJY5t-tXrIskhm6OZmUp0DnSytAlCwavA&callback=initMap"></script>
<?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
?>
<?php include('video-player.php') ?>
<?php get_footer(); ?> 