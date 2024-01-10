<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Content-Type:application/json");
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
// print_r($uri);
// $array = [];
if ($method == "POST" && $uri == '/santhosh/gridtextview/read/index.php') {
    include "../connection.php";
    $sql = "SELECT * FROM register";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            // $response['name'] = $row['name'];
            $array[] = array("id" => $row['id'], "name" => $row['name'], "phone" => $row['phone'], "email" => $row['email'], "password" => $row['password'], "gender" => $row['gender']);
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