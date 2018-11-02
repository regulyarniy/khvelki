// Sticky header by Eli Fitch https://codepen.io/elifitch/pen/Cobzr
(function() {
  "use strict";
  var header = document.querySelector(".page-header");

  window.addEventListener("scroll", function(e) {
    var distance = header.offsetTop - window.pageYOffset;
    var offset = window.pageYOffset;
    if ((distance < 0)) {
      header.style.position = 'fixed';
      document.body.style.paddingTop = header.offsetHeight + 'px';
    } else {
      document.body.style.paddingTop = 0;
      header.style.position = 'static';
    }
  })
})();