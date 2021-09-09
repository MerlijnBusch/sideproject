<?php

use Carbon\Carbon;
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
Route::get('/test', function () {
    $bookmark = \App\Models\Bookmark::where('id', 1)->first();
    $test = $bookmark->items()
        ->get()
        ->toArray();

   dd($test);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('profile')->group(function () {
    Route::get('/{name}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
});

Route::prefix('notifications')->group(function () {
    Route::get('/index', [App\Http\Controllers\NotificationController::class, 'index'])->name('notification.index');
});

Route::prefix('bookmark')->group(function () {
    Route::get('/index', [App\Http\Controllers\BookmarkController::class, 'index'])->name('bookmark.index');
    Route::get('/{bookmark}', [App\Http\Controllers\BookmarkController::class, 'bookmarkItems'])->name('bookmark.bookmarkItems');
});


Route::prefix('post')->group(function () {
    Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('/show/{post:uuid}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
    Route::post('/like', [App\Http\Controllers\PostController::class, 'like'])->name('post.like');
    Route::post('/follow/', [App\Http\Controllers\PostController::class, 'follow'])->name('post.follow');

    Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.add');
    Route::post('/reply/store', [App\Http\Controllers\CommentController::class, 'replyStore'])->name('reply.add');
});

Route::prefix('user')->group(function () {
    Route::post('/{user}/follow', [App\Http\Controllers\UserController::class, 'follow'])->name('follow');
    Route::delete('/{user}/unfollow', [App\Http\Controllers\UserController::class, 'unfollow'])->name('unfollow');
});
Route::get('storage/public/post/{user}/{slug}/{post_id}', [App\Http\Controllers\ImageController::class, 'show'])->name('image.show');
