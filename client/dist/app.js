"use strict";
(self["webpackChunkpublic"] = self["webpackChunkpublic"] || []).push([["app"],{

/***/ "../../vendor/sunnysideup/timeline/client/src/javascript/components/timeline-block.js":
/*!********************************************************************************************!*\
  !*** ../../vendor/sunnysideup/timeline/client/src/javascript/components/timeline-block.js ***!
  \********************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var TimelineBlock = /*#__PURE__*/function () {
  function TimelineBlock() {
    _classCallCheck(this, TimelineBlock);
    this.timelineBlocks = document.querySelectorAll('.timeline-block__entries');
    this.timeLineEntryDetails = document.querySelectorAll('.timeline-entry__detail');
    if (this.timelineBlocks.length) {
      this.scrollToCurrentEntry();
    }
    if (this.timeLineEntryDetails.length) {
      this.detailToggle();
    }
  }
  _createClass(TimelineBlock, [{
    key: "scrollToCurrentEntry",
    value: function scrollToCurrentEntry() {
      var pastEntries = this.TimelineBlocks[0].querySelectorAll('.timeline-entry--past');
      if (pastEntries) {
        var rect = pastEntries[0].getBoundingClientRect();
        var top = rect.top + document.body.scrollTop;
        window.scrollTo(0, top);
      }
    }
  }, {
    key: "detailToggle",
    value: function detailToggle() {
      this.timeLineEntryDetails.forEach(function (detail) {
        detail.addEventListener('toggle', function () {
          detail.parentElement.classList.toggle('timeline-entry--open');
        });
      });
    }
  }]);
  return TimelineBlock;
}();
/* harmony default export */ __webpack_exports__["default"] = (TimelineBlock);

/***/ }),

/***/ "../../vendor/sunnysideup/timeline/client/src/main.js":
/*!************************************************************!*\
  !*** ../../vendor/sunnysideup/timeline/client/src/main.js ***!
  \************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _javascript_components_timeline_block__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./javascript/components/timeline-block */ "../../vendor/sunnysideup/timeline/client/src/javascript/components/timeline-block.js");

var $window = $(window);
var $document = $(document);
$document.ready(function () {
  new _javascript_components_timeline_block__WEBPACK_IMPORTED_MODULE_0__["default"]();
});

