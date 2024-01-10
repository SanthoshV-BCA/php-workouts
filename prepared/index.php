<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "tutorial";
$conn = new mysqli($servername, $username, $password, $databasename);
if (!$conn) {
    die("unable to connect");
}
$a = $conn->prepare("INSERT INTO prepared (name,email,phone) VALUES (?,?,?)");
$a->bind_param("ssi", $name, $email, $phone);
$name = "santhosh";
$email = "santhosh@gmail.com";
$phone = 7894561230;
$a->execute();
$name = "ram";
$email = "santhosh@gmail.com";
$phone = 7894561230;
$a->execute();
$name = "deepan";
$email = "santhosh@gmail.com";
$phone = 7894561230;
$a->execute();
echo "record inserted successfuly";
$a->close();
$conn->close();

?>