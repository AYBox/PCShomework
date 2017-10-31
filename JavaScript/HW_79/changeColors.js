(function(){
    "use strict";
    var body = document.getElementById('body');
    var okButton = document.getElementById('okButton');
    okButton.addEventListener('click', function(){
        var fontColor = document.getElementById('fontColor').value;    
        var backgroundColor = document.getElementById('backgroundColor').value;
        console.log("fontColor: ", fontColor);
        console.log("backgroundColor: ", backgroundColor);
        body.style.color = fontColor;
        body.style.background = backgroundColor;
    });
}());