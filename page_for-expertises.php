<?php
/**
 * Template Name: Expertise's Page Template
**/
?>
<?php get_header(); 

// TO SHOW THE PAGE CONTENTS
while ( have_posts() ) : the_post(); ?>
    <!-- HEADER WITH SLIDER -->
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
                        <img src="<?php the_sub_field('slider_image'); ?>" title="#htmlcaption" alt="">
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
			<span class="projectCategory">Expertise</span>
        </div>
		<button class="custom-prev-next-button left"></button>
		<button class="custom-prev-next-button right"></button>
	
	</div>

    <!-- Left side with info -->
    <div class="content__full-width" id="content">
        <div class="left invisible animate">
            <div class="page-top-left invisible animate">
                <h3 class="title"><?php the_title() ?></h3>
                <h5 class="subtitle">Expertise</h5>
            </div>
            <p style="width: 66.66%"><?php echo get_the_content(); ?></p>
        </div>
        <div class="right">
            <template class="video-template" data-video-url="<?php echo get_field('expertise_video') ?>"></template>
            <h4 class="section-title invisible animate"><?php the_title() ?> Projects</h4>
            <div class="related-projects-container">
                <div class="related-projects invisible animate">
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
        </div>
    </div>
    
    
    <!-- Right side with stuff for something -->
        <!-- Video -->
        <!-- Categorical projects -->
<?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
?>

<?php include('video-player.php') ?>
<script>

var elem = document.querySelector('.main-carousel');
var flkty = new Flickity( elem, {
    // options
    contain: false,
    setGallerySize: false,
    draggable: false,
	wrapAround: true,
	autoPlay: 5000
});

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
<?php get_footer(); ?> 