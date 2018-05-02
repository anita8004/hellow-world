let name = exports.name = 'ANNA';

exports.lower = function(inp){
    return inp.toLowerCase();
};

exports.upper = function(inp){
    return inp.toUpperCase();
};

exports.get_name = function(){
    return name;
}

//exports 將定義的變數公開給其他檔案使用