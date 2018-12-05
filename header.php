<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90138439-7"></script>
    <!-- Detect IE and Redirect -->
    <meta name="google-site-verification" content="aviffuElckckEMalYrMYOhK8BVUME0ioE-PuljwBikg" />
    <script>
    // foreach polyfill
    if (window.NodeList && !NodeList.prototype.forEach) {
        NodeList.prototype.forEach = function (callback, thisArg) {
            thisArg = thisArg || window;
            for (var i = 0; i < this.length; i++) {
                callback.call(thisArg, this[i], i, this);
            }
        };
    }
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-90138439-7');
      
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php bloginfo( 'name' ); ?><?php wp_title() ?></title>
    <?php wp_head(); ?>

    <!-- Bootstrap core CSS -->
    <noscript id="deferred-styles">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </noscript>

    <!-- Custom styles for this template -->
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <link href="https://vjs.zencdn.net/7.1.0/video-js.css" rel="stylesheet">

    <!-- Custom font for this template -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <!-- Custom code for using Nivo slider -->
    <link href="https://unpkg.com/flickity@2/dist/flickity.min.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/flickity.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/picturefill.min.js"></script>
    <!-- <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/velocity/1.1.0/velocity.min.js" defer="defer"></script> -->
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

  <body class="<?php echo is_home() ? "full-bleed-homepage " : "" ?><?php echo "page-" . str_replace(' ', '-', strtolower(get_the_title(get_the_ID()))); ?>">
    <header>
      <div class="band laguarda-low-header <?php echo is_home() ? "home-band" : "" ?>">
        <div class="flex-left">
          
          <div class="logo flex-col" style="background-image: url('<?php echo get_site_url() ?>/wp-content/uploads/2018/05/LaguardaLow_LogoWhite.png')">
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <a href="<?php echo get_site_url() ?>/zh-hans/">
              Lauguarda Low
            </a>
            <?php else: ?>
            <a href="<?php echo get_site_url() ?>">
              Lauguarda Low
            </a>
            <?php endif; ?>
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
            <?php
            $rows = get_field('search_suggestions', 207);
            if($rows)
            {
              foreach ($rows as $row) {
                // echo var_dump($row["recommended_item"]->ID);
                $url = get_permalink($row["recommended_item"]->ID);
                $p_title = $row["recommended_item"]->post_title;
                ?>
                  <li><a href="<?php echo $url?>"><?php echo $p_title ?></a></li>
              <?php
              }
            }?>
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
                'theme_location' => 'primary',
                'menu' => 'Main Menu'
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

      <!-- Mobile Selector -->
      <div class="mobile-selector">
        
        <span class="selected-category">
          <?php if(is_page('projects')): ?>
          <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
          项目| <span class="category-name-band" style="text-transform: capitalize">所有</span>
          <?php else: ?>
          Projects| <span class="category-name-band" style="text-transform: capitalize">All</span>
          <?php endif; ?>
          <?php elseif(is_page('news')): ?>
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            新闻| <span class="category-name-band" style="text-transform: capitalize">所有</span>
            <?php else: ?>
            News| <span class="category-name-band" style="text-transform: capitalize">All</span>
            <?php endif; ?>
          <?php else: ?>
            <strong><?php the_title() ?></strong>
          <?php endif; ?>
        </span>
        <?php if(is_page('projects') || is_page('news')): ?>
        <div class="down-arrow-mobile-selector"></div>
        <div class="drop-down-selector">
          <a data-filter="" href="#" class="selected">
          <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
          全部项目
          <?php else: ?>
          All Projects
          <?php endif; ?>
          </a>
          <?php
            if(is_page('projects')) {
              $args = array(
                "hide_empty" => 0,
                "type"      => "post",      
                "orderby"   => "name",
                "order"     => "ASC",
                'parent'  => 7
              );
            }

            else if (is_page('news') || is_page('新闻')) {
              $args = array(
                "hide_empty" => 0,
                "type"      => "post",      
                "orderby"   => "name",
                "order"     => "ASC",
                'parent'  => 51 
              );
  
            }

              $cats = get_categories($args);
          ?>
          <?php foreach ( $cats as $cat ) { ?>
            <?php if($cat->slug !== "projects") { ?>
            <a data-filter="<?php echo $cat->term_id ?>" href="#<?php echo str_replace("-zh-hans", "", $cat->slug) ?>">
              <?php echo $cat->cat_name ?>
            </a>
            <?php } ?>  
          <?php } ?>
        </div>
        <?php endif; ?>
        <?php wp_reset_query() ?>
      </div>
      <!-- End Mobile Selector -->
      <?php if(is_page("projects") || is_page('news')): ?>
      <nav class="row-fluid project-nav sm-hidden">
        <ul class="navigation-tabs">
          <?php if(is_page('projects')): ?>
          <a data-filter="" href="#" class="selected">
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            全部项目
            <?php else: ?>
            ALL PROJECTS
            <?php endif; ?>
          </a>
          <?php elseif(is_page('news')): ?>
          <a data-filter="" href="#" class="selected">
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            新闻
            <?php else: ?>
            ALL NEWS
            <?php endif; ?>
          </a>
          <?php endif; ?>
          <?php
          if(is_page('projects')) { 
            $args = array(
              "hide_empty" => 0,
              "type"      => "post",      
              "orderby"   => "name",
              "order"     => "ASC",
              'parent'  => 7 
            );
          }

            else if (is_page('news') || is_page('新闻')) {
              $args = array(
                "hide_empty" => 0,
                "type"      => "post",      
                "orderby"   => "name",
                "order"     => "ASC",
                'parent'  => 51 
              );
            }
            
            $cats = get_categories($args);
            
          foreach ( $cats as $cat ) { ?>
            <?php if($cat->slug !== "projects") { ?>
            <a data-filter="<?php echo $cat->term_id ?>" href="#<?php echo str_replace("-zh-hans", "", $cat->slug) ?>">
              <?php echo $cat->cat_name ?>
            </a>
            <?php } ?>  
          <?php } ?>
        </ul>
      </nav>
      <?php endif; ?>
      <?php wp_reset_query() ?>
    </header>
    <script src="<?php echo get_template_directory_uri() ?>/lib/min/header.js"></script>
    <script>
    (function(window, undefined) {
      var top = 0;
      // console.log("Hello")
      /** ONLY WINDOW.ONLOAD IN THE PROJECT */
      window.onload = function() {
        var lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;

        var scroll = window.requestAnimationFrame ||
             window.webkitRequestAnimationFrame ||
             window.mozRequestAnimationFrame ||
             window.msRequestAnimationFrame ||
             window.oRequestAnimationFrame ||
             // IE Fallback, you can even fallback to onscroll
             function(callback){ window.setTimeout(callback, 1000/60) };
        
        function loop() {

          var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
          // console.log(st)
          if (st > lastScrollTop && st > 120){
            document.querySelector("header").classList.add("header-hidden");
          } 
          else if (st < lastScrollTop) {
            document.querySelector("header").classList.remove("header-hidden");
          }

          lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
          

          scroll(loop)
        }

        // Call the loop for the first time
        loop();




        //Header nav window
        <?php if(is_page('projects') || is_page('news')): ?>


        document.querySelector(".mobile-selector").addEventListener("click", function(e) {
          var band = document.querySelector(".laguarda-low-header")
          e.currentTarget.classList.toggle("dropped")
          document.body.classList.toggle("noscroll")
          document.querySelector("html").classList.toggle("noscroll");
          
          if(band.classList.contains("fixed")) {
            band.classList.remove("fixed")
          }
          else band.classList.add("fixed")

          document.querySelector(".laguarda-low-header").classList.toggle("fixed")
          document.querySelector(".mobile-selector").classList.toggle("fixed")
        });

        <?php endif; ?>
      }
    })(window)
    </script>

        