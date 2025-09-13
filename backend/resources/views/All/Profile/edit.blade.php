
<x-admin-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TARA - Edit Profil</title>
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <style>
            body {
                font-family: 'Space Grotesk', sans-serif;
                margin: 0;
                padding: 0;
                height: 100vh;
                overflow: auto;
            }
            .gradient-bg {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to bottom right, #eff6ff, #ede9fe);
                z-index: -10;
                opacity: 0.3;
            }
            #particles-js {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -5;
                pointer-events: none;
            }
            main {
                margin-top: 10px;
                padding: 5px;
                width: 100%;
                min-height: 100vh;
            }
            .card {
                background: rgba(255, 255, 255, 0.9);
                border: 1px solid rgba(0, 0, 0, 0.1);
                box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(10px);
                padding: 15px;
                border-radius: 8px;
                width: 100%;
                margin: 0 auto;
            }
            h1 {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 15px;
            }
            .back-link {
                font-size: 14px;
                color: #6b7280;
                text-decoration: none;
                transition: color 0.3s;
            }
            .back-link:hover {
                color: #f59e0b;
            }
            .back-link i {
                margin-right: 8px;
            }
            .success-message {
                background-color: #f0fff4;
                color: #065f46;
                padding: 8px;
        border-radius: 4px;
                margin-bottom: 10px;
            }
            form {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
            .profile-img-container {
                position: relative;
                display: inline-block;
                cursor: pointer;
                margin-bottom: 8px;
            }
            .profile-img-container img {
                width: 128px;
                height: 128px;
                object-fit: cover;
                border-radius: 50%;
                border: 4px solid #fff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .profile-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.4);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: opacity 0.3s;
            }
            .profile-img-container:hover .profile-overlay {
                opacity: 1;
            }
            .profile-overlay i {
                color: #fff;
                font-size: 24px;
            }
            .edit-photo-btn {
                font-size: 14px;
                color: #000;
                text-decoration: none;
                transition: color 0.3s;
            }
            .edit-photo-btn:hover {
                color: #f59e0b;
            }
            input[type="file"] {
                display: none;
            }
            .error-message {
                color: #ef4444;
                font-size: 12px;
                margin-top: 3px;
            }
            label {
                display: block;
                font-size: 14px;
                font-weight: 600;
                color: #374151;
                margin-bottom: 3px;
            }
            input[type="text"],
            textarea {
                width: 100%;
                padding: 8px;
                border: 2px solid #d1d5db;
                border-radius: 6px;
                font-size: 14px;
                transition: border-color 0.3s, box-shadow 0.3s;
            }
            input[type="text"]:focus,
            textarea:focus {
                outline: none;
                border-color: #000;
                box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
            }
            textarea {
                resize: vertical;
            }
            .bio-hint {
                font-size: 12px;
                color: #6b7280;
                margin-top: 3px;
            }
            .button-group {
                display: flex;
                justify-content: flex-end;
                gap: 8px;
                margin-top: 10px;
            }
            .button-primary,
            .button-secondary {
                padding: 6px 12px;
                border-radius: 9999px;
                font-size: 14px;
                cursor: pointer;
                transition: background-color 0.3s, color 0.3s;
            }
            .button-primary {
                background-color: #000;
                color: #fff;
            }
            .button-primary:hover {
                background-color: #4b5563;
            }
            .button-secondary {
                border: 2px solid #000;
                color: #000;
                background-color: transparent;
            }
            .button-secondary:hover {
                background-color: #000;
                color: #fff;
            }
            @media (min-width: 768px) {
                .grid {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 10px;
                }
                .md-col-span-2 {
                    grid-column: span 2;
                }
            }
        </style>
    </head>
    <div class="gradient-bg"></div>
    <div id="particles-js"></div>

    <main>
        <section class="card">
            <div class="flex items-center justify-between mb-15px">
                <h1>Edit Profil</h1>
                <a href="{{ url()->previous() }}" class="back-link">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="flex flex-col items-center mb-4">
                    <div class="profile-img-container">
                        <img id="profilePreview" src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://i.pravatar.cc/300?u=' . $user->username }}" alt="Profile">
                        <div class="profile-overlay">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                    <input type="file" id="profilePicture" name="profilePicture" accept="image/*" class="hidden">
                    <button type="button" id="editPhotoBtn" class="edit-photo-btn">
                        Ubah foto profil
                    </button>
                    @error('profilePicture')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid">
                    <div>
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                        @error('username')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md-col-span-2">
                        <label for="bio">Bio</label>
                        <textarea id="bio" name="bio" rows="4" placeholder="Ceritakan sedikit tentang diri Anda">{{ old('bio', $user->bio) }}</textarea>
                        <p class="bio-hint">Tambahkan LinkedIn dan Twitter dengan format: "Bio | LinkedIn: URL | Twitter: URL" (opsional)</p>
                        @error('bio')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="button-group">
                    <a href="{{ url()->previous() }}" class="button-secondary">Batal</a>
                    <button type="submit" class="button-primary">Simpan Perubahan</button>
                </div>
            </form>
        </section>
    </main>

    <script>
        // Particles.js
        particlesJS("particles-js", {
            particles: {
                number: { value: 50, density: { enable: true, value_area: 800 } },
                color: { value: "#000000" },
                shape: { type: "circle" },
                opacity: { value: 0.3, random: true },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 80, color: "#000000", opacity: 0.2, width: 1 },
                move: { enable: true, speed: 1, out_mode: "out" },
            },
            interactivity: { events: { onhover: { enable: false }, onclick: { enable: false } } },
            retina_detect: true,
        });

        // Profile Picture Handling
        const editPhotoBtn = document.getElementById('editPhotoBtn');
        const profilePictureInput = document.getElementById('profilePicture');
        const profilePreview = document.getElementById('profilePreview');
        const profileImgContainer = document.querySelector('.profile-img-container');

        editPhotoBtn.addEventListener('click', () => profilePictureInput.click());
        profileImgContainer.addEventListener('click', () => profilePictureInput.click());
        profilePictureInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => profilePreview.src = e.target.result;
                reader.readAsDataURL(file);
            }
        });

        // Notification toggle (placeholder)
        function toggleNotifications() {
            fetch('{{ route('admin.profile.toggleNotifications') }}', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            })
                .then(response => response.json())
                .then(data => console.log(data))
                .catch(error => console.error('Error:', error));
        }
    </script>
</x-admin-layout>