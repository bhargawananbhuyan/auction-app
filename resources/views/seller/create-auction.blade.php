@extends('layouts.app')

@section('title')
    Create Auction - Seller
@endsection

@section('main')
    <div class="space-y-5">
        <h1 class="text-xl font-bold">Create an auction</h1>

        <form action="{{ route('seller.create_auction') }}" method="post" class="base-form" novalidate>
            @csrf
            <div>
                <label for="product_name">Product name</label>
                <input type="text" name="product_name" id="product_name" value="{{ old('product_name') }}">
                @error('product_name')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="product_details">Product details</label>
                <textarea name="product_details" id="product_details" rows="5">{{ old('product_details') }}</textarea>
                @error('product_details')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="base_amount">Base amount</label>
                <input type="number" name="base_amount" id="base_amount" value="{{ old('base_amount') }}">
                @error('base_amount')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
@endsection
