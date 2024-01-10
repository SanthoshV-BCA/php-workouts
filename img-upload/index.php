<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $result = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbanme = "tutorial";
        $conn = new mysqli($servername, $username, $password, $dbanme);
        if (!$conn) {
            die("could not connect ");
        }
        $filename = $_FILES["upload"]["name"];
        $tempname = $_FILES["upload"]["tmp_name"];
        $folder = "images/" . $filename;
        $sql = "INSERT INTO file (img) VALUES ('$folder')";
        mysqli_query($conn, $sql);
        if (move_uploaded_file($tempname, $folder)) {
            echo "image uploded  successfuly";
        } else {
            echo "img not uploed";
        }
        $result = mysqli_query($conn, "SELECT * FROM file");
        if ($result->num_rows > 0) {
            echo "<table><tr><th>image</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td><img src=" . $folder . "></td></tr>";
            }
            echo "</table>";
        } else {
            echo "no result found";

        }

    }





    // error_reporting(0);
    
    // >
    
    // php
    
    // $msg = ""; 
    
    // // check if the user has clicked the button "UPLOAD" 
    
    // if (isset($_POST['uploadfile'])) {
    
    //     $filename = $_FILES["choosefile"]["name"];
    
    //     $tempname = $_FILES["choosefile"]["tmp_name"];  
    
    //         $folder = "image/".$filename;   
    
    //     // connect with the database
    
    //     $db = mysqli_connect("localhost", "root", "", "Image_Upload"); 
    
    //         // query to insert the submitted data
    
    //         $sql = "INSERT INTO image (filename) VALUES ('$filename')";
    
    //         // function to execute above query
    
    //         mysqli_query($db, $sql);       
    
    //         // Add the image to the "image" folder"
    
    //         if (move_uploaded_file($tempname, $folder)) {
    
    //             $msg = "Image uploaded successfully";
    
    //         }else{
    
    //             $msg = "Failed to upload image";
    
    //     }
    
    // }
    
    // $result = mysqli_query($db, "SELECT * FROM image");
    

    ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="file" name="upload">
        <input type="submit" value="upload">
        <?php
        // echo $result;
        ?>

    </form>
    <img src="\opt\lampp\htdocs\avatar2.png" alt="imglocal">

</body>

</html>