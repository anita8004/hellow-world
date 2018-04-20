<?php

 require __DIR__ . '/_db_connect.php';

 //設定一頁有幾筆
$per_page = 5;
//用戶要看第幾筆
$page = isset($_GET['page']) ? $_GET['page'] : 1;


//$sql = sprintf("SELECT * FROM address_book LIMIT %s, %s", ($page-1)*$per_page , $per_page);
//
//$result = $mysqli->query($sql);

$t_sql = "SELECT COUNT(1) FROM address_book";
$res = $mysqli->query($t_sql);
$total = $res->fetch_row()[0];
$total_pages = ceil($total/$per_page);

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = $page < 1 ? 1 : $page;
$page = $page > $total_pages ? $total_pages : $page;

$sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$rs = $mysqli->query($sql);


$data_list = [];
$result['success'] = true;
$data_list['per_page'] = $per_page;
$data_list['total_num'] = $total;
$data_list['pages_num'] = $total_pages;
$data_list['data'] = $rs->fetch_all(MYSQLI_ASSOC);
$data_list['page'] = $page;

//print_r($data_list);

echo json_encode($data_list, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES);