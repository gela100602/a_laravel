<?php

use App\Http\Controllers\GenderController;
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

// Route::get('/', function () {
//     return view('welcome'); //welcome is the file in the views folder
// });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [UserController::class, 'login']);
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginAuth']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::controller(GenderController::class)->group(function () {
        Route::get('/genders', 'index');
        Route::get('/gender/create', 'create');
        Route::get('/gender/view/{id}', 'show');
        Route::get('/gender/edit/{id}', 'edit');
        Route::get('/gender/delete/{id}', 'delete');
    
        Route::post('/gender/store', 'store');
        Route::put('/gender/update/{gender}', 'update');
        Route::delete('/gender/destroy/{gender}', 'destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/home', 'index');
        Route::get('/users', 'index');
        Route::get('/users', 'index')->name('index');
        Route::get('/user/create', 'create');
        Route::get('/user/view/{id}', 'show');
        Route::get('/user/edit/{id}', 'edit');
        Route::get('/user/delete/{id}', 'delete');
    
        Route::post('/user/store', 'store');
        Route::post('/process/logout', 'logout');
    
        Route::put('/user/update/{user}', 'update');
        Route::delete('/user/destroy/{user}', 'destroy');
    });
});






