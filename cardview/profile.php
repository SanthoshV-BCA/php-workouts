<?php
session_start();
if ($_SESSION['id'] == "") {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <style>
        .container {
            width: 75%;
            margin: auto;
            padding: 1% 0;
            display: flex;
            justify-content: space-between;

        }

        .nav {
            background-color: #4000ff;
            /* display: inline; */
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #F0F0F0;
        }

        label {
            font-size: 30px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: white;
            /* display: inline; */
        }

        .title {
            width: 50%;
        }

        .left {
            width: 30%;
            display: flex;
            align-items: center;
            /* justify-content: space-between; */
        }

        h1 {
            text-align: center;
        }

        ul {
            /* display: inline; */
            float: right;
            width: 100%;
        }

        li {
            color: white;
            display: inline;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 100%;
            /* padding: 2%; */
            /* float: right; */
            margin-right: 5%;
            /* border-right: 1px solid white; */
        }

        li:hover {
            background-color: white;
            color: black;
        }

        ul li a:hover {
            background-color: white;
            color: black;
        }

        a {
            padding: 2%;
            color: white;
            text-decoration: none;
        }

        .images {
            width: 50%;
            /* background-color: #45b39d; */
            margin-left: 1%;
            display: flex;
        }

        .text {
            width: 53%;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            /* text-align: center; */
            background-color: #4000ff;
            padding: 5%;
            border-radius: 5px;
            border: 2px solid black;
            color: white;
            /* border-left: 5px solid white; */
        }

        img {

            width: 95%;
            border: 2px solid black;
            border-radius: 5px;

        }

        .subtext {
            margin: 4%;
        }

        h2 {
            padding: 3%;

            color: #cb4335;

        }

        span {
            color: white;
        }

        /* .email {
            font-size: 20px;
        } */
    </style>
</head>

<body>
    <?php
    session_start();
    if ($_GET['logout']) {
        session_destroy();
        header('Location:  login.php');
    }
    ?>
    <div class="nav">
        <div class="container">
            <div class="title">
                <label>User Profile</label>
            </div>
            <div class="left">
                <ul>

                    <li><a href="update.php?id=<?php echo $_SESSION['id']; ?>">Update</a></li>
                    <li><a href="softdelete.php?id=<?php echo $_SESSION['id']; ?>">Delete</a></li>
                    <li><a href="<?php echo "?logout=1" ?>">Logout</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="images">
            <img src="<?php echo $_SESSION['profile'] ?>">
        </div>

        <div class="text">
            <h1>Your details</h1>
            <div class="subtext">
                <h2><span>Name: </span>
                    <?php echo $_SESSION['name']; ?>
                </h2>
                <h2 class="email"><span>Email: </span>
                    <?php echo $_SESSION['email']; ?>
                </h2>
                <h2><span>password:</span>
                    <?php echo $_SESSION['password']; ?>
                </h2>
            </div>

        </div>
    </div>

</body>

</html>