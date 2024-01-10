<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update user details</title>
    <style>
        body {
            background-color: white;
        }

        .container {
            width: 40%;
            margin: 5% auto;
            background-color: bisque;
            padding: 4%;
            border-radius: 10px;
            /* text-align: center; */
        }


        h1 {
            text-align: center;
            color: black;
            font-size: 40px;
        }

        label {
            margin: 5px;
            color: black;
            font-size: 20px;
            font-weight: 500;
            font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
        }

        .form-group input {
            margin: 5px;
            width: 95%;
            padding: 6px;
        }

        .submit input {
            cursor: pointer;
            width: 99%;
            margin: 0 auto;
            padding: 6px;
            color: white;
            background-color: black;
            margin-top: 5px;
            font-size: 20px;
            border: none;
            border-radius: 5px;
        }

        .form-group1 input {
            margin: 5px;
            width: 95%;
            background-color: white;
            padding: 6px;
            border: 1px solid gray;
        }
    </style>
</head>

<body>
    <?php
    global $update_profile;
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include "connection.php";
    $update_id = $update_email = $update_name = $error = $update_password = "";
    if (isset($_GET['id'])) {
        $update_id = $_GET['id'];
        $sql = "SELECT * from card where id=" . $update_id;
        $result = $conn->query($sql);
        // print_r($result1);
        // echo "hello";
        if ($result) {

            while ($row = $result->fetch_assoc()) {

                $update_name = $row['Name'];
                $update_email = $row['Email'];
                $update_password = $row['password'];
                $update_profile = $row['profile'];
                $upda_id = $row['id'];


            }
        }

    }
    // print_r($upda_id);
    if (isset($_POST["update"])) {
        $newpath = __DIR__ . "/delimg/";
        echo $newpath;
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $filepath = "images/";
        $filename = $filepath . basename($_FILES["upload"]["name"]);
        $tempname = $_FILES["upload"]["tmp_name"];
        $folder = "images/" . $filename;
        $status = true;
        $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // move_uploaded_file($tempname, $folder);
    
        echo $update_password;
        // move_uploaded_file($update_profile, $newpath);
        // move_uploaded_file($_FILES["upload"]["tmp_name"],)
        //   move_uploaded_file($update_profile, $newpath);
        // $status = true;
        // } else {
        //     $status = false;
        // }
        // echo "file already exists.";
    

        // if ($_FILES["upload"]["size"] > 2097152) {
        //     echo "your file is larger than 2MB";
        //     $status = false;
        // } else {
        //     if (move_uploaded_file($_FILES["upload"]["tmp_name"], $filename)) {
        //         echo "file transfrred successfuly";
        //     }
    

        // }
        $sql = "UPDATE `card` SET `Name`='$name',`Email`='$email',`password`='$password' WHERE `id`='$id'";
        $result = $conn->query($sql);
        if ($result) {
            $error = "record inserted successfuly";
            session_start();
            $_SESSION["name"] = $name;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;


            header("location: profile.php");
        } else {
            $error = "unable to update data" . $sql . $conn->error;
        }
        if ($_FILES["upload"]["tmp_name"] == "") {
            // $filename = $_SESSION["photo"];
            // $filename = $update_profile;
    
        } else {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $filename)) {
                echo "file transfrred successfuly";
                // ,`profile`='$filename'
                $sqls = "UPDATE `card` SET `profile`='$filename' WHERE `id`='$id'";
                $results = $conn->query($sqls);
                if ($results) {
                    $error = "record inserted successfuly";
                    $_SESSION["profile"] = $filename;
                    header("location: profile.php");
                } else {
                    $error = "unable to update data" . $sql . $conn->error;
                }
            } else {
                echo "file not transfrred";
            }
        }


    }

    ?>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
            enctype="multipart/form-data">
            <h1>update details</h1>
            <div class="form-group">
                <label>Name:</label>
                <input type="hidden" name="id" value="<?= $upda_id; ?>">
                <input type="text" name="name" value="<?= $update_name; ?>" placeholder="Enter Your Name"><br>

            </div>
            <div class="form-group">
                <label> Email:</label>
                <input type="text" name="email" placeholder="Enter your Email" value="<?= $update_email; ?>"><br>
                <!-- <span class="error">
                    <echo $emailErr; 
                </span> -->
            </div>
            <div class="form-group">
                <label> Password: </label>
                <input type="text" name="password" placeholder="Enter your Password"
                    value="<?= $update_password; ?>"><br>

            </div>
            <div class="form-group1">
                <label>Upload Profile</label>
                <!-- <img src="<?= $update_profile; ?>" alt=""> -->
                <br><input type="file" value="" name="upload"><br>

            </div>
            <div class="submit">
                <input type="submit" name="update" value="Update">
                <span class="error">
                    <?php echo $error; ?>
                </span>
            </div>
        </form>
    </div>

</body>

</html>