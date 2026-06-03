<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fat Touré - Bienvenue dans l'univers</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;700&family=Great+Vibes&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        *{
            font-family: 'Instrument Sans', sans-serif;
        }
        .font-script {
            font-family: 'Great Vibes', cursive;
        }
        .bg-custom-gradient {
            background: linear-gradient(135deg, #00818a 0%, #1e3c72 40%, #8e2de2 70%, #d81b60 100%);
        }
        .card-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 50%);
        }

        /* Oscillation Animation - Periodic (15s) and Slow */
        @keyframes floating {
            0%, 80%, 100% { transform: translateY(0px); }
            85%, 95% { transform: translateY(-10px); }
        }

        .floating {
            animation: floating 15s ease-in-out infinite;
            display: block;
            width: 100%;
            height: 100%;
        }

        .group:hover .floating {
            animation: none; /* Désactive l'animation périodique au survol pour éviter les conflits avec le zoom */
        }

        /* Délais différents pour un effet plus naturel */
        .delay-1 { animation-delay: 0s; }
        .delay-2 { animation-delay: 2s; }
        .delay-3 { animation-delay: 4s; }
        .delay-4 { animation-delay: 6s; }
    </style>
</head>
<body class="bg-custom-gradient min-h-screen text-white font-sans flex flex-col items-center justify-between py-12 px-4 md:px-8">
    
    <!-- Header -->
    <header class="w-full max-w-7xl px-4 mb-12">
        <h1 class="text-4xl md:text-7xl font-bold tracking-tight mb-6 uppercase leading-tight">
            {!! nl2br(e($settings->home_title ?: "BIENVENUE DANS\nL'UNIVERS DE FAT TOURÉ")) !!}
        </h1>
        <p class="text-sm md:text-base tracking-[0.2em] font-light uppercase">
            {{ $settings->home_subtitle ?: "CLIQUEZ SUR UNE PHOTO POUR DÉCOUVRIR L'UNIVERS" }}
        </p>
    </header>

    <main class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-7xl px-4">
        @foreach($universes as $universe)
        <a href="{{ \Illuminate\Support\Facades\Route::has($universe->slug) ? route($universe->slug) : '#' }}"
           class="group relative aspect-[3/4] overflow-hidden rounded-2xl transition-all duration-500 hover:scale-105 shadow-2xl">
            <div class="floating delay-{{ min($loop->iteration, 4) }}">
                @if($universe->card_image_url)
                <img src="{{ $universe->card_image_url }}" alt="{{ $universe->display_name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                @endif
            </div>
            <div class="card-overlay absolute inset-0"></div>
            <span class="absolute bottom-6 left-6 right-6 text-white font-bold uppercase tracking-[0.15em] text-sm md:text-base leading-snug drop-shadow-md">
                {{ $universe->display_name }}
            </span>
        </a>
        @endforeach
    </main>

    <!-- Footer -->
    @if($settings->booking_phone || $settings->booking_email)
    <footer class="mt-16 w-full max-w-7xl px-4">
        <p class="text-[10px] md:text-xs tracking-[0.2em] font-bold uppercase opacity-90">
            BOOKING : {{ collect([$settings->booking_phone, $settings->booking_email])->filter()->implode(' / ') }}
        </p>
    </footer>
    @endif

</body>
</html>
