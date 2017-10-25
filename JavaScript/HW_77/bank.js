var account1 = {
    balance: 100
};

var account2 = {
    balance: 115
};

function addInterest(interest){
    "use strict";
    this.balance += interest;
}

addInterest.call(account1, 25);
addInterest.call(account2, 25);
console.log(account1.balance);
console.log(account2.balance);