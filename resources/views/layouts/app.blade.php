<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- add icon for taskbar -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <title>@yield('title', 'AutoSales Pro')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @stack('head')
</head>
<body class="bg-slate-50 text-slate-800 antialiased">
    
    @yield('content')
    @stack('scripts')
</body>
</html>
