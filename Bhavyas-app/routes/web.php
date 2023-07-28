<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichs
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/product/{name?}',[UserProductController::class, 'docall']);

Route::get('/bhavya', function () {
    return 'welcome bhavya';
});
//Route::get('/product', function () {
//    return view('fruits');
//});
Route::fallback(function () {
    return "Page not found";
});
Route::get('/vyas/{name?}/{age?}', function (String $name='Vyas',$age=3) {
    return 'Handsome '.$name ." ". 'His age is' . $age;
});
