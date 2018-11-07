(function() {
  document.addEventListener('DOMContentLoaded', function() {
    Array.prototype.slice.call(document.querySelectorAll('.catalog__slider')).forEach(function(element, index) {
      lory(element, {
        classNameFrame: "catalog__frame",
        classNameSlideContainer: "catalog__list",
        classNamePrevCtrl: "product__slide--prev",
        classNameNextCtrl: "product__slide--next",
        infinite: 1
      });
    });
  });
})();