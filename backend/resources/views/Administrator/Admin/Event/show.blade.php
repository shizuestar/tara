<x-admin-layout>
    <div class="bg-white rounded-xl shadow-sm p-6">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg flex items-center gap-2" role="alert">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error') || $errors->has('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg flex items-center gap-2" role="alert">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ session('error') ?? $errors->first('error') }}</span>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <h1 class="text-xl font-semibold flex items-center gap-2 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-calendar-alt text-yellow-400 text-base"></i>
                Detail Event: {{ $event->title }}
            </h1>
            <div class="flex gap-3 flex-wrap">
                <a href="{{ route('admin.events.index') }}" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                    <i class="fas fa-arrow-left text-sm"></i>
                    Kembali ke Daftar Event
                </a>
                <button onclick="showEditModal({{ $event->id }})" class="bg-blue-100 hover:bg-blue-200 text-blue-600 text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Edit Event">
                    <i class="fas fa-edit text-sm"></i>
                    Edit Event
                </button>
                <button onclick="showDeleteModal('{{ addslashes($event->title) }}', {{ $event->id }})" class="bg-red-100 hover:bg-red-200 text-red-600 text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Hapus Event">
                    <i class="fas fa-trash text-sm"></i>
                    Hapus Event
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="text-lg font-semibold mb-3 text-gray-800 font-['Space_Grotesk']">Informasi Dasar</h4>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Gambar Event</label>
                    <div class="w-full h-48 p-4 border-2 border-dashed border-gray-200 rounded-lg text-center cursor-pointer hover:border-yellow-400">
                        @if ($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-full h-40 object-cover rounded-lg">
                        @else
                            <p class="text-sm text-gray-600">Tidak ada gambar</p>
                        @endif
                    </div>
                </div>
                <dl class="space-y-2">
                    <div>
                        <dt class="font-medium text-gray-900 font-['Space_Grotesk']">Nama Event:</dt>
                        <dd class="text-gray-700">{{ $event->title }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900 font-['Space_Grotesk']">Kategori:</dt>
                        <dd class="text-gray-700">{{ $event->category->name }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900 font-['Space_Grotesk']">Lokasi:</dt>
                        <dd class="text-gray-700">{{ $event->location }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900 font-['Space_Grotesk']">Tanggal:</dt>
                        <dd class="text-gray-700">
                            {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d M Y') }} - 
                            {{ \Carbon\Carbon::parse($event->end_date)->translatedFormat('d M Y') }}
                        </dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900 font-['Space_Grotesk']">Waktu:</dt>
                        <dd class="text-gray-700">
                            {{ \Carbon\Carbon::parse($event->time_start)->format('H:i') }} - 
                            {{ \Carbon\Carbon::parse($event->time_end)->format('H:i') }}
                        </dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900 font-['Space_Grotesk']">Status:</dt>
                        <dd>{!! getStatusBadge($event->status) !!}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900 font-['Space_Grotesk']">Partisipan:</dt>
                        <dd class="text-gray-700">{{ $event->registrations->count() }}</dd>
                    </div>
                </dl>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-3 text-gray-800 font-['Space_Grotesk']">Deskripsi & Tiket</h4>
                <dl class="space-y-2 mb-4">
                    <div>
                        <dt class="font-medium text-gray-900 font-['Space_Grotesk']">Deskripsi:</dt>
                        <dd class="text-gray-700">{{ $event->description }}</dd>
                    </div>
                </dl>
                <h5 class="text-md font-semibold mb-2 text-gray-800 font-['Space_Grotesk']">Tiket</h5>
                <div class="flex flex-col gap-2">
                    @if ($event->tickets->count() > 0)
                        @foreach ($event->tickets as $ticket)
                            <div class="ticket-tag text-xs bg-blue-100 text-blue-600 px-4 py-2 rounded-full">
                                {{ $ticket->type }}: Rp {{ number_format($ticket->price, 0, ',', '.') }} 
                                ({{ $ticket->quantity_available - $ticket->quantity_sold }} Tersedia, {{ $ticket->quantity_sold }} Terjual)
                            </div>
                        @endforeach
                    @else
                        <span class="text-xs text-gray-600">Tidak ada tiket tersedia.</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="editModal" aria-hidden="true">
            <div class="bg-white rounded-lg p-6 w-full max-w-3xl mx-4 overflow-y-auto max-h-[90vh]">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Edit Event</h3>
                    <button class="text-xl text-gray-800 hover:text-gray-900" onclick="closeModal('editModal')" aria-label="Tutup modal">&times;</button>
                </div>
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg flex items-center gap-2" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="editEventForm" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateEditForm()">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4 col-span-2">
                            <label for="edit_image" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Gambar Event</label>
                            <div class="w-full h-32 p-4 border-2 border-dashed border-gray-200 rounded-lg text-center cursor-pointer hover:border-yellow-400" ondragover="allowDrop(event)" ondrop="handleDrop(event, 'edit', 'image')" onclick="document.getElementById('edit_image').click()">
                                <input type="file" id="edit_image" name="image" accept="image/*" class="hidden" onchange="previewImage(this, 'edit_image_preview')">
                                <p class="text-sm text-gray-600">Seret dan lepas gambar atau klik untuk memilih</p>
                            </div>
                            <img id="edit_image_preview" class="mt-2 w-full h-48 object-cover rounded-lg hidden" alt="Pratinjau gambar event">
                            @error('image')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="edit_title" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Nama Event</label>
                            <input type="text" id="edit_title" name="title" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('title')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_category_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kategori</label>
                            <select id="edit_category_id" name="category_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_location" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Lokasi</label>
                            <input type="text" id="edit_location" name="location" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('location')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_start_date" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tanggal Mulai</label>
                            <input type="date" id="edit_start_date" name="start_date" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('start_date')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_end_date" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tanggal Selesai</label>
                            <input type="date" id="edit_end_date" name="end_date" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            @error('end_date')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_time_start" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Waktu Mulai</label>
                            <input type="time" id="edit_time_start" name="time_start" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('time_start')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_time_end" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Waktu Selesai</label>
                            <input type="time" id="edit_time_end" name="time_end" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('time_end')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_status" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Status</label>
                            <select id="edit_status" name="status" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="upcoming">Akan Datang</option>
                                <option value="ongoing">Sedang Berlangsung</option>
                                <option value="past">Selesai</option>
                            </select>
                            @error('status')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="edit_description" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Deskripsi</label>
                            <textarea id="edit_description" name="description" rows="3" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Jelaskan detail event..."></textarea>
                            @error('description')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tiket</label>
                            <div id="edit_ticket_inputs_container">
                                <div class="flex gap-2 mb-2 ticket-input-group">
                                    <input type="text" name="tickets[0][type]" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Jenis tiket" required>
                                    <input type="number" name="tickets[0][price]" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Harga (IDR)" required>
                                    <input type="number" name="tickets[0][quantity_available]" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Jumlah tersedia" required>
                                    <button type="button" onclick="addTicketInput('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Tambah Tiket"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            <div id="edit_tickets" class="flex flex-col gap-2 mt-2"></div>
                            @error('tickets')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors" onclick="closeModal('editModal')">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal" aria-hidden="true">
            <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Konfirmasi Hapus</h3>
                    <button class="text-xl text-gray-800 hover:text-gray-900" onclick="closeModal('deleteModal')" aria-label="Tutup modal">&times;</button>
                </div>
                <p class="text-sm text-gray-800 mb-6 font-['Space_Grotesk']">Apakah Tuan yakin ingin menghapus event <span id="deleteEventName" class="font-medium"></span>?</p>
                <form id="deleteEventForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="delete_id" name="id">
                    <div class="flex justify-end gap-3">
                        <button type="button" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors" onclick="closeModal('deleteModal')">Batal</button>
                        <button type="submit" class="bg-red-400 hover:bg-red-500 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">Hapus</button>
                    </div>
                </form>
            </div>
        </div>

        @push('styles')
            <style>
                .modal-open {
                    animation: fadeIn 0.3s ease;
                }
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(10px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                .ticket-tag {
                    display: inline-flex;
                    align-items: center;
                    gap: 4px;
                }
            </style>
        @endpush

        @push('scripts')
            <script>
                function showEditModal(eventId) {
                    fetch("{{ route('admin.events.edit', ':id') }}".replace(':id', eventId))
                        .then(response => {
                            if (!response.ok) {
                                if (response.status === 404) throw new Error('Event tidak ditemukan.');
                                return response.json().then(data => { throw new Error(data.error || 'Terjadi kesalahan server.'); });
                            }
                            return response.json();
                        })
                        .then(event => {
                            document.getElementById('edit_id').value = event.id;
                            document.getElementById('edit_title').value = event.title || '';
                            document.getElementById('edit_category_id').value = event.category_id || '';
                            document.getElementById('edit_location').value = event.location || '';
                            document.getElementById('edit_start_date').value = event.start_date || '';
                            document.getElementById('edit_end_date').value = event.end_date || '';
                            document.getElementById('edit_time_start').value = event.time_start || '';
                            document.getElementById('edit_time_end').value = event.time_end || '';
                            document.getElementById('edit_description').value = event.description || '';
                            document.getElementById('edit_status').value = event.status || 'upcoming';

                            const imagePreview = document.getElementById('edit_image_preview');
                            if (event.image_path) {
                                imagePreview.src = "{{ asset('storage') }}/" + event.image_path;
                                imagePreview.classList.remove('hidden');
                            } else {
                                imagePreview.classList.add('hidden');
                            }

                            const ticketsContainer = document.getElementById('edit_tickets');
                            ticketsContainer.innerHTML = '';
                            if (event.tickets && event.tickets.length > 0) {
                                event.tickets.forEach((ticket, index) => {
                                    addTicketTag(ticket.type, ticket.price, ticket.quantity_available, 'edit', index);
                                });
                            }

                            document.getElementById('edit_ticket_inputs_container').innerHTML = `
                                <div class="flex gap-2 mb-2 ticket-input-group">
                                    <input type="text" name="tickets[0][type]" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Jenis tiket" required>
                                    <input type="number" name="tickets[0][price]" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Harga (IDR)" required>
                                    <input type="number" name="tickets[0][quantity_available]" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Jumlah tersedia" required>
                                    <button type="button" onclick="addTicketInput('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Tambah Tiket"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            `;

                            document.getElementById('editEventForm').action = "{{ route('admin.events.update', ':id') }}".replace(':id', event.id);
                            document.getElementById('editModal').classList.remove('hidden');
                            document.getElementById('editModal').setAttribute('aria-hidden', 'false');
                            document.getElementById('editModal').classList.add('modal-open');
                        })
                        .catch(error => {
                            console.error('Error fetching event data:', error);
                            alert(`Gagal memuat data event: ${error.message}`);
                        });
                }

                function showDeleteModal(eventName, eventId) {
                    document.getElementById('deleteEventName').textContent = eventName;
                    document.getElementById('delete_id').value = eventId;
                    document.getElementById('deleteEventForm').action = "{{ route('admin.events.destroy', ':id') }}".replace(':id', eventId);
                    document.getElementById('deleteModal').classList.remove('hidden');
                    document.getElementById('deleteModal').setAttribute('aria-hidden', 'false');
                    document.getElementById('deleteModal').classList.add('modal-open');
                }

                function closeModal(modalId) {
                    const modal = document.getElementById(modalId);
                    modal.classList.add('hidden');
                    modal.classList.remove('modal-open');
                    modal.setAttribute('aria-hidden', 'true');
                }

                function allowDrop(event) {
                    event.preventDefault();
                    event.target.classList.add('border-yellow-400');
                }

                function handleDrop(event, mode, field) {
                    event.preventDefault();
                    event.target.classList.remove('border-yellow-400');
                    const file = event.dataTransfer.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const input = document.getElementById(`${mode}_${field}`);
                        input.files = event.dataTransfer.files;
                        previewImage(input, `${mode}_${field}_preview`);
                    }
                }

                function previewImage(input, previewId) {
                    const preview = document.getElementById(previewId);
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.classList.remove('hidden');
                        };
                        reader.readAsDataURL(input.files[0]);
                    } else if (input.src) {
                        preview.src = input.src;
                        preview.classList.remove('hidden');
                    } else {
                        preview.classList.add('hidden');
                    }
                }

                function validateEditForm() {
                    const requiredFields = ['edit_title', 'edit_category_id', 'edit_location', 'edit_start_date', 'edit_time_start', 'edit_time_end', 'edit_status'];
                    let isValid = true;
                    requiredFields.forEach(fieldId => {
                        const field = document.getElementById(fieldId);
                        if (!field.value.trim()) {
                            isValid = false;
                            field.classList.add('border-red-500');
                            const error = document.createElement('p');
                            error.className = 'text-red-600 text-xs mt-1';
                            error.textContent = 'Kolom ini wajib diisi.';
                            if (!field.nextElementSibling?.classList.contains('text-red-600')) {
                                field.parentElement.appendChild(error);
                            }
                        } else {
                            field.classList.remove('border-red-500');
                            if (field.nextElementSibling?.classList.contains('text-red-600')) {
                                field.nextElementSibling.remove();
                            }
                        }
                    });
                    return isValid;
                }

                function addTicketInput(mode) {
                    const container = document.getElementById(`${mode}_ticket_inputs_container`);
                    const ticketInputs = container.querySelectorAll('.ticket-input-group');
                    const index = ticketInputs.length;
                    const newInputGroup = document.createElement('div');
                    newInputGroup.className = 'flex gap-2 mb-2 ticket-input-group';
                    newInputGroup.innerHTML = `
                        <input type="text" name="tickets[${index}][type]" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Jenis tiket" required>
                        <input type="number" name="tickets[${index}][price]" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Harga (IDR)" required>
                        <input type="number" name="tickets[${index}][quantity_available]" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Jumlah tersedia" required>
                        <button type="button" onclick="this.parentElement.remove()" class="bg-red-400 hover:bg-red-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Hapus Tiket"><i class="fas fa-trash"></i></button>
                    `;
                    container.appendChild(newInputGroup);
                }

                function addTicketTag(type, price, quantity_available, mode, index) {
                    const container = document.getElementById(`${mode}_tickets`);
                    const tag = document.createElement('div');
                    tag.className = 'ticket-tag text-xs bg-blue-100 text-blue-600 px-4 py-2 rounded-full';
                    tag.innerHTML = `${type}: Rp ${Number(price).toLocaleString('id-ID')} (${quantity_available} Tersedia) <button type="button" onclick="this.parentElement.remove()" aria-label="Hapus Tiket">&times;</button>`;
                    container.appendChild(tag);
                }

                function getStatusBadge(status) {
                    let color = 'bg-gray-100 text-gray-600';
                    let text = 'Tidak Diketahui';
                    if (status === 'upcoming') {
                        color = 'bg-yellow-100 text-yellow-600';
                        text = 'Akan Datang';
                    } else if (status === 'ongoing') {
                        color = 'bg-green-100 text-green-600';
                        text = 'Sedang Berlangsung';
                    } else if (status === 'past') {
                        color = 'bg-blue-100 text-blue-600';
                        text = 'Selesai';
                    }
                    return `<span class="px-2 py-1 rounded-full ${color} text-xs" aria-label="Status: ${text}">${text}</span>`;
                }

                window.onclick = function(event) {
                    if (event.target.id === 'editModal' || event.target.id === 'deleteModal') {
                        closeModal(event.target.id);
                    }
                };

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        closeModal('editModal');
                        closeModal('deleteModal');
                    }
                });
            </script>
        @endpush
    </div>
</x-admin-layout>