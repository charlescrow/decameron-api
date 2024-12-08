<?php

use App\Http\Controllers\DistributionHotelController;
use App\Http\Controllers\HotelController;
use App\Models\AccommodationRoom;
use App\Models\TypeRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/** Rutas Hoteles */
Route::group(['prefix' => 'hotels', 'as' => 'hotels.'], function () {
    Route::get('/list', [HotelController::class, 'index'])->name('list');
    Route::post('/store', [HotelController::class, 'store'])->name('store');
});

/** Rutas Distribución Hotel */
Route::group(['prefix' => 'distribution', 'as' => 'distribution.'], function () {
    Route::get('/list', [DistributionHotelController::class, 'index'])->name('list');
    Route::get('/get-info-select', [DistributionHotelController::class, 'getInfoSelect'])->name('get-info-select');
    Route::post('/store', [DistributionHotelController::class, 'store'])->name('store');
});

Route::get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});


