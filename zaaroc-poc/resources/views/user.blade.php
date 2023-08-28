<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="d-flex justify-content-between mb-3 border p-3 bg-light">
        <p class="h4 text-dark">Users</p>
        <div >


            <!-- Add User Button -->
            <button type="button" id="adduserbutton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                Add Users
            </button>

        </div>
    </div>

    <div id="emplyeetable" class="container-fluid border">
        @include('employee.employeetable')
    </div>
    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>


    {{--Add User  Modal--}}
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="adduserlabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('employee.addEmployee')
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary"  id="saveAddUser" class="btn ">Submit</button>
                </div>
            </div>
        </div>
    </div>
    {{--Edit User  Modal--}}
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="adduserlabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('employee.editEmployee')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  id="saveEditUser" class="btn ">Submit</button>
                </div>
            </div>
        </div>
    </div>
    {{--Delete User  Modal--}}
    <div class="modal fade" id="deleteUserModal" tabindex="-1"
         aria-labelledby="addUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="adduserlabel">Delete User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('employee.deleteEmployee')
                    <p class="text-danger">
                       Are you sure to delete the user. This cant be reverted!!.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  id="deleteEditUser" class="btn ">Delete</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Include your JS file -->
<script src="{{ asset('js/zaaroz.js') }}"></script>
<script src="{{ asset('js/pagination.js') }}"></script>
