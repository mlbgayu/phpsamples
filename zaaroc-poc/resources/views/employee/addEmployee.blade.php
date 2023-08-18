<form id="insertUser" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name" class="form-label"> Name</label>
    <br/>
    <input type="text" id="name" name="name" class="form-control" placeholder="Your name.." required>
    <div class="valid-feedback"> valid.</div>
    <div class="invalid-feedback">please fill this out. </div>
    <br/>
    <label for="email" class="form-label">Email</label>
    <br/>
    <input type="email" id="email" name="email" class="form-control"
           placeholder="Enter Email Address" required>
    <div class="valid-feedback">valid.</div>
    <div class="invalid-feedback"><br/>Please include @ and . in the email address.</div>
    <br/>
    <label for="Phone" class="form-label">Phone</label>
    <br/>
    <input type="text" id="phone" name="phone"  class="form-control"
           placeholder="Your valid number" required>
    <div class="valid-feedback">valid.</div>
    <div class="invalid-feedback">Invalid phone number.</div>
    <br/>
    <label for="Photo" class="form-label">Photos</label>
    <br/>
    <input type="file" id="photo" name="photo"  class="form-control"
           placeholder=file required>
    <div class="valid-feedback">valid.</div>
    <div class="invalid-feedback">Upload a File to continue.</div>

</form>

