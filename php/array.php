<?php

  //數組1

  $myArray = array("book","juice","music");

  //echo $myArray; 錯誤,只會印出array

  print_r($myArray);

  echo "<br/>";

  echo $myArray[0];

  echo "<br/>";

  echo $myArray[2];

  //echo $myArray[5];

  echo "<br/><br/>";

  //數組2

  $anotherArray[0] = "apple";

  $anotherArray[1] = "banana";

  print_r($anotherArray);

  echo "<br/><br/>";

  //數組3

  $thirdArray = array(

    "Taiwan" => "Chinese",
    "USA" => "English",
    "Japan" => "Japanese"

  );

  print_r($thirdArray);

  echo "<br/><br/>";

  //添加數組項目

  $anotherArray[] = "orange";

  print_r($anotherArray);

  echo "<br/><br/>";

  //刪除數組項目

  unset($thirdArray["USA"]);

  print_r($thirdArray);

  echo "<br/><br/>";

  //unset 也能刪除變量

  $name = "Jaff";

  unset($name);

  // echo $name; 不會顯示Jaff


?>