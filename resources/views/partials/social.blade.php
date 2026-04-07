<section class="bg-[#111] text-white py-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-sm md:text-base font-bold uppercase tracking-[0.3em] mb-8">
                SUIVEZ-MOI SUR MES RÉSEAUX
            </h2>

            <div class="flex justify-center gap-6">
                @foreach ($page->socialLinks as $link)
                <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer"
                   class="w-10 h-10 border border-white/20 rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all duration-300">
                    @if ($link->platform === 'facebook')
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.14H7v4.21h2.5V23h5V11.67h3.77l.5-4.21z"/>
                    </svg>
                    @elseif ($link->platform === 'instagram')
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                    </svg>
                    @elseif ($link->platform === 'tiktok')
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.76a4.85 4.85 0 01-1.01-.07z"/>
                    </svg>
                    @elseif ($link->platform === 'x')
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                    @endif
                </a>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-6 gap-0">
            <img src="{{ asset('img/imagebio3.jpg') }}"      alt="Social 1" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
            <img src="{{ asset('img/imagebio1.jpg') }}"      alt="Social 2" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
            <img src="{{ asset('img/imagebio2.jpg') }}"      alt="Social 3" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
            <img src="{{ asset('img/actualité1.jpg') }}"     alt="Social 4" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
            <img src="{{ asset('img/actualité2.jpg') }}"     alt="Social 5" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
            <img src="{{ asset('img/accueil-actrice.jpg') }}" alt="Social 6" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer">
        </div>
    </div>
</section>
