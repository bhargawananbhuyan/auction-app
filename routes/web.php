<?php

use App\Http\Controllers\BidderController;
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

Route::controller(BidderController::class)
    ->prefix('bidder')
    ->middleware(['auth', 'role:bidder'])
    ->group(function () {
        Route::get('/auctions', 'auctions_view')->name('bidder.auctions_view');
        Route::get('/auctions/{id}', 'single_auction_view')->name('bidder.single_auction_view');
        Route::get('/auctions/{id}/bid', 'create_bid_view')->name('bidder.create_bid_view');
        Route::post('/auctions/{id}/bid', 'create_bid')->name('bidder.create_bid');
        Route::get('/bids', 'bids')->name('bidder.bids');
    });

Route::controller(SellerController::class)
    ->prefix('seller')
    ->middleware(['auth', 'role:seller'])
    ->group(function () {
        Route::get('/auctions', 'auctions_view')->name('seller.auctions_view');
        Route::get('/auctions/{id}', 'single_auction_view')->name('seller.single_auction_view');
        Route::get('/create-auction', 'create_auction_view')->name('seller.create_auction_view');
        Route::post('/create-auction', 'create_auction')->name('seller.create_auction');
        Route::put('/auctions/{auction_id}/{bid_id}', 'confirm_bid')->name('seller.confirm_bid');
    });

