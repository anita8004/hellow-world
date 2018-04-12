<?php
session_start();

if(isset($_SESSION['aaa'])){
    $_SESSION['aaa'] ++;
} else {
    $_SESSION['aaa'] = 1;
}

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

echo $_SESSION['aaa'];

?>
</pre>
</body>
</html>