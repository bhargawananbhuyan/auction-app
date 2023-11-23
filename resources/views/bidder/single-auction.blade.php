@extends('layouts.app')

@section('title')
    Auction - Bidder
@endsection

@section('main')
    <div>
        <div>
            <h1>Auction information</h1>
            <table style="text-align: left;">
                <tr>
                    <th>Auction ID</th>
                    <td>{{ $auction->id }}</td>
                </tr>
                <tr>
                    <th>Product name</th>
                    <td>{{ $auction->product_name }}</td>
                </tr>
                <tr>
                    <th>Product details</th>
                    <td>{{ $auction->product_details }}</td>
                </tr>
                <tr>
                    <th>Base amount</th>
                    <td>${{ $auction->base_amount }}</td>
                </tr>
                @if ($auction->status === 'sold')
                    <tr>
                        <th>Sold for</th>
                        <td>${{ $auction->sold_for }}</td>
                    </tr>
                @endif
            </table>

            @if ($auction->status === 'not_sold')
                <p>
                    Want to make a bid or view existing bids?
                    <a href="{{ route('bidder.create_bid_view', ['id' => $auction->id]) }}">Click here</a>
                </p>
            @endif
        </div>

        <div>
            <h2>Bids</h2>
            @if (isset($auction->bids) && count($auction->bids) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Bid ID</th>
                            <th>Bidder</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auction->bids as $bid)
                            <tr>
                                <td>{{ $bid->id }}</td>
                                <td>{{ $bid->bidder->name }}</td>
                                <td>${{ $bid->amount }}</td>
                                <td>
                                    <em>{{ ucwords($bid->status) }}</em>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No bids have been made.</p>
            @endif
        </div>
    </div>
@endsection
