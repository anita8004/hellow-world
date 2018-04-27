<?php

 require __DIR__ . '/_db_connect.php';
 $page_name = "product_list";

 $build_query = [];

 $per_page = 6;

 $cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
 $where = " WHERE 1 ";
 if ($cate!= 0) {
    $where .= "AND `category_sid`=$cate ";
 }
 $build_query['cate'] = $cate;

 $t_sql = "SELECT COUNT(1) FROM `products` $where";
 $rs = $mysqli->query($t_sql);
 $total_rows = $rs->fetch_row()[0]; //總筆數
 $total_pages = ceil($total_rows/$per_page); //總頁數

 $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
 $page = $page > $total_pages ? $total_pages : $page;
 $page = $page < 1 ? 1 : $page;
// $sql = printf("SELECT * FROM `products` LIMIT %s, %s", 從第幾筆開始, 有多少筆);


 $sql = sprintf("SELECT * FROM `products` $where LIMIT %s, %s", ($page-1)*$per_page, $per_page);
//  $sql = "SELECT * FROM `products` $where LIMIT 0, 4";

 $rs = $mysqli->query($sql);

 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">

        <?php include __DIR__ . '/_navbar.php' ?>

        <h2 class="page-title">SHOP LIST</h2>

        <div class="row">
            <div class="col-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item <?= $cate==0 ? 'active' : '' ?>"><a href="?cate=0">All</a></li>
                <li class="list-group-item <?= $cate==1 ? 'active' : '' ?>"><a href="?cate=1">程式設計</a></li>
                <li class="list-group-item <?= $cate==2 ? 'active' : '' ?>"><a href="?cate=2">繪圖軟體</a></li>
                <li class="list-group-item <?= $cate==3 ? 'active' : '' ?>"><a href="?cate=3">網際網路應用
</a></li>
            </ul>
            </div>
            <div class="col-9">
                <div class="row">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page==1 ? 1 : $page-1 ?>&<?= http_build_query($build_query) ?>" aria-label="Previous">
                                <i class="fas fa-long-arrow-alt-left"></i>
                            </a>
                        </li>
                        <?php for($i=1;$i<=$total_pages;$i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : ''  ?>"><a class="page-link" href="?page=<?= $i ?>&<?= http_build_query($build_query) ?>"><?= $i ?></a></li>
                        <?php endfor; ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page==$total_pages ? $total_pages : $page-1 ?>&<?= http_build_query($build_query) ?>" aria-label="Next">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                </div>
                <div class="row pro_list">
                    <?php while($row = $rs->fetch_assoc()): ?>
                    <div class="col-4">
                        <div class="card" data-sid="<?= $row['sid'] ?>">
                            <img class="card-img-top" src="./imgs/small/<?= $row['book_id'] ?>.jpg" alt="<?= $row['bookname'] ?>">
                            <div class="card-body">
                                <h3 class="card-title"><?= $row['bookname'] ?></h3>
                                <p class="card-text">
                                    <span class="author"><i class="fas fa-user-circle"></i> <?= $row['author'] ?></span>
                                    <span class="price"><i class="fas fa-dollar-sign"></i> <?= $row['price'] ?></span>
                                </p>
                            </div>
                            <div class="card-foot">
                                <!-- <div class="dropdown mb-2 qty">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        數量
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">1</a>
                                        <a class="dropdown-item" href="#">2</a>
                                        <a class="dropdown-item" href="#">3</a>
                                    </div>
                                </div> -->
                                <select name="qty" class="qty btn btn-secondary">
                                    <?php for($i=1;$i<=20;$i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor ?>
                                </select>
                                <button class="btn btn-info cart-btn"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>

    </div>
    <script>

        $('.cart-btn').on('click', function () {
            let sid = $(this).closest('.card').attr('data-sid');
            let qty = $(this).prev('.qty').val();
            let name = $(this).closest('.card').find('.card-title').text();
            $.get('add_to_cart.php', {sid: sid, qty: qty}, function(data){
                // console.log(name+'已加入購物車');
                // console.log(data);
                countCart(data);
            }, 'json');
         });
    </script>

<?php include __DIR__ . '/_foot.php' ?>