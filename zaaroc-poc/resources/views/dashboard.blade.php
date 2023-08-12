<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <script>
            $(function() {
                $('#users').DataTable();
            });
        </script>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <table id="users" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Title</th>
                            <th>Salary</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                        $users=DB::table('users')->get();
                        foreach ($users as $user){
                         ?>
                    <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><?php  echo $user->name; ?></td>
                        <td><?php  echo $user->email; ?></td>
                        <td><?php  echo $user->age; ?></td>
                        <td><?php  echo $user->title; ?></td>
                        <td><?php  echo $user->salary; ?></td>
                        <td><?php  echo $user->created_at; ?></td>
                    </tr>

                    <?php
                        }
                    ?>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
