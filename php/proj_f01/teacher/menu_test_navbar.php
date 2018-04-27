<?php
require __DIR__ . '/__db_connect.php';

$sql = "SELECT * FROM `categories` ORDER BY sid";

$menu = [];

$rs = $mysqli->query($sql);

while($row=$rs->fetch_assoc()){

    if($row['parent_sid']==0){
        $menu[$row['sid']] = $row;
    } else {
        $menu[$row['parent_sid']]['children'][$row['sid']] = $row;
    }
}

//echo json_encode($menu, JSON_UNESCAPED_UNICODE);
?>
<?php include __DIR__. '/__html_head.php' ?>
<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <?php foreach($menu as $k1=>$v1): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $v1['name'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach($v1['children'] as $k2=>$v2): ?>
                        <a class="dropdown-item" href="?cate=<?= $v2['sid'] ?>"><?= $v2['name'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>
                <?php endforeach; ?>

            </ul>

        </div>
    </nav>

</div>

<?php include __DIR__. '/__html_foot.php' ?>
