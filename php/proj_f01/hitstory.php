<?php

 require __DIR__ . '/_db_connect.php';

 $page_name = 'hitstory';

 if(!isset($_SESSION['user'])){
    header("Location: index_.php");
    exit;
}

// 先取得會員的訂單資料 (半年內)
$t = date("Y-m-d H:i:s", time()-180*24*60*60);
$sql = sprintf("SELECT * FROM `orders` WHERE member_sid=%s AND order_date>'%s' ORDER BY sid DESC",
    $_SESSION['user']['id'], $t);

$rs = $mysqli->query($sql);
$my_orders = $rs->fetch_all(MYSQLI_ASSOC);

$order_sids = [];
foreach($my_orders as $v){
    $order_sids[] = $v['sid'];
}

$sql2 = sprintf("SELECT d.*, p.bookname FROM order_details d JOIN products p ON d.product_sid=p.sid WHERE d.order_sid IN (%s)",
        implode(',', $order_sids)
    );

$rs2 = $mysqli->query($sql2);
$my_details = $rs2->fetch_all(MYSQLI_ASSOC);

 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">

        <?php include __DIR__ . '/_navbar.php' ?>

        <h2 class="page-title">HISTORY</h2>

        <?php foreach($my_orders as $order): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th><?= $order['order_date'] ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total</td>
                    <td><?= $order['amount'] ?></td>
                </tr>
                <tr>
                    <td>Detail</td>
                    <td>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($my_details as $dt):
                                    if($order['sid']==$dt['order_sid']): ?>
                                <tr>
                                    <td><?= $dt['bookname'] ?></td>
                                    <td><?= $dt['price'] ?></td>
                                    <td><?= $dt['quantity'] ?></td>
                                </tr>
                                <?php endif; endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php endforeach; ?>

        <pre>
        <?php
        // print_r($my_orders) ;
        // echo "<br>";
        // print_r($my_details);
        ?>
        </pre>

    </div>

<?php include __DIR__ . '/_foot.php' ?>