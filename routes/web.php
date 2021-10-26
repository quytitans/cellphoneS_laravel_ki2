<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ApartmentController;
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

Route::get('/create/mobile', [adminController::class, 'getFormCreate']);
Route::post('/create/mobile', [adminController::class, 'saveFormCreate']);

//Route::get('/mobiles/brand/{brandID}', [adminController::class, 'getMobilesFilterByBrand']);
//Route::get('/search', [adminController::class, 'liveSearch']);

Route::get('/mobiles', [adminController::class, 'getAllProductMobile']);
//Route::post('/mobiles', [adminController::class, 'filterAll']);
Route::post('/mobiles/search', [adminController::class, 'filterAllAjax']);
