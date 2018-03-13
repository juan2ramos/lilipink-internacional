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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "/assets/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ 20:
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;;(function (root, factory) {  // eslint-disable-line
  // Making module available as AMS, CommonJS and for browser.
  /* eslint-disable no-undef */
  if (typeof module === 'object' && module.exports) {
    module.exports = factory();
  } else if (true) {
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = function () {
      return (function () { return factory(); });
    }.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else {
    root['loadGoogleMapsApi'] = factory();
  }
  /* eslint-enable no-undef */
}(this, function() {
  'use strict';
  // Start of module definition.

  function loader (opts) {
    opts = opts || {};

    var client = opts.client || loader.client;
    var key = opts.key || loader.key;
    var language = opts.language || loader.language;
    var libraries = opts.libraries || loader.libraries || [];
    var timeout = opts.timeout || loader.timeout || 10000;
    var version = opts.version || loader.version;

    var callbackName = '__googleMapsApiOnLoadCallback';

    return new window.Promise(function (resolve, reject) {
      // Exit if not running inside a browser.
      if (typeof window === 'undefined') {
        return reject(new Error('Can only load the Google Maps API in the browser'));
      }

      // Check whether API is already loaded.
      if (window.google && window.google.maps) {
        resolve(window.google.maps);
      } else {
        // Prepare the `script` tag to be inserted into the page.
        var scriptElement = document.createElement('script');
        var params = ['callback=' + callbackName];
        if (client) params.push('client=' + client);
        if (key) params.push('key=' + key);
        if (language) params.push('language=' + language);
        libraries = [].concat(libraries); // Ensure that `libraries` is an array
        if (libraries.length) params.push('libraries=' + libraries.join(','));
        if (version) params.push('v=' + version);
        scriptElement.src = 'https://maps.googleapis.com/maps/api/js?' + params.join('&');

        // Timeout if necessary.
        var timeoutId = null;
        if (timeout) {
          timeoutId = window.setTimeout(function () {
            window[callbackName] = function () {}; // Set the on load callback to a no-op.
            reject(new Error('Could not load the Google Maps API'));
          }, timeout);
        }

        // Hook up the on load callback.
        window[callbackName] = function () {
          if (timeoutId !== null) {
            window.clearTimeout(timeoutId);
          }
          resolve(window.google.maps);
          delete window[callbackName];
        };

        // Insert the `script` tag.
        document.body.appendChild(scriptElement);
      }
    });
  }

  return loader;
}));



/***/ }),

/***/ 6:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


__webpack_require__(7);

var _loadGoogleMapsApi = __webpack_require__(20);

var _loadGoogleMapsApi2 = _interopRequireDefault(_loadGoogleMapsApi);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

_loadGoogleMapsApi2.default.key = 'AIzaSyDZdUWy3NxDz_nB8cs3GjpGaWqKYdWlny4';
// import Flickity from 'Flickity';

_loadGoogleMapsApi2.default.language = 'es';

(0, _loadGoogleMapsApi2.default)().then(function (googleMaps) {
    new googleMaps.Map(document.querySelector('.Map-google'), {
        center: {
            lat: 40.7484405,
            lng: -73.9944191
        },
        zoom: 12
    });
}).catch(function (err) {
    console.error(err);
});

var header = document.querySelector('header'),
    menu = document.querySelector('.Nav-content'),
    headerCountry = document.querySelector('.Header-country'),
    countries = document.querySelector('.countries');

headerCountry.addEventListener('click', function () {
    countries.classList.toggle('open');
});

var observer = new IntersectionObserver(function (entries, observer) {
    if (entries[0].isIntersecting) {
        menu.classList.remove('sticky');
    } else {
        menu.classList.add('sticky');
    }
});

observer.observe(header);

var menuToggle = document.getElementById('menu-toggle'),
    NavAdmin = document.querySelector('.Nav-content'),
    FilterTitle = document.querySelectorAll('.filters-title'),
    Body = document.querySelector('body');

menuToggle.addEventListener('click', function () {
    menuToggle.classList.toggle('open');
    NavAdmin.classList.toggle('open');
    Body.classList.toggle('open-nav');
    window.scrollTo({
        'behavior': 'smooth',
        'top': 0
    });
});
FilterTitle.forEach(function (el) {
    console.log(el);
    el.addEventListener('click', function () {
        el.parentElement.querySelector('ul').classList.toggle('show');
    });
});

/***/ }),

/***/ 7:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })

/******/ });
//# sourceMappingURL=main.js.map