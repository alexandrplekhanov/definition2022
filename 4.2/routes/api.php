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
    Route::get('/analytics/create_nft', [AnalyticsController::class, 'createNft']);
    Route::post('/analytics/up_for_rent', [AnalyticsController::class, 'upForRent']);
    Route::post('/analytics/remove_from_rent', [AnalyticsController::class, 'removeFromRent']);
    Route::post('/analytics/rented', [AnalyticsController::class, 'rented']);
    Route::post('/analytics/rent_end', [AnalyticsController::class, 'rentEnd']);
});


// Analytics collect
Route::get('/analytics/login', [AnalyticsController::class, 'login']);

// Analytics get
Route::get('/analytics/metrics', [AnalyticsController::class, 'metrics']);
