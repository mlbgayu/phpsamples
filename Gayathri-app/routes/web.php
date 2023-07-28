<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Using Controller Classes
Route::get('/profile', [ProfileController::class, 'show']);
Route::get('/user', [UserController::class, 'gayathri']);
Route::get('/bablu', [UserController::class, 'bhavya']);
Route::get('/product/{name?}',[productController::class, 'fruits']);

//Using View Method
Route::get('/profile', function () {
    return view('Profile');
});
Route::view('/greeting', 'greeting');
//Using Fallback
Route::fallback(function () {
    return "No page found";
});
//Using Parameterized URL
Route::get('/bhavya/{name?}', function (String $name='bhavya') {
    return 'Hello '.$name;
});
Route::get('/vyas/{name}/gayu/{age?}', function (String $name, int $age=0) {
    return 'Hello '.$name.' , my age is '.$age;
})->where('name', '[A-Za-z]+');
//Using Redirect
Route::redirect('/a', 'bhavya');
//Using Named Route
Route::get('/world', function () {
    return 'Hello World';
})->name("world");
Route::get('/dd', function () {
    return redirect()->route('world');
});
//Using HTTP methods Get,  Post and any
Route::match(['get', 'post','delete'],'/bablu', function () {
    return 'Hello Vyas';
});
Route::any('/bablu', function () {
    return 'Hello Any';
});


