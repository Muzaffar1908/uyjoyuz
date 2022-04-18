<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;

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



Route::get('/check', [LoginController::class, 'check']);

Route::get('/tekshir', [LoginController::class, 'login']);

// Route::get('/region', [RegionController::class, 'getRegion']);

// Route::post('/region/store', RegionController::class, 'storeRegion');
