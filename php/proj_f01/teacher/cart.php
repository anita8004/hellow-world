<?php
require __DIR__ . '/__db_connect.php';

$page_name = 'cart';


if(!empty($_SESSION['cart'])){

    $keys = array_keys($_SESSION['cart']);

    $sql = sprintf("SELECT * FROM `products` WHERE `sid` IN (%s)", implode(',', $keys));
    $rs = $mysqli->query($sql);

    $pdata = [];

    while($row=$rs->fetch_assoc()):
        $row['qty'] = $_SESSION['cart'][$row['sid']];
        $pdata[$row['sid']] = $row;
    endwhile;

}
//print_r($pdata);
//exit;
?>
<?php include __DIR__. '/__html_head.php' ?>
<div class="container">

    <?php include __DIR__. '/__navbar.php' ?>

    <?php if(!empty($_SESSION['cart'])): ?>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">取消</th>
            <th scope="col">封面</th>
            <th scope="col">書名</th>
            <th scope="col">單價</th>
            <th scope="col">數量</th>
            <th scope="col">小計</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($keys as $v):
            $row = $pdata[$v];
        ?>
        <tr data-sid="<?= $row['sid'] ?>">
            <td><button class="remove-item">
                    <i class="fas fa-trash-alt"></i>
                </button></td>
            <td><img src="./imgs/small/<?= $row['book_id'] ?>.jpg" alt=""></td>
            <td><?= $row['bookname'] ?></td>
            <td class="unit-price price" data-price="<?= $row['price'] ?>"></td>
            <td class="qty" data-qty="<?= $row['qty'] ?>">
                <select name="" id="">
                    <?php for($i=1; $i<=50; $i++): ?>
                    <option value="<?=$i?>" <?= $i==$row['qty'] ? 'selected' : ''?>><?=$i?></option>
                    <?php endfor; ?>
                </select>
            </td>
            <td class="sub-total price"  data-price="<?= $row['qty'] * $row['price'] ?>"></td>

        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

        <div class="alert alert-success" role="alert">總計: <span id="total-price">0</span></div>

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
        <div class="alert alert-warning" role="alert">
            購物車裡沒有商品
        </div>
    <?php endif ?>


</div>
<script>
    var dallorCommas = function(n){
        return '$ ' + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };

    var modifyPrice = function(){
        let prices = $('td.price');
        prices.each(function(){
            let p = parseInt( $(this).attr('data-price') );
            $(this).text( dallorCommas(p) );
        });
    };
    modifyPrice();



    function calcTotal(){
        let subs = $('.sub-total');
        let t = 0;
        subs.each(function(){
            t += parseInt($(this).attr('data-price'));
        });

        $('#total-price').text( dallorCommas(t) );

    }

    calcTotal();



    $('button.remove-item').click(function(){
        let tr = $(this).closest('tr');
        let sid = tr.attr('data-sid');
        $.get('add_to_cart.php', {sid:sid}, function(data){
            tr.remove();
            calcTotal();
            countCart(data);
        }, 'json');


    });

    var combo_change = function(event){
        // console.log(event);
        let me = $(this);
        me.off('change'); // 取消偵聽
        me.prop('disabled', true);

        let tr = $(this).closest('tr');
        let sid = tr.attr('data-sid');
        let qty = parseInt( $(this).val() );
        if(qty<1){
            $(this).val( $(this).parent().attr('data-qty') );
            return;
        }
        $(this).parent().attr('data-qty', qty);

        let price = $('.unit-price', tr).attr('data-price');
        $.get('add_to_cart.php', {sid:sid, qty: qty }, function(data){
            let sub_t = $('.sub-total', tr);
            sub_t.attr('data-price', qty*price);
            sub_t.text( dallorCommas(qty*price) );

            calcTotal();
            countCart(data);
            me.prop('disabled', false);
            me.on('change', input_change);
        }, 'json');
    };

    $('td.qty > select').on('change', combo_change);

</script>
<?php include __DIR__. '/__html_foot.php' ?>
