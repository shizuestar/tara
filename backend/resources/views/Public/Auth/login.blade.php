<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login – TARA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ["Space Grotesk", "sans-serif"],
            },
            colors: {
              taraYellow: "#f6e05e", // Warna dot TARA
            },
            boxShadow: {
              '3xl': '0 50px 100px -20px rgba(0, 0, 0, 0.3)',
              '4xl': '0 80px 150px -30px rgba(0, 0, 0, 0.4)',
            }
          },
        },
      };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Space Grotesk", sans-serif;
        background: #f8fafc; /* Tailwind: bg-gray-50 */
      }

      .main-container {
        position: relative;
        min-height: 100vh;
        display: grid;
        grid-template-areas: "stack";
        overflow: hidden;
      }

      .main-container > * {
        grid-area: stack;
        width: 100%;
        height: 100%;
      }

      /* GALLERY LAYER - Latar belakang putih/terang */
      .gallery-layer {
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        background: linear-gradient(135deg, #f7fafc, #ffffff); 
        opacity: 0; 
        transition: opacity 1s ease-in-out;
      }

      /* FORM LAYER */
      .form-layer {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        z-index: 20; 
        background: none; 
        pointer-events: none; 
        opacity: 0; 
        transition: opacity 0.5s ease-in-out;
      }

      .form-layer.active {
        pointer-events: auto; 
      }
      
      /* GALLERY CARDS */
      .card-section {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: grid;
        grid-template-columns: repeat(6, 1fr); 
        gap: 20px;
        padding: 20px;
        z-index: 1; 
        overflow: hidden;
        align-content: start;
        opacity: 1;
      }

      @media (max-width: 1200px) {
        .card-section {
          grid-template-columns: repeat(4, 1fr);
        }
      }
      @media (max-width: 768px) {
        .card-section {
          grid-template-columns: repeat(3, 1fr); 
        }
      }
      @media (max-width: 500px) {
        .card-section {
          grid-template-columns: repeat(2, 1fr); 
        }
      }

      .card-column {
        display: flex;
        flex-direction: column;
        gap: 20px;
        height: 200vh;
      }

      .card {
        border-radius: 1.5rem;
        position: relative; /* Penting untuk overlay dan gambar */
        overflow: hidden;
        flex-shrink: 0;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform, box-shadow;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); 
        background-color: #f0f4f8; /* Latar belakang kartu saat tidak ada gambar */
      }

      /* Wrapper untuk gambar di dalam kartu */
      .card-image-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden; /* Pastikan gambar tidak keluar dari bounds */
      }

      .card-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Pastikan gambar mengisi seluruh wrapper */
        display: block;
        transition: filter 0.5s ease, transform 0.5s ease;
        /* ===== NEW: Filter untuk monochrome dan gelap ===== */
        filter: grayscale(100%) brightness(50%) contrast(120%); 
      }

      .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.2); /* Overlay hitam transparan lebih tipis */
        transition: background 0.3s ease;
        z-index: 2; /* Di atas gambar */
      }

      /* Hover effects */
      .card:hover .card-overlay {
        background: rgba(0, 0, 0, 0); /* Overlay hilang saat hover */
      }
      .card:hover .card-image-wrapper img {
        filter: grayscale(0%) brightness(100%) contrast(100%); /* Warna dan terang kembali saat hover */
        transform: scale(1.05); /* Sedikit zoom pada gambar */
      }

      .card:hover {
        transform: scale(1.03) translateY(-8px) rotateZ(0.5deg); 
        box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15); 
      }

      /* Card Sizes */
      .card-small { height: 150px; }
      .card-medium { height: 200px; }
      .card-large { height: 250px; }
      .card-xl { height: 300px; }

      /* TARA LAYER */
      .tara-layer {
        position: absolute;
        z-index: 30;
        top: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f7fafc, #ffffff); 
        transition: opacity 1s ease-out;
      }

      .tara-text {
        display: flex;
        gap: 0.6rem;
        font-size: 7rem;
        font-weight: 700;
        letter-spacing: 0.25rem;
        color: #1a202c; 
        filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.2));
      }

      .tara-letter {
        transform-style: preserve-3d;
        transition: transform 0.4s ease, filter 0.4s ease;
      }

      .tara-dot {
        font-size: 0.9em;
        color: #f6e05e; 
        animation: pulse 2s infinite alternate;
      }

      @keyframes pulse {
        0% { transform: scale(1); opacity: 0.7; }
        100% { transform: scale(1.2); opacity: 1; }
      }
      
      /* FORM STYLING KUSTOM (Separator) */
      .separator {
        position: relative;
        text-align: center;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
      }
      .separator::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        border-top: 1px solid #e2e8f0; 
        z-index: 1;
      }
      .separator-text {
        background: #ffffff; 
        padding: 0 15px;
        position: relative;
        z-index: 2;
      }
    </style>
  </head>
  <body class="bg-gray-50">
    <main class="main-container">
      <div
        class="tara-layer bg-gradient-to-br from-gray-50 to-white"
        id="tara-layer"
      >
        <div class="tara-text relative top-[20px]" id="tara-text">
          <span class="tara-letter">T</span>
          <span class="tara-letter">A</span>
          <span class="tara-letter">R</span>
          <span class="tara-letter">A</span>
          <span class="tara-dot">.</span>
        </div>
        <p class="description max-w-xs text-center text-gray-700 font-light text-lg mt-4 opacity-90">
          Temukan karya kreatif terbaik dan bangun portofoliomu bersama
          komunitas digital Indonesia.
        </p>
      </div>

      <div
        class="gallery-layer bg-gradient-to-br from-gray-50 to-white" 
        id="gallery-layer"
      >
        <div class="card-section" id="card-section"></div>
      </div>

      <div class="form-layer" id="form-layer">
        <div
          class="w-full max-w-md bg-white/95 backdrop-blur-xl rounded-3xl p-10 shadow-3xl hover:shadow-4xl transition duration-500 ease-in-out"
          id="form-container"
        >
          <div class="text-center mb-10 form-item">
            <div
              class="text-center text-4xl font-bold tracking-tight text-gray-900"
            >
              Login ke <span class="text-gray-900">TARA</span
              ><span class="text-taraYellow">●</span>
            </div>
            <p class="text-sm text-gray-500 mt-2 font-light">
              Selamat datang kembali, kreator.
            </p>
          </div>

          @if ($errors->any())
            <div class="p-3 mb-4 text-sm text-red-700 bg-red-100 rounded-lg form-item" role="alert">
                <ul class="list-disc list-inside">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
            </div>
          @endif

          <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div class="form-item">
              <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Email"
                class="w-full px-5 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-taraYellow focus:border-taraYellow focus:outline-none text-sm bg-gray-50/70 transition duration-300"
                required
              />
            </div>
            <div class="form-item">
              <input
                type="password"
                name="password"
                placeholder="Password"
                class="w-full px-5 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-taraYellow focus:border-taraYellow focus:outline-none text-sm bg-gray-50/70 transition duration-300"
                required
              />
            </div>

            <div class="text-right text-xs form-item">
              <a
                href="#"
                class="text-gray-500 hover:text-gray-700 font-medium hover:underline transition duration-300"
                >Lupa Password?</a
              >
            </div>

            <div class="form-item">
              <button
                type="submit"
                class="w-full bg-gray-900 text-white py-3 rounded-xl hover:bg-gray-700 text-sm font-semibold tracking-wide transition duration-300 ease-in-out transform hover:scale-[1.005] hover:shadow-lg"
              >
                Masuk
              </button>
            </div>
          </form>

          <div class="separator form-item">
            <span class="separator-text bg-white/95 px-3 text-gray-400 text-xs tracking-widest font-medium uppercase">atau masuk dengan</span>
          </div>

          <div class="grid grid-cols-3 gap-3 text-sm form-item">
            <button
              class="flex items-center justify-center gap-2 border border-gray-200 rounded-xl py-3 hover:bg-gray-50 transition duration-300 transform hover:-translate-y-0.5"
            >
              <img
                src="https://www.svgrepo.com/show/475656/google-color.svg"
                class="w-5 h-5"
                alt="Google"
              />
              <span class="hidden sm:inline">Google</span>
            </button>
            <button
              class="flex items-center justify-center gap-2 border border-gray-200 rounded-xl py-3 hover:bg-gray-50 transition duration-300 transform hover:-translate-y-0.5"
            >
              <img
                src="https://www.svgrepo.com/show/512317/github-142.svg"
                class="w-5 h-5"
                alt="GitHub"
              />
              <span class="hidden sm:inline">GitHub</span>
            </button>
            <button
              class="flex items-center justify-center gap-2 border border-gray-200 rounded-xl py-3 hover:bg-gray-50 transition duration-300 transform hover:-translate-y-0.5"
            >
              <img
                src="https://www.svgrepo.com/show/452234/vk.svg"
                class="w-5 h-5"
                alt="VK"
              />
              <span class="hidden sm:inline">VK</span>
            </button>
          </div>

          <p class="text-center text-xs text-gray-500 mt-10 form-item">
            Belum punya akun?
            <a
              href="{{ route('register') }}"
              id="register-link"
              class="text-gray-700 font-semibold hover:text-gray-900 hover:underline transition duration-300"
              >Daftar Sekarang</a
            >
          </p>
        </div>
      </div>
    </main>

    <script>
      // --- Logika Galeri dan Scroll ---
      const cardSection = document.getElementById("card-section");
      const galleryLayer = document.getElementById("gallery-layer");
      
      let numberOfColumns = 6;
      if (window.innerWidth <= 1200) numberOfColumns = 4;
      if (window.innerWidth <= 768) numberOfColumns = 3;
      if (window.innerWidth <= 500) numberOfColumns = 2;

      const cardsPerColumn = 10;
      const cardSizes = ["card-small", "card-medium", "card-large", "card-xl"];
      let cardColumns = [];

      function getRandomPicsumImage(width, height) {
        const imageId = Math.floor(Math.random() * 1000) + 1;
        return `https://picsum.photos/${width + 100}/${height + 100}?random=${imageId}`;
      }

      function createCardColumns() {
        for (let col = 0; col < numberOfColumns; col++) {
          const column = document.createElement("div");
          column.className = "card-column";

          for (let card = 0; card < cardsPerColumn * 2; card++) {
            const cardElement = document.createElement("div");
            const sizeClass = cardSizes[Math.floor(Math.random() * cardSizes.length)];
            cardElement.className = `card ${sizeClass}`;

            let width = 300, height;
            switch (sizeClass) {
              case "card-small": height = 150; break;
              case "card-medium": height = 200; break;
              case "card-large": height = 250; break;
              case "card-xl": height = 300; break;
              default: height = 200;
            }
            
            // ===== NEW: Buat wrapper gambar dan elemen img =====
            const imageWrapper = document.createElement("div");
            imageWrapper.className = "card-image-wrapper";
            
            const imgElement = document.createElement("img");
            imgElement.src = getRandomPicsumImage(width, height);
            imgElement.alt = "Gallery Image";

            imageWrapper.appendChild(imgElement);
            cardElement.appendChild(imageWrapper);
            // =================================================

            // Tambahkan overlay (jika masih diperlukan untuk efek tambahan)
            const cardOverlay = document.createElement("div");
            cardOverlay.className = "card-overlay";
            cardElement.appendChild(cardOverlay);
            

            column.appendChild(cardElement);
          }

          cardSection.appendChild(column);
          cardColumns.push(column);
        }
      }

      function startInfiniteScroll() {
        cardColumns.forEach((column, index) => {
          const cards = column.querySelectorAll(".card");
          let totalHeight = 0;
          
          for (let i = 0; i < cardsPerColumn; i++) {
            totalHeight += cards[i].offsetHeight + 20; // 20px adalah gap
          }

          let duration = 0;
          if (index % 3 === 0) duration = 30000;
          else if (index % 3 === 1) duration = 40000;
          else duration = 35000;
          
          const direction = index % 2 === 0 ? -totalHeight : totalHeight;
          const initialTranslation = index % 2 === 0 ? 0 : -totalHeight;
          const targetTranslation = index % 2 === 0 ? -totalHeight : 0;
          
          column.style.transform = `translateY(${initialTranslation}px)`;

          anime({
            targets: column,
            translateY: [initialTranslation, targetTranslation],
            duration: duration,
            easing: "linear",
            direction: index % 2 === 0 ? 'normal' : 'reverse',
            loop: true,
            autoplay: true,
          });
        });
      }

      // --- Logika Animasi Urutan Tampilan ---
      const taraLayer = document.getElementById("tara-layer");
      const formLayer = document.getElementById("form-layer");
      const taraLetters = document.querySelectorAll("#tara-text .tara-letter, #tara-text .tara-dot");
      const formContainer = document.getElementById("form-container");
      const formItems = document.querySelectorAll(".form-item");

      // 1. Inisialisasi Galeri
      createCardColumns();

      // 2. Animasi Masuk TARA
      anime({
        targets: taraLetters,
        translateY: [50, 0],
        translateZ: [0, 100],
        opacity: [0, 1],
        duration: 1600,
        easing: "easeOutCubic",
        delay: anime.stagger(150, { start: 300 }),
        complete: function () {
          setTimeout(() => {
            anime({
              targets: taraLayer,
              opacity: [1, 0],
              scale: [1, 0.95],
              translateY: [0, -20],
              duration: 1000,
              easing: "easeInQuad",
              complete: function () {
                taraLayer.style.display = "none";

                galleryLayer.style.opacity = 1;
                startInfiniteScroll();

                formLayer.style.opacity = 1; 
                formLayer.classList.add('active'); 
                
                anime({
                    targets: formItems,
                    opacity: [0, 1],
                    translateY: [30, 0],
                    scale: [0.95, 1],
                    duration: 1200,
                    easing: "easeOutQuart",
                    delay: anime.stagger(150, { start: 300 }),
                });
                
                anime({
                    targets: formContainer,
                    scale: [0.9, 1],
                    duration: 800,
                    easing: "easeOutQuad",
                    boxShadow: [
                      '0 40px 100px -20px rgba(0, 0, 0, 0.1)',
                      '0 50px 100px -20px rgba(0, 0, 0, 0.3)'
                    ],
                });

              },
            });
          }, 2000); 
        },
      });

      // Efek hover untuk huruf TARA
      taraLetters.forEach((letter) => {
        letter.style.pointerEvents = "auto";
        letter.addEventListener("mouseenter", () => {
          anime({
            targets: letter,
            translateZ: 150,
            scale: 1.1,
            filter: "drop-shadow(0 0 15px rgba(246, 224, 94, 0.6))",
            duration: 300,
            easing: "easeOutCubic",
          });
        });
        letter.addEventListener("mouseleave", () => {
          anime({
            targets: letter,
            translateZ: 100,
            scale: 1,
            filter: "drop-shadow(0 4px 12px rgba(0, 0, 0, 0.2))",
            duration: 300,
            easing: "easeOutCubic",
          });
        });
      });

      // Animasi saat klik Daftar/Register
      const registerLink = document.getElementById("register-link");
      registerLink.addEventListener("click", (e) => {
        e.preventDefault();

        anime({
          targets: formContainer,
          opacity: 0,
          translateY: -30,
          scale: 0.95,
          duration: 400,
          easing: "easeInQuad"
        });

        anime({
          targets: galleryLayer,
          scale: 1.2,
          opacity: 0,
          duration: 800,
          easing: "easeInQuad",
          complete: () => {
            window.location.href = registerLink.href;
          },
        });
      });
    </script>
  </body>
</html>