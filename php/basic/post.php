<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>php - get</title>
</head>
<body>

  <?php

    $names = array("Anita","Tina","Hedy");

    if ($_POST["submit"]) {

      if ($_POST["name"]) {

        foreach ($names as $name) {

          if ($_POST['name']==$name) {

            echo "I know you, ".$name;

            $know = 1; //設定符合條件的項目才有$know=1的變數

          }

          //不能直接在後面用else,會印出 I know you, AnitaI don't know you , TinaI don't know you , Hedy

        }

        if (!$know) {echo "I dont know you, ".$_POST['name'];} //未符合條件,也就是沒有$know變數的項目

      }else{

        echo "Please enter your name";

      }

    }

  ?>

  <form method="post">

    <label for="name">Name:</label>
    <input type="text" name="name"/>

    <input type="submit" name="submit" value="submit your name" />

  </form>

</body>
</html>