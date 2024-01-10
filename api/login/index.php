<?php
// session_start();
// if ($_SESSION['login'] == true) {
//     header("location: ../home.html");
// } else {
//     header("locarion: ../register.html");
// }
$uri = $_SERVER['REQUEST_URI'];
// echo $uri;
$method = $_SERVER['REQUEST_METHOD'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// echo "runing";
$emailget = $_GET['email'];
$passwordget = $_GET['password'];
// echo $emailget;
if ($method == "GET" && $uri == '/santhosh/api/login/index.php?email=' . $emailget . '&password=' . $passwordget) {
    // $Err = NIL;
    // $value = $_REQUEST['value'];
    $emailget = $_GET['email'];
    $passwordget = $_GET['password'];
    $phonereg = "/^[0-9]{10}$/";
    $namereg = "/[0-9]/";
    $emailreg = "/[a-z0-9_.]+\@([a-z])+\.([a-z])/";
    $passwordreg = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*](?=.*[0-9])).{6,30}/";

    $corr = true;
    $Err = "";
    if ($emailget == "") {
        $Err = "Email is required";
        // $stat = "failure";
        // $email = $_POST["email"];
        $corr = false;

    } elseif (!preg_match($emailreg, $emailget)) {
        $Err = "please enter valid mail";
        // $stat = "failure";
        // $email = $_POST["email"];
        $conn = false;
    } elseif ($passwordget == "") {
        $Err = "password is required";
        // $stat = "failure";
        // $password = $_POST["password"];
        $corr = false;


    }
    if ($corr == false) {
        $response['error'] = $Err;
        $json_response = json_encode($response);
        echo $json_response;
    }
    // $myemail = $emailget;
    // $mypassword = $passwordget;
    if ($corr == true) {
        include('../connection.php');
        $sql = "SELECT * FROM `register` WHERE (email='$emailget' and password='$passwordget')";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        session_start();
        $_SESSION['login'] = true;

        if ($count == 1) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $phone = $row['phone'];
                $email = $row['email'];
                $password = $row['password'];
                $gender = $row['gender'];
            }
            // echo "login  succesful";
            $response['id'] = $id;
            $response['name'] = $name;
            $response['email'] = $email;
            $response['phone'] = $phone;
            $response['gender'] = $gender;
            $response['sessions']=$_SESSION['login'];
            // $response['error'] = $Err;
            $json_response = json_encode($response);
            echo $json_response;
        } else {
            $_SESSION['login'] = false;
            // echo $emailget;
            $Err = "Your Email or Password is invalid";

            $response['error'] = $Err;
            $json_response = json_encode($response);
            echo $json_response;
        }
    }
}
// if($method=="POST")
?>