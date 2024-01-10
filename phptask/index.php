<?php

session_start();
if ($_SESSION["login"] == true) {
  header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .error {
      color: red;
    }

    .status {
      color: blue;
    }
  </style>
</head>

<body>
  <?php

  $phonereg = "/^[0-9]{10}$/";
  $namereg = "/[0-9]/";
  $emailreg = "/[a-z0-9_.]+\@([a-z])+\.([a-z])/";
  $passwordreg = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*](?=.*[0-9])).{6,30}/";


  $task = "/^\+?\d{1,3}?[-\s](?\d{3})?[\s](?\d{3})?[\s]\d{4}$/";

  $stat = "";
  $statt = "";
  $corr = true;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["firstname"] == "") {
      $firstnameErr = "name is required";
      $stat = "failure";
      $corr = false;

    } elseif (preg_match($namereg, $_POST["firstname"])) {
      $firstnameErr = "please enter valid name";
      $firstname = $_POST["firstname"];
      $stat = "failure";
      $corr = false;
    } else {
      $firstname = $_POST["firstname"];
      $statt = "success";
    }



    if ($_POST["phone"] == "") {
      $phoneErr = "Phone is required";
      $stat = "failure";
      $phone = $_POST["phone"];
      $corr = false;

    } elseif (!preg_match($phonereg, $_POST["phone"])) {
      $phoneErr = "Enter valid phone number";
      $stat = "failure";
      $phone = $_POST["phone"];
      $corr = false;
    } else {
      $phone = $_POST["phone"];
      $statt = "success";
    }

    if ($_POST["email"] == "") {
      $emailErr = "Email is required";
      $stat = "failure";
      $email = $_POST["email"];
      $corr = false;

    } elseif (!preg_match($emailreg, $_POST["email"])) {
      $emailErr = "please enter valid mail";
      $stat = "failure";
      $email = $_POST["email"];
      $conn = false;
    } else {
      $email = $_POST["email"];
      $statt = "success";

    }
    if ($_POST["password"] == "") {
      $passErr = "password is required";
      $stat = "failure";
      $password = $_POST["password"];
      $corr = false;


    } elseif (!preg_match($passwordreg, $_POST["password"])) {
      $passErr = "please enter caps, small, number and special char";
      $stat = "failure";
      $password = $_POST["password"];
      $corr = false;

    } else {
      $password = $_POST["password"];
      $statt = "success";
    }

    if ($_POST["male"] == "") {
      $gendererr = "gender is required";
      $statt = "failure";
      $corr = false;

      // $gender2 = $_POST["male"];
    } elseif ($_POST["male"] == "male") {
      $gender = "checked";
      $gender1 = "";

    } elseif ($_POST["male"] == "female") {
      $gender = "";
      $gender1 = "checked";

    } else {

      $statt = "success";
    }
    if ($_POST["male"] == "Male") {
      $gender = "checked";
    } else {
      $gender = "";
    }
    if ($_POST["male"] == "Female") {
      $gender1 = "checked";
    } else {
      $gender1 = "";
    }


    if ($_POST["check"] == "") {
      $checkerr = "please check terms & conditions ";
      $statt = "failure";
      $corr = false;
    } else {
      $statt = "success";
    }
    if ($_POST["check"] != "") {
      $checked = "checked";
    } else {
      $checked = "unchecked";
    }
    if ($stat == "failure") {
      $statt = "";
    }

    // if ($_POST["male"] != "") {
    //   $gen = $_POST["male"];
    // }
  
    $ph = $_POST["phone"];
    $em = $_POST["email"];
    $pa = $_POST["password"];
    $ge = $_POST["male"];
    if ($corr == true) {
      $_SESSION["uname"] = $firstname;
      $_SESSION["phone"] = $ph;
      $_SESSION["email"] = $em;
      $_SESSION["password"] = $pa;
      $_SESSION["gender"] = $ge;
      $servername = "localhost:3306";
      $username = "root";
      $password = "";
      $dbanme = "tutorial";
      $conn = new mysqli($servername, $username, $password, $dbanme);
      if (!$conn) {
        die("could not connect ");
      }

      $sql = 'INSERT into register' . "(name,phone,email,password,gender) " . "VALUES('$firstname','$ph','$em','$pa','$ge')";

      if (mysqli_query($conn, $sql)) {
        $record = "New record created successfully";
      } else {
        $record = "Error: " . $sql . "<br>" . mysqli_error($conn);

      }
      mysqli_close($conn);

      $registerinfo = fopen("../registerinfo.txt", "w") or die("unable to create file");
      $infotext = "name: " . $firstname . "\nPhone: " . $ph . "\nEmail: " . $em . "\nPassword: " . $pa . "\ngender: " . $ge;
      fwrite($registerinfo, $infotext);
      fclose($registerinfo);




    }





  }


  ?>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

    <h1>Register</h1>

    <br>Name* : <input type="text" name="firstname" placeholder="please enter your name" value="<?= $firstname; ?>">
    <span class="error">

      <?php echo "<br>" . $firstnameErr; ?>
    </span>


    <br>Phone* : <input type="text" name="phone" placeholder="Please enter your phone" value="<?= $phone; ?>">
    <span class="error">
      <?php echo "<br>" . $phoneErr; ?>
    </span>

    <br>Email-id* : <input type="text" name="email" placeholder="Please enter your Email id" value="<?= $email; ?>">
    <span class="error">
      <?php echo "<br>" . $emailErr; ?>
    </span>
    <br>Password* : <input type="text" name="password" placeholder="Please enter your password"
      value="<?= $password; ?>">
    <span class="error">
      <?php echo "<br>" . $passErr; ?>
    </span>

    <br>Gender* :<input type="radio" name="male" value="Male" <?= $gender ?>>Male<input type="radio" name="male"
      value="Female" <?= $gender1 ?>>Female<br>
    <span class="error">
      <?php echo $gendererr ?>
    </span>

    <br><input type="checkbox" value="user accepted terms and condions" name="check" <?= $checked ?>>accept terms &
    condition
    <span class="error"><br>
      <?php echo $checkerr ?>
    </span>

    <br><input type="submit" name="button" value="submit"><br><br>
    <h2 class="status">
      <?php echo $stat . $statt ?><br>
      <?php echo $record ?><br>

    </h2>

    already have a account click <a href="login.php">Login</a>


  </form>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <h1>FILE UPLOAD</h1>
    <input type="file" name=uploadfile>
    <input type="submit" value="upload">
  </form>

</body>

</html>