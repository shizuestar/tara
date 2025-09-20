<x-admin-layout>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FFD700',
                        'primary-dark': '#FFC400',
                        dark: '#212121',
                        'gray-light': '#F5F5F5',
                    },
                    fontFamily: {
                        'space-grotesk': ['Space Grotesk', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
        }
        [x-cloak] {
            display: none !important;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c5c5c5;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>

    <div class="bg-gray-50 text-dark">
        <div class="bg-white rounded-lg p-6 shadow-sm mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <h2 class="text-xl font-semibold flex items-center gap-2 text-gray-900">
                    <i class="fas fa-calendar-alt text-primary text-lg"></i>
                    Daftar Event
                </h2>
                <div x-data="{ openModal: false, isEdit: false, eventId: null, tickets: [{type: '', price: '', quantity_available: ''}] }">
                    <button @click="openModal = true; isEdit = false; tickets = [{type: '', price: '', quantity_available: ''}]"
                        class="bg-primary hover:bg-primary-dark text-gray-900 font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                        <i class="fas fa-plus text-sm"></i>
                        Tambah Event
                    </button>

                    <div x-show="openModal" x-cloak x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 p-4">
                        <div x-show="openModal" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[95vh] overflow-y-auto">
                            <div class="p-7">
                                <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
                                    <h2 class="text-2xl font-bold text-gray-800">
                                        <span x-text="isEdit ? 'Edit Event' : 'Tambah Event Baru'"></span>
                                    </h2>
                                    <button @click="openModal = false"
                                        class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <form :action="isEdit ? '/admin/events/' + eventId : '/admin/events'" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" :value="isEdit ? 'PUT' : 'POST'">

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                                        <select name="category_id" class="w-full p-3 border border-gray-300 rounded-xl">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Judul Event</label>
                                        <input type="text" name="title" class="w-full p-3 border border-gray-300 rounded-xl"
                                            placeholder="Masukkan judul event" required>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                                            <input type="date" name="start_date" class="w-full p-3 border border-gray-300 rounded-xl" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                                            <input type="date" name="end_date" class="w-full p-3 border border-gray-300 rounded-xl" required>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Jam Mulai</label>
                                            <input type="time" name="time_start" class="w-full p-3 border border-gray-300 rounded-xl" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Jam Selesai</label>
                                            <input type="time" name="time_end" class="w-full p-3 border border-gray-300 rounded-xl" required>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                                        <input type="text" name="location" class="w-full p-3 border border-gray-300 rounded-xl"
                                            placeholder="Masukkan lokasi event" required>
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                                        <textarea name="description" class="w-full p-3 border border-gray-300 rounded-xl" rows="4"
                                            placeholder="Tambahkan deskripsi event" required></textarea>
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                        <div class="grid grid-cols-3 gap-3">
                                            @foreach (['upcoming', 'ongoing', 'past'] as $status)
                                                <div class="relative flex items-center">
                                                    <input type="radio" name="status" id="{{ $status }}"
                                                        value="{{ $status }}" class="hidden peer" {{ $status == 'upcoming' ? 'checked' : '' }}>
                                                    <label for="{{ $status }}"
                                                        class="w-full p-3 border border-gray-300 rounded-xl text-center cursor-pointer peer-checked:border-yellow-500 peer-checked:bg-yellow-50 peer-checked:text-yellow-700">
                                                        {{ ucfirst($status) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Tiket</label>
                                        <div x-data="{ tickets: tickets }">
                                            <template x-for="(ticket, index) in tickets" :key="index">
                                                <div class="mb-4 p-4 border border-gray-200 rounded-xl">
                                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Tiket</label>
                                                            <input type="text" x-model="ticket.type" :name="'tickets['+index+'][type]'"
                                                                class="w-full p-3 border border-gray-300 rounded-xl" placeholder="Masukkan jenis tiket" required>
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Harga (IDR)</label>
                                                            <input type="number" x-model="ticket.price" :name="'tickets['+index+'][price]'"
                                                                class="w-full p-3 border border-gray-300 rounded-xl" placeholder="Masukkan harga" required>
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Tersedia</label>
                                                            <input type="number" x-model="ticket.quantity_available" :name="'tickets['+index+'][quantity_available]'"
                                                                class="w-full p-3 border border-gray-300 rounded-xl" placeholder="Masukkan jumlah" required>
                                                        </div>
                                                    </div>
                                                    <button type="button" @click="tickets.splice(index, 1)"
                                                        class="mt-2 text-red-600 hover:text-red-800">Hapus Tiket</button>
                                                </div>
                                            </template>
                                            <button type="button" @click="tickets.push({type: '', price: '', quantity_available: ''})"
                                                class="bg-gray-100 hover:bg-gray-200 text-gray-900 px-4 py-2 rounded-md">
                                                Tambah Tiket
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-6">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Event</label>
                                        <input type="file" name="image" class="w-full p-3 border border-gray-300 rounded-xl">
                                    </div>

                                    <div class="flex justify-end gap-3 pt-5 border-t border-gray-200">
                                        <button type="button" @click="openModal = false"
                                            class="px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl">
                                            Batal
                                        </button>
                                        <button type="submit"
                                            class="bg-primary hover:bg-primary-dark text-gray-900 px-4 py-2 rounded-md flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span x-text="isEdit ? 'Update Event' : 'Simpan Event'"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 rounded-lg p-5 mb-6 border border-gray-200">
                <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900">
                    <i class="fas fa-filter text-primary text-base"></i>
                    Filter Event
                </h3>
                <form>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="category-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori Event</label>
                            <select id="category-filter" name="category" class="w-full p-2.5 border border-gray-200 rounded-md">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}" {{ request('category') == $category->name ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Status Event</label>
                            <select id="status-filter" name="status" class="w-full p-2.5 border border-gray-200 rounded-md">
                                <option value="">Semua Status</option>
                                <option value="upcoming" {{ request('status') == 'upcoming' ? 'selected' : '' }}>Akan Datang</option>
                                <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Sedang Berlangsung</option>
                                <option value="past" {{ request('status') == 'past' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>
                        <div>
                            <label for="date-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal</label>
                            <select id="date-filter" name="date" class="w-full p-2.5 border border-gray-200 rounded-md">
                                <option value="">Semua Tanggal</option>
                                <option value="today" {{ request('date') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                                <option value="week" {{ request('date') == 'week' ? 'selected' : '' }}>Minggu Ini</option>
                                <option value="month" {{ request('date') == 'month' ? 'selected' : '' }}>Bulan Ini</option>
                            </select>
                        </div>
                        <div>
                            <label for="keyword-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Cari Event</label>
                            <input id="keyword-filter" type="text" name="keyword" value="{{ request('keyword') }}"
                                class="w-full p-2.5 border border-gray-200 rounded-md" placeholder="Masukkan nama event...">
                        </div>
                    </div>
                    <div class="flex gap-3 mt-4">
                        <button type="submit"
                            class="bg-primary hover:bg-primary-dark text-gray-900 font-medium px-4 py-2 rounded-md flex items-center gap-2">
                            <i class="fas fa-filter text-sm"></i>
                            Terapkan Filter
                        </button>
                        <a href="{{ route('admin.events.index') }}"
                            class="bg-gray-100 hover:bg-gray-200 text-gray-900 font-medium px-4 py-2 rounded-md flex items-center gap-2">
                            <i class="fas fa-redo text-sm"></i>
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Nama Event</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Kategori</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Status</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Partisipan</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Tiket Tersedia</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600 w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr class="hover:bg-gray-50 border-b border-gray-100">
                                <td class="p-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $event->title }}</div>
                                    <div class="text-xs text-gray-600">{{ $event->location }}</div>
                                </td>
                                <td class="p-3 text-sm text-gray-900">{{ $event->category->name }}</td>
                                <td class="p-3 text-sm text-gray-900">
                                    {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d M Y') }} - 
                                    {{ \Carbon\Carbon::parse($event->end_date)->translatedFormat('d M Y') }}
                                </td>
                                <td class="p-3">
                                    <span class="px-2 py-1 rounded-full text-xs 
                                        {{ ($event->status == 'upcoming' ? 'bg-blue-100 text-blue-600' : 
                                           ($event->status == 'ongoing' ? 'bg-green-100 text-green-600' : 
                                           'bg-gray-100 text-gray-600')) }}">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </td>
                                <td class="p-3 text-sm text-gray-900">{{ $event->registrations->count() }}</td>
                                <td class="p-3 text-sm text-gray-900">
                                    {{ $event->tickets->sum(function($ticket) { return $ticket->quantity_available - $ticket->quantity_sold; }) }}
                                </td>
                                <td class="p-3">
                                    <div class="flex gap-2">
                                        <a href="{{ route('admin.events.show', $event) }}"
                                            class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button @click="openModal = true; isEdit = true; eventId = {{ $event->id }}"
                                            class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $events->links() }}
            </div>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('eventModal', () => ({
                openModal: false,
                isEdit: false,
                eventId: null,
                tickets: [{type: '', price: '', quantity_available: ''}],
                init() {
                    this.$watch('isEdit', (value) => {
                        if (value && this.eventId) {
                            fetch(`/admin/events/${this.eventId}/edit`)
                                .then(response => response.json())
                                .then(data => {
                                    document.querySelector('[name="category_id"]').value = data.category_id;
                                    document.querySelector('[name="title"]').value = data.title;
                                    document.querySelector('[name="start_date"]').value = data.start_date;
                                    document.querySelector('[name="end_date"]').value = data.end_date;
                                    document.querySelector('[name="time_start"]').value = data.time_start;
                                    document.querySelector('[name="time_end"]').value = data.time_end;
                                    document.querySelector('[name="location"]').value = data.location;
                                    document.querySelector('[name="description"]').value = data.description;
                                    document.querySelector(`[name="status"][value="${data.status}"]`).checked = true;
                                    this.tickets = data.tickets;
                                });
                        }
                    });
                }
            }));
        });
    </script>
</x-admin-layout>