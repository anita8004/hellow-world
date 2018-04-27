<?php

if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
};

// sid, qty

if(isset($_GET['sid'])){
    $sid = intval($_GET['sid']);
    $qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0;

    if(empty($qty)){

        unset($_SESSION['cart'][$sid]);

    } else {
        // 要去db檢查有沒有這個商品
        $_SESSION['cart'][$sid] = $qty;
    }



}

echo json_encode($_SESSION['cart']);

