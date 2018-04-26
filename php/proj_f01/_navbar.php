<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./">SHOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= $page_name == 'product_list' ? 'active' : '' ?>">
                <a class="nav-link" href="product_list.php">Shop List</a>
            </li>
            <li class="nav-item <?= $page_name == 'cart' ? 'active' : '' ?>">
                <a class="nav-link" href="cart.php">Cart</a>
            </li>
        </ul>
        <?php if(isset($_SESSION['user'])): ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link">Hi ~ <?= $_SESSION['user']['nickname'] ?></a>
                </li>
                <li class="nav-item <?= $page_name == 'members_area' ? 'active' : '' ?>">
                    <a class="nav-link" href="members_area.php">Menber's Area</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        <?php else: ?>
            <ul class="navbar-nav">
                <li class="nav-item <?= $page_name == 'login' ? 'active' : '' ?>">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item <?= $page_name == 'register' ? 'active' : '' ?>">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>