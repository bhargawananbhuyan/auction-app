@extends('layouts.app')

@section('title')
    Auction - Seller
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
                                    @if ($bid->auction->status === 'sold' && $bid->status === 'pending')
                                        <em>Cancelled</em>
                                    @elseif ($bid->status === 'pending')
                                        <form
                                            action="{{ route('seller.confirm_bid', ['auction_id' => $auction->id, 'bid_id' => $bid->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <button type="submit">Confirm</button>
                                        </form>
                                    @else
                                        <em>Confirmed</em>
                                    @endif
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
