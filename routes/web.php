<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
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
})->name('top');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('post',[PostController::class,'index'])->name('post.index'); //投稿一覧ページ
Route::get('post/create',[PostController::class,'create'])->name('post.create'); //新規投稿表示
Route::post('post',[PostController::class,'store'])->name('post.store'); //新規投稿実行
Route::get('post/{post}',[PostController::class,'show'])->name('post.show'); //投稿個別表示

//新規登録
Route::get('signup',[RegisterController::class,'showRegistrationForm'])->name('signup'); //新規登録表示
Route::post('signup',[RegisterController::class,'register'])->name('signup.post'); //新規登録実行

//ログイン・ログアウト
Route::get('login',[LoginController::class,'showLoginForm'])->name('login'); //ログイン画面表示
Route::post('login',[LoginController::class,'login'])->name('login.post'); //ログイン実行
Route::get('logout',[LoginController::class,'logout'])->name('logout'); //ログアウト実行

