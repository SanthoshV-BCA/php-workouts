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
  if ($_SESSION['login'] == true) {
    header("location: home.php");
  }
  ?>
  <!-- <form method="post" action=""> -->
  email<input type="text" name="email" id="email" /> password<input type="password" name="password" id="password" />

  <input type="submit" value="register" id="btn"
    onclick="myfunction(document.getElementById('email').value,document.getElementById('password').value)" />
  <p id="result"></p>

  <script>
    // let btn = document.getElementById("btn");
    // let a = document.getElementById("text");
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    // btn.addEventListener("click", myfunction(email, password));

    // var email = emaill.value;
    // var password = passwordd.value;

    function myfunction(email, password) {
      if (email == "" && password == "") {
        document.getElementById("result").innerHTML = "";
        return;
      } else {
        var obj = new XMLHttpRequest();
        obj.open(
          "GET",
          "/santhosh/api/login/index.php?email=" +
          email +
          "&password=" +
          password,
          true
        );

        obj.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            var json = JSON.parse(this.responseText);
            // console.log(json);
            // var req = this.responseText;
            // var objj = JSON.parse(this.response);
            document.getElementById("result").innerHTML = json.email;
            if (json.sessions == true) {
              window.location.href = "home.php";
            }
            
            //  else {
            //   window.location.href = "register.html";
            // }
            // if (email == json.email && password == json.password) {
            //   window.location.href = "https://www.google.com/";
            // }
            console.log(json);
            // document.getElementById("result").innerHTML = objj.name;
          }
        };

        obj.send();
      }
    }
  </script>
</body>

</html>