<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>array set</title>
</head>
<body>
<pre>
    <?php
    $ar1 = [1,5,18,30];
    $ar2 = [
        "name" => "anita",
        "age" => 27,
        "gender" => "female",
    ];

    $ar3 = $ar2; //有複製行為
    $ar4 = &$ar2; //沒有複製行為

    $ar2["age"] = 16;

    print_r($ar2);
    print_r($ar3);
    print_r($ar4);

    ?>
</pre>
</body>
</html>