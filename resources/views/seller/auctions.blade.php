@extends('layouts.app')

@section('title')
    Auctions - Seller
@endsection

@section('main')
    <div>
        <h1>Auctions</h1>

        @if (Request::get('status') === 'sold')
            <p>
                Want to view ongoing auctions?
                <a href="{{ route('seller.auctions_view') }}">
                    Click here
                </a>
            </p>
        @else
            <p>
                Want to view past auctions?
                <a href="{{ route('seller.auctions_view', ['status' => 'sold']) }}">
                    Click here
                </a>
            </p>
        @endif

        @if (count($auctions) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Auction ID</th>
                        <th>Product name</th>
                        <th>Product details</th>
                        <th>Base amount</th>
                        @if (Request::get('status') === 'sold')
                            <th>Sold for</th>
                        @endif
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($auctions as $auction)
                        <tr>
                            <td>{{ $auction->id }}</td>
                            <td>{{ $auction->product_name }}</td>
                            <td>{{ $auction->product_details }}</td>
                            <td>${{ $auction->base_amount }}</td>
                            @if (Request::get('status') === 'sold')
                                <td>${{ $auction->sold_for }}</td>
                            @endif
                            <td>
                                <a href="{{ route('seller.single_auction_view', ['id' => $auction->id]) }}">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No auctions have been added yet.</p>
        @endif
    </div>
@endsection
