<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: black;
        }

        .container {
            width: 40%;
            margin: 5% auto;
            background-color: bisque;
            padding: 4%;
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
            width: 95%;
            padding: 6px;
        }

        .submit input {
            cursor: pointer;
            width: 99%;
            margin: 0 auto;
            padding: 6px;
            color: white;
            background-color: black;
            margin-top: 5px;
            font-size: 20px;
            border: none;
            border-radius: 5px;
        }

        span {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include "connection.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbanme = "tutorial";
        $conn = new mysqli($servername, $username, $password, $dbanme);
        if (!$conn) {
            die("could not connect ");

        }
        $myemail = $_POST['email'];
        $mypassword = $_POST['password'];
        $sqladmin = "SELECT * FROM `admin` WHERE (adminname='$myemail' and adminpassword='$mypassword');";
        $adminresult = mysqli_query($conn, $sqladmin);
        $admincount = mysqli_num_rows($adminresult);
        if ($admincount == 1) {
            session_start();
            $_SESSION["adminname"] = $myemail;
            header("location: viewrecord.php");
        }

        $sqlsubadmin = "SELECT * FROM `subadmin` WHERE (subname='$myemail' and subpassword='$mypassword');";
        $subadminresult = mysqli_query($conn, $sqlsubadmin);
        $subadmincount = mysqli_num_rows($subadminresult);
        if ($subadmincount == 1) {

            header("location: home.php");
        }
        $sql = "SELECT * FROM `card` WHERE (Email='$myemail' and password='$mypassword');";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['Name'];
                $email = $row['Email'];
                $password = $row['password'];
                $status = $row['del'];
                $profile = $row['profile'];
            }
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['profile'] = $profile;
            // print_r($_SESSION['email']);
            if ($status == "active") {

                header("location: profile.php");
            } else {
                $err = "your account deleted";
            }

        } else {
            $err = "Your Email or Password is invalid";

        }
    }
    ?>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <h1>login</h1>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password">
            </div><br>
            <div class="submit">
                <input type="submit" value="Login">

            </div><br>
            <span>
                <?php
                echo ($err);
                ?><br><br>
            </span>
            Don't have a account click <a href="index.php">Register</a>
        </form>
    </div>


</body>

</html>