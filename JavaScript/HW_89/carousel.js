/* global $*/
//(function () {
"use strict";
var imgElem = $("#img");
var caption = $("#caption")
var prev = $("#prev");
var next = $("#next");
var index = 0;
$.get("images.json", function (loadedImgs) {
    caption.text(loadedImgs[index]["title"]);
    imgElem.attr("src", loadedImgs[index]["url"]);
    next.click(function () {
        if (index + 1 < loadedImgs.length) {
            index++;
            caption.text(loadedImgs[index]["title"]);
            imgElem.attr("src", loadedImgs[index]["url"]);
        }
    });
    prev.click(function () {
        if (index > 0) {
            index--;
            caption.text(loadedImgs[index]["title"]);
            imgElem.attr("src", loadedImgs[index]["url"]);
        }
    });
});
//}());