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

function _continue(value, then) {
  return value && value.then ? value.then(then) : then(value);
}

function _for(test, update, body) {
  var stage;

  for (;;) {
    var shouldContinue = test();

    if (_isSettledPact(shouldContinue)) {
      shouldContinue = shouldContinue.__value;
    }

    if (!shouldContinue) {
      return result;
    }

    if (shouldContinue.then) {
      stage = 0;
      break;
    }

    var result = body();

    if (result && result.then) {
      if (_isSettledPact(result)) {
        result = result.__state;
      } else {
        stage = 1;
        break;
      }
    }

    if (update) {
      var updateValue = update();

      if (updateValue && updateValue.then && !_isSettledPact(updateValue)) {
        stage = 2;
        break;
      }
    }
  }

  var pact = new _Pact();

  var reject = _settle.bind(null, pact, 2);

  (stage === 0 ? shouldContinue.then(_resumeAfterTest) : stage === 1 ? result.then(_resumeAfterBody) : updateValue.then(_resumeAfterUpdate)).then(void 0, reject);
  return pact;

  function _resumeAfterBody(value) {
    result = value;

    do {
      if (update) {
        updateValue = update();

        if (updateValue && updateValue.then && !_isSettledPact(updateValue)) {
          updateValue.then(_resumeAfterUpdate).then(void 0, reject);
          return;
        }
      }

      shouldContinue = test();

      if (!shouldContinue || _isSettledPact(shouldContinue) && !shouldContinue.__value) {
        _settle(pact, 1, result);

        return;
      }

      if (shouldContinue.then) {
        shouldContinue.then(_resumeAfterTest).then(void 0, reject);
        return;
      }

      result = body();

      if (_isSettledPact(result)) {
        result = result.__value;
      }
    } while (!result || !result.then);

    result.then(_resumeAfterBody).then(void 0, reject);
  }

  function _resumeAfterTest(shouldContinue) {
    if (shouldContinue) {
      result = body();

      if (result && result.then) {
        result.then(_resumeAfterBody).then(void 0, reject);
      } else {
        _resumeAfterBody(result);
      }
    } else {
      _settle(pact, 1, result);
    }
  }

  function _resumeAfterUpdate() {
    if (shouldContinue = test()) {
      if (shouldContinue.then) {
        shouldContinue.then(_resumeAfterTest).then(void 0, reject);
      } else {
        _resumeAfterTest(shouldContinue);
      }
    } else {
      _settle(pact, 1, result);
    }
  }
}

function _isSettledPact(thenable) {
  return thenable instanceof _Pact && thenable.__state === 1;
}

const _Pact = function () {
  function _Pact() {}

  _Pact.prototype.then = function (onFulfilled, onRejected) {
    const state = this.__state;

    if (state) {
      const callback = state == 1 ? onFulfilled : onRejected;

      if (callback) {
        const result = new _Pact();

        try {
          _settle(result, 1, callback(this.__value));
        } catch (e) {
          _settle(result, 2, e);
        }

        return result;
      } else {
        return this;
      }
    }

    const result = new _Pact();

    this.__observer = function (_this) {
      try {
        const value = _this.__value;

        if (_this.__state == 1) {
          _settle(result, 1, onFulfilled ? onFulfilled(value) : value);
        } else if (onRejected) {
          _settle(result, 1, onRejected(value));
        } else {
          _settle(result, 2, value);
        }
      } catch (e) {
        _settle(result, 2, e);
      }
    };

    return result;
  };

  return _Pact;
}();

function _settle(pact, state, value) {
  if (!pact.__state) {
    if (value instanceof _Pact) {
      if (value.__state) {
        if (state === 1) {
          state = value.__state;
        }

        value = value.__value;
      } else {
        value.__observer = _settle.bind(null, pact, state);
        return;
      }
    }

    if (value && value.then) {
      value.then(_settle.bind(null, pact, state), _settle.bind(null, pact, 2));
      return;
    }

    pact.__state = state;
    pact.__value = value;
    const observer = pact.__observer;

    if (observer) {
      observer(pact);
    }
  }
}

function _invoke(body, then) {
  var result = body();

  if (result && result.then) {
    return result.then(then);
  }

  return then(result);
}

