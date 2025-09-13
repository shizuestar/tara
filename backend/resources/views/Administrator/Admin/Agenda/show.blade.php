<x-admin-layout>
    <div class="relative max-w-4xl mx-auto bg-white rounded-3xl overflow-hidden shadow-2xl">
        <div class="bg-gradient-to-br from-blue-500 to-purple-600 h-48 relative">
            @if ($event->image_path)
                <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}"
                    class="w-full h-full object-cover opacity-75">
            @else
                <div class="w-full h-full flex items-center justify-center text-white text-3xl font-bold">
                    {{ $event->title }}
                </div>
            @endif
        </div>

        <div class="p-8 -mt-24 z-10 relative">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 leading-tight mb-2 sm:mb-0">
                    {{ $event->title }}
                </h1>
                <span
                    class="px-4 py-2 text-sm font-semibold text-white rounded-full shadow-lg
                    @if ($event->status == 'upcoming') bg-blue-500
                    @elseif($event->status == 'ongoing') bg-green-500
                    @else bg-gray-500 @endif">
                    {{ ucfirst($event->status) }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-2xl mb-8 border border-gray-100">
                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path
                            d="M11 3.5v5.5a1 1 0 0 1-1 1H3.5a1 1 0 0 1-1-1v-5a1 1 0 0 1 1-1zM11 15v5.5a1 1 0 0 1-1 1H3.5a1 1 0 0 1-1-1v-5a1 1 0 0 1 1-1zM15 3.5v5.5a1 1 0 0 1-1 1h-7.5a1 1 0 0 1-1-1v-5a1 1 0 0 1 1-1zM15 15v5.5a1 1 0 0 1-1 1h-7.5a1 1 0 0 1-1-1v-5a1 1 0 0 1 1-1z" />
                    </svg>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                        <dd class="text-base font-semibold text-gray-800">{{ $event->category->name ?? '-' }}</dd>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Tanggal</dt>
                        <dd class="text-base font-semibold text-gray-800">{{ $event->start_date->format('d M Y') }} -
                            {{ $event->end_date->format('d M Y') }}</dd>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Waktu</dt>
                        <dd class="text-base font-semibold text-gray-800">{{ $event->time_start }} -
                            {{ $event->time_end }}</dd>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Lokasi</dt>
                        <dd class="text-base font-semibold text-gray-800">{{ $event->location }}</dd>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-2">Deskripsi</h2>
                <p class="text-gray-700 leading-relaxed">{{ $event->description }}</p>
            </div>

            <div class="text-center">
                <a href="{{ route('admin.events.index') }}"
                    class="inline-flex items-center justify-center
                    px-6 py-3 border border-transparent text-base font-medium
                    rounded-full shadow-sm text-white bg-gray-700 hover:bg-gray-800 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
