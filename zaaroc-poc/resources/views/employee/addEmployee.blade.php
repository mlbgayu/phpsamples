<form id="insertUser" method="POST" enctype="multipart/form-data">
    @csrf

    <!--Name-->
    <label for="name" class="form-label"> Name</label>
    <br/>
    <input type="text" id="name" name="name" class="form-control" placeholder="Your name.." required>
    <div id="erroraddname" class="text-danger"></div>
    <br/>


    <!--Email-->
    <label for="email" class="form-label">Email</label>
    <br/>
    <input type="email" id="email" name="email" class="form-control"
           placeholder="Enter Email Address" required>
    <div id="erroraddemail" class="text-danger"></div>
    <br/>

    <!--Phone-->
    <label for="Phone" class="form-label">{{config('ui.phone')}}</label>
    <br/>
    <input type="text" id="phone" name="phone"  class="form-control"
           placeholder="Your valid number" required>
    <div id="erroraddphone" class="text-danger"></div>


    <!--Photo Upload-->
    <br/>
    <label for="Photo" class="form-label">Photos</label>
    <br/>
    <input type="file" id="photo" name="photo"  class="form-control"
           placeholder=file required>
    <img id="addimage"  src="initial-image.jpg" alt="Image">
    <div id="erroraddphoto" class="text-danger"></div>

    <!-- Error Message-->


</form>
<script>


    $("#photo").on("change", function(e) {
        var inputFile = e.target.files[0];
        if (inputFile) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#addimage").attr("src", e.target.result);
            };

            reader.readAsDataURL(inputFile);
        }
    });
</script>