function _call(body, then, direct) {
  if (direct) {
    return then ? then(body()) : body();
  }

  try {
    var result = Promise.resolve(body());
    return then ? result.then(then) : result;
  } catch (e) {
    return Promise.reject(e);
  }
}

var loadRows = _async(function (json) {
  let html = "";
  globalPosts = json; // json = _.sortBy(globalPosts, "title.rendered")

  json.forEach(function (el, i) {
    html += "<div class='table-row' onclick='return slideOpen(event)'> \n                <div class='table-cell'>" + el.post_title + "</div> \n                <div class='table-cell'><span class=\"mobile-hidden\">Type:&nbsp;</span>" + el.category_names[0] + "</div> \n                <div class='table-cell'><span class=\"mobile-hidden\">Location:&nbsp;</span>" + el.project_city + ", " + el.project_country + "</div>\n                <div class='table-cell'><span class=\"mobile-hidden\">Year:&nbsp;</span>" + el.post_year + "</div> \n                <a href=\"" + el.permalink + "\" class='slide-open mobile-hidden'><img src='" + el.thumbnail + "' /></a> \n                <div class='slide-open'> \n                    " + function (el) {
      if (el.permalink != "") {
        return "<a href='" + el.permalink + "' onclick='return event.stopPropagation()'>View Project</a>";
      }
    }(el) + "   \n                    \n                </div> \n                <div class='slide-open'>\n                    <strong>Status</strong><br> \n                    <span>" + el.status + "</span> \n                    <br class=\"sm-hidden\"><br class=\"sm-hidden\"> \n                    <strong>Size</strong><br> \n                    <span>" + el.project_area + "</span> \n                    <br class=\"sm-hidden\"><br>\n                    <strong>Client</strong><br> \n                    <span>" + el.client + "</span> \n                    <br class=\"sm-hidden\"><br class=\"sm-hidden\">\n                </div> \n                <div class='slide-open'> \n                    <strong>Scope</strong><br> \n                    " + el.scope + " \n                </div> \n                <a href=\"" + el.permalink + "\" class='slide-open sm-hidden'><img src='" + el.thumbnail + "' /></a> \n            </div>";
  });
  document.querySelector(".table-contents").innerHTML = html;
  animateRows();
});

// Fadeout Anim
var fadeOutAnimation = _async(function () {
  document.querySelector(".grid-container").classList.add("fade-out");
});

var addPosts = _async(function (numberOfPosts, posts) {
  var _interrupt = false;
  let reset = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;
  var insert = "";
  let x = 0;
  return _continue(_for(function () {
    return !_interrupt && x < numberOfPosts;
  }, function () {
    return x++;
  }, function () {
    return _invoke(function () {
      if (reset) {
        window.post_number = 0;
        return _call(fadeOutAnimation, function () {
          window.scrollTo(0, 0);
          document.querySelector(".grid-container").innerHTML = "";
          document.querySelector(".grid-container").classList.remove("fade-out");
        });
      }
    }, function () {
      if (window.post_number + (x + 1) > posts.length) {
        _interrupt = true;
        return;
      }

      let post = posts[window.post_number + x];
      insert += "<a href='" + post.permalink + "' class='project-thumb invisible'> \n            <img data-src='" + post.thumbnail + "' /> \n            <div class='project-info'> \n                <span class='project-title'> \n                    " + post.post_title + " \n                </span> \n                <span class='project-location'> \n                    " + post.project_city + ", " + post.project_country + "\n                </span>\n                <span class='project-category'> \n                    " + post.category_names[0] + " \n                </span> \n            </div> \n        </a>";
    });
  }), function () {
    window.post_number += numberOfPosts;
    document.querySelector(".grid-container").insertAdjacentHTML('beforeend', insert);
    [].forEach.call(document.querySelectorAll('img[data-src]'), function (img) {
      img.setAttribute('src', img.getAttribute('data-src'));

      img.onload = function () {
        img.removeAttribute('data-src');
      };
    });
    applyAnimation();
  });
}); // Animate DOM elements just applied to the DOM


// Add posts to the DOM via loop
// @param numberOfPosts - Integer, used for number of posts to render
window.addEventListener("hashchange", handleHashChange);

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
} // rAF cross browser usage


