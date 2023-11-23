@extends('layouts.app')

@section('title')
    Auctions - Seller
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
                        <th>Status/Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($auctions as $auction)
                        <tr>
                            <td>{{ $auction->id }}</td>
                            <td>{{ $auction->product_name }}</td>
                            <td>{{ $auction->product_details }}</td>
                            <td>{{ $auction->base_amount }}</td>
                            <td>
                                <a href="{{ route('seller.single_auction_view', ['id' => $auction->id]) }}">
                                    @if ($auction->status === 'sold')
                                        <em>Sold for ${{ $auction->sold_for }}</em>
                                    @else
                                        View
                                    @endif
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
