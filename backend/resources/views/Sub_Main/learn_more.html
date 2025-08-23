<x-layout>
    <div id="particles-js"></div>

    <!-- Hero Section -->
    <section class="relative pt-24 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-7xl font-bold text-black mb-6" style="font-family: 'Space Grotesk', sans-serif;">
                Jelajahi TARA
            </h1>
            <p class="text-gray-600 text-lg md:text-xl mb-10 max-w-3xl mx-auto">
                Temukan kekuatan komunitas kreatif, pelajari fitur unggulan, dan mulailah perjalanan Tuan untuk berkarya bersama TARA.
            </p>
            <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-black text-white rounded-full font-semibold hover:bg-gray-800 transition">
                Bergabung Sekarang
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-semibold text-black mb-8 text-center" style="font-family: 'Space Grotesk', sans-serif;">
                Fitur Unggulan TARA
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($features as $feature)
                    <div class="feature-card bg-white rounded-lg shadow-md p-6 hover-3d">
                        <div class="inner">
                            <img src="{{ $feature['image'] }}" alt="{{ $feature['title'] }}" class="w-full h-40 object-cover rounded-md mb-4" />
                            <h3 class="text-xl font-semibold text-black mb-2">{{ $feature['title'] }}</h3>
                            <p class="text-gray-600 text-sm">{{ $feature['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-semibold text-black mb-8 text-center" style="font-family: 'Space Grotesk', sans-serif;">
                Cara Kerja TARA
            </h2>
            <div class="space-y-8">
                @foreach ($steps as $step)
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="w-full md:w-1/2">
                            <img src="{{ $step['image'] }}" alt="{{ $step['title'] }}" class="w-full h-64 object-cover rounded-lg" />
                        </div>
                        <div class="w-full md:w-1/2">
                            <h3 class="text-2xl font-semibold text-black mb-2">{{ $step['title'] }}</h3>
                            <p class="text-gray-600 text-sm">{{ $step['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-12 bg-gray-900 text-white text-center">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-4" style="font-family: 'Space Grotesk', sans-serif;">
                Siap Bergabung dengan Komunitas Kreatif?
            </h2>
            <p class="text-gray-300 text-lg mb-6 max-w-2xl mx-auto">
                Mulailah berkarya, terhubung dengan kreator lain, dan wujudkan ide-ide Tuan bersama TARA.
            </p>
            <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-yellow-400 text-black rounded-full font-semibold hover:bg-yellow-500 transition">
                Daftar Sekarang
            </a>
        </div>
    </section>

    @push('styles')
    <style>
        body {
            font-family: "Space Grotesk", sans-serif;
            background: #ffffff;
            color: #111827;
            box-sizing: border-box;
        }
        *, *::before, *::after {
            box-sizing: inherit;
        }
        .perspective { perspective: 1200px; }
        .hover-3d { transform-style: preserve-3d; transition: transform 0.3s ease; cursor: pointer; }
        .hover-3d .inner { transform: rotateY(0deg) rotateX(0deg); transition: transform 0.3s ease; }
        .hover-3d:hover .inner { transform: rotateY(8deg) rotateX(4deg); }
        #particles-js { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
        .feature-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .feature-card:hover { transform: translateY(-6px); box-shadow: 0 16px 20px -5px rgba(0, 0, 0, 0.08), 0 6px 8px -4px rgba(0, 0, 0, 0.05); }
    </style>
    @endpush

    @push('scripts')
    <script>
        // Animasi GSAP untuk Hero Section
        gsap.from(".hero-section h1, .hero-section p, .hero-section a", {
            opacity: 0,
            y: 20,
            duration: 1,
            stagger: 0.2,
            ease: "power3.out",
            delay: 0.2
        });

        // Animasi GSAP untuk Feature Cards
        gsap.from(".feature-card", {
            opacity: 0,
            y: 40,
            duration: 0.8,
            stagger: 0.1,
            ease: "power3.out",
            scrollTrigger: { trigger: ".feature-card", start: "top 80%" }
        });

        // Animasi GSAP untuk How It Works Section
        gsap.utils.toArray(".how-it-works .flex").forEach((item, i) => {
            gsap.from(item, {
                opacity: 0,
                y: 60,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: { trigger: item, start: "top 80%" },
                delay: i * 0.1
            });
        });

        // Animasi GSAP untuk Call to Action
        gsap.from(".cta-section h2, .cta-section p, .cta-section a", {
            opacity: 0,
            y: 20,
            duration: 1,
            stagger: 0.2,
            ease: "power3.out",
            scrollTrigger: { trigger: ".cta-section", start: "top 80%" }
        });

        // Inisialisasi Particles.js
        particlesJS("particles-js", {
            particles: {
                number: { value: 40, density: { enable: true, value_area: 1000 } },
                color: { value: "#4b5563" },
                shape: { type: "circle" },
                opacity: { value: 0.3, random: false },
                size: { value: 2, random: false },
                line_linked: { enable: false },
                move: { enable: true, speed: 0.4, direction: "top", random: false, straight: false, out_mode: "out" }
            },
            interactivity: { events: { onhover: { enable: true, mode: "repulse" }, onclick: { enable: false } }, modes: { repulse: { distance: 100, duration: 0.4 } } },
            retina_detect: true
        });
    </script>
    @endpush
</x-layout>