<?php

if(isset($_COOKIE['abc'])){
    $abc = $_COOKIE['abc']+1;
} else {
    $abc = 1;
}
setcookie('abc', $abc);

?>
<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<pre>
<?php

echo $abc;

?>
</pre>
</body>
</html>