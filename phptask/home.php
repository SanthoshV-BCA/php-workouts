<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        button {
            background-color: black;
            width: 10%;
            padding: 1%;
            color: white;
            font-size: 20px;
            border: 1px solid gray;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['login'] == true) {



    } else {
        header('Location: login.php');
    }

    if ($_GET['logout']) {
        session_destroy();
        header('Location:  login.php');
    }
    if ($_GET['logout']) {
        session_destroy();
        header('location: log.php');
    }


   
    ?>
    <h1>This is Home Page</h1>






    <a href="<?php echo "?logout=1" ?>">
        <button>LOGOUT</button></a>
</body>

</html>