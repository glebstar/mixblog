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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/admin/menu.js":
/***/ (function(module, exports) {

var current_id = 0;

$(document).ready(function () {
    $('.edit-item').on('click', function () {
        current_id = $(this).closest('.menu-tr').attr('data-item-id');

        $.msgbox("<div id='box-form'>" + $('#save-form').html() + "</div>", {
            type: "confirm",
            buttons: [{ type: "submit", value: "Сохранить" }, { type: "cancel", value: "Отмена" }]
        }, function (result) {
            if (result == 'Сохранить') {
                return saveMenu();
            }
        });

        $('#box-form .menu-save-path').val($(this).closest('.menu-tr').find('.path').html());
        $('#box-form .menu-save-title').val($(this).closest('.menu-tr').find('.title').html());
        $('#box-form .menu-save-sort').val($(this).closest('.menu-tr').find('.sort').html());

        return false;
    });
});

function saveMenu() {
    var submitdata = {
        _token: _token,
        id: current_id,
        path: $('#box-form .menu-save-path').val(),
        title: $('#box-form .menu-save-title').val(),
        sort: $('#box-form .menu-save-sort').val()
    };

    $.post('/admin/menu/save', submitdata, function (data) {
        location.reload();
    });

    return false;
}

/***/ }),

/***/ 1:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/admin/menu.js");


/***/ })

/******/ });