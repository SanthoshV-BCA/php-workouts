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
            cursor: pointer;
            color: white;
            font-size: 20px;
            border: 1px solid gray;
            border-radius: 5px;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;

        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: black;
            color: white;
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


    $email = $_POST["email"];
    $password = $_POST["password"];
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbanme = "tutorial";
    $conn = new mysqli($servername, $username, $password, $dbanme);
    if (!$conn) {
        die("could not connect ");
    }
    $sql = "SELECT * FROM register";
    $result = $conn->query($sql);
    ?>
    <h1>This is Home Page</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>phone</th><th>email</th><th>password</th><th>gender</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . " </td>" . "<td>" . $row["phone"] . "</td><td>" . $row["email"] . " </td><td>" . $row["password"] . " </td><td>" . $row["gender"] . " </td></tr>";
        }
        echo "</table>";
    } else {
        echo "no result found";
    }

    $conn->close();

    ?>

    <a href="<?php echo "?logout=1" ?>">

        <button>LOGOUT</button>
    </a>

</body>

</html>