<section id="biography" class="bg-gray-200 py-16 px-4 md:py-32 md:px-24">
    <div class="max-w-[1400px] mx-auto">
        <h2 class="text-3xl md:text-6xl font-light text-center text-gray-800 uppercase tracking-[0.3em] mb-12 md:mb-40">
            BIOGRAPHIE
        </h2>

        <!-- Mobile -->
        <div class="md:hidden space-y-10">
            <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-gray-800 leading-relaxed">
                {!! nl2br(e($page->bio_title)) !!}
            </h3>
            <p class="text-sm text-gray-700 leading-relaxed opacity-80">
                {{ $page->bio_content }}
            </p>
            @if($page->bio_image_1)
            <div class="w-full overflow-hidden rounded-[30px] shadow-lg">
                <img src="{{ image_url($page->bio_image_1) }}" alt="Fat Touré Bio 1" class="w-full h-full object-cover">
            </div>
            @endif
            <div class="grid grid-cols-2 gap-4">
                @if($page->bio_image_2)
                <div class="aspect-[3/4] overflow-hidden rounded-[24px] shadow-md">
                    <img src="{{ image_url($page->bio_image_2) }}" alt="Fat Touré Bio 2" class="w-full h-full object-cover">
                </div>
                @endif
                @if($page->bio_image_3)
                <div class="aspect-[3/4] overflow-hidden rounded-[24px] shadow-md">
                    <img src="{{ image_url($page->bio_image_3) }}" alt="Fat Touré Portrait" class="w-full h-full object-cover">
                </div>
                @endif
            </div>
        </div>

        <!-- Desktop — rangée 1 -->
        <div class="hidden md:flex flex-col lg:flex-row items-start justify-between gap-16 mb-48">
            @if($page->bio_image_3)
            <div class="w-full sm:w-[220px] h-[280px] flex-shrink-0 overflow-hidden rounded-[40px] shadow-lg">
                <img src="{{ image_url($page->bio_image_3) }}" alt="Fat Touré Portrait" class="w-full h-full object-cover">
            </div>
            @endif

            <div class="flex-grow max-w-2xl text-gray-800">
                <h3 class="text-3xl md:text-4xl font-normal uppercase leading-[1.2] tracking-tight mb-8">
                    {!! nl2br(e($page->bio_title)) !!}
                </h3>
                <div class="text-base leading-relaxed opacity-70">
                    <p>{{ $page->bio_content }}</p>
                </div>
            </div>

            @if($page->bio_image_1)
            <div class="w-full lg:w-[480px] aspect-[4/5] overflow-hidden rounded-[40px] shadow-xl">
                <img src="{{ image_url($page->bio_image_1) }}" alt="Fat Touré Bio 1" class="w-full h-full object-cover">
            </div>
            @endif
        </div>

        <!-- Desktop — rangée 2 -->
        <div class="hidden md:flex flex-col lg:flex-row items-start gap-24">
            @if($page->bio_image_2)
            <div class="w-full lg:w-[380px] aspect-[3/4] overflow-hidden rounded-[40px] shadow-xl">
                <img src="{{ image_url($page->bio_image_2) }}" alt="Fat Touré Bio 2" class="w-full h-full object-cover">
            </div>
            @endif

            <div class="flex-grow max-w-3xl text-gray-800">
                <h3 class="text-3xl md:text-4xl font-normal uppercase leading-[1.2] tracking-tight mb-8">
                    {!! nl2br(e($page->bio_title)) !!}
                </h3>
                <div class="text-base leading-relaxed space-y-6 opacity-70">
                    <p>{{ $page->bio_content }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
