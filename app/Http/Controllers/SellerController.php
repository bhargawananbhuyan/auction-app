<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{
    public function auctions_view(Request $request)
    {
        $auctions = Auction::where('added_by', $request->user()->id)->get();
        return view("seller.auctions", compact('auctions'));
    }

    public function create_auction_view(Request $request)
    {
        return view("seller.create-auction");
    }

    public function create_auction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string',
            'product_details' => 'required|string',
            'base_amount' => 'required|numeric',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        Auction::create([
            'product_name' => $request->product_name,
            'product_details' => $request->product_details,
            'base_amount' => $request->base_amount,
            'added_by' => $request->user()->id,
        ]);

        return redirect()
            ->route('seller.auctions_view')
            ->with('success', 'Auction created successfully.');
    }

    public function single_auction_view(Request $request, int $id)
    {
        $auction = Auction::whereId($id)->first();
        return view('seller.single-auction', compact('auction'));
    }

    public function confirm_bid(int $auction_id, int $bid_id)
    {
        Auction::whereId($auction_id)->update([
            'status' => 'sold',
            'sold_for' => Bid::whereId($bid_id)->first()->amount
        ]);
        Bid::whereId($bid_id)->update(['status' => 'confirmed']);
        return redirect()
            ->route('seller.auctions_view')
            ->with('success', 'Bid confirmed successfully.');
    }
}
