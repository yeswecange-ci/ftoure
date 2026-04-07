<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fat Touré - Presentatrice</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .font-script {
            font-family: 'Photograph Signature', cursive;
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
    
    <div class="flex flex-col md:flex-row md:h-screen">
        
        <div class="w-full md:w-1/2 flex flex-col justify-between p-6 md:p-16 relative bg-white">
            
            <nav class="flex justify-between items-center text-[10px] md:text-xs font-bold tracking-widest uppercase text-gray-800 mb-12 md:mb-0">
                <div class="md:hidden">
                    <button class="p-2 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <ul class="hidden md:flex space-x-4 md:space-x-8">
                    <li><a href="#biography" class="hover:text-custom-red transition-colors">BIOGRAPHIE</a></li>
                    <li><a href="#filmography" class="hover:text-custom-red transition-colors">FILMOGRAPHIE</a></li>
                    <li><a href="#actualite" class="hover:text-custom-red transition-colors">ACTUALITÉ</a></li>
                    <li><a href="#agenda" class="hover:text-custom-red transition-colors">AGENDA</a></li>
                    <li><a href="#booking" class="hover:text-custom-red transition-colors">BOOKING</a></li>
                </ul>

            </nav>

            <div class="flex-grow flex items-center justify-start md:justify-center py-12 md:py-0">
                <div class="relative w-full max-w-lg md:max-w-none">
                    <h1 class="text-[40px] md:text-6xl lg:text-7xl font-light text-gray-800 uppercase leading-[1.1] tracking-tight">
                        {{ $page->title }}<br>
                        SUR LE SITE DE<br>
                        <span class="text-6xl md:text-[100px] lg:text-[120px] font-normal block mt-2">{{ $page->subtitle }}</span> 
                    </h1>
                    <div class="absolute -bottom-6 md:-bottom-20 left-1/3 md:left-1/2 transform -translate-x-1/4">
                        <span class="font-script text-6xl md:text-8xl lg:text-9xl text-custom-red -rotate-12 block">Présentatrice</span>
                    </div>
                </div>
            </div>

            <div class="hidden md:block h-8"></div>
        </div>

        <div class="w-full md:w-1/2 h-[60vh] md:h-full relative">
            <div class="absolute right-4 top-4 z-20">
                <button type="button" id="lang-toggle" class="flex items-center gap-2 rounded-full bg-white/80 px-4 py-2 text-xs font-bold tracking-widest uppercase text-gray-900 shadow backdrop-blur">
                    <span id="lang-label">fr</span>
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"></path>
                    </svg>
                </button>
                <div id="lang-menu" class="mt-2 hidden w-24 overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-black/5">
                    <button type="button" class="w-full px-4 py-2 text-left text-xs font-bold tracking-widest uppercase text-gray-900 hover:bg-gray-100" data-lang="fr">fr</button>
                    <button type="button" class="w-full px-4 py-2 text-left text-xs font-bold tracking-widest uppercase text-gray-900 hover:bg-gray-100" data-lang="en">en</button>
                </div>
                <div id="google_translate_element" class="hidden"></div>
            </div>
            <img src="{{ Str::startsWith($page->header_image, 'img/') ? asset($page->header_image) : Storage::url($page->header_image) }}" alt="Fat Touré" class="w-full h-full object-cover">
        </div>

    </div>

    <!-- BIOGRAPHIE Section -->
    <section class="bg-gray-200 py-16 px-4 md:py-32 md:px-24">
        <div class="max-w-[1400px] mx-auto">
            <h2 class="text-3xl md:text-6xl font-light text-center text-gray-800 uppercase tracking-[0.3em] mb-12 md:mb-40">
                BIOGRAPHIE
            </h2>

            <div class="md:hidden space-y-10">
                <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-gray-800 leading-relaxed">
                    {!! nl2br(e($page->bio_title)) !!}
                </h3>
                <p class="text-sm text-gray-700 leading-relaxed opacity-80">
                    {{ $page->bio_content }}
                </p>
                <div class="w-full overflow-hidden rounded-[30px] shadow-lg">
                    <img src="{{ Str::startsWith($page->bio_image_1, 'img/') ? asset($page->bio_image_1) : Storage::url($page->bio_image_1) }}" alt="Fat Touré Bio 1" class="w-full h-full object-cover">
                </div>
                <p class="text-sm text-gray-700 leading-relaxed opacity-80">
                    {{ $page->bio_content }}
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="aspect-[3/4] overflow-hidden rounded-[24px] shadow-md">
                        <img src="{{ Str::startsWith($page->bio_image_2, 'img/') ? asset($page->bio_image_2) : Storage::url($page->bio_image_2) }}" alt="Fat Touré Bio 2" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-[3/4] overflow-hidden rounded-[24px] shadow-md">
                        <img src="{{ Str::startsWith($page->bio_image_3, 'img/') ? asset($page->bio_image_3) : Storage::url($page->bio_image_3) }}" alt="Fat Touré Portrait" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <div class="hidden md:flex flex-col lg:flex-row items-start justify-between gap-16 mb-48">
                <div class="w-full sm:w-[220px] h-[280px] flex-shrink-0 overflow-hidden rounded-[40px] shadow-lg">
                    <img src="{{ Str::startsWith($page->bio_image_3, 'img/') ? asset($page->bio_image_3) : Storage::url($page->bio_image_3) }}" alt="Fat Touré Portrait" class="w-full h-full object-cover">
                </div>

                <div class="flex-grow max-w-2xl text-gray-800">
                    <h3 class="text-3xl md:text-4xl font-normal uppercase leading-[1.2] tracking-tight mb-8">
                        {!! nl2br(e($page->bio_title)) !!}
                    </h3>
                    <div class="text-base leading-relaxed opacity-70">
                        <p>
                            {{ $page->bio_content }}
                        </p>
                    </div>
                </div>

                <div class="w-full lg:w-[480px] aspect-[4/5] overflow-hidden rounded-[40px] shadow-xl">
                    <img src="{{ Str::startsWith($page->bio_image_1, 'img/') ? asset($page->bio_image_1) : Storage::url($page->bio_image_1) }}" alt="Fat Touré Bio 1" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="hidden md:flex flex-col lg:flex-row items-start gap-24">
                <div class="w-full lg:w-[380px] aspect-[3/4] overflow-hidden rounded-[40px] shadow-xl">
                    <img src="{{ Str::startsWith($page->bio_image_2, 'img/') ? asset($page->bio_image_2) : Storage::url($page->bio_image_2) }}" alt="Fat Touré Bio 2" class="w-full h-full object-cover">
                </div>

                <div class="flex-grow max-w-3xl text-gray-800">
                    <h3 class="text-3xl md:text-4xl font-normal uppercase leading-[1.2] tracking-tight mb-8">
                        LOREM IPSUM DOLOR SIT AMET<br>
                        CONSECTETUR. DONEC IACULIS
                    </h3>
                    <div class="text-base leading-relaxed space-y-6 opacity-70">
                        <p>
                            {{ $page->bio_content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 px-4 md:py-[100px] md:px-0 bg-white" id="actualite">
        <div class="container mx-auto px-4 max-w-7xl">
            <h2 class="text-3xl md:text-6xl font-light text-center text-gray-800 uppercase tracking-[0.3em] mb-12 md:mb-20">
                ACTUALITÉ / PRESSE
            </h2>

            @if ($featuredNews = $page->news->where('is_featured', true)->first())
            <div class="w-full aspect-[21/9] overflow-hidden rounded-[30px] mb-12 shadow-sm">
                <img src="{{ Str::startsWith($featuredNews->image, 'img/') ? asset($featuredNews->image) : Storage::url($featuredNews->image) }}" alt="Fat Touré Actualité" class="w-full h-full object-cover">
            </div>
            @endif

            <div class="md:hidden -mx-4 px-4 overflow-x-auto hide-scrollbar">
                <div class="flex gap-4 pb-2 snap-x snap-mandatory">
                    @foreach ($page->news as $news)
                    <div class="w-[78vw] max-w-[340px] flex-shrink-0 snap-start">
                        <div class="flex flex-col">
                            <div class="aspect-square overflow-hidden rounded-[26px] mb-5 shadow-sm">
                                <img src="{{ Str::startsWith($news->image, 'img/') ? asset($news->image) : Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                            </div>
                            <div class="px-1">
                                <h3 class="text-base font-bold uppercase tracking-tight mb-2 text-gray-900 leading-tight">
                                    {{ $news->title }}
                                </h3>
                                <p class="text-sm text-gray-600 font-light leading-relaxed">
                                    @php($newsModalPayload = ['title' => $news->title, 'description' => $news->description, 'image' => (Str::startsWith($news->image, 'img/') ? asset($news->image) : Storage::url($news->image)), 'link' => $news->link])
                                    {{ Str::limit($news->description, 120) }} <a href="#" data-news-modal='@json($newsModalPayload)' class="text-red-500 underline">Lire la suite</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="hidden md:grid grid-cols-3 gap-12">
                @foreach ($page->news as $news)
                <div class="flex flex-col">
                    <div class="aspect-square overflow-hidden rounded-[30px] mb-6 shadow-sm">
                        <img src="{{ Str::startsWith($news->image, 'img/') ? asset($news->image) : Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                    </div>
                    <div class="px-2">
                        <h3 class="text-xl font-bold uppercase tracking-tight mb-4 text-gray-900 leading-tight">
                            {{ $news->title }}
                        </h3>
                        <p class="text-sm text-gray-600 font-light leading-relaxed mb-4">
                            @php($newsModalPayload = ['title' => $news->title, 'description' => $news->description, 'image' => (Str::startsWith($news->image, 'img/') ? asset($news->image) : Storage::url($news->image)), 'link' => $news->link])
                            {{ Str::limit($news->description, 150) }} <a href="#" data-news-modal='@json($newsModalPayload)' class="text-red-500 underline">Lire la suite</a>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- BOOKING Section -->
    <section class="py-16 px-4 md:py-32 md:px-0 bg-white text-center" id="booking">
        <div class="container mx-auto px-4 max-w-4xl">
            <h2 class="text-3xl md:text-6xl font-light text-gray-800 uppercase tracking-[0.3em] mb-10 md:mb-12">
                BOOKING
            </h2>
            
            <p class="text-gray-500 font-light leading-relaxed mb-12 max-w-2xl mx-auto">
                {{ $page->booking_description }}
            </p>

            <div class="space-y-4">
                <p class="text-xl md:text-2xl font-bold text-gray-900 tracking-wider">
                    {{ $page->booking_phone }}
                </p>
                <p class="text-xl md:text-2xl font-bold text-gray-900 tracking-wider">
                    {{ $page->booking_email }}
                </p>
            </div>
        </div>
    </section>

    <!-- SOCIAL MEDIA Section -->
    <section class="bg-[#111] text-white py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-sm md:text-base font-bold uppercase tracking-[0.3em] mb-8">
                    SUIVEZ-MOI SUR MES RÉSEAUX
                </h2>
                
                <div class="flex justify-center gap-6">
                    @foreach ($page->socialLinks as $link)
                    <a href="{{ $link->url }}" class="w-10 h-10 border border-white/20 rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all duration-300">
                        @if ($link->platform == 'facebook')
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.14H7v4.21h2.5V23h5V11.67h3.77l.5-4.21z"/></svg>
                        @elseif ($link->platform == 'instagram')
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        @elseif ($link->platform == 'tiktok')
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.043 2.619-.043 3.93 0 .58.08 1.15.174 1.71.355.51.156.93.473 1.32.852.39.39.706.807.862 1.318.18.56.274 1.13.354 1.71.044 1.31.044 2.619 0 3.93-.08.58-.174 1.15-.354 1.71-.156.51-.472.93-.862 1.32-.39.39-.81.706-1.32.862-.56.18-1.13.274-1.71.354-1.31.044-2.619.044-3.93 0-.58-.08-1.15-.174-1.71-.354-.51-.156-.93-.472-1.32-.862-.39-.39-.706-.81-.862-1.32-.18-.56-.274-1.13-.354-1.71-.044-1.31-.044-2.619 0-3.93.08-.58.174-1.15.354-1.71.156-.51.472-.93.862-1.318.39-.39.81-.706 1.32-.862.56-.18 1.13-.274 1.71-.355zM12 15a3 3 0 100-6 3 3 0 000 6z"/></svg>
                        @elseif ($link->platform == 'x')
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        @endif
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-6 gap-0">
                <img src="{{ asset('img/imagebio3.jpg') }}" alt="Social 1" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
                <img src="{{ asset('img/imagebio1.jpg') }}" alt="Social 2" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
                <img src="{{ asset('img/imagebio2.jpg') }}" alt="Social 3" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
                <img src="{{ asset('img/actualité1.jpg') }}" alt="Social 4" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
                <img src="{{ asset('img/actualité2.jpg') }}" alt="Social 5" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
                <img src="{{ asset('img/accueil-actrice.jpg') }}" alt="Social 6" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
            </div>
        </div>
    </section>

    <footer class="py-12 bg-[#111] border-t border-white/5">
        <div class="container mx-auto px-4 text-center">
            <p class="text-[10px] md:text-xs tracking-[0.2em] font-bold uppercase opacity-60 text-white">
                BOOKING : {{ $page->booking_phone }} / {{ $page->booking_email }}
            </p>
        </div>
    </footer>
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
                <div class="mt-6 flex justify-end">
                    <a id="news-modal-link" href="#" target="_blank" rel="noopener noreferrer" class="text-red-500 underline hidden">Ouvrir le lien</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function () {
            var modal = document.getElementById('news-modal');
            if (!modal) return;

            var titleEl = document.getElementById('news-modal-title');
            var descEl = document.getElementById('news-modal-description');
            var imgEl = document.getElementById('news-modal-image');
            var linkEl = document.getElementById('news-modal-link');

            function openModal(payload) {
                titleEl.textContent = payload.title || '';
                descEl.textContent = payload.description || '';

                var imageUrl = payload.image || '';
                if (imageUrl) {
                    imgEl.src = imageUrl;
                    imgEl.alt = payload.title || '';
                    imgEl.classList.remove('hidden');
                } else {
                    imgEl.src = '';
                    imgEl.alt = '';
                    imgEl.classList.add('hidden');
                }

                var link = payload.link || '';
                if (link && link !== '#') {
                    linkEl.href = link;
                    linkEl.classList.remove('hidden');
                } else {
                    linkEl.href = '#';
                    linkEl.classList.add('hidden');
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
                    try {
                        var payload = JSON.parse(trigger.getAttribute('data-news-modal') || '{}');
                        openModal(payload);
                    } catch (_) {
                        openModal({ title: '', description: '' });
                    }
                });
            });

            modal.querySelectorAll('[data-news-modal-close]').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    closeModal();
                });
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        })();
    </script>
    <script>
        (function () {
            var userLang = (navigator.language || navigator.userLanguage || 'fr').toLowerCase();
            var target = userLang.startsWith('en') ? 'en' : null;
            if (!target) return;
            if (document.cookie.indexOf('googtrans=') !== -1) return;
            var value = '/fr/' + target;
            document.cookie = 'googtrans=' + value + ';path=/';
            document.cookie = 'googtrans=' + value + ';path=/;domain=' + location.hostname;
        })();

        (function () {
            var toggle = document.getElementById('lang-toggle');
            var menu = document.getElementById('lang-menu');
            var label = document.getElementById('lang-label');

            function readCookie(name) {
                var match = document.cookie.match(new RegExp('(?:^|; )' + name.replace(/([$?*|{}\[\]\\\/\+\^])/g, '\\$1') + '=([^;]*)'));
                return match ? decodeURIComponent(match[1]) : '';
            }

            function currentLang() {
                var v = readCookie('googtrans');
                var parts = (v || '').split('/');
                var lang = parts[parts.length - 1] || 'fr';
                return (lang === 'en' ? 'en' : 'fr');
            }

            function setLang(next) {
                var lang = next === 'en' ? 'en' : 'fr';
                var value = '/fr/' + lang;
                document.cookie = 'googtrans=' + value + ';path=/';
                document.cookie = 'googtrans=' + value + ';path=/;domain=' + location.hostname;
                if (label) label.textContent = lang;
                location.reload();
            }

            function setMenuOpen(open) {
                if (!menu) return;
                menu.classList.toggle('hidden', !open);
            }

            if (label) label.textContent = currentLang();

            if (toggle) {
                toggle.addEventListener('click', function () {
                    var isHidden = !menu || menu.classList.contains('hidden');
                    setMenuOpen(isHidden);
                });
            }

            if (menu) {
                menu.querySelectorAll('[data-lang]').forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        setLang(btn.getAttribute('data-lang') || 'fr');
                    });
                });
            }

            document.addEventListener('click', function (e) {
                if (!toggle || !menu) return;
                if (toggle.contains(e.target) || menu.contains(e.target)) return;
                setMenuOpen(false);
            });

            document.addEventListener('keydown', function (e) {
                if (e.key !== 'Escape') return;
                setMenuOpen(false);
            });
        })();

        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                {
                    pageLanguage: 'fr',
                    includedLanguages: 'fr,en',
                    autoDisplay: false,
                },
                'google_translate_element'
            );
        }
    </script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>
