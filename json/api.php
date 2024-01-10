<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Content-Type:application/json");
$uri = $_SERVER['REQUEST_URI'];

if (isset($_GET['email'])) {
    include('connection.php');
    $email = $_GET['email'];
    // $result = mysqli_query(
    //     $conn,
    //     "SELECT * FROM `register` WHERE email=$email"
    // );
    $sql = "SELECT * FROM `register` WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result) {
        // $row = mysqli_fetch_array($result);
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            // $email = $row['email'];
            $phone = $row['phone'];
            $gender = $row['gender'];
            response($name, $email, $phone, $gender);
            mysqli_close($conn);
        }
    } else {
        echo ("No Record Found");
        response(NULL, NULL, 200, "No result Found");
    }
} else {
    echo ("Invalid Request");
    response(NULL, NULL, 200, "No Record Found");
}

function response($name, $email, $phone, $gender)
{
    $response['name'] = $name;
    $response['email'] = $email;
    $response['phone'] = $phone;
    $response['gender'] = $gender;

    $json_response = json_encode($response);
    echo $json_response;
}
?>