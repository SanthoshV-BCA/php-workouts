<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

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
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>phone</th><th>email</th><th>password</th><th>gender</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . " </td>" . "<td>" . $row["phone"] . "</td><td>" . $row["email"] . " </td><td>" . $row["password"] . " </td><td>" . $row["gender"] . " </td></tr>";
        }
        echo "</table>";
    } else {
        echo "no result found";
    }
  
    if ($_GET["id"]) {
      
        $id = $_GET['id'];
        echo $id;

        $sqll = "DELETE FROM register WHERE `id`=" . $id;
        $results = mysqli_query($conn, $sqll);
        if ($results) {
            echo "delete successfuly". $id;
        } else {
            echo "unabel to delete data";
        }
   
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="text" name="id">
        <!-- <a type="submit" Delete data</a> -->
        <input type="submit" value="delete">
    </form>

</body>

</html>