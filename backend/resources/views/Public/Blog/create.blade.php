<x-layout>
    <style>
        body, * {
            font-family: 'Space Grotesk', sans-serif !important;
        }
    </style>

    <section class="py-16 bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="max-w-4xl w-full mx-auto px-6">
            
            <h1 class="text-4xl font-extrabold text-gray-900 mb-6 text-center">Tulis Artikel Baru</h1>
            
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-8 rounded-lg shadow-inner" role="alert">
                <p class="font-bold">Proses Tinjauan</p>
                <p class="text-sm">Artikel Anda akan disimpan sebagai <b>Draft</b> dan akan melalui tinjauan oleh admin sebelum dipublikasikan.</p>
            </div>
            
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-xl shadow-2xl border border-gray-200">
                @csrf

                <div class="mb-6">
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Judul Artikel</label>
                    <input type="text" id="title" name="title" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500 transition duration-150 text-gray-900 placeholder-gray-400 text-lg"
                        placeholder="Masukkan judul yang menarik..."
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category_id" class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                    <select id="category_id" name="category_id" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500 transition duration-150 text-gray-700">
                        <option value="" disabled selected>Pilih Kategori</option>
                        {{-- Asumsikan Anda melewatkan variabel $categories dari controller --}}
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="cover_image" class="block text-sm font-bold text-gray-700 mb-2">Cover Image (Opsional)</label>
                    <input type="file" id="cover_image" name="cover_image" accept="image/*"
                        class="w-full file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-900 file:text-white hover:file:bg-gray-700 transition duration-150 border border-gray-300 rounded-lg p-3 cursor-pointer">
                    @error('cover_image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <label for="content" class="block text-sm font-bold text-gray-700 mb-2">Isi Konten</label>
                    <textarea id="content" name="content" rows="15" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500 transition duration-150 text-gray-900 placeholder-gray-400">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('blogs.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-full font-semibold hover:bg-gray-200 transition duration-300">
                        Batal
                    </a>
                    <button type="submit" class="px-8 py-3 bg-gray-900 text-white rounded-full font-extrabold hover:bg-gray-700 transition duration-300 shadow-lg">
                        Kirim untuk Ditinjau
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layout>