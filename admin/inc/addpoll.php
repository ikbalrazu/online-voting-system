<?php

include ('connection.php');

echo $poolname = $_POST['poolname'];

// echo $tagline = $_POST['tagline'];

echo $startdate = $_POST['startdate'];
echo $enddate = $_POST['enddate'];

echo $item = implode(", ", $_POST["name"]);


if ($poolname && $startdate && $enddate && $item) {
    $upostinsert =  mysqli_query($connect, "INSERT INTO poll_data(poll_name,start_date,end_date,choices) VALUES('$poolname ','$startdate','$enddate','$item')");
    header('location: ../pages/addpoll.php?result=addpoll');

}else{
    header('location: ../pages/addpoll.php?result=notaddpoll');
}

