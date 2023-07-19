<?php
$name = $_REQUEST["name"];
$email = $_REQUEST["emailaddress"];
$password =$_REQUEST["password"];
$confirmpassword =$_REQUEST["confirmpassword"];
$sex=$_REQUEST["sex"];
$age=$_REQUEST["age"];
$targetDir = "C:\\xampp\\htdocs\\Samplephp\\img\\";
$file =  basename($_FILES["uploadphoto"]["name"]);
$srcFile = $_FILES["uploadphoto"]["tmp_name"];
$fileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
$newfile=$name . "_" . uniqid() . "." . $fileType;
$target_file=$targetDir . $newfile;
if($fileType == "jpg" || $fileType == "png" || $fileType == "jpeg"
|| $fileType == "gif" ) {
       move_uploaded_file($srcFile, $target_file);
}
$servername = "localhost";
$username = "mlb";
$dbpassword = "admin123";
$dbname="mlb";
$conn = mysqli_connect($servername, $username, $dbpassword,$dbname);
$sql = "SELECT count(*) as CNT FROM users where email='$email'";
$result = $conn->query($sql);
$count=0;
while($row = $result->fetch_assoc()) {
       $count= $row["CNT"] ;
}
if ($count > 0){
       echo "<div style='color: red;'>The user with $email already exist.</div>";
}else{
       $target_file = addslashes($target_file);
       $insertsql= "insert into users(name,email,password,sex,age,file) value('$name','$email','$password','$sex','$age','$target_file')";
       $result=$conn->query($insertsql);
       echo "<div style='color: green'>The user  profile has been successfully created.</div>";
}
$conn->close();
header("Location: /Samplephp/Users.php");










































































































