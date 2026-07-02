<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fat Touré - @yield('page-title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Instrument+Sans:wght@400;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .font-script { font-family: 'Great Vibes', cursive; }
        .text-custom-red { color: #d10024; }
        .hide-scrollbar { scrollbar-width: none; -ms-overflow-style: none; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="font-sans min-h-screen bg-white">

    <!-- Barre de navigation simple -->
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur border-b border-gray-100">
        <div class="container mx-auto max-w-7xl px-4 py-4 flex items-center justify-between">
            <a href="{{ \Illuminate\Support\Facades\Route::has($page->slug) ? route($page->slug) : url('/'.$page->slug) }}"
               class="inline-flex items-center gap-2 text-xs md:text-sm font-bold tracking-widest uppercase text-gray-800 hover:text-custom-red transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
                {{ $page->display_name }}
            </a>
            <span class="font-script text-2xl md:text-3xl text-custom-red">Fat Touré</span>
        </div>
    </header>

    @yield('detail-content')

    <!-- SOCIAL MEDIA Section -->
    @include('partials.social')

    <!-- Footer -->
    <footer class="py-12 bg-[#111] border-t border-white/5">
        <div class="container mx-auto px-4 text-center">
            <p class="text-[10px] md:text-xs tracking-[0.2em] font-bold uppercase opacity-60 text-white">
                BOOKING : {{ $page->booking_phone }} / {{ $page->booking_email }}
            </p>
        </div>
    </footer>

    @yield('extra-scripts')
</body>
</html>
