<x-layout>
      @push('styles')
    <style>
        body, * {
            font-family: 'Space Grotesk', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, p, a, span, button, input, select, option, div, label {
            font-family: 'Space Grotesk', sans-serif !important;
        }
        [class*="fa-"] {
            font-family: 'Font Awesome 6 Free', sans-serif !important;
        }
    </style>
    @endpush


    @push('scripts')
       
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush

    <div id="lottie-bg" class="fixed inset-0 -z-10 opacity-10 pointer-events-none"></div>

    {{-- Form Filter dengan Stacking Context Tinggi --}}
    <form method="get" class="px-6 py-6 md:py-8 lg:py-10 mt-16 flex flex-wrap items-center gap-4 bg-white/60 backdrop-blur-md border border-yellow-100 rounded-2xl shadow-md filter-section relative z-10">
        <div class="flex flex-wrap gap-3 items-center">
            
            <div x-data="{ open: false }" class="relative">
                <button type="button" @click="open = !open" class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300 flex items-center gap-2">
                    {{ request('category') ? request('category') : 'Semua Kategori' }}
                    <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" @click.outside="open = false"
                     class="absolute left-0 mt-2 p-4 bg-white border border-gray-200 rounded-xl shadow-xl z-50 w-[480px]"
                     style="display: none;">
                    
                    <div class="font-semibold text-base mb-3 border-b pb-2 text-gray-700">Pilih Kategori</div>
                    <div class="grid grid-cols-3 gap-2">
                        <a href="{{ route('galeri.index', array_merge(request()->except('category', 'page'), ['category' => ''])) }}" 
                           class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ !request('category') ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                            Semua Kategori
                        </a>
                        @foreach($categories as $category)
                            <a href="{{ route('galeri.index', array_merge(request()->except('category', 'page'), ['category' => $category])) }}" 
                               class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ request('category') == $category ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                                {{ $category }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div x-data="{ open: false }" class="relative">
                <button type="button" @click="open = !open" class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300 flex items-center gap-2">
                    {{ request('visual_style') ? request('visual_style') : 'Gaya Visual' }}
                    <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" @click.outside="open = false"
                     class="absolute left-0 mt-2 p-4 bg-white border border-gray-200 rounded-xl shadow-xl z-50 w-[480px]"
                     style="display: none;">
                    
                    <div class="font-semibold text-base mb-3 border-b pb-2 text-gray-700">Pilih Gaya Visual</div>
                    <div class="grid grid-cols-3 gap-2">
                        <a href="{{ route('galeri.index', array_merge(request()->except('visual_style', 'page'), ['visual_style' => ''])) }}" 
                           class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ !request('visual_style') ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                            Semua Gaya
                        </a>
                        @foreach($visualStyles as $style)
                            <a href="{{ route('galeri.index', array_merge(request()->except('visual_style', 'page'), ['visual_style' => $style])) }}" 
                               class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ request('visual_style') == $style ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                                {{ $style }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div x-data="{ open: false }" class="relative">
                <button type="button" @click="open = !open" class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300 flex items-center gap-2">
                    {{ request('period') ? request('period') : 'Periode Karya' }}
                    <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" @click.outside="open = false"
                     class="absolute left-0 mt-2 p-4 bg-white border border-gray-200 rounded-xl shadow-xl z-50 w-[400px]"
                     style="display: none;">
                    
                    <div class="font-semibold text-base mb-3 border-b pb-2 text-gray-700">Pilih Periode Karya</div>
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('galeri.index', array_merge(request()->except('period', 'page'), ['period' => ''])) }}" 
                           class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ !request('period') ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                            Semua Periode
                        </a>
                        @foreach($periods as $period)
                            <a href="{{ route('galeri.index', array_merge(request()->except('period', 'page'), ['period' => $period])) }}" 
                               class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ request('period') == $period ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                                {{ $period }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div x-data="{ open: false }" class="relative">
                <button type="button" @click="open = !open" class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300 flex items-center gap-2">
                    {{ request('media') ? request('media') : 'Media' }}
                    <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" @click.outside="open = false"
                     class="absolute left-0 mt-2 p-4 bg-white border border-gray-200 rounded-xl shadow-xl z-50 w-[300px]"
                     style="display: none;">
                    
                    <div class="font-semibold text-base mb-3 border-b pb-2 text-gray-700">Pilih Media</div>
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('galeri.index', array_merge(request()->except('media', 'page'), ['media' => ''])) }}" 
                           class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ !request('media') ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                            Semua Media
                        </a>
                        @foreach($medias as $media)
                            <a href="{{ route('galeri.index', array_merge(request()->except('media', 'page'), ['media' => $media])) }}" 
                               class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ request('media') == $media ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                                {{ $media }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div x-data="{ open: false }" class="relative">
                <button type="button" @click="open = !open" class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300 flex items-center gap-2">
                    {{ request('typography') ? request('typography') : 'Tipografi' }}
                    <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" @click.outside="open = false"
                     class="absolute left-0 mt-2 p-4 bg-white border border-gray-200 rounded-xl shadow-xl z-50 w-[400px]"
                     style="display: none;">
                    
                    <div class="font-semibold text-base mb-3 border-b pb-2 text-gray-700">Pilih Tipografi</div>
                    <div class="grid grid-cols-3 gap-2">
                        <a href="{{ route('galeri.index', array_merge(request()->except('typography', 'page'), ['typography' => ''])) }}" 
                           class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ !request('typography') ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                            Semua Tipografi
                        </a>
                        @foreach($typographies as $typography)
                            <a href="{{ route('galeri.index', array_merge(request()->except('typography', 'page'), ['typography' => $typography])) }}" 
                               class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ request('typography') == $typography ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                                {{ $typography }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div x-data="{ open: false }" class="relative">
                <button type="button" @click="open = !open" class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300 flex items-center gap-2">
                    {{ request('palette') ? request('palette') : 'Palet Warna' }}
                    <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" @click.outside="open = false"
                     class="absolute left-0 mt-2 p-4 bg-white border border-gray-200 rounded-xl shadow-xl z-50 w-[350px]"
                     style="display: none;">
                    
                    <div class="font-semibold text-base mb-3 border-b pb-2 text-gray-700">Pilih Palet Warna</div>
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('galeri.index', array_merge(request()->except('palette', 'page'), ['palette' => ''])) }}" 
                           class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ !request('palette') ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                            Semua Palet
                        </a>
                        @foreach($palettes as $palette)
                            <a href="{{ route('galeri.index', array_merge(request()->except('palette', 'page'), ['palette' => $palette])) }}" 
                               class="text-sm px-3 py-2 rounded-lg text-left transition duration-200 {{ request('palette') == $palette ? 'bg-yellow-400 text-black font-semibold shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-yellow-100' }}">
                                {{ $palette }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        <div class="ml-auto flex items-center gap-3 mt-4 md:mt-0">
            <div id="filter-count" class="bg-yellow-400 text-white text-xs rounded-full px-3 py-1 font-bold shadow">{{ $filterCount }}</div>
            <a href="{{ route('galeri.index') }}" id="reset-filters" class="px-4 py-2 text-sm bg-white text-gray-700 rounded-xl shadow hover:bg-yellow-400 hover:text-white font-medium flex items-center gap-2 transition duration-300">Atur Ulang<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582M20 20v-5h-.581M4 9a9 9 0 0116 0M4 15a9 9 0 0016 0" /></svg></a>
            @auth
                <a href="{{ route('galeri.create') }}" class="px-4 py-2 text-sm bg-black text-white rounded-xl shadow hover:bg-gray-800 font-medium flex items-center gap-2 transition duration-300">Tambah Galeri</a>
            @endauth
        </div>
    </form>

    <main class="px-6 py-8 max-w-7xl mx-auto" id="gallery-top">
        <div id="portfolio-gallery" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 auto-rows-[200px] gap-6">
            @foreach($galeris as $artworkgaleri)
                <div class="relative overflow-hidden rounded-lg shadow-md bg-neutral-100 cursor-pointer group {{ ['row-span-2', 'row-span-3', 'row-span-2'][array_rand(['row-span-2', 'row-span-3', 'row-span-2'])] }} {{ ['col-span-1', 'col-span-2', 'col-span-1'][array_rand(['col-span-1', 'col-span-2', 'col-span-1'])] }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="{{ route('galeri.show', $artworkgaleri->id) }}">
                        <img src="{{ asset('storage/' . $artworkgaleri->thumbnail) }}" alt="{{ $artworkgaleri->title }}" class="w-full h-full object-cover gallery-img"/>
                        <div class="absolute inset-0 gallery-overlay flex flex-col items-center justify-center text-white p-6">
                            <h3 class="project-title text-xl font-semibold">{{ $artworkgaleri->title }}</h3>
                            <p class="project-details text-sm">{{ $artworkgaleri->tags->first()->tag ?? '' }}</p>
                            <button class="bg-white text-black text-sm font-semibold px-5 py-2.5 rounded-lg shadow-md mt-4 hover:bg-yellow-400 hover:text-black transition">Lihat Detail</button>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div id="pagination" class="flex justify-center items-center gap-3 mt-12">
            {{ $galeris->links() }}
        </div>
    </main>
    <canvas id="ripple-canvas" class="fixed top-0 left-0 w-full h-full -z-20 pointer-events-none"></canvas>
</x-layout>