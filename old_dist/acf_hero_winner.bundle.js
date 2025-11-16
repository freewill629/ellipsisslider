/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "dist";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/components/template-parts/blocks/full-width/hero-winner/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/components/template-parts/blocks/full-width/hero-winner/_hero-winner.scss":
/*!***************************************************************************************!*\
  !*** ./src/components/template-parts/blocks/full-width/hero-winner/_hero-winner.scss ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9zcmMvY29tcG9uZW50cy90ZW1wbGF0ZS1wYXJ0cy9ibG9ja3MvZnVsbC13aWR0aC9oZXJvLXdpbm5lci9faGVyby13aW5uZXIuc2Nzcy5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9jb21wb25lbnRzL3RlbXBsYXRlLXBhcnRzL2Jsb2Nrcy9mdWxsLXdpZHRoL2hlcm8td2lubmVyL19oZXJvLXdpbm5lci5zY3NzPzkxZTMiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIl0sIm1hcHBpbmdzIjoiQUFBQSIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/components/template-parts/blocks/full-width/hero-winner/_hero-winner.scss\n");

/***/ }),

/***/ "./src/components/template-parts/blocks/full-width/hero-winner/_testimonial-slider.scss":
/*!**********************************************************************************************!*\
  !*** ./src/components/template-parts/blocks/full-width/hero-winner/_testimonial-slider.scss ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9zcmMvY29tcG9uZW50cy90ZW1wbGF0ZS1wYXJ0cy9ibG9ja3MvZnVsbC13aWR0aC9oZXJvLXdpbm5lci9fdGVzdGltb25pYWwtc2xpZGVyLnNjc3MuanMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvY29tcG9uZW50cy90ZW1wbGF0ZS1wYXJ0cy9ibG9ja3MvZnVsbC13aWR0aC9oZXJvLXdpbm5lci9fdGVzdGltb25pYWwtc2xpZGVyLnNjc3M/MTc2NiJdLCJzb3VyY2VzQ29udGVudCI6WyIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW4iXSwibWFwcGluZ3MiOiJBQUFBIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./src/components/template-parts/blocks/full-width/hero-winner/_testimonial-slider.scss\n");

/***/ }),

/***/ "./src/components/template-parts/blocks/full-width/hero-winner/_testimonial.scss":
/*!***************************************************************************************!*\
  !*** ./src/components/template-parts/blocks/full-width/hero-winner/_testimonial.scss ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9zcmMvY29tcG9uZW50cy90ZW1wbGF0ZS1wYXJ0cy9ibG9ja3MvZnVsbC13aWR0aC9oZXJvLXdpbm5lci9fdGVzdGltb25pYWwuc2Nzcy5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9jb21wb25lbnRzL3RlbXBsYXRlLXBhcnRzL2Jsb2Nrcy9mdWxsLXdpZHRoL2hlcm8td2lubmVyL190ZXN0aW1vbmlhbC5zY3NzPzExMDkiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIl0sIm1hcHBpbmdzIjoiQUFBQSIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/components/template-parts/blocks/full-width/hero-winner/_testimonial.scss\n");

/***/ }),

/***/ "./src/components/template-parts/blocks/full-width/hero-winner/index.js":
/*!******************************************************************************!*\
  !*** ./src/components/template-parts/blocks/full-width/hero-winner/index.js ***!
  \******************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _testimonial_slider_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_testimonial-slider.scss */ \"./src/components/template-parts/blocks/full-width/hero-winner/_testimonial-slider.scss\");\n/* harmony import */ var _testimonial_slider_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_testimonial_slider_scss__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _testimonial_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_testimonial.scss */ \"./src/components/template-parts/blocks/full-width/hero-winner/_testimonial.scss\");\n/* harmony import */ var _testimonial_scss__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_testimonial_scss__WEBPACK_IMPORTED_MODULE_1__);\n/* harmony import */ var _hero_winner_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./_hero-winner.scss */ \"./src/components/template-parts/blocks/full-width/hero-winner/_hero-winner.scss\");\n/* harmony import */ var _hero_winner_scss__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_hero_winner_scss__WEBPACK_IMPORTED_MODULE_2__);\n/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */ /* ~~~~~~~~~~ Hero Banner Template Part Webpack ~~~~~~~~~~ */ /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */ /* ~~~~~~~~~~ Plugins ~~~~~~~~~~ */ /* ~~~~~~~~~~ Custom assets ~~~~~~~~~~ *///# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9zcmMvY29tcG9uZW50cy90ZW1wbGF0ZS1wYXJ0cy9ibG9ja3MvZnVsbC13aWR0aC9oZXJvLXdpbm5lci9pbmRleC5qcy5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9jb21wb25lbnRzL3RlbXBsYXRlLXBhcnRzL2Jsb2Nrcy9mdWxsLXdpZHRoL2hlcm8td2lubmVyL2luZGV4LmpzPzczZTYiXSwic291cmNlc0NvbnRlbnQiOlsiLyogfn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn4gKi8gLyogfn5+fn5+fn5+fiBIZXJvIEJhbm5lciBUZW1wbGF0ZSBQYXJ0IFdlYnBhY2sgfn5+fn5+fn5+fiAqLyAvKiB+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fn5+fiAqLyAvKiB+fn5+fn5+fn5+IFBsdWdpbnMgfn5+fn5+fn5+fiAqLyAvKiB+fn5+fn5+fn5+IEN1c3RvbSBhc3NldHMgfn5+fn5+fn5+fiAqL2ltcG9ydFwiLi9fdGVzdGltb25pYWwtc2xpZGVyLnNjc3NcIjtpbXBvcnRcIi4vX3Rlc3RpbW9uaWFsLnNjc3NcIjtpbXBvcnRcIi4vX2hlcm8td2lubmVyLnNjc3NcIjsiXSwibWFwcGluZ3MiOiJBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUEiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./src/components/template-parts/blocks/full-width/hero-winner/index.js\n");

/***/ })

/******/ });