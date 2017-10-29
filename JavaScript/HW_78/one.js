var app = app || {};
app.counter = {};
(function() {
    "use strict";
    var count = 0;
    app.counter.increment = function(){
        count++;
        return this;
    };
    app.counter.getCount = function(){
        return count;
    };
}());