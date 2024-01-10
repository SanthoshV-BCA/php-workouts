<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "connection.php";
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM `card` WHERE `id`='$id'";
    // $sql = "UPDATE `card` SET `del`='0' WHERE `id`='$id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record deleted successfully.";
        session_destroy();
        header('Location:  login.php');
        // header('Location: viewrecord.php');

    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;

    }
}

?>