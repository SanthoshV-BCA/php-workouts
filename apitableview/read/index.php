<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin (not suitable for production)
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Allow the specified HTTP methods
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); // Allow the specified headers
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Content-Type:application/json");
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
// print_r($uri);
// $array = [];
if ($method == "GET" && $uri == '/santhosh/apitableview/read/index.php') {
    include "../connection.php";
    $sql = "SELECT * FROM register WHERE del='active'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            // $response['name'] = $row['name'];
            $array[] = array("id" => $row['id'], "name" => $row['name'], "phone" => $row['phone'], "email" => $row['email'], "password" => $row['password'], "gender" => $row['gender'], "status" => $row['del']);
            // $array[] = array("name" => $row['name']);
            // $array[] = array("phone" => $row['phone']);
            // $array[] = array("email" => $row['email']);
            // $array[] = array("password" => $row['password']);
            // $array[] = array("gender" => $row['gender']);

        }
    }
    $json_response = json_encode($array);
    echo $json_response;
} else {
    $msg = "not runing0;";
    $json_response = json_encode($msg);
    echo $json_response;
}
