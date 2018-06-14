<?php get_header(); ?>
	<?php get_template_part( 'content', get_post_format() ); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <!-- <script type="text/javascript">
      $( document ).ready(function() {
        // $('.nivo-caption').addClass('effect');
        $("#htmlcaptionTransitionElement p").css({"animation": "fadein 3s, floatText 1s"});
        $("#htmlcaptionTransitionElement p").css({"animation": "none"});
        console.log( "document loaded" );
      });
    </script> -->
    <script type="text/javascript">
        $( document ).ready(function() {
            // $( "#htmlcaptionTransitionElement p" ).slideUp( 100 ).delay( 0 ).fadeIn( 100 );
            $( "#htmlcaptionTransitionElement p" )
            .css('opacity', 0)
            .slideDown('slow')
            .animate(
                { opacity: 1 },
                { queue: false, duration: 'slow' }
                    );
        });
    </script>

    <script type="text/javascript">
        $( document ).ready(function() {
            $(".slider-wrapper").css({
                "top": "0px"
            });
            $(".site-header").css({
                "position": "absolute",
                "top": "0",
                "left": "0",
                "width": "100%"
            });
        });
    </script>
    
  </body>
</html>
    
