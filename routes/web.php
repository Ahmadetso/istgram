<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
require __DIR__.'/auth.php';

Route::get('/w', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/p/{post:slug}/like', LikesController::class);
Route::get('/explore', [PostController::class,'explore'])->name('explore');
Route::get('/{user:username}',[UserController::class,'index'])->name('user_profile')->middleware('auth');
Route::get('/{user:username}/edit', [UserController::class,'edit'])->name('user_edit')->middleware('auth');
Route::patch('/{user:username}/update', [UserController::class,'update'])->name('user_update')->middleware('auth');

Route::controller(PostController::class)->middleware('auth')->group(function (){
Route::get('/p/create', 'create')->name('create_post');
Route::get('/p/create','create')->name('create_post');
Route::get('/','index')->name('home_page');
Route::post('/p/create','store')->name('store_post');
Route::get('/p/{post:slug}','show')->name('show_post');
Route::get('/p/{post:slug}/edit' ,'edit')->name('post_edit');
Route::patch('/p/{post:slug}/update', 'update')->name('update');
Route::delete('/p/{post:slug}/delete', 'destroy')->name('delete_post');
});
Route::post('/p/{post:slug}/comment',[CommentController::class, 'add'])->name('comment')->middleware('auth');

