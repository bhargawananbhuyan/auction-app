<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @if (Session::has('success'))
        <div x-data="{ open: true }" x-init="$nextTick(() => setTimeout(() => { open = false }, 2000))" x-cloak>
            <div x-show="open">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif

    @if (Session::has('error'))
        <div x-data="{ open: true }" x-init="$nextTick(() => setTimeout(() => { open = false }, 2000))" x-cloak>
            <div x-show="open">
                {{ Session::get('error') }}
            </div>
        </div>
    @endif

    @include('inc.header')
    <main>
        @yield('main')
    </main>
    @include('inc.footer')
</body>

</html>
