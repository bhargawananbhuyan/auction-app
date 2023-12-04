<header class="bg-blue-500 text-white">
    <div class="container py-3 flex flex-wrap gap-x-6 items-center justify-between">
        <a href="{{ route('home') }}" class="font-medium">{{ config('app.name') }}</a>

        <nav class="flex flex-wrap gap-x-6 items-center text-sm">
            <a href="{{ route('home') }}" @class(['underline' => Route::is('home')])>Home</a>

            @guest
                <a href="{{ route('login') }}" class="text-xs font-medium px-2.5 py-2 rounded-md bg-white text-blue-500">
                    Login
                </a>
            @endguest

            @auth
                @if (Auth::user()->role === 'bidder')
                    <a href="{{ route('bidder.auctions_view') }}" @class(['underline' => Route::is('bidder.auctions_view')])>Auctions</a>
                    <a href="{{ route('bidder.bids') }}" @class(['underline' => Route::is('bidder.bids')])>Bids</a>
                @endif

                @if (Auth::user()->role === 'seller')
                    <a href="{{ route('seller.auctions_view') }}" @class(['underline' => Route::is('seller.auctions_view')])>Auctions</a>
                    <a href="{{ route('seller.create_auction_view') }}" @class(['underline' => Route::is('seller.create_auction_view')])>Create auction</a>
                @endif

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="text-xs font-medium px-2.5 py-2 rounded-md bg-red-500">
                        Logout
                    </button>
                </form>
            @endauth
        </nav>
    </div>
</header>
