<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{config('app.name')}}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/custom.css', 'resources/js/custom.js'])
    {{-- Before body styles --}}
    @stack('styles')
</head>

<body>
    {{-- Header Start --}}
    @include('frontend.partials.header')
    {{-- Header End --}}

    {{-- Main Content Start --}}
    <main>
        @yield('main-content')
    </main>
    {{-- Main Content End --}}

    {{-- Footer Start --}}
    @include('frontend.partials.footer')
    {{-- Footer End --}}

    {{-- Before Body scripts --}}
    @stack('scripts')
</body>

</html>