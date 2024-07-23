<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController as UserController;
use App\Http\Controllers\Admin\ProductsController as AdminProductsController;

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

//Route::get('/list-user', [UserController::class, 'showUser']);
//Slug
// http://127.0.0.1:8000/listUser

Route::get('get-user/{id}/{name?}', [UserController::class, 'getUser']);
//Slug
//http://127.0.0.1:8000/get-user/1

Route::get('/update-user', [UserController::class, 'updateUser']);
//Param
//http://127.0.0.1:8000/update-user?id=1&name=hieu

//lab1
Route::get('/info', [UserController::class, 'info']);

Route::get('/test', function () {

});

//Users group
Route::group(['prefix' => 'users' , 'as' => 'users.'], function () {
    Route::get('/list-user', [UserController::class, 'listUser'])->name('listUser');
    Route::get('/add-user', [UserController::class, 'addUser'])->name('addUser');
    Route::post('/create-user', [UserController::class, 'createUser'])->name('createUser');
    Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('editUser');
    Route::post('/update-user/{id}', [UserController::class, 'updateUser'])->name('updateUser');
    Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
});

Route::group(['prefix' => 'products' , 'as' => 'products.'], function () {
    Route::get('/list-products', [ProductsController::class, 'listProduct'])->name('listProduct');
    Route::get('/add-products', [ProductsController::class, 'addProduct'])->name('addProduct');
    Route::post('/create-products', [ProductsController::class, 'createProduct'])->name('createProduct');
    Route::get('/edit-products/{id}', [ProductsController::class, 'editProduct'])->name('editProduct');
    Route::post('/update-products/{id}', [ProductsController::class, 'updateProduct'])->name('updateProduct');
    Route::get('/delete-products/{id}', [ProductsController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('search-products', [ProductsController::class, 'searchProduct'])->name('searchProduct');
});

//Dùng cho việc học template engine (đặt ở UserController)
Route::get('test', [UserController::class, 'test']);

//CRUD using ORM (base url: http://127.0.0.1:8000/admin/products/....)
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', [AdminProductsController::class, 'index'])->name('index');

        Route::get('/add-products', [AdminProductsController::class, 'addProduct'])->name('addProduct');
        Route::post('/create-products', [AdminProductsController::class, 'createProduct'])->name('createProduct');

        Route::get('/edit-products/{id}', [AdminProductsController::class, 'editProduct'])->name('editProduct');
        Route::post('/update-products/{id}', [AdminProductsController::class, 'updateProduct'])->name('updateProduct');

        Route::get('/delete-products/{id}', [AdminProductsController::class, 'deleteProduct'])->name('deleteProduct');
    });
});
