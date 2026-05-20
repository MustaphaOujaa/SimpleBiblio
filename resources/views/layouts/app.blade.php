<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bibliothèque') }}</title>

    <!-- Premium Fonts - Cairo for Arabic, Inter for Latin -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --success: #059669;
            --success-dark: #047857;
        }
        
        [dir="rtl"] { font-family: 'Cairo', sans-serif; }
        [dir="ltr"] { font-family: 'Inter', sans-serif; }
        
        .premium-card {
            background: white;
            border-radius: 1.25rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            border: 1px solid rgba(229, 231, 235, 1);
            transition: all 0.3s ease;
        }
        
        .premium-card:hover {
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }

        .btn-premium {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .btn-premium:hover {
            transform: translateY(-1px);
            filter: brightness(110%);
        }
        
        .btn-premium:active {
            transform: translateY(0);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('partials.header')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </div>
</body>

</html>