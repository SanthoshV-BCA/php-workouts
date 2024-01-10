<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Content-Type:application/json");
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
// print_r($uri);
// $array = [];




// if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
// $start_from = ($page-1) * $limit; 
$page = $_GET['id'];
// echo $page;
$array = [];
if ($method == "POST" && $uri == '/santhosh/pagination/read/index.php?id=' . $page) {
    $limit = 10;
    $start_from = ($page - 1) * $limit;
    include "../connection.php";
    $sql = "SELECT * FROM register LIMIT $start_from,$limit";
    $result = $conn->query($sql);

    // if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        // $response['name'] = $row['name'];
        $array[] = array("id" => $row['id'], "name" => $row['name'], "phone" => $row['phone'], "email" => $row['email'], "password" => $row['password'], "gender" => $row['gender'], "status" => $row['del']);
        // $array[] = array("name" => $row['name']);
        // $array[] = array("phone" => $row['phone']);
        // $array[] = array("email" => $row['email']);
        // $array[] = array("password" => $row['password']);
        // $array[] = array("gender" => $row['gender']);

    }

    $json_response = json_encode($array);
    echo $json_response;
} else {
    $msg = "not runing0;";
    $json_response = json_encode($msg);
    echo $json_response;
}