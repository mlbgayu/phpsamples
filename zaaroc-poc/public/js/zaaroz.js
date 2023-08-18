$(document).ready(function() {

    $("#deleteEditUser").on('click', function () {
        var formData = new FormData($("#deleteUser")[0]);
        var myModal = $("#deleteUserModal");
        var modal = bootstrap.Modal.getInstance(myModal);
        let tr = $(this).closest('tr');
        var id = tr.find('td:eq(1)').text();
        // ajax query
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "deleteemployee",  // URL to which the data will be sent
            method: "POST",     // Use the POST method
            data: formData,
            processData: false,
            contentType: false,
            datatype: "Json",
            success: function (response) {
                $("#userTable").html(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
        modal.hide();

    });

        $("#saveEditUser").on('click', function () {
        var formData = new FormData($("#editUser")[0]);
        var myModal = $("#editUserModal");
        var modal = bootstrap.Modal.getInstance(myModal);
        // ajax query
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "editemployee",  // URL to which the data will be sent
            method: "POST",     // Use the POST method
            data: formData,
            processData: false,
            contentType: false,
            datatype: "Json",
            success: function (response) {
                $("#userTable").html(response);
             },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
        modal.hide();

    });


    $("#saveAddUser").on('click', function () {

        var formData = new FormData($("#insertUser")[0]);
        var myModal = $("#addUserModal");
        var modal = bootstrap.Modal.getInstance(myModal);
        // ajax query
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "addemployee",  // URL to which the data will be sent
            method: "POST",     // Use the POST method
            data: formData,
            processData: false,
            contentType: false,
            datatype: "Json",
            success: function (response) {
                $("#userTable").html(response);
                // Handle the successful response here
                // console.log(response);
            },
            error: function (xhr, status, error) {
                // Handle errors here
                console.error(error);
            }
        });
        modal.hide();
    });


    $("#editUser").on("click", "button", function() {
        // var $row = $(this).closest("tr");
        // var id = row.find('td:eq(0)').text();
        // var photo = row.find('td:eq(1)').text();
        // var name = row.find('td:eq(2)').text();
        // var email = row.find('td:eq(3)').text();
        // var phone = row.find('td:eq(4)').text();
        //
        // alert(name);
        // $('#editname').val(name);
        //
        // console.log();
        // alert($('#editname').val())
    });

// $("#edituser").on('click',function(){
//     console.log("asas")
//     var formData = new FormData($("#editUser")[0]);
//     var myModal = $("#editUserModal");
//
// });


});
