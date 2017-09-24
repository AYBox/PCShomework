console.log("HW_75");
document.write("HW_75");
function some(theArray, callback){
    for(i = 0; i < theArray.length; i++){
        if(callback(theArray[i]) === true){
            return true;
        }
    }
    return false;
}
function isUpperCase(char){
    return char === char.toUpperCase();
}
function isLowerCase(char){
    return char === char.toLowerCase();
}
var mixed = ["a", "B", "c", "d"];
var upper = ["A", "B", "C", "D"];
var lower = ["a", "b", "c", "d"];
console.log("some(mixed, isUpperCase): ", some(mixed, isUpperCase));
console.log("some(upper, isUpperCase): ", some(upper, isUpperCase));
console.log("some(lower, isUpperCase): ", some(lower, isUpperCase));

console.log("some(mixed, isLowerCase): ", some(mixed, isLowerCase));
console.log("some(upper, isLowerCase): ", some(upper, isLowerCase));
console.log("some(lower, isLowerCase): ", some(lower, isLowerCase));

console.log("mixed.some(isLowerCase): ", mixed.some(isLowerCase));
console.log("upper.some(isLowerCase): ", upper.some(isLowerCase));
console.log("lower.some(isLowerCase): ", lower.some(isLowerCase));

function onlyIf(theArray, callback, action){
    theArray.forEach(function(element) {
        if(callback(element)){
            action();
        }
        
    });
}

function logFound(){
    console.log("found");
}
console.log("onlyIf(mixed, isUpperCase, logFound): ", onlyIf(mixed, isUpperCase, logFound));
console.log("onlyIf(upper, isUpperCase, logFound): ", onlyIf(upper, isUpperCase, logFound));
console.log("onlyIf(lower, isUpperCase, logFound): ", onlyIf(lower, isUpperCase, logFound));