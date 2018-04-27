<?php
require __DIR__ . '/__db_connect.php';

$page_name = 'product_list';

$build_query = [];

$per_page = 4;  //每一頁有幾筆

$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$where = " WHERE 1 ";
if($cate!=0){
    $where .= " AND `category_sid`=$cate ";
    $build_query['cate'] = $cate;
}


$t_sql = "SELECT COUNT(1) FROM `products` $where ";
$rs = $mysqli->query($t_sql);
$total_rows = $rs->fetch_row()[0]; //總筆數

$total_pages = ceil($total_rows/$per_page); //總頁數

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = $page > $total_pages ? $total_pages : $page;
$page = $page < 1 ? 1 : $page;


$sql = sprintf("SELECT * FROM `products` $where LIMIT %s, %s", ($page-1)*$per_page, $per_page);
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
    .fa-male {
        color: blue;
        font-size: larger;
    }
    .fa-dollar-sign {
        color: #ff5b1e;
        font-size: larger;
    }
</style>
<div class="container">

    <?php include __DIR__. '/__navbar.php' ?>

<div class="row" style="margin-top: 20px">
    <div class="col-md-3">

        <div class="btn-group-vertical btn-block">
            <a class="btn btn-<?= $cate==0 ? '' : 'outline-' ?>primary" href="product_list.php">所有商品</a>
            <a class="btn btn-<?= $cate==1 ? '' : 'outline-' ?>primary" href="?cate=1">程式設計</a>
            <a class="btn btn-<?= $cate==2 ? '' : 'outline-' ?>primary" href="?cate=2">繪圖軟體</a>
            <a class="btn btn-<?= $cate==3 ? '' : 'outline-' ?>primary" href="?cate=3">網際網路應用</a>
        </div>
    </div>

    <div class="col-md-9">
        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page==1 ? 1 : $page-1  ?>&<?= http_build_query($build_query) ?>">
                            <i class="fas fa-chevron-circle-left"></i>
                        </a>
                    </li>
                    <?php for($i=1; $i<=$total_pages; $i++): ?>
                    <li class="page-item <?= $i==$page ? 'active' : ''?>">
                        <a class="page-link" href="?page=<?= $i ?>&<?= http_build_query($build_query) ?>"><?= $i ?></a>
                    </li>
                    <?php endfor; ?>

                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page==$total_pages ? $total_pages : $page+1  ?>&<?= http_build_query($build_query) ?>">
                            <i class="fas fa-chevron-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <?php while($row = $rs->fetch_assoc()): ?>
            <div class="col-md-3">
                <div class="card" data-sid="<?= $row['sid'] ?>">
                    <img class="product-img" src="./imgs/small/<?= $row['book_id'] ?>.jpg" alt="Card image cap">
                    <div class="card-body">
<!--                        <h5 class="card-title">--><?//= $row['bookname'] ?><!--</h5>-->
                        <p class="card-text">
                            <?= $row['bookname'] ?><br>
                            <i class="fas fa-male"></i> <?= $row['author'] ?><br>
                            <i class="fas fa-dollar-sign"></i> <?= $row['price'] ?><br>
                        </p>
                        <select class="qty">
                            <?php for($i=1; $i<=20; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor ?>
                        </select>

                        <button class="btn btn-primary cart_btn"><i class="fas fa-cart-plus"></i></button>
                    </div>
                </div>
            </div>
            <?php endwhile ?>


        </div>

    </div>

</div>

</div>
<script>
    $('.cart_btn').click(function(){
       let sid = $(this).closest('.card').attr('data-sid');
       let qty = $(this).prev().val();
        //$(this).closest('.card').find('.qty').val()

        $.get('add_to_cart.php', {sid:sid, qty:qty}, function(data){
            console.log(data);
            countCart(data);
            //alert('商品已加入購物車');
        }, 'json');
    });


</script>

<?php include __DIR__. '/__html_foot.php' ?>
