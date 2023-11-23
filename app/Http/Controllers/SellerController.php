<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function auctions_view(Request $request)
    {
        return view("seller.auctions");
    }

    public function create_auction_view(Request $request)
    {
        return view("seller.create-auction");
    }
}
