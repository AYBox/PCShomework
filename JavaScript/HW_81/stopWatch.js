function createStopwatch() {
    "use strict";

    var startString = "Start";
    var stopString = "Stop";

    var intervalId;
    var startTime;
    var savedTimeElapsed = 0;

    var mainDiv = document.createElement("div");
    var displayDiv = document.createElement("div");
    var timeSpan = document.createElement("span");
    var buttonDiv = document.createElement("div");
    var startStopButton = document.createElement("button");
    var resetButton = document.createElement("button");

    document.body.appendChild(mainDiv);
    mainDiv.appendChild(displayDiv);
    mainDiv.appendChild(buttonDiv);
    displayDiv.appendChild(timeSpan);
    buttonDiv.appendChild(startStopButton);
    buttonDiv.appendChild(resetButton);

    mainDiv.setAttribute("style", "position: absolute; right: 50%; top: 50%; display: inline-block;background-color: lightblue; border: solid darkblue 2px; padding: 10px; min-width: 180px; min-height: 75px; text-align: center;");
    document.body.style = "box-sizing: border-box";
    displayDiv.style.marginBottom = '10px';
    timeSpan.style = 'font-size: 31px; font-family: Miriam Fixed, Times New Roman;';
    startStopButton.style = 'width: 45%';
    resetButton.style = 'width: 45%';

    timeSpan.innerHTML = "00:00:00.00";
    startStopButton.innerHTML = "Start";
    resetButton.innerHTML = "Reset";

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
}