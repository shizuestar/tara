<x-layout>
    <div id="particles-js" class="fixed inset-0 z-[-1] opacity-40"></div>

    <section class="pt-16 pb-12 mt-8 min-h-screen flex justify-center items-start">
        <div class="w-full max-w-3xl bg-white border border-gray-200 rounded-xl p-8 shadow-2xl space-y-8">

            <header class="text-center border-b pb-4">
                <h1 class="text-3xl font-extrabold text-gray-900 font-space-grotesk flex items-center justify-center">
                    <i class="fas fa-users mr-3 text-gray-700"></i> Buat Komunitas Baru
                </h1>
                <p class="text-gray-600 mt-2">Mulai wadah Anda sendiri untuk berdiskusi dan berbagi.</p>
            </header>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Gagal membuat komunitas!</strong>
                    <span class="block sm:inline"> Mohon periksa kembali input Anda.</span>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('komunitas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 font-space-grotesk">
                        Nama Komunitas (r/nama_komunitas) <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: DiskusiTeknologi atau PecintaSeni"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 transition duration-150"
                        maxlength="50"
                    />
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input: Kategori Komunitas (category_id) --}}
                <div class="space-y-2">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 font-space-grotesk">
                        Pilih Kategori <span class="text-red-500">*</span>
                    </label>
                    <select
                        name="category_id"
                        id="category_id"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 transition duration-150"
                    >
                        <option value="" disabled selected>Pilih salah satu kategori...</option>
                        {{-- Asumsi variabel $categories berisi daftar objek Category --}}
                        @isset($categories)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        @endisset
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="space-y-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 font-space-grotesk">
                        Deskripsi Singkat Komunitas
                    </label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        placeholder="Jelaskan apa tujuan komunitas ini, dan apa yang bisa didiskusikan di dalamnya."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 transition duration-150"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- INPUT BARU: Peraturan Komunitas (Rules) --}}
                <div class="space-y-2">
                    <label for="rules" class="block text-sm font-medium text-gray-700 font-space-grotesk">
                        Peraturan Komunitas (Satu per baris)
                    </label>
                    <textarea
                        name="rules"
                        id="rules"
                        rows="6"
                        placeholder="Contoh:&#10;1. Jaga kesopanan dan hormati anggota lain.&#10;2. Dilarang memposting konten SARA atau pornografi.&#10;3. Pastikan postingan sesuai dengan topik komunitas."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 transition duration-150"
                    >{{ old('rules') }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">
                        Masukkan setiap peraturan pada baris baru. Ini akan ditampilkan di sidebar komunitas Anda.
                    </p>
                    @error('rules')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                {{-- AKHIR INPUT BARU --}}

                <div class="space-y-2">
                    <label for="type" class="block text-sm font-medium text-gray-700 font-space-grotesk">
                        Jenis Akses Komunitas <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex gap-6">
                        <label class="inline-flex items-center">
                            <input
                                type="radio"
                                name="type"
                                value="public"
                                class="form-radio h-4 w-4 text-gray-600 border-gray-300"
                                required
                                {{ old('type', 'public') == 'public' ? 'checked' : '' }}
                            />
                            <span class="ml-2 text-gray-700 font-medium">Publik</span>
                            <span class="ml-2 text-xs text-gray-500"> (Siapa saja bisa melihat dan posting)</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input
                                type="radio"
                                name="type"
                                value="private"
                                class="form-radio h-4 w-4 text-gray-600 border-gray-300"
                                {{ old('type') == 'private' ? 'checked' : '' }}
                            />
                            <span class="ml-2 text-gray-700 font-medium">Privat</span>
                            <span class="ml-2 text-xs text-gray-500"> (Hanya anggota terundang yang bisa melihat dan posting)</span>
                        </label>
                    </div>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="cover_image" class="block text-sm font-medium text-gray-700 font-space-grotesk">
                        Gambar Sampul (Opsional)
                    </label>
                    <input
                        type="file"
                        name="cover_image"
                        id="cover_image"
                        accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-gray-50 focus:ring-gray-500 focus:border-gray-500 transition duration-150"
                    />
                    <p class="text-xs text-gray-500 mt-1">
                        Unggah gambar berukuran besar untuk sampul komunitas. (Maks. 2MB)
                    </p>
                    @error('cover_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 border-t border-gray-200 flex justify-end gap-3">
                    <a href="{{ url()->previous() }}" class="px-6 py-2 border border-gray-300 rounded-full text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 transition duration-150 shadow-md">
                        Batal
                    </a>
                    <button type="submit" class="glare-button px-6 py-2 rounded-full text-sm font-semibold text-white bg-gray-900 hover:bg-gray-700 transition duration-300 shadow-lg">
                        <i class="fas fa-check-circle mr-1"></i> Buat Komunitas
                    </button>
                </div>
                
                <p class="text-xs text-gray-500 mt-4 text-center">
                    Komunitas akan berstatus *pending* dan memerlukan persetujuan admin untuk menjadi *active*.
                </p>

            </form>

        </div>
    </section>

    @push('styles')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap');
            body { background-color: #f7f7f7; }
            .font-space-grotesk { font-family: 'Space Grotesk', sans-serif; }

            .glare-button {
                position: relative;
                z-index: 1;
                overflow: hidden;
            }
            .glare-button::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 50%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
                transition: all 0.5s ease;
                transform: skewX(-20deg);
                z-index: 0;
            }
            .glare-button:hover::before {
                left: 120%;
            }
            .glare-button > * {
                position: relative;
                z-index: 2;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script>
            window.addEventListener("load", () => {
                particlesJS("particles-js", {
                    particles: {
                        number: { value: 50, density: { enable: true, value_area: 1000 } },
                        color: { value: "#6b7280" },
                        shape: { type: "circle" },
                        opacity: { value: 0.4, random: true },
                        size: { value: 2, random: true },
                        line_linked: { enable: false },
                        move: { enable: true, speed: 0.5, direction: "top", out_mode: "out" },
                    },
                    interactivity: { events: { onhover: { enable: true, mode: "repulse" } }, modes: { repulse: { distance: 100, duration: 0.4 } } },
                    retina_detect: true,
                });
            });
        </script>
    @endpush
</x-layout>
