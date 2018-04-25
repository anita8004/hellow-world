<?php
require __DIR__ . '/_db_connect.php';

$sql = "SELECT * FROM `categories` ORDER BY sid";

$data = [];
$menu = [];

$rs = $mysqli->query($sql);

while($row=$rs->fetch_assoc()){
    $data[] = $row;
}

foreach($data as $v){
    if($v['level']==1){
        $menu[$v['sid']] = $v;
    }
}
foreach($data as $v){
    if($v['level']==2){
        $menu[$v['parent_sid']]['children'][$v['sid']] = $v;
    }
}
foreach($data as $v){
    if($v['level']==3){

        foreach($menu as $km=>$m){
            foreach($m['children'] as $kn=>$vn){
                if($v['parent_sid']==$kn) {
                    //$vn['children'][$v['sid']] = $v;
                    $menu[$km]['children'][$kn]['children'][$v['sid']] = $v;

                }

            }
        }
    }
}


/*
echo "<pre>";
print_r($menu);
echo "</pre>";
*/

echo json_encode($menu, JSON_UNESCAPED_UNICODE);
