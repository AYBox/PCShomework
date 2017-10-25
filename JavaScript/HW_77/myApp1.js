var myApp = myApp || {};

myApp.Utils = (function (Utils){
    "use strict";
    
    var months = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];

    Utils.getMonthName = function (num) {
            return months[num - 1];
        };
    Utils.getMonthNumber = function (name) {
            for (var i = 0; i < months.length; i++) {
                if (months[i] === name) {
                    return i + 1;
                }
            }
            return -1;
        };
    return Utils;
}(myApp.Utils || {}));

//not for homework
var myApp2 = {

    Utils : {
        months: (function(){
            "use strict";
            return ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];
        }()),
        getMonthName : function (num) {
            "use strict";
            return this.months[num - 1];
        },
        getMonthNumber : function (name) {
            "use strict";
            for (var i = 0; i < this.months.length; i++) {
                if (this.months[i] === name) {
                    return i + 1;
                }
            }
            return -1;
        }
    }
};