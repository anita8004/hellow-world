<?php

 require __DIR__ . '/_db_connect.php';
$page_name = 'data_list';


 //設定一頁有幾筆
$per_page = 5;
//用戶要看第幾筆
$page = isset($_GET['page']) ? $_GET['page'] : 1;


$sql = sprintf("SELECT * FROM address_book LIMIT %s, %s", ($page-1)*$per_page , $per_page);

$result = $mysqli->query($sql);

$t_sql = "SELECT COUNT(1) FROM address_book";
$res = $mysqli->query($t_sql);
$total = $res->fetch_row()[0];
$total_pages = ceil($total/$per_page);

$page = $page < 1 ? 1 : $page;
$page = $page > $total_pages ? $total_pages : $page;


 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">

        <?php include __DIR__ . '/_navbar.php' ?>

        <h2 class="page-title">DATA LIST</h2>

        <nav aria-label="Page navigation pt-3">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=1" aria-label="First">
                        <i class="fas fa-angle-double-left"></i>
                    </a>
                </li>
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page-1 ?>" aria-label="Previous">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link">
                        <?= $page ?> / <?= $total_pages ?>
                    </a>
                </li>
                <li class="page-item <?= $page == $total_pages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page+1 ?>" aria-label="Next">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
                <li class="page-item <?= $page == $total_pages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $total_pages ?>" aria-label="Last">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <table class="table table-striped table_data_list" style="margin-top: 15px">
            <thead>
            <tr>
                <th class="th_sid">sid</th>
                <th class="th_name">Name</th>
                <th class="th_mobile">Mobile</th>
                <th class="th_email">Email</th>
                <th class="th_birthday">Birthday</th>
                <th class="th_address">Address</th>
                <th class="th_delete">Delete</th>
                <th class="th_edit">Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['sid'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['mobile'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['birthday'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td>
                        <a href="javascript: deleteIt(<?= $row['sid'] ?>)" data-toggle="confirmation" data-title="Delete It?" target="_blank"><i class="far fa-trash-alt"></i></a>
                    </td>
                    <td>
                        <a href="data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>


        <nav aria-label="Page navigation text-center">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=1" aria-label="First">
                        <i class="fas fa-angle-double-left"></i>
                    </a>
                </li>
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page-1 ?>" aria-label="Previous">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
                <?php for($i=1;$i<=$total_pages;$i++): ?>
                    <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?= $page == $total_pages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page+1 ?>" aria-label="Next">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
                <li class="page-item <?= $page == $total_pages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $total_pages ?>" aria-label="Last">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

    <script>
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function(sid) {
                deleteIt(sid);
            },
        });
        function deleteIt(sid) {
            location.href = 'data_delete.php?sid='+sid;
        }
    </script>

<?php include __DIR__ . '/_foot.php' ?>