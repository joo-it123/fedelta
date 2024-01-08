<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;

use App\Http\Controllers\Auth\ForgotPasswordController;


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
    return redirect()->route('login'); // ログインページにリダイレクト
});

Route::middleware(['auth'])->group(function () {
    Route::get('index', [PostsController::class, 'index'])->name('posts.index');
    
   
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});



// require __DIR__.'/auth.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




    Route::get('hello', [PostsController::class, 'hello']);

    Route::get('index', [PostsController::class, 'index']);

    Route::get('index', [PostsController::class, 'in'])->name('posts.in');

    Route::get('/create-form', [PostsController::class, 'createForm']);

    Route::post('post/create', [PostsController::class, 'create']);

    Route::get('post/{id}/update-form', [PostsController::class, 'updateForm']);

    Route::post('post/update', [PostsController::class, 'update']);

    Route::get('post/{id}/delete', [PostsController::class, 'delete']);
    

// password/reset ルートの名前を変更
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset.custom');

// password.request ルートの名前を変更
Route::get('forgot-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request.custom');

// password/email ルートの名前を変更
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email.custom');
Auth::routes();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
