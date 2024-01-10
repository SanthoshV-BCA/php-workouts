<?php
session_start();
if ($_SESSION['adminname'] == "") {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view record</title>
    <style>
        h1 {
            text-align: center;
        }

        img {
            width: 50px;
            height: 50px;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 85%;
            margin: auto;
        }

        thead {
            background-color: black;
            color: white;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .ed {
            padding: 5px 20px;
            background-color: blue;
            color: white;
            text-decoration: none;
            border-radius: 5px;


        }

        .del {
            padding: 5px 20px;
            background-color: #d92626;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .del:hover {
            background-color: red;
        }

        .sdel {
            padding: 5px 20px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .gdel {
            padding: 5px 20px;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn {
            padding: 5px 20px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    include "connection.php";
    $sql = "SELECT * FROM card WHERE del='active'";

    $result = $conn->query($sql);
    ?>
    <h1>view record</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>

                    <th>email</th>
                    <th>password</th>
                    <th>profile</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                <?php
                session_start();
                if ($_GET['logout']) {
                    session_destroy();
                    header('Location:  login.php');
                }
                if ($_GET['action']) {
                    $myid = $_GET['action'];
                    $sqls = "UPDATE `card` SET `del`='active' WHERE `id`='$myid'";
                    $results = $conn->query($sqls);
                    if ($results) {
                        $error = "record inserted successfuly";
                        $_SESSION["profile"] = $filename;
                        header("location: viewrecord.php");
                    }
                    // header('Location:  login.php');
                }
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        // echo $row['profile'];
                
                        ?>
                        <tr>

                            <td>
                                <?php echo $row['id']; ?>
                            </td>

                            <td>
                                <?php echo $row['Name']; ?>
                            </td>

                            <td>
                                <?php echo $row['Email']; ?>
                            </td>

                            <td>
                                <?php echo $row['password']; ?>
                            </td>


                            <td>
                                <?php echo "<img src=" . $row['profile'] . ">"; ?>
                            </td>
                            <td>
                                <?php echo $row['del']; ?>
                            </td>
                            <td><a class="ed" href="adminupdate.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="del"
                                    href="adminsoftdelete.php?id=<?php echo $row['id']; ?>">Soft Delete</a>&nbsp;<a class="sdel"
                                    href="admindelete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php }

                }

                ?>
            </tbody>
        </table>
        <?php
        $sqldel = "SELECT * FROM card WHERE del='deleted'";

        $resultdel = $conn->query($sqldel);
        ?>
        <h1>deleted record</h1>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>password</th>
                        <th>profile</th>
                        <th>Status</th>
                        <th>Action</th>
                </thead>
                <tbody>
                    <?php


                    if ($resultdel->num_rows > 0) {

                        while ($rowdel = $resultdel->fetch_assoc()) {

                            // echo $row['profile'];
                    
                            ?>
                            <tr>

                                <td>
                                    <?php echo $rowdel['id']; ?>
                                </td>

                                <td>
                                    <?php echo $rowdel['Name']; ?>
                                </td>
                                <td>
                                    <?php echo $rowdel['Email']; ?>
                                </td>
                                <td>
                                    <?php echo $rowdel['password']; ?>
                                </td>
                                <td>
                                    <?php echo "<img src=" . $rowdel['profile'] . ">"; ?>
                                </td>
                                <td>

                                    <?php echo $rowdel['del']; ?>
                                </td>
                                <td>
                                    <a class="gdel" href="<?php echo "?action=" . $rowdel['id'] ?>">Reactive</a>

                                </td>
                            </tr>
                        <?php }

                    }

                    ?>
                </tbody>
            </table>

            <br><br>
            <a class="btn" href="<?php echo "?logout=1" ?>">Logout</a>
        </div>

</body>

</html>