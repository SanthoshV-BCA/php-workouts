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
if ($method == "POST" && $uri == "/santhosh/apitableview/update/index.php?id=" . $update_id) {


    // if (isset($_GET['id'])) {
    $update_id = $_GET['id'];
    $sql = "SELECT * from register WHERE id=" . $update_id;

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            while ($row = $result->fetch_assoc()) {

                $update_name = $row['name'];
                $update_email = $row['email'];
                $update_password = $row['password'];
                $update_phone = $row['phone'];
                $update_gender = $row['gender'];
                // session_start();
                // $_SESSION['name'] = $update_name;
                // $_SESSION['email'] = $update_email;
                // $_SESSION['phone'] = $update_phone;
                // $_SESSION['password'] = $update_password;
                // $_SESSION['gender'] = $update_gender;

            }
        } else {
            $response['error'] = "no result found";
            $json_response = json_encode($response);
            echo $json_response;
        }
    } else {
        $response['error'] = "unable to run sql query";
        $json_response = json_encode($response);
        echo $json_response;

    }
    $str_json = file_get_contents('php://input');
    // echo ('name');

    $decode = json_decode($str_json, true);

    // echo $decode['name'];
    $Err = "";
    $phonereg = "/^[0-9]{10}$/";
    $namereg = "/[0-9]/";
    $emailreg = "/[a-z0-9_.]+\@([a-z])+\.([a-z])/";
    $passwordreg = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*](?=.*[0-9])).{6,30}/";
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    // $password = $_POST['password'];
    // $gender = $_POST['gender'];
    $name = $decode['name'];
    // print_r($name);
    $email = $decode['email'];
    $phone = $decode['phone'];
    $password = $decode['password'];
    $gender = $decode['gender'];
    $corr = true;
    if ($decode["name"] == "") {
        $Err = "name is required";
        // $stat = "failure";
        $corr = false;

    } elseif (preg_match($namereg, $decode['name'])) {
        $Err = "please enter valid name";
        // $firstname = $_POST["firstname"];
        // $stat = "failure";
        $corr = false;
    }
    //   else {
    //     $firstname = $_POST["firstname"];
    //     $statt = "success";
    //   }
    elseif ($decode["phone"] == "") {
        $Err = "Phone is required";
        // $stat = "failure";
        // $phone = $_POST["phone"];
        $corr = false;

    } elseif (!preg_match($phonereg, $decode["phone"])) {
        $Err = "Enter valid phone number";
        // $stat = "failure";
        // $phone = $_POST["phone"];
        $corr = false;
    }
    //    else {
    //     $phone = $_POST["phone"];
    //     $statt = "success";
    //   }
    elseif ($decode["email"] == "") {
        $Err = "Email is required";
        // $stat = "failure";
        // $email = $_POST["email"];
        $corr = false;

    } elseif (!preg_match($emailreg, $decode["email"])) {
        $Err = "please enter valid mail";
        // $stat = "failure";
        // $email = $_POST["email"];
        $conn = false;
    }
    //   else {
    //     $email = $_POST["email"];
    //     $statt = "success";

    //   }
    elseif ($decode["password"] == "") {
        $Err = "password is required";
        // $stat = "failure";
        // $password = $_POST["password"];
        $corr = false;


    }
    // elseif (!preg_match($passwordreg, $decode["password"])) {
    //     $Err = "please enter caps, small, number and special char";
    //     // $stat = "failure";
    //     // $password = $_POST["password"];
    //     $corr = false;

    // }
    //   else {
    //     $password = $_POST["password"];
    //     $statt = "success";
    //   }
    elseif ($decode["gender"] == "") {
        $Err = "gender is required";
        // $statt = "failure";
        $corr = false;

        // $gender2 = $_POST["male"];
    }
    // $response['error'] = $Err;
    // $json_response = json_encode($response);
    // echo $json_response;
    //  $Err = ($nameErr . " " . $phoneErr . " " . $emailErr . " " . $passErr . " " . $gendererr);

    if ($corr == true) {
        // include "../connection.php";
        // $sql1 = "UPDATE `register` SET `name`='$name' em WHERE `id`='$update_id'";
        if ($name != $update_name) {

            $sql1 = "UPDATE `register` SET `name`='$name' WHERE `id`='$update_id'";
            mysqli_query($conn, $sql1);
            $response['name'] = $name;
        } else {
            $response['name'] = $update_name;
        }
        if ($email != $update_email) {
            $sql1 = "UPDATE `register` SET `email`='$email' WHERE `id`='$update_id'";
            mysqli_query($conn, $sql1);
            $response['email'] = $email;
        } else {
            $response['email'] = $update_email;
        }
        if ($phone != $update_phone) {
            $sql1 = "UPDATE `register` SET `phone`='$phone' WHERE `id`='$update_id'";
            mysqli_query($conn, $sql1);
            $response['phone'] = $phone;
        } else {
            $response['phone'] = $update_phone;
        }
        if ($password != $update_password) {
            $sql1 = "UPDATE `register` SET `password`='$password' WHERE `id`='$update_id'";
            mysqli_query($conn, $sql1);
            $response['password'] = $password;
        } else {
            $response['password'] = $update_password;
        }
        if ($gender != $update_gender) {
            $sql1 = "UPDATE `register` SET `gender`='$gender' WHERE `id`='$update_id'";
            mysqli_query($conn, $sql1);
            $response['gender'] = $gender;
        } else {
            $response['gender'] = $update_gender;
        }
        $json_response = json_encode($response);
        echo $json_response;
    } else {
        $response['error'] = "end";
        $json_response = json_encode($response);
        echo $json_response;
    }
    // echo "done";

    // }

} else {
    $response['error'] = "url or method wrong";
    $json_response = json_encode($response);
    echo $json_response;
}


?>