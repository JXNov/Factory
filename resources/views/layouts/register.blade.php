<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('assets/css/register.css')}}" />
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
