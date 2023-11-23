<header>
    <a href="{{ route('home') }}">Home</a>

    @guest
        <a href="{{ route('login') }}">Login</a>
    @endguest

    @auth
        @if (Auth::user()->role === 'bidder')
            <a href="{{ route('bidder.auctions_view') }}">Auctions</a>
            <a href="{{ route('bidder.bids') }}">Bids</a>
        @endif

        @if (Auth::user()->role === 'seller')
            <a href="{{ route('seller.auctions_view') }}">Auctions</a>
            <a href="{{ route('seller.create_auction_view') }}">Create auction</a>
        @endif

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth
</header>
