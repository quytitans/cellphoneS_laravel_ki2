<?php

use App\Http\Controllers\frontEndController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\shoppingCartController;
use Illuminate\Support\Facades\Route;

//back end
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

//front end
Route::get('/home', [frontEndController::class, 'getLayout']);
Route::get('/detail', [frontEndController::class, 'getDetailPage']);
Route::get('/cart', [frontEndController::class, 'getCartPage']);

//shopingcart
Route::get('/errors404', [shoppingCartController::class, 'getErrorPage']);
Route::get('/cart/show', [shoppingCartController::class, 'show']);
Route::post('/cart/add', [shoppingCartController::class, 'add']);
Route::post('/cart/update', [shoppingCartController::class, 'update']);
Route::post('/cart/remove', [shoppingCartController::class, 'remove']);


