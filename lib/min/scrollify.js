"use strict";var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(a){return typeof a}:function(a){return a&&"function"==typeof Symbol&&a.constructor===Symbol&&a!==Symbol.prototype?"symbol":typeof a};!function(a,b){"object"==("undefined"==typeof exports?"undefined":_typeof(exports))&&"object"==("undefined"==typeof module?"undefined":_typeof(module))?module.exports=b():"function"==typeof define&&define.amd?define([],b):"object"==("undefined"==typeof exports?"undefined":_typeof(exports))?exports["scroll-snap"]=b():a["scroll-snap"]=b()}(void 0,function(){return function(a){function b(d){if(c[d])return c[d].exports;var e=c[d]={i:d,l:!1,exports:{}};return a[d].call(e.exports,e,e.exports,b),e.l=!0,e.exports}var c={};return b.m=a,b.c=c,b.i=function(a){return a},b.d=function(a,c,d){b.o(a,c)||Object.defineProperty(a,c,{configurable:!1,enumerable:!0,get:d})},b.n=function(a){var c=a&&a.__esModule?function(){return a.default}:function(){return a};return b.d(c,"a",c),c},b.o=function(a,b){return Object.prototype.hasOwnProperty.call(a,b)},b.p="",b(b.s=0)}([function(a,b){"use strict";Object.defineProperty(b,"__esModule",{value:!0});var z="function"==typeof Symbol&&"symbol"==_typeof(Symbol.iterator)?function(a){return"undefined"==typeof a?"undefined":_typeof(a)}:function(a){return a&&"function"==typeof Symbol&&a.constructor===Symbol&&a!==Symbol.prototype?"symbol":"undefined"==typeof a?"undefined":_typeof(a)};b.default=function(l,r){function e(a,b){var c,d=a;return c=null===X[b]?0:d-X[b],X[b]=d,N&&clearTimeout(N),N=setTimeout(function(){X[b]=null},50),c}function n(a){a.snapLengthUnit=y(I)}function t(a){S=a===document?document.body:a,a.style.overflow="auto",a.style.webkitOverflowScrolling="auto",a.addEventListener("scroll",f,!1),n(S)}function c(a){a.style.webkitOverflowScrolling=null,a.removeEventListener("scroll",f,!1)}function f(){P=e(S.scrollLeft,"x"),Q=e(S.scrollTop,"y"),L||0===P&&0===Q||s(S)}function s(b){T=b,V=w(T),Y&&(window.cancelAnimationFrame(Y)||clearTimeout(Y)),J?clearTimeout(J):K={y:V.scrollTop,x:V.scrollLeft},J=setTimeout(a,D)}function a(){if(K.y!==V.scrollTop||K.x!==V.scrollLeft){var a,b={y:0<Q?1:-1,x:0<P?1:-1};a=u(V,T,b),T.removeEventListener("scroll",f,!1),L=!0,g(V,a,function(){L=!1,T.addEventListener("scroll",f,!1),G()}),isNaN(a.x||!isNaN(a.y))||(K=a)}}function u(a,b,d){var e={y:m(d.y,v(b,b.snapLengthUnit.y)),x:m(d.x,x(b,b.snapLengthUnit.x))},f=a.scrollTop,g=a.scrollLeft,h={y:f/e.y||1,x:g/e.x||1},i={y:0,x:0};i.y=m(d.y,h.y),i.x=m(d.x,h.x);var j={y:i.y*e.y,x:i.x*e.x};return j.y=p(0,a.scrollHeight,j.y),j.x=p(0,a.scrollWidth,j.x),j}function m(a,b){return-1===a?Math.floor(b):Math.ceil(b)}function p(a,b,c){return C(Math.min(c,b),a)}function y(a){var b,c=/(\d+)(px|%|vw) (\d+)(px|%|vh)/g,d={y:{value:0,unit:"px"},x:{value:0,unit:"px"}};return b=c.exec(a),null!==b&&(d.x={value:b[1],unit:b[2]},d.y={value:b[3],unit:b[4]}),d}function v(a,b){return"vh"===b.unit?C(document.documentElement.clientHeight,window.innerHeight||1)/100*b.value:"%"===b.unit?a.offsetHeight/100*b.value:a.offsetHeight/b.value}function x(a,b){return"vw"===b.unit?C(document.documentElement.clientWidth,window.innerWidth||1)/100*b.value:"%"===b.unit?a.offsetWidth/100*b.value:a.offsetWidth/b.value}function w(a){return a===document||a===window?0<document.documentElement.scrollTop||0<document.documentElement.scrollLeft?document.documentElement:document.querySelector("body"):a}function h(a,b,c,d){return c*(a/=d)*a*a+b}function b(a,b,c,d){return c>d?b:h(c,a,b-a,d)}function B(a){return 0===a.x&&0===Q||0===a.y&&0===P}function g(a,d,e){function g(l){k||(k=l);var c=l-k;if(isNaN(d.y)||(a.scrollTop=b(h.y,d.y,c,j)),isNaN(d.x)||(a.scrollLeft=b(h.x,d.x,c,j)),c<j)i(g);else if("function"==typeof e)return e(d)}var h={y:a.scrollTop,x:a.scrollLeft},i=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||function(a){window.setTimeout(a,15)},j=B(h,d)?0:E,k=null;Y=i(g)}var C=Math.max;if(r.scrollTimeout&&(isNaN(r.scrollTimeout)||"boolean"==typeof r.scrollTimeout))throw new Error("Optional config property 'scrollTimeout' is not valid, expected NUMBER but found "+z(r.scrollTimeout).toUpperCase());var D=r.scrollTimeout||o;if(r.scrollTime&&(isNaN(r.scrollTime)||"boolean"==typeof r.scrollTime))throw new Error("Optional config property 'scrollTime' is not valid, expected NUMBER but found "+z(r.scrollTime).toUpperCase());var E=r.scrollTime||i;if(!r.scrollSnapDestination)throw new Error("Required config property scrollSnapDestination is not defined");var G,I=r.scrollSnapDestination,J=null,K=null,L=!1,N=0,P=void 0,Q=void 0,S=void 0,T=void 0,V=void 0,X={x:null,y:null},Y=null;return this.bind=function(a){G="function"==typeof a?a:d,t(l)},this.unbind=function(){c(l)},this};var o=300,i=2,d=function(){}}])});