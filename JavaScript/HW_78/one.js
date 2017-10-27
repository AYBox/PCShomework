var app = app || (function(){
    "use strict";
    return {
        numCounterObjects: 0
    };
}());
app.counter = (function(counter) {
    "use strict";
    var count = 0;
    counter.increment = function(){
        count++;
        return this;
    };
    counter.getCount = function(){
        return count;
    };
    return counter;
}(app.counter || {}));