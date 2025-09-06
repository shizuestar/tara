<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register – TARA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.146.0/build/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
    <style>
        body {
            font-family: "Space Grotesk", sans-serif;
            background: #f8fafc;
            overflow: hidden;
        }

        .main-container {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: row;
        }

        .left-section {
            width: 520px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            padding: 0 16px;
        }

        .right-section {
            position: relative;
            overflow: hidden;
            height: 100vh;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.7), rgba(240, 240, 240, 0.7));
            flex: 1;
            backdrop-filter: blur(40px);
            -webkit-backdrop-filter: blur(40px);
        }

        #three-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .form-container {
            background: linear-gradient(145deg, #ffffff, #f7fafc);
            border-radius: 2rem;
            position: relative;
            right: 10px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
        }

        .form-input {
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #1a202c;
            box-shadow: 0 0 0 3px rgba(26, 32, 44, 0.1);
        }

        .form-button {
            transition: all 0.3s ease;
        }

        .form-button:hover {
            background: #1a202c;
            transform: translateY(-2px);
        }

        .social-button {
            transition: all 0.3s ease;
        }

        .social-button:hover {
            background: #f7fafc;
            transform: translateY(-2px);
        }

        .gallery-section {
            position: relative;
            width: 100%;
            height: 100vh;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            padding: 40px;
            z-index: 1;
            justify-content: center;
            align-content: center;
            overflow-y: auto;
        }

        .gallery-card {
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
            transform: scale(0.9) translateY(20px);
            padding: 15px;
            text-align: center;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .gallery-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(0, 0, 0, 0.1));
            border-radius: 1rem;
            z-index: -1;
            transition: all 0.3s ease;
        }

        .gallery-card:hover {
            transform: scale(1.05) translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .gallery-card:hover::before {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.3), rgba(0, 0, 0, 0.15));
        }

        .gallery-image {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 0.5rem;
            filter: grayscale(100%);
            transition: all 0.3s ease;
        }

        .gallery-card:hover .gallery-image {
            filter: grayscale(50%);
            transform: scale(1.02);
        }

        .gallery-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1a202c;
            margin: 10px 0 5px;
        }

        .gallery-desc {
            font-size: 0.9rem;
            color: #2d3748;
            font-weight: 300;
        }

        .welcome-container {
            position: absolute;
            z-index: 10;
            top: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }

        .welcome-text {
            display: flex;
            gap: 0.6rem;
            font-size: 5rem;
            font-weight: 700;
            letter-spacing: 0.25rem;
            color: #1a202c;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.2));
        }

        .welcome-letter {
            transform-style: preserve-3d;
            transition: transform 0.4s ease, filter 0.4s ease;
        }

        .welcome-dot {
            font-size: 0.9em;
            color: #000000;
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 0.7;
            }

            100% {
                transform: scale(1.2);
                opacity: 1;
            }
        }

        .description {
            max-width: 28rem;
            text-align: center;
            color: #2d3748;
            font-weight: 300;
            font-size: 1.1rem;
            margin-top: 1.5rem;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }

            .left-section {
                width: 100%;
            }

            .gallery-section {
                padding: 20px;
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            }

            .gallery-card {
                width: 100%;
            }

            .welcome-text {
                font-size: 3rem;
            }
        }

    </style>
</head>

