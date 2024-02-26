<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
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
// Route::get('/',[PostController::class,'index'])->name('post.index'); //トップページ表示
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

//自分の投稿のみ表示
Route::get('post/mypost',[PostController::class,'mypost'])->name('post.mypost');
//自分の返信コメントのみ表示
Route::get('post/mycomment',[PostController::class,'mycomment'])->name('post.mycomment');

Route::get('/',[PostController::class,'index'])->name('post.index'); //投稿一覧ページ
Route::get('post/create',[PostController::class,'create'])->name('post.create'); //新規投稿表示
Route::post('post',[PostController::class,'store'])->name('post.store'); //新規投稿実行
Route::get('post/{post}',[PostController::class,'show'])->name('post.show'); //投稿個別表示
Route::get('post/{post}/edit',[PostController::class,'edit'])->name('post.edit'); //投稿の更新(編集画面表示)
Route::put('post/{post}',[PostController::class,'update'])->name('post.update'); //更新を保存
Route::delete('post/{post}',[PostController::class,'destroy'])->name('post.destroy'); //投稿の削除
//新規登録
Route::get('signup',[RegisterController::class,'showRegistrationForm'])->name('signup'); //新規登録表示
Route::post('signup',[RegisterController::class,'register'])->name('signup.post'); //新規登録実行
//コメント機能
Route::post('post/comment/store',[CommentController::class,'store'])->name('comment.store'); //コメントの保存
Route::get('post/comment/{comment}/edit',[CommentController::class,'edit'])->name('comment.edit'); //コメント編集画面表示
Route::put('post/comment/{comment}',[CommentController::class,'update'])->name('comment.update'); //コメント更新の保存
Route::delete('comment/{comment}',[CommentController::class,'destroy'])->name('comment.destroy'); //コメントの削除
//ログイン・ログアウト
Route::get('login',[LoginController::class,'showLoginForm'])->name('login'); //ログイン画面表示
Route::post('login',[LoginController::class,'login'])->name('login.post'); //ログイン実行
Route::get('logout',[LoginController::class,'logout'])->name('logout'); //ログアウト実行
//お問い合わせ機能
Route::get('contact/create',[ContactController::class],'create')->name('contact.create'); //お問い合わせ表示
Route::post('contact/store',[ContactController::class],'store')->name('contact.store'); //お問い合わせ保存

