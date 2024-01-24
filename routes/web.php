<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

require __DIR__.'/auth.php';
