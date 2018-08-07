
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
<script src="<?php echo get_template_directory_uri() ?>/js/jquery-1.9.0.min.js"></script>

<script>
  var elem = document.querySelector('.main-carousel');
  var video = ""
  var flkty = new Flickity( elem, {
    // options
    contain: false,
    setGallerySize: false,
    draggable: false,
    wrapAround: true
  });

  function playOnSelect() {
    console.log("selected")
    console.log(video)

    if(video) {
      video.removeEventListener('ended', playNext, true);
    }
    video = elem.querySelector(".is-selected").querySelector('video');
    video.addEventListener('ended', playNext, true)
    video.addEventListener('play', function() {
      animateCircles(video);
    })
    video.pause();
    video.currentTime = 0;
    video.play();
    
  }
  
  document.querySelector(".custom-prev-next-button.right").addEventListener("click", playNext)
  document.querySelector(".custom-prev-next-button.left").addEventListener("click", playPrev)

  function playNext(e) {
    e.stopPropagation();
    flkty.next();
  }

  function playPrev(e) {
    e.stopPropagation();
    flkty.previous();
  }

  flkty.on('select', playOnSelect );


  var dotSvg = `<div class="figure">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="15px" height="15px" viewBox="0 0 200 200" enable-background="new 0 0 15 15" xml:space="preserve">
                    <path class="path" fill="none" stroke="#FFFFFF" stroke-width="25" stroke-miterlimit="10" d="M100.416,2.001C154.35,2.225,198,46.015,198,100
                      c0,54.124-43.876,98-98,98S2,154.124,2,100S45.876,2,100,2"/>
                    <!--<path class="path" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="20" stroke-miterlimit="20" d="M100,2C100.139,2,100,2,100,2"/>-->
                  </svg>
                </div>`
  ;

  window.addEventListener("DOMContentLoaded", () => {
    setTimeout( ()=> {
      document.querySelector(".slideshow-custom-wrapper").classList.add("loaded")
    }, 1000)

    document.querySelectorAll(".dot").forEach(el => {
      el.insertAdjacentHTML("beforeend", dotSvg);
    });

    playOnSelect();


  })

  function animateCircles(video) {
    var path = $('.flickity-page-dots svg').find('path');
    var pathLength = path[0].getTotalLength();
    console.log(pathLength)
    var speed = 9;
    var percent = 1;

    path.css({
      'stroke-dasharray':pathLength + ' ' + pathLength,
      'stroke-dashoffset':pathLength
    });

    var currentPathLength = pathLength;
    var requestAnimationFrameID = requestAnimationFrame(doAnim);
  
    var vidPercentDone = 0;
    var vidNewUpdatedPercentage = 0;

    function doAnim() {

      if (currentPathLength <= pathLength * (1 - percent)) {
        cancelAnimationFrame(requestAnimationFrameID)
        pathLength = 615.423095703125; 
        return; 
      }
      
      var percentText = 100 - Math.round(parseFloat(currentPathLength)/pathLength * 100);
      $('.figure p').html(percentText + '%');
      
      $('.path').css({
        'stroke-dashoffset': currentPathLength
      });

      if(video.duration !== NaN) {
        vidPercentageDone = video.currentTime / video.duration;
        currentPathLength = pathLength - (pathLength * vidPercentageDone); 
      }
    
  
      requestAnimationFrameID = requestAnimationFrame(doAnim);
    }
    // }

    function isIE(userAgent) {
      userAgent = userAgent || navigator.userAgent;
      return userAgent.indexOf("MSIE ") > -1 || userAgent.indexOf("Trident/") > -1;
    }
  }

  


  
</script>
