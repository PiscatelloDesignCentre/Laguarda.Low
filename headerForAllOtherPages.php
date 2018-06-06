<header class="site-header">
  <div class="row-fluid">
    <div class="col-md-3">
      <a href="http://localhost:8888/wordpress/">
        <img class ="logo" src="http://localhost:8888/wordpress/wp-content/uploads/2018/05/LaguardaLow_LogoRed.png" alt="LaguardaLow">
      </a>
    </div>
    <div class="col-md-3">
      <!-- Search bar -->
      <div class="search-container">
        <form action="/action_page.php">
          <input type="text" placeholder="" name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
    <div class="col-md-4">
      <nav class="site-nav">
        <!-- <a class="site-nav-item active" href="#">Home</a> -->
        <?php wp_nav_menu(); ?>
      </nav>
    </div>
    <div class="col-md-2">
      <!-- English/Chinese -->
      <div class="lang-toggle">
        <p style="line-height: 28px; text-align: center;">English &nbsp; 中文</p>
      </div>
    </div>
  </div>
</header>

    