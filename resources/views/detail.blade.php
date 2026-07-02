@extends('layouts.detail')

@section('page-title', $item->title)

@section('detail-content')

    @php($backUrl = (\Illuminate\Support\Facades\Route::has($page->slug) ? route($page->slug) : url('/'.$page->slug)).'#'.$sectionAnchor)

    {{-- EN-TÊTE DE L'ÉLÉMENT --}}
    <section class="py-12 md:py-20 px-4 bg-white">
        <div class="container mx-auto max-w-6xl">
            <p class="text-xs md:text-sm font-bold uppercase tracking-[0.3em] text-custom-red mb-4">
                {{ $section }}
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 items-start">
                <div class="aspect-[3/4] overflow-hidden rounded-[30px] shadow-sm bg-gray-100">
                    @if($item->image)
                    <img src="{{ image_url($item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                    @endif
                </div>

                <div>
                    <h1 class="text-3xl md:text-5xl font-bold uppercase tracking-tight text-gray-900 leading-tight mb-4">
                        {{ $item->title }}
                    </h1>

                    @if($item->year_or_label)
                    <p class="text-lg text-gray-500 font-light mb-6">{{ $item->year_or_label }}</p>
                    @endif

                    @if($item->role_or_description)
                    <p class="text-lg text-gray-700 font-light mb-6">{{ $item->role_or_description }}</p>
                    @endif

                    @if($item->description)
                    <div class="prose text-gray-600 font-light leading-relaxed whitespace-pre-line">{{ $item->description }}</div>
                    @endif

                    @if(!empty($item->link ?? null))
                    <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer"
                       class="inline-block mt-8 text-custom-red underline font-medium">Ouvrir le lien</a>
                    @endif

                    <div class="mt-10">
                        <a href="{{ $backUrl }}" class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-widest text-gray-800 hover:text-custom-red transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
                            Retour
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- GALERIE --}}
    @if(!empty($item->gallery_urls))
    <section class="py-12 md:py-20 px-4 bg-gray-50">
        <div class="container mx-auto max-w-6xl">
            <h2 class="text-2xl md:text-4xl font-light text-center text-gray-800 uppercase tracking-[0.3em] mb-10 md:mb-16">
                Galerie
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                @foreach($item->gallery_urls as $img)
                <button type="button" data-lightbox-src="{{ $img }}"
                        class="group aspect-square overflow-hidden rounded-[20px] shadow-sm bg-gray-100 focus:outline-none">
                    <img src="{{ $img }}" alt="{{ $item->title }} — image {{ $loop->iteration }}"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                </button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Lightbox --}}
    <div id="lightbox" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/85">
        <button type="button" id="lightbox-close" class="absolute right-4 top-4 z-10 flex h-12 w-12 items-center justify-center rounded-full bg-white/90 text-gray-900 shadow hover:bg-white" aria-label="Fermer">
            <span class="text-3xl leading-none">×</span>
        </button>
        <img id="lightbox-img" src="" alt="" class="max-h-[90vh] max-w-[90vw] rounded-xl object-contain shadow-2xl">
    </div>
    @endif

@endsection

@section('extra-scripts')
<script>
    (function () {
        var lightbox = document.getElementById('lightbox');
        if (!lightbox) return;
        var img   = document.getElementById('lightbox-img');
        var close = document.getElementById('lightbox-close');

        function open(src) {
            img.src = src;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }
        function hide() {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            img.src = '';
            document.body.classList.remove('overflow-hidden');
        }

        document.querySelectorAll('[data-lightbox-src]').forEach(function (btn) {
            btn.addEventListener('click', function () { open(btn.getAttribute('data-lightbox-src')); });
        });
        close.addEventListener('click', hide);
        lightbox.addEventListener('click', function (e) { if (e.target === lightbox) hide(); });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !lightbox.classList.contains('hidden')) hide();
        });
    })();
</script>
@endsection
