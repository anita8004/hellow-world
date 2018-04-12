<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>for</title>
    <style>
        *{
            font-family: 微軟正黑體, Arial;
        }
        table td {
            padding: 10px;
        }
    </style>
</head>
<body>

    <table border="1">
        <tr>
            <?php
                for ($i=2;$i<=9;$i++):
            ?>
                <td>
                    <?php
                        for ($k=0;$k<10;$k++) {
                            printf("%s * %s = %s<br>", $i, $k, $i*$k);
                        }
                    ?>
                </td>
            <?php
                endfor;
            ?>
        </tr>
    </table>
</body>
</html>