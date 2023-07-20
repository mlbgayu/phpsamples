<?php
$user_id =  $_GET['id'];
$servername = "localhost";
$username = "mlb";
$dbpassword = "admin123";
$dbname="mlb";
$conn = mysqli_connect($servername, $username, $dbpassword,$dbname);
$selectQuery = "select user_id,name,email,sex,age,file from  users where user_id = $user_id";
$result=$conn->query($selectQuery);
while($row = $result->fetch_assoc()) {
    $user_id = $row["user_id"];
    $name = $row["name"];
    $email = $row["email"];
    $sex = $row["sex"];
    $age = $row["age"];
    $file = $row["file"];
}
?>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function customPasswordValidation(){

            confirmPassword.setCustomValidity(confirmPassword.value != password.value ?  "The Password is not matching with confirm password":"")
        }
    </script>
</head>
<body>
<main role="main">
    <div class="container mt-3 py-3 rounded bg-light">
        <h2>User information</h2>
        <form  class="XXneeds-validation" novalidate oninput='customPasswordValidation()' method="post" enctype="multipart/form-data">

            <div class="mb-3 mt-3">
                <label for="name" class="form-label"> Name</label>

                <input type="text" VALUE="<?php echo $name ?>" id="name" name="name" class="form-control" placeholder="Your name.." required>

                <div class="mb-3 mt-3">
                    <label for="Email Address" class="form-label">Email Address</label>

                    <input type="email" value="<?php echo $email ?>" id="emailaddress" name="emailaddress" class="form-control"
                           placeholder="Enter Email Address" required>
                </div>
                <div class="mb-3>"
                <label for="sex" id="sex" class="form-lable">Sex</label>
                <input type="text" value="<?php echo $sex ?>" id="sex" class="form-control" placeholder="your sex" name="sex" required>

                <div/>
                <div class="mb-3">
                    <label for="age" id="age" class="form-lable">Age</label>

                    <input type="number" value="<?php echo $age ?>" id="age" name="age" class="form-control" placeholder="your age" required>

                </div>
                <div class="mb-3">
                    <label for="Photo" class="form-label">Photo</label>
                    <input type="file" value="<?php echo $file ?>" id="uploadphoto" name="upload photo" class="form-control" placeholder="uploadphotoghere" required>
                    <img style="width: 50px;height: 50px" src="
        <?php echo "img/".basename($file) ?>
        ">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
