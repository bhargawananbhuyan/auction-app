@extends('layouts.app')

@section('title')
    Auctions - Bidder
@endsection

@section('main')
    <div>
        <h1>Auctions</h1>
        @if (count($auctions) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Auction ID</th>
                        <th>Product name</th>
                        <th>Product details</th>
                        <th>Base amount</th>
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
                            <td>
                                <a href="{{ route('bidder.single_auction_view', ['id' => $auction->id]) }}">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No auctions available.</p>
        @endif
    </div>
@endsection
