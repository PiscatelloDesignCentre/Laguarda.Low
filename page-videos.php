<?php get_header(); ?> 
    <div class="row-fluid">
        <div class="page-title-video animate">
            <h3><strong>Videos</strong></h3>
        </div>
    </div>
    <div class="content__full-width nopadding-top">
    <?php if( have_rows('video_repeater') ):
        while ( have_rows('video_repeater') ) : the_row();?>
                <template class="video-template" data-video-url="<?php the_sub_field('video_url')?>" data-video-poster="<?php the_sub_field('video_thumbnail') ?>"></template>
        <?php endwhile; ?>
    <?php else : ?>
    <?php endif;?>
    </div>

<?php include('video-player.php') ?>
<?php get_footer(); ?>