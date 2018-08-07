<?php get_header(); ?> 
<?php while ( have_posts() ) : the_post(); ?>
<div class="content__full-width full-height padding-t-90" id="content">
    <div class="left invisible animate">
        <div class="page-top-left">
            <h3 class="title"><?php the_title() ?></h3>
        </div>
        <style>
            p {
                width: 66.66% !important;
            }
        </style>
        <p><?php echo the_content(); ?></p>
    </div>
    <div class="right invisible animate">
        <template class="video-template" data-video-url="<?php the_field('overview_video') ?>"></template>
    </div>
    <a href="#approach" class="approach-nav">
        <img src="<?php echo get_template_directory_uri() ?>/images/LaguardaLow_Arrow_BlackDown.svg" height="23px" width="23px">
        See Approach
    </a>
</div>
<div class="content__full-width full-height" id="approach">
    <div class="left invisible animate">
        <div class="page-top-left">
            <h3 class="title">Approach</h3>
        </div>
        <p style="width: 66.66%"><?php the_field('approach') ?></p>
    </div>
    <div class="right">
        <div class="approach-gallery">
            <?php $rows = get_field('approach_images') ?>
            <div class="img-block top">
                <img src="<?php echo $rows[0]['approach_image']?>">
            </div>
            <div class="img-block btm">
                <img src="<?php echo $rows[1]['approach_image']?>">
            </div>
        </div>
    </div>

</div>
<?php endwhile; ?>
<?php include 'video-player.php' ?>
<?php get_footer(); ?>