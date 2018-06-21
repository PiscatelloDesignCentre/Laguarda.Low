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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

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
    <!-- <link rel="stylesheet" href="style.css" type="text/css" media="screen" /> -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>

  <body>
    <header>
      <!-- <?php if (is_page('projects')) { ?>

      <?php }?> -->
      <div class="band laguarda-low-header <?php echo is_home() ? "home-band" : "" ?>">
        <div class="flex-left">
          <div class="logo flex-col" style="background-image: url('<?php echo get_home_url() ?>/wp-content/uploads/2018/05/LaguardaLow_LogoWhite.png')">
            <a href="<?php echo get_site_url() ?>">
              Lauguarda Low
            </a>
          </div>
          <div class="flex-col">
            <!-- Search bar -->
            <div class="search-container search-desktop">
              <form action="/action_page.php">
                <button class="search" type="submit"></button>
                <input id="input-area" type="text" placeholder="" name="search">
                <!-- <div id="input-area-slider"></div> -->
              </form>
            </div>
          </div>
        </div>
        <div class="flex-right">
          <div class="flex-col search-mobile">
            <div class="search-container">
              <form action="/action_page.php">
                <button class="search" type="submit"></button>
                <input id="input-area" type="text" placeholder="" name="search">
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
          <div class="flex-col lang-container">
            <!-- English/Chinese -->
            <div class="lang-toggle">
              <div class="lang-en">English</div>
              <div class="lang-zh">中文</div>
            </div>
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
          document.body.classList.toggle("no-scroll");
          if(document.querySelector(".band").classList.contains("home-band")) {
            document.querySelector(".band").classList.toggle("active");
            document.querySelector(".band").classList.toggle("fixed");
          }

        })
      </script>
    </header>

        