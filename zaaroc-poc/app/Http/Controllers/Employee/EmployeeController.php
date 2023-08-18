<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function index()
    {

    }


    public function insertUser(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $fileName, 'public'); // Store the file in the "uploads" directory
            /*Perform insertion*/
            DB::table('employee')->insert([
                ['photo' => $fileName, 'name' => $name,'email' => $email ,'phone' => $phone],
            ]);
        }

        $employee = DB::table('employee')->get();
        return view('employee.employeetable', compact('employee'));
    }

    public function readUser(Request $request)
    {
        $employee = DB::table('employee')->get();
        return view('user', compact('employee'));
    }


    public function updateUser(Request $request)
    {
        $name = $request->input('editname');
        $email = $request->input('editemail');
        $phone = $request->input('editphone');
        $id = $request->input('editid');
        if ($request->hasFile('editphoto')) {
            $file = $request->file('editphoto');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $fileName, 'public'); // Store the file in the "uploads" directory
           /*Perform Update*/
            Log::debug("Id Govindan".$id);
            DB::table('employee')
                ->where('id', $id)
                ->update(['photo' => $fileName, 'name' => $name,'email' => $email ,'phone' => $phone]);
        }
        else{
            /*Perform Update*/
            Log::debug("Id Govindan".$id);
            DB::table('employee')
                ->where('id', $id)
                ->update( ['name' => $name,'email' => $email ,'phone' => $phone]);

        }
        $employee = DB::table('employee')->get();
        return view('employee.employeetable', compact('employee'));
        return response()->json(['message' => 'No file uploaded.'.$email]);
    }

    public function deleteUser(Request $request)
    {
        $id = $request->input('deleteid');
        /*Perform insertion*/
        DB::table('employee')
                ->where('id', $id)
                ->delete();
            $employee = DB::table('employee')->get();
            return view('employee.employeetable', compact('employee'));
    }
}
