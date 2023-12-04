<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BidderController extends Controller
{
    public function auctions_view(Request $request)
    {
        $auctions = Auction::where('status', 'not_sold')->get();
        return view('bidder.auctions', compact('auctions'));
    }

    public function single_auction_view(Request $request, int $id)
    {
        $auction = Auction::whereId($id)->first();
        return view('bidder.single-auction', compact('auction'));
    }

    public function create_bid_view(Request $request, int $id)
    {
        $auction = Auction::whereId($id)->first();
        return view('bidder.create-bid', compact('auction'));
    }

    public function create_bid(Request $request, int $id)
    {
        if (Auction::whereId($id)->first()->status === 'sold')
            return redirect()->back()->with('error', 'Auction sold out.');

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        Bid::create([
            'amount' => $request->amount,
            'auction_id' => $id,
            'bid_by' => $request->user()->id,
        ]);

        return redirect()->back()->with('success', 'Bid made successfully.');
    }

    public function remove_bid(int $id)
    {
        Bid::whereId($id)->delete();
        return redirect()->back()->with('success', 'Bid withdrawn successfully.');
    }

    public function bids(Request $request)
    {
        $bids = Bid::where('bid_by', $request->user()->id)->get();
        return view('bidder.bids', compact('bids'));
    }
}
