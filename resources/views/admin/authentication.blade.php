<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $this->settings["APP_NAME"] }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    {{-- <link href="{{ asset('/assets/img/favicon.png') }}" rel="icon"> --}}
    {{-- <link href="{{ asset('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- jQuery needs to be in the head -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/assets/js/toastr/toastr.js"></script>

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js']) 

    @livewireStyles
    @powerGridStyles
</head>

<body>

    <main>

        @yield('admin')

    </main>

    @if(Session::has("toaster_message"))
    <script>
        showToast('{{ Session::get("toaster_status") }}', 
                  '{{ ucwords(Session::get("toaster_title")) }}', 
                  '{{ Session::get("toaster_message") }}',
                  true)
    </script>
    {{ Session::forget("toaster_message") }}
    @endif

    <!-- Vendor JS Files -->
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('/assets/vendor/php-email-form/validate.js') }}"></script> --}}

    <!-- Template Main JS File -->
    {{-- <script src="{{ asset('/assets/js/main.js') }}"></script> --}}
    @livewireScripts
    @powerGridScripts
</body>

</html>
