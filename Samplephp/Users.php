<!DOCTYPE html>
<html>
<head>
    <title>USERS Information</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  }
</head>
<body>
<table class="table table-striped"">
  <tr>

    <th>name</th>
    <th>email</th>
    <th>sex</th>
    <th>age</th>
    <th>file</th>
  </tr>
    <?php
    $servername = "localhost";
    $username = "mlb";
    $dbpassword = "admin123";
    $dbname="mlb";
    $conn = mysqli_connect($servername, $username, $dbpassword,$dbname);
    $users="select user_id,name,email,sex,age,file from users";
    $result=$conn->query($users);
    while($row = $result->fetch_assoc()) {
        $user_id1 =$row["user_id"];
    $name1 = $row["name"];
    $email1 = $row["email"];
    $sex1 = $row["sex"];
    $age1 = $row["age"];
    $file1 = $row["file"];
    ?>
  <tr>
    <td><?php echo "$name1" ?></td>
    <td><?php echo "$email1" ?></td>
    <td><?php echo "$sex1" ?></td>
    <td><?php echo "$age1" ;?></td>
    <td><img src="
        <?php echo "img/".basename($file1) ?>
        ">
    </td>
  </tr>
    <?php
 }
 ?>
</table>
</body>
</html>
