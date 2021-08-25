<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('profile')->group(function () {
    Route::get('/{name}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
});

Route::prefix('post')->group(function () {
    Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('/show/{post:uuid}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

    Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.add');
    Route::post('/reply/store', [App\Http\Controllers\CommentController::class, 'replyStore'])->name('reply.add');
});

Route::get('storage/public/post/{user}/{slug}/{post_id}', [App\Http\Controllers\ImageController::class, 'show'])->name('image.show');
