<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('template\css\style.css') }}">
    <title>{{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('storage/images/logo-katingan.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('template') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('template') }}/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('template') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('template') }}/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">

    @stack('css')
    @stack('scripts')

</head>

<body>
    {{ $slot }}


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('template') }}/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('template') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template') }}/vendor/chart.js/chart.umd.js"></script>
    <script src="{{ asset('template') }}/vendor/echarts/echarts.min.js"></script>
    <script src="{{ asset('template') }}/vendor/quill/quill.min.js"></script>
    <script src="{{ asset('template') }}/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ asset('template') }}/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('template') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('template\js\main.js') }}"></script>
</body>

</html>
