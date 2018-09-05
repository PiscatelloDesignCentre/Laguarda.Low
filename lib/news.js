"use strict";

var getCategories = function () {
    var _ref = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
        return regeneratorRuntime.wrap(function _callee$(_context) {
            while (1) {
                switch (_context.prev = _context.next) {
                    case 0:
                        _context.next = 2;
                        return fetch(window.site_url + '/wp-json/wp/v2/categories?per_page=50', {
                            method: "GET"
                        }).then(function (res) {
                            return res.json();
                        }).catch(function (err) {
                            throw new error(err);
                        }).then(function (data) {
                            categories = data;
                            return Promise.resolve(categories);
                        });

                    case 2:
                        return _context.abrupt("return", _context.sent);

                    case 3:
                    case "end":
                        return _context.stop();
                }
            }
        }, _callee, this);
    }));

    return function getCategories() {
        return _ref.apply(this, arguments);
    };
}();

var pageLoaded = function () {
    var _ref2 = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee2() {
        var filter, catName, cat, posts, filler, html;
        return regeneratorRuntime.wrap(function _callee2$(_context2) {
            while (1) {
                switch (_context2.prev = _context2.next) {
                    case 0:
                        // console.log(window.page_length)
                        loading = true;
                        _context2.next = 3;
                        return getCategories();

                    case 3:
                        categories = _context2.sent;

                        window.categories = categories;
                        filter = "";

                        if (!(!location.hash || location.hash.length < 1)) {
                            _context2.next = 11;
                            break;
                        }

                        applyAnimation();
                        isPageLoaded = true;
                        loading = false;
                        return _context2.abrupt("return");

                    case 11:
                        if (!location.hash) {
                            _context2.next = 23;
                            break;
                        }

                        catName = location.hash.replace('#', '');
                        cat = filterCategoryNames(catName.toLowerCase());

                        document.querySelector(".category-name-band").innerText = catName;
                        currentFilter = cat.id;

                        filter = "&categories=" + cat.id;
                        document.querySelectorAll(".navigation-tabs a").forEach(function (el, i) {
                            if (el.dataset.filter == cat.id) {
                                el.classList.add("selected");
                            } else {
                                el.classList.remove("selected");
                            }
                        });

                        if (!(cat.id == 19)) {
                            _context2.next = 23;
                            break;
                        }

                        document.body.classList.add("noscroll");
                        archivesLoaded();
                        document.querySelector(".archives-overlay").classList.add("visible");
                        return _context2.abrupt("return");

                    case 23:
                        document.querySelector(".spinner").classList.add("top-center");
                        document.querySelector(".spinner").classList.remove("hidden");
                        _context2.next = 27;
                        return fetch(window.site_url + "wp-json/wp/v2/posts?_embed&order=asc&categories=51&per_page=16&page=1" + filter, {
                            method: 'GET'
                        }).then(function (res) {
                            // console.log(res.headers)
                            // console.log(res)
                            return res.json();
                        });

                    case 27:
                        posts = _context2.sent;
                        filler = [];

                        if (!(posts.length && posts.length < 11 || window.page_length >= currentPage)) {
                            _context2.next = 37;
                            break;
                        }

                        categoryComplete = true;

                        posts.forEach(function (el, i) {
                            idArr.push(el.id);
                        });

                        _context2.next = 34;
                        return fetch(window.site_url + "/wp-json/wp/v2/posts?_embed&order=asc&categories=51&parent=51&per_page=16&exclude=" + (idArr.join(",") || -"1"), {
                            method: 'GET'
                        }).then(function (res) {
                            return res.json();
                        });

                    case 34:
                        filler = _context2.sent;

                        document.querySelector(".spinner").classList.remove("top-center");
                        document.querySelector(".spinner").classList.add("hidden");

                    case 37:

                        isPageLoaded = true;
                        loading = false;

                        posts = posts.concat(filler);

                        _context2.next = 42;
                        return returnProject(posts);

                    case 42:
                        html = _context2.sent;


                        document.querySelector(".grid-container").classList.remove("fade-out");

                        document.querySelector(".grid-container").innerHTML = "";
                        document.querySelector(".grid-container").innerHTML = html;

                        applyAnimation();

                    case 47:
                    case "end":
                        return _context2.stop();
                }
            }
        }, _callee2, this);
    }));

    return function pageLoaded() {
        return _ref2.apply(this, arguments);
    };
}();

var fadeOutAnimation = function () {
    var _ref3 = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee3() {
        return regeneratorRuntime.wrap(function _callee3$(_context3) {
            while (1) {
                switch (_context3.prev = _context3.next) {
                    case 0:
                        document.querySelector(".grid-container").classList.add("fade-out");

                    case 1:
                    case "end":
                        return _context3.stop();
                }
            }
        }, _callee3, this);
    }));

    return function fadeOutAnimation() {
        return _ref3.apply(this, arguments);
    };
}();

