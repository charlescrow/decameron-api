<?php

use App\Http\Controllers\HotelController;
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

Route::group(['prefix' => 'hotels', 'as' => 'hotels.'], function () {
    Route::get('/list', [HotelController::class, 'index'])->name('list');
    Route::post('/store', [HotelController::class, 'store'])->name('store');
});

Route::get('/csrf-token', function () {
    dd(csrf_token());
    return response()->json(['csrfToken' => csrf_token()]);
});


