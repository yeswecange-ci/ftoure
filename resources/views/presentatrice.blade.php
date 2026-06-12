@extends('layouts.page')

@section('page-title', 'Présentatrice')
@section('hero-label', 'Présentatrice')
@section('translate-element-class', 'hidden')

@section('nav-items')
<li><a href="#biography" class="hover:text-custom-red transition-colors">BIOGRAPHIE</a></li>
<li><a href="#actualite" class="hover:text-custom-red transition-colors">ACTUALITÉ</a></li>
<li><a href="#booking"   class="hover:text-custom-red transition-colors">BOOKING</a></li>
@endsection

@section('image-overlay')
    {{-- Sélecteur de langue FR / EN --}}
    <div class="absolute right-4 top-4 z-20">
        <button type="button" id="lang-toggle"
                class="flex items-center gap-2 rounded-full bg-white/80 px-4 py-2 text-xs font-bold tracking-widest uppercase text-gray-900 shadow backdrop-blur">
            <span id="lang-label">fr</span>
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/>
            </svg>
        </button>
        <div id="lang-menu" class="mt-2 hidden w-24 overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-black/5">
            <button type="button" class="w-full px-4 py-2 text-left text-xs font-bold tracking-widest uppercase text-gray-900 hover:bg-gray-100" data-lang="fr">fr</button>
            <button type="button" class="w-full px-4 py-2 text-left text-xs font-bold tracking-widest uppercase text-gray-900 hover:bg-gray-100" data-lang="en">en</button>
        </div>
    </div>
@endsection

@section('sections')

    {{-- ACTUALITÉ / PRESSE --}}
    <section id="actualite" class="py-16 px-4 md:py-[100px] md:px-0 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <h2 class="text-3xl md:text-6xl font-light text-center text-gray-800 uppercase tracking-[0.3em] mb-12 md:mb-20">
                ACTUALITÉ / PRESSE
            </h2>

            @if ($featuredNews = $page->news->where('is_featured', true)->first())
            <div class="w-full aspect-[21/9] overflow-hidden rounded-[30px] mb-12 shadow-sm">
                @if($featuredNews->image)
                <img src="{{ image_url($featuredNews->image) }}" alt="Fat Touré Actualité" class="w-full h-full object-cover">
                @endif
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                @foreach ($page->news as $news)
                @php($newsModal = ['title' => $news->title, 'description' => $news->description, 'image' => image_url($news->image), 'link' => $news->link])
                <div class="flex flex-col">
                    <div class="aspect-square overflow-hidden rounded-[30px] mb-6 shadow-sm">
                        @if($news->image)
                        <img src="{{ image_url($news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="px-2">
                        <h3 class="text-xl font-bold uppercase tracking-tight mb-4 text-gray-900 leading-tight">{{ $news->title }}</h3>
                        <p class="text-sm text-gray-600 font-light leading-relaxed mb-4">
                            {{ Str::limit($news->description, 150) }}
                            <a href="#" data-news-modal='@json($newsModal)' class="text-red-500 underline">Lire la suite</a>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

     {{-- TEASERS --}}
    <section id="teasers" class="py-16 px-4 md:py-32 md:px-0 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <h2 class="text-3xl md:text-6xl font-light text-center text-gray-800 uppercase tracking-[0.3em] mb-12 md:mb-20">
                TEASERS
            </h2>

            <div id="teasers-scroller" class="-mx-4 px-4 flex gap-8 overflow-x-auto scroll-smooth snap-x snap-mandatory hide-scrollbar mb-16 py-8">
                @foreach ($page->teasers as $teaser)
                @php($teaserModal = [
                    'title'      => $teaser->title,
                    'videoUrl'   => $teaser->video_url,
                    'videoFile'  => $teaser->video_file ? image_url($teaser->video_file) : null,
                ])
                <div class="w-[360px] flex-shrink-0 snap-start bg-white rounded-[30px] overflow-hidden shadow-lg border border-gray-100 group" data-teaser-card>
                    <div class="relative aspect-square">
                        @if($teaser->poster_image)
                        <img src="{{ image_url($teaser->poster_image) }}" alt="{{ $teaser->title }}" class="w-full h-full object-cover">
                        @endif
                        @if($teaser->video_url || $teaser->video_file)
                        <div class="absolute bottom-6 right-6">
                            <a href="#" data-teaser-modal='@json($teaserModal)'
                               class="w-16 h-16 bg-[#00818a] rounded-full flex items-center justify-center text-white shadow-xl hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="p-8">
                        <p class="text-gray-500 font-light text-lg mb-1">Teaser</p>
                        <h3 class="text-xl md:text-2xl font-bold uppercase tracking-tight text-gray-900">{{ $teaser->title }}</h3>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="flex items-center justify-center gap-8">
                <button type="button" id="teasers-prev" class="text-red-600 hover:scale-125 transition-transform disabled:opacity-30 disabled:hover:scale-100" aria-label="Précédent">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
                </button>
                <div id="teasers-progress-track" class="w-64 h-[2px] bg-gray-200 relative overflow-hidden rounded">
                    <div id="teasers-progress-indicator" class="absolute left-0 top-0 h-full bg-gray-900"></div>
                </div>
                <button type="button" id="teasers-next" class="text-red-600 hover:scale-125 transition-transform disabled:opacity-30 disabled:hover:scale-100" aria-label="Suivant">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
                </button>
            </div>
        </div>
    </section>

@endsection

@section('extra-scripts')
<script>
    // Sélecteur de langue personnalisé (FR / EN)
    (function () {
        var toggle = document.getElementById('lang-toggle');
        var menu   = document.getElementById('lang-menu');
        var label  = document.getElementById('lang-label');

        function readCookie(name) {
            var m = document.cookie.match(new RegExp('(?:^|; )' + name.replace(/([$?*|{}\[\]\\\/\+\^])/g, '\\$1') + '=([^;]*)'));
            return m ? decodeURIComponent(m[1]) : '';
        }

        function currentLang() {
            var parts = (readCookie('googtrans') || '').split('/');
            return (parts[parts.length - 1] === 'en') ? 'en' : 'fr';
        }

        function setLang(next) {
            var value = '/fr/' + (next === 'en' ? 'en' : 'fr');
            document.cookie = 'googtrans=' + value + ';path=/';
            document.cookie = 'googtrans=' + value + ';path=/;domain=' + location.hostname;
            location.reload();
        }

        if (label) label.textContent = currentLang();

        if (toggle) toggle.addEventListener('click', function () {
            menu && menu.classList.toggle('hidden');
        });

        if (menu) menu.querySelectorAll('[data-lang]').forEach(function (btn) {
            btn.addEventListener('click', function () { setLang(btn.getAttribute('data-lang')); });
        });

        document.addEventListener('click', function (e) {
            if (!toggle || !menu) return;
            if (!toggle.contains(e.target) && !menu.contains(e.target)) menu.classList.add('hidden');
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && menu) menu.classList.add('hidden');
        });
    })();
</script>
@endsection
