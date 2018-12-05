const _async = function () {
  try {
    if (isNaN.apply(null, {})) {
      return function (f) {
        return function () {
          try {
            return Promise.resolve(f.apply(this, arguments));
          } catch (e) {
            return Promise.reject(e);
          }
        };
      };
    }
  } catch (e) {}

  return function (f) {
    // Pre-ES5.1 JavaScript runtimes don't accept array-likes in Function.apply
    return function () {
      var args = [];

      for (var i = 0; i < arguments.length; i++) {
        args[i] = arguments[i];
      }

      try {
        return Promise.resolve(f.apply(this, args));
      } catch (e) {
        return Promise.reject(e);
      }
    };
  };
}();

function preventBodyScroll(e) {
  document.body.classList.add("noscroll");
}

function slideOpen(e) {
  if (e.currentTarget.classList.contains("selected")) {
    e.currentTarget.classList.toggle("selected");
    e.currentTarget.querySelectorAll(".slide-open").forEach(function (el, i) {
      el.classList.remove("open");
    });
  } else {
    document.querySelectorAll(".table-row").forEach(function (el, i) {
      el.classList.remove("selected");
    });
    document.querySelectorAll(".slide-open").forEach(function (el, i) {
      el.classList.remove("open");
    });
    e.currentTarget.querySelectorAll(".slide-open").forEach(function (el, i) {
      el.classList.add("open");
    });
    e.currentTarget.classList.toggle("selected");
  }
}

var loadRows = _async(function (json) {
  let html = "";
  globalPosts = json; // json = _.sortBy(globalPosts, "title.rendered")

  json.forEach(function (el, i) {
    html += "<div class='table-row' onclick='return slideOpen(event)'> \n                <div class='table-cell'>" + el.post_title + "</div> \n                <div class='table-cell'><span class=\"mobile-hidden\">Project:&nbsp;</span>" + el.title + "</div> \n                <div class='table-cell'><span class=\"mobile-hidden\">Location:&nbsp;</span>" + el.city + ", " + el.country + "</div>\n                <div class='table-cell'><span class=\"mobile-hidden\">Year:&nbsp;</span>" + el.acf.award_date + "</div> \n                " + function (el) {
      if (el.acf.project_post != false) {
        return "<a href=\"" + el.permalink + "\" class='slide-open mobile-hidden' onclick='return event.stopPropagation()'><img src='" + el.acf.award_project_image.sizes.medium_large + "' /></a>";
      } else return "<div class='slide-open mobile-hidden'><img src='" + el.acf.award_project_image.sizes.medium_large + "' /></div>";
    }(el) + "    \n                <div class='slide-open'>\n                    " + function (el) {
      if (el.acf.award_description) {
        return "<span><strong>Description</strong></span>\n                                <br><br>\n                                <span>\n                                    " + el.acf.award_description + "\n                                </span>";
      } else return "";
    }(el) + "\n                    <br><br>\n                    " + function (el) {
      if (el.acf.project_post != false) {
        return "<a href='" + el.permalink + "' onclick='return event.stopPropagation()'>View Project</a>";
      } else return "";
    }(el) + "   \n                    \n                </div> \n                <div class='slide-open'>\n                    " + function () {
      if (window.language == "中文") {
        return "<span><strong>\u9879\u76EE\u72B6\u6001</strong></span><br>";
      } else return "<span><strong>Status</strong></span><br>";
    }() + "\n                    <span>" + el.acf.award_status + "</span> \n                    <br><br>\n                    " + function () {
      if (window.language == "中文") {
        return "<span><strong>\u89C4\u6A21</strong></span><br>";
      } else return "<span><strong>Size</strong></span><br>";
    }() + " \n                    <span>" + el.acf.award_project_size + "</span> \n                    <br><br>\n                    " + function () {
      if (window.language == "中文") {
        return "<span><strong>\u4E1A\u4E3B</strong></span><br>";
      } else return "<span><strong>Client</strong></span><br>";
    }() + "\n                    <span>" + el.acf.award_client + "</span> \n                    <br></br> \n                </div> \n                <div class='slide-open'>\n                    " + function () {
      if (window.language == "中文") {
        return "<span><strong>\u8BBE\u8BA1\u8303\u56F4</strong></span><br>";
      } else return "<span><strong>Scope</strong></span><br>";
    }() + "\n                    " + el.acf.awarded_project_scope + " \n                </div>\n                " + function (el) {
      if (el.acf.project_post != false) {
        return "<a href=\"" + el.permalink + "\" class='slide-open sm-hidden' onclick='return event.stopPropagation()'><img src='" + el.acf.award_project_image.sizes.medium_large + "' /></a>";
      } else return "<div class='slide-open sm-hidden'><img src='" + el.acf.award_project_image.sizes.medium_large + "' /></div>";
    }(el) + "    \n            </div>";
  });
  document.querySelector(".table-contents").innerHTML = html;
  animateRows();
});

document.querySelectorAll(".sort-header").forEach(function (el, i) {
  el.addEventListener("click", function (event) {
    document.querySelectorAll(".sort-header").forEach(function (el, i) {
      el.classList.remove("active");
    });
    event.currentTarget.classList.add("active");
    let sortKey = event.currentTarget.dataset.key;
    let direction = event.currentTarget.dataset.direction;

    let sorted = _.sortBy(window.posts, function (e) {
      return e[sortKey];
    });

    loadRows(sorted);
  });
});

function animateRows() {
  let offset = 0;
  document.querySelectorAll(".table-row").forEach(function (el, i) {
    setTimeout(function () {
      el.classList.add('row-animate');
    }, offset);
    offset += 75;
  });
}

requestAnimationFrame(function () {
  requestAnimationFrame(function () {
    console.log(window.posts);
    loadRows(window.posts);
  });
});