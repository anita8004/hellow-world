<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">小新的店</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= $page_name=='data_list' ? 'active' : '' ?>">
                <a class="nav-link" href="data_list.php">資料列表</a>
            </li>
            <li class="nav-item <?= $page_name=='data_insert' ? 'active' : '' ?>">
                <a class="nav-link" href="data_insert.php">新增資料</a>
            </li>
            <li class="nav-item <?= $page_name=='data_list_ajax' ? 'active' : '' ?>">
                <a class="nav-link" href="data_list_ajax.php">列表(AJAX)</a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <li class="nav-item <?= $page_name=='login' ? 'active' : '' ?>">
                <a class="nav-link" href="login.php">登入</a>
            </li>
            <li class="nav-item <?= $page_name=='register' ? 'active' : '' ?>">
                <a class="nav-link" href="register.php">註冊會員</a>
            </li>
        </ul>

    </div>
</nav>
<style>
    .navbar-light .navbar-nav .active > .nav-link {
        color: white;
        background-color: #005cbf;
    }
</style>