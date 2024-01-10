<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbanme = "sample1";
$conn = new mysqli($servername, $username, $password, $dbanme);
if (!$conn) {
    die("could not connect ");
}
$sql = "SELECT email,password FROM register";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$em = $row['email'];
$pas = $row['password'];
$email = $_POST["email"];
$passworda = $_POST["password"];
if ($email == $em && $passworda == $pas) {
    echo "login success";
} else {
    echo "username or password wrong";
}


?>