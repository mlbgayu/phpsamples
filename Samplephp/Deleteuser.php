<?php

$user_id =  $_GET['id'];

$servername = "localhost";
$username = "mlb";
$dbpassword = "admin123";
$dbname="mlb";
$conn = mysqli_connect($servername, $username, $dbpassword,$dbname);
$users="delete from  users where user_id = $user_id";
$result=$conn->query($users);
$conn->close();
header("Location: /Samplephp/Users.php");


?>