var elem = document.querySelector(".main-carousel"),
  video = "",
  flkty = new Flickity(elem, {
    contain: !1,
    setGallerySize: !1,
    draggable: !1,
    wrapAround: !0
  });

function playOnSelect() {
  console.log("selected"), console.log(video), video && video.removeEventListener("ended", playNext, !0), video = elem.querySelector(".is-selected").querySelector("video"), video.addEventListener("ended", playNext, !0), video.addEventListener("play", function () {
    animateCircles(video)
  }), video.pause(), video.currentTime = 0, video.play()
}
document.querySelector(".custom-prev-next-button.right").addEventListener("click", playNext), document.querySelector(".custom-prev-next-button.left").addEventListener("click", playPrev);

function playNext(b) {
  b.stopPropagation(), flkty.next()
}

function playPrev(b) {
  b.stopPropagation(), flkty.previous()
}
flkty.on("select", playOnSelect);
var dotSvg = `<div class="figure">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="15px" height="15px" viewBox="0 0 200 200" enable-background="new 0 0 15 15" xml:space="preserve">
                  <path class="path" fill="none" stroke="#FFFFFF" stroke-width="25" stroke-miterlimit="10" d="M100.416,2.001C154.35,2.225,198,46.015,198,100
                    c0,54.124-43.876,98-98,98S2,154.124,2,100S45.876,2,100,2"/>
                  <!--<path class="path" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="20" stroke-miterlimit="20" d="M100,2C100.139,2,100,2,100,2"/>-->
                </svg>
              </div>`;
window.addEventListener("DOMContentLoaded", () => {
  setTimeout(() => {
    document.querySelector(".slideshow-custom-wrapper").classList.add("loaded")
  }, 1e3), document.querySelectorAll(".dot").forEach(b => {
    b.insertAdjacentHTML("beforeend", dotSvg)
  }), playOnSelect()
});

function animateCircles(g) {
  var vidPercentageDone = 0;
  function a() {
    if (i <= 0 * h) return cancelAnimationFrame(j), void(h = 615.423095703125);
    var b = 100 - Math.round(100 * (parseFloat(i) / h));
    $(".figure p").html(b + "%"), $(".path").css({
      "stroke-dashoffset": i
    }), g.duration !== NaN && (vidPercentageDone = g.currentTime / g.duration, i = h - h * vidPercentageDone), j = requestAnimationFrame(a)
  }
  var b = $(".flickity-page-dots svg").find("path"),
    h = b[0].getTotalLength();
  console.log(h), b.css({
    "stroke-dasharray": h + " " + h,
    "stroke-dashoffset": h
  });
  var i = h,
    j = requestAnimationFrame(a)
}