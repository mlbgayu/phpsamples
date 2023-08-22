<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Validator;
class EmployeeController extends Controller
{
    public function index()
    {

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Aan email must contain @ and . symbol',
            'image.required' => 'A image must be of jpeg, jpg or png',
        ];
    }


    public function insertUser(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employee,email',
            'phone' => 'required|string|size:10',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        try {
            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $fileName, 'public'); // Store the file in the "uploads" directory
                /*Perform insertion*/
                DB::table('employee')->insert([
                    ['photo' => $fileName, 'name' => $name, 'email' => $email, 'phone' => $phone],
                ]);
            }

            $employee = DB::table('employee')->get();
            return view('employee.employeetable', compact('employee'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function readUser(Request $request)
    {
        try {
            $employee = DB::table('employees')->paginate(5);
            return view('user', compact('employee'));

//            $perPage = 10; // Change this to your desired number of items per page
//            $employee = DB::table('employees')->paginate($perPage);
//
//            return view('employee.employeetable', compact('employee'));


        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function paginateEmployee(Request $request)
    {
        try {
//            $employee = DB::table('employees')->paginate(5);
//            return view('user', compact('employee'));

            $perPage = 10; // Change this to your desired number of items per page
            $employee = DB::table('employees')->paginate($perPage);

            return view('employee.employeetable', compact('employee'));


        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function updateUser(Request $request)
    {
        $validated = $request->validate([

            'editname' => 'required|string|max:255',
            'editemail' => 'required|email|unique:employee,email',
            'editphone' => 'required|string|size:10',
            'editphoto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        try {
            $name = $request->input('editname');
            $email = $request->input('editemail');
            $phone = $request->input('editphone');
            $id = $request->input('editid');
            if ($request->hasFile('editphoto')) {
                $file = $request->file('editphoto');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $fileName, 'public'); // Store the file in the "uploads" directory
                /*Perform Update*/
                DB::table('employees')
                    ->where('id', $id)
                    ->update(['photo' => $fileName, 'name' => $name, 'email' => $email, 'phone' => $phone]);
            } else {
                /*Perform Update*/
                DB::table('employee')
                    ->where('id', $id)
                    ->update(['name' => $name, 'email' => $email, 'phone' => $phone]);

            }
            $employee = DB::table('employees')->get();
            return view('employee.employeetable', compact('employee'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function deleteUser(Request $request)
    {
        try {
            $id = $request->input('deleteid');
            /*Perform insertion*/
            DB::table('employee')
                ->where('id', $id)
                ->delete();
            $employee = DB::table('employees')->get();
            return view('employee.employeetable', compact('employee'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }
}
