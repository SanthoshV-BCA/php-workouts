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
    <title>Home</title>
    <style>
        img {
            width: 200px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 200px;
            border-radius: 5px;
            margin-right: 20px;
            margin-bottom: 20px;
            /* display: flex; */
            /* flex-direction: column; */
            /* flex-wrap: wrap; */

        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        img {
            border-radius: 5px 5px 0 0;
        }

        .container {
            padding: 2px 16px;
            /* width: 100%; */
            /* margin: auto; */
        }

        .main {
            display: flex;
            width: 100%;
            justify-content: center;
            flex-wrap: wrap;
        }

        h1 {
            text-align: center;
        }

        h4 {
            text-align: center;
        }

        p {
            font-size: 80%;
            text-align: center;
            /* width: 20%; */
        }

        .btn {
            background-color: red;
            padding: 5px;
            color: white;
            font-size: 17px;
            text-decoration: none;
            border: 1px solid black;
            border-radius: 5px;
        }

        @media screen and (max-width:1150px) {
            /* .main {
                width: 80%;
                margin: auto;
            } */
        }

        @media screen and (max-width:830px) {
            p {
                font-size: 70%;
            }
        }

        @media screen and (max-width:768px) {
            p {
                font-size: 90%;
            }

            img {
                /* width: 300px; */
            }

            .main {
                width: 90%;
                margin: auto
            }

            .card {
                width: 200px;
            }

        }

        @media screen and (max-width:590px) {
            p {
                /* font-size: 65%; */
            }
        }

        @media screen and (max-width:425px) {
            .main {
                flex-direction: column;
                justify-content: center;
                align-items: center;
                flex-wrap: nowrap;
            }

            p {
                font-size: 90%;
            }

            .card {
                width: 200px;
            }

        }
    </style>
</head>

<body>
    <h1>User Details</h1>
    <?php
    if ($_GET['logout']) {
        session_start();
        session_destroy();
        header("location: login.php");
    }

    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbanme = "tutorial";
    $conn = new mysqli($servername, $username, $password, $dbanme);
    if (!$conn) {
        die("could not connect ");
    }
    $result = mysqli_query($conn, "SELECT Name,Email,profile FROM card");
    if ($result->num_rows > 0) {
        echo "<div class=main>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class=card><img src=" . $row['profile'] . "><div class=container><h4><b>" . $row["Name"] . "</h4></b><p>" . $row["Email"] . "</p></div></div>";
        }
        echo ("</div>");
    } else {
        echo ("no result found");
    }



    // if ($result->num_rows > 0) {
    //     echo "<table><tr><th>Name</th><th>Email</th><th>Image</th></tr>";
    //     while ($row = $result->fetch_assoc()) {
    //         echo "<tr><td>" . $row['Name'] . "</td><td>" . $row["Email"] . "</td><td><img src=" . $row["profile"] . "></td></tr>";
    //     }
    //     echo ("</table>");
    // } else {
    
    //     echo ("no result found");
    // }
    

    ?>
    <!-- <a href="viewrecord.php">view record</a> -->
    <a class="btn" href="<?php echo "?logout=1" ?>">Logout</a>
</body>

</html>