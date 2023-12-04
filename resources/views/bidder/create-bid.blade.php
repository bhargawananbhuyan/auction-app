@extends('layouts.app')

@section('title')
    Bid for auction #{{ $auction->id }} - Buyer
@endsection

@section('main')
    <div class="space-y-5">
        <div class="space-y-5">
            <h1 class="text-xl font-bold">Make a bid</h1>
            <form action="{{ route('bidder.create_bid', ['id' => $auction->id]) }}" method="post" class="base-form"
                novalidate>
                @csrf
                <div>
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" value="{{ old('amount') }}">
                    @error('amount')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="space-y-5">
            @php
                $bids = $auction->bids->where('bid_by', Auth::id());
            @endphp

            <h2 class="text-xl font-bold">Your bids</h2>

            @if (count($bids) > 0)
                <table class="base-table">
                    <thead>
                        <tr>
                            <th>Bid ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bids as $bid)
                            <tr>
                                <td>{{ $bid->id }}</td>
                                <td>${{ $bid->amount }}</td>
                                <td>{{ ucwords($bid->status) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>You haven't made any bids for this auction.</p>
            @endif
        </div>
    </div>
@endsection
