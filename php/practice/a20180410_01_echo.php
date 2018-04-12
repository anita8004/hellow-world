<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>echo</title>
</head>
<body>
<?php
    //**變數以$開頭
    //**結尾要加分號
    $a = 123;
    echo $a+7;
    echo '<br/>';
    echo __DIR__; //檔案位置
    echo '<br/>';
    echo __FILE__; //檔案路徑
    echo '<br/>';
    echo PHP_VERSION; //PHP版本
    echo '<br/>';
    define('PI', 3.14159); //自訂常數
    echo PI;
?>
</body>
</html>