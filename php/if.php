<?php

  $one = 1;

  $two = 2;

  $three = $one;

  //判斷2個條件是否同時符合

  if ($one == $two AND $one == $three) {

    echo "True!";

  } else {

    echo "False!";

  }

  echo "<br/>";

  //判斷2個條件是否符合其中之一

  if ($one == $two OR $one == $three) {

    echo "True!";

  } else {

    echo "False!";

  }


?>