<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Workload') }}</title>

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/js/toastr/toastr.css" rel="stylesheet">
        {{-- <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> --}}
        {{-- <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> --}}
        {{-- <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet"> --}}
        
        <link href="/assets/css/all.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!-- Template Main CSS File -->
        <link href="/assets/css/style.css" rel="stylesheet">
        <link href="/assets/css/main.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/js/app.js']) 

        @livewireStyles
        @powerGridStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- ======= Toaster ======= -->
            <livewire:toaster-component/>

            <!-- ===== Top bar navigation ===== -->
            @include('admin.main.top-bar-navigation')

            <!-- ========== Siderbar ========== -->
            @include('admin.main.sidebar')

            <!-- ============ Main ============ -->
            @yield("main")
        </div>

        @livewireScripts
        @powerGridScripts

        <!-- Vendor JS Files -->
        {{-- <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script> --}}
        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        {{-- <script src="/assets/vendor/chart.js/chart.min.js"></script> --}}
        {{-- <script src="/assets/vendor/echarts/echarts.min.js"></script> --}}
        <!-- <script src="/assets/vendor/quill/quill.min.js"></script> -->
        <!-- <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script> -->
        {{-- <script src="/assets/vendor/tinymce/tinymce.min.js"></script> --}}
        {{-- <script src="/assets/vendor/php-email-form/validate.js"></script> --}}

        <script src="/assets/js/toastr/toastr.js"></script>
        <script src="/assets/js/common.js"></script>

        <!-- Template Main JS File -->
        <script src="/assets/js/main.js"></script>

        <script>
            window.addEventListener('showAlert', event => {
                alert(event.detail.message);
            })
        </script>
    </body>
</html>
