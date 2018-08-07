"use strict";

document.addEventListener("DOMContentLoaded", applyAnimation);

function applyAnimation() {
    var offset = 0;
    document.querySelectorAll(".project-thumb.invisible").forEach(function (el, i) {
        setTimeout(function () {
            el.classList.add('animate-grid');
            el.classList.remove('invisible');
            el.classList.remove('fade-out');
        }, offset);

        offset += 200;
    });
}