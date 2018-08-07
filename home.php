<?php get_header(); ?>
	<?php get_template_part( 'content', get_post_format() ); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery.nivo.slider.js"></script>
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

<!-- overflow: hidden; height: 0px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 10px; -->
    
