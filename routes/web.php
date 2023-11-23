<?php

use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'index')->name('home');

Route::controller(SellerController::class)
    ->prefix('seller')
    ->middleware(['auth', 'role:seller'])
    ->group(function () {
        Route::get('/auctions', 'auctions_view')->name('seller.auctions_view');
        Route::get('/create-auction', 'create_auction_view')->name('seller.create_auction_view');
    });