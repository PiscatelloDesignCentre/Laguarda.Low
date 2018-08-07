    <footer class="site-footer">
      <div class="container-fluid">
        <div class="col-md-8">
          <div class="col-md-2 animation-element footer_projects">
            <ul>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/projects">PROJECTS</a></li>
              </br>
              <li><a href="<?php echo get_site_url() ?>/projects">All Projects</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#current">Current</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#planning">Planning</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#mixeduse">Mixed Use</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#retail">Retail</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#transit">Transit</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#office">Office</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#residential">Residential</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#hospitality">Hospitality</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#renovation">Renovation</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#public">Public</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#archive">Archive</a></li>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_expertise">
            <ul>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/expertise">EXPERTISE</a></li>
              </br>
              <li><a href="<?php echo get_site_url() ?>/expertise/master-planning">Master Planning</a></li>
              <li><a href="<?php echo get_site_url() ?>/expertise/mixed-use">Mixed Use</a></li>
              <li><a href="<?php echo get_site_url() ?>/expertise/retail-design">Retail Design</a></li>
              <li><a href="<?php echo get_site_url() ?>/expertise/sustainability">Sustainability</a></li>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_firm">
            <ul>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/firm">FIRM</a></li>
              </br>
              <li><a href="<?php echo get_site_url() ?>/firm/overview">Overview</a></li>
              <li><a href="<?php echo get_site_url() ?>/firm/leadership">Leadership</a></li>
              <li><a href="<?php echo get_site_url() ?>/firm/videos">Videos</a></li>
              <li><a href="<?php echo get_site_url() ?>/firm/awards">Awards</a></li>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_news">
            <ul>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/news">NEWS</a></li>
              </br>
              <li><a href="<?php echo get_site_url() ?>/news/events">Events</a></li>
              <li><a href="<?php echo get_site_url() ?>/news/construction">Construction</a></li>
              <li><a href="<?php echo get_site_url() ?>/news/publications">Publications</a></li>
              <li><a href="<?php echo get_site_url() ?>/news/awards">Awards</a></li>
              <li><a href="<?php echo get_site_url() ?>/news/newsletters">Newsletters</a></li>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_contact">
            <ul>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/contact">CONTACT</a></li>
              </br>
              <li><a href="<?php echo get_site_url() ?>/contact">General</a></li>
                            <li><a href="<?php echo get_site_url() ?>/contact/#locations">Office Locations</a></li>
              <li><a href="<?php echo get_site_url() ?>/contact/#careers">Careers</a></li>
            </ul>
          </div>
          <div class="col-md-2 animation-element"></div>
        </div>
        <div class="col-md-4 animation-element credits">
          <ul>
            <li class="footer-titles">CREDITS</li>
            </br>
            <li>Website Design and Development</li>
            <li><a href="http://piscatello.com" target="_blank">Piscatello Design Centre</a></li>
            </br>
            <li>Video</li>
            <li><a href="http://www.yoyuucreative.com/" target="_blank">Yo.Yuu Creative</a></li>
          </ul>
        </div>
      </div>
      <div class="lowerBand row-fluid">
        <div class="socialMedia">
          <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>  
        </div>
        <div class="col-md-3 copyRight">
          <p>Copyright &copy; 2018 Laguarda Low Architects | LLA</p>
        </div>
        <div class="col-md-3 sm-hidden"></div>
        <div class="col-md-3 sm-hidden"></div>
        <div class="col-md-3 socialMedia sm-hidden mobile-hidden">
          <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>  
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   

    <script type="text/javascript">
    (function($) {
      // Select all links with hashes
      $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
          // On-page links
          if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
            && 
            location.hostname == this.hostname
          ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
              // Only prevent default if animation is actually gonna happen
              event.preventDefault();
              // $('html, body').animate({
              //   scrollTop: target.offset().top
              // }, 1200, function() {
              //   // Callback after animation
              //   // Must change focus!
              //   var $target = $(target);
              //   $target.focus();
              //   if ($target.is(":focus")) { // Checking if the target was focused
              //     return false;
              //   } else {
              //     $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              //     $target.focus(); // Set focus again
              //   };
              // });

              window.scrollTo({
                top: target.offset().top,
                behavior: "smooth"
              });
            }
          }
        });
      })(jQuery)
    </script>
    <script>
      document.querySelectorAll(".site-footer ul").forEach((el, i) => {
        el.addEventListener("touchstart", (event) => {
          if(event.currentTarget.classList.contains("toggle-footer")) {
            event.currentTarget.classList.remove("toggle-footer");
            return; 
          }
          document.querySelectorAll(".site-footer ul").forEach((el, i) => {
            el.classList.remove("toggle-footer");
          });

          event.currentTarget.classList.add("toggle-footer");
        });
      });

      document.querySelectorAll(".site-footer ul a").forEach((el, i) => {
        el.addEventListener("touchstart", (event) => {
          event.stopPropagation();
        });
      });

    </script>

    <!-- jQuery -->
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery-1.9.0.min.js"></script>
    
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery.nivo.slider.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <script type="text/javascript">
      $('.project-nav-article').click(function() {
        $('.project-nav-article').removeClass('active');
        $(this).addClass('active');
      });
    </script>
    <script type="text/javascript">
      $( document ).ready(function() {
        console.log( "document loaded" );
        $('.band').addClass('active');
      });
    </script>
    
    


    <!-- Footer sliding up on scroll -->
    <script type="text/javascript">
    (function($) {
      var $animation_elements = $('.animation-element');
      var $window = $(window);

      function check_if_in_view() {
        var window_height = $window.height();
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);

        $.each($animation_elements, function() {
          var $element = $(this);
          var element_height = $element.outerHeight();
          var element_top_position = $element.offset().top;
          var element_bottom_position = (element_top_position + element_height);

          //check to see if this current container is within viewport
          if ((element_bottom_position >= window_top_position) &&
            (element_top_position <= window_bottom_position)) {
            $element.addClass('in-view');
          } else {
            // $element.removeClass('in-view');
          }
        });
      }

      $window.on('scroll resize', check_if_in_view);
      $window.trigger('scroll');
    })(jQuery)
    </script>
    
  <script>
      (function($) {
        $.fn.isInViewport = function() {
            var elementTop = $(this).offset().top 
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            return elementBottom > viewportTop && elementTop < viewportBottom;
        };

        $(window).on('resize scroll', function() {
            $('.animate').each(function() {
                var activeColor = $(this).attr('id');
                if ($(this).isInViewport()) {
                    $(this).addClass("animate-grid")
                    $(this).removeClass("invisible")
                } else {

                }
            });
        });

        $(window).on('load', function() {
            $('.animate').each(function() {
                var activeColor = $(this).attr('id');
                if ($(this).isInViewport()) {
                    $(this).addClass("animate-grid")
                    $(this).removeClass("invisible")
                } else {

                }
            });
        });
      })(jQuery)
    </script>
    
  

    <script type="text/javascript">
      $( document ).ready(function(){
        if ($('div').hasClass('theme-laguardalowSlider')){
          $('.slider-wrapper').css({
            "top": "0"
          });
          $('.site-header').css({
            "position": "absolute",
            "top": "0",
            "left": "0",
            "width": "100%"
          })
        }

      });
  
    </script>

    <script type="text/javascript">
    (function($) {
      $(".projectMap").click(function(){
        $('div.relatedProjectsContent').removeClass("active");
        $('div.shareProjectContent').removeClass("active");
        $('div.projectVideoContent').removeClass("active");
        $('div.mapContent').addClass("active");
        
      });
      $(".projectShare").click(function(){
        $('div.relatedProjectsContent').removeClass("active");
        $('div.mapContent').removeClass("active");
        $('div.projectVideoContent').removeClass("active");
        $('div.shareProjectContent').addClass("active");

      });
      $(".projectVideo").click(function(){
        $('div.relatedProjectsContent').removeClass("active");
        $('div.mapContent').removeClass("active");
        $('div.shareProjectContent').removeClass("active");
        $('div.projectVideoContent').addClass("active");
      });
    })(jQuery)
    </script>

    <script type="text/javascript">
    (function($) {
      $(".closeButton").click(function(){
        $('div.mapContent').removeClass("active");
        $('div.shareProjectContent').removeClass("active");
        $('div.projectVideoContent').removeClass("active");
        $('div.relatedProjectsContent').addClass("active");
      });
    })(jQuery)
    </script>

    <?php wp_footer(); ?>
  </body>
</html>