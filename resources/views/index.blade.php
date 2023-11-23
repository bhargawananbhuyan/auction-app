@extends('layouts.app')

@section('title')
    Home
@endsection

@section('main')
    <div>
        <h1>Hello, {{ Auth::user()->name ?? 'world' }}!</h1>
    </div>
@endsection
