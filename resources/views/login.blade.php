@extends('layouts.app')

@section('title')
    Login
@endsection

@section('main')
    <div>
        <h1>Login</h1>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                @error('password')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <button type="submit">Login</button>
        </form>

        <p>
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </p>
    </div>
@endsection
