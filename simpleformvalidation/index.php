<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <form method="post" action="#">
    User Name
    <input type="text" name="name" /><br />
    <?php $a = $_POST['name'];
    if ($a == "") {
      echo ("<br>please enter name<br>");
    } ?>
    Password<input type="password" name="password" /><br />
    <?php $b = $_POST['password'];
    if ($b == "") {
      echo ("<br>please enter password<br>");
    } ?>
    <input type="submit" value="submit" />
  </form>
</body>

</html>