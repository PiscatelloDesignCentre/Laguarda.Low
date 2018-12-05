<?php
/**
 * Template Name: Project Page Template
 * Template Post Type: post
**/

// TO SHOW THE PAGE CONTENTS

get_header(); 

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
<div class="row-fluid project-slider-container loaded">
	<div class="slideshow-custom-wrapper">
		<div class="main-carousel">
			<?php

				// check if the repeater field has rows of data
				if( have_rows('slider_images') ):
				$counter = 0;

				// loop through the rows of data
				while ( have_rows('slider_images') ) : the_row(); ?>
					<?php $image = get_sub_field('slider_image') ?>
					<div class="carousel-cell">
					<!-- $post->ID)[$counter]["mobile_image"]["url"]; echo "<pre>" . var_dump($mobileImage) -->
						<img 
							class="carousel-cell-image" 
							src="<?php echo wp_get_attachment_image_src($image, "slider-small")[0]?>" 
							title="#htmlcaption" alt=""
						>
					</div>
				<?php
				$counter++;
				endwhile;

				else :

				// no rows found

				endif;

			?>
		</div>
		<div class="project-caption">
			<span class="projectName"><?php the_title() ?></span> 
			<span class="projectCategory">
				<?php 
					$p_cat = get_the_category();
					foreach($p_cat as $category) {
						// var_dump($p_cat);
						if($category->cat_name != "Current" && $category->cat_name != "Projects") {
							echo $category->cat_name;
						}
					}
				?>
			</span>
        </div>
		<div class="homepage-quote empty sm-hidden"></div>
		<button class="custom-prev-next-button left"></button>
		<button class="custom-prev-next-button right"></button>
	
	</div>
	<a class href="#wrapper">
		<div class="downArrow"></div>
	</a>
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
				<div class="projectRelated active">
					<a>Related</a>
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
					<a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=" . $actual_link?>">Facebook</a>
				</li>
				<li id="shareOnLinkedIn">
					<a href="<?php echo "https://www.linkedin.com/shareArticle?mini=true&url=" . $actual_link ?>">LinkedIn</a>
				</li>
				<li id="shareOnPintrest">
					<a href="<?php echo "http://pinterest.com/pin/create/button/?url=" . $actual_link ?>">Pintrest</a>
				</li>
			</ul>
		</div>
		<div class="row-fluid projectDescription animate invisible">
			<div style="width: 66.66%"><?php echo get_the_content() ?></div>
		</div>
		<div class="row-fluid projectMeta closed">
			<div class="leftMeta animate invisible">
				<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
				<p><strong class="facts-and-figures">项目概况</strong></p>
				<?php else: ?>
				<p><strong class="facts-and-figures">Facts + Figures</strong></p>
				<?php endif; ?>		

				<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
				<p><strong class="border-top">位置</strong></p>
				<?php else: ?>
				<p><strong class="border-top">Location</strong></p>
				<?php endif; ?>
				<p><?php echo get_field('project_city') ?>, <?php echo get_field('project_country') ?></p>
				<br>
				<?php if(get_field('project_area')): ?>
				<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
				<p><strong class="border-top">规模</strong></p>
				<?php else: ?>
				<p><strong class="border-top">Area</strong></p>
				<?php endif; ?>
				<p><?php the_field('project_area') ?></p>
				<?php endif; ?>
				<br>
				<?php if(get_field('scope')): ?>
				<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
				<p><strong class="border-top">设计范围</strong></p>
				<?php else: ?>
				<p><strong class="border-top">Scope</strong></p>
				<?php endif; ?>
				<p><?php the_field('scope') ?></p>
				<?php endif; ?>
				<br>
				<?php if(get_field('collaborators')): ?>
				<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
				<p><strong class="border-top">合作方</strong></p>
				<?php else: ?>
				<p><strong class="border-top">Collaborators</strong></p>
				<?php endif; ?>
				<p><?php the_field('collaborators') ?></p>
				<?php endif; ?>
				<br>
				<?php if(get_field('client')): ?>
				<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
				<p><strong class="border-top">业主</strong></p>
				<?php else: ?>
				<p><strong class="border-top">Client</strong></p>
				<?php endif; ?>
				<p><?php the_field('client') ?></p>
				<?php endif; ?>
			</div>
			<div class="rightMeta animate invisible">
				<?php if(get_field('status')): ?>
				<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
				<p><strong class="border-top">项目状态</strong></p>
				<?php else: ?>
				<p><strong class="border-top">Status</strong></p>
				<?php endif; ?>
				<p><?php the_field('status') ?></p>
				<br>
				<?php endif; ?>
				<?php if(get_field('program')): ?>
				<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
				<p><strong class="border-top">项目类型</strong></p>
				<?php else: ?>
				<p><strong class="border-top">Program</strong></p>
				<?php endif; ?>
				<p><strong><?php the_field('program') ?></strong></p>
				<?php endif; ?>
			</div>
			<div style="clear:both;"></div> 
		</div>
		<div class="backToCategory">
		<?php $cats = get_the_category() ?>
		<?php foreach ( $cats as $cat ): ?>
			<?php if(str_replace("-zh-hans", "", $cat->slug) !== "projects" && str_replace("-zh-hans", "", $cat->slug) !== "current"):?>
				<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
				<a href="<?php echo get_site_url() ?>/zh-hans/projects/#<?php echo str_replace("-zh-hans", "", $cat->slug) ?>">
					<div id="backButton"></div>
					<div id="backToText"><p>返回 <?php echo $cat->cat_name ?></p></div>
				</a>
				<?php else: ?>
				<a href="<?php echo get_site_url() ?>/projects/#<?php echo str_replace("-zh-hans", "", $cat->slug) ?>">
					<div id="backButton"></div>
					<div id="backToText"><p>BACK TO <?php echo $cat->cat_name ?></p></div>
				</a>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; ?>
		</div>
	</div>
	<?php if(get_field('project_video')): ?>
	<div class="map-row mobile-hidden">
		<template class="video-template" data-video-url="<?php the_field('project_video') ?>" data-video-poster="<?php the_field('project_video_thumbnail')?>" data-video-title=""></template>
	</div>
	<?php endif; ?>
	<div class="map-row">
		<div id="map" class="mobile-map"></div>
	</div>
	<div class="relatedProjectsContent active">
		<div class="row-fluid relatedProjectsHeader">
			<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
			<h3>相关项目</h3>
			<?php else: ?>
			<h3>Related <?php echo get_the_category()[1]->cat_name ?> Projects</h3>
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
							<?php the_post_thumbnail('large') ?>
							<div class='project-info'>
								<span class='project-title'>
									<?php the_title(); ?>
								</span>
								<span class='project-location'>
									<?php the_field('project_city') ?>, <?php the_field('project_country') ?>
								</span>
								<span class='project-category'>
									<?php 
										$r_cat = get_the_category();
										foreach($r_cat as $category) {
											// var_dump($p_cat);
											if($category->cat_name != "Current" && $category->cat_name != "Projects") {
												echo $category->cat_name;
											}
										}
									?>
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
		</div>
		<div class="shareProjectIcons">
			<ul class="shareLinks">
				<li id="shareOnFacebook">
					<a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=" . $actual_link?>">Facebook</a>
				</li>
				<li id="shareOnLinkedIn">
					<a href="<?php echo "https://www.linkedin.com/shareArticle?mini=true&url=" . $actual_link ?>">LinkedIn</a>
				</li>
				<li id="shareOnPintrest">
					<a href="<?php echo "http://pinterest.com/pin/create/button/?url=" . $actual_link ?>">Pintrest</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="projectVideoContent sm-hidden">
			<template class="video-template" data-video-url="<?php the_field('project_video') ?>" data-video-poster="<?php the_field('project_video_thumbnail')?>" data-video-title=""></template>
		</div>
	<div style="clear:both;"></div> 
</div>

<!-- Script for Map -->
<script>
  window.coordArr = "<?php the_field('location') ?>".split(",") || "";
</script>
<script src="<?php echo get_template_directory_uri() ?>/lib/min/projects.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJY5t-tXrIskhm6OZmUp0DnSytAlCwavA&callback=initMap"></script>
<?php
	endwhile; //resetting the page loop
	wp_reset_query(); //resetting the page query
endif;
?>
<?php include('video-player.php') ?>
<?php get_footer(); ?> 