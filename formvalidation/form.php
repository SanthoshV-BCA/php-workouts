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
$name = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$sql = 'INSERT into register' . "(uname,email, password) " . "VALUES('$name','$email','$pass')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>