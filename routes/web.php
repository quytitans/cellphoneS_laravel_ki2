<?php

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

Route::get('/home', [ApartmentController::class, 'getHomePage']);
Route::get('/create', [ApartmentController::class, 'getForm']);
Route::post('/create', [ApartmentController::class, 'createApartment']);
Route::get('/apartments', [ApartmentController::class, 'getAll']);