var scroll = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || window.oRequestAnimationFrame || // IE Fallback, you can even fallback to onscroll
function (callback) {
  window.setTimeout(callback, 1000 / 60);
}; // function run in rAF


function scrollAnimation() {
  var container = document.querySelector(".grid-container"),
      space = window.innerHeight - document.querySelector(".grid-container").getBoundingClientRect().bottom;

  if (space > 100) {
    addPosts(4, window.posts);
  }

  scroll(scrollAnimation);
} // Call the loop for the first time


scrollAnimation(); // Handle hash change, should provide native back and forward project loading

function handleHashChange() {
  selectButton();
  var filter = window.location.hash.replace("#", '');
  changeMobileMenu(filter);

  if (filter == "archive") {
    showArchives();
  } else hideArchives();

  filterPosts(filter);
}

function showArchives() {
  fadeOutAnimation();
  requestAnimationFrame(function () {
    requestAnimationFrame(function () {
      document.querySelector(".grid-container").style.display = "none";
      document.querySelector(".archives-overlay").style.display = "block";
    });
  });
}

function hideArchives() {
  fadeOutAnimation();
  requestAnimationFrame(function () {
    requestAnimationFrame(function () {
      document.querySelector(".grid-container").style.display = "flex";
      document.querySelector(".archives-overlay").style.display = "none";
    });
  });
}

function filterPosts(term) {
  let posts = window.posts;
  var selectedPosts = [];
  var remainingPosts = [];

  if (window.is_chinese) {
    term = window.category_names[term.replace("-", "")];
    console.log(term);
  }

  if (term == "" || !term) {
    window.posts = getOriginalPosts();
    console.log("being sorted!");
  } else if (term == "current") {
    selectedPosts = posts.filter(function (el) {
      if (el.is_current == true) return el;
    });

    if (selectedPosts.length > 0) {
      remainingPosts = posts.filter(function (el) {
        if (el.is_current == false) return el;
      });
      window.posts = selectedPosts.concat(remainingPosts);
    }
  } else {
    //Select All posts which match criteria
    selectedPosts = posts.filter(function (el) {
      if (el.category_names[0].toLowerCase().replace(/\s/g, '-') == term) return el;
    });
    selectedPosts = _.sortBy(selectedPosts, "category_order"); //If matching posts, backfill with all that don't match

    if (selectedPosts.length > 0) {
      remainingPosts = posts.filter(function (el) {
        if (el.category_names[0].toLowerCase().replace(/\s/g, '') !== term) return el;
      });
      window.posts = selectedPosts.concat(remainingPosts);
    } //Else, just get the original posts and use all them instead
    else {
        window.posts = getOriginalPosts();
      }
  }

  addPosts(16, window.posts, true);
} // Get original array from JSON


function getOriginalPosts() {
  return JSON.parse(JSON.stringify(window.posts_original));
}

function selectButton() {
  var navTabs = document.querySelectorAll(".navigation-tabs a");
  let button = document.querySelector(".navigation-tabs a[href='" + window.location.hash.replace(/\s/g, '-') + "']");
  navTabs.forEach(function (el) {
    el.classList.remove("selected");
  });
  if (button) button.classList.add("selected");else navTabs[0].classList.add("selected");
}

function changeMobileMenu(filter) {
  var headerArea = document.querySelector(".category-name-band");

  if (window.is_chinese) {
    headerArea.innerHTML = window.category_names[filter.replace("-", "")] || '所有';
  } else headerArea.innerHTML = filter.replace("-", " ") || 'All';
}

document.addEventListener("DOMContentLoaded", function (event) {
  let sorted = _.sortBy(window.posts, function (e) {
    return e["post_year"];
  });

  loadRows(sorted.reverse());

  if (window.location.hash) {
    let hash = window.location.hash.replace("#", '').replace("-", "");

    if (hash == "archive") {
      showArchives();
    } else filterPosts(hash);

    selectButton();
  } else {
    window.posts = getOriginalPosts();
    addPosts(16, window.posts);
  }

  scrollAnimation();
});

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
    offset += 75; // console.log(offset)
  });
}