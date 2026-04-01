<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fat Touré - Actrice</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;700&family=Great+Vibes&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .font-script {
            font-family: 'Photograph Signature', cursive;
        }
        .text-custom-red {
            color: #d10024;
        }
    </style>
</head>
<body class="font-sans min-h-screen bg-white">
    
    <div class="flex flex-col md:flex-row md:h-screen">
        
        <!-- Content Section -->
        <div class="w-full md:w-1/2 flex flex-col justify-between p-6 md:p-16 relative bg-white">
            
            <!-- Navigation -->
            <nav class="flex justify-between items-center text-[10px] md:text-xs font-bold tracking-widest uppercase text-gray-800 mb-12 md:mb-0">
                <!-- Hamburger Menu for Mobile -->
                <div class="md:hidden">
                    <button class="p-2 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Desktop Menu -->
                <ul class="hidden md:flex space-x-4 md:space-x-8">
                    <li><a href="#" class="hover:text-custom-red transition-colors">BIOGRAPHIE</a></li>
                    <li><a href="#" class="hover:text-custom-red transition-colors">FILMOGRAPHIE</a></li>
                    <li><a href="#" class="hover:text-custom-red transition-colors">ACTUALITÉ</a></li>
                    <li><a href="#" class="hover:text-custom-red transition-colors">AGENDA</a></li>
                    <li><a href="#" class="hover:text-custom-red transition-colors">BOOKING</a></li>
                </ul>

                <div class="flex items-center cursor-pointer hover:text-custom-red transition-colors">
                    FR
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </nav>

            <!-- Main Title -->
            <div class="flex-grow flex items-center justify-start md:justify-center py-12 md:py-0">
                <div class="relative w-full max-w-lg md:max-w-none">
                    <h1 class="text-[40px] md:text-6xl lg:text-7xl font-light text-gray-800 uppercase leading-[1.1] tracking-tight">
                        BIENVENUE<br>
                        SUR LE SITE DE<br>
                        <span class="text-6xl md:text-[100px] lg:text-[120px] font-normal block mt-2">FAT TOURÉ</span> 
                    </h1>
                    <div class="absolute -bottom-6 md:-bottom-20 left-1/3 md:left-1/2 transform -translate-x-1/4">
                        <span class="font-script text-6xl md:text-8xl lg:text-9xl text-custom-red -rotate-12 block">Actrice</span>
                    </div>
                </div>
            </div>

            <!-- Spacer for bottom balance -->
            <div class="hidden md:block h-8"></div>
        </div>

        <!-- Image Section -->
        <div class="w-full md:w-1/2 h-[60vh] md:h-full relative">
            <img src="{{ asset('img/accueil-actrice.jpg') }}" alt="Fat Touré" class="w-full h-full object-cover">
        </div>

    </div>

    <!-- BIOGRAPHIE Section -->
    <section class="bg-gray-200 py-32 px-6 md:px-24">
        <div class="max-w-[1400px] mx-auto">
            <h2 class="text-5xl md:text-6xl font-light text-center text-gray-800 uppercase tracking-[0.3em] mb-40">
                BIOGRAPHIE
            </h2>

            <div class="flex flex-col lg:flex-row items-start justify-between gap-16 mb-48">
                <div class="w-full sm:w-[220px] h-[280px] flex-shrink-0 overflow-hidden rounded-[40px] shadow-lg">
                    <img src="{{ asset('img/imagebio3.jpg') }}" alt="Fat Touré Portrait" class="w-full h-full object-cover">
                </div>

                <div class="flex-grow max-w-2xl text-gray-800">
                    <h3 class="text-3xl md:text-4xl font-normal uppercase leading-[1.2] tracking-tight mb-8">
                        LOREM IPSUM DOLOR SIT AMET<br>
                        CONSECTETUR. DONEC IACULIS LOREM<br>
                        IPSUM DOLOR SIT AMET CONSECTETUR.<br>
                        DONEC IACULISLOREM IPSUM DOLOR SIT<br>
                        AMET CONSECTETUR. DONEC IACULIS
                    </h3>
                    <div class="text-base leading-relaxed opacity-70">
                        <p>
                            Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum. Et bibendum tortor mauris et. Pretium risus vitae amet interdum quisque. Fermentum pellentesque sagittis consequat pellentesque in purus lorem ac. Eleifend et vitae tincidunt non et id tortor blandit.
                        </p>
                        <p class="mt-4">
                            Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum.
                        </p>
                    </div>
                </div>

                <div class="w-full lg:w-[480px] aspect-[4/5] overflow-hidden rounded-[40px] shadow-xl">
                    <img src="{{ asset('img/imagebio1.jpg') }}" alt="Fat Touré Bio 1" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="flex flex-col lg:flex-row items-start gap-24">
                <div class="w-full lg:w-[380px] aspect-[3/4] overflow-hidden rounded-[40px] shadow-xl">
                    <img src="{{ asset('img/imagebio2.jpg') }}" alt="Fat Touré Bio 2" class="w-full h-full object-cover">
                </div>

                <div class="flex-grow max-w-3xl text-gray-800">
                    <h3 class="text-3xl md:text-4xl font-normal uppercase leading-[1.2] tracking-tight mb-8">
                        LOREM IPSUM DOLOR SIT AMET<br>
                        CONSECTETUR. DONEC IACULIS
                    </h3>
                    <div class="text-base leading-relaxed space-y-6 opacity-70">
                        <p>
                            Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum. Et bibendum tortor mauris et. Pretium risus vitae amet interdum quisque. Fermentum pellentesque sagittis consequat pellentesque in purus lorem ac. Eleifend et vitae tincidunt non et id tortor blandit.
                        </p>
                        <p>
                            Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum. Et bibendum tortor mauris et. Pretium risus vitae amet interdum quisque. Fermentum pellentesque sagittis consequat pellentesque in purus lorem ac. Eleifend et vitae tincidunt non et id tortor blandit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
