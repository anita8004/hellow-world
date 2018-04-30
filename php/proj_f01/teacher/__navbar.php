<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">小新的店</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= $page_name=='product_list' ? 'active' : '' ?>">
                <a class="nav-link" href="product_list.php">商品列表</a>
            </li>
            <li class="nav-item <?= $page_name=='cart' ? 'active' : '' ?>">
                <a class="nav-link" href="cart.php">購物車
                    <span class="badge badge-warning" id="cart_num" style="display: none">0</span></a>
            </li>

        </ul>

        <?php if(isset($_SESSION['user'])): ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link"><?= $_SESSION['user']['nickname'] ?></a>
                </li>
                <li class="nav-item <?= $page_name=='edit_member' ? 'active' : '' ?>">
                    <a class="nav-link" href="edit_member.php">編輯會員</a>
                </li>
                <li class="nav-item <?= $page_name=='history' ? 'active' : '' ?>">
                    <a class="nav-link" href="history.php">訂購記錄</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">登出</a>
                </li>
            </ul>
        <?php else: ?>
            <ul class="navbar-nav">
                <li class="nav-item <?= $page_name=='login' ? 'active' : '' ?>">
                    <a class="nav-link" href="login.php">登入</a>
                </li>
                <li class="nav-item <?= $page_name=='register' ? 'active' : '' ?>">
                    <a class="nav-link" href="register.php">註冊會員</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>
<style>
    .navbar-light .navbar-nav .active > .nav-link {
        color: white;
        background-color: #005cbf;
    }
</style>
<script>
    let cart_num = $('#cart_num');

    $.get('add_to_cart.php', function(data){
        console.log(data);
        countCart(data);
    }, 'json');

    function countCart(obj){
        let s, t=0;

        for(s in obj){
            t += obj[s];
        }
        cart_num.text(t);
        cart_num.fadeIn();
    }


</script>