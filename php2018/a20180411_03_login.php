<?php
session_start();


if(isset($_POST['user']) and isset($_POST['password'])) {
    if($_POST['user']=='shin' and $_POST['password']=='1234'){
        $_SESSION['login'] = $_POST['user'];
    } else {
        $msg = "密碼錯誤";
    }
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
    <div style="color:red;"><?=  isset($msg) ? $msg : '' ?></div>
<div>
</div>

<?php if(isset($_SESSION['login'])): ?>
    Hello, <?= $_SESSION['login'] ?><br>
    <a href="a20180411_04_logout.php">登出</a>

<?php else: ?>

<form action="" method="post">
    <input type="text" name="user"><br>
    <input type="password" name="password"><br>
    <input type="submit">
    
    
</form>
<?php endif ?>


</body>
</html>