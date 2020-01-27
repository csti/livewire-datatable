<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->

    <!-- CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/pyloncss@latest/css/pylon.css"/>
    @livewireStyles

    <!-- Scripts -->
    @yield('scripts', '')

</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- JavaScript -->
    @if(config('app.env') == 'local')
    <script src="http://localhost:35729/livereload.js"></script>
    @endif
    <script src="{{ mix('js/app.js') }}"></script>
    @livewireScripts
</body>
</html>
