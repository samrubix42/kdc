<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'KDC Consultants delivers architecture, interiors, and project management services with over two decades of expertise.')">
    <meta name="keywords" content="@yield('meta_keywords', 'KDC Consultants, architecture firm, interior design, project management, industrial architecture, residential design')">
    <meta name="author" content="KDC Consultants">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    
    <title>@yield('meta_title', 'KDC Consultants | Architecture, Interiors & Project Delivery')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @livewireStyles
    
    <style>
        [x-cloak] { display: none !important; }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            color: #0f172a;
        }
        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.02em;
        }
        .section-padding {
            padding-top: clamp(5rem, 12vw, 10rem);
            padding-bottom: clamp(5rem, 12vw, 10rem);
        }
        ::selection {
            background-color: #cee002;
            color: #000;
        }
    </style>
</head>
<body class="antialiased text-slate-900 overflow-x-hidden">
    
    <div class="flex flex-col min-h-screen">
        <!-- New Header Component -->
        <livewire:header2 />

        <main class="flex-grow">
            {{ $slot ?? '' }}
            @yield('content')
        </main>

        <!-- New Footer Component -->
        <livewire:footer2 />
    </div>

    @livewireScripts
</body>
</html>
