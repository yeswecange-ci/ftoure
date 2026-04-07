@extends('layouts.page')

@section('page-title', 'Modèle')
@section('hero-label', 'Modèle')

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

            <div class="mt-12 md:mt-20 flex justify-center">
                <a href="#" class="px-12 py-4 border border-gray-900 rounded-xl text-sm font-bold uppercase tracking-widest hover:bg-gray-900 hover:text-white transition-all duration-300">
                    VOIR PLUS D'ACTUALITÉS
                </a>
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

    {{-- TEASERS (grille simple, lien direct) --}}
    <section id="teasers" class="py-16 px-4 md:py-32 md:px-0 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <h2 class="text-3xl md:text-6xl font-light text-center text-gray-800 uppercase tracking-[0.3em] mb-12 md:mb-20">
                TEASERS
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 mb-16">
                @foreach ($page->teasers as $teaser)
                <div class="bg-white rounded-[30px] overflow-hidden shadow-lg border border-gray-100">
                    <div class="relative aspect-square">
                        @if($teaser->poster_image)
                        <img src="{{ image_url($teaser->poster_image) }}" alt="{{ $teaser->title }}" class="w-full h-full object-cover">
                        @endif
                        @if($teaser->video_url)
                        <div class="absolute bottom-6 right-6">
                            <a href="{{ $teaser->video_url }}" target="_blank" rel="noopener noreferrer"
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
        </div>
    </section>

@endsection
