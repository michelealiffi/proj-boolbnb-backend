<?php

use App\Http\Controllers\Api\TomTom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Apartments as ApiApartments;
use App\Http\Controllers\Api\ServicesController as ApiServicesController;
use App\Http\Controllers\Api\MessagesController as ApiMessagesController;
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

Route::get('apartments/search', [ApiApartments::class, 'search']);
Route::get('apartments/sponsored', [ApiApartments::class, 'get_sponsored']);
Route::post('apartments/add_visit', [ApiApartments::class, 'store_visit']);
Route::get('apartments/info', [ApiApartments::class, 'show_apartment']);

Route::post('messages/store', [ApiMessagesController::class, 'store_message']);

Route::get('services', [ApiServicesController::class, 'get_services']);

Route::get('tomtom/geolocalize/{search}', [TomTom::class, 'geolocalize']);
Route::get('tomtom/autocomplete/{search}', [TomTom::class, 'autocomplete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
