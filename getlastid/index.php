<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tutorial";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("unable to connect");
}
$sql = "INSERT into prepared (name,email,phone) values ('sample','sample@2002','8520741963')";
if ($conn->query($sql)) {
    $id = $conn->insert_id;
    echo "record inserted successfuly in " . $id;
} else {
    echo "record not inserted";
}

?>