<?php get_header(); ?> 
    <div class="row-fluid padding-t-60">
        <div class="page-title-video invisible animate">
            <h3><strong>Videos</strong></h3>
        </div>
    </div>
    <div class="content__full-width nopadding-top">
    <?php if( have_rows('video_repeater') ):
        while ( have_rows('video_repeater') ) : the_row();?>
                <div class="video-container invisible animate">
                    <video class="video" playsinline webkit-playsinline>
                        <source src="<?php the_sub_field('video_url') ?>" type="video/mp4">
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
                    <p class="video-title"><strong><?php the_sub_field('video_title') ?></strong></p>
                </div>
        <?php endwhile; ?>
    <?php else : ?>
    <?php endif;?>
    </div>

<?php include('video-player.php') ?>
<?php get_footer(); ?>