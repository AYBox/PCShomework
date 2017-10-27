var app = app || (function(){
    "use strict";
    return {
        numCounterObjects: 0
    };
}());
app.getNumCounterObjects = function(){
    "use strict";
    return this.numCounterObjects;
};
app.counterCreater = function() {
    "use strict";
    this.numCounterObjects++;
    var count = 0;
    return {
        increment : function(){
            count++;
            return this;
        },
        getCount : function(){
            return count;
        }
    };
};