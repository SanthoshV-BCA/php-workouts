<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            background-color: black;
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

        .form-group1 input {
            margin: 5px;
            width: 95%;
            background-color: white;
            padding: 6px;
            border: 1px solid gray;
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

        a {
            text-decoration: none;
        }

        .noerror {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $name = $nameErr = $email = $emailErr = $password = $passErr = $uploadErr = "";
    $msg = "";
    $record = "";
    $record1 = "";
    $phonereg = "/^[0-9]{10}$/";
    $namereg = "/[0-9]/";
    $emailreg = "/[a-z0-9_.]+\@([a-z])+\.([a-z])/";
    $passwordreg = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*](?=.*[0-9])).{6,30}/";
    $corr = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbanme = "tutorial";
        $conn = new mysqli($servername, $username, $password, $dbanme);
        if (!$conn) {
            die("could not connect ");
        }
        //   check if the email is there or not
        $myemail = $_POST['email'];
        $checkemail = "SELECT Email FROM card WHERE `Email`='$myemail'";
        $correct = $conn->query($checkemail);
        $counts = mysqli_num_rows($correct);
        if ($counts == 1) {
            $emailErr = "this email already registered";
            $email = $_POST["email"];
            $conn = false;
        }

        if ($_POST["name"] == "") {
            $nameErr = "name is required";

            $corr = false;

        } elseif (preg_match($namereg, $_POST["firstname"])) {
            $nameErr = "please enter valid name";
            $name = $_POST["name"];

            $corr = false;
        } else {
            $name = $_POST["name"];

        }
        if ($_POST["email"] == "") {
            $emailErr = "Email is required";

            $email = $_POST["email"];
            $corr = false;

        } elseif (!preg_match($emailreg, $_POST["email"])) {
            $emailErr = "please enter valid mail";

            $email = $_POST["email"];
            $conn = false;

        } else {
            $email = $_POST["email"];


        }
        if ($_POST["password"] == "") {
            $passErr = "password is required";

            $password = $_POST["password"];
            $corr = false;


        } elseif (!preg_match($passwordreg, $_POST["password"])) {
            $passErr = "please enter caps, small, number and special char";
            $stat = "failure";
            $password = $_POST["password"];
            $corr = false;
        } else {
            $password = $_POST["password"];

        }
        if ($_POST["upload"]["tmp_name"] == "") {
            $uploadErr = "profile is required";
        }
        // if ($_POST["upload"] == "") {
        //     $uploadErr = "profile is required";
        //     $upload = $_POST["upload"];
        //     $corr = false;
        // } else {
        //     $upload = $_POST["upload"];
        // }
    
        if ($corr == true) {
            // $servername = "localhost:3306";
            // $username = "root";
            // $password = "";
            // $dbanme = "tutorial";
            // $conn = new mysqli($servername, $username, $password, $dbanme);
            // if (!$conn) {
            //     die("could not connect ");
            // }
    
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $filename = $_FILES["upload"]["name"];
            $tempname = $_FILES["upload"]["tmp_name"];
            $folder = "images/" . $name;
            if (move_uploaded_file($tempname, $folder)) {
                // $msg = "image uploded  successfuly";
                $sql = 'INSERT into card' . "(name,email,password,profile,del) " . "VALUES('$name','$email','$password','$folder','active')";
                if (mysqli_query($conn, $sql)) {
                    $record = "Registered successful";
                } else {
                    $record1 = "Error: " . $sql . "<br>" . mysqli_error($conn);

                }
            } else {
                // $msg = "img not trasferred";
                $msg = "something went wrong registeration failed";
            }
        }

    }
    ?>
    <div class="container">
        <form method="post" enctype="multipart/form-data"
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <h1>Register</h1>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" value="<?= $name; ?>" placeholder="Enter Your Name"><br>
                <span class="error">
                    <?php echo $nameErr; ?>
                </span>
            </div>
            <div class="form-group">
                <label> Email:</label>
                <input type="text" name="email" placeholder="Enter your Email" value="<?= $email; ?>"><br>
                <span class="error">
                    <?php echo $emailErr; ?>
                </span>
            </div>
            <div class="form-group">
                <label> Password:</label>
                <input type="text" name="password" placeholder="Enter your Password" value="<?= $password; ?>"><br>
                <span class="error">
                    <?php echo $passErr; ?>
                </span>
            </div>
            <div class="form-group1">
                <label>Upload Profile</label>
                <br><input type="file" value="<?= $upload; ?>" name="upload"><br>
                <span class="error">
                    <?php echo $uploadErr ?>
                </span>
            </div>
            <div class="submit">
                <input type="submit" value="Register">
                <span class="noerror">
                    <?php echo $record ?>
                </span><br>
                <span class="error">
                    <?php echo $msg . " " . $record1; ?>
                </span>

            </div><br><br>
            already have a account click <a href="login.php">Login</a>
        </form>
    </div>
</body>

</html>