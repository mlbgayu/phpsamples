<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $employee = DB::table('employees')->get();
    return view('home', compact('employee'));
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/addemployee',[EmployeeController::class,'insertUser'])->name('employee.insertuser');
Route::post('/editemployee',[EmployeeController::class,'updateUser'])->name('employee.updateUser');
Route::post('/deleteemployee',[EmployeeController::class,'deleteUser'])->name('employee.deleteuser');
Route::get('/reademployee', [EmployeeController::class, 'readUser'])->middleware(['auth', 'verified'])->name('employee.readUser');
Route::get('/paginateemployee', [EmployeeController::class, 'paginateemployee']);

require __DIR__.'/auth.php';
