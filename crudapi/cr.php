<?php
include('connection.php');
$uri = $_SERVER['REQUEST_URI'];
if ($_SERVER["REQUEST_METHOD"] == 'POST' && $uri == 'http://localhost/santhosh/crudapi/design.html') {
    $first_name = $_REQUEST["first_name"];
    $last_name = $_REQUEST["last_name"];
    $phone_no = $_REQUEST["phone_no"];
    $query = "INSERT INTO students (`first_name`,`last_name`,`phone_no`)   VALUES('$first_name','$last_name','$phone_no')";
    $result = $conn->query($query);
    if ($result == 1) {
        $data["message"] = "data saved successfully";
        $data["status"] = "Ok";
    } else {
        $data["message"] = "data not saved successfully";
        $data["status"] = "error";
    }
} else {
    $data["message"] = "Format not supported";
    $data["status"] = "error";
}
echo json_encode($data);