(function(){
    "use strict";
    var body = document.getElementById("body"),
        startStopButton = document.getElementById("startStopButton"),
        startString = "Start",
        stopString = "Stop",
        r, g, b,
        intervalID;
    startStopButton.innerHTML = startString;
    startStopButton.addEventListener("click", function(){
        if(startStopButton.innerHTML === startString){
            intervalID = setInterval(changeColor, 1000);
            startStopButton.innerHTML = stopString;
        }else{
            clearInterval(intervalID);
            startStopButton.innerHTML = startString;
        }
    });
    function changeColor(){
        r = Math.trunc(Math.random() * 256);
        g = Math.trunc(Math.random() * 256);
        b = Math.trunc(Math.random() * 256);
        body.style.color = "rgb(" + r + "," + g + "," + b + ")";        
        r = Math.trunc(Math.random() * 256);
        g = Math.trunc(Math.random() * 256);
        b = Math.trunc(Math.random() * 256);
        body.style.backgroundColor = "rgb(" + r + "," + g + "," + b + ")";
    }
}());