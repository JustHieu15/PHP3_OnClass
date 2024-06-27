<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController as UserController;

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

Route::get('/list-user', [UserController::class, 'showUser']);
//Slug
// http://127.0.0.1:8000/listUser

Route::get('get-user/{id}/{name?}', [UserController::class, 'getUser']);
//Slug
//http://127.0.0.1:8000/get-user/1

Route::get('/update-user', [UserController::class, 'updateUser']);
//Param
//http://127.0.0.1:8000/update-user?id=1&name=hieu

Route::get('/info', [UserController::class, 'info']);

Route::get('/test', function () {

});
