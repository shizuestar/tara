<x-layout>
    <div class="max-w-3xl mx-auto px-6 py-8 mt-20">
        <h1 class="text-3xl font-bold mb-8 text-gray-900 border-b-4 border-black pb-3">Edit Karya</h1>
        
        <form id="galeriForm" method="POST" action="{{ route('galeri.update', $artwork) }}" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')
            
            <div class="space-y-6 p-6 border border-gray-200 rounded-lg shadow-sm bg-white">
                <h2 class="text-xl font-semibold text-gray-800 border-b pb-3 mb-4">Detail Karya & Unggahan File</h2>
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Karya <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $artwork->title) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi (Jelaskan konsep/cerita karya)</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">{{ old('description', $artwork->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div id="fileUploadContainer">
                    <div class="mb-4">
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail / Gambar Utama</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-gray-800">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG. Maks. 5MB.</p>
                        @if($artwork->thumbnail)
                            <img src="{{ asset('storage/' . $artwork->thumbnail) }}" alt="{{ $artwork->title }}" class="mt-2 w-32 h-32 object-cover rounded-md">
                        @endif
                        @error('thumbnail')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="files" class="block text-sm font-medium text-gray-700">File Tambahan (Sertakan detail, varian, atau studi kasus)</label>
                        <input type="file" name="files[]" id="files" multiple class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-gray-800">
                        <p class="mt-1 text-xs text-gray-500">Anda dapat memilih beberapa file sekaligus. Maks. 5 file total.</p>
                        @foreach($artwork->files as $file)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $file->image_path) }}" alt="{{ $file->image_title ?? '' }}" class="w-32 h-32 object-cover rounded-md">
                            </div>
                        @endforeach
                        @error('files.*')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div id="dynamicFileFields"></div>

                    <button type="button" id="addMoreFiles" class="mt-2 w-auto px-4 py-2 text-sm bg-gray-100 text-gray-700 border border-gray-300 rounded-md shadow hover:bg-gray-200 transition">
                        + Tambah Lebih Banyak File (Opsional)
                    </button>
                    <p class="mt-1 text-xs text-red-500">Catatan: Jika Anda mengunggah lebih dari 5 file, hanya 5 file pertama yang akan diproses pada tahap ini.</p>
                </div>
            </div>

            <div class="space-y-6 p-6 border border-gray-200 rounded-lg shadow-sm bg-white grid grid-cols-1 md:grid-cols-2 gap-6">
                <h2 class="text-xl font-semibold text-gray-800 md:col-span-2 border-b pb-3 mb-4">Metadata Kreatif</h2>
                
                <div>
                    <label for="palette" class="block text-sm font-medium text-gray-700">Palet Warna</label>
                    <select name="palette" id="palette" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        <option value="">Pilih Palet</option>
                        <option value="Monokrom" {{ old('palette', $artwork->palette) == 'Monokrom' ? 'selected' : '' }}>Monokrom</option>
                        <option value="Pastel" {{ old('palette', $artwork->palette) == 'Pastel' ? 'selected' : '' }}>Pastel</option>
                        <option value="Kontras Tinggi" {{ old('palette', $artwork->palette) == 'Kontras Tinggi' ? 'selected' : '' }}>Kontras Tinggi</option>
                        <option value="Hangat" {{ old('palette', $artwork->palette) == 'Hangat' ? 'selected' : '' }}>Hangat</option>
                        <option value="Dingin" {{ old('palette', $artwork->palette) == 'Dingin' ? 'selected' : '' }}>Dingin</option>
                    </select>
                    @error('palette')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="typography" class="block text-sm font-medium text-gray-700">Tipografi</label>
                    <select name="typography" id="typography" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        <option value="">Pilih Tipografi</option>
                        <option value="Sans-serif" {{ old('typography', $artwork->typography) == 'Sans-serif' ? 'selected' : '' }}>Sans-serif</option>
                        <option value="Serif" {{ old('typography', $artwork->typography) == 'Serif' ? 'selected' : '' }}>Serif</option>
                        <option value="Script" {{ old('typography', $artwork->typography) == 'Script' ? 'selected' : '' }}>Script</option>
                        <option value="Display" {{ old('typography', $artwork->typography) == 'Display' ? 'selected' : '' }}>Display</option>
                    </select>
                    @error('typography')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="visual_style" class="block text-sm font-medium text-gray-700">Gaya Visual</label>
                    <select name="visual_style" id="visual_style" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        <option value="">Pilih Gaya Visual</option>
                        <option value="Minimalis" {{ old('visual_style', $artwork->visual_style) == 'Minimalis' ? 'selected' : '' }}>Minimalis</option>
                        <option value="Ekspresionis" {{ old('visual_style', $artwork->visual_style) == 'Ekspresionis' ? 'selected' : '' }}>Ekspresionis</option>
                        <option value="Retro" {{ old('visual_style', $artwork->visual_style) == 'Retro' ? 'selected' : '' }}>Retro</option>
                        <option value="Futuristik" {{ old('visual_style', $artwork->visual_style) == 'Futuristik' ? 'selected' : '' }}>Futuristik</option>
                    </select>
                    @error('visual_style')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="media" class="block text-sm font-medium text-gray-700">Media</label>
                    <select name="media" id="media" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        <option value="">Pilih Media</option>
                        <option value="Digital" {{ old('media', $artwork->media) == 'Digital' ? 'selected' : '' }}>Digital</option>
                        <option value="Cat Air" {{ old('media', $artwork->media) == 'Cat Air' ? 'selected' : '' }}>Cat Air</option>
                        <option value="3D" {{ old('media', $artwork->media) == '3D' ? 'selected' : '' }}>3D</option>
                        <option value="Mixed Media" {{ old('media', $artwork->media) == 'Mixed Media' ? 'selected' : '' }}>Mixed Media</option>
                    </select>
                    @error('media')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="tags" class="block text-sm font-medium text-gray-700">Tag (pisahkan dengan koma)</label>
                    <input type="text" name="tags" id="tags" value="{{ old('tags', $artwork->tags->pluck('tag')->implode(',')) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                    <p class="mt-1 text-xs text-gray-500">Contoh: #Ilustrasi, #DesainGrafis, #Abstrak.</p>
                    @error('tags')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="space-y-6 p-6 border border-gray-200 rounded-lg shadow-sm bg-white grid grid-cols-1 md:grid-cols-2 gap-6">
                <h2 class="text-xl font-semibold text-gray-800 md:col-span-2 border-b pb-3 mb-4">Klasifikasi Proyek</h2>
                
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}" {{ old('category_id', $artwork->category_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="community_id" class="block text-sm font-medium text-gray-700">Komunitas</label>
                    <select name="community_id" id="community_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        <option value="">Pilih Komunitas (Opsional)</option>
                        @foreach($communities as $id => $name)
                            <option value="{{ $id }}" {{ old('community_id', $artwork->community_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('community_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="period" class="block text-sm font-medium text-gray-700">Periode Karya</label>
                    <select name="period" id="period" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        <option value="">Pilih Periode</option>
                        <option value="2020 - Kini" {{ old('period', $artwork->period) == '2020 - Kini' ? 'selected' : '' }}>2020 - Kini</option>
                        <option value="2010 - 2019" {{ old('period', $artwork->period) == '2010 - 2019' ? 'selected' : '' }}>2010 - 2019</option>
                        <option value="2000 - 2009" {{ old('period', $artwork->period) == '2000 - 2009' ? 'selected' : '' }}>2000 - 2009</option>
                    </select>
                    @error('period')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        <option value="draft" {{ old('status', $artwork->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $artwork->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="rejected" {{ old('status', $artwork->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" id="submitButton" class="w-full px-4 py-3 bg-black text-white font-semibold rounded-md shadow-lg hover:bg-gray-800 transition tracking-wider">
                    Perbarui Karya
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('galeriForm');
            const submitButton = document.getElementById('submitButton');
            const addMoreButton = document.getElementById('addMoreFiles');
            const dynamicContainer = document.getElementById('dynamicFileFields');
            let fileCount = {{ $artwork->files->count() }};

            addMoreButton.addEventListener('click', function() {
                if (fileCount >= 5) {
                    alert('Maksimal 5 file tambahan diperbolehkan.');
                    return;
                }
                fileCount++;
                const newField = document.createElement('div');
                newField.className = 'mb-4';
                newField.innerHTML = `
                    <label for="files_${fileCount}" class="block text-sm font-medium text-gray-700">File Tambahan #${fileCount}</label>
                    <input type="file" name="files[]" id="files_${fileCount}" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-600 file:text-white hover:file:bg-gray-700">
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, PDF, GIF. Maks. 5MB.</p>
                `;
                dynamicContainer.appendChild(newField);
                
                if (fileCount >= 5) {
                    addMoreButton.disabled = true;
                    addMoreButton.textContent = "Batas File Tambahan Tercapai";
                }
            });

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Karya Anda berhasil diperbarui.');
                setTimeout(() => form.submit(), 500);
            });
        });
    </script>