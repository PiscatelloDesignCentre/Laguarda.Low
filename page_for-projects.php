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
	<div class="bar"><strong>PROJECTS</strong>&nbsp;&nbsp;<span class="selected-project-category"><?php echo $motorbikes_child_cat ?></span></div>
</div>

<div class="row-fluid slider-wrapper theme-laguardalowSlider singleProjectSlider loaded" id="check">
	<div id="slider" class="nivoSlider">
		<?php

			// check if the repeater field has rows of data
			if( have_rows('slider_images') ):

			// loop through the rows of data
			while ( have_rows('slider_images') ) : the_row(); ?>
				<?php $image = get_sub_field('slider_image') ?>
				<img src="<?php echo wp_get_attachment_image_src($image, "slider-small")[0]?>" title="#htmlcaption" alt="">

			<?php 
			endwhile;

			else :

			// no rows found

			endif;

		?>
	</div>
	<div id="htmlcaption" class="nivo-html-caption">
		<p><span class="projectName"><?php the_title() ?></span> </br> <span class="projectCategory"><?php echo $motorbikes_child_cat ?></span></p>
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
					<a>View Map</a>
				</div>
				<div class="projectShare">
					<a>Share</a>
				</div>
				<div style="clear:both;"></div> 
			</div>
			<div style="clear:both;"></div> 
		</div>
		<div class="row-fluid projectDescription animate invisible">
			<p style="width: 66.66%"><?php echo get_the_content() ?></p>
		</div>
		<div class="row-fluid projectMeta">
			<div class="leftMeta animate invisible">
				<p><strong class="facts-and-figures">Facts + Figures</strong></p>
				<p><strong class="border-top">Location</strong></p>
				<p>Shenzhen, China</p>
				<br>
				<p><strong class="border-top">Area</strong></p>
				<p>300,000m2</p>
				<br>
				<p><strong class="border-top">Scope</strong></p>
				<p>Master Plan Design and Master Architect for all commercial buildings; Interior Design of O’Plaza Mall</p>
				<br>
				<p><strong class="border-top">Collaborators</strong></p>
				<p>SWA Group (Landscape Design)</p>
				<br>
				<p><strong class="border-top">Client</strong></p>
				<p>OCT Group</p>
			</div>
			<div class="rightMeta animate invisible">
				<p><strong class="border-top">Status</strong></p>
				<p>Phase 1 Completed 2011</p>
				<p>Phase 2 Completed 2015</p>
				<br>
				<p><strong class="border-top">Program</strong></p>
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
				<p><strong><a href="">IMAX Theater</a></strong></p>
			</div>
			<div style="clear:both;"></div> 
		</div>
		<div class="backToCategory animate invisible sm-hidden">
			<a href="<?php echo get_site_url() ?>/projects/#mixeduse">
				<div id="backButton"></div>
				<div id="backToText"><p>VIEW MORE MIXED USE</p></div>
			</a>
		</div>
	</div>
	<div class="relatedProjectsContent active">
		<div class="row-fluid relatedProjectsHeader">
			<h3>Related Mixed Use Projects</h3>
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
									<?php the_field('location') ?>
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
	<div class="mapContent">
		<!-- Code for generating a map -->
		<div id="map"></div>
	</div>
	<div class="shareProjectContent">
		<div class="row-fluid shareProjectTitle">
			<h3>Share This project</h3>
			<!-- <p> &nbsp; </p> -->
			<div class="closeButton">
				<a></a>
			</div>
		</div>
		<div class="shareProjectIcons">
			<ul class="shareLinks">
				<li id="shareOnFacebook">
					<a href="">Facebook</a>
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
	<div style="clear:both;"></div> 
</div>

<!-- Script for Map -->
<script>
  // Initialize and add the map
  function initMap() {
    // The location of Uluru
    var octBay = {lat: 22.527588, lng: 113.993261};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 13, center: octBay, mapTypeId: 'satellite'});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: octBay, map: map});
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJY5t-tXrIskhm6OZmUp0DnSytAlCwavA&callback=initMap"></script>
<?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
?>
<?php get_footer(); ?> 