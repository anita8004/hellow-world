<?php

 require __DIR__ . '/_db_connect.php';

 $page_name = "cart";

 if (!empty($_SESSION['cart'])) {
    $keys = array_keys($_SESSION['cart']);
    $sql = sprintf("SELECT * FROM `products` WHERE `sid` IN (%s)", implode(',', $keys));
    $rs = $mysqli->query($sql);

    $pdata = [];

    while ($row=$rs->fetch_assoc()):
        $row['qty'] = $_SESSION['cart'][$row['sid']];
        $pdata[$row['sid']] = $row;
    endwhile;
 }

 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">

        <?php include __DIR__ . '/_navbar.php' ?>

        <h2 class="page-title">CART</h2>

        <?php if (! empty($_SESSION['cart'])): ?>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>封面</th>
                    <th>書名</th>
                    <th>單價</th>
                    <th>數量</th>
                    <th>小計</th>
                    <th>刪除</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($keys as $v):
                    $row = $pdata[$v];
                    ?>
                <tr data-sid="<?= $row['sid'] ?>" data-price="<?= $row['price'] ?>" data-qty="<?= $row['qty'] ?>">
                    <td><img src="./imgs/small/<?= $row['book_id'] ?>.jpg" alt=""></td>
                    <td><?= $row['bookname'] ?></td>
                    <td class="price">$ <?= $row['price'] ?></td>
                    <td class="qty">
                        <input type="number" value="<?= $row['qty'] ?>" min="1">
                    </td>
                    <td>$ <span class="sub-total"></span></td>
                    <td>
                        <button class="btn remove-item"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-right">總計：$ <span class="total"></span></td>
                </tr>
            </tfoot>
        </table>

        <?php else: ?>

        <p>購物車是空的</p>

        <?php endif ?>

    </div>

    <script>
        function calctotal() {
            let subs = $('.sub-total');
            let t = 0;
            subs.each(function(){
                let q = $(this).closest('tr').attr('data-qty');
                let p = $(this).closest('tr').attr('data-price');
                $(this).text(q*p);
                t += parseInt($(this).text());
            });
            $('.total').text(t.toLocaleString("en-US"));
        }
        calctotal();


        $('.qty > input').on('change', function(){
            let tr = $(this).closest('tr');
            let sid = tr.attr('data-sid');
            let price = $(this).closest('tr').attr('data-price');
            let qty = parseInt($(this).val());
            if(qty < 1) {
                $(this).val($(this).closest('tr').attr('data-qty'));
                return;
            }
            $(this).closest('tr').attr('data-qty', qty);
            $.get('add_to_cart.php', {sid: sid, qty: qty}, function(data){
                calctotal();
                countCart(data);
            }, 'json');
        })


        $('.remove-item').on('click', function () {
            let tr = $(this).closest('tr');
            let sid = tr.attr('data-sid');
            $.get('add_to_cart.php', {sid: sid}, function(data){
                tr.remove();
                calctotal();
            }, 'json');
        })

    </script>

<?php include __DIR__ . '/_foot.php' ?>