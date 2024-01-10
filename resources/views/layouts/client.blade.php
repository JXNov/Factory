<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
    @yield('css')
</head>

<body>
    @include('clients.blocks.navbar')

    <main>
        @yield('content')
        @include('clients.blocks.footer')
    </main>

    <script src="{{ asset('assets/clients/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/custom.js') }}"></script>
    @stack('script')
</body>

</html>
