<?php
$userinfo = array("name" => "santhosh", "city" => "pondy", "email" => "sample@gmail.com");
$encode = json_encode($userinfo);
echo $encode;
echo ("<br>decode<br>");
$decode = json_decode($encode);
echo $decode->name . "<br>";
echo $decode->city . "<br>";
echo $decode->email . "<br>";






// session_start();

// if(isset($_POST['lname']) && isset($_POST['marks'])){        

// $_SESSION['info'][] = array($_POST['lname'] => $_POST['marks']);
// }

// if(isset($_SESSION['info'])) {
// for($i = 0; $i < count($_SESSION['info']); $i++) {
//   foreach($_SESSION['info'][$i] as $name => $marks){
//     echo '<p>' . $name . '<br>';
//     echo $marks . '</p>';
//  }
// } 
// }    



// <form action = "<?php echo $_SERVER['PHP_SELF'];" method = "POST">

// Name:<br>
// <input type = "text" name = "lname"><br><br>
// Marks:<br>
// <input type = "text" name = "marks"><br><br>
// <input type = "submit" value = "Submit">

// </form> -->

?>