<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>php - get</title>
</head>
<body>

  <?php

    if ($_GET["submit"]) {

      if ($_GET["name"]) {

        echo "Your name is ".$_GET["name"];

      }else{

        echo "Please enter your name";

      }

    }

  ?>

  <form>

    <label for="name">Name:</label>
    <input type="text" name="name"/>

    <input type="submit" name="submit" value="submit your name" />

  </form>

</body>
</html>