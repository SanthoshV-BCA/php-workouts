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

    * {
      padding: 0;
      margin: 0;
    }

    body {
      background-color: black;
    }

    .container {
      width: 40%;
      margin: 5% auto;
      background-color: bisque;
      padding: 5%;
      border-radius: 10px;
      /* text-align: center; */
    }

    h1 {
      text-align: center;
      color: black;
      font-size: 40px;
    }

    label {
      margin: 5px;
      color: black;
      font-size: 20px;
      font-weight: 500;
      font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
    }

    .form-group input {
      margin: 5px;
      width: 100%;
      padding: 6px;
    }

    .form-group1 input {
      margin: 5px;
      width: 100%;
      background-color: white;
      padding: 6px;
      border: 1px solid gray;
    }

    .submit input {
      cursor: pointer;
      width: 105%;
      margin: 0 auto;
      padding: 6px;
      color: white;
      background-color: black;
      margin-top: 5px;
      font-size: 20px;
    }

    .gender input {
      text-align: center;

      margin: 0 6%;
    }

    .gender {
      text-align: center;
    }

    .gender label {
      text-align: left;
    }

    .check {
      margin: 5px;
      color: black;
      padding: 25px 0;
      font-size: 15px;
      font-weight: 500;
      font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
    }

    .check input {
      padding: 5px
    }

    .fileupload {
      margin: 10px;
      text-align: center;
      color: black;
      font-size: 25px;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <?php

  $phonereg = "/^[0-9]{10}$/";
  $namereg = "/[0-9]/";
  $emailreg = "/[a-z0-9_.]+\@([a-z])+\.([a-z])/";
  $passwordreg = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*](?=.*[0-9])).{6,30}/";


  // $task = "/^\+?\d{1,3}?[-\s](?\d{3})?[\s](?\d{3})?[\s]\d{4}$/";
  
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
  <div class="container">
    <h1>Register</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="form">


      <div class="form-group">
        <label>Name* </label><br> <input type="text" name="firstname" placeholder="please enter your name"
          value="<?= $firstname; ?>">
        <span class="error">

          <?php echo $firstnameErr; ?>
        </span>
      </div>

      <div class="form-group">
        <label>Phone* </label><br> <input type="text" name="phone" placeholder="Please enter your phone"
          value="<?= $phone; ?>">
        <span class="error">
          <?php echo $phoneErr; ?>
        </span>
      </div>
      <div class="form-group">
        <label>Email-id*</label><br> <input type="text" name="email" placeholder="Please enter your Email id"
          value="<?= $email; ?>">
        <span class="error">
          <?php echo $emailErr; ?>
        </span>
      </div>
      <div class="form-group">
        <label>Password* </label><br> <input type="text" name="password" placeholder="Please enter your password"
          value="<?= $password; ?>">
        <span class="error">
          <?php echo $passErr; ?>
        </span>
      </div>
      <label>Gender*</label>
      <div class="gender">
        <input type="radio" name="male" value="Male" style="text-align:left;" <?= $gender ?>>Male<input type="radio"
          name="male" value="Female" <?= $gender1 ?>>Female<br>
      </div>
      <span class="error">
        <?php echo $gendererr ?>
      </span>

      <div class="check">
        <input type="checkbox" value="user accepted terms and condions" name="check" <?= $checked ?>>accept terms &
        condition
        <span class="error"><br>
          <?php echo $checkerr ?>
        </span>
      </div>
      <div class="submit">

        <br><input type="submit" name="button" value="SUBMIT"><br><br>
      </div>
      <!-- <h2 class="status">
         echo $stat . $statt ?><br>
         echo $record ?><br>

      </h2> -->

      already have a account click <a href="login.php">Login</a>


    </form>
    <form action="upload.php" method="post" enctype="multipart/form-data" class="form">
      <h1 class="fileupload">FILE UPLOAD</h1>
      <div class="form-group1">
        <input type="file" name=uploadfile>
      </div>
      <div class="submit">
        <input type="submit" value="upload">
      </div>
    </form>
  </div>
</body>

</html>