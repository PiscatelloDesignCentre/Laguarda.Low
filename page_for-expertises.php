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
                <video id="video">
                    <source src="<?php echo get_field('expertise_video') ?>" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
                <div class="video-container-overlay">
                    <div class="button">Play Video</div>
                </div>
                <div class="video-controls hidden">
                    <button type="button" id="play-pause"></button>
                    <span id="time-passed">0:00</span>
                    <progress id="seek-bar" max="100" value="0"></progress>
                    <span id="time-left">0:00</span>
                </div>
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
    
    
    <!-- Right side with stuff for something -->
        <!-- Video -->
        <!-- Categorical projects -->
<?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
?>

<script>
    window.onload = () => {
        let video = document.getElementById("video")
        var playButton = document.getElementById("play-pause");
        var seekBar = document.getElementById("seek-bar");
        var timePassed = document.getElementById("time-passed");
        var timeDuration = document.getElementById("time-left");
        var bigButton = document.querySelector(".video-container .button");

        bigButton.addEventListener("click", ()=> {
            document.querySelector(".video-container-overlay").classList.toggle("hidden");
            document.querySelector(".video-controls").classList.toggle("hidden");
            video.play();
        });

        

        playButton.addEventListener("click", function() {
            if (video.paused == true) {
                // Play the video
                video.play();

                // Update the button text to 'Pause'
                // playButton.innerHTML = "Pause";
            } else {
                // Pause the video
                video.pause();

                // Update the button text to 'Play'
                // playButton.innerHTML = "Play";
            }
        });

        seekBar.addEventListener("change", function() {
            // Calculate the new time
            var time = video.duration * (seekBar.value / 100);

            // Update the video time
            video.currentTime = time;
        });

        // Update the seek bar as the video plays
        video.addEventListener("timeupdate", function() {
            // Calculate the slider value
            let value = (100 / video.duration) * video.currentTime;
            let time = video.currentTime
            let duration = video.duration

            var minutes = Math.floor(time / 60);   
            var seconds = Math.floor(time).toString();

            var duration_minutes = Math.floor(duration / 60)
            var duration_seconds = Math.floor(duration).toString()

            seconds = seconds.length < 2 ? `0${seconds}` : seconds
            duration_seconds = duration_seconds.length < 2 ? `0${duration_seconds}` : duration_seconds

            timePassed.innerText = `${minutes}:${seconds}`
            timeDuration.innerText = `${duration_minutes}:${duration_seconds}`
            // Update the slider value
            seekBar.value = value;
            
        });

        video.addEventListener("ended", ()=>{
            document.querySelector(".video-container-overlay").classList.toggle("hidden");
            document.querySelector(".video-controls").classList.toggle("hidden");
        })

        // Pause the video when the slider handle is being dragged
        seekBar.addEventListener("mousedown", function() {
            video.pause();
        });

        // Play the video when the slider handle is dropped
        seekBar.addEventListener("mouseup", function() {
            video.play();
        });
    }

    
</script>
<?php get_footer(); ?> 