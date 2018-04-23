<?php

require __DIR__. '/_db_connect.php';

$result = [
    'success' => true
];

if (isset($_POST['email'])) {
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $result['success'] = false;
        $result['email_error'] = 'email格式不符!';
    }

    if(mb_strlen($_POST['nickname'], 'utf-8') < 2) {
        $result['success'] = false;
        $result['nickname_error'] = '暱稱字數請大於2!';
    }

    if(strlen($_POST['password']) < 6) {
        $result['success'] = false;
        $result['password_error'] = '密碼長度請大於6!';
    }

    if ($result['success']) {

        $sql = "INSERT INTO `member`(`email`, `password`, `mobile`, `address`, `birthday`, `nickname`, `create_at`, `hash`) VALUES  (
                ?, ?, ?, ?, ?, ?, NOW(), ?
)";

    $password = sha1($_POST['password']);
    $hash = sha1($_POST['email'].rand());

        $stmt = $mysqli->prepare($sql);

        $stmt->bind_param('sssssss',
            $_POST['email'],
            $password,
            $_POST['mobile'],
            $_POST['address'],
            $_POST['birthday'],
            $_POST['nickname'],
            $hash
        );


        $stmt->execute();

        $affected_rows =  $stmt->affected_rows;

        if($affected_rows==1){
            $result['info'] = '完成註冊';
        }elseif($affected_rows==-1){
            $result['success'] = false;
            $result['info'] = 'Email 已經被使用過了';
        } else {
            $result['success'] = false;
            $result['info'] = '資料有誤';
        }
    }

} else {
    $result['success'] = false;
    $result['info'] = '沒有POST資料';
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);