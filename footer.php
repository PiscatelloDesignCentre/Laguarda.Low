    <footer class="site-footer">
      <div class="container-fluid">
        <div class="col-md-8">
          <div class="col-md-2 animation-element footer_projects">
            <ul>
              <li class="footer-titles"><a>PROJECTS</a></li>
              </br>
              <li><a>All Projects</a></li>
              <li><a>Current</a></li>
              <li><a>Planning</a></li>
              <li><a>Mixed Use</a></li>
              <li><a>Retail</a></li>
              <li><a>Commercial</a></li>
              <li><a>Transit</a></li>
              <li><a>Public</a></li>
              <li><a>Archive</a></li>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_expertise">
            <ul>
              <li class="footer-titles"><a>EXPERTISE</a></li>
              </br>
              <li><a>Master Planning</a></li>
              <li><a>Mixed Use</a></li>
              <li><a>Retail Design</a></li>
              <li><a>Sustainability</a></li>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_firm">
            <ul>
              <li class="footer-titles"><a>FIRM</a></li>
              </br>
              <li><a>Overview</a></li>
              <li><a>Leadership</a></li>
              <li><a>Videos</a></li>
              <li><a>Awards</a></li>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_news">
            <ul>
              <li class="footer-titles"><a>NEWS</a></li>
              </br>
              <li><a>Events</a></li>
              <li><a>Construction</a></li>
              <li><a>Publications</a></li>
              <li><a>Awards</a></li>
              <li><a>Newsletters</a></li>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_contact">
            <ul>
              <li class="footer-titles"><a>CONTACT</a></li>
              </br>
              <li><a href=".project-nav">Commisions</a></li>
              <li><a>Press</a></li>
              <li><a>General</a></li>
              <li><a>Careers</a></li>
              <li><a>Office Locations</a></li>
            </ul>
          </div>
          <div class="col-md-2 animation-element"></div>
        </div>
        <div class="col-md-4 animation-element credits">
          <ul>
            <li class="footer-titles">CREDITS</li>
            </br>
            <li>Website Design</li>
            <li>Piscatello Design Centre</li>
            </br>
            <li>Photography</li>
            <li>Placeholder Name</li>
            </br>
            <li>Video</li>
            <li>Yo.Yuu Creative</li>
          </ul>
        </div>
      </div>
      <div class="lowerBand row-fluid">
        <div class="col-md-3 copyRight">
          <p>Copyright &copy; 2018 Laguarda Low Architects | LLA</p>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3 socialMedia">
          <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>  
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
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
              $('html, body').animate({
                scrollTop: target.offset().top
              }, 1200, function() {
                // Callback after animation
                // Must change focus!
                var $target = $(target);
                $target.focus();
                if ($target.is(":focus")) { // Checking if the target was focused
                  return false;
                } else {
                  $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                  $target.focus(); // Set focus again
                };
              });
            }
          }
        });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
      $('#slider').nivoSlider({ 
        effect: 'fade',                 // Specify sets like: 'fold,fade,sliceDown' 
        slices: 15,                       // For slice animations 
        boxCols: 8,                       // For box animations 
        boxRows: 4,                       // For box animations 
        animSpeed: 500,                   // Slide transition speed 
        pauseTime: 3000,                  // How long each slide will show 
        startSlide: 0,                    // Set starting Slide (0 index) 
        directionNav: true,               // Next & Prev navigation 
        controlNav: true,                 // 1,2,3... navigation 
        controlNavThumbs: false,          // Use thumbnails for Control Nav 
        pauseOnHover: false,               // Stop animation while hovering 
        manualAdvance: false,             // Force manual transitions 
        prevText: 'Prev',                 // Prev directionNav text 
        nextText: 'Next',                 // Next directionNav text 
        randomStart: false,               // Start on a random slide 
        beforeChange: function(){},       // Triggers before a slide transition 
        afterChange: function(){},        // Triggers after a slide transition 
        slideshowEnd: function(){},       // Triggers after all slides have been shown 
        lastSlide: function(){},          // Triggers when last slide is shown 
        afterLoad: function(){}           // Triggers when slider has loaded 
      });
    });
    </script>
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
    </script>

    <!-- <script type="text/javascript">
      $( document ).ready(function() {
        var $animation_elements = $('.isotope-item');
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
              // console.log(element_top_position);
              // console.log(element_bottom_position);
              // console.log(element_height);
              // console.log(window_top_position);
              // console.log(window_bottom_position);
              // console.log(window_height);
              // console.log( "Finished" );
              $element.addClass('in-view');
            } else {
              // $element.removeClass('in-view');
            }
          });
        }

        $window.on('scroll resize', check_if_in_view);
        $window.trigger('scroll');
      });
    </script> -->

    <!-- Script for lower text on Homepage to transition -->
    <script type="text/javascript">
      $( document ).ready(function() {
        // $('.nivo-caption').addClass('effect');
        // console.log( "document loaded" );
      });
    </script>
    <!-- <script type="text/javascript">
      $(window).load(function() {
        $('.nivo-caption').addClass('effect');
      });
    </script> -->
    <!-- <script type="text/javascript" language="JavaScript">
      function set_body_height() { // set body height = window height
        $('body').height($(window).height());
      }
      $(document).ready(function() {
        $(window).bind('resize', set_body_height);
        set_body_height();
      });
    </script> -->



    <!-- Script for adding a class to Projets Assets -->
    <!-- <script type="text/javascript">
      $( document ).ready(function(){
        $(".isotope-item").addClass(".fade-in");
        console.log( "document loaded" );
      });
    </script> -->
    <!-- Generating random fadeins -->
    <!-- <script type="text/javascript">
      $('.fadeIn').before('<div>&nbsp;</div>');

      (function fadeInDiv(){
        var divs;
        if((divs = $('.fadeIn:not(:visible)')).length){
          var elem = divs.eq(Math.floor(Math.random()*divs.length));
          elem.prev().remove(); 
          elem.fadeIn(Math.floor(Math.random()*1000), fadeInDiv); 
        }
      })();
    </script> -->

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
      // $( "#check" ).hasClass( "slider-wrapper" ) {
      //   $('.slider-wrapper').css({
      //     "top": "0"
      //   });
      //   $('.site-header').css({
      //     "position": "absolute",
      //     "top": "0",
      //     "left": "0",
      //     "width": "100%"
      //   });
      // }
    </script>

    <script type="text/javascript">
      $(".projectMap").click(function(){
        $('div.relatedProjectsContent').removeClass("active");
        $('div.shareProjectContent').removeClass("active");
        $('div.mapContent').addClass("active");
      });
      $(".projectShare").click(function(){
        $('div.relatedProjectsContent').removeClass("active");
        $('div.mapContent').removeClass("active");
        $('div.shareProjectContent').addClass("active");
      });
    </script>

    <script type="text/javascript">
      $(".closeButton").click(function(){
        $('div.mapContent').removeClass("active");
        $('div.shareProjectContent').removeClass("active");
        $('div.relatedProjectsContent').addClass("active");
      });
    </script>

    <?php wp_footer(); ?>
  </body>
</html>