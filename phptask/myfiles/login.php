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
    <title>Login</title>
    <style>
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

        .submit input {
            cursor: pointer;
            width: 105%;
            margin: 0 auto;
            padding: 6px;
            color: white;
            background-color: black;
            margin-top: 5px;
            font-size: 20px;
            border-radius: 7px;
        }

        span {
            color: red;

        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $err = " ";
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
        // echo ($myemail . " " . $mypassword);
        $sql = "SELECT * FROM `register` WHERE (email='$myemail' and password='$mypassword');";
        // $sql = "SELECT id FROM register WHERE name = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($conn, $sql);
        // if()
        // $row = mysqli_fetch_assoc($result); "
        // $active = $row['active'];
        
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            // session_register("myusername");
            // $_SESSION['login_user'] = $myusername;
    
            header("location: home.php");
            $_SESSION["login"] = true;

        } else {
            $err = "Your Email or Password is invalid";
            $_SESSION["login"] = false;
        }



    }
    ?>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <h1>Login</h1>
            <div class="form-group">
                <label> Email</label><input type="text" name=email>
            </div>
            <div class="form-group">
                <label>Password</label><input type="password" name="password"><br>
            </div>
            <div class="submit">
                <input type="submit" value="Login">
            </div>
            <span><br>
                <?php
                echo ($err);
                ?>
            </span>
            <br><br> Don't have account click<a href="index.php"> Register</a>

        </form>
    </div>

</body>

</html>