<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\YourController; // YourController の名前空間を追加
use App\Http\Controllers\AuthController; // AuthController の名前空間を追加

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


// ログイン認証関連のルート
Route::middleware(['auth'])->group(function () {
    // ログアウト
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
});

// その他のルート
Route::get('hello', [PostsController::class, 'hello']);
Route::get('index', [PostsController::class, 'index']);
Route::get('post/{id}/update-form', [PostsController::class, 'updateForm']);
Route::get('/create-form', [PostsController::class, 'createForm']);