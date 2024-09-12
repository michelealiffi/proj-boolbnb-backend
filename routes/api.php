<?php

use App\Http\Controllers\Api\TomTom;
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

Route::get('tomtom/geolocalize/{search}', [TomTom::class, 'geolocalize']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
