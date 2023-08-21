<table id="userTable" class="table">
    <thead>
    <tr>
        <th scope="col">Photo</th>
        <th style="visibility:hidden;" scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">{{config('ui.phone')}}</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($employee as $emp)
        <tr>
            <td><img alt="Image" width="50" height="50" class="img-fluid img-thumbnail" src="storage/uploads/{{  $emp->photo }}" >
            </td>
           <td style="visibility:hidden;">{{  $emp->id }}</td>
            <td>{{  $emp->name }}</td>
            <td>{{  $emp->email }}</td>
            <td>{{  $emp->phone }}</td>
            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</button></td>
            <td><button type="button"  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">Delete</button></td>
        </tr>
    @endforeach
    </tbody>
</table>

<script>
    $(document ).on("click","#userTable button.btn-primary",function() {
        let tr = $(this).closest('tr');
        var photo = tr.find('img').attr("src");
        var id = tr.find('td:eq(1)').text();
        var name = tr.find('td:eq(2)').text();
        var email = tr.find('td:eq(3)').text();
        var phone = tr.find('td:eq(4)').text();
         $('#editid').val(id);
        $('#editname').val(name);
        $('#editemail').val(email);
        $('#editphone').val(phone);
        $('#editimage').attr("src", photo);
        $('#erroreditname').text('');
        $('#erroreditemail').text('');
        $('#erroreditphone').text('');
        $('#erroreditphoto').text('');
    });

    $(document ).on("click","#userTable button.btn-danger",function() {
        let tr = $(this).closest('tr');
        var photo = tr.find('img').attr("src");
        var id = tr.find('td:eq(1)').text();
        $('#deleteid').val(id);
    });

</script>





