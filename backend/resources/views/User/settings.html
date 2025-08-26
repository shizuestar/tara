<x-layout>
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-50 border-r border-gray-200 p-6">
            <h2 class="text-lg font-semibold mb-6">Pengaturan</h2>
            <nav class="space-y-3 text-sm text-gray-600">
                <a href="#" data-target="section-profile" class="side-link block hover:text-black font-semibold text-black bg-gray-200 rounded-md px-2 py-1">Profil Publik</a>
                <a href="#" data-target="section-account" class="side-link block hover:text-black">Akun</a>
                <a href="#" data-target="section-notif" class="side-link block hover:text-black">Notifikasi</a>
                <a href="#" data-target="section-cms" class="side-link block hover:text-black">Manajemen Konten</a>
                <div class="mt-4 border-t border-gray-200 pt-4 text-xs text-gray-400 uppercase">Akses</div>
                <a href="#" data-target="section-emails" class="side-link block hover:text-black">Email</a>
                <a href="#" data-target="section-password" class="side-link block hover:text-black">Kata Sandi & Autentikasi</a>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 px-10 py-8">
            <div class="max-w-3xl mx-auto space-y-12">
                <!-- Profil Publik -->
                <section id="section-profile" class="section">
                    <h1 class="text-2xl font-semibold mb-8">Profil Publik</h1>
                    <form action="{{ route('settings.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="mt-10 flex items-center">
                            <img src="{{ auth()->user()->profile_photo_url }}" alt="Foto Profil" class="rounded-full w-24 h-24 object-cover border border-gray-300" />
                            <input type="file" name="profile_photo" class="ml-4 px-4 py-2 border rounded-md text-sm hover:bg-gray-100" accept="image/*" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Nama</label>
                            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <p class="text-xs text-gray-500 mt-1">Namamu akan tampil di profil publik, komentar, dan aktivitas lainnya.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Email Publik</label>
                            <select name="public_email" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-white">
                                @foreach (auth()->user()->emails as $email)
                                    <option {{ auth()->user()->public_email == $email->email ? 'selected' : '' }}>{{ $email->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Bio</label>
                            <textarea name="bio" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm h-20 resize-none">{{ old('bio', auth()->user()->bio) }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">Kamu bisa menggunakan <code>@tag</code> untuk menyebut pengguna lain di komunitas.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kata Ganti (Pronouns)</label>
                            <select name="pronouns" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-white">
                                <option {{ auth()->user()->pronouns == 'Tidak ingin menyebutkan' ? 'selected' : '' }}>Tidak ingin menyebutkan</option>
                                <option {{ auth()->user()->pronouns == 'Dia/laki-laki' ? 'selected' : '' }}>Dia/laki-laki</option>
                                <option {{ auth()->user()->pronouns == 'Dia/perempuan' ? 'selected' : '' }}>Dia/perempuan</option>
                                <option {{ auth()->user()->pronouns == 'Mereka' ? 'selected' : '' }}>Mereka</option>
                            </select>
                        </div>
                        <div class="pt-4 flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm">Simpan Perubahan</button>
                        </div>
                    </form>
                </section>

                <!-- Akun -->
                <section id="section-account" class="section hidden">
                    <h1 class="text-2xl font-semibold mb-8">Akun</h1>
                    <form action="{{ route('settings.account.update') }}" method="POST" class="space-y-8">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label class="block text-sm font-medium mb-1">Username</label>
                            <input type="text" name="username" value="{{ old('username', auth()->user()->username) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <p class="text-xs text-gray-500 mt-1">Username digunakan sebagai identitas publik kamu.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Email Utama</label>
                            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <p class="text-xs text-gray-500 mt-1">Email ini dipakai untuk verifikasi & komunikasi penting.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Nomor Telepon (opsional)</label>
                            <input type="tel" name="phone" value="{{ old('phone', auth()->user()->phone) }}" placeholder="+62 8xxx" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <p class="text-xs text-gray-500 mt-1">Dipakai untuk pemulihan akun kalau lupa kata sandi.</p>
                        </div>
                        <div class="pt-4 flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm">Simpan Perubahan</button>
                        </div>
                    </form>
                    <hr class="my-10 border-t border-gray-300" />
                    <div class="border border-red-200 bg-red-50 p-6 rounded-lg">
                        <h2 class="text-lg font-semibold text-red-600 mb-2">Hapus Akun</h2>
                        <p class="text-sm text-red-500 mb-4">Tindakan ini tidak bisa dibatalkan. Seluruh data kamu akan dihapus secara permanen dari sistem.</p>
                        <button onclick="bukaModalHapus()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm transition shadow-sm">Hapus Akun</button>
                    </div>
                    <div id="modalHapus" class="fixed inset-0 z-50 hidden bg-black bg-opacity-40 items-center justify-center">
                        <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6">
                            <h3 class="text-lg font-semibold text-red-600 mb-2">Konfirmasi Hapus Akun</h3>
                            <p class="text-sm text-gray-600 mb-4">Apakah kamu yakin ingin menghapus akun ini? Tindakan ini tidak bisa dibatalkan.</p>
                            <div class="flex justify-end space-x-3">
                                <button onclick="tutupModalHapus()" class="px-4 py-2 text-sm rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700 transition">Batal</button>
                                <form action="{{ route('settings.account.delete') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-sm rounded-md bg-red-600 hover:bg-red-700 text-white transition">Ya, Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Notifikasi -->
                <section id="section-notif" class="section hidden">
                    <h1 class="text-2xl font-semibold mb-8">Notifikasi</h1>
                    <form action="{{ route('settings.notifications.update') }}" method="POST" class="space-y-10">
                        @csrf
                        @method('PATCH')
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h2 class="text-lg font-semibold mb-4">Jenis Notifikasi</h2>
                            <div class="space-y-4 text-sm text-gray-700">
                                <label class="flex justify-between items-start">
                                    <span>
                                        <span class="font-medium block">Mention & Partisipasi</span>
                                        <span class="text-xs text-gray-500">Pemberitahuan jika kamu ditandai dengan <code>@username</code> atau diajak kolaborasi.</span>
                                    </span>
                                    <input type="checkbox" name="mentions" class="h-4 w-4 text-blue-600" {{ auth()->user()->notification_settings['mentions'] ?? false ? 'checked' : '' }} />
                                </label>
                                <label class="flex justify-between items-start">
                                    <span>
                                        <span class="font-medium block">Artikel & Konten Baru</span>
                                        <span class="text-xs text-gray-500">Dapatkan info saat artikel baru terbit dari topik favoritmu.</span>
                                    </span>
                                    <input type="checkbox" name="new_content" class="h-4 w-4 text-blue-600" {{ auth()->user()->notification_settings['new_content'] ?? false ? 'checked' : '' }} />
                                </label>
                            </div>
                        </div>
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h2 class="text-lg font-semibold mb-4">Notifikasi dari Pengguna yang Diikuti</h2>
                            <div class="space-y-4 text-sm text-gray-700">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Semua</span>
                                    <input type="checkbox" name="followed_users_all" class="h-4 w-4 text-blue-600" {{ auth()->user()->notification_settings['followed_users_all'] ?? false ? 'checked' : '' }} />
                                </div>
                                <hr class="my-6 border-t border-gray-300" />
                                @foreach (auth()->user()->followedUsers as $user)
                                    <div class="flex justify-between items-center">
                                        <span class="font-medium">{{ $user->name }}</span>
                                        <input type="checkbox" name="followed_users[{{ $user->id }}]" class="h-4 w-4 text-blue-600" {{ in_array($user->id, auth()->user()->notification_settings['followed_users'] ?? []) ? 'checked' : '' }} />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h2 class="text-lg font-semibold mb-4">Notifikasi dari Komunitas</h2>
                            <div class="space-y-4 text-sm text-gray-700">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Semua</span>
                                    <input type="checkbox" name="communities_all" class="h-4 w-4 text-blue-600" {{ auth()->user()->notification_settings['communities_all'] ?? false ? 'checked' : '' }} />
                                </div>
                                <hr class="my-6 border-t border-gray-300" />
                                @foreach (auth()->user()->communities as $community)
                                    <div class="flex justify-between items-center">
                                        <span class="font-medium">{{ $community->name }}</span>
                                        <input type="checkbox" name="communities[{{ $community->id }}]" class="h-4 w-4 text-blue-600" {{ in_array($community->id, auth()->user()->notification_settings['communities'] ?? []) ? 'checked' : '' }} />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pt-2 flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm">Simpan Perubahan</button>
                        </div>
                    </form>
                </section>

                <!-- Manajemen Konten -->
                <section id="section-cms" class="section hidden">
                    <h1 class="text-2xl font-semibold mb-8">Manajemen Konten</h1>
                    <p class="text-gray-600 mb-6">Atur dan kelola kontenmu di platform ini.</p>
                    <form action="{{ route('settings.content.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="bg-gray-50 border border-gray-200 rounded-lg divide-y divide-gray-200 shadow-sm overflow-hidden">
                            @foreach (auth()->user()->contents as $content)
                                <div class="flex items-center justify-between px-6 py-4 hover:bg-gray-100 transition">
                                    <div class="flex items-center space-x-3">
                                        <input type="checkbox" name="content[]" value="{{ $content->id }}" class="h-4 w-4 text-blue-500" />
                                        <div>
                                            <p class="font-medium text-sm">{{ $content->path }}</p>
                                            <p class="text-xs text-gray-500">{{ number_format($content->size / 1024 / 1024, 1) }} MB</p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-gray-500">{{ $content->type }}</span>
                                </div>
                            @endforeach
                        </div>
                        <p class="text-xs text-gray-400">Centang konten untuk mengatur tindakan massal seperti hapus, arsip, atau pindahkan.</p>
                        <div class="flex flex-wrap justify-end gap-3">
                            <button type="submit" name="action" value="delete" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 text-sm rounded-md transition shadow-sm">Hapus yang Dipilih</button>
                            <button type="submit" name="action" value="archive" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 text-sm rounded-md transition shadow-sm">Arsipkan</button>
                            <button type="submit" name="action" value="move" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 text-sm rounded-md transition shadow-sm">Pindahkan</button>
                        </div>
                    </form>
                </section>

                <!-- Email -->
                <section id="section-emails" class="section hidden">
                    <h1 class="text-2xl font-semibold mb-8">Email</h1>
                    <p class="text-gray-600 mb-6">Kelola email dan pengaturan privasinya.</p>
                    @if (auth()->user()->emails->count() <= 1)
                        <div class="flex items-start gap-3 bg-yellow-100 border border-yellow-300 text-yellow-900 px-4 py-3 rounded-md mb-6">
                            <svg class="w-5 h-5 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.72-1.36 3.485 0l6.514 11.586c.75 1.335-.213 3-1.742 3H3.485c-1.53 0-2.492-1.665-1.743-3l6.515-11.586zM9 7a1 1 0 012 0v4a1 1 0 11-2 0V7zm1 8a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-sm leading-5">Kamu hanya memiliki satu alamat email yang terverifikasi di akunmu. Tambahkan email terverifikasi tambahan untuk berjaga-jaga jika kamu kehilangan akses ke email utama.</p>
                        </div>
                    @endif
                    <div class="space-y-4">
                        @foreach (auth()->user()->emails as $email)
                            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                                <div>
                                    <p class="text-sm font-medium">{{ $email->email }}</p>
                                    <div class="flex flex-wrap gap-2 mt-1 text-xs">
                                        @if ($email->is_primary)
                                            <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded">Utama</span>
                                        @else
                                            <span class="bg-gray-100 text-gray-700 px-2 py-0.5 rounded">Sekunder</span>
                                        @endif
                                        <span class="{{ $email->is_verified ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-600' }} px-2 py-0.5 rounded">{{ $email->is_verified ? 'Terverifikasi' : 'Belum Diverifikasi' }}</span>
                                        @if ($email->is_google_connected)
                                            <span class="bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded">Terhubung Google</span>
                                        @endif
                                    </div>
                                </div>
                                <form action="{{ route('settings.email.delete', $email->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-blue-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <hr class="my-10 border-t border-gray-200" />
                    <div class="mb-10">
                        <h2 class="text-lg font-semibold mb-4">Tambahkan Email Baru</h2>
                        <form action="{{ route('settings.email.add') }}" method="POST" class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
                            @csrf
                            <input type="email" name="email" placeholder="Alamat email baru" class="w-full sm:w-80 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm">Tambah</button>
                        </form>
                    </div>
                    <div class="mb-10">
                        <h2 class="text-lg font-semibold mb-4">Pilih Email Utama</h2>
                        <form action="{{ route('settings.email.primary') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="email" class="w-full sm:w-96 border border-gray-300 rounded-md px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @foreach (auth()->user()->emails as $email)
                                    <option {{ auth()->user()->email == $email->email ? 'selected' : '' }}>{{ $email->email }}</option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-500 mt-1">Email utama digunakan untuk login dan verifikasi akun.</p>
                            <button type="submit" class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm">Simpan Perubahan</button>
                        </form>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Pilih Email Cadangan (Backup)</h2>
                        <form action="{{ route('settings.email.backup') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="backup_email" class="w-full sm:w-96 border border-gray-300 rounded-md px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @foreach (auth()->user()->emails as $email)
                                    <option {{ auth()->user()->backup_email == $email->email ? 'selected' : '' }}>{{ $email->email }}</option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-500 mt-1">Email cadangan dipakai jika kamu kesulitan mengakses akun utama.</p>
                            <button type="submit" class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm">Simpan Backup</button>
                        </form>
                    </div>
                </section>

                <!-- Kata Sandi & Autentikasi -->
                <section id="section-password" class="section hidden">
                    <h1 class="text-2xl font-semibold mb-8">Kata Sandi & Autentikasi</h1>
                    <p class="text-gray-600 mb-6">Ganti kata sandi atau aktifkan autentikasi dua faktor (2FA) untuk meningkatkan keamanan akunmu.</p>
                    <div class="mb-12">
                        <h2 class="text-lg font-semibold mb-4">Ganti Kata Sandi</h2>
                        <form action="{{ route('settings.password.update') }}" method="POST" class="space-y-4 max-w-xl">
                            @csrf
                            @method('PATCH')
                            <div>
                                <label class="block text-sm font-medium mb-1">Kata Sandi Saat Ini</label>
                                <input type="password" name="current_password" placeholder="••••••••" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Kata Sandi Baru</label>
                                <input type="password" name="password" placeholder="••••••••" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>
                            <button type="submit" class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm">Simpan Perubahan</button>
                        </form>
                    </div>
                    <div class="mb-12">
                        <h2 class="text-lg font-semibold mb-4">Autentikasi Dua Faktor (2FA)</h2>
                        <p class="text-sm text-gray-600 mb-3">Dengan 2FA, kamu perlu memasukkan kode verifikasi saat login, sebagai lapisan keamanan tambahan.</p>
                        <div class="flex items-center justify-between max-w-xl bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                            <div>
                                <p class="font-medium text-sm">Status: <span class="{{ auth()->user()->two_factor_enabled ? 'text-green-600' : 'text-red-600' }}">{{ auth()->user()->two_factor_enabled ? 'Aktif' : 'Nonaktif' }}</span></p>
                                <p class="text-xs text-gray-500">{{ auth()->user()->two_factor_enabled ? 'Autentikasi dua faktor telah diaktifkan di akun ini.' : 'Aktifkan 2FA untuk keamanan tambahan.' }}</p>
                            </div>
                            <form action="{{ route('settings.two_factor.toggle') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-sm text-blue-600 hover:underline">{{ auth()->user()->two_factor_enabled ? 'Nonaktifkan' : 'Aktifkan' }}</button>
                            </form>
                        </div>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold mb-4">Keluar dari Semua Perangkat</h2>
                        <p class="text-sm text-gray-600 mb-3">Jika kamu merasa akunmu digunakan orang lain, kamu bisa keluar dari semua sesi login di perangkat lain.</p>
                        <form action="{{ route('settings.logout_all') }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 text-sm rounded-md transition shadow-sm">Keluar dari Semua Perangkat</button>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </div>

    @push('styles')
    <style>
        .fade-enter { opacity: 0; transform: scale(0.98); }
        .fade-enter-active { transition: all 0.3s ease; opacity: 1; transform: scale(1); }
    </style>
    @endpush

    @push('scripts')
    <script>
        const links = document.querySelectorAll(".side-link");
        const sections = document.querySelectorAll(".section");

        links.forEach(link => {
            link.addEventListener("click", e => {
                e.preventDefault();
                links.forEach(l => l.classList.remove("text-black", "font-semibold", "bg-gray-200", "rounded-md", "px-2", "py-1"));
                sections.forEach(sec => { sec.classList.add("hidden"); sec.classList.remove("fade-enter", "fade-enter-active"); });
                link.classList.add("text-black", "font-semibold", "bg-gray-200", "rounded-md", "px-2", "py-1");
                const targetId = link.dataset.target;
                const section = document.getElementById(targetId);
                section.classList.remove("hidden");
                section.classList.add("fade-enter");
                setTimeout(() => section.classList.add("fade-enter-active"), 10);
            });
        });

        function bukaModalHapus() {
            document.getElementById("modalHapus").classList.remove("hidden");
        }

        function tutupModalHapus() {
            document.getElementById("modalHapus").classList.add("hidden");
        }
    </script>
    @endpush
</x-layout>