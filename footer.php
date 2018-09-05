    <footer class="site-footer">
      <div class="container-fluid">
        <div class="col-md-8">
          <div class="col-md-2 animation-element footer_projects">
            <ul>
              <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/zh-hans/projects">项目</a></li>
              <?php else: ?>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/projects">PROJECTS</a></li>
              <?php endif; ?>
              </br>
              <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/">全部项目</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/#current">最新项目</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/#planning">总体规划</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/#mixeduse">综合体</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/#retail">商业建筑</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/#transit">交通运输</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/#office">办公楼</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/#residential">住宅</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/#hospitality">酒店</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/#renovation">建筑改造</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/#public">公共建筑</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/projects/#archive">项目列表</a></li>
              <?php else: ?>
              <li><a href="<?php echo get_site_url() ?>/projects">All Projects</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#current">Current</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#planning">Planning</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#mixeduse">Mixed Use</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#retail">Retail</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#transit">Transit</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#office">Office</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#residential">Residential</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#hospitality">Hospitality</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#renovation">Renovation</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#public">Public</a></li>
              <li><a href="<?php echo get_site_url() ?>/projects#archive">Archive</a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_expertise">
            <ul>
              <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/zh-hans/expertise">专长</a></li>
              <?php else: ?>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/expertise">EXPERTISE</a></li>
              <?php endif; ?>
              </br>
              <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/expertise/master-planning?lang=zh-hans">总体规划</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/expertise/mixed-use?lang=zh-hans">综合体设计</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/expertise/retail-design?lang=zh-hans">商业建筑</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/expertise/sustainability?lang=zh-hans">可持续性设计</a></li>
              <?php else: ?>
              <li><a href="<?php echo get_site_url() ?>/expertise/master-planning">Master Planning</a></li>
              <li><a href="<?php echo get_site_url() ?>/expertise/mixed-use">Mixed Use</a></li>
              <li><a href="<?php echo get_site_url() ?>/expertise/retail-design">Retail Design</a></li>
              <li><a href="<?php echo get_site_url() ?>/expertise/sustainability">Sustainability</a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_firm">
            <ul>
              <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/zh-hans/firm">关于我们</a></li>
              <?php else: ?> 
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/firm">FIRM</a></li>
              <?php endif; ?>
              </br>
              <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/firm/overview/">公司概览</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/firm/leadership?lang=zh-hans">领导团队</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/firm/videos?lang=zh-hans">项目视频</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/firm/awards?lang=zh-hans">奖项</a></li>
              <?php else: ?>
              <li><a href="<?php echo get_site_url() ?>/firm/overview">Overview</a></li>
              <li><a href="<?php echo get_site_url() ?>/firm/leadership">Leadership</a></li>
              <li><a href="<?php echo get_site_url() ?>/firm/videos">Videos</a></li>
              <li><a href="<?php echo get_site_url() ?>/firm/awards">Awards</a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_news">
            <ul>
              <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/zh-hans/news">新闻</a></li>
              <?php else: ?>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/news">NEWS</a></li>
              <?php endif ?>
              <br/>>
              <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/news/#events?lang=zh-hans">事件</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/news/#construction?lang=zh-hans">在建项目</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/news/#publications?lang=zh-hans">媒体报道</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/news/#awards?lang=zh-hans">最新获奖</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/news/#newsletters?lang=zh-hans">新闻动态</a></li>
              <?php else: ?>
              <li><a href="<?php echo get_site_url() ?>/news/#events">Events</a></li>
              <li><a href="<?php echo get_site_url() ?>/news/#construction">Construction</a></li>
              <li><a href="<?php echo get_site_url() ?>/news/#publications">Publications</a></li>
              <li><a href="<?php echo get_site_url() ?>/news/#awards">Awards</a></li>
              <li><a href="<?php echo get_site_url() ?>/news/#newsletters">Newsletters</a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="col-md-2 animation-element footer_contact">
            <ul>
              <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/zh-hans/contact">联系我们</a></li>
              <?php else: ?>
              <li class="footer-titles"><a href="<?php echo get_site_url() ?>/contact">CONTACT</a></li>
              <?php endif; ?>
              </br>
              <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/contact">其他</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/contact/#locations?lang=zh-hans">公司分部</a></li>
              <li><a href="<?php echo get_site_url() ?>/zh-hans/contact/#careers?lang=zh-hans">工作机会</a></li>
              <?php else: ?>
              <li><a href="<?php echo get_site_url() ?>/contact">General</a></li>
              <li><a href="<?php echo get_site_url() ?>/contact/#locations">Office Locations</a></li>
              <li><a href="<?php echo get_site_url() ?>/contact/#careers">Careers</a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="col-md-2 animation-element"></div>
        </div>
        <div class="col-md-4 animation-element credits">
          <ul>
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <li class="footer-titles">CREDITS</li>
            <?php else: ?>
            <li class="footer-titles">CREDITS</li>
            <?php endif; ?>
            </br>
            <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
            <li>网站设计/网站建设</li>
            <?php else: ?>
            <li>Website Design and Development</li>
            <?php endif; ?>
            <li><a href="http://piscatello.com" target="_blank">Piscatello Design Centre</a></li>
            </br>
          </ul>
        </div>
      </div>
      <div class="lowerBand row-fluid">
        <div class="socialMedia">
          <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>  
        </div>
        <div class="col-md-3 copyRight">
          <p>Copyright &copy; 2018 Laguarda Low Architects | LLA</p>
        </div>
        <div class="col-md-3 sm-hidden"></div>
        <div class="col-md-3 sm-hidden"></div>
        <div class="col-md-3 socialMedia sm-hidden mobile-hidden">
          <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>  
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.10/lodash.js"></script>
   <script src="https://vjs.zencdn.net/7.1.0/video.js"></script>

    <script type="text/javascript">
    (function($) {
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
              // $('html, body').animate({
              //   scrollTop: target.offset().top
              // }, 1200, function() {
              //   // Callback after animation
              //   // Must change focus!
              //   var $target = $(target);
              //   $target.focus();
              //   if ($target.is(":focus")) { // Checking if the target was focused
              //     return false;
              //   } else {
              //     $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              //     $target.focus(); // Set focus again
              //   };
              // });

              window.scrollTo({
                top: target.offset().top,
                behavior: "smooth"
              });
            }
          }
        });
      })(jQuery)
    </script>
    <script>
      document.querySelectorAll(".site-footer ul").forEach((el, i) => {
        el.addEventListener("click", (event) => {
          if(event.currentTarget.classList.contains("toggle-footer")) {
            event.currentTarget.classList.remove("toggle-footer");
            return; 
          }
          document.querySelectorAll(".site-footer ul").forEach((el, i) => {
            el.classList.remove("toggle-footer");
          });

          event.currentTarget.classList.add("toggle-footer");
        });
      });

      document.querySelectorAll(".site-footer ul a").forEach((el, i) => {
        el.addEventListener("click", (event) => {
          event.stopPropagation();
        });
      });

    </script>

    <!-- jQuery -->
    

    <script type="text/javascript">
    (function($) {
      $('.project-nav-article').click(function() {
        $('.project-nav-article').removeClass('active');
        $(this).addClass('active');
      });
    })(jQuery);
    </script>
    <script type="text/javascript">
    (function($) {
      $( document ).ready(function() {
        console.log( "document loaded" );
        $('.band').addClass('active');
      });
    })(jQuery);
    </script>
    
    


    <!-- Footer sliding up on scroll -->
    <script type="text/javascript">
    (function($) {
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
    })(jQuery)
    </script>
    
  <script>
      (function($) {
        $.fn.isInViewport = function() {
            var elementTop = $(this).offset().top 
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            return elementBottom > viewportTop && elementTop < viewportBottom;
        };

        $(window).on('resize scroll', function() {
            $('.animate').each(function() {
                var activeColor = $(this).attr('id');
                if ($(this).isInViewport()) {
                    $(this).addClass("animate-grid")
                    $(this).removeClass("invisible")
                } else {

                }
            });
        });

        $(window).on('load', function() {
            $('.animate').each(function() {
                var activeColor = $(this).attr('id');
                if ($(this).isInViewport()) {
                    $(this).addClass("animate-grid")
                    $(this).removeClass("invisible")
                } else {

                }
            });
        });
      })(jQuery)
    </script>
    
  

    <script type="text/javascript">
    (function($) {
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
    })(jQuery)
    </script>

    <script type="text/javascript">
    (function($) {
      $(".projectMap").click(function(){
        $('div.relatedProjectsContent').removeClass("active");
        $('div.shareProjectContent').removeClass("active");
        $('div.projectVideoContent').removeClass("active");
        $('div.projectRelated').removeClass("active");
        $('div.projectShare').removeClass("active");
        $('div.projectVideo').removeClass("active");
        $('div.mapContent').addClass("active");
        $('div.projectMap').addClass("active");
        
      });
      $(".projectShare").click(function(){
        $('div.relatedProjectsContent').removeClass("active");
        $('div.mapContent').removeClass("active");
        $('div.projectVideoContent').removeClass("active");
        $('div.projectRelated').removeClass("active");
        $('div.projectVideo').removeClass("active");
        $('div.projectMap').removeClass("active");

        $('div.projectShare').addClass("active");
        $('div.shareProjectContent').addClass("active");

      });
      $(".projectVideo").click(function(){
        $('div.relatedProjectsContent').removeClass("active");
        $('div.mapContent').removeClass("active");
        $('div.shareProjectContent').removeClass("active");
        $('div.projectRelated').removeClass("active");
        $('div.projectShare').removeClass("active");
        $('div.projectMap').removeClass("active");

        $('div.projectVideo').addClass("active");
        $('div.projectVideoContent').addClass("active");
      });
    })(jQuery)
    </script>

    <script type="text/javascript">
    (function($) {
      $(".projectRelated").click(function(){
        $('div.mapContent').removeClass("active");
        $('div.shareProjectContent').removeClass("active");
        $('div.projectVideoContent').removeClass("active");
        $('div.projectVideo').removeClass("active");
        $('div.projectShare').removeClass("active");
        $('div.projectMap').removeClass("active");

        $('div.projectRelated').addClass("active");
        $('div.relatedProjectsContent').addClass("active");
      });
    })(jQuery)
    </script>
    <?php wp_footer(); ?>
  </body>
</html>