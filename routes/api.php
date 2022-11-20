<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\OrderController;
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

Route::resource('/country', CountryController::class, ['only' => ['index', 'show']]);
Route::resource('/country', CountryController::class, ['except' => ['index', 'show']])->middleware('auth:sanctum');

Route::resource('/hotel', HotelController::class, ['only' => ['index', 'show']]);
Route::resource('/hotel', HotelController::class, ['except' => ['index', 'show']])->middleware('auth:sanctum');

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/logout', [ApiAuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/hotel/addorder', [HotelController::class, 'addOrder'])->middleware('auth:sanctum');
Route::resource('/order', OrderController::class, ['only' => ['index', 'show']]);
Route::resource('/order', OrderController::class, ['except' => ['index', 'show']]);#->middleware('auth:sanctum');

