/* global $ */
//(function () {
"use strict";
var ulElem = $("#ul"),
    videoElem = $('#video');
$.get("videoList.json", function (loadedVideoList) {
    loadedVideoList.forEach(function (element) {
        $('<li><a href="">' + element.title + '</a></li><br>').appendTo(ulElem)
            .click(function (event) {
                event.preventDefault();
                console.log("click");
                videoElem.attr("src", element.url)[0]
                    .play();
            });
    });
});
//}());