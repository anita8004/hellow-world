<?php

$mysqli = new mysqli('localhost', 'anita', 'admin', 'mytest');

if(isset($_GET['sid'])){

    $sid = intval($_GET['sid']);
    $sql = "DELETE FROM `address_book` WHERE `sid`=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $sid);
    $stmt->execute();

    echo $stmt->affected_rows;

    $stmt->close();
}

if(isset($_SERVER['HTTP_REFERER'])){
    header('Location: '. $_SERVER['HTTP_REFERER'] );
    //刪除後返回原來頁面
} else {
    header('Location: data_list.php');
}
