<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>if</title>
</head>
<body>
<?php

    $a = 30;
    if ($a > 22):
    ?>

        <img src="img/cat1.jpg" alt="">

    <?php
    else:
    ?>

        <img src="img/cat2.jpg" alt="">

    <?php
    endif;
?>
</body>
</html>