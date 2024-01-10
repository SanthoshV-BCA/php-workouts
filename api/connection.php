<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbanme = "tutorial";
$conn = new mysqli($servername, $username, $password, $dbanme);
if (!$conn) {
    die("could not connect ");
}

?>