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
        <div class="video-container" style="margin-top: 15px">
            <video class="video" playsinline webkit-playsinline>
                <source src="<?php the_field('overview_video') ?>" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <div class="video-container-overlay">
                <div class="button">Play Video</div>
            </div>
            <div class="video-controls hidden">
                <button type="button" class="play-pause"></button>
                <span class="time-passed">0:00</span>
                <progress class="seek-bar" max="100" value="0"></progress>
                <span class="time-left">0:00</span>
                <button class="full-screen"></button>
                <div class="volume-control">
                    <button class="volume"></button>
                    <div class="range-container">
                        <input type="range" min=0 max=100>
                    </div>
                </div>
            </div>
        </div>
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