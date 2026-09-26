<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 一覧表示　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
Route::get('/', [ProductsController::class, 'index'])->name('index');

//商品登録ページ　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
Route::get('/create', [ProductsController::class, 'create'])->name('create');
Route::post('/store', [ProductsController::class, 'store'])->name('store');

//マイページ
Route::get('/mypage', [ProductsController::class, 'mypage'])->name('mypage');