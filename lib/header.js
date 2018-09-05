"use strict";

(function ($) {

  function handleTouchMove(e) {
    e.preventDefault();
    e.stopPropagation();
    console.log("adding event");
  }

  document.querySelector(".open-close").addEventListener('click', function (e) {
    var box = e.currentTarget.classList.toggle("expand");
    document.querySelector(".flex-right").classList.toggle("visible");
    document.body.classList.toggle("noscroll");

    if (document.body.classList.contains("noscroll")) {
      window.addEventListener('touchmove', handleTouchMove, { passive: false });
    } else {
      window.removeEventListener('touchmove', handleTouchMove, { passive: false });
    }

    document.querySelector(".band").classList.toggle("fixed");

    if (document.querySelector(".band").classList.contains("home-band")) {
      document.querySelector(".band").classList.toggle("active");
      document.querySelector(".band").blur();
    }
  });

  document.querySelector(".close-search").addEventListener("click", function () {
    document.querySelector(".search-container").classList.remove("active");
    $(".nav-collapse").css({ "visibility": "visible" });
    $(".nav-collapse").fadeTo(".345", 1);
    document.body.classList.remove("noscroll");
    document.querySelector(".search-overlay").classList.remove("visible");
    document.querySelector(".band").classList.remove("searching");
  });

  document.querySelector(".search").addEventListener("click", function () {
    document.querySelector(".search-container").classList.toggle("active");
    if (document.querySelector(".search-container").classList.contains("active")) {
      $(".nav-collapse").fadeTo(".345", 0);
      setTimeout(function () {
        $(".nav-collapse").css({ "visibility": "hidden" });
      }, 345);
      document.body.classList.add("noscroll");
      document.querySelector(".search-overlay").classList.add("visible");
      document.querySelector(".band").classList.add("searching");
      document.querySelector(".band").classList.add("active");
    } else {
      $(".nav-collapse").css({ "visibility": "visible" });
      $(".nav-collapse").fadeTo(".345", 1);
      document.body.classList.remove("noscroll");
      document.querySelector(".search-overlay").classList.remove("visible");
      document.querySelector(".band").classList.remove("searching");
    }
  });
})(jQuery);