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
    <span>Laguarda.Low Architects <br> 是一家专注营造卓越体验的国际性建筑设计公司</span> 
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
    flkty.stopPlayer();
    flkty.playPlayer();
  }

  function playPrev(e) {
    e.stopPropagation();
    flkty.previous();
    flkty.stopPlayer();
    flkty.playPlayer();
  }

  window.addEventListener("DOMContentLoaded", function() {
    var imgs = document.querySelectorAll(".carousel-cell-image");
    [].forEach.call(imgs, function(el, i) { 
        el.onload = function() {
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

    setTimeout( function() {
        document.querySelector(".slideshow-custom-wrapper").classList.add("loaded")
    }, 2000)

    var svg = `<svg class="circle-chart" viewbox="0 0 60 60" width="30" height="30" xmlns="http://www.w3.org/2000/svg">
              <circle class="circle-chart__circle" stroke="#FFF" stroke-width="3" stroke-dasharray="100,100" fill="none" cx="25.91549431" cy="25.91549431" r="15.91549431" />
            </svg>`;

    document.querySelectorAll(".dot").forEach(function(el, i) {
      el.insertAdjacentHTML('beforeend', svg);
    })

})
</script>
<style>
/**
 * 1. The `reverse` animation direction plays the animation backwards
 *    which makes it start at the stroke offset 100 which means displaying
 *    no stroke at all and animating it to the value defined in the SVG
 *    via the inline `stroke-dashoffset` attribute.
 * 2. Rotate by -90 degree to make the starting point of the
 *    stroke the top of the circle.
 * 3. Using CSS transforms on SVG elements is not supported by Internet Explorer
 *    and Edge, use the transform attribute directly on the SVG element as a
 * .  workaround (https://markus.oberlehner.net/blog/pure-css-animated-svg-circle-chart/#part-4-internet-explorer-strikes-back).
 */
.circle-chart__circle {
  transform: rotate(-90deg); /* 2, 3 */
  transform-origin: center; /* 4 */
}

/**
 * 1. Rotate by -90 degree to make the starting point of the
 *    stroke the top of the circle.
 * 2. Scaling mirrors the circle to make the stroke move right
 *    to mark a positive chart value.
 * 3. Using CSS transforms on SVG elements is not supported by Internet Explorer
 *    and Edge, use the transform attribute directly on the SVG element as a
 * .  workaround (https://markus.oberlehner.net/blog/pure-css-animated-svg-circle-chart/#part-4-internet-explorer-strikes-back).
 */
.circle-chart__circle--negative {
  transform: rotate(-90deg) scale(1,-1); /* 1, 2, 3 */
}

.circle-chart__info {
  animation: circle-chart-appear 4s forwards;
  opacity: 0;
  transform: translateY(0.3em);
}

@keyframes circle-chart-fill {
  to { stroke-dasharray: 0 100; }
}

@keyframes circle-chart-appear {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.dot {
  position: relative;
}

.dot.is-selected svg {
  opacity: 1;
  transition: opacity .25s ease;
}

.dot.is-selected svg circle {
  animation: circle-chart-fill 4s ease reverse; /* 1 */ 
}

svg {
  position: absolute;
  left: 65%;
  top: 42%;
  transform: translate(-50%, -50%);
  opacity: 0;
}
</style>
