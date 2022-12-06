<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


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

Route::get('/doc', function () {
    return view('doc');
});

// /docにgetアクセスがあった場合にTaskControllerのclose関数を実行
Route::get('/close', [TaskController::class,'close']);

Route::get('/portfolio', [TaskController::class,'portfolio']);

Route::resource('tasks', TaskController::class);


