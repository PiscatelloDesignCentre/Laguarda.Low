<?php
/**
 * Template Name: Leader's Page Template
 * Template Post Type: post
**/

get_header(); 

// TO SHOW THE PAGE CONTENTS
while ( have_posts() ) : the_post(); ?>
    <!-- Left side with info -->
    <style>
        p {
            margin: 0 !important;
        }

        h2 {
            line-height: 34px;
            color: #BDBDBD !important;
        }
    </style>
    <div class="content__full-width full-height padding-t-90">
        <div class="left invisible animate">
            <div class="page-top-left">
                <h3 class="title"><?php the_title() ?><?php echo  (get_field('designation') ? sprintf(', %s', get_field('designation')): '') ?></h3>
                <h5 class="subtitle"><?php the_field('formal_title')?></h5>
            </div>
            <div style="width: 66.66%"><?php echo get_the_content(); ?></div>
            <?php if(get_field('quote')): ?>
            <h2 class="padding-t-60 quote-h2" style="margin: 0; width: 66.66%">"<?php the_field('quote')?>"</h2>
            <?php endif; ?>
        </div>
        <div class="right invisible animate">
            <div class="img-block invisible animate">
                <img src="<?php the_field('employee_office_shot')?>">
            </div>
            <?php 
                if(have_rows('posts_by_employee')): ?>
                    <h4 class="section-title"><?php the_title() ?>'s Posts</h4>
                    <div class="related-projects">
                    <?php
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
                                        <?php echo get_the_date('F j, Y'); ?>
                                    </span>
                                    <span class='project-location'>
                                        <?php the_title(); ?>
                                    </span>
                                </div>
                            </a>
                            <?php
                            wp_reset_postdata(); 
                            endif;
                        endwhile; ?>
                    </div>
                    <?php else: ?>
                <?php endif; ?>
        </div>
        <div class="approach-nav invisible animate">
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <?php $output  = "<img src=" . get_template_directory_uri() . "/images/LaguardaLow_Arrow_BlackLeft.svg class='side-arrow' height='23px' width='23px'>  返回领导团队" ?>
            <a href="<?php echo get_site_url() . "/zh-hans/firm/leadership" ?>"><?php echo $output ?></a>
            <?php else: ?>
            <?php $output  = "<img src=" . get_template_directory_uri() . "/images/LaguardaLow_Arrow_BlackLeft.svg class='side-arrow' height='23px' width='23px'> BACK TO LEADERSHIP" ?>
            <a href="<?php echo get_site_url() . "/firm/leadership" ?>"><?php echo $output ?></a>
            <?php endif; ?>
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