<body>
    <main class="main-container">
        <div class="left-section">
            <div class="w-full max-w-lg p-7 py-14 pb-9 form-container">
                <div class="text-center mb-8">
                    <div class="text-center text-4xl font-semibold tracking-wide text-black"
                        style="font-family: 'Space Grotesk', sans-serif">
                        Daftar ke <span class="text-black">TARA</span><span class="text-yellow-400">●</span>
                    </div>
                </div>
                <form action="<?php echo e(route('register')); ?>" method="POST" class="space-y-5">
                    <input type="text" placeholder="Nama Lengkap"
                        class="form-input w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-1 focus:ring-gray-500 focus:outline-none text-sm bg-gray-50" />
                    <input type="email" placeholder="Email"
                        class="form-input w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-1 focus:ring-gray-500 focus:outline-none text-sm bg-gray-50" />
                    <input type="password" placeholder="Password"
                        class="form-input w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-1 focus:ring-gray-500 focus:outline-none text-sm bg-gray-50" />
                    <input type="password" placeholder="Konfirmasi Password"
                        class="form-input w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-1 focus:ring-gray-500 focus:outline-none text-sm bg-gray-50" />
                    <button type="submit"
                        class="form-button w-full bg-black text-white py-3 rounded-xl hover:bg-gray-800 text-sm font-medium">
                        Daftar
                    </button>
                </form>
                <div class="my-6 border-t border-gray-100 text-center text-xs text-gray-400 relative">
                    <span class="bg-white px-3 absolute -top-3 left-1/2 transform -translate-x-1/2">atau daftar
                        dengan</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                    <button
                        class="social-button flex items-center justify-center gap-2 border border-gray-200 rounded-xl py-3 hover:bg-gray-50 transition">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google" />
                        Google
                    </button>
                    <button
                        class="social-button flex items-center justify-center gap-2 border border-gray-200 rounded-xl py-3 hover:bg-gray-50 transition">
                        <img src="https://www.svgrepo.com/show/512317/github-142.svg" class="w-5 h-5" alt="GitHub" />
                        GitHub
                    </button>
                    <button
                        class="social-button flex items-center justify-center gap-2 border border-gray-200 rounded-xl py-3 hover:bg-gray-50 transition">
                        <img src="https://www.svgrepo.com/show/452234/vk.svg" class="w-5 h-5" alt="VK" />
                        VK
                    </button>
                </div>
                <p class="text-center text-xs text-gray-500 mt-8">
                    Sudah punya akun?
                    <a href="<?php echo e(route('login')); ?>" id="login-link"
                        class="text-gray-500 hover:text-gray-700 hover:underline transition">Masuk</a>
                </p>
            </div>
        </div>
        <div class="right-section">
            <canvas id="three-canvas"></canvas>
            <div class="gallery-section" id="gallery-section">
                <div class="gallery-card">
                    <img class="gallery-image" src="https://source.unsplash.com/random/300x200?art" alt="Artwork 1" />
                    <div class="gallery-title">Pamerkan Karyamu</div>
                    <div class="gallery-desc">Unggah karya seni dan portofolio untuk dilihat dunia.</div>
                </div>
                <div class="gallery-card">
                    <img class="gallery-image" src="https://source.unsplash.com/random/300x200?creative"
                        alt="Artwork 2" />
                    <div class="gallery-title">Dapatkan Inspirasi</div>
                    <div class="gallery-desc">Jelajahi karya kreatif dari seniman seluruh Indonesia.</div>
                </div>
                <div class="gallery-card">
                    <img class="gallery-image" src="https://source.unsplash.com/random/300x200?design"
                        alt="Artwork 3" />
                    <div class="gallery-title">Bangun Reputasi</div>
                    <div class="gallery-desc">Dapatkan pengakuan dari komunitas seni global.</div>
                </div>
                <div class="gallery-card">
                    <img class="gallery-image" src="https://source.unsplash.com/random/300x200?illustration"
                        alt="Artwork 4" />
                    <div class="gallery-title">Kolaborasi Keren</div>
                    <div class="gallery-desc">Terhubung dan berkarya bersama kreator lain.</div>
                </div>
            </div>
            <div class="welcome-container">
                <div class="welcome-text relative top-[20px]" id="welcome-text">
                    <span class="welcome-letter">B</span>
                    <span class="welcome-letter">E</span>
                    <span class="welcome-letter">R</span>
                    <span class="welcome-letter">G</span>
                    <span class="welcome-letter">A</span>
                    <span class="welcome-letter">B</span>
                    <span class="welcome-letter">U</span>
                    <span class="welcome-letter">N</span>
                    <span class="welcome-letter">G</span>
                </div>
                <p class="description">
                    Daftar sekarang dan mulailah perjalanan kreatifmu bersama kami.
                </p>
            </div>
        </div>
    </main>
    <script>
        // Three.js Particle System
        const canvas = document.getElementById("three-canvas");
        if (canvas) {
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(
                75,
                canvas.clientWidth / canvas.clientHeight,
                0.1,
                1000
            );
            const renderer = new THREE.WebGLRenderer({
                canvas,
                alpha: true
            });
            renderer.setSize(canvas.clientWidth, canvas.clientHeight);
            camera.position.z = 5;

            const particleCount = 800;
            const particles = new THREE.BufferGeometry();
            const positions = new Float32Array(particleCount * 3);
            const colors = new Float32Array(particleCount * 3);
            const velocities = new Float32Array(particleCount * 3);

            for (let i = 0; i < particleCount * 3; i += 3) {
                positions[i] = (Math.random() - 0.5) * 12;
                positions[i + 1] = (Math.random() - 0.5) * 12;
                positions[i + 2] = (Math.random() - 0.5) * 8;
                colors[i] = Math.random() * 0.2 + 0.8;
                colors[i + 1] = Math.random() * 0.2 + 0.8;
                colors[i + 2] = Math.random() * 0.2 + 0.8;
                velocities[i] = (Math.random() - 0.5) * 0.008;
                velocities[i + 1] = (Math.random() - 0.5) * 0.008;
                velocities[i + 2] = (Math.random() - 0.5) * 0.008;
            }

            particles.setAttribute(
                "position",
                new THREE.BufferAttribute(positions, 3)
            );
            particles.setAttribute("color", new THREE.BufferAttribute(colors, 3));

            const particleMaterial = new THREE.PointsMaterial({
                size: 0.035,
                vertexColors: true,
                transparent: true,
                opacity: 0.6,
            });

            const particleSystem = new THREE.Points(particles, particleMaterial);
            scene.add(particleSystem);

            function animate() {
                requestAnimationFrame(animate);
                particleSystem.rotation.y += 0.0003;
                for (let i = 0; i < particleCount * 3; i += 3) {
                    positions[i] += velocities[i];
                    positions[i + 1] += velocities[i + 1];
                    positions[i + 2] += velocities[i + 2];
                    if (Math.abs(positions[i]) > 6) velocities[i] *= -1;
                    if (Math.abs(positions[i + 1]) > 6) velocities[i + 1] *= -1;
                    if (Math.abs(positions[i + 2]) > 4) velocities[i + 2] *= -1;
                }
                particles.attributes.position.needsUpdate = true;
                renderer.render(scene, camera);
            }

            animate();

            window.addEventListener("resize", () => {
                camera.aspect = canvas.clientWidth / canvas.clientHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(canvas.clientWidth, canvas.clientHeight);
            });
        }

        // Gallery Card Animation
        const gallerySection = document.getElementById("gallery-section");
        const galleryCards = gallerySection.querySelectorAll(".gallery-card");

        function animateGalleryCards() {
            anime({
                targets: galleryCards,
                opacity: [0, 1],
                scale: [0.9, 1],
                translateY: [20, 0],
                duration: 800,
                delay: anime.stagger(150, {
                    start: 500
                }),
                easing: "easeOutCubic",
            });
        }

        // Welcome Text Animation
        const welcomeLetters = document.querySelectorAll(
            "#welcome-text .welcome-letter, #welcome-text .welcome-dot"
        );
        const welcomeContainer = document.querySelector(".welcome-container");

        anime({
            targets: welcomeLetters,
            translateY: [50, 0],
            translateZ: [0, 100],
            opacity: [0, 1],
            duration: 1600,
            easing: "easeOutCubic",
            delay: anime.stagger(150, {
                start: 300
            }),
            complete: function () {
                setTimeout(() => {
                    anime({
                        targets: welcomeContainer,
                        opacity: [1, 0],
                        translateY: [0, -40],
                        scale: [1, 0.9],
                        duration: 1000,
                        easing: "easeInCubic",
                        complete: function () {
                            welcomeContainer.style.display = "none";
                            animateGalleryCards();
                        },
                    });
                }, 1500);
            },
        });

        welcomeLetters.forEach((letter) => {
            letter.style.pointerEvents = "auto";
            letter.addEventListener("mouseenter", () => {
                anime({
                    targets: letter,
                    translateZ: 150,
                    scale: 1.1,
                    filter: "drop-shadow(0 0 15px rgba(0, 0, 0, 0.3))",
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

        // Transition to login page
        const loginLink = document.getElementById("login-link");
        loginLink.addEventListener("click", (e) => {
            e.preventDefault();
            const leftSection = document.querySelector(".left-section");
            const rightSection = document.querySelector(".right-section");

            anime({
                targets: [leftSection, rightSection],
                translateX: [
                    0,
                    (el) =>
                    el === leftSection ?
                    window.innerWidth - 520 :
                    -window.innerWidth + 520,
                ],
                duration: 600,
                easing: "easeInOutQuad",
                complete: () => {
                    window.location.href = "/login";
                },
            });
        });

    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\lomba\tara\backend\resources\views/public/auth/register.blade.php ENDPATH**/ ?>