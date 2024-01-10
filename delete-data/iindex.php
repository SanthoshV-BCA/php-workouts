<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbanme = "tutorial";
$conn = new mysqli($servername, $username, $password, $dbanme);
if (!$conn) {
    die("could not connect ");

}
$sql = "DELETE from card WHERE id=1";
if (mysqli_query($conn, $sql)) {
    echo ("record deleted");
} else {
    echo ("unable to delete data");
}
mysqli_close($conn);
?>