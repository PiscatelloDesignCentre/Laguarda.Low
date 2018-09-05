<?php get_header() ?>
    <div class="row-fluid">
        <div class="page-title-video">
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <h3 class="sm-hidden"><strong>联系我们</strong></h3>
            <?php else: ?>
            <h3 class="sm-hidden"><strong>Contact</strong></h3>
            <?php endif; ?>
        </div>
    </div>
    <div class="content__full-width grid-4 contact nogap nopadding-top">
        <div class="grid-header animate invisible">
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <h5>业务咨询</h5>
            <?php else: ?>
            <h5>New Business</h5>
            <?php endif; ?>
        </div>
        <div class="grid-header animate invisible">
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <h5>其他</h5>
            <?php else: ?>
            <h5>General Inquiries</h5>
            <?php endif; ?>
        </div>
        <div class="grid-header animate invisible">
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <h5>媒体联络</h5>
            <?php else: ?>
            <h5>Press Inquiries</h5>
            <?php endif; ?>
        </div>
        <div class="grid-header animate invisible">
            <a class="career-link" href="#careers">
                <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
                <img src="<?php echo get_template_directory_uri() ?>/images/LaguardaLow_Arrow_BlackDown.svg" height='23px' width='23px'>工作机会
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri() ?>/images/LaguardaLow_Arrow_BlackDown.svg" height='23px' width='23px'>Careers
                <?php endif; ?>
            </a>
        </div>
        <div class="animate invisible">
            <p>
                <?php the_field('new_business_contact_name') ?>
            </p>
        </div>
        <div class="animate invisible">
            <p>
                <?php the_field('general_inquiry_name') ?>
            </p>
        </div>
        <div class="animate invisible">
            <p>
                <?php the_field('press_inquiry_name') ?>
            </p>
        </div>
        <div class="animate invisible">
            <p>
                <?php the_field('career_contact_name') ?>
            </p>
        </div>
    </div>
    <div class="content__full-width grid-1 nopadding animate invisible" id="locations">
        <div class="img-block">
            <img src="<?php the_field('new_york_hq_image') ?>">
        </div>
    </div>
    <div class="content__full-width grid-2  new-york-band contact gap-16 animate invisible">
        <div class="left">
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <h3>纽约总部</h3>
            <?php else: ?>
            <h3>New York Headquarters</h3>
            <?php endif; ?>
        </div>
        <div class="right">
            <p>
            <?php the_field('new_york_headquarters') ?>
            <!-- Laguarda.Low Architects<br>
            25 East 21st Street, 2nd Floor<br>
            New York, NY 10010<br>
            T 646.823.9770<br>
            F 646.823.9891<br> -->
            </p>
        </div>
    </div>
    <div class="content__full-width grid-2 nopadding gap-16 sm-hidden">
        <div class="left img-block gray-block animate invisible">
            <img src="<?php the_field('beijing_hq_image') ?>">
        </div>
        <div class="right img-block gray-block animate invisible">
            <img src="<?php the_field('tokyo_hq_image') ?>">
        </div>
    </div>
    <div class="content__full-width grid-4 new-york-band contact animate invisible">
        <div class="left">
            <div class="left img-block gray-block animate invisible mobile-hidden" style="padding-bottom: 30px">
                <img src="<?php the_field('beijing_hq_image') ?>">
            </div>
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <h3>北京分公司</h3>
            <?php else: ?>
            <h3>Beijing Office</h3>
            <?php endif; ?>
        </div>
        <div class="right">
            <p>
                <?php the_field('beijing_headquarters_info') ?>
            <!-- Laguarda.Low Architects<br>
            RM501 Tower 15<br>
            Jianwai SOHO No. 39<br>
            East Third Ring Road<br>
            Chaoyang District<br>
            Beijing, 100022, China<br><br>
            T +86.10.58691224<br>
            F +86.10.58691560<br><br>
            James Wu<br>
            james.wu@laguardalow.com<br> -->
            </p>
        </div>
        <div class="left">
            <div class="right img-block gray-block animate invisible mobile-hidden" style="padding-bottom: 30px">
                <img src="<?php the_field('tokyo_hq_image') ?>">
            </div>
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <h3>东京办公室</h3>
            <?php else: ?>
            <h3>Affiliate Tokyo Office</h3>
            <?php endif; ?>
        </div>
        <div class="right">
            <?php the_field('tokyo_headquarters_info') ?>
            <!-- Laguarda.Low + Tanamachi<br>
            3-1-8, INA Bldg 403<br>
            Hakusan Bunkyo-Ku<br>
            Tokyo, 112001, Japan<br><br>
            T +81.3.5800.5851<br> 
            F +81.3.5800.5852<br><br>
            Hiro Tanamachi<br>
            tanamachi@llta.co.jp<br> -->
        </div>
    </div>
    <div class="content__full-width grid-2 contact career full-height nopadding animate invisible" id="careers">
        <div class="left innerpadding">
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <h3 class="career-title">工作机会</h3>
            <?php else: ?>
            <h3 class="career-title">Career Opportunities</h3>
            <?php endif; ?>
            <div class="mobile-hidden">
                <template class="video-template" data-video-url="<?php echo get_field('contact_video', $post->ID) ?>" data-video-poster="<?php the_field('contact_video_thumbnail')?>"></template>
            </div>
            <div class="content__full-width grid-3 nopadding white-bg">
            <?php query_posts('category_name=Career&posts_per_page=6'); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="job-opp">
                <h5><?php the_title() ?></h5>
                <h5><?php the_field('career_location') ?></h5>
                <p>
                    <?php the_field('career_excerpt') ?>
                </p>
                <a class="job-button" href="<?php the_permalink() ?>">
                    View Job Posting
                </a>
            </div> 
            <?php endwhile; endif;?>
            <?php wp_reset_query() ?>
            </div>
        </div>
        <div class="right innerpadding nooverflow">
            <div class="sm-hidden">
                <template class="video-template" data-video-url="<?php echo get_field('contact_video', $post->ID) ?>" data-video-poster="<?php the_field("contact_video_thumbnail") ?>"></template>
            </div>
            <div class="overlay innerpadding">
                <div class="close-overlay"></div>
                <div class="career-content">

                </div>
            </div>
        </div>
    </div>


<?php include 'video-player.php' ?>
<?php get_footer() ?>


