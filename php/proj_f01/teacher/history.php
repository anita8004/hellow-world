<?php
require __DIR__ . '/__db_connect.php';


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
<?php include __DIR__. '/__html_head.php' ?>
<div class="container">

    <?php include __DIR__. '/__navbar.php' ?>


    <?php foreach($my_orders as $order): ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">訂購時間</th>
            <th scope="col"><?= $order['order_date'] ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>總價</th>
            <td><?= $order['amount'] ?></td>
        </tr>
        <tr>
            <th>明細</th>
            <td>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">產品名稱</th>
                        <th scope="col">價格</th>
                        <th scope="col">數量</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($my_details as $dt):
                        if($order['sid']==$dt['order_sid']):
                        ?>
                    <tr>
                        <th><?= $dt['bookname'] ?></th>
                        <td><?= $dt['price'] ?></td>
                        <td><?= $dt['quantity'] ?></td>
                    </tr>
                    <?php
                        endif;
                    endforeach; ?>
                    </tbody>
                </table>

            </td>

        </tr>

        </tbody>
    </table>
    <?php endforeach; ?>

    <pre>
        <?php
        //print_r($my_orders) ;

        //print_r($my_details);
        ?>
    </pre>

</div>

<?php include __DIR__. '/__html_foot.php' ?>
