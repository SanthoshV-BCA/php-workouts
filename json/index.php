<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // include "connection.php";
    
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     // $sql = "DELETE FROM `card` WHERE `id`='$id'";
    //     $name = $_POST["name"];
    //     $email = $_POST["email"];
    //     $phone = $_POST["phone"];
    //     $gender = $_POST["gender"];
    //     $sql = "insert into register (name,phone,email,password,gender) values ('$name','$phone','$email','$gender')";
    //     $result = $conn->query($sql);
    //     if ($result == true) {
    //         $response['status'] = true;
    //     }
    

    // $myarray = array("name" => $name, "email" => $email, "phone" => $phone, "password" => $password);
    // print_r($myarray);
    
    // echo ("<br><b>JSON encode:</b> ");
    
    // $encode = json_encode($myarray);
    // echo $encode;
    
    // echo ("<br><b>JSON decode:</b> ");
    // $decode = json_decode($encode);
    // print_r($decode);
    
    // $wordsArray = array();
    // while ($row = $sql->fetch_assoc()) {
    //     $wordsArray[$row['chinese']] = $row['english'];
    // }
    // }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <!-- Name:
        <input type="text" name="name"><br>
        email: -->
        <input type="text" name="email"><br>
        <!-- Phone
        <input type="text" name="phone"><br>
        password
        <input type="text" name="gender"><br> -->
        <!-- <a type="submit" href="?email=">click</a> -->

        <input type="submit" value="Register">
    </form>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        // header("location: api")
        $url = "http://localhost/santhosh/json/api.php" . $email;

        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client); 

        $result = json_decode($response);

        echo "<table>";
        echo "<tr><td>name:</td><td>$result->name</td></tr>";
        echo "<tr><td>email</td><td>$result->email</td></tr>";
        echo "<tr><td>phone:</td><td>$result->phone</td></tr>";
        echo "<tr><td>gender:</td><td>$result->gender</td></tr>";
        echo "</table>";
    }
    ?>

</body>

</html>