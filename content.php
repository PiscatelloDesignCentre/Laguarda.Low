
<div class="slider-wrapper theme-laguardalowSlider">
  <div id="slider" class="nivoSlider">
    <img src="<?php echo get_site_url() ?>/wp-content/uploads/2018/05/LLA_Homepage1.jpg" alt=""  title="#htmlcaptionTransitionElement"/>
    <img src="<?php echo get_site_url() ?>/wp-content/uploads/2018/05/LLA_Homepage2.jpg" alt=""  title="#htmlcaption"/>
    <img src="<?php echo get_site_url() ?>/wp-content/uploads/2018/05/LLA_Homepage7.jpg" alt=""  title="#htmlcaption"/>
    <img src="<?php echo get_site_url() ?>/wp-content/uploads/2018/05/LLA_Homepage4.jpg" alt=""  title="#htmlcaption"/>
    <img src="<?php echo get_site_url() ?>/wp-content/uploads/2018/05/LLA_Homepage5.jpg" alt=""  title="#htmlcaption"/>
  </div>
  <?php if(ICL_LANGUAGE_NAME == "简体中文" ):?>
  <div id="htmlcaptionTransitionElement" class="nivo-html-caption">
    <p>Laguarda.Low 是一家 <br>专注营造卓越体验的国<br>际性建筑设计公司</p> 
  </div>
  <div id="htmlcaption" class="nivo-html-caption">
    <p>Laguarda.Low 是一家 <br>专注营造卓越体验的国<br>际性建筑设计公司</p> 
  </div>
<?php else: ?>
  <div id="htmlcaptionTransitionElement" class="nivo-html-caption">
    <p>Laguarda.Low is a global</br>architectural practice focused on</br>creating exciting experiences.</p> 
  </div>
  <div id="htmlcaption" class="nivo-html-caption">
    <p>Laguarda.Low is a global</br>architectural practice focused on</br>creating exciting experiences.</p> 
  </div>
<?php endif; ?>
</div>

<script>
 window.addEventListener("DOMContentLoaded", () => {
   setTimeout( ()=> {
     document.querySelector(".slider-wrapper").classList.add("loaded")
   }, 2000)
 })
</script>
<script>
  (function (){
   if(document.body.classList.contains("full-bleed-homepage")) {
     console.log(document.querySelector("html"))
     document.querySelector("html").style.overflow = "hidden";
   }
  })()
</script>
