<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>laguardia.low</title>
    <?php wp_head(); ?>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">

    <!-- Custom font for this template -->
    <link href=“https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i” rel=“stylesheet”>


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
    <header class="site-header">
      <!-- <?php if (is_page('projects')) { ?>

      <?php }?> -->
      <div class="band row-fluid">
        <div class="logo col-md-3">
          <a href="http://localhost:8888/wordpress/">
            Lauguarda Low
          </a>
        </div>
        <div class="col-md-3">
          <!-- Search bar -->
          <div class="search-container">
            <form action="/action_page.php">
              <input id="input-area" type="text" placeholder="" name="search">
              <button class="search" type="submit"></button>
              <!-- <div id="input-area-slider"></div> -->
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <nav class="site-nav">
            <?php
            $args = array(
              'theme_location' => 'primary'
            );
            ?>
            <?php wp_nav_menu( $args ); ?>
          </nav>
        </div>
        <div class="col-md-2">
          <!-- English/Chinese -->
          <div class="lang-toggle">
            <div id="lang-en">English</div>
            <div id="lang-zh">中文</div>
          </div>
        </div>
      </div>
      
    </header>

        