<?php

use App\Http\Controllers\GenderController;
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
    return view('welcome'); //welcome is the file in the views folder
});

Route::get('/users', function () {
    return view('user.index');
});

Route::get('/users/add', function () {
    return view('user.add');
});

Route::get('/genders', [GenderController::class, 'index']);
Route::get('/gender/create', [GenderController::class, 'create']);
Route::get('/gender/view/{id}', [GenderController::class, 'show']);
Route::post('/gender/edit/{id}', [GenderController::class, 'edit']);


Route::post('/gender/store', [GenderController::class, 'store']);
Route::post('/gender/update/{gender}', [GenderController::class, 'update']);



