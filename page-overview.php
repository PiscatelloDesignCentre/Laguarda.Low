<?php get_header(); ?> 
<?php while ( have_posts() ) : the_post(); ?>
<div class="content__full-width full-height" id="content">
    <div class="left">
        <div class="page-top-left">
            <h3 class="title"><?php the_title() ?></h3>
        </div>
        <p><?php the_content(); ?></p>
    </div>
    <div class="right">
        <div class="video-container">
        <video>
            <source src="" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        </div>
    </div>
    <a href="#approach" class="approach-nav">
        <img src="">See Approach
    </a>
</div>
<div class="content__full-width full-height" id="approach">
    <div class="left">
        <div class="page-top-left">
            <h3 class="title">Approach</h3>
        </div>
        <p><?php the_field('approach') ?></p>
    </div>
    <div class="right">
        <div class="approach-gallery">
            <?php $rows = get_field('approach_images') ?>
            <div class="img-block top">
                <img src="<?php echo $rows[0]['approach_image']?>">
            </div>
            <div class="img-block lhs">
                <img src="<?php echo $rows[1]['approach_image']?>">
            </div>
            <div class="img-block rhs">
                <img src="<?php echo $rows[2]['approach_image']?>">
            </div>
        </div>
    </div>

</div>
<?php endwhile; ?>
<?php get_footer(); ?>