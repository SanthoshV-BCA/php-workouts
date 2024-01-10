<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
include "../connection.php";
$update_id = $_GET['id'];
if ($method == "POST" && $uri == '/santhosh/api/update/index.php?id=' . $update_id) {
    // if (isset($_GET['id'])) {
    $update_id = $_GET['id'];
    $sql = "SELECT * from register where id=" . $update_id;

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


            }
        } else {
            // echo "no result found";
        }
    }
    $Err = "";
    $phonereg = "/^[0-9]{10}$/";
    $namereg = "/[0-9]/";
    $emailreg = "/[a-z0-9_.]+\@([a-z])+\.([a-z])/";
    $passwordreg = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*](?=.*[0-9])).{6,30}/";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $corr = true;
    if ($_POST["name"] == "") {
        $Err = "name is required";
        // $stat = "failure";
        $corr = false;

    } elseif (preg_match($namereg, $_POST["name"])) {
        $Err = "please enter valid name";
        // $firstname = $_POST["firstname"];
        // $stat = "failure";
        $corr = false;
    }
    //   else {
    //     $firstname = $_POST["firstname"];
    //     $statt = "success";
    //   }
    elseif ($_POST["phone"] == "") {
        $Err = "Phone is required";
        // $stat = "failure";
        // $phone = $_POST["phone"];
        $corr = false;

    } elseif (!preg_match($phonereg, $_POST["phone"])) {
        $Err = "Enter valid phone number";
        // $stat = "failure";
        // $phone = $_POST["phone"];
        $corr = false;
    }
    //    else {
    //     $phone = $_POST["phone"];
    //     $statt = "success";
    //   }
    elseif ($_POST["email"] == "") {
        $Err = "Email is required";
        // $stat = "failure";
        // $email = $_POST["email"];
        $corr = false;

    } elseif (!preg_match($emailreg, $_POST["email"])) {
        $Err = "please enter valid mail";
        // $stat = "failure";
        // $email = $_POST["email"];
        $conn = false;
    }
    //   else {
    //     $email = $_POST["email"];
    //     $statt = "success";

    //   }
    elseif ($_POST["password"] == "") {
        $Err = "password is required";
        // $stat = "failure";
        // $password = $_POST["password"];
        $corr = false;


    } elseif (!preg_match($passwordreg, $_POST["password"])) {
        $Err = "please enter caps, small, number and special char";
        // $stat = "failure";
        // $password = $_POST["password"];
        $corr = false;

    }
    //   else {
    //     $password = $_POST["password"];
    //     $statt = "success";
    //   }
    elseif ($_POST["gender"] == "") {
        $Err = "gender is required";
        // $statt = "failure";
        $corr = false;

        // $gender2 = $_POST["male"];
    }
    //  $Err = ($nameErr . " " . $phoneErr . " " . $emailErr . " " . $passErr . " " . $gendererr);
    $response['error'] = $Err;
    $json_response = json_encode($response);
    echo $json_response;
    if ($corr == true) {
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
    }
    // echo "done";

    // }

} else {
    echo "hello";
}


?>