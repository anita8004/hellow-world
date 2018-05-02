var eventEmitter = require("events");
var events = new eventEmitter();

//自訂message事件
events.on("message",function(data){
    console.log(data);
})
//自訂end事件
events.on("end", function(){
    console.log("end");
})

//引發message事件
events.emit("message", "Hello Events!!");

setTimeout(function(){
    events.emit("end");
},3000);

//ctrl + ~