let request = require('request');
let cheerio = require('cheerio');
let fs = require('fs');
let path = require('path');

request('http://taipei.iiiedu.org.tw/', function(err, res, body){
    if (err) console.log('error: ' + err);
    let $ = cheerio.load(body);
    $('article.item').each(function(){
        let img = $(this).find('img').attr('src');
        request('http://taipei.iiiedu.org.tw' + img).pipe(fs.createWriteStream('images/' + path.basename(img)));
    });
});