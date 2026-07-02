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
        .font-script {
            font-family: 'Great Vibes', cursive;
        }
        .text-custom-red {
            color: #d10024;
        }
        .bg-agenda-gradient {
            background: linear-gradient(135deg, #108EA0 50%, #C5053C 70%);
        }
        @media (max-width: 767px) {
            #agenda {
                background: #000000;
            }
        }
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }
        body {
            top: 0 !important;
        }
        .goog-logo-link,
        .goog-te-gadget span {
            display: none !important;
        }
        .goog-te-gadget {
            color: transparent !important;
        }
        .hide-scrollbar {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="font-sans min-h-screen bg-white">

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 z-50 hidden flex-col bg-white p-8">
        <div class="flex justify-end mb-8">
            <button id="mobile-menu-close" class="p-2 focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <ul class="flex flex-col space-y-6 text-sm font-bold tracking-widest uppercase text-gray-800">
            @yield('nav-items')
        </ul>
    </div>

    <div class="flex flex-col md:flex-row md:h-screen">

        <!-- Content Section -->
        <div class="w-full md:w-1/2 flex flex-col justify-between p-6 md:p-16 relative bg-white">

            <!-- Navigation -->
            <nav class="flex items-center z-10 text-[10px] md:text-xs font-bold tracking-widest uppercase text-gray-800 mb-12 md:mb-0">
                <ul class="hidden md:flex space-x-4 md:space-x-8">
                    @yield('nav-items')
                </ul>

                <!--<div id="google_translate_element" class="md:ml-auto @yield('translate-element-class', 'text-gray-800')"></div>-->

                <!-- Hamburger à droite sur mobile -->
                <button id="mobile-menu-open" class="md:hidden ml-auto p-2 focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </nav>

            <!-- Main Title -->
            <div class="flex-grow flex items-center justify-start md:justify-center py-12 md:py-0">
                <div class="relative w-full max-w-lg md:max-w-none">
                    <h1 class="text-[40px] md:text-6xl lg:text-6xl font-light text-gray-800 uppercase leading-[1.1] tracking-tight">
                        {{ $page->title }}<br>

                        <span class="text-6xl md:text-[100px] lg:text-[100px] font-normal block mt-2">{{ $page->subtitle }}</span>
                    </h1>
                    <div class="absolute @yield('hero-label-offset', '-bottom-6 md:-bottom-20') z-10left-1/3 md:left-1/2 transform -translate-x-1/4">
                        <span class="font-script text-6xl md:text-7xl lg:text-8xl text-custom-red -rotate-12 block">@yield('hero-label')</span>
                    </div>
                </div>
            </div>

            <div class="hidden md:block h-8"></div>
        </div>

        <!-- Image Section -->
        <div class="w-full md:w-1/2 h-[60vh] md:h-full relative">
            @yield('image-overlay')
            @if($page->header_image)
            <img src="{{ image_url($page->header_image) }}" alt="Fat Touré" class="w-full h-full object-cover">
            @endif
        </div>

    </div>

    <!-- BIOGRAPHIE Section (identique sur toutes les pages) -->
    @include('partials.biography')

    <!-- Sections propres à chaque page (filmographie, actualité, agenda, teasers…) -->
    @yield('sections')

    <!-- BOOKING Section (identique sur toutes les pages) -->
    <section id="booking" class="py-16 px-4 md:py-32 md:px-0 bg-white text-center">
        <div class="container mx-auto px-4 max-w-4xl">
            <h2 class="text-3xl md:text-6xl font-light text-gray-800 uppercase tracking-[0.3em] mb-10 md:mb-12">
                BOOKING
            </h2>
            <p class="text-gray-500 font-light leading-relaxed mb-12 max-w-2xl mx-auto">
                {{ $page->booking_description }}
            </p>
            @php($telHref = 'tel:'.preg_replace('/[^0-9+]/', '', (string) $page->booking_phone))
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                @if($page->booking_phone)
                <a href="{{ $telHref }}" class="inline-flex w-full sm:w-auto items-center justify-center gap-3 rounded-full bg-[#d10024] px-8 py-4 text-base md:text-lg font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-[#a80017]">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    Appeler
                </a>
                @endif
                @if($page->booking_email)
                <a href="mailto:{{ $page->booking_email }}" class="inline-flex w-full sm:w-auto items-center justify-center gap-3 rounded-full border-2 border-gray-900 px-8 py-4 text-base md:text-lg font-bold uppercase tracking-wider text-gray-900 transition hover:bg-gray-900 hover:text-white">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    Écrire un email
                </a>
                @endif
            </div>
        </div>
    </section>

    <!-- SOCIAL MEDIA Section (identique sur toutes les pages) -->
    @include('partials.social')

    <!-- DÉCOUVREZ AUSSI — les autres univers -->
    @php($otherUniverses = $universes->where('slug', '!=', $page->slug))
    @if($otherUniverses->isNotEmpty())
    <section class="bg-[#0d0d0d] py-16 md:py-24 px-4">
        <div class="max-w-7xl mx-auto">
            <p class="text-center text-[20px] font-bold tracking-[0.4em] uppercase text-white/40 mb-10 md:mb-16">
                DÉCOUVREZ AUSSI
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-6 justify-items-center">
                @foreach($otherUniverses as $universe)
                <a href="{{ \Illuminate\Support\Facades\Route::has($universe->slug) ? route($universe->slug) : '#' }}"
                class="group relative aspect-[3/4] w-full max-w-[240px] overflow-hidden rounded-2xl block">

                    @if($universe->card_image_url)
                    <img src="{{ $universe->card_image_url }}"
                        alt="{{ $universe->display_name }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent"></div>

                    <span class="absolute bottom-4 left-4 right-4 text-white font-bold uppercase tracking-[0.15em] text-xs md:text-sm leading-snug">
                        {{ $universe->display_name }}
                    </span>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Footer -->
    <footer class="py-12 bg-[#111] border-t border-white/5">
        <div class="container mx-auto px-4 text-center">
            <p class="text-[10px] md:text-xs tracking-[0.2em] font-bold uppercase opacity-60 text-white">
                BOOKING : {{ $page->booking_phone }} / {{ $page->booking_email }}
            </p>
        </div>
    </footer>

    <!-- News Modal (identique sur toutes les pages) -->
    <div id="news-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/70" data-news-modal-close></div>
        <div class="relative w-full max-w-2xl overflow-hidden rounded-2xl bg-white shadow-2xl">
            <button type="button" class="absolute right-4 top-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-gray-900 shadow hover:bg-white" data-news-modal-close aria-label="Fermer">
                <span class="text-2xl leading-none">×</span>
            </button>
            <div class="aspect-[21/9] bg-gray-100">
                <img id="news-modal-image" src="" alt="" class="h-full w-full object-cover hidden">
            </div>
            <div class="p-6 md:p-8">
                <h3 id="news-modal-title" class="text-lg md:text-2xl font-bold uppercase tracking-tight text-gray-900"></h3>
                <p id="news-modal-description" class="mt-4 text-sm md:text-base font-light leading-relaxed text-gray-700 whitespace-pre-line"></p>
                <div class="mt-8 flex flex-wrap items-center justify-end gap-4">
                    <a id="news-modal-link" href="#" target="_blank" rel="noopener noreferrer" class="text-red-500 underline hidden">Ouvrir le lien</a>
                    <a id="news-modal-detail" href="#" style="display:none" class="items-center gap-2 rounded-full bg-[#d10024] px-7 py-3 text-sm font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-[#a80017]">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                        Voir la galerie
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals propres à chaque page (ex: teaser modal) -->
    @yield('extra-modals')

    <script>
        // Hamburger menu mobile
        (function () {
            var openBtn  = document.getElementById('mobile-menu-open');
            var closeBtn = document.getElementById('mobile-menu-close');
            var menu     = document.getElementById('mobile-menu');
            if (!openBtn || !closeBtn || !menu) return;
            openBtn.addEventListener('click', function () {
                menu.classList.remove('hidden');
                menu.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            });
            closeBtn.addEventListener('click', function () {
                menu.classList.add('hidden');
                menu.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            });
        })();

        // News modal
        (function () {
            var modal  = document.getElementById('news-modal');
            if (!modal) return;
            var titleEl = document.getElementById('news-modal-title');
            var descEl  = document.getElementById('news-modal-description');
            var imgEl   = document.getElementById('news-modal-image');
            var linkEl  = document.getElementById('news-modal-link');
            var detailEl = document.getElementById('news-modal-detail');

            function openModal(p) {
                titleEl.textContent = p.title || '';
                descEl.textContent  = p.description || '';
                if (p.image) {
                    imgEl.src = p.image; imgEl.alt = p.title || '';
                    imgEl.classList.remove('hidden');
                } else {
                    imgEl.src = ''; imgEl.classList.add('hidden');
                }
                if (detailEl) {
                    if (p.detailUrl) {
                        detailEl.href = p.detailUrl; detailEl.style.display = 'inline-flex';
                    } else {
                        detailEl.href = '#'; detailEl.style.display = 'none';
                    }
                }
                if (p.link && p.link !== '#') {
                    linkEl.href = p.link; linkEl.classList.remove('hidden');
                } else {
                    linkEl.href = '#'; linkEl.classList.add('hidden');
                }
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            }

            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }

            document.querySelectorAll('[data-news-modal]').forEach(function (trigger) {
                trigger.addEventListener('click', function (e) {
                    e.preventDefault();
                    try { openModal(JSON.parse(trigger.getAttribute('data-news-modal') || '{}')); }
                    catch (_) { openModal({}); }
                });
            });
            modal.querySelectorAll('[data-news-modal-close]').forEach(function (btn) {
                btn.addEventListener('click', closeModal);
            });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModal();
            });
        })();
    </script>

    <!-- Scripts propres à chaque page (ex: teasers carousel) -->
    @yield('extra-scripts')

    <script>
        // Détection langue navigateur → cookie googtrans
        (function () {
            var lang = (navigator.language || navigator.userLanguage || 'fr').toLowerCase();
            var target = lang.startsWith('en') ? 'en' : null;
            if (!target || document.cookie.indexOf('googtrans=') !== -1) return;
            var value = '/fr/' + target;
            document.cookie = 'googtrans=' + value + ';path=/';
            document.cookie = 'googtrans=' + value + ';path=/;domain=' + location.hostname;
        })();

        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                { pageLanguage: 'fr', includedLanguages: 'fr,en', autoDisplay: false },
                'google_translate_element'
            );
        }
    </script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>
