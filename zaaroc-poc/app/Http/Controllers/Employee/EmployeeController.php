<?php

namespace App\Http\Controllers\Employee;

use App\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Validator;
class EmployeeController extends Controller
{

    public function index()
    {

    }




    public function insertUser(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
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
                DB::table('employees')->insert([
                    ['photo' => $fileName, 'name' => $name, 'email' => $email, 'phone' => $phone],
                ]);
                $record = DB::table('employees')
                    ->where('email', $email)->first();
                $id = $record->id;
                $user = [ 'name' => $name, 'email' => $email, 'phone' => $phone];
                Helper::redis_set($id,json_encode($user));
            }

            $employee = DB::table('employees')->paginate(10);


            return view('employee.employeetable', compact('employee'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function readUser(Request $request)
    {
        try {
            $employee = DB::table('employees')->paginate(10);
            return view('user', compact('employee'));

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function paginateEmployee(Request $request)
    {
        try {
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
            'editemail' => 'required|email',
            'editphone' => 'required|string|size:10',
            //'editphoto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        try {
            $name = $request->input('editname');
            $email = $request->input('editemail');
            $phone = $request->input('editphone');
            $id = $request->input('editid');
            $user = ['name' => $name, 'email' => $email, 'phone' => $phone];
            if ($request->hasFile('editphoto')) {
                $file = $request->file('editphoto');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $fileName, 'public'); // Store the file in the "uploads" directory
                /*Perform Update*/
                $user = ['photo' => $fileName, 'name' => $name, 'email' => $email, 'phone' => $phone];
                DB::table('employees')
                    ->where('id', $id)
                    ->update($user);
            } else {
                /*Perform Update*/
                DB::table('employees')
                    ->where('id', $id)
                    ->update($user);
            }
            Helper::redis_set($id,json_encode($user));
            $employee = DB::table('employees')->paginate(10);
            return view('employee.employeetable', compact('employee'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function readUpdateUser(Request $request)
    {
        $jsondata = $request->json()->all();
        $redisKey = $jsondata['userid'];
        if(!Redis::exists($redisKey)){

            $record = DB::table('employees')->where('id', $redisKey)->first();

            $result = [
                'id'=>$record->id,
                'name'=>$record->name,
                'email'=>$record->email,
                'phone'=>$record->phone

            ];
            Helper::redis_set($redisKey,json_encode($result));
        }
        $emp =  Helper::redis_get($redisKey);
        return json_decode($emp);

    }

        public function deleteUser(Request $request)
    {
        try {
            $id = $request->input('deleteid');
            /*Perform insertion*/
            DB::table('employees')
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
