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
            BIENVENUE DANS<br>
            L'UNIVERS DE FAT TOURÉ
        </h1>
        <p class="text-sm md:text-base tracking-[0.2em] font-light uppercase">
            CLIQUEZ SUR UNE PHOTO POUR DÉCOUVRIR L'UNIVERS
        </p>
    </header>

    <main class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-7xl px-4">
        <!-- Actrice -->
        <a href="{{ route('actrice') }}" class="group relative aspect-[3/4] overflow-hidden rounded-2xl transition-all duration-500 hover:scale-105 shadow-2xl">
            <div class="floating delay-1">
                <img src="{{ asset('img/actrice.png') }}" alt="Actrice" class="w-full h-full object-cover">
            </div>
        </a>

        <!-- Présentatrice -->
        <a href="{{ route('presentatrice') }}" class="group relative aspect-[3/4] overflow-hidden rounded-2xl transition-all duration-500 hover:scale-105 shadow-2xl">
            <div class="floating delay-2">
                <img src="{{ asset('img/presentatrice.png') }}" alt="Présentatrice" class="w-full h-full object-cover">
            </div>
        </a>

        <!-- Modèle -->
        <a href="{{ route('modele') }}" class="group relative aspect-[3/4] overflow-hidden rounded-2xl transition-all duration-500 hover:scale-105 shadow-2xl">
            <div class="floating delay-3">
                <img src="{{ asset('img/modèle.png') }}" alt="Modèle" class="w-full h-full object-cover">
            </div>
        </a>

        <!-- Entrepreneur -->
        <a href="{{ route('entrepreneur') }}" class="group relative aspect-[3/4] overflow-hidden rounded-2xl transition-all duration-500 hover:scale-105 shadow-2xl">
            <div class="floating delay-4">
                <img src="{{ asset('img/entrepreneur.png') }}" alt="Entrepreneur Immobilier" class="w-full h-full object-cover">
            </div>
        </a>
    </main>

    <!-- Footer -->
    <footer class="mt-16 w-full max-w-7xl px-4">
        <p class="text-[10px] md:text-xs tracking-[0.2em] font-bold uppercase opacity-90">
            BOOKING : 0000000000000000 / 0000000000 / EMAILFATTOURÉ@BOOKING.COM
        </p>
    </footer>

</body>
</html>
