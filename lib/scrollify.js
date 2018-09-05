"use strict";

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

!function (t, e) {
  "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) && "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) ? module.exports = e() : "function" == typeof define && define.amd ? define([], e) : "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) ? exports["scroll-snap"] = e() : t["scroll-snap"] = e();
}(undefined, function () {
  return function (t) {
    function e(o) {
      if (n[o]) return n[o].exports;var i = n[o] = { i: o, l: !1, exports: {} };return t[o].call(i.exports, i, i.exports, e), i.l = !0, i.exports;
    }var n = {};return e.m = t, e.c = n, e.i = function (t) {
      return t;
    }, e.d = function (t, n, o) {
      e.o(t, n) || Object.defineProperty(t, n, { configurable: !1, enumerable: !0, get: o });
    }, e.n = function (t) {
      var n = t && t.__esModule ? function () {
        return t.default;
      } : function () {
        return t;
      };return e.d(n, "a", n), n;
    }, e.o = function (t, e) {
      return Object.prototype.hasOwnProperty.call(t, e);
    }, e.p = "", e(e.s = 0);
  }([function (t, e, n) {
    "use strict";
    Object.defineProperty(e, "__esModule", { value: !0 });var o = "function" == typeof Symbol && "symbol" == _typeof(Symbol.iterator) ? function (t) {
      return typeof t === "undefined" ? "undefined" : _typeof(t);
    } : function (t) {
      return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t === "undefined" ? "undefined" : _typeof(t);
    };e.default = function (t, e) {
      function n(t, e) {
        function n() {
          _[e] = null;
        }var o = t,
            i = void 0;return i = null !== _[e] ? o - _[e] : 0, _[e] = o, q && clearTimeout(q), q = setTimeout(n, 50), i;
      }function u(t) {
        t.snapLengthUnit = v(S);
      }function c(t) {
        W = t === document ? document.body : t, t.style.overflow = "auto", t.style.webkitOverflowScrolling = "auto", t.addEventListener("scroll", s, !1), u(W);
      }function f(t) {
        t.style.webkitOverflowScrolling = null, t.removeEventListener("scroll", s, !1);
      }function s() {
        H = n(W.scrollLeft, "x"), R = n(W.scrollTop, "y"), j || 0 === H && 0 === R || a(W);
      }function a(t) {
        A = t, F = h(A), k && (window.cancelAnimationFrame(k) || clearTimeout(k)), O ? clearTimeout(O) : U = { y: F.scrollTop, x: F.scrollLeft }, O = setTimeout(d, L);
      }function d() {
        if (U.y !== F.scrollTop || U.x !== F.scrollLeft) {
          var t = { y: R > 0 ? 1 : -1, x: H > 0 ? 1 : -1 },
              e = void 0;e = m(F, A, t), A.removeEventListener("scroll", s, !1), j = !0, E(F, e, function () {
            j = !1, A.addEventListener("scroll", s, !1), M();
          }), isNaN(e.x || !isNaN(e.y)) || (U = e);
        }
      }function m(t, e, n) {
        var o = { y: p(n.y, x(e, e.snapLengthUnit.y)), x: p(n.x, w(e, e.snapLengthUnit.x)) },
            i = t.scrollTop,
            r = t.scrollLeft,
            l = { y: i / o.y || 1, x: r / o.x || 1 },
            u = { y: 0, x: 0 };u.y = p(n.y, l.y), u.x = p(n.x, l.x);var c = { y: u.y * o.y, x: u.x * o.x };return c.y = y(0, t.scrollHeight, c.y), c.x = y(0, t.scrollWidth, c.x), c;
      }function p(t, e) {
        return t === -1 ? Math.floor(e) : Math.ceil(e);
      }function y(t, e, n) {
        return Math.max(Math.min(n, e), t);
      }function v(t) {
        var e = /(\d+)(px|%|vw) (\d+)(px|%|vh)/g,
            n = { y: { value: 0, unit: "px" }, x: { value: 0, unit: "px" } },
            o = void 0;return o = e.exec(t), null !== o && (n.x = { value: o[1], unit: o[2] }, n.y = { value: o[3], unit: o[4] }), n;
      }function x(t, e) {
        return "vh" === e.unit ? Math.max(document.documentElement.clientHeight, window.innerHeight || 1) / 100 * e.value : "%" === e.unit ? t.offsetHeight / 100 * e.value : t.offsetHeight / e.value;
      }function w(t, e) {
        return "vw" === e.unit ? Math.max(document.documentElement.clientWidth, window.innerWidth || 1) / 100 * e.value : "%" === e.unit ? t.offsetWidth / 100 * e.value : t.offsetWidth / e.value;
      }function h(t) {
        return t === document || t === window ? document.documentElement.scrollTop > 0 || document.documentElement.scrollLeft > 0 ? document.documentElement : document.querySelector("body") : t;
      }function b(t, e, n, o) {
        return n * (t /= o) * t * t + e;
      }function T(t, e, n, o) {
        return n > o ? e : b(n, t, e - t, o);
      }function g(t, e) {
        return 0 === t.x && 0 === R || 0 === t.y && 0 === H;
      }function E(t, e, n) {
        function o(c) {
          u || (u = c);var f = c - u;if (isNaN(e.y) || (t.scrollTop = T(i.y, e.y, f, l)), isNaN(e.x) || (t.scrollLeft = T(i.x, e.x, f, l)), f < l) r(o);else if ("function" == typeof n) return n(e);
        }var i = { y: t.scrollTop, x: t.scrollLeft },
            r = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || function (t) {
          window.setTimeout(t, 15);
        },
            l = g(i, e) ? 0 : N,
            u = null;k = r(o);
      }if (e.scrollTimeout && (isNaN(e.scrollTimeout) || "boolean" == typeof e.scrollTimeout)) throw new Error("Optional config property 'scrollTimeout' is not valid, expected NUMBER but found " + o(e.scrollTimeout).toUpperCase());var L = e.scrollTimeout || i;if (e.scrollTime && (isNaN(e.scrollTime) || "boolean" == typeof e.scrollTime)) throw new Error("Optional config property 'scrollTime' is not valid, expected NUMBER but found " + o(e.scrollTime).toUpperCase());var N = e.scrollTime || r;if (!e.scrollSnapDestination) throw new Error("Required config property scrollSnapDestination is not defined");var S = e.scrollSnapDestination,
          M = void 0,
          O = null,
          U = null,
          j = !1,
          q = 0,
          H = void 0,
          R = void 0,
          W = void 0,
          A = void 0,
          F = void 0,
          _ = { x: null, y: null },
          k = null;return this.bind = function (e) {
        M = "function" == typeof e ? e : l, c(t);
      }, this.unbind = function () {
        f(t);
      }, this;
    };var i = 300,
        r = 2,
        l = function l() {};
  }]);
});