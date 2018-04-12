<?php

  // while (條件) {
  //   若條件成立,則執行code
  // }

  $myArray = array("Apple","Banana","Lemon","");
  $i = 0;
  while ( $i<= 2) {

    echo $myArray[$i]."<br/>";

    $i++;

  }

  //找不到的項目php會自動略過,但因為我有開啟錯誤提示,這邊就還是寫$i<=2

?>