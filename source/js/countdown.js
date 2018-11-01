//Countdown timer
(function() {
  'use strict';
  var toDate = new Date("Dec 20 2018").getTime(),
    now = new Date().getTime(),
    secondsToNewYear = Math.floor((toDate - now) / 1000),
    daysElement = document.querySelector(".hero__count--days"),
    hoursElement = document.querySelector(".hero__count--hours"),
    minutesElement = document.querySelector(".hero__count--minutes"),
    secondsElement = document.querySelector(".hero__count--seconds"),
    countdown;

  var timer = function(seconds) {
    var now = Date.now(),
      then = now + seconds * 1000;

    countdown = setInterval(function() {
      var secondsLeft = Math.round((then - Date.now()) / 1000);

      if (secondsLeft <= 0) {
        clearInterval(countdown);
        return;
      };

      displayTimeLeft(secondsLeft);

    }, 1000);
  }

  var displayTimeLeft = function(seconds) {
    daysElement.textContent = Math.floor(seconds / 86400);
    hoursElement.textContent = Math.floor((seconds % 86400) / 3600);
    minutesElement.textContent = Math.floor((seconds % 86400) % 3600 / 60);
    secondsElement.textContent = seconds % 60 < 10 ? "0" + (seconds % 60) : seconds % 60;
  }

  timer(secondsToNewYear);
})();