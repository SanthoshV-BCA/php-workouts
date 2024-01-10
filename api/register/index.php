<?php
header("Content-Type:application/json");
$uri = $_SERVER['REQUEST_URI'];
// echo $uri;
$method = $_SERVER['REQUEST_METHOD'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// echo "runing";
if ($method == "POST" && $uri == '/santhosh/api/register/') {
    $nameErr = $passErr = $phoneErr = $gendererr = $emailErr = "";
    include('../connection.php');
    $phonereg = "/^[0-9]{10}$/";
    $namereg = "/[0-9]/";
    $emailreg = "/[a-z0-9_.]+\@([a-z])+\.([a-z])/";
    $passwordreg = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*](?=.*[0-9])).{6,30}/";




    $corr = true;
    // global $conn;
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    if ($_POST["name"] == "") {
        $nameErr = "name is required";


    } elseif (preg_match($namereg, $_POST["name"])) {
        $nameErr = "please enter valid name";

        $corr = false;
    }



    if ($_POST["phone"] == "") {
        $phoneErr = "Phone is required";

        $corr = false;

    } elseif (!preg_match($phonereg, $_POST["phone"])) {
        $phoneErr = "Enter valid phone number";
        // $stat = "failure";
        // $phone = $_POST["phone"];
        $corr = false;
    }
    //    else {
    //     $phone = $_POST["phone"];
    //     $statt = "success";
    //   }

    if ($_POST["email"] == "") {
        $emailErr = "Email is required";
        // $stat = "failure";
        // $email = $_POST["email"];
        $corr = false;

    } elseif (!preg_match($emailreg, $_POST["email"])) {
        $emailErr = "please enter valid mail";
        // $stat = "failure";
        // $email = $_POST["email"];
        $conn = false;
    }
    //   else {
    //     $email = $_POST["email"];
    //     $statt = "success";

    //   }
    if ($_POST["password"] == "") {
        $passErr = "password is required";
        // $stat = "failure";
        // $password = $_POST["password"];
        $corr = false;


    } elseif (!preg_match($passwordreg, $_POST["password"])) {
        $passErr = "please enter caps, small, number and special char";
        // $stat = "failure";
        // $password = $_POST["password"];
        $corr = false;

    }
    //   else {
    //     $password = $_POST["password"];
    //     $statt = "success";
    //   }

    if ($_POST["gender"] == "") {
        $gendererr = "gender is required";
        // $statt = "failure";
        $corr = false;

        // $gender2 = $_POST["male"];
    }
    //    elseif ($_POST["male"] == "male") {
    //     $gender = "checked";
    //     $gender1 = "";

    //   }

    if ($corr == true) {
        // include('../connection.php');
        $sql = "INSERT into register (name,phone,email,password,gender) VALUES ('$name','$phone','$email','$password','$gender')";
        $result = $conn->query($sql);
        // $result = mysqli_query($conn, $sql);
        if ($result) {
            $msg = "record inserted succesfuly";
            // function response($name, $email, $phone, $gender)
            // {
            $last_id = $conn->insert_id;
            $response['message'] = $msg;
            $response['name'] = $name;
            $response['email'] = $email;
            $response['phone'] = $phone;
            $response['gender'] = $gender;
            $response['id'] = $last_id;

            $json_response = json_encode($response);
            echo $json_response;
            // }
            // response($name, $email, $phone, $gender);
        } else {
            echo ("No Record not inserted");
            // response(NULL, NULL, 200, "No result Found");


        }
    } else {
        // $Err = ($nameErr . " " . $phoneErr . " " . $emailErr . " " . $passErr . " " . $gendererr);
        $Err = array('nameError' => $nameErr, 'phoneErr' => $phoneErr, 'emailErr' => $emailErr, 'paswordErr' => $passErr, 'genderErr' => $gendererr);
        $response['error'] = $Err;
        $json_response = json_encode($response);
        echo $json_response;
    }

} else {
    $msg = "invalid request";
    $response['message'] = $msg;
    $json_response = json_encode($response);
    echo $json_response;
}


// echo "this is login page";
?>
