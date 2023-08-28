<form id="editUser" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="editname" class="form-label"> Name</label>
    <br/>
    <input type="hidden" id="editid" name="editid">
    <input type="text" id="editname"  name="editname" class="form-control" placeholder="Your name.." required>
    <div id="erroreditname" class="text-danger"></div>
    <br/>
    <label for="editemail" class="form-label">Email</label>
    <br/>
    <input type="email" id="editemail" name="editemail" class="form-control"
           placeholder="Enter Email Address" required>
    <div id="erroreditemail" class="text-danger"></div>
    <br/>
    <label for="Phone" class="form-label">{{config('ui.phone')}}</label>
    <br/>
    <input type="text" id="editphone" name="editphone"  class="form-control"
           placeholder="Your valid number" required>
    <div id="erroreditphone" class="text-danger"></div>
    <br/>
    <label for="Photo" class="form-label">Photos</label>
    <br/>
    <input type="file" id="editphoto" name="editphoto"  class="form-control"
           placeholder=file required>
    <img id="editimage"  src="initial-image.jpg" alt="Image">
    <div id="erroreditphoto" class="text-danger"></div>
</form>


<script>


    $("#editphoto").on("change", function(e) {
        var inputFile = e.target.files[0];
        if (inputFile) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#editimage").attr("src", e.target.result);
            };

            reader.readAsDataURL(inputFile);
        }
    });
</script>
