"use strict";document.addEventListener("DOMContentLoaded",applyAnimation);function applyAnimation(){var a=0;document.querySelectorAll(".project-thumb.invisible").forEach(function(b){setTimeout(function(){b.classList.add("animate-grid"),b.classList.remove("invisible"),b.classList.remove("fade-out")},a),a+=200})}