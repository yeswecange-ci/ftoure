@extends('layouts.page')

@section('page-title', 'Entrepreneur Immobilier')
@section('hero-label', 'Entrepreneur Immobilier')
@section('hero-label-offset', '-bottom-10 md:-bottom-24')

@section('nav-items')
<li><a href="#biography"  class="hover:text-custom-red transition-colors">BIOGRAPHIE</a></li>
<li><a href="#realisation" class="hover:text-custom-red transition-colors">RÉALISATION</a></li>
<li><a href="#actualite"  class="hover:text-custom-red transition-colors">ACTUALITÉ</a></li>
<li><a href="#booking"    class="hover:text-custom-red transition-colors">BOOKING</a></li>
@endsection

@section('sections')

    {{-- RÉALISATION --}}
    <section id="realisation" class="py-16 px-4 md:py-32 md:px-24 bg-white">
        <div class="mx-auto max-w-[1400px]">
            <h2 class="text-3xl md:text-6xl font-light text-center text-gray-800 uppercase tracking-[0.3em] mb-12 md:mb-40">
                RÉALISATION
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                @foreach ($page->works as $work)
                <div class="flex flex-col">
                    <div class="aspect-[3/4] overflow-hidden rounded-[30px] mb-6 shadow-sm">
                        @if($work->image)
                        <img src="{{ image_url($work->image) }}" alt="{{ $work->title }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="px-2">
                        <h3 class="text-xl md:text-2xl font-bold uppercase tracking-tight mb-1 text-gray-900">{{ $work->title }}</h3>
                        <p class="text-lg text-gray-600 font-light">{{ $work->year_or_label }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ACTUALITÉ --}}
    <section id="actualite" class="py-16 px-4 md:py-[100px] md:px-0 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <h2 class="text-3xl md:text-6xl font-light text-center text-gray-800 uppercase tracking-[0.3em] mb-12 md:mb-20">
                ACTUALITÉ
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
