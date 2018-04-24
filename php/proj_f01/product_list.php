<?php

 require __DIR__ . '/_db_connect.php';
 $page_name = "product_list";

 $sql = "SELECT * FROM `products`";

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
                <li class="list-group-item"><a href="">Cras justo odio</a></li>
                <li class="list-group-item"><a href="">Dapibus ac facilisis in</a></li>
                <li class="list-group-item"><a href="">Morbi leo risus</a></li>
                <li class="list-group-item"><a href="">Porta ac consectetur ac</a></li>
                <li class="list-group-item"><a href="">Vestibulum at eros</a></li>
            </ul>
            </div>
            <div class="col-9">
                <div class="row">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                    </ul>
                </nav>
                </div>
                <div class="row pro_list">
                    <?php for($i=0;$i<4;$i++):
                        $row = $rs->fetch_assoc();
                        ?>
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="./imgs/small/<?= $row['book_id'] ?>.jpg" alt="<?= $row['bookname'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['bookname'] ?></h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>

                </div>
            </div>
        </div>

    </div>

<?php include __DIR__ . '/_foot.php' ?>