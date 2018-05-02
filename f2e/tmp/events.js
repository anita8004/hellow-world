let eventEmitter = require('events');
let events = new eventEmitter();

//建立message事件
events.on('message', function(data){
    console.log(data);
});

events.on('end', function(){
    console.log('end');
});

//觸發message事件
events.emit('message', 'Hello Events!!');

setTimeout(function(){
    events.emit('end');
}, 3000);