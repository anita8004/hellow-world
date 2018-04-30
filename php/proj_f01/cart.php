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
                        <select name="" id="">
                            <?php for($i=0;$i<=20;$i++): ?>
                            <option value="<?= $i ?>" <?= $i == $row['qty'] ? 'selected' : '' ?>><?= $i ?></option>
                            <?php endfor ?>
                        </select>
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
                    <td colspan="6" class="text-right font-weight-bold">總計：$ <span class="total"></span></td>
                </tr>
            </tfoot>
        </table>

        <hr class="mt-5 mb-3"/>

        <?php if(isset($_SESSION['user'])): ?>
        <div class="col-md-3">
            <a href="checkout.php" class="btn btn-primary">結帳</a>
        </div>
        <?php else: ?>
        <div class="col-md-3">
            <a href="login.php" class="btn btn-warning">請先登入再結帳</a>
        </div>
        <?php endif; ?>

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


        function qty_change(){
            let me = $(this);
            let tr = me.closest('tr');
            let sid = tr.attr('data-sid');
            let price = me.closest('tr').attr('data-price');
            let qty = parseInt(me.val());
            // if(qty < 1) {
            //     $(this).val(me.closest('tr').attr('data-qty'));
            //     return;
            // }
            me.closest('tr').attr('data-qty', qty);
            me.closest('tr').attr('data-price', qty * price);
            $.get('add_to_cart.php', {sid: sid, qty: qty}, function(data){
                calctotal();
                countCart(data);
            }, 'json');
        }


        $('.qty > select').on('change', qty_change);


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