<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AutoSales Pro')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { 50: '#f0fdfa', 100: '#ccfbf1', 500: '#14b8a6', 600: '#0d9488', 700: '#0f766e', 800: '#115e59', 900: '#134e4a' },
                        navy: { 800: '#1e293b', 900: '#0f172a' },
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @stack('head')
</head>
<body class="bg-slate-50 text-slate-800 antialiased">
    @yield('content')
    @stack('scripts')
</body>
</html>
