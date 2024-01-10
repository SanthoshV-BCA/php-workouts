<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home page</title>
</head>

<body>
  <?php

  session_start();
  if ($_SESSION['name'] == true) {



  } else {
    header('Location: index.php');
  }
  if ($_GET['logout']) {
    session_destroy();
    header('Location:  index.php');
  }


  ?>
  <h1>HOME</h1>
  <a href="<?php echo "?logout=1" ?>">
    <button>LOGOUT</button></a>



</body>

</html>