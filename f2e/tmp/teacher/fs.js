//引用Node.js的內建模組
var fs = require("fs");

fs.readFile("data.txt","utf-8",function(err,data){
    if(err){
        console.log(err);
    }else{
        console.log(data);
    }
})