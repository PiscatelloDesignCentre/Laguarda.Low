<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php bloginfo( 'name' ); ?><?php wp_title() ?></title>
    <?php wp_head(); ?>

    <!-- Bootstrap core CSS -->
    <noscript id="deferred-styles">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </noscript>

    <!-- Custom styles for this template -->
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">

    <!-- Custom font for this template -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <!-- Custom code for using Nivo slider -->
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/nivo-slider/themes/default/default.css" type="text/css" media="screen" />
    <link rel="<?php echo get_bloginfo('template_directory'); ?>/nivo-slider/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/nivo-slider/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/nivo-slider/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/nivo-slider/themes/laguardalowSlider/laguardalowSlider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/nivo-slider.css" type="text/css" media="screen" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
      var loadDeferredStyles = function() {
        var addStylesNode = document.getElementById("deferred-styles");        
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
      };

      var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
          window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
      if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
      
      else window.addEventListener('load', loadDeferredStyles);
    </script>


  </head>

  <body class="<?php echo is_home() ? "full-bleed-homepage" : "" ?>">
    <header>
      <!-- <?php if (is_page('projects')) { ?>

      <?php }?> -->
      <div class="band laguarda-low-header <?php echo is_home() ? "home-band" : "" ?>">
        <div class="flex-left">
          
          <div class="logo flex-col" style="background-image: url('<?php echo get_site_url() ?>/wp-content/uploads/2018/05/LaguardaLow_LogoWhite.png')">
            <a href="<?php echo get_site_url() ?>">
              Lauguarda Low
            </a>
          </div>
          <div class="flex-col search-col">
            <!-- Desktop Search -->
            <div class="search-container search-desktop">
              <form action="<?php echo get_home_url() ?>">
              <button class="search" type="button"></button>
              <input id="input-area" autocomplete="off" placeholder="Search Laguarda.Low" type="text" placeholder="" name="s" id="s">
              <button class="close-search" type="button"></button>
                <!-- <div id="input-area-slider"></div> -->
              </form>
            </div>
          </div>
        </div>
        <div class="search-overlay">
          <ul class="search-suggestions">
            <li class="text-red search-title">Recommended Searches</li>
            <li><a href="">OCT Bay</a></li>
            <li><a href="">OCT Boanan</a></li>
            <li><a href="">Empire State Building</a></li>
            <li><a href="">Freedom Tower</a></li>
            <li><a href="">Burj Khalifa</a></li>
            <li><a href="">330 W 38th Street</a></li>
          </ul>
        </div>
        <!-- Mobile search -->
        <div class="flex-right">
          <div class="flex-col search-mobile">
            <div class="search-container">
              <form action="<?php echo get_home_url() ?>">
                <button class="search" type="button"></button>
                <input id="input-area" autocomplete="off" type="text" placeholder="" name="s" id="s">
                <!-- <div id="input-area-slider"></div> -->
              </form>
            </div>
          </div>
          <div class="flex-col nav-collapse">
            <nav class="site-nav">
              <?php
              $args = array(
                'theme_location' => 'primary'
              );
              ?>
              <?php wp_nav_menu( $args ); ?>
            </nav>
          </div> 
        </div>
        <div class="open-close">
          <div class="dot top"></div>
          <div class="dot bottom"></div>
        </div>
      </div>
    

      <script>
        document.querySelector(".open-close").addEventListener('click', (e) => {
          var box = e.currentTarget.classList.toggle("expand");
          document.querySelector(".flex-right").classList.toggle("visible")
          document.body.classList.toggle("noscroll")
          document.querySelector(".band").classList.toggle("fixed");
          
          if(document.querySelector(".band").classList.contains("home-band")) {
            document.querySelector(".band").classList.toggle("active");
            document.querySelector(".band").blur();
          }

        })

        document.querySelector(".close-search").addEventListener("click", () => {
          document.querySelector(".search-container").classList.remove("active");
          $(".nav-collapse").css({"visibility": "visible"})
          $(".nav-collapse").fadeTo(".345", 1)
          document.body.classList.remove("noscroll")
          document.querySelector(".search-overlay").classList.remove("visible");
          document.querySelector(".band").classList.remove("searching")

        });


        document.querySelector(".search").addEventListener("click", () => {
          document.querySelector(".search-container").classList.toggle("active")
          if(document.querySelector(".search-container").classList.contains("active")) {
            $(".nav-collapse").fadeTo(".345", 0)
            setTimeout(() => {
              $(".nav-collapse").css({"visibility": "hidden"})
            }, 345);
            document.body.classList.add("noscroll")
            document.querySelector(".search-overlay").classList.add("visible");
            document.querySelector(".band").classList.add("searching")
            document.querySelector(".band").classList.add("active")
          }

          else {
            $(".nav-collapse").css({"visibility": "visible"})
            $(".nav-collapse").fadeTo(".345", 1)
            document.body.classList.remove("noscroll")
            document.querySelector(".search-overlay").classList.remove("visible");
            document.querySelector(".band").classList.remove("searching")

          }
        });
      </script>

      <!-- Mobile Selector -->
      <div class="mobile-selector">
        <span class="selected-category">Projects | All</span>
        <div class="drop-down-selector">
          <a data-filter="" href="#" class="selected">
            ALL PROJECTS
          </a>
          <?php
            $args = array(
              "hide_empty" => 0,
              "type"      => "post",      
              "orderby"   => "name",
              "order"     => "ASC",
              'parent'  => 7 
            );

              $cats = get_categories($args);
          ?>
          <?php foreach ( $cats as $cat ) { ?>
            <?php if($cat->slug !== "projects") { ?>
            <a data-filter="<?php echo $cat->term_id ?>" href="#<?php echo str_replace("-", " ", $cat->slug) ?>">
              <?php echo $cat->cat_name ?>
            </a>
            <?php } ?>  
          <?php } ?>
        </div>
      </div>
      <!-- End Mobile Selector -->
    </header>

    <script>
    ((window, undefined) => {
      var top = 0;

      window.onload = () => {
        lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;

        var scroll = window.requestAnimationFrame ||
             window.webkitRequestAnimationFrame ||
             window.mozRequestAnimationFrame ||
             window.msRequestAnimationFrame ||
             window.oRequestAnimationFrame ||
             // IE Fallback, you can even fallback to onscroll
             function(callback){ window.setTimeout(callback, 1000/60) };

        function loop() {

          var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
          if (st > lastScrollTop && st > 120){
            document.querySelector("header").classList.add("header-hidden");
          } 
          else if (st < lastScrollTop) {
            document.querySelector("header").classList.remove("header-hidden");
          }

          lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
            scroll( loop )
        }

        // Call the loop for the first time
        loop();




        //Header nav window

        document.querySelector(".mobile-selector").addEventListener("click", (e) => {
          var band = document.querySelector(".laguarda-low-header")
          e.currentTarget.classList.toggle("dropped")
          document.body.classList.toggle("noscroll")
          document.querySelector("html").classList.toggle("noscroll")
          
          if(band.classList.contains("fixed")) {
            band.classList.remove("fixed")
          }
          else band.classList.add("fixed")

          document.querySelector(".laguarda-low-header").classList.toggle("fixed")
          document.querySelector(".mobile-selector").classList.toggle("fixed")
        });
      }
    })(window)
    </script>

        