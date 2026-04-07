@extends('layouts.page')

@section('page-title', 'Actrice')
@section('hero-label', 'Actrice')

@section('nav-items')
<li><a href="#biography"    class="hover:text-custom-red transition-colors">BIOGRAPHIE</a></li>
<li><a href="#filmographie" class="hover:text-custom-red transition-colors">FILMOGRAPHIE</a></li>
<li><a href="#actualite"    class="hover:text-custom-red transition-colors">ACTUALITÉ</a></li>
<li><a href="#agenda"       class="hover:text-custom-red transition-colors">AGENDA</a></li>
<li><a href="#booking"      class="hover:text-custom-red transition-colors">BOOKING</a></li>
@endsection

@section('sections')

    {{-- FILMOGRAPHIE --}}
    <section id="filmographie" class="py-16 px-4 md:py-[100px] md:px-0 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <h2 class="text-3xl md:text-6xl font-light text-center text-gray-800 uppercase tracking-[0.3em] mb-12 md:mb-20">
                FILMOGRAPHIE
            </h2>

            <div class="md:hidden -mx-4 px-4 overflow-x-auto hide-scrollbar">
                <div class="flex gap-4 pb-2 snap-x snap-mandatory">
                    @foreach ($page->works as $work)
                    <div class="w-[75vw] max-w-[320px] flex-shrink-0 snap-start">
                        <div class="flex flex-col">
                            <div class="aspect-[3/4] overflow-hidden rounded-[26px] mb-5 shadow-sm">
                                @if($work->image)
                                <img src="{{ image_url($work->image) }}" alt="{{ $work->title }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="px-1">
                                <h3 class="text-base font-bold uppercase tracking-tight mb-1 text-gray-900">{{ $work->title }}</h3>
                                <p class="text-sm text-gray-600 font-light">{{ $work->role_or_description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="hidden md:grid grid-cols-3 gap-12">
                @foreach ($page->works as $work)
                <div class="flex flex-col">
                    <div class="aspect-[3/4] overflow-hidden rounded-[30px] mb-6 shadow-sm">
                        @if($work->image)
                        <img src="{{ image_url($work->image) }}" alt="{{ $work->title }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="px-2">
                        <h3 class="text-xl md:text-2xl font-bold uppercase tracking-tight mb-1 text-gray-900">{{ $work->title }}</h3>
                        <p class="text-lg text-gray-600 font-light">{{ $work->role_or_description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

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

            <div class="md:hidden -mx-4 px-4 overflow-x-auto hide-scrollbar">
                <div class="flex gap-4 pb-2 snap-x snap-mandatory">
                    @foreach ($page->news as $news)
                    @php($newsModal = ['title' => $news->title, 'description' => $news->description, 'image' => image_url($news->image), 'link' => $news->link])
                    <div class="w-[78vw] max-w-[340px] flex-shrink-0 snap-start">
                        <div class="flex flex-col">
                            <div class="aspect-square overflow-hidden rounded-[26px] mb-5 shadow-sm">
                                @if($news->image)
                                <img src="{{ image_url($news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="px-1">
                                <h3 class="text-base font-bold uppercase tracking-tight mb-2 text-gray-900 leading-tight">{{ $news->title }}</h3>
                                <p class="text-sm text-gray-600 font-light leading-relaxed">
                                    {{ Str::limit($news->description, 120) }}
                                    <a href="#" data-news-modal='@json($newsModal)' class="text-red-500 underline">Lire la suite</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="hidden md:grid grid-cols-3 gap-12">
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

    {{-- AGENDA --}}
    <section id="agenda" class="bg-agenda-gradient py-16 px-4 md:py-32 md:px-24 text-white">
        <div class="max-w-[1200px] mx-auto">
            <h2 class="text-3xl md:text-6xl font-light text-center uppercase tracking-[0.3em] mb-12 md:mb-20">
                AGENDA
            </h2>

            <div class="border border-white/20 rounded-[30px] overflow-hidden backdrop-blur-sm bg-white/5">
                @foreach ($page->agendas as $event)
                <div class="flex flex-col md:flex-row items-center p-8 md:p-12 border-b border-white/10 last:border-0 gap-8 md:gap-16">
                    <div class="flex flex-col items-center md:items-start flex-shrink-0 w-24">
                        <span class="text-5xl font-bold leading-none">{{ $event->day }}</span>
                        <span class="text-xl font-light uppercase tracking-widest mt-1 opacity-80">{{ $event->month }}</span>
                    </div>

                    <div class="w-full md:w-64 aspect-[3/2] flex-shrink-0 rounded-2xl overflow-hidden shadow-lg">
                        @if($event->image)
                        <img src="{{ image_url($event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                        @endif
                    </div>

                    <div class="flex-grow">
                        <h3 class="text-xl md:text-2xl font-bold uppercase tracking-tight mb-4 leading-tight">{{ $event->title }}</h3>
                        <p class="text-sm md:text-base font-light leading-relaxed opacity-70">{{ $event->description }}</p>
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
                @php($teaserModal = ['title' => $teaser->title, 'videoUrl' => $teaser->video_url])
                <div class="w-[360px] flex-shrink-0 snap-start bg-white rounded-[30px] overflow-hidden shadow-lg border border-gray-100 group" data-teaser-card>
                    <div class="relative aspect-square">
                        @if($teaser->poster_image)
                        <img src="{{ image_url($teaser->poster_image) }}" alt="{{ $teaser->title }}" class="w-full h-full object-cover">
                        @endif
                        <div class="absolute bottom-6 right-6">
                            <a href="#" data-teaser-modal='@json($teaserModal)'
                               class="w-16 h-16 bg-[#00818a] rounded-full flex items-center justify-center text-white shadow-xl hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </a>
                        </div>
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

@section('extra-modals')
    {{-- Teaser Modal --}}
    <div id="teaser-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/80" data-teaser-modal-close></div>
        <div class="relative w-full max-w-4xl overflow-hidden rounded-2xl bg-black shadow-2xl">
            <button type="button" class="absolute right-4 top-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-gray-900 shadow hover:bg-white" data-teaser-modal-close aria-label="Fermer">
                <span class="text-2xl leading-none">×</span>
            </button>
            <div class="aspect-video bg-black">
                <iframe id="teaser-modal-iframe" class="h-full w-full hidden" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>
                <video id="teaser-modal-video" class="h-full w-full hidden" controls playsinline></video>
            </div>
            <div class="p-6 md:p-8 bg-white">
                <h3 id="teaser-modal-title" class="text-lg md:text-2xl font-bold uppercase tracking-tight text-gray-900"></h3>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
<script>
    (function () {
        // Teasers carousel
        var scroller   = document.getElementById('teasers-scroller');
        var prevBtn    = document.getElementById('teasers-prev');
        var nextBtn    = document.getElementById('teasers-next');
        var indicator  = document.getElementById('teasers-progress-indicator');

        function getStep() {
            if (!scroller) return 0;
            var first = scroller.querySelector('[data-teaser-card]');
            if (!first) return 0;
            var gap = parseFloat(window.getComputedStyle(scroller).columnGap) || 0;
            return first.getBoundingClientRect().width + gap;
        }

        function updateControls() {
            if (!scroller || !prevBtn || !nextBtn || !indicator) return;
            var max  = scroller.scrollWidth - scroller.clientWidth;
            var left = scroller.scrollLeft;
            prevBtn.disabled = left <= 1;
            nextBtn.disabled = left >= max - 1;
            if (max <= 0) { indicator.style.width = '100%'; indicator.style.transform = 'translateX(0)'; return; }
            indicator.style.width     = (scroller.clientWidth / scroller.scrollWidth * 100) + '%';
            indicator.style.transform = 'translateX(' + (left / scroller.scrollWidth * 100) + '%)';
        }

        if (scroller && prevBtn && nextBtn) {
            prevBtn.addEventListener('click', function () { scroller.scrollBy({ left: -getStep(), behavior: 'smooth' }); });
            nextBtn.addEventListener('click', function () { scroller.scrollBy({ left:  getStep(), behavior: 'smooth' }); });
            scroller.addEventListener('scroll', updateControls, { passive: true });
            window.addEventListener('resize', updateControls);
            updateControls();
        }

        // Teaser modal
        var teaserModal = document.getElementById('teaser-modal');
        var teaserTitle = document.getElementById('teaser-modal-title');
        var teaserIframe = document.getElementById('teaser-modal-iframe');
        var teaserVideo  = document.getElementById('teaser-modal-video');

        function toYouTubeEmbed(url) {
            var m = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{6,})/);
            return m ? 'https://www.youtube.com/embed/' + m[1] + '?autoplay=1&rel=0' : null;
        }
        function toVimeoEmbed(url) {
            var m = url.match(/vimeo\.com\/(\d+)/);
            return m ? 'https://player.vimeo.com/video/' + m[1] + '?autoplay=1' : null;
        }

        function openTeaserModal(p) {
            if (!teaserModal) return;
            var url = p.videoUrl || '';
            if (!url || url === '#') return;
            teaserTitle.textContent = p.title || '';
            var yt = toYouTubeEmbed(url);
            var vm = yt ? null : toVimeoEmbed(url);
            if (yt || vm) {
                teaserVideo.pause(); teaserVideo.removeAttribute('src'); teaserVideo.classList.add('hidden');
                teaserIframe.src = yt || vm; teaserIframe.classList.remove('hidden');
            } else {
                teaserIframe.src = ''; teaserIframe.classList.add('hidden');
                teaserVideo.src = url; teaserVideo.classList.remove('hidden');
                teaserVideo.play().catch(function () {});
            }
            teaserModal.classList.remove('hidden'); teaserModal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function closeTeaserModal() {
            if (!teaserModal) return;
            teaserIframe.src = ''; teaserIframe.classList.add('hidden');
            teaserVideo.pause(); teaserVideo.removeAttribute('src'); teaserVideo.classList.add('hidden');
            teaserModal.classList.add('hidden'); teaserModal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        document.querySelectorAll('[data-teaser-modal]').forEach(function (trigger) {
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                try { openTeaserModal(JSON.parse(trigger.getAttribute('data-teaser-modal') || '{}')); }
                catch (_) {}
            });
        });
        if (teaserModal) {
            teaserModal.querySelectorAll('[data-teaser-modal-close]').forEach(function (btn) {
                btn.addEventListener('click', closeTeaserModal);
            });
        }
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && teaserModal && !teaserModal.classList.contains('hidden')) closeTeaserModal();
        });
    })();
</script>
@endsection
