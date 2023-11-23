@extends('layouts.app')

@section('title')
    Bid for auction #{{ $auction->id }} - Buyer
@endsection

@section('main')
    <div>
        <div>
            <h1>Make a bid</h1>
            <form action="" method="post">
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

        <div>
            @php
                $bids = $auction->bids->where('bid_by', Auth::id());
            @endphp

            <h2>Your bids</h2>

            @if (count($bids) > 0)
                <table>
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
