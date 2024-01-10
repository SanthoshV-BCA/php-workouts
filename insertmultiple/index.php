<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$database = "tutorial";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("unable to connect");
}
$sql = "INSERT into prepared (name,email,phone) VALUES ('santhosh','santhosh@gmail.com','7894561230');";
$sql .= "INSERT into prepared (name,email,phone) VALUES ('ram','ram@gmail.com','8457963210');";
$sql .= "INSERT into prepared (name,email,phone) VALUES ('deepanraj','deepan@gmail.com','8529637410');";
if ($conn->multi_query($sql) === true) {
    echo "record inserted successfuly";
} else {
    echo "record not inserted" . $conn->error;
}
?>