<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <?php
  session_start();
  if ($_SESSION['login'] == false) {
    header("location: register.php");
  }
  ?>
  <h1>this is home page</h1>
  <script>
    var obj = new XMLHttpRequest();
    obj.open(
      "GET",
      "/santhosh/api/login/index.php?email=" + "" + "&password=" + "",
      true
    );

    obj.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(this.responseText);
        if (json.sessions == true) {
          window.location.href = "register.php";
        }
      }
    };
    obj.send();
  </script>
</body>

</html>