/**
@filterProjects
returns void
Filters projects based on data-set and matching strings.
*/

var getNewPosts = function () {
    var _ref5 = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee4(filterLabel) {
        var pageNumber = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 1;
        var filter, posts, filler;
        return regeneratorRuntime.wrap(function _callee4$(_context4) {
            while (1) {
                switch (_context4.prev = _context4.next) {
                    case 0:
                        filter = "&categories=" + filterLabel;
                        posts = [];

                        loading = true;
                        console.log(filterLabel);
                        if (!filterLabel) {
                            filter = "";
                        }

                        if (categoryComplete) {
                            _context4.next = 9;
                            break;
                        }

                        _context4.next = 8;
                        return fetch(window.site_url + "/wp-json/wp/v2/posts?_embed&categories=51&order=asc&per_page=16&page=" + pageNumber + filter, {
                            method: 'GET'
                        }).then(function (res) {
                            if (!res.ok) {
                                throw Error(res.statusText);
                            }
                            return res.json();
                        }).catch(function (err) {
                            // console.log(err)
                        });

                    case 8:
                        posts = _context4.sent;

                    case 9:
                        filler = [];

                        if (!(posts.length && posts.length < 11 && filterLabel || window.page_length >= pageNumber)) {
                            _context4.next = 16;
                            break;
                        }

                        categoryComplete = true;
                        posts.forEach(function (el, i) {
                            idArr.push(el.id);
                        });

                        _context4.next = 15;
                        return fetch(window.site_url + "/wp-json/wp/v2/posts?_embed&categories=51&order=asc&per_page=16&page=" + pageNumber + "&exclude=" + (idArr.join(",") || -"1"), {
                            method: 'GET'
                        }).then(function (res) {
                            return res.json();
                        });

                    case 15:
                        filler = _context4.sent;

                    case 16:

                        loading = false;
                        return _context4.abrupt("return", posts.concat(filler) || []);

                    case 18:
                    case "end":
                        return _context4.stop();
                }
            }
        }, _callee4, this);
    }));

    return function getNewPosts(_x2) {
        return _ref5.apply(this, arguments);
    };
}();

var filterProjects = function () {
    var _ref6 = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee5(e) {
        var posts, html;
        return regeneratorRuntime.wrap(function _callee5$(_context5) {
            while (1) {
                switch (_context5.prev = _context5.next) {
                    case 0:
                        window.scrollTo(0, 0);
                        document.body.classList.remove("noscroll");

                        if (!e.target.classList.contains("selected")) {
                            _context5.next = 4;
                            break;
                        }

                        return _context5.abrupt("return");

                    case 4:

                        currentPage = 1;
                        idArr = [];
                        categoryComplete = false;

                        loading = true;

                        document.querySelectorAll(".navigation-tabs a").forEach(function (el, i) {
                            el.classList.remove("selected");
                        });

                        e.target.classList.add("selected");
                        _context5.next = 12;
                        return fadeOutAnimation();

                    case 12:
                        if (!(e.target.dataset.filter == 19)) {
                            _context5.next = 24;
                            break;
                        }

                        document.body.classList.add("noscroll");
                        document.querySelector(".spinner").classList.add("top-center");
                        document.querySelector(".spinner").classList.remove("hidden");
                        _context5.next = 18;
                        return archivesLoaded();

                    case 18:
                        document.querySelector(".archives-overlay").classList.add("visible");
                        document.querySelector(".spinner").classList.remove("top-center");
                        document.querySelector(".spinner").classList.add("hidden");
                        return _context5.abrupt("return");

                    case 24:
                        document.body.classList.remove("noscroll");
                        document.querySelector(".archives-overlay").classList.remove("visible");
                        setTimeout(function () {
                            document.querySelector(".table-contents").innerHTML = "";
                        }, 500);

                    case 27:

                        currentFilter = e.target.dataset.filter;
                        document.querySelector(".spinner").classList.add("top-center");
                        document.querySelector(".spinner").classList.remove("hidden");
                        _context5.next = 32;
                        return getNewPosts(currentFilter);

                    case 32:
                        posts = _context5.sent;

                        document.querySelector(".spinner").classList.add("hidden");
                        document.querySelector(".spinner").classList.remove("top-center");
                        _context5.next = 37;
                        return returnProject(posts);

                    case 37:
                        html = _context5.sent;


                        document.querySelector(".grid-container").classList.remove("fade-out");

                        document.querySelector(".grid-container").innerHTML = "";
                        document.querySelector(".grid-container").innerHTML = html;
                        applyAnimation();
                        loading = false;

                    case 43:
                    case "end":
                        return _context5.stop();
                }
            }
        }, _callee5, this);
    }));

    return function filterProjects(_x3) {
        return _ref6.apply(this, arguments);
    };
}();

