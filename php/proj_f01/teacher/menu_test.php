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
/*
echo "<pre>";
print_r($menu);
echo "</pre>";
*/

echo json_encode($menu, JSON_UNESCAPED_UNICODE);