
<!-- <div class="slider-wrapper theme-laguardalowSlider">
  <div id="slider" class="nivoSlider">
    <img src="<?php #echo get_site_url() ?>/wp-content/uploads/2018/05/LLA_Homepage1.jpg" alt=""  title="#htmlcaptionTransitionElement"/>
    <img src="<?php #echo get_site_url() ?>/wp-content/uploads/2018/05/LLA_Homepage2.jpg" alt=""  title="#htmlcaption"/>
    <img src="<?php #echo get_site_url() ?>/wp-content/uploads/2018/05/LLA_Homepage7.jpg" alt=""  title="#htmlcaption"/>
    <img src="<?php #echo get_site_url() ?>/wp-content/uploads/2018/05/LLA_Homepage4.jpg" alt=""  title="#htmlcaption"/>
    <img src="<?php #echo get_site_url() ?>/wp-content/uploads/2018/05/LLA_Homepage5.jpg" alt=""  title="#htmlcaption"/>
  </div>
  <?php if(ICL_LANGUAGE_NAME == "简体中文" ):?>
  <div id="htmlcaptionTransitionElement" class="nivo-html-caption">
    <p>Laguarda.Low 是一家 <br>专注营造卓越体验的国<br>际性建筑设计公司</p> 
  </div>
  <div id="htmlcaption" class="nivo-html-caption">
    <p>Laguarda.Low 是一家 <br>专注营造卓越体验的国<br>际性建筑设计公司</p> 
  </div>
<?php else: ?>
  <div id="htmlcaptionTransitionElement" class="nivo-html-caption">
    <p>Laguarda.Low is a global</br>architectural practice focused on</br>creating exciting experiences.</p> 
  </div>
  <div id="htmlcaption" class="nivo-html-caption">
    <p>Laguarda.Low is a global</br>architectural practice focused on</br>creating exciting experiences.</p> 
  </div>
<?php endif; ?>
</div> -->

<div class="slideshow-custom-wrapper">
  <div class="main-carousel">
    <?php 
    if( have_rows('homepage_videos', 207) ):

      // loop through the rows of data
      while ( have_rows('homepage_videos', 207) ) : the_row(); ?>
        <?php $video = get_sub_field('homepage_video') ?>
        <div class="carousel-cell">
          <div class="slider-video-container">
            <video muted playsinline preload="none">
              <source src="<?php echo $video ?>" type="video/mp4">
            </video>
          </div>
        </div>
      <?php endwhile; else :; endif;?>
  </div>
  <button class="custom-prev-next-button left"></button>
  <button class="custom-prev-next-button right"></button>
  <div class="homepage-quote">
    <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
    <span>Laguarda.Low 是一家 <br>专注营造卓越体验的国<br>际性建筑设计公司</span> 
    <?php else: ?>
    <span>Laguarda.Low is a global</br>architectural practice focused on</br>creating exciting experiences.</span>
    <?php endif; ?>
  </div>
</div>
<script src="<?php echo get_template_directory_uri() ?>/lib/min/homepage.js"></script>