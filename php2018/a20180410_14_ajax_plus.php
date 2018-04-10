<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form plus</title>
</head>
<body>
<form id="form1" action="" method="post" onsubmit="return getdata();">
    <label for="a">a:</label>
    <input type="text" name="a" id="a">
    <br>
    <label for="b">b:</label>
    <input type="text" name="b" id="b">
    <br>
    <button type="submit">Send</button>
</form>
<div id="getdata"></div>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script>
    function getdata() {
        console.log($('#form1').serialize());
        $.post('a20180410_13_plus_api.php', $('#form1').serialize(), function(data){
            $('#getdata').text(data);
        });
        return false;
    }
</script>
</body>
</html>