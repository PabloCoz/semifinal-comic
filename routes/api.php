<?php

use App\Http\Controllers\Api\Buy\MoneyController;
use App\Http\Controllers\Api\ChapterController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\Payment\PaymentController;
use App\Http\Controllers\Api\PlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('order/chapter', [ChapterController::class, 'order'])->name('api.order.chapter');

Route::post('order/image', [ImageController::class, 'orderImage'])->name('api.order.image');

Route::group(['prefix' => 'plan'], function () {
    Route::post('/', [PlanController::class, 'store'])->name('api.plan.store');
    Route::delete('/{plan}', [PlanController::class, 'destroy'])->name('api.plan.destroy');
});

Route::post('buy/money', [MoneyController::class, 'buyMoney'])->name('api.buy.money');

Route::post('buy/card', [PaymentController::class, 'buyCard'])->name('api.buy.card');

Route::post('buy/subscription', [PaymentController::class, 'subscriptionCreated'])->name('api.buy.subscription');