var returnProject = function () {
    var _ref7 = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee6() {
        var posts = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
        var append = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
        var htmlList;
        return regeneratorRuntime.wrap(function _callee6$(_context6) {
            while (1) {
                switch (_context6.prev = _context6.next) {
                    case 0:
                        htmlList = "";
                        _context6.next = 3;
                        return posts.forEach(function (post, i) {
                            var insert = "<a href='" + post.link + "' class='project-thumb invisible'> \n                <img src='" + post._embedded["wp:featuredmedia"][0].source_url + "' /> \n                <div class='project-info'> \n                    <span class='project-title'> \n                        " + post.title.rendered + " \n                    </span> \n                    <span class='project-location'> \n                        " + post.acf.project_city + ", " + post.acf.project_country + "\n                    </span>\n                    <span class='project-category'> \n                        " + mapCategories(post.categories).name + " \n                    </span> \n                </div> \n            </a>";
                            if (append) {
                                document.querySelector(".project-grid .grid-container").insertAdjacentHTML('beforeend', insert);
                            } else htmlList += insert;
                        });

                    case 3:
                        return _context6.abrupt("return", Promise.resolve(htmlList));

                    case 4:
                    case "end":
                        return _context6.stop();
                }
            }
        }, _callee6, this);
    }));

    return function returnProject() {
        return _ref7.apply(this, arguments);
    };
}();

// Lazy Loading 


function _asyncToGenerator(fn) { return function () { var gen = fn.apply(this, arguments); return new Promise(function (resolve, reject) { function step(key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { return Promise.resolve(value).then(function (value) { step("next", value); }, function (err) { step("throw", err); }); } } return step("next"); }); }; }

var urlPart = {};
var categories = [];
var currentlyLoading = false;
var currentPage = 1;
var loading = false;
var isPageLoaded = false;
var currentFilter = "";
var idArr = [];
var categoryComplete = false;

document.querySelectorAll(".navigation-tabs a").forEach(function (el, i) {
    el.addEventListener("click", filterProjects);
});

document.querySelectorAll(".drop-down-selector a").forEach(function (el, i) {
    el.addEventListener("click", filterProjects);
});

document.addEventListener("DOMContentLoaded", pageLoaded);

window.onbeforeunload = function () {
    window.scrollTo(0, 0);
};

window.addEventListener("hashchange", handleHashChange);

function handleHashChange() {
    var hashname = location.hash.replace("#", '');
    document.querySelector(".category-name-band").innerText = hashname || "All";
}

function filterCategoryNames(name) {
    var cat = categories.filter(function (category) {
        return category.slug == name;
    })[0];
    // console.log(cat)
    return cat || "";
}

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

var delay = function delay(ms) {
    return new Promise(function (resolve) {
        return setTimeout(resolve, ms);
    });
};

function shuffle(a) {
    for (var i = a.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var _ref4 = [a[j], a[i]];
        a[i] = _ref4[0];
        a[j] = _ref4[1];
    }
    return a;
}

function mapCategories(id) {
    // console.log(id)
    var index = id.indexOf(51);
    if (index !== -1) id.splice(index, 1);
    var cat = categories.filter(function (category) {
        return category.id == id[0];
    });
    return cat[0] || "";
}

window.onscroll = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee8() {
    return regeneratorRuntime.wrap(function _callee8$(_context8) {
        while (1) {
            switch (_context8.prev = _context8.next) {
                case 0:
                    (function () {
                        var _ref9 = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee7($) {
                            var container, space, posts, html;
                            return regeneratorRuntime.wrap(function _callee7$(_context7) {
                                while (1) {
                                    switch (_context7.prev = _context7.next) {
                                        case 0:
                                            container = document.querySelector(".grid-container"), space = $(window).height() - $(".grid-container")[0].getBoundingClientRect().bottom;

                                            // console.log(space)

                                            if (!(space > -200 && !loading && isPageLoaded && currentPage < window.page_length)) {
                                                _context7.next = 14;
                                                break;
                                            }

                                            loading = true;
                                            currentPage++;
                                            // console.log(currentPage)
                                            document.querySelector(".spinner").classList.remove("hidden");
                                            _context7.next = 7;
                                            return getNewPosts(currentFilter, currentPage);

                                        case 7:
                                            posts = _context7.sent;

                                            document.querySelector(".spinner").classList.add("hidden");
                                            _context7.next = 11;
                                            return returnProject(posts, true);

                                        case 11:
                                            html = _context7.sent;


                                            // console.log("loading...")

                                            applyAnimation();
                                            loading = false;

                                        case 14:
                                        case "end":
                                            return _context7.stop();
                                    }
                                }
                            }, _callee7, this);
                        }));

                        return function (_x6) {
                            return _ref9.apply(this, arguments);
                        };
                    })()(jQuery);

                case 1:
                case "end":
                    return _context8.stop();
            }
        }
    }, _callee8, this);
}));