<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <link href="assets/css/theme.min.css" rel="stylesheet" id="style-default">

        <!-- Scripts -->
        @vite(['resources/js/app.js'])

        @livewireStyles
        @powerGridStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- ===== Top bar navigation ===== -->
            @include('layouts.navigation')

            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->

            <!-- ============ Main ============ -->
            @yield("main")

            <main>
                {{ $slot }}
            </main>

            @livewireScripts
            @powerGridScripts

            <script>
                window.addEventListener('showAlert', event => {
                    alert(event.detail.message);
                })
            </script>
        </div>
    </body>
</html>
