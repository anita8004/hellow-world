<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./">SHOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= $page_name == 'data_list' ? 'active' : '' ?>">
                <a class="nav-link" href="data_list.php">Shop List</a>
            </li>
            <li class="nav-item <?= $page_name == 'data_insert' ? 'active' : '' ?>">
                <a class="nav-link" href="data_insert.php">Data Insert</a>
            </li>
            <li class="nav-item <?= $page_name == 'data_ajax' ? 'active' : '' ?>">
                <a class="nav-link" href="data_list_ajax.php">Data Ajax</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item <?= $page_name == 'login' ? 'active' : '' ?>">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item <?= $page_name == 'register' ? 'active' : '' ?>">
                <a class="nav-link" href="register.php">Register</a>
            </li>
        </ul>
    </div>
</nav>