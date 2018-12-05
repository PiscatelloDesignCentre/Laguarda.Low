    <?php ini_set('display_errors', 0); ?>
    <?php
    /**
    * @package WordPress
    * @subpackage Laguarda.Low
    */
    if (function_exists('get_header')) {
        get_header();
    }

    else {
        /* Redirect browser */
        header("Location: https://" . $_SERVER['HTTP_HOST'] . "");
        /* Make sure that code below does not get executed when we redirect. */
        exit;
    }; 
    ?>
	<?php get_template_part( 'content', get_post_format() ); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
    
