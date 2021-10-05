(self["webpackChunk"] = self["webpackChunk"] || []).push([["/js/app"],{

/***/ "./node_modules/@alpine-collective/toolkit-screen/dist/module.esm.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@alpine-collective/toolkit-screen/dist/module.esm.js ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ module_default)
/* harmony export */ });
// packages/$screen/src/index.js
function src_default(Alpine) {
  let data = Alpine.reactive({screensize: window.innerWidth});
  const defaultBreakpoints = {
    xs: 0,
    sm: 640,
    md: 768,
    lg: 1024,
    xl: 1280,
    "2xl": 1536
  };
  const breakpoints = window.AlpineMagicHelpersConfig && window.AlpineMagicHelpersConfig.breakpoints ? window.AlpineMagicHelpersConfig.breakpoints : defaultBreakpoints;
  let update;
  window.addEventListener("resize", () => {
    clearTimeout(update);
    update = setTimeout(() => data.screensize = window.innerWidth, 150);
  });
  Alpine.magic("screen", (el) => (breakpoint) => {
    let width = data.screensize;
    if (Number.isInteger(breakpoint))
      return breakpoint <= width;
    if (breakpoints[breakpoint] === void 0) {
      throw Error("Undefined $screen property: " + breakpoint + ". Supported properties: " + Object.keys(breakpoints).join(", "));
    }
    return breakpoints[breakpoint] <= width;
  });
}

// packages/$screen/builds/module.js
var module_default = src_default;



/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");

/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var alpinejs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! alpinejs */ "./node_modules/alpinejs/dist/module.esm.js");
/* harmony import */ var _alpine_collective_toolkit_screen__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @alpine-collective/toolkit-screen */ "./node_modules/@alpine-collective/toolkit-screen/dist/module.esm.js");


window.Alpine = alpinejs__WEBPACK_IMPORTED_MODULE_0__["default"];
window.UIkit = __webpack_require__(/*! uikit */ "./node_modules/uikit/dist/js/uikit.js");
alpinejs__WEBPACK_IMPORTED_MODULE_0__["default"].plugin(_alpine_collective_toolkit_screen__WEBPACK_IMPORTED_MODULE_1__["default"]);
alpinejs__WEBPACK_IMPORTED_MODULE_0__["default"].start();

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["css/app","js/vendor/uikit","js/vendor/alpine"], () => (__webpack_exec__("./resources/js/app.js"), __webpack_exec__("./resources/sass/app.scss")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);