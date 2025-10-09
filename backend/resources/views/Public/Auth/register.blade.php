<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register – TARA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ["Space Grotesk", "sans-serif"],
            },
            colors: {
              taraYellow: "#f6e05e",
              taraDark: "#1a202c", 
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
      .gallery-layer {
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        opacity: 0; 
        transition: opacity 1s ease-in-out;
      }
      .content-layer {
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
      .content-layer.active {
        pointer-events: auto; 
      }
      
      /* --- Gallery Cards & Columns --- */
      .card-section {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        display: grid; grid-template-columns: repeat(6, 1fr); gap: 20px; padding: 20px;
        z-index: 1; overflow: hidden; align-content: start; opacity: 1;
      }
      @media (max-width: 1200px) { .card-section { grid-template-columns: repeat(4, 1fr); } }
      @media (max-width: 768px) { .card-section { grid-template-columns: repeat(3, 1fr); } }
      @media (max-width: 500px) { .card-section { grid-template-columns: repeat(2, 1fr); } }

      .card-column {
        display: flex; flex-direction: column; gap: 20px; height: 200vh;
      }
      .card {
        border-radius: 1.5rem; position: relative; overflow: hidden; flex-shrink: 0;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); will-change: transform, box-shadow;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); background-color: #f0f4f8; 
      }
      .card-image-wrapper { position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; }
      .card-image-wrapper img {
        width: 100%; height: 100%; object-fit: cover; display: block;
        transition: filter 0.5s ease, transform 0.5s ease;
        filter: grayscale(100%) brightness(50%) contrast(120%) blur(2px); 
      }
      .card-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.3); transition: background 0.3s ease; z-index: 2;
      }

      .card:hover .card-overlay { background: rgba(0, 0, 0, 0); }
      .card:hover .card-image-wrapper img {
        filter: grayscale(0%) brightness(100%) contrast(100%) blur(0px);
        transform: scale(1.05);
      }
      .card:hover { transform: scale(1.03) translateY(-8px) rotateZ(0.5deg); box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15); }
      .card-small { height: 150px; } .card-medium { height: 200px; } .card-large { height: 250px; } .card-xl { height: 300px; }

      .tara-layer {
        position: absolute; z-index: 30; top: 0; width: 100%; height: 100%;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        transition: opacity 1s ease-out;
      }
      .tara-text {
        display: flex; gap: 0.6rem; font-size: 7rem; font-weight: 700; letter-spacing: 0.25rem;
        color: #1a202c; filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.2));
      }
      .tara-letter {
        transform-style: preserve-3d; transition: transform 0.4s ease, filter 0.4s ease;
      }
      .tara-dot {
        font-size: 0.9em; color: #f6e05e; animation: pulse 2s infinite alternate;
      }
      @keyframes pulse {
        0% { transform: scale(1); opacity: 0.7; }
        100% { transform: scale(1.2); opacity: 1; }
      }
      
      .form-item, .benefit-item-list {
        opacity: 0; transform: translateY(20px);
      }
      /* Styles for immediate appearance after error */
      .center-card.has-error {
          opacity: 1 !important;
          transform: none !important;
      }
      .form-item.has-error, .benefit-item-list.has-error {
          opacity: 1 !important;
          transform: none !important;
      }
    </style>
  </head>
  <body class="bg-gray-50 overflow-hidden">
    <main class="main-container">
        @php
            $hasErrors = $errors->any();
        @endphp

      <div
        class="tara-layer bg-gradient-to-br from-gray-50 to-white"
        id="tara-layer"
        style="{{ $hasErrors ? 'display: none;' : '' }}"
      >
        <div class="tara-text relative top-[20px]" id="tara-text">
          <span class="tara-letter">T</span>
          <span class="tara-letter">A</span>
          <span class="tara-letter">R</span>
          <span class="tara-letter">A</span>
          <span class="tara-dot">.</span>
        </div>
        <p class="max-w-xs text-center text-gray-700 font-light text-lg mt-4 opacity-90">
          Bergabunglah dengan TARA dan ubah ide kreatifmu menjadi pengakuan nyata.
        </p>
      </div>

      <div
        class="gallery-layer bg-gradient-to-br from-gray-50 to-white"
        id="gallery-layer"
        style="opacity: {{ $hasErrors ? '1' : '0' }};"
      >
        <div class="card-section" id="card-section"></div>
      </div>

      <div 
        class="content-layer {{ $hasErrors ? 'active' : '' }}" 
        id="content-layer"
        style="opacity: {{ $hasErrors ? '1' : '0' }};"
      >
        <div
          class="center-card max-w-[900px] w-[95%] bg-white/95 backdrop-blur-xl rounded-[2rem] shadow-3xl overflow-hidden flex min-h-[580px] transition duration-500 ease-in-out hover:shadow-4xl {{ $hasErrors ? 'has-error' : '' }}"
          id="center-card"
        >
          <div 
            class="form-column w-[45%] min-w-[350px] p-12 flex flex-col justify-center bg-white relative max-lg:w-full max-lg:p-8"
          >
            <div class="text-center mb-8 form-item {{ $hasErrors ? 'has-error' : '' }}">
              <div
                class="text-center text-3xl font-bold tracking-tight text-gray-900"
              >
                Daftar ke <span class="text-gray-900">TARA</span
                ><span class="text-taraYellow">●</span>
              </div>
              <p class="text-sm text-gray-500 mt-2 font-light">
                Buat akunmu dan pamerkan karyamu sekarang.
              </p>
            </div>
            
            @if ($errors->any())
              <div class="p-3 mb-4 text-sm text-red-700 bg-red-100 rounded-lg form-item has-error" role="alert">
                  <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
              </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-3">
              @csrf
              <div class="grid grid-cols-2 gap-3 form-item {{ $hasErrors ? 'has-error' : '' }}">
                  <input
                      type="text"
                      name="username"
                      value="{{ old('username') }}"
                      placeholder="Username"
                      class="w-full px-5 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-gray-900 focus:outline-none text-sm bg-gray-50/70 transition duration-300"
                      required
                  />
                  <input
                      type="text"
                      name="name"
                      value="{{ old('name') }}"
                      placeholder="Nama Lengkap"
                      class="w-full px-5 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-gray-900 focus:outline-none text-sm bg-gray-50/70 transition duration-300"
                      required
                  />
              </div>
              <div class="form-item {{ $hasErrors ? 'has-error' : '' }}">
                <input
                  type="email"
                  name="email"
                  value="{{ old('email') }}"
                  placeholder="Email"
                  class="w-full px-5 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-gray-900 focus:outline-none text-sm bg-gray-50/70 transition duration-300"
                  required
                />
              </div>
              <div class="form-item {{ $hasErrors ? 'has-error' : '' }}">
                <input
                  type="password"
                  name="password"
                  placeholder="Password"
                  class="w-full px-5 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-gray-900 focus:outline-none text-sm bg-gray-50/70 transition duration-300"
                  required
                />
              </div>
              <div class="form-item {{ $hasErrors ? 'has-error' : '' }}">
                <input
                  type="password"
                  name="password_confirmation"
                  placeholder="Konfirmasi Password"
                  class="w-full px-5 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-gray-900 focus:outline-none text-sm bg-gray-50/70 transition duration-300"
                  required
                />
              </div>

              <div class="form-item pt-2 {{ $hasErrors ? 'has-error' : '' }}">
                <button
                  type="submit"
                  class="w-full bg-taraDark text-white py-3 rounded-xl hover:bg-gray-700 text-sm font-semibold tracking-wide transition duration-300 ease-in-out transform hover:scale-[1.005] hover:shadow-lg"
                >
                  Daftar Sekarang
                </button>
              </div>
            </form>

            <div class="text-center text-xs text-gray-500 mt-6 form-item {{ $hasErrors ? 'has-error' : '' }}">
              <span class="text-gray-400">Dengan mendaftar, Anda setuju dengan</span>
              <a href="#" class="text-gray-500 font-semibold hover:text-gray-700 hover:underline transition">Syarat & Ketentuan</a>
            </div>

            <p class="text-center text-xs text-gray-500 mt-4 form-item {{ $hasErrors ? 'has-error' : '' }}">
              Sudah punya akun?
              <a
                href="{{ route('login') }}"
                id="login-link"
                class="text-gray-700 font-semibold hover:text-gray-900 hover:underline transition duration-300"
                >Masuk</a
              >
            </p>
          </div>

          <div 
            class="benefit-column flex-1 p-12 flex flex-col justify-center items-start bg-[#f9f9f9fd] max-lg:hidden"
          >
            <h2 class="text-3xl font-bold text-gray-800 mb-8 tracking-tight form-item {{ $hasErrors ? 'has-error' : '' }}">
              Mulai Aksi Kreatifmu
            </h2>
            
            <div class="space-y-6 w-full">
              <div class="benefit-item-list {{ $hasErrors ? 'has-error' : '' }}" data-delay="100">
                  <span class="benefit-icon text-taraDark text-xl leading-none mr-4 font-bold bg-white/80 px-2 py-1 rounded-lg shadow-sm">01</span>
                  <div>
                      <h3 class="text-lg font-bold text-gray-900 mb-1">Visibilitas Global</h3>
                      <p class="text-sm text-gray-600 font-light">Pamerkan karya ke jutaan mata, tingkatkan pengakuan profesional.</p>
                  </div>
              </div>
              
              <div class="benefit-item-list {{ $hasErrors ? 'has-error' : '' }}" data-delay="200">
                  <span class="benefit-icon text-taraDark text-xl leading-none mr-4 font-bold bg-white/80 px-2 py-1 rounded-lg shadow-sm">02</span>
                  <div>
                      <h3 class="text-lg font-bold text-gray-900 mb-1">Peluang Kolaborasi</h3>
                      <p class="text-sm text-gray-600 font-light">Terhubung dengan kreator lain dan dapatkan Project menarik.</p>
                  </div>
              </div>
              
              <div class="benefit-item-list {{ $hasErrors ? 'has-error' : '' }}" data-delay="300">
                  <span class="benefit-icon text-taraDark text-xl leading-none mr-4 font-bold bg-white/80 px-2 py-1 rounded-lg shadow-sm">03</span>
                  <div>
                      <h3 class="text-lg font-bold text-gray-900 mb-1">Portofolio Elegance</h3>
                      <p class="text-sm text-gray-600 font-light">Sajikan karyamu dalam tampilan yang profesional dan minimalis.</p>
                  </div>
              </div>
              
              <div class="benefit-item-list {{ $hasErrors ? 'has-error' : '' }}" data-delay="400">
                  <span class="benefit-icon text-taraDark text-xl leading-none mr-4 font-bold bg-white/80 px-2 py-1 rounded-lg shadow-sm">04</span>
                  <div>
                      <h3 class="text-lg font-bold text-gray-900 mb-1">Akses Tren Terkini</h3>
                      <p class="text-sm text-gray-600 font-light">Selalu terdepan dengan inspirasi dan *insight* dari komunitas.</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script>
      const cardSection = document.getElementById("card-section");
      const galleryLayer = document.getElementById("gallery-layer");
      const taraLayer = document.getElementById("tara-layer");
      const contentLayer = document.getElementById("content-layer");
      const centerCard = document.getElementById("center-card");
      const taraLetters = document.querySelectorAll("#tara-text .tara-letter, #tara-text .tara-dot");
      const formItems = document.querySelectorAll(".form-item");
      const benefitItems = document.querySelectorAll(".benefit-item-list");

      // Mendapatkan status error dari Blade
      const hasErrors = {{ $hasErrors ? 'true' : 'false' }};

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
            
            const imageWrapper = document.createElement("div");
            imageWrapper.className = "card-image-wrapper";
            
            const imgElement = document.createElement("img");
            imgElement.src = getRandomPicsumImage(width, height);
            imgElement.alt = "Gallery Image";

            imageWrapper.appendChild(imgElement);
            cardElement.appendChild(imageWrapper);
            
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
            totalHeight += cards[i].offsetHeight + 20;
          }

          let duration = 0;
          if (index % 3 === 0) duration = 30000;
          else if (index % 3 === 1) duration = 40000;
          else duration = 35000;
          
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

      createCardColumns();

      if (hasErrors) {
        // Jika ada error, langsung mulai scroll dan biarkan form terlihat.
        startInfiniteScroll();
      } else {
        // Alur animasi Login
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
                // Mengubah animasi logo agar fade out bersama layer
                opacity: [1, 0],
                scale: [1, 0.95],
                translateY: [0, -20], 
                duration: 1000,
                easing: "easeInQuad",
                complete: function () {
                  taraLayer.style.display = "none";
                  galleryLayer.style.opacity = 1;
                  startInfiniteScroll();

                  contentLayer.style.opacity = 1; 
                  contentLayer.classList.add('active'); 
                  
                  // Animasi masuk form: Scale up dan fade in card utama
                  anime({
                      targets: centerCard,
                      opacity: [0, 1],
                      scale: [0.9, 1], // Efek scale-up dari kecil
                      translateY: [20, 0],
                      duration: 1000,
                      easing: "easeOutQuart",
                      boxShadow: [ // Mengatur shadow agar muncul bersama scale
                        '0 40px 100px -20px rgba(0, 0, 0, 0.1)',
                        '0 50px 100px -20px rgba(0, 0, 0, 0.3)'
                      ],
                  });

                  // Animasi masuk item-item form/benefit
                  anime({
                      targets: [...formItems, ...benefitItems],
                      opacity: [0, 1],
                      translateY: [30, 0],
                      duration: 900,
                      easing: "easeOutQuart",
                      delay: anime.stagger(80, { start: 600 }),
                  });
                },
              });
            }, 1500); 
          },
        });
      }

      // Interaksi Hover pada huruf TARA tetap berfungsi
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

      // Animasi saat klik Masuk tetap berfungsi
      const loginLink = document.getElementById("login-link");
      loginLink.addEventListener("click", (e) => {
        e.preventDefault();
        
        anime({
          targets: centerCard,
          opacity: 0,
          scale: 0.95,
          translateY: 30,
          duration: 600,
          easing: "easeInQuad",
        });

        anime({
          targets: galleryLayer,
          scale: 1.2,
          opacity: 0,
          duration: 800,
          easing: "easeInQuad",
          complete: () => {
            window.location.href = loginLink.href;
          },
        });
      });
    </script>
  </body>
</html>