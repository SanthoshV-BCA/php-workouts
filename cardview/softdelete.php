<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "connection.php";
if (isset($_GET['id'])) {

    $id = $_GET['id'];


    $sql = "UPDATE `card` SET `del`='deleted' WHERE `id`='$id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Soft deleted successfully.";
        session_start();
        session_destroy();
        header('Location:  login.php');

    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;

    }



}

?>