<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('request.auth')->group(function () {
    Route::get('/get-smth', [TestController::class, 'get']);
});


// Analytics collect
Route::get('/analytics/login', [AnalyticsController::class, 'login']);
Route::get('/analytics/create_nft', [AnalyticsController::class, 'create_nft']);
Route::post('/analytics/up_for_rent', [AnalyticsController::class, 'up_for_rent']);
Route::get('/analytics/remove_from_rent', [AnalyticsController::class, 'remove_from_rent']);
Route::get('/analytics/rented', [AnalyticsController::class, 'rented']);
Route::get('/analytics/rent_end', [AnalyticsController::class, 'rent_end']);


// Analytics get
Route::get('/analytics/metrics', [AnalyticsController::class, 'metrics']);
