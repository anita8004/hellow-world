<?php

 require __DIR__ . '/_db_connect.php';

 $page_name = "cart";

 if (!empty($_SESSION['cart'])) {
    $keys = array_keys($_SESSION['cart']);
    $sql = sprintf("SELECT * FROM `products` WHERE `sid` IN (%s)", implode(',', $keys));
    $rs = $mysqli->query($sql);
 }

 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">

        <?php include __DIR__ . '/_navbar.php' ?>

        <h2 class="page-title">CART</h2>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>BOOK NAME</th>
                    <th>PRICE</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row=$rs->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['sid'] ?></td>
                    <td><?= $row['bookname'] ?></td>
                    <td><?= $row['price'] ?></td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>

    </div>

<?php include __DIR__ . '/_foot.php' ?>