<?php
/**
 * Template Name: Page template for Job posts
 * Template Post Type: post
**/
?>
<?php get_header(); ?>

<style>
    p {
        font-size: 14px !important;
    }
</style>

<?php  while ( have_posts() ) : the_post(); ?>
    <!-- Left side with info -->
    <div class="content__full-width full-height padding-t-90">
        <div class="left invisible animate">
            <div class="page-top-left">
                <h3 class="title sm-hidden"><?php the_title() ?></h3>
            </div>
            <div style="width: 66.66%"><?php the_content(); ?></div>
        </div>
        <div class="right invisible animate" style="padding-top: 89px;">
            <div style="width: 66.66%"><?php echo get_field('career_requirements'); ?></div>
        </div>
    </div>
    
    <!-- Right side with stuff for something -->
        <!-- Video -->
        <!-- Categorical projects -->
<?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
?>

<script>

<?php get_footer(); ?>