<?php get_header() ?>
    <div class="content__full-width grid-4 contact nogap">
        <div class="">
            <h3>CONTACT</h3>
        </div>
        <div class=""></div>
        <div class=""></div>
        <div class=""></div>
        <div class="grid-header">
            <h5>New Business</h5>
        </div>
        <div class="grid-header">
            <h5>General Inquiries</h5>
        </div>
        <div class="grid-header">
            <h5>Press Inquiries</h5>
        </div>
        <div class="grid-header">
            <h5>Careers</h5>
        </div>
        <div class="">
            <p>
                Placeholder Name<br>
                newbiz@laguardalow.com
            </p>
        </div>
        <div class="">
        <p>
                Placeholder Name<br>
                info@laguardalow.com
            </p>
        </div>
        <div class="">
            <p>
                Placeholder Name<br>
                press@laguardalow.com
            </p>
        </div>
        <div class="">
            <p>
                Placeholder Name<br>
                careers@laguardalow.com
            </p>
        </div>
    </div>
    <div class="content__full-width grid-1 nopadding">
        <div class="img-block">
        <img src="<?php echo get_template_directory_uri() ?>/images/Laguarda_NYC.jpg">
        </div>
    </div>
    <div class="content__full-width grid-2  new-york-band contact gap-16">
        <div class="left">
            <h3>NEW YORK HEADQUARTERS</h3>
        </div>
        <div class="right">
            <p>
            Laguarda.Low Architects<br>
            25 East 21st Street, 2nd Floor<br>
            New York, NY 10010<br>
            T 646.823.9770<br>
            F 646.823.9891<br>
            </p>
        </div>
    </div>
    <div class="content__full-width grid-2 nopadding gap-16">
        <div class="left img-block gray-block">
            <img src="<?php echo get_template_directory_uri() ?>/images/Laguarda_Beijing.jpg">
        </div>
        <div class="right img-block gray-block">
            <img src="<?php echo get_template_directory_uri() ?>/images/Laguarda_Tokyo.jpg">
        </div>
    </div>
    <div class="content__full-width grid-4 contact">
        <div class="left">
            <h3>AFFILIATE BEIJING OFFICE</h3>
        </div>
        <div class="right">
            <p>
            Laguarda.Low Architects<br>
            RM501 Tower 15<br>
            Jianwai SOHO No. 39<br>
            East Third Ring Road<br>
            Chaoyang District<br>
            Beijing, 100022, China<br><br>
            T +86.10.58691224<br>
            F +86.10.58691560<br><br>
            James Wu<br>
            james.wu@laguardalow.com<br>
            </p>
        </div>
        <div class="left">
            <h3>AFFILIATE TOKYO OFFICE</h3>
        </div>
        <div class="right">
            <p>
            Laguarda.Low + Tanamachi<br>
            3-1-8, INA Bldg 403<br>
            Hakusan Bunkyo-Ku<br>
            Tokyo, 112001, Japan<br><br>
            T +81.3.5800.5851<br> 
            F +81.3.5800.5852<br><br>
            Hiro Tanamachi<br>
            tanamachi@llta.co.jp<br>
            </p>
        </div>
    </div>
    <div class="content__full-width grid-2 contact full-height nopadding">
        <div class="left innerpadding">
            <h3>CAREER OPPPORTUNITIES</h3>
            <div class="content__full-width grid-3 nopadding">
            <?php query_posts('category_name=Career&posts_per_page=6'); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="job-opp">
                <h5><?php the_title() ?></h5>
                <h5><?php the_field('career_location') ?></h5>
                <p>
                    <?php the_field('career_excerpt') ?>
                </p>
                <button class="job-button" data-post-id="<?php echo $post->ID ?>">
                    View Job Posting
                </button>
            </div> 
            <?php endwhile; endif;?>
            <?php wp_reset_query() ?>
            </div>
        </div>
        <div class="right innerpadding nooverflow">
            <div class="video-container">
                <h3> </h3>
                <?php 
                global $post;?>
                <video id="video">
                    <source src="<?php echo get_field('contact_video', $post->ID) ?>" type="video/mp4">
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
            <div class="overlay innerpadding">
                <div class="close-overlay"></div>
                <div class="career-content">

                </div>
            </div>
        </div>
    </div>



    <script>
        document.querySelectorAll('.job-button').forEach( el => {
            el.addEventListener("click", getPostById)
        });
        

        function render(json) {
            console.log(json)
            return `
                <h2>${json[0].title.rendered}: ${json[0].career_location}</h2>
                <p>
                    ${json[0].content.rendered}
                </p>
            `
        }

        function getPostById(e) {     
            document.querySelector(".overlay").classList.add("slide-out")
            let postID = (e.currentTarget.dataset.postId)

            let careerSpace = document.querySelector('.career-content')

            let post = fetch("/wordpress/wp-json/wp/v2/posts?include="+postID, {
                method: "GET"
            }).then((res) => {
                return res.json()
            }).then((json) => {
                careerSpace.innerHTML = render(json);
            })
        }
    </script>

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

        document.querySelector(".close-overlay").addEventListener("click",(e) => {
            document.querySelector(".overlay").classList.remove("slide-out")
        })        

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
<?php get_footer() ?>


