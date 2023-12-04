@extends('layouts.app')

@section('title')
    Home
@endsection

@section('main')
    <div class="grid place-items-center mt-2.5">
        <h1 class="text-xl sm:text-3xl font-bold">Hello, {{ Auth::user()->name ?? 'world' }}!</h1>
    </div>
@endsection
