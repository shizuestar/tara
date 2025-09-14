<x-admin-layout>
    @section('title', 'TARA - Edit Profil')

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @endpush

    <main class="w-full pl-1 bg-gray-50 min-h-screen">
        <section class="bg-white bg-opacity-90 border border-gray-200 shadow-lg p-6 rounded-none w-full">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-gray-900">Edit Profil</h1>
                <a href="{{ url()->previous() }}" class="text-sm text-gray-500 hover:text-yellow-500 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-50 text-green-700 p-3 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf
                @method('POST')

                <div class="flex flex-col items-center mb-4">
                    <div class="relative cursor-pointer">
                        <img id="profilePreview" src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://th.bing.com/th/id/OIP.bJpr9jpclIkXQT-hkkb1KQHaHa?w=179&h=180&c=7&r=0&o=7&dpr=1.5&pid=1.7&rm=3' }}" 
                             alt="Profile" class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-md">
                        <div class="absolute inset-0 bg-black bg-opacity-40 rounded-full flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                            <i class="fas fa-camera text-white text-2xl"></i>
                        </div>
                    </div>
                    <input type="file" id="profilePicture" name="profilePicture" accept="image/*" class="hidden">
                    <button type="button" id="editPhotoBtn" class="text-sm text-gray-900 hover:text-yellow-500 transition-colors mt-2">Ubah foto profil</button>
                    @error('profilePicture')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required 
                               class="w-full p-2 border-2 border-gray-300 rounded-md text-sm focus:outline-none focus:border-black focus:ring-2 focus:ring-black/10">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="username" class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required 
                               class="w-full p-2 border-2 border-gray-300 rounded-md text-sm focus:outline-none focus:border-black focus:ring-2 focus:ring-black/10">
                        @error('username')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="bio" class="block text-sm font-semibold text-gray-700 mb-1">Bio</label>
                        <textarea id="bio" name="bio" rows="4" placeholder="Ceritakan sedikit tentang diri Anda" 
                                  class="w-full p-2 border-2 border-gray-300 rounded-md text-sm focus:outline-none focus:border-black focus:ring-2 focus:ring-black/10">{{ old('bio', $user->bio) }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Tambahkan LinkedIn dan Twitter dengan format: "Bio | LinkedIn: URL | Twitter: URL" (opsional)</p>
                        @error('bio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-4">
                    <a href="{{ url()->previous() }}" class="px-4 py-2 border-2 border-black text-black rounded-full text-sm hover:bg-black hover:text-white transition-colors">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-black text-white rounded-full text-sm hover:bg-gray-600 transition-colors">Simpan Perubahan</button>
                </div>
            </form>
        </section>
    </main>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const editPhotoBtn = document.getElementById('editPhotoBtn');
            const profilePictureInput = document.getElementById('profilePicture');
            const profilePreview = document.getElementById('profilePreview');

            editPhotoBtn.addEventListener('click', () => profilePictureInput.click());
            profilePreview.parentElement.addEventListener('click', () => profilePictureInput.click());
            profilePictureInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => profilePreview.src = e.target.result;
                    reader.readAsDataURL(file);
                }
            });
        </script>
    @endpush
</x-admin-layout>
