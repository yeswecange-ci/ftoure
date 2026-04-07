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

            <div class="mt-12 md:mt-20 flex justify-center">
                <a href="#" class="px-12 py-4 border border-gray-900 rounded-xl text-sm font-bold uppercase tracking-widest hover:bg-gray-900 hover:text-white transition-all duration-300">
                    VOIR PLUS D'ACTUALITÉS
                </a>
            </div>
        </div>
    </section>

@endsection
