/*global $ */
(function () {
    "use strict";
    var input = $("#input");
    $("#button").click(function () {
        console.log("clicked");
        $.get(input.val(), function (loadedData) {
            alert(loadedData);
        }).fail(function (xhr, statusCode, statusText) {
            alert("error: " + statusText);
            console.log(xhr, statusCode, statusText);
        });
    });

}());