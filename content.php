<div class="slideshow-custom-wrapper">
  <div class="main-carousel">
    <?php

      // check if the repeater field has rows of data
      if( have_rows('homepage_desktop_images', 207) ):
      $counter = 0;
      // loop through the rows of data
      while ( have_rows('homepage_desktop_images', 207) ) : the_row(); ?>
      <div class="carousel-cell">
        <picture class="carousel-cell-image wide">
          <source 
              srcset="<?php echo get_field('mobile_homepage_images', 207)[$counter]["mobile_homepage_image"]["url"];?>"
              media="(max-width: 414px)"
              title="#htmlcaption" alt=""
          />
          <source
              srcset="<?php echo get_sub_field('homepage_desktop_image'); ?>"
              media="(min-width: 415px)"
          />
          <img
              class="carousel-cell-image"
              src="<?php echo get_sub_field('homepage_desktop_image'); ?>"
          />
        </picture>
      </div>
      <?php
      $counter++;
      endwhile;

      else :

      // no rows found

      endif;

    ?>
  </div>
  <div class="homepage-quote">
    <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
    <span>Laguarda.Low 是一家专注营造卓越体验的国际性建筑设计公司</span> 
    <?php else: ?>
    <span>Laguarda.Low is a global<br/>architectural practice focused on<br/>creating exciting experiences.</span>
    <?php endif; ?>
  </div>		
  <button class="custom-prev-next-button left"></button>
  <button class="custom-prev-next-button right"></button>
</div>
<script>
var elem = document.querySelector(".main-carousel"),
  video = "",
  flkty = new Flickity(elem, {
    contain: !1,
    setGallerySize: !1,
    draggable: !1,
    wrapAround: !0,
    accessibility: true,
    autoPlay: 4000,
    pauseAutoPlayOnHover: false
  });

  var isWindowFocused = true

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

  window.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".carousel-cell-image").forEach(function(el, i) {
        el.onload = () => {
            if(el.naturalWidth >= 1920) {
                el.classList.add("wide");
            }
        }

        if(el.complete) {
            if(el.naturalWidth >= 1920) {
                el.classList.add("wide");
            }
        }
        
    });

    setTimeout( ()=> {
        document.querySelector(".slideshow-custom-wrapper").classList.add("loaded")
    }, 2000)

})
</script>
