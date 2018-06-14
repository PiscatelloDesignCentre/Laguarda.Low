<?php
/**
 * Template Name: Expertise's Page Template
**/
?>
<?php get_header(); 

// TO SHOW THE PAGE CONTENTS
while ( have_posts() ) : the_post(); ?>
    <!-- HEADER WITH SLIDER -->
    <div class="placeholder slider-wrapper theme-laguardalowSlider singleProjectSlider loaded" id="check">
        <div id="slider" class="nivoSlider">
            <?php

                    // check if the repeater field has rows of data
                if( have_rows('slider_images') ):

                    // loop through the rows of data
                    while ( have_rows('slider_images') ) : the_row(); ?>

                        <img src="<?php the_sub_field('slider_image'); ?>" title="#htmlcaption" alt="">

                <?php 
                    endwhile;

                    else :

                    // no rows found

                endif;

            ?>
        </div>
        <div id="htmlcaption" class="nivo-html-caption">
            <p> 
                <span class="projectName"><?php the_title() ?></span> 
                </br> 
                <span class="projectCategory">Expertise</span>
            </p>
        </div>
        <div class="downArrow">
		    <a href="#content">
		</a>
	</div>
    </div>

    <!-- Left side with info -->
    <div class="content__full-width" id="content">
        <div class="left">
            <div class="page-top-left">
                <h3 class="title"><?php the_title() ?></h3>
                <h5 class="subtitle">Expertise</h5>
            </div>
            <p><?php the_content(); ?></p>
        </div>
        <div class="right">
            <div class="video-container">
            <video>
                <source src="<?php echo get_field('expertise_video') ?>" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            </div>
            <h4 class="section-title">Sustainable Projects</h4>
            <div class="related-projects">
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
                                        <?php the_content() ?>
                                    </span>
                                    <span class='project-category'>
                                        <?php echo get_the_category()[0]->cat_name ?>
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
    
    <!-- Right side with stuff for something -->
        <!-- Video -->
        <!-- Categorical projects -->
<?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
?>
<?php get_footer(); ?> 