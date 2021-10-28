<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\PaginationController;
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



Route::get('/mobiles/create', [PaginationController::class, 'getFormCreate']);
Route::post('/mobiles/create', [PaginationController::class, 'saveFormCreate']);

Route::get('/mobiles/detail', [PaginationController::class, 'getDetail']);

Route::get('/mobiles/edit', [PaginationController::class, 'getDetailEdit']);
Route::post('/mobiles/edit', [PaginationController::class, 'processDetailEdit']);

Route::get('/mobiles/delete', [PaginationController::class, 'getDetailDelete']);
Route::post('/mobiles/delete', [PaginationController::class, 'processDetailDelete']);

Route::get('/mobiles/all', [PaginationController::class, 'index']);
Route::get('/mobiles/search', [PaginationController::class, 'filterAllAjax']);
Route::get('/mobiles/fetch_data', [PaginationController::class, 'fetch_data']);


