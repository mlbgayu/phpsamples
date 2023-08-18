<form id="editUser" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="editname" class="form-label"> Name</label>
    <br/>
    <input type="hidden" id="editid" name="editid">
    <input type="text" id="editname"  name="editname" class="form-control" placeholder="Your name.." required>
    <div class="valid-feedback"> valid.</div>
    <div class="invalid-feedback">please fill this out. </div>
    <br/>
    <label for="editemail" class="form-label">Email</label>
    <br/>
    <input type="email" id="editemail" name="editemail" class="form-control"
           placeholder="Enter Email Address" required>
    <div class="valid-feedback">valid.</div>
    <div class="invalid-feedback"><br/>Please include @ and . in the email address.</div>
    <br/>
    <label for="Phone" class="form-label">Phone</label>
    <br/>
    <input type="text" id="editphone" name="editphone"  class="form-control"
           placeholder="Your valid number" required>
    <div class="valid-feedback">valid.</div>
    <div class="invalid-feedback">Invalid phone number.</div>
    <br/>
    <label for="Photo" class="form-label">Photos</label>
    <br/>
    <input type="file" id="editphoto" name="editphoto"  class="form-control"
           placeholder=file required>
    <img id="editimage" src="initial-image.jpg" alt="Image">
    <div class="valid-feedback">valid.</div>
    <div class="invalid-feedback">Upload a File to continue.</div>
</form>


