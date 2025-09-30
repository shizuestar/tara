<x-layout>
    <div id="lottie-bg" class="fixed inset-0 -z-10 opacity-10 pointer-events-none"></div>
    <form method="get" class="px-6 py-6 md:py-8 lg:py-10 mt-16 flex flex-wrap items-center gap-4 bg-white/60 backdrop-blur-md border border-yellow-100 rounded-2xl shadow-md filter-section">
        <div class="flex flex-wrap gap-3 items-center">
            <select name="category" id="category-filter" onchange="this.form.submit()" class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option value="">Semua Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                @endforeach
            </select>
            <select name="visual_style" id="visual-style-filter" onchange="this.form.submit()" class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option value="">Gaya Visual</option>
                @foreach($visualStyles as $style)
                    <option value="{{ $style }}" {{ request('visual_style') == $style ? 'selected' : '' }}>{{ $style }}</option>
                @endforeach
            </select>
            <select name="period" id="period-filter" onchange="this.form.submit()" class="px-5 py-2 relativ rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option value="">Periode Karya</option>
                @foreach($periods as $period)
                    <option value="{{ $period }}" {{ request('period') == $period ? 'selected' : '' }}>{{ $period }}</option>
                @endforeach
            </select>
            <select name="media" id="media-filter" onchange="this.form.submit()" class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option value="">Media</option>
                @foreach($medias as $media)
                    <option value="{{ $media }}" {{ request('media') == $media ? 'selected' : '' }}>{{ $media }}</option>
                @endforeach
            </select>
            <select name="typography" id="typography-filter" onchange="this.form.submit()" class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option value="">Tipografi</option>
                @foreach($typographies as $typography)
                    <option value="{{ $typography }}" {{ request('typography') == $typography ? 'selected' : '' }}>{{ $typography }}</option>
                @endforeach
            </select>
            <select name="palette" id="palette-filter" onchange="this.form.submit()" class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option value="">Palet Warna</option>
                @foreach($palettes as $palette)
                    <option value="{{ $palette }}" {{ request('palette') == $palette ? 'selected' : '' }}>{{ $palette }}</option>
                @endforeach
            </select>
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
            @foreach($artworks as $artwork)
                <div class="relative overflow-hidden rounded-lg shadow-md bg-neutral-100 cursor-pointer group {{ ['row-span-2', 'row-span-3', 'row-span-2'][array_rand(['row-span-2', 'row-span-3', 'row-span-2'])] }} {{ ['col-span-1', 'col-span-2', 'col-span-1'][array_rand(['col-span-1', 'col-span-2', 'col-span-1'])] }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="{{ route('galeri.show', $artwork->id) }}">
                        <img src="{{ asset('storage/' . $artwork->thumbnail) }}" alt="{{ $artwork->title }}" class="w-full h-full object-cover gallery-img"/>
                        <div class="absolute inset-0 gallery-overlay flex flex-col items-center justify-center text-white p-6">
                            <h3 class="project-title text-xl font-semibold">{{ $artwork->title }}</h3>
                            <p class="project-details text-sm">{{ $artwork->tags->first()->tag ?? '' }}</p>
                            <button class="bg-white text-black text-sm font-semibold px-5 py-2.5 rounded-lg shadow-md mt-4 hover:bg-yellow-400 hover:text-black transition">Lihat Detail</button>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div id="pagination" class="flex justify-center items-center gap-3 mt-12">
            {{ $artworks->links() }}
        </div>
    </main>
    <canvas id="ripple-canvas" class="fixed top-0 left-0 w-full h-full -z-20 pointer-events-none"></canvas>
</x-layout>