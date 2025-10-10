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

    <div class="max-w-3xl mx-auto px-6 py-8 mt-20">
        <h1 class="text-3xl font-bold mb-8 text-gray-900 border-b-4 border-black pb-3">Tambah Karya Baru ke Galeri</h1>
        
        <form id="galeriForm" method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf
            
            <div class="space-y-4 p-6 border border-red-400 rounded-lg shadow-md bg-red-50">
                <h2 class="text-xl font-semibold text-red-700 border-b border-red-300 pb-3">Syarat & Peraturan Posting Galeri</h2>
                <ul class="list-disc ml-5 text-sm text-gray-700 space-y-2">
                    <li>Karya harus <strong>original</strong> dan merupakan milik pembuat.</li>
                    <li>Konten dilarang mengandung unsur SARA, pornografi, atau ujaran kebencian.</li>
                    <li>Format file yang diterima: <strong>JPG/PNG</strong> untuk thumbnail, dan <strong>PDF/GIF</strong> untuk file tambahan. Maksimal ukuran file utama 5MB.</li>
                    <li>Dengan menekan tombol 'Simpan', Anda menyetujui bahwa karya ini dapat ditampilkan di platform kami.</li>
                    <li>Tim kami berhak meninjau dan menolak postingan yang tidak memenuhi standar kualitas atau melanggar peraturan yang ditetapkan.</li>
                </ul>
                
                <div class="flex items-start mt-4 pt-4 border-t border-red-200">
                    <div class="flex items-center h-5">
                        <input id="agreement" name="agreement" type="checkbox" required class="focus:ring-black h-4 w-4 text-black border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="agreement" class="font-medium text-gray-700">Saya telah membaca dan menyetujui Syarat & Peraturan Posting Galeri. <span class="text-red-500">*</span></label>
                    </div>
                    @error('agreement')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="space-y-6 p-6 border border-gray-200 rounded-lg shadow-sm bg-white">
                <h2 class="text-xl font-semibold text-gray-800 border-b pb-3 mb-4">Detail Karya & Unggahan File</h2>
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Karya <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi (Jelaskan konsep/cerita karya)</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div id="fileUploadContainer">
                    <div class="mb-4">
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail / Gambar Utama <span class="text-red-500">*</span></label>
                        <input type="file" name="thumbnail" id="thumbnail" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-gray-800" required>
                        <p class="mt-1 text-xs text-gray-500">Wajib. Format: JPG, PNG. Maks. 5MB.</p>
                        @error('thumbnail')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="files" class="block text-sm font-medium text-gray-700">File Tambahan (Sertakan detail, varian, atau studi kasus)</label>
                        <input type="file" name="files[]" id="files" multiple class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-gray-800">
                        <p class="mt-1 text-xs text-gray-500">Anda dapat memilih beberapa file sekaligus. Maks. 5 file total.</p>
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
                        <option value="Monokrom" {{ old('palette') == 'Monokrom' ? 'selected' : '' }}>Monokrom</option>
                        <option value="Pastel" {{ old('palette') == 'Pastel' ? 'selected' : '' }}>Pastel</option>
                        <option value="Kontras Tinggi" {{ old('palette') == 'Kontras Tinggi' ? 'selected' : '' }}>Kontras Tinggi</option>
                        <option value="Hangat" {{ old('palette') == 'Hangat' ? 'selected' : '' }}>Hangat</option>
                        <option value="Dingin" {{ old('palette') == 'Dingin' ? 'selected' : '' }}>Dingin</option>
                    </select>
                    @error('palette')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="typography" class="block text-sm font-medium text-gray-700">Tipografi</label>
                    <select name="typography" id="typography" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        <option value="">Pilih Tipografi</option>
                        <option value="Sans-serif" {{ old('typography') == 'Sans-serif' ? 'selected' : '' }}>Sans-serif</option>
                        <option value="Serif" {{ old('typography') == 'Serif' ? 'selected' : '' }}>Serif</option>
                        <option value="Script" {{ old('typography') == 'Script' ? 'selected' : '' }}>Script</option>
                        <option value="Display" {{ old('typography') == 'Display' ? 'selected' : '' }}>Display</option>
                    </select>
                    @error('typography')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="visual_style" class="block text-sm font-medium text-gray-700">Gaya Visual</label>
                    <select name="visual_style" id="visual_style" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        <option value="">Pilih Gaya Visual</option>
                        <option value="Minimalis" {{ old('visual_style') == 'Minimalis' ? 'selected' : '' }}>Minimalis</option>
                        <option value="Ekspresionis" {{ old('visual_style') == 'Ekspresionis' ? 'selected' : '' }}>Ekspresionis</option>
                        <option value="Retro" {{ old('visual_style') == 'Retro' ? 'selected' : '' }}>Retro</option>
                        <option value="Futuristik" {{ old('visual_style') == 'Futuristik' ? 'selected' : '' }}>Futuristik</option>
                    </select>
                    @error('visual_style')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="media" class="block text-sm font-medium text-gray-700">Media</label>
                    <select name="media" id="media" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        <option value="">Pilih Media</option>
                        <option value="Digital" {{ old('media') == 'Digital' ? 'selected' : '' }}>Digital</option>
                        <option value="Cat Air" {{ old('media') == 'Cat Air' ? 'selected' : '' }}>Cat Air</option>
                        <option value="3D" {{ old('media') == '3D' ? 'selected' : '' }}>3D</option>
                        <option value="Mixed Media" {{ old('media') == 'Mixed Media' ? 'selected' : '' }}>Mixed Media</option>
                    </select>
                    @error('media')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="tags" class="block text-sm font-medium text-gray-700">Tag (pisahkan dengan koma)</label>
                    <input type="text" name="tags" id="tags" value="{{ old('tags') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
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
                        {{-- PASTIKAN ARRAY $categories DIKIRIM DARI CONTROLLER --}}
                        @foreach(isset($categories) ? $categories : [] as $id => $name)
                            <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
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
                        {{-- PASTIKAN ARRAY $communities DIKIRIM DARI CONTROLLER --}}
                        @foreach(isset($communities) ? $communities : [] as $id => $name)
                            <option value="{{ $id }}" {{ old('community_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
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
                        <option value="2020 - Kini" {{ old('period') == '2020 - Kini' ? 'selected' : '' }}>2020 - Kini</option>
                        <option value="2010 - 2019" {{ old('period') == '2010 - 2019' ? 'selected' : '' }}>2010 - 2019</option>
                        <option value="2000 - 2009" {{ old('period') == '2000 - 2009' ? 'selected' : '' }}>2000 - 2009</option>
                    </select>
                    @error('period')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" id="submitButton" class="w-full px-4 py-3 bg-black text-white font-semibold rounded-md shadow-lg hover:bg-gray-800 transition tracking-wider">
                    Kirim Karya untuk Ditinjau
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
            // fileCount dimulai dari 1 karena 1 field files[] sudah ada di HTML
            let fileCount = 1; 

            // 1. Logika Tombol "Tambah Lebih Banyak File"
            addMoreButton.addEventListener('click', function() {
                // Batasi total file tambahan (termasuk yang sudah ada di HTML) menjadi 5
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
                    addMoreButton.textContent = "Batas File Tambahan Tercapai (5)";
                }
            });

            // 2. Logika Alert pada saat Submit
            form.addEventListener('submit', function(e) {
                // Cek persetujuan secara eksplisit
                const agreement = document.getElementById('agreement');
                if (!agreement.checked) {
                    // Biarkan validasi HTML5 bawaan yang menangani
                    return; 
                }

                // Hentikan pengiriman form bawaan untuk menampilkan alert
                e.preventDefault(); 
                
                // Tampilkan Alert/Popup Notifikasi
                alert('Pesan Terkirim! Karya Anda berhasil disubmit untuk ditinjau. Silakan tunggu notifikasi dari admin atau kurator mengenai status persetujuan.');
                
                // Lanjutkan pengiriman form ke action Laravel setelah alert ditutup
                // (Memberi jeda 0.5 detik untuk memastikan alert muncul dan tombol tidak langsung diklik ulang)
                submitButton.disabled = true;
                setTimeout(() => form.submit(), 500); 
            });
        });
    </script>
</x-layout> 