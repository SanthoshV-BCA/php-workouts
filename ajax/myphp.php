<?php
include "connection.php";
$sql = "SELECT Name FROM card";
$value = $_REQUEST['value'];
// print_r($value);
$result = $conn->query($sql);
$dum = "";
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $a[] = $row["Name"];

    }
    // print_r($a);
}
if (strlen($value) > 0) {
    // substr($a[$i], 0, strlen($value))
    for ($i = 0; $i < count($a); $i++) {
        if (strtolower($value) == strtolower($a[$i])) {
            // if ($dum == "") {
            $dum = $a[$i];
            // } else {
            // $dum = $a[$i];
            // }

        }
        // else {
        //     $dum = "no result found";
        // }
    }
    // foreach ($a as $name) {
    //     if ($a == $name) {
    //         $dum = $name;
    //     } else {
    //         $dum = "";
    //     }
    // }
    // foreach ($a as $name) {
//     if ($value === $name) {
//         $dum .= $name;

    //     } else {
//         $dum = "";
//     }

}
// if($dum==""){
//     echo"no result forund"
// }
echo ($dum == "") ? "no result found" : $dum;


?>