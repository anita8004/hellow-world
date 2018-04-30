<?php
require __DIR__ . '/__db_connect.php';

$page_name = 'checkout';


if(!empty($_SESSION['cart'])){

    $keys = array_keys($_SESSION['cart']);

    $sql = sprintf("SELECT * FROM `products` WHERE `sid` IN (%s)", implode(',', $keys));
    $rs = $mysqli->query($sql);

    $pdata = [];
    $total = 0;
    while($row=$rs->fetch_assoc()):
        $row['qty'] = $_SESSION['cart'][$row['sid']];
        $pdata[$row['sid']] = $row;

        $total += $row['qty']*$row['price'];
    endwhile;


    // 寫入 orders
    $sql = "INSERT INTO `orders`(`member_sid`, `amount`, `order_date`) VALUES (?, ?, NOW())";
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param('ii', $_SESSION['user']['id'], $total);
    $stmt->execute();

    if($stmt->affected_rows==1){
        $order_sid = $mysqli->insert_id; //訂單編號
        $stmt->close();


        $sql = "INSERT INTO `order_details`(`order_sid`, `product_sid`, `price`, `quantity`) VALUES (?, ?, ?, ?)";
        $stmt2 = $mysqli->prepare($sql);

        foreach($keys as $v):
            $row = $pdata[$v];
            $stmt2->bind_param('iiii', $order_sid, $row['sid'], $row['price'], $row['qty']);
            $stmt2->execute();
        endforeach;

        unset($_SESSION['cart']);

        $ok = true;
    } else {
        echo 'Error: 123';
    }

} else {
    header("Location: product_list.php");
    exit;
}




?>
<?php include __DIR__. '/__html_head.php' ?>
<div class="container">

    <?php include __DIR__. '/__navbar.php' ?>

    <?php if(!empty($ok)): ?>
        <div class="alert alert-success" role="alert">
            感謝您的訂購
        </div>
    <?php endif; ?>
</div>

<?php include __DIR__. '/__html_foot.php' ?>
