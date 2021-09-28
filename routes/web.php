<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/createUser', function () {
    return view('create');
});
Route::get('/deleteUser', function () {
    return view('delete');
});
Route::get('/listUser', [UserController::class,'index']);
Route::get('/editUser/{name}', [UserController::class,'edit']);


Route::post('/login', [UserController::class,'find']);
Route::post('/save', [UserController::class,'store']);
Route::post('/editSave', [UserController::class,'']);
Route::post('/delete', [UserController::class,'destroy']);
