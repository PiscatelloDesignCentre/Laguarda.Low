<?php get_header() ?>
    <div class="row-fluid padding-t-60">
        <div class="page-title-video">
            <h3><strong>Contact</strong></h3>
        </div>
    </div>
    <div class="content__full-width grid-4 contact nogap nopadding-top">
        <div class="grid-header animate invisible">
            <h5>New Business</h5>
        </div>
        <div class="grid-header animate invisible">
            <h5>General Inquiries</h5>
        </div>
        <div class="grid-header animate invisible">
            <h5>Press Inquiries</h5>
        </div>
        <div class="grid-header animate invisible">
            <a class="career-link" href="#careers">
                <img src="<?php echo get_template_directory_uri() ?>/images/LaguardaLow_Arrow_BlackDown.svg" height='23px' width='23px'>
                Careers
            </a>
        </div>
        <div class="animate invisible">
            <p>
                Placeholder Name<br>
                newbiz@laguardalow.com
            </p>
        </div>
        <div class="animate invisible">
        <p>
                Placeholder Name<br>
                info@laguardalow.com
            </p>
        </div>
        <div class="animate invisible">
            <p>
                Placeholder Name<br>
                press@laguardalow.com
            </p>
        </div>
        <div class="animate invisible">
            <p>
                Placeholder Name<br>
                careers@laguardalow.com
            </p>
        </div>
    </div>
    <div class="content__full-width grid-1 nopadding animate invisible" id="locations">
        <div class="img-block">
        <img src="<?php echo get_template_directory_uri() ?>/images/Laguarda_NYC.jpg">
        </div>
    </div>
    <div class="content__full-width grid-2  new-york-band contact gap-16 animate invisible">
        <div class="left">
            <h3>New York Headquarters</h3>
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
        <div class="left img-block gray-block animate invisible">
            <img src="<?php echo get_template_directory_uri() ?>/images/Laguarda_Beijing.jpg">
        </div>
        <div class="right img-block gray-block animate invisible">
            <img src="<?php echo get_template_directory_uri() ?>/images/Laguarda_Tokyo.jpg">
        </div>
    </div>
    <div class="content__full-width grid-4 contact animate invisible">
        <div class="left">
            <h3>Affiliate Beijing Office</h3>
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
            <h3>Affiliate Tokyo Office</h3>
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
    <div class="content__full-width grid-2 contact career full-height nopadding animate invisible" id="careers">
        <div class="left innerpadding">
            <h3>Career Opportunities</h3>
            <div class="content__full-width grid-3 nopadding white-bg">
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
            <div class="video-container" style="margin-top: 80px">
                <video class="video" playsinline webkit-playsinline>
                    <source src="<?php echo get_field('contact_video', $post->ID) ?>" type="video/mp4">
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

        document.querySelector(".close-overlay").addEventListener("click", el => {
            document.querySelector(".overlay").classList.remove("slide-out");
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

<?php include 'video-player.php' ?>
<?php get_footer() ?>


