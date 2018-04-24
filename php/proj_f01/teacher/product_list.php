<?php
require __DIR__ . '/__db_connect.php';

$page_name = 'product_list';

$sql = "SELECT * FROM `products`";


$rs = $mysqli->query($sql);



?>
<?php include __DIR__. '/__html_head.php' ?>
<style>
    .product-img {
        width: 100px;
        height: 135px;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<div class="container">

    <?php include __DIR__. '/__navbar.php' ?>

<div class="row" style="margin-top: 20px">
    <div class="col-md-3">

        <div class="btn-group-vertical btn-block">
            <a class="btn btn-primary">所有商品</a>
            <a class="btn btn-outline-primary">程式設計</a>
            <a class="btn btn-outline-primary">繪圖軟體</a>
            <a class="btn btn-outline-primary">網際網路應用</a>
        </div>
    </div>

    <div class="col-md-9">
        <div class="row"></div>
        <div class="row">
            <?php for($i=0; $i<4; $i++):
                $row = $rs->fetch_assoc();
                ?>
            <div class="col-md-3">
                <div class="card" style="">
                    <img class="product-img" src="./imgs/small/<?= $row['book_id'] ?>.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['bookname'] ?></h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <?php endfor ?>


        </div>

    </div>

</div>







</div>

<?php include __DIR__. '/__html_foot.php' ?>
