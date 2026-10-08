<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('index');
});

// ログイン　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
Auth::routes();
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 一覧表示　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
Route::get('/', [ProductsController::class, 'index'])->name('index');

// 詳細表示　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
Route::get('/detail/{id}', [ProductsController::class, 'show'])->name('detail');

// 更新・編集画面　ーーーーーーーーーーーーーーーーーーーーーーーーーーーー
Route::get('/product/{id}/edit', [ProductsController::class, 'edit'])->name('edit');

Route::put('/product/{id}', [ProductsController::class, 'update'])->name('update');

// 削除　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
Route::delete('/detail/{id}', [ProductsController::class, 'destroy'])->name('destroy');
Auth::routes();

//商品登録ページ　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
Route::get('/create', [ProductsController::class, 'create'])->name('create');
Route::post('/store', [ProductsController::class, 'store'])->name('store');

//　マイページーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
Route::get('/mypage', [ProductsController::class, 'mypage'])->name('mypage');

//アカウント編集　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
Route::get('/users/{id}/account_edit', [UsersController::class, 'edit'])->name('account_edit');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users_update');


//お問い合わせ
Route::get('/contact', [ProductsController::class, 'contact'])->name('contact');



