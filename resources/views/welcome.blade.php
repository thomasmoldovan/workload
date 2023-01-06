<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="/fonts/ABeeZee-Italic.ttf" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/js/app.js'])

    @livewireStyles
    @powerGridStyles
</head>

<body class="antialiased">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif


    @yield('main')

    @livewireScripts
    @powerGridScripts

    <script>
        window.addEventListener('showAlert', event => {
            alert(event.detail.message);
        })
    </script>
</body>

</html>
