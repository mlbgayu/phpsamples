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
  <h2>Registration Form </h2>
  <form action="Userregistration.php"  class="needs-validation" novalidate oninput='customPasswordValidation()' method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="name" class="form-label"> Name</label>
      <br/>
      <input type="text" id="name" name="name" class="form-control" placeholder="Your name.." required>
      <div class="valid-feedback"> valid.</div>
      <div class="invalid-feedback">please fill this out. </div>
      <br/>
    <div class="mb-3 mt-3">
      <label for="Email Address" class="form-label">Email Address</label>
      <br/>
      <input type="email" id="emailaddress" name="emailaddress" class="form-control"
             placeholder="Enter Email Address" required>
      <div class="valid-feedback">valid.</div>
      <div class="invalid-feedback"><br/>Please include @ and . in the email address.</div>
    </div>
    <div class="mb-3">
      <label for="Password" class="form-label">Password</label>
      <br/>
      <input type="password" id="password"  class="form-control"
             placeholder="password" name="password" required>
      <div class="valid-feedback">valid.</div>
      <div class="invalid-feedback">Please fill out password.</div>
    </div>
    <div class="mb-3">
      <label for="confirmpassword" class="form-label">Confirm Password</label>
      <br/>
      <input type="password" id="confirmpassword" class="form-control"
             placeholder="confirm password" name="confirmpassword" required>
      <div class="valid-feedback">valid.</div>
      <div class="invalid-feedback">please fill out this field.</div>
    </div>
    <div class="mb-3">
      <label for="Upload Photo" class="form-label">Upload Photo</label>
      <br/>
      <input type="file" id="uploadphoto" name="uploadphoto"  class="form-control"
             placeholder=file required>
      <div class="valid-feedback">valid.</div>
      <div class="invalid-feedback">Upload a File to continue.</div>
      <br>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

</div>
  </main>
  <script src="form-validation.js"></script>
</body>
</html>
