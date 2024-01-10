<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $phonereg = "/[0-9]{10}/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["firstname"])) {
            $firstnameErr = "First name is required";

        } else {

            $firstname = $_POST["firstname"];
        }



        if (empty($_POST["phone"])) {
            $phoneErr = "Phone is required";

        } elseif (!preg_match($phonereg, $_POST["phone"])) {
            $phoneErr = "Enter valid phone";
        } else {
            $phone = $_POST["phone"];
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";

        } else {
            $email = $_POST["email"];
        }
        if (empty($_POST["password"])) {
            $passErr = "Last name is required";

        } else {

            $password = $_POST["password"];
        }




    }



    ?>
    <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <header>Registration Form</header>

        <br>First Name* : <input type="text" name="firstname" placeholder="First Name" value="<?= $firstname; ?>">

        <?= $firstnameErr; ?>



        <?= $lastnameErr; ?>


        <br>Phone* : <input type="text" name="phone" placeholder="Please enter your phone" value="<?= $phone; ?>">

        <?= $phoneErr; ?>

        <br>Email-id* : <input type="text" name="email" placeholder="Please enter your Email id" value="<?= $email; ?>">

        <?= $emailErr; ?>
        <br>Password : <input type="text" name="emaild" placeholder="Please enter your password"
            value="<?= $password; ?>">
        <?= $passErr; ?>



        <br><input type="submit" name="button">

    </form>
</body>

</html>