<?php
session_start();

if(isset($_POST['user']) and isset($_POST['password'])){
    if($_POST['user'] == 'anita' and $_POST['password'] == '1234'){
        $_SESSION['login'] = $_POST['user'];
    } else {
        $msg = '密碼錯誤';
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
    <title>login</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .nav-login li{
            display: inline-block;
            vertical-align: top;
        }
        .form-login{
            width: 500px;
            max-width: 100%;
            margin: 50px auto 15px;
            padding: 0 15px;
        }
        .form-login .form-group{
            display: flex;
            margin-bottom: 10px;
        }
        .form-login .form-group label{
            flex-grow: 1;
            width: 120px;
        }
        .form-login .form-group input{
            flex-grow: 3;
            padding: 8px 10px;
            border: 1px solid #ccc;
            outline: 0;
            background-color: #fff;
        }

        button{
            width: 100%;
            padding: 10px;
            background-color: cadetblue;
            color: white;
            text-align: center;
            border: 0;
            outline: 0;
            cursor: pointer;
        }
        .error{
            width: 500px;
            max-width: 100%;
            margin: 0 auto;
            text-align: center;
            color: red;
            padding: 10px 15px;
        }

        @media (max-width: 380px) {
            .form-login .form-group{
                flex-wrap: wrap;
            }
            .form-login .form-group label,.form-login .form-group input{
                flex-grow: inherit;
                width: 100%;
            }
            .form-login .form-group label{
                margin-bottom: 5px;
            }
        }

    </style>
</head>
<body>

<?php if(isset($_SESSION['login'])): ?>

    <ul class="nav-login">
        <li>Hello! <?= $_SESSION['login'] ?> </li>
        <li><a href="a20180411_04_logout.php">登出</a></li>
    </ul>

<?php else: ?>

<form action="" method="post" class="form-login">
    <div class="form-group">
        <label for="user">User：</label>
        <input type="text" name="user" id="user">
    </div>
    <div class="form-group">
        <label for="password">Password：</label>
        <input type="text" name="password" id="password">
    </div>
    <div class="form-group">
        <button type="submit">Send</button>
    </div>
</form>

<?php endif; ?>

<p class="error">
    <?= isset($msg) ? $msg : '' ?>
</p>

</body>
</html>