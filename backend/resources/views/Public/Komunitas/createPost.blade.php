<x-layout>
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
    <div id="particles-js" class="fixed inset-0 z-[-1] opacity-40"></div>

    <section class="pt-16 pb-12 mt-8 bg-white min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">

            <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-xl">
                
                {{-- Judul Halaman --}}
                <h1 class="text-3xl font-extrabold text-gray-900 font-space-grotesk border-b pb-4 mb-6">
                    Buat Postingan Baru di r/{{ $community->name }}
                </h1>
                
                {{-- Formulir Pembuatan Post --}}
                <form action="{{ route('posts.store', $community->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    {{-- Pilihan Tipe Post --}}
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Pilih Tipe Postingan</label>
                        <select id="type" name="type" required
                            class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 focus:ring-gray-900 focus:border-gray-900 transition duration-300">
                            {{-- Opsi diambil dari kolom ENUM pada skema --}}
                            <option value="discussion" selected>Diskusi (Rich Text)</option>
                            <option value="images">Gambar/Foto</option>
                            <option value="video">Video/GIF</option>
                            <option value="link">Tautan/Link</option>
                            <option value="announcement">Pengumuman</option>
                            <option value="poll" disabled>Polling (Coming Soon)</option>
                            <option value="media">Media Lain</option>
                        </select>
                        @error('type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kolom Judul (title) --}}
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Postingan (Maks. 200 Karakter)</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required maxlength="200"
                            class="mt-1 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm text-gray-900 placeholder-gray-500 focus:ring-gray-900 focus:border-gray-900 transition duration-300 @error('title') border-red-500 @enderror"
                            placeholder="Tulis judul yang menarik di sini...">
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kolom Konten (content) - TINYMCE Rich Text Editor --}}
                    <div id="content-container">
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Konten Teks (Rich Text)</label>
                        {{-- ID 'content' digunakan untuk inisialisasi TinyMCE --}}
                        <textarea id="content" name="content" rows="10" 
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm @error('content') border-red-500 @enderror"
                            placeholder="Bagikan pemikiran, pertanyaan, atau detail diskusi Anda...">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kolom File (file_path) - Disembunyikan secara default --}}
                    <div id="file-container" class="hidden">
                        <label for="file_path" class="block text-sm font-medium text-gray-700 mb-2">Pilih File (Gambar/Video/Media)</label>
                        <input type="file" id="file_path" name="file_path"
                            class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-gray-900 focus:border-gray-900 @error('file_path') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500" id="file-help-text">Max file size 5MB. Format: JPG, PNG, GIF, MP4.</p>
                        @error('file_path')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kolom Link (Opsional untuk tipe 'link') --}}
                    <div id="link-container" class="hidden">
                        <label for="link_url" class="block text-sm font-medium text-gray-700 mb-2">URL/Tautan</label>
                        <input type="url" id="link_url" name="link_url" value="{{ old('link_url') }}"
                            class="mt-1 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm text-gray-900 placeholder-gray-500 focus:ring-gray-900 focus:border-gray-900 transition duration-300 @error('link_url') border-red-500 @enderror"
                            placeholder="Masukkan tautan di sini (e.g., https://example.com)">
                        @error('link_url')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="flex justify-end pt-4 border-t border-gray-200">
                        <button type="submit" class="glare-button px-6 py-3 bg-gray-900 text-white rounded-full font-semibold relative overflow-hidden hover:bg-gray-700 transition duration-300 shadow-md">
                            <i class="fas fa-paper-plane mr-2"></i> Publikasikan Postingan
                        </button>
                    </div>

                </form>
            </div>
            
        </div>
    </section>

    @push('styles')
        <style>
            /* Menggunakan styling monokrom hitam/abu-abu */
            .glare-button { position: relative; z-index: 1; }
            .glare-button::before {
                content: ''; position: absolute; top: 0; left: -100%; width: 50%; height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
                transition: all 0.5s ease; transform: skewX(-20deg); z-index: -1;
            }
            .glare-button:hover::before { left: 100%; }
            /* Mengganti aksen kuning dengan hover abu-abu gelap */
            .bg-gray-900 { background-color: #1f2937; /* Dark Gray/Almost Black */ }
            .hover\:bg-gray-700:hover { background-color: #374151 !important; }
            .focus\:ring-gray-900:focus { border-color: #1f2937; box-shadow: 0 0 0 3px rgba(31, 41, 55, 0.2); }

            /* Penyesuaian agar TinyMCE terlihat monokrom */
            .tox .tox-toolbar-overlord, .tox .tox-menubar {
                background-color: #f3f4f6 !important; /* Abu-abu muda */
                border-bottom: 1px solid #d1d5db !important; /* Border abu-abu */
            }
            .tox .tox-statusbar {
                background-color: #f3f4f6 !important;
                border-top: 1px solid #d1d5db !important;
            }
            .tox .tox-tbtn:hover {
                background-color: #e5e7eb !important; /* Hover abu-abu gelap */
            }
        </style>
    @endpush

    @push('scripts')
        {{-- TinyMCE API --}}
        <script src="https://cdn.tiny.cloud/1/vcya58nqfw4vp8bbe79scjwpyqp4vlnlbzodc3utt7zjubiz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        {{-- Particles JS --}}
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        
        <script>
            // 1. Inisialisasi TinyMCE
            tinymce.init({
                selector: '#content', // Target textarea dengan ID 'content'
                plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image media code | help',
                height: 400,
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; font-size:16px }',
                // Optional: Untuk tema monokrom
                skin: 'oxide',
                content_css: 'default',
            });

            // 2. Inisialisasi Particles JS (Monokrom)
            particlesJS("particles-js", {
                particles: {
                    number: { value: 50, density: { enable: true, value_area: 1000 } },
                    // Warna partikel diatur ke abu-abu gelap
                    color: { value: "#4b5563" }, 
                    shape: { type: "circle" },
                    opacity: { value: 0.4, random: true },
                    size: { value: 2, random: true },
                    line_linked: { enable: false },
                    move: { enable: true, speed: 0.5, direction: "top", out_mode: "out" },
                },
                interactivity: { events: { onhover: { enable: true, mode: "repulse" } }, modes: { repulse: { distance: 100, duration: 0.4 } } },
                retina_detect: true,
            });

            // 3. Logika JavaScript untuk menampilkan/menyembunyikan input
            document.addEventListener('DOMContentLoaded', function () {
                const typeSelect = document.getElementById('type');
                const contentContainer = document.getElementById('content-container');
                const fileContainer = document.getElementById('file-container');
                const linkContainer = document.getElementById('link-container');

                function toggleInputs() {
                    const selectedType = typeSelect.value;
                    const isRichText = (selectedType === 'discussion' || selectedType === 'announcement' || selectedType === 'link' || selectedType === 'images' || selectedType === 'video' || selectedType === 'media');

                    // Reset semua
                    fileContainer.classList.add('hidden');
                    linkContainer.classList.add('hidden');
                    
                    // Tampilkan atau sembunyikan TinyMCE Container
                    if (isRichText) {
                        contentContainer.classList.remove('hidden');
                        // TinyMCE harus ditampilkan
                        tinymce.get('content').show(); 
                    } else {
                        // Jika ada tipe yang tidak memerlukan teks di masa depan
                        contentContainer.classList.add('hidden');
                        tinymce.get('content').hide(); 
                    }

                    // Tampilkan file/link spesifik
                    if (selectedType === 'images' || selectedType === 'video' || selectedType === 'media') {
                        fileContainer.classList.remove('hidden');
                    } else if (selectedType === 'link') {
                        linkContainer.classList.remove('hidden');
                    }
                }

                typeSelect.addEventListener('change', toggleInputs);

                // Jalankan saat load
                toggleInputs();
            });
        </script>
    @endpush
</x-layout>