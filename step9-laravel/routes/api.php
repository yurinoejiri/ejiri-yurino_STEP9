<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;

// 認証 ーーーーーーーーーーーーーーーーーーーーーーー
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/purchase', [ProductsController::class, 'apiPurchase']);
});

?>