<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>for</title>
</head>
<body>
<?php

    // %s 為可替代內容

    for ($i=0;$i<10;$i++) {
        printf("%s * %s = %s<br>", $i, $i, $i*$i);
    }
?>
</body>
</html>