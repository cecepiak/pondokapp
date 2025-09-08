<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" rel="stylesheet" />
    <title>Pondok Dukcapil</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen bg-gray-100 pb-20">
        @yield('content')
    </div>

    @include('layouts.partials.footer-nav')
    @stack('scripts')
</body>
</html>