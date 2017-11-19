var pcs = (function () {
    "use strict";

    function get(id) {
        return document.getElementById(id);
    }

    function setCss(elem, property, value) {
        elem.style[property] = value;
    }

    return function (id) {
        var elem = get(id);
        var data;
        var oldDisplayVal;

        return {
            data: function (theData) {
                if (theData === undefined) {
                    return data;
                } else {
                    data = theData;
                    return this;
                }
            },
            css: function (property, value) {
                if (value === undefined) {
                    return getComputedStyle(elem).getPropertyValue(property);
                } else {
                    setCss(elem, property, value);
                    return this;
                }
            },
            pulsate: function () {
                var fontSize = parseInt(this.css("font-size")),
                    i = 1,
                    increment = fontSize / 6,
                    //that = this,
                    interval = setInterval(function () {
                        if (i <= 5 || i > 15) {
                            fontSize += increment;
                        } else {
                            fontSize -= increment;
                        }

                        //that.setCss("fontSize", fontSize + 'px');
                        setCss(elem, "fontSize", fontSize + 'px');

                        if (i++ === 20) {
                            clearInterval(interval);
                        }
                    }, 100);

                return this;
            },
            click: function (callback) {
                elem.addEventListener('click', callback);
                return this;
            },
            hide: function () {
                oldDisplayVal = this.css("display");
                this.css("display", "none");
                //setCss(elem, "display", "none");

                return this;
            },
            show: function () {
                var newDisplay = oldDisplayVal !== "none" ? oldDisplayVal : "inline-block";
                this.css("display", newDisplay);

                return this;
            },
            setInnerHtml: function (html) {
                elem.innerHTML = html;
                return this;
            },
            getElement: function () {
                return elem;
            }
        };
    };
}());