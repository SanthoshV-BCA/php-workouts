<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>

</head>

<body>
    <?php
    $phonereg = "/[0-9]{10}/";
    $namereg = "/[0-9]/";
    $emailreg = "/[A-Za-z0-9_.]+\@([a-z])+\.([a-z])/";
    $passwordreg = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*](?=.*[0-9])).{6,30}/";
    $stuatus = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["firstname"])) {
            $firstnameErr = "name is required";
            $stuatus = false;

        } elseif (preg_match($namereg, $_POST["firstname"])) {
            $firstnameErr = "please enter valid name";
            $stuatus = false;
        } else {

            $firstname = $_POST["firstname"];

        }



        if (empty($_POST["phone"])) {
            $phoneErr = "Phone is required";
            $stuatus = false;

        } elseif (!preg_match($phonereg, $_POST["phone"])) {
            $phoneErr = "Enter valid phone number";
            $stuatus = false;
        } else {
            $phone = $_POST["phone"];
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $stuatus = false;

        } elseif (!preg_match($emailreg, $_POST["email"])) {
            $emailErr = "please enter valid mail";
            $stuatus = false;
        } else {
            $email = $_POST["email"];

        }
        if (empty($_POST["password"])) {
            $passErr = "password is required";
            $stuatus = false;


        } elseif (!preg_match($passwordreg, $_POST["password"])) {
            $passErr = "please enter caps, small, number and special char";
            $stuatus = false;

        } else {

            $password = $_POST["password"];

        }
        if ($stuatus) {
            $servername = "localhost:3306";
            $hostname = "root";
            $dbpass = "";
            $dbanme = "task";
            $conn = new mysqli($servername, $hostname, $dbpass, $dbanme);
            if (!$conn) {
                die("could not connect");
            }
            $name = $_POST["firstname"];
            $phonee = $_POST["phone"];
            $emaill = $_POST["email"];
            $pass = $_POST["password"];
            $cmd = "INSERT into register (uname,phone,email, password) VALUES('$name','$phonee','$emaill','$pass')";
            if (mysqli_query($conn, $cmd)) {
                echo ("record inserted successfuly");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);


        }




    }


    ?>
    <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <h1>Register</h1>

        <br>Name* : <input type="text" name="firstname" placeholder="Name" value="<?= $firstname; ?>">
        <span class="error">

            <?php echo "<br>" . $firstnameErr; ?>
        </span>


        <br>Phone* : <input type="text" name="phone" placeholder="Please enter your phone" value="<?= $phone; ?>">
        <span class="error">
            <?php echo "<br>" . $phoneErr; ?>
        </span>

        <br>Email-id* : <input type="text" name="email" placeholder="Please enter your Email id" value="<?= $email; ?>">
        <span class="error">
            <?php echo "<br>" . $emailErr; ?>
        </span>
        <br>Password* : <input type="text" name="password" placeholder="Please enter your password"
            value="<?= $password; ?>">
        <span class="error">
            <?php echo "<br>" . $passErr; ?>
        </span>


        <br><input type="submit" name="button" value="submit">


    </form>

</body>

</html>