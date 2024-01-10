<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Content-Type:application/json");
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
print_r($uri);
if ($method == "POST" && $uri == '/santhosh/api/login/') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    include('connection.php');
    // $email = $_GET['email'];
    // $result = mysqli_query(
    //     $conn,
    //     "SELECT * FROM `register` WHERE email=$email"
    // );
    // $sql = "INSERT into register (name,phone,email,password,gender) VALUES ('santhosh','9486443297','santhosh@gmail.com','Sant@2002','male')";
    $sql = "INSERT into register (name,phone,email,password,gender) VALUES ('$name','$phone','$email','$password','$gender')";
    $result = $conn->query($sql);
    if ($result) {
        // $row = mysqli_fetch_array($result);
        // while ($row = $result->fetch_assoc()) {
        //     $name = $row['name'];
        //     // $email = $row['email'];
        //     $phone = $row['phone'];
        //     $gender = $row['gender'];
        //     response($name, $email, $phone, $gender);
        //     mysqli_close($conn);
        // }
        echo ("record inserted succesfuly");
    } else {
        // echo ("No Record Found");
        // response(NULL, NULL, 200, "No result Found");
        echo "record not inserted";
    }


} else {
    echo ("Invalid Request");
    // response(NULL, NULL, 200, "No Record Found");
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