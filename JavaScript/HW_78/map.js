"use strict";
var anArray = [2, 4, 6];

function doubleIt(num){
    return num * 2;
}

function myMap(theArray, callback){
    var newArray = [];
    theArray.forEach(function (element){
        newArray.push(callback(element));
    });
    return newArray;
}

console.log("myMap(anArray, doubleIt): ", myMap(anArray, doubleIt));