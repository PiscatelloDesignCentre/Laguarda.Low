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
    <div class="content__full-width grid-2 contact gap-16">
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
            </div>
        </div>
        <div class="right innerpadding">
            <div class="gray-block" style="margin-top: 30px"></div>
            <div class="slide-in overlay innerpadding">
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
<?php get_footer() ?>


