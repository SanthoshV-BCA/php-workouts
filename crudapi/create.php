<?php
include('connection.php');
function insert_data()
{

    ini_set("display_errors", 1);
    $posts = array();
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $phone_no = $_REQUEST['phone_no'];

    $sql = "INSERT INTO students(first_name, last_name, phone_no) VALUES ('$first_name' , '$last_name', '$phone_no)";
    // sql query to insert values in the table
    $query = mysql_query($$sql);

    if ($query) {
        $posts['response'] = array("success" => "1", "msg" => "Inserted Successfully");
    } else {
        $posts['response'] = array("success" => "0", "msg" => "Not Inserted");
    }
    echo json_encode($posts);
}
?>