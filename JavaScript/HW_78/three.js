for(var i = 0; i < 10; i++){
    app.counter.increment();
}

var counter1 = app.counterCreater();
var counter2 = app.counterCreater();

for(var i = 0; i < 5; i++){
    counter1.increment();
}
for(var i = 0; i < 15; i++){
    counter2.increment();
}

console.log("app.counter.getCount(): ", app.counter.getCount());
console.log("counter1.getCount(): ", counter1.getCount());
console.log("counter2.getCount(): ", counter2.getCount());
console.log("app.getNumCounterObjects(): ", app.getNumCounterObjects());