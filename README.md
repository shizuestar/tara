# TARA - Portal Showcase Anak Muda

**TARA** adalah singkatan dari *"Talenta Remaja Nusantara"* —  
sebuah prototipe web galeri yang dirancang sebagai ruang presentasi karya dan jembatan kolaborasi antar pengguna.

Meski masih menggunakan gambar dan data contoh,
TARA. telah menyimulasikan fitur utama seperti eksplorasi karya, komunitas, proyek kolaboratif, dan pengelolaan akun.

---

## Tujuan

- Menyajikan karya anak muda Indonesia  
- Memfasilitasi komunitas kreatif dan proyek kolaboratif  
- Menjadi galeri digital yang dinamis dan interaktif  

---

## Teknologi yang Digunakan

- HTML5 – Struktur dasar laman  
- CSS3 & Tailwind CSS – Desain responsif dan elegan  
- JavaScript (Vanilla) – Interaktivitas dan animasi  
- Lottie – Animasi ringan via CDN  
- Font Awesome v6 – Ikon vektor  
- Google Fonts (Space Grotesk) – Tipografi modern
- Intersection Observer API – Deteksi scroll dan animasi  
- GSAP – Efek transisi lembut  
- Three.js – Elemen 3D visual interaktif  
- AOS.js (Animate on Scroll) – Animasi elemen saat muncul  
- Anime.js – Efek animasi mikro yang dinamis dan artistik  

---

## Struktur Direktori

designWebBytefest/  
├── .gitattributes  
├── .hintrc  
├── README.md  
├── tailwind.config.js  
├── about.html  
├── agenda.html  
├── blog.html  
├── detail_blog.html  
├── detail_event.html  
├── detail_event1.html  
├── detail_galeri.html  
├── detail_komunitas.html  
├── detail_proyek.html  
├── forum.html  
├── galeri.html  
├── index.html  
├── komunitas.html  
├── learn_more.html  
├── login.html  
├── notifikasi.html  
├── profil_user_lain.html  
├── proyek.html  
├── register.html  
├── settings.html  
├── thread.html  
├── .vscode/  
├── assets/  
│   ├── fonts/  
│   └── img/  
│       ├── coding.png  
│       ├── coding2.png  
│       ├── creativedesign.png  
│       ├── design.png  
│       ├── digitalart.png  
│       ├── ilustration.png  
│       ├── photography.png  
│       ├── photography2.png  
│       ├── photography3.png  
│       ├── uiux.png  
│       ├── uiux2.png  
│       └── videography.png  
└── sudah_login/  
    ├── assets/  
    ├── agenda.html  
    ├── blog.html  
    ├── bookmark.html  
    ├── galeri.html  
    ├── index.html  
    ├── komunitas.html  
    ├── profil_user.html  
    └── proyek.html  

---

## Fitur Utama

### Registrasi dan Autentikasi  
- Masuk melalui Google atau GitHub  
- Aktivasi melalui email  
- Pemulihan kata sandi  

### Karya dan Portofolio  
- Unggah berbagai jenis karya  
- Komentar, bookmark, bagikan, dan statistik karya  

### Komunitas  
- Grup minat dan diskusi forum  
- Thread, voting, dan sistem notifikasi  

### Kolaborasi Proyek  
- Buat proyek sosial atau kreatif  
- Cari rekan tim dan lacak progres proyek  

### Agenda dan Event  
- Kalender interaktif  
- Webinar, kontes, dan acara komunitas  

### Blog dan Artikel  
- Artikel inspiratif dan tutorial  
- Kategori dan sistem pencarian  

---

## Struktur Halaman

- **Beranda:** Header, karya unggulan, kategori, ajakan bergabung  
- **Eksplor:** Filter, galeri dinamis, pagination  
- **Detail Karya:** Gambar/video, deskripsi, komentar, karya sejenis  
- **Komunitas:** Daftar grup dan aktivitas  
- **Forum:** Thread, balasan, dll
- **Proyek:** Daftar, detail proyek, rekrutmen  
- **Dashboard:** Profil pengguna dan pengaturan akun  
- **Agenda:** Kalender kegiatan  
- **Blog:** Artikel dan filterisasi  
- **Profil Pengguna Lain:** Portofolio publik  
- **Settings:** Preferensi dan keamanan  

---

## Cara Menjalankan

### Opsi 1 – Unduhan ZIP  
1. Unduh repositori dalam bentuk `.zip`  
2. Ekstrak ke direktori lokal pilihan  
3. Masuk ke folder `designWebBytefest/`  
4. Jalankan `index.html` langsung di browser  
5. *(Opsional)* Gunakan *Live Server* di Visual Studio Code:  
   - Buka folder melalui VS Code  
   - Klik kanan `index.html` → *Open with Live Server*  

### Opsi 2 – Clone via Git  
1. Buka terminal atau Git Bash  
2. Jalankan:  
   ```bash
   git clone https://github.com/pandjoel-web/designWebBytefest
3. cd designWebBytefest
3. Buka `index.html` melalui browser
4. *(Opsional)* Jalankan dengan Live Server seperti langkah di atas

---


## Dokumentasi Situs

TARA terdiri dari berbagai halaman statis yang saling terhubung membentuk alur pengguna yang intuitif.
Berikut ringkasan alurnya:

1. **Pengguna masuk ke beranda** dan dapat langsung melihat karya unggulan.
2. **Navigasi ke eksplor**, pengguna dapat menelusuri berdasarkan kategori.
3. Jika pengguna ingin bergabung komunitas atau proyek, ia diarahkan untuk **login atau daftar**.
4. Setelah login, tampilan situs akan berubah — halaman dalam `sudah_login/` terbuka.
5. Pengguna dapat **mengakses profil**, **unggah karya**, **berinteraksi di forum**, atau **bergabung proyek**.
6. Agenda dan blog tersedia sebagai sumber informasi dan inspirasi.

---

## Kontribusi

1. Fork repositori ini
2. Buat branch baru dengan nama deskriptif:

   ```bash
   git checkout -b branch-baru
   ```
3. Lakukan perubahan dan commit:

   ```bash
   git commit -m "Menambahkan fitur baru"
   ```
4. Push ke GitHub:

   ```bash
   git push origin branch-baru
   ```
5. Ajukan Pull Request

---

## Lisensi

Hak cipta milik para kontributor TARA.
Situs ini bersifat terbuka untuk pembelajaran dan kolaborasi non-komersial.

---
