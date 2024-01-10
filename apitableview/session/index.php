<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

header("Content-Type: application/json");
// build a PHP variable from JSON sent using POST method
// $v = json_decode(stripslashes(file_get_contents("php://input")));
// echo json_encode($v);
include "../connection.php";
$update_id = $_GET['id'];
if ($method == "POST" && $uri == "/santhosh/apitableview/session/index.php?id=" . $update_id) {


    // if (isset($_GET['id'])) {
    $update_id = $_GET['id'];
    $sql = "SELECT * from register WHERE id=" . $update_id;

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            while ($row = $result->fetch_assoc()) {

                $update['name'] = $row['name'];
                $update['email'] = $row['email'];
                $update['password'] = $row['password'];
                $update['phone'] = $row['phone'];
                $update['gender'] = $row['gender'];
                // $response['error'] = "unable to run sql query";
                $json_response = json_encode($update);
                echo $json_response;
                // session_start();
                // $_SESSION['name'] = $update_name;
                // $_SESSION['email'] = $update_email;
                // $_SESSION['phone'] = $update_phone;
                // $_SESSION['password'] = $update_password;
                // $_SESSION['gender'] = $update_gender;


            }
        }
    }
} else {
    $response['error'] = "unable to run sql query";
    $json_response = json_encode($response);
    echo $json_response;
}
?>