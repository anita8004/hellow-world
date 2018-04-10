<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>array</title>
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

    foreach ($ar1 as $k => $v) {
        echo "$k : $v <br>";
    }

    echo "<br>";

    foreach ($ar2 as $k => $v) {
        echo "$k : $v <br>";
    }

    ?>
</pre>
</body>
</html>