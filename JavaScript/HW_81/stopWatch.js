(function () {
    "use strict";

    var timeSpan = document.getElementById("timeSpan");
    var startStopButton = document.getElementById("startStopButton");
    var resetButton = document.getElementById("resetButton");

    var startString = "Start";
    var stopString = "Stop";

    var intervalId;
    var startTime;
    var savedTimeElapsed = 0;

    function timeFormat(ms) {
        return new Date(ms).toISOString().slice(11, -2);
    }

    function startStopwatch() {
        startTime = new Date();
        intervalId = setInterval(function () {
            timeSpan.innerHTML = timeFormat((new Date() - startTime) + savedTimeElapsed);
        }, 10);
    }

    startStopButton.addEventListener("click", function () {
        if (intervalId) {
            savedTimeElapsed += new Date() - startTime;
            clearInterval(intervalId);
            intervalId = 0;
            startStopButton.innerHTML = startString;
        } else {
            startStopwatch();
            startStopButton.innerHTML = stopString;
        }
    });
    resetButton.addEventListener("click", function () {
        if (intervalId) {
            clearInterval(intervalId);
            intervalId = 0;
        }
        startStopButton.innerHTML = startString;
        savedTimeElapsed = 0;
        timeSpan.innerHTML = "00:00:00.00";
    });
}());