/***/ })

},
/******/ function(__webpack_require__) { // webpackRuntimeModules
/******/ var __webpack_exec__ = function(moduleId) { return __webpack_require__(__webpack_require__.s = moduleId); }
/******/ var __webpack_exports__ = (__webpack_exec__("../../vendor/sunnysideup/timeline/client/src/main.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7SUFBTUEsYUFBYTtFQUNqQixTQUFBQSxjQUFBLEVBQWU7SUFBQUMsZUFBQSxPQUFBRCxhQUFBO0lBQ2IsSUFBSSxDQUFDRSxjQUFjLEdBQUdDLFFBQVEsQ0FBQ0MsZ0JBQWdCLENBQzdDLDBCQUNGLENBQUM7SUFDRCxJQUFJLENBQUNDLG9CQUFvQixHQUFHRixRQUFRLENBQUNDLGdCQUFnQixDQUFDLHlCQUF5QixDQUFDO0lBQ2hGLElBQUksSUFBSSxDQUFDRixjQUFjLENBQUNJLE1BQU0sRUFBRTtNQUM5QixJQUFJLENBQUNDLG9CQUFvQixDQUFDLENBQUM7SUFDN0I7SUFDQSxJQUFJLElBQUksQ0FBQ0Ysb0JBQW9CLENBQUNDLE1BQU0sRUFBRTtNQUNwQyxJQUFJLENBQUNFLFlBQVksQ0FBQyxDQUFDO0lBQ3JCO0VBQ0Y7RUFBQ0MsWUFBQSxDQUFBVCxhQUFBO0lBQUFVLEdBQUE7SUFBQUMsS0FBQSxFQUVELFNBQUFKLHFCQUFBLEVBQXdCO01BQ3RCLElBQU1LLFdBQVcsR0FBRyxJQUFJLENBQUNDLGNBQWMsQ0FBQyxDQUFDLENBQUMsQ0FBQ1QsZ0JBQWdCLENBQUMsdUJBQXVCLENBQUM7TUFDcEYsSUFBSVEsV0FBVyxFQUFFO1FBQ2YsSUFBTUUsSUFBSSxHQUFHRixXQUFXLENBQUMsQ0FBQyxDQUFDLENBQUNHLHFCQUFxQixDQUFDLENBQUM7UUFDbkQsSUFBTUMsR0FBRyxHQUFHRixJQUFJLENBQUNFLEdBQUcsR0FBR2IsUUFBUSxDQUFDYyxJQUFJLENBQUNDLFNBQVM7UUFDOUNDLE1BQU0sQ0FBQ0MsUUFBUSxDQUFDLENBQUMsRUFBRUosR0FBRyxDQUFDO01BQ3pCO0lBQ0Y7RUFBQztJQUFBTixHQUFBO0lBQUFDLEtBQUEsRUFFRCxTQUFBSCxhQUFBLEVBQWdCO01BQ2QsSUFBSSxDQUFDSCxvQkFBb0IsQ0FBQ2dCLE9BQU8sQ0FBQyxVQUFBQyxNQUFNLEVBQUk7UUFDMUNBLE1BQU0sQ0FBQ0MsZ0JBQWdCLENBQUMsUUFBUSxFQUFFLFlBQU07VUFDdENELE1BQU0sQ0FBQ0UsYUFBYSxDQUFDQyxTQUFTLENBQUNDLE1BQU0sQ0FBQyxzQkFBc0IsQ0FBQztRQUMvRCxDQUFDLENBQUM7TUFDSixDQUFDLENBQUM7SUFDSjtFQUFDO0VBQUEsT0FBQTFCLGFBQUE7QUFBQTtBQUVILCtEQUFlQSxhQUFhOzs7Ozs7Ozs7Ozs7QUMvQnNDO0FBRWxFLElBQU0yQixPQUFPLEdBQUdDLENBQUMsQ0FBQ1QsTUFBTSxDQUFDO0FBQ3pCLElBQU1VLFNBQVMsR0FBR0QsQ0FBQyxDQUFDekIsUUFBUSxDQUFDO0FBQzdCMEIsU0FBUyxDQUFDQyxLQUFLLENBQUMsWUFBTTtFQUNwQixJQUFJOUIsNkVBQWEsQ0FBQyxDQUFDO0FBQ3JCLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovL3B1YmxpYy8uLi8uLi92ZW5kb3Ivc3VubnlzaWRldXAvdGltZWxpbmUvY2xpZW50L3NyYy9qYXZhc2NyaXB0L2NvbXBvbmVudHMvdGltZWxpbmUtYmxvY2suanMiLCJ3ZWJwYWNrOi8vcHVibGljLy4uLy4uL3ZlbmRvci9zdW5ueXNpZGV1cC90aW1lbGluZS9jbGllbnQvc3JjL21haW4uanMiXSwic291cmNlc0NvbnRlbnQiOlsiY2xhc3MgVGltZWxpbmVCbG9jayB7XG4gIGNvbnN0cnVjdG9yICgpIHtcbiAgICB0aGlzLnRpbWVsaW5lQmxvY2tzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcbiAgICAgICcudGltZWxpbmUtYmxvY2tfX2VudHJpZXMnXG4gICAgKVxuICAgIHRoaXMudGltZUxpbmVFbnRyeURldGFpbHMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcudGltZWxpbmUtZW50cnlfX2RldGFpbCcpXG4gICAgaWYgKHRoaXMudGltZWxpbmVCbG9ja3MubGVuZ3RoKSB7XG4gICAgICB0aGlzLnNjcm9sbFRvQ3VycmVudEVudHJ5KClcbiAgICB9XG4gICAgaWYgKHRoaXMudGltZUxpbmVFbnRyeURldGFpbHMubGVuZ3RoKSB7XG4gICAgICB0aGlzLmRldGFpbFRvZ2dsZSgpXG4gICAgfVxuICB9XG5cbiAgc2Nyb2xsVG9DdXJyZW50RW50cnkgKCkge1xuICAgIGNvbnN0IHBhc3RFbnRyaWVzID0gdGhpcy5UaW1lbGluZUJsb2Nrc1swXS5xdWVyeVNlbGVjdG9yQWxsKCcudGltZWxpbmUtZW50cnktLXBhc3QnKVxuICAgIGlmIChwYXN0RW50cmllcykge1xuICAgICAgY29uc3QgcmVjdCA9IHBhc3RFbnRyaWVzWzBdLmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpXG4gICAgICBjb25zdCB0b3AgPSByZWN0LnRvcCArIGRvY3VtZW50LmJvZHkuc2Nyb2xsVG9wXG4gICAgICB3aW5kb3cuc2Nyb2xsVG8oMCwgdG9wKVxuICAgIH1cbiAgfVxuXG4gIGRldGFpbFRvZ2dsZSAoKSB7XG4gICAgdGhpcy50aW1lTGluZUVudHJ5RGV0YWlscy5mb3JFYWNoKGRldGFpbCA9PiB7XG4gICAgICBkZXRhaWwuYWRkRXZlbnRMaXN0ZW5lcigndG9nZ2xlJywgKCkgPT4ge1xuICAgICAgICBkZXRhaWwucGFyZW50RWxlbWVudC5jbGFzc0xpc3QudG9nZ2xlKCd0aW1lbGluZS1lbnRyeS0tb3BlbicpXG4gICAgICB9KVxuICAgIH0pXG4gIH1cbn1cbmV4cG9ydCBkZWZhdWx0IFRpbWVsaW5lQmxvY2tcbiIsImltcG9ydCBUaW1lbGluZUJsb2NrIGZyb20gJy4vamF2YXNjcmlwdC9jb21wb25lbnRzL3RpbWVsaW5lLWJsb2NrJ1xuXG5jb25zdCAkd2luZG93ID0gJCh3aW5kb3cpXG5jb25zdCAkZG9jdW1lbnQgPSAkKGRvY3VtZW50KVxuJGRvY3VtZW50LnJlYWR5KCgpID0+IHtcbiAgbmV3IFRpbWVsaW5lQmxvY2soKVxufSlcbiJdLCJuYW1lcyI6WyJUaW1lbGluZUJsb2NrIiwiX2NsYXNzQ2FsbENoZWNrIiwidGltZWxpbmVCbG9ja3MiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJ0aW1lTGluZUVudHJ5RGV0YWlscyIsImxlbmd0aCIsInNjcm9sbFRvQ3VycmVudEVudHJ5IiwiZGV0YWlsVG9nZ2xlIiwiX2NyZWF0ZUNsYXNzIiwia2V5IiwidmFsdWUiLCJwYXN0RW50cmllcyIsIlRpbWVsaW5lQmxvY2tzIiwicmVjdCIsImdldEJvdW5kaW5nQ2xpZW50UmVjdCIsInRvcCIsImJvZHkiLCJzY3JvbGxUb3AiLCJ3aW5kb3ciLCJzY3JvbGxUbyIsImZvckVhY2giLCJkZXRhaWwiLCJhZGRFdmVudExpc3RlbmVyIiwicGFyZW50RWxlbWVudCIsImNsYXNzTGlzdCIsInRvZ2dsZSIsIiR3aW5kb3ciLCIkIiwiJGRvY3VtZW50IiwicmVhZHkiXSwic291cmNlUm9vdCI6IiJ9