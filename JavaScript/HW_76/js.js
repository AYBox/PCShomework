var monthName = (function(){
    'use strict';
    
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    
    function getMonthName(number){
        return months[number - 1];
    }
    
    function getMonthNumber(name){
        for(var i = 0; i < months.length; i++){
            if(months[i] === name){
                return i + 1;
            }
        }
        return name + " is not a valid month";
    }
    
    return {
        getMonthName: getMonthName,
        getMonthNumber: getMonthNumber
    };
}());

console.log("monthName.getMonthName(1)", monthName.getMonthName(1));
console.log("monthName.getMonthNumber('February')", monthName.getMonthNumber("February"));
console.log("monthName.getMonthName(9)", monthName.getMonthName(9));

var interestCalculator = (function(){
    'use strict';
    var years;
    var rate;

    return {
        setYears: function(number){
                years = number;
            },
        setRate: function(number){
                rate = number;
            },
        calculateInterest: function(principle){
                return principle * rate * years;
            }
    };                
}());

interestCalculator.setYears(10);
interestCalculator.setRate(.01);
console.log("interestCalculator.calculateInterest(100)", interestCalculator.calculateInterest(100));
console.log("interestCalculator.calculateInterest(150)", interestCalculator.calculateInterest(150));