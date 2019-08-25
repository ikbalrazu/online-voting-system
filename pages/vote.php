<?php
session_start();
include '../inc/connection.php';

$option = $_POST["option"][0];


$poll_id =(int) $_POST["poll_id"];
$date = date("Y/m/d");

if(isset($_SESSION['id']))
$user_id = (int) $_SESSION['id'];
$poll_data = mysqli_query($connect, "insert into vote(user_id,option,poll_id,vote_date) values('$user_id','$option','$poll_id','$date')");

echo "Your vote has been submitted to the system successfully";

if ($option!=$_POST["option"][]) {
    echo "Not submitted"
} else {
    # code...
}

?>