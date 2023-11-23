@extends('layouts.app')

@section('title')
    Bids - Bidder
@endsection

@section('main')
    <div>
        <h1>Bids</h1>
        @if (count($bids) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Auction ID</th>
                        <th>Bid ID</th>
                        <th>Bid amount</th>
                        <th>Bid status/Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bids as $bid)
                        <tr>
                            <td>
                                <a href="{{ route('bidder.single_auction_view', ['id' => $bid->auction->id]) }}">
                                    {{ $bid->auction->id }}
                                </a>
                            </td>
                            <td>{{ $bid->id }}</td>
                            <td>{{ $bid->amount }}</td>
                            <td>
                                @if ($bid->status === 'confirmed')
                                    <em>Confirmed</em>
                                @else
                                    <form action="" method="post">
                                        @csrf
                                        <button type="submit">Withdraw</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>You haven't made any bids.</p>
        @endif
    </div>
@endsection
