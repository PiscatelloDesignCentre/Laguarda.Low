<?php get_header(); ?>
	<?php get_template_part( 'content', get_post_format() ); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery.nivo.slider.js"></script>

    <script type="text/javascript">
        $(window).load(function() {
            $("#slider img").each((index) => {
                this.fadeTo(1);
                console.log(index);
            });
        });
    </script>
    <script type="text/javascript">
        (function($) {
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
        })(jQuery)
    </script>

    <script type="text/javascript">
        (function($) {
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
        })(jQuery);
    </script>
    
  </body>
</html>
    
