<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AroundController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ComfortController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\Flat_typeController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\KvartiraController;
use App\Http\Controllers\Payment_typeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\Flat_type;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Backend pages start



Route::get('/admin', [AdminController::class, 'admin']);

Route::get('/out', [CheckController::class, 'out']);

Route::prefix('admin')->name('admin.')->group(function()
{
    Route::get('/', function(){
        return view('admin.index');
    })->name('index');

    // Route::get('/', [AdminController::class, 'admin']);

    Route::resources([
        'user' => UserController::class,
        'flat_type' => Flat_typeController::class,
        'region' => RegionController::class,
        'district' => DistrictController::class,
        'payment_type' => Payment_typeController::class,
        'comfort' => ComfortController::class,
        'around' => AroundController::class,
    ]);


});

Route::prefix('user')->name('user.')->group(function()
{
    Route::get('/', function(){
        return view('user.index');
    })->name('index');

    Route::get('/personal_cabinet', function(){
        return view('user.personal_cabinet.index');
    });


    Route::get('/my_ads', [FlatController::class, 'my_ads']);

    Route::resources([
        'my_ads' => FlatController::class,
    ]);
    

});

// Backend pages end

Route::get('/', [WelcomeController::class, 'flat_type']);

Route::get('/flat_type/{id}', [WelcomeController::class, 'index']);

Route::get('/login', function(){
    return view('login');
});

Route::get('/register', function(){
    return  view('register');
});

Route::get('/getdistrict', [FlatController::class, 'getdistrict'])->name('getdistrict');
Route::get('/getaround', [FlatController::class, 'getaround'])->name('getaround');
Route::get('/getcomfort', [FlatController::class, 'getcomfort'])->name('getcomfort');

Route::post('/adduser', [UserController::class, 'adduser']);

Route::get('/getlogindata', [UserController::class, 'getlogin'])->name('getlogindata');

Route::post('/check', [UserController::class, 'check']);
