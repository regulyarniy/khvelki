(function() {
  var cartBlock = document.querySelector(".order-form__cart"),
    resetButton = document.querySelector(".order-form__reset"),
    submitButton = document.querySelector(".order-form__submit"),
    cartListElement = document.querySelector(".order-form__cart-items"),
    cartTotalElement = document.querySelector(".order-form__cart-total"),
    orderButtonElements = document.querySelectorAll(".product__order"),
    cartListInput = document.getElementById("products"),
    cartTotalInput = document.getElementById("total"),
    cartList = "",
    cartTotal = 0;

  var updateCart = function() {
    cartListElement.textContent = cartList;
    cartListInput.value = cartList;
    cartTotalElement.textContent = cartTotal + " руб.";
    cartTotalInput.value = cartTotal;
  }

  var initialize = function() {
    cartBlock.classList.remove("no-js");

    [].forEach.call(orderButtonElements, function(e) {
      "use strict";
      e.addEventListener("click", function(evt) {
        evt.preventDefault();
        cartTotal += parseInt(e.dataset.price);
        cartList += e.dataset.name + "\r\n";
        updateCart();
        e.textContent = "Добавлено!";
      })
    })

    resetButton.addEventListener("click", function(e) {
      "use strict";
      e.preventDefault();
      cartList = "";
      cartTotal = 0;
      updateCart();
    })
  }

  initialize();
})();