//Dropdown menu
(function() {
  var topMenu = document.querySelector(".page-header"),
    menuButton = document.querySelector(".page-header__button"),
    navigationBlock = document.querySelector(".page-header__navigation");

  topMenu.classList.remove("no-js");
  menuButton.addEventListener("click", function(e) {
    this.classList.toggle("page-header__button--close");
    navigationBlock.classList.toggle("page-header__navigation--opened");
  })
})();