"use strict";

var KTModalUserSearch = function () {
  var wrapper, suggestions, results, empty, searchInstance;

  var completeSearch = function (element) {
    setTimeout(function () {
      var randomInt = KTUtil.getRandomInt(1, 3);
      wrapper.classList.add("d-none");

      if (randomInt === 3) {
        results.classList.add("d-none");
        empty.classList.remove("d-none");
      } else {
        results.classList.remove("d-none");
        empty.classList.add("d-none");
      }

      element.complete();
    }, 1500);
  };

  var clearSearch = function () {
    wrapper.classList.remove("d-none");
    results.classList.add("d-none");
    empty.classList.add("d-none");
  };

  return {
    init: function () {
      var modal = document.querySelector("#kt_modal_users_search_handler");

      if (modal) {
        wrapper = modal.querySelector('[data-kt-search-element="wrapper"]');
        suggestions = modal.querySelector('[data-kt-search-element="suggestions"]');
        results = modal.querySelector('[data-kt-search-element="results"]');
        empty = modal.querySelector('[data-kt-search-element="empty"]');

        searchInstance = new KTSearch(modal);

        searchInstance.on("kt.search.process", completeSearch);
        searchInstance.on("kt.search.clear", clearSearch);
      }
    }
  };
}();

KTUtil.onDOMContentLoaded(function () {
  KTModalUserSearch.init();
});
