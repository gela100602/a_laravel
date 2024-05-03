<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Sample App</title> --}}
    <title>@yield('page_title', 'Sample App')</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
    @yield('content')
    <!-- bootstrap -->
    <script> src={{ asset('js/bootstrap.bundle.min.js') }}</script>
</body>
</html>