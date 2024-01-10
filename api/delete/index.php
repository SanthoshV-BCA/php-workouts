<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'];
if ($method == "GET" && $uri == '/santhosh/api/delete/index.php?id=' . $id) {
    include("../connection.php");
    $id = $_GET['id'];


    $sql = "UPDATE `register` SET `del`='deleted' WHERE id='$id'";

    $result = $conn->query($sql);
    if ($result == TRUE) {

        $Err = "deleted successfully.";
        $response['status'] = $Err;

        $json_response = json_encode($response);
        echo $json_response;
        // session_start();
        // session_destroy();
        // header('Location:  login.php');

    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}
?>