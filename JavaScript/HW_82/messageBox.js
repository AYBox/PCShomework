var pcs = pcs || {};

pcs.messagebox = (function () {
    "use strict";
    var marginLeft = -200;
    var marginTop = -50;
    var zIndex = 1;

    function createElement(type) {
        return document.createElement(type);
    }

    function show(msg, modal) {
        var div = createElement("div");
        var span = createElement("span");
        var buttonDiv = createElement("div");
        var okButton = createElement("button");
        var modalDiv;
        var marginLeftString;
        var marginTopString;

        marginLeftString = marginLeft + "px";
        marginTopString = marginTop + "px";

        marginLeft += 20;
        marginTop += 20;

        if (modal) {
            modalDiv = createElement("div");
            modalDiv.setAttribute("style", "position: absolute; height: 100%; width: 100%; top: 0; background-color: gray; z-index: " + (zIndex++) + "; opacity: 0.2");
            document.body.appendChild(modalDiv);
        }


        span.innerHTML = msg;
        div.appendChild(span);
        okButton.innerHTML = "OK";
        buttonDiv.appendChild(okButton);
        div.appendChild(buttonDiv);
        document.body.appendChild(div);

        div.style.zIndex = zIndex;
        div.style.backgroundColor = 'lightblue';
        div.style.padding = '20px';
        div.style.width = '400px';
        div.style.height = '100px';
        div.style.border = '1px solid blue';
        div.style.position = 'absolute';
        div.style.left = '50%';
        div.style.top = '50%';
        div.style.marginLeft = marginLeftString;
        div.style.marginTop = marginTopString;
        div.style.boxSizing = 'border-box';
        div.style.display = 'inline-block';

        buttonDiv.style.position = 'absolute';
        buttonDiv.style.bottom = '6px';
        buttonDiv.style.textAlign = 'center';
        buttonDiv.style.width = '100%';
        buttonDiv.style.marginLeft = '-20px';


        okButton.addEventListener("click", function () {
            document.body.removeChild(div);
            if (modalDiv) {
                document.body.removeChild(modalDiv);
            }
        });

        div.addEventListener("click", function () {
            div.style.zIndex = ++zIndex;
        });
    }

    return {
        show: show
    };
}());