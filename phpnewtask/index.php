<?php
session_start();
if ($_SESSION["name"] == true) {
    header("Location: home.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sample login</title>
</head>

<body>
    <?php

    $a = "admin";
    $username = $_POST["username"];
    $password = $_POST["password"];
    // if ($_SESSION['name'] != false) {
    

    //     header('Location: home.php');
    // }
    // $_SESSION["name"] = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($username == $a && $password == $a) {

            header("Location: home.php");
            $_SESSION["name"] = true;
        } else {
            echo ("please check username and password");
            $_SESSION["name"] = false;
        }





    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <h1>Login</h1>
        User Name
        <input type="text" name="username"><br>
        password
        <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>