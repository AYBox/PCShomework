var app = app || {};
(function () {
    "use strict";
    var numCounterObjects = 0;
    app.getNumCounterObjects = function () {
        //"use strict";
        return numCounterObjects;
    };
    app.createCounter = function () {
        //"use strict";
        numCounterObjects++;
        var count = 0;
        return {
            increment: function () {
                count++;
                return this;
            },
            getCount: function () {
                return count;
            }
        };
    };
}());