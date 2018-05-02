var name = "Tom";
exports.lower = function(inp){
   return inp.toLowerCase();
}
exports.upper = function(inp){
    return inp.toUpperCase();
}
exports.get_name = function(){
    return name;
}

// console.log(lower("APPLE"))
// console.log("Hello", name)