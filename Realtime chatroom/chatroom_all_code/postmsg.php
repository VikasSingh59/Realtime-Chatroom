<?php
//connecting to the database
include 'db_connect.php';

$msg = $_POST['text'];
$room = $_POST['room'];
$ip = $_POST['ip'];

$sql = "INSERT INTO `msgs` (`msg`, `room`, `ip`, `stime`) VALUES ('$msg', '$room', '$ip', '2021-07-28 11:53:31.000000');";
mysqli_query($conn, $sql);
mysqli_close($conn);


?>