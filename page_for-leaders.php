<?php
/**
 * Template Name: Leader's Page Template
 * Template Post Type: post
**/

get_header(); 

// TO SHOW THE PAGE CONTENTS
while ( have_posts() ) : the_post(); ?>
    <!-- Left side with info -->
    <div class="content__full-width">
        <div class="left">
            <div class="page-top-left">
                <h3 class="title"><?php the_title() ?></h3>
                <h5 class="subtitle"><?php the_field('formal_title')?></h5>
            </div>
            <p><?php the_content(); ?></p>
            <h1>"<?php the_field('quote')?>"</h1>
        </div>
        <div class="right">
            <div class="img-block">
                <img src="<?php the_field('employee_image')?>">
            </div>
            <h4 class="section-title"><?php the_title() ?>'s Posts</h4>
            <div class="related-projects">
                <?php 
                    if(have_rows('posts_by_employee')):
                        while(have_rows('posts_by_employee')): the_row();
                            $post_o = get_sub_field('employee_post');
                            if($post_o): 
                                $post = $post_o;
                                setup_postdata($post);
                            ?>
                            <a href="<?php the_permalink(); ?>" class="project-thumb">
                                <?php the_post_thumbnail('medium') ?>
                                <div class='project-info'>
                                    <span class='project-title'>
                                        <?php the_date(); ?>
                                    </span>
                                    <span class='project-location'>
                                        <?php the_title(); ?>
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