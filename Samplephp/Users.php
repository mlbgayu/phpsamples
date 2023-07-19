<!DOCTYPE html>
<html>
<head>
    <title>USERS Information</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<div style="padding: 50px;border: 2px solid">
<table class="table table-striped"">
  <tr>
    <th>User ID</th>
    <th>name</th>
    <th>email</th>
    <th>sex</th>
    <th>age</th>
    <th>file</th>
      <th>Delete</th>
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
    $user_id =$row["user_id"];
    $name = $row["name"];
    $email = $row["email"];
    $sex = $row["sex"];
    $age = $row["age"];
    $file = $row["file"];
    ?>
  <tr>
      <td><?php echo "$user_id" ?></td>
    <td><?php echo "$name" ?></td>
    <td><?php echo "$email" ?></td>
    <td><?php echo "$sex" ?></td>
    <td><?php echo "$age" ;?></td>
    <td><img style="width: 50px;height: 50px" src="
        <?php echo "img/".basename($file) ?>
        ">
    </td>
      <td>
          <button class="btn btn-danger" data-href="/Samplephp/Deleteuser.php?id=<?php echo @$user_id ?>" data-bs-toggle="modal" data-bs-target="#confirm-delete" data-target="#confirm-delete">
              Delete
          </button>
      </td>

  </tr>
    <?php
 }
 ?>
</table>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
            </div>

            <div class="modal-body">
                <p>You are about to delete one User, this procedure is irreversible.</p>
                <p>Do you want to proceed?</p>
                <p class="debug-url"></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok" >Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
    const modal1   =document.getElementById('confirm-delete');
    modal1.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-href')
        var link = modal1.querySelector('.btn-ok')
        link.href=recipient
    });
</script>
</body>
</html>
