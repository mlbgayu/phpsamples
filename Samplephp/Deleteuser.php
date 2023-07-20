<?php

$user_id =  $_GET['id'];
$servername = "localhost";
$username = "mlb";
$dbpassword = "admin123";
$dbname="mlb";
$conn = mysqli_connect($servername, $username, $dbpassword,$dbname);
$selectQuery = "select file  from  users where user_id = $user_id";
$result=$conn->query($selectQuery);
while($row = $result->fetch_assoc()) {
    $file= $row["file"] ;
    echo $file;
    unlink($file);
}
$deleteQuery="delete from  users where user_id = $user_id";
$result=$conn->query($deleteQuery);
$conn->close();
header("Location: /Samplephp/Users.php");
?>