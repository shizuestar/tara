<x-layout>
    @push('styles')
        <style>
            body {
                font-family: "Space Grotesk", sans-serif;
                background: #ffffff;
                color: #111827;
                box-sizing: border-box;
                overflow-x: hidden;
            }

            *,
            *::before,
            *::after {
                box-sizing: inherit;
            }

            #particles-js {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                opacity: 0.4;
            }

            .event-card {
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 1rem;
                transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                    box-shadow 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                cursor: pointer;
            }

            .event-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            }

            .event-detail-container {
                opacity: 0;
                transform: translateY(20px);
                max-width: 1200px;
                margin: 0 auto;
            }

            .btn-primary {
                padding: 0.6rem 1.8rem;
                border-radius: 9999px;
                font-size: 1rem;
                font-weight: 500;
                background: #111827;
                color: #ffffff;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .btn-primary:hover {
                background: #374151;
            }

            .btn-primary:disabled {
                background: #6b7280;
                cursor: not-allowed;
            }

            .btn-preorder {
                padding: 0.8rem 2.2rem;
                border-radius: 9999px;
                font-size: 1.1rem;
                font-weight: 600;
                background: #facc15;
                color: #111827;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .btn-preorder:hover {
                background: #eab308;
                transform: scale(1.05);
            }

            .btn-secondary {
                padding: 0.6rem 1.8rem;
                border-radius: 9999px;
                font-size: 1rem;
                font-weight: 500;
                border: 1px solid #e5e7eb;
                background: #f3f4f6;
                color: #374151;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .btn-secondary:hover {
                background: #e5e7eb;
                color: #1f2937;
            }

            .event-status {
                display: inline-block;
                padding: 0.4rem 1rem;
                border-radius: 9999px;
                font-size: 0.9rem;
                font-weight: 500;
            }

            .event-status.upcoming {
                background: #fef3c7;
                color: #92400e;
            }

            .event-status.ongoing {
                background: #d1fae5;
                color: #065f46;
            }

            .event-status.past {
                background: #f3f4f6;
                color: #6b7280;
            }

            .gallery-container {
                position: relative;
                overflow: hidden;
                max-width: 100%;
            }

            .gallery-slider {
                display: flex;
                transition: transform 0.5s ease;
                width: 100%;
            }

            .gallery-image {
                transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                width: 100%;
                max-height: 400px;
                object-fit: cover;
                flex-shrink: 0;
            }

            .gallery-image:hover {
                transform: scale(1.05);
            }

            .gallery-btn {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(17, 24, 39, 0.7);
                color: #ffffff;
                border: none;
                padding: 0.6rem;
                cursor: pointer;
                z-index: 10;
            }

            .gallery-btn-left {
                left: 10px;
            }

            .gallery-btn-right {
                right: 10px;
            }

            .map-container {
                border-radius: 0.75rem;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                border: 1px solid #e5e7eb;
                height: 350px;
            }

            .countdown-timer {
                font-family: "Space Grotesk", sans-serif;
                font-size: 1.3rem;
                color: #111827;
            }

            .organizer-info {
                border-top: 1px solid #e5e7eb;
                padding-top: 1.5rem;
            }

            .ticket-info {
                background: #f9fafb;
                padding: 1.2rem;
                border-radius: 0.5rem;
                border: 1px solid #e5e7eb;
            }

            .tag {
                display: inline-block;
                padding: 0.4rem 1rem;
                border-radius: 9999px;
                font-size: 0.9rem;
                font-weight: 500;
                background: #f3f4f6;
                color: #374151;
                border: 1px solid #e5e7eb;
                margin-right: 0.5rem;
                transition: background 0.3s ease;
            }

            .tag:hover {
                background: #e5e7eb;
            }

            .comment-section {
                border-top: 1px solid #e5e7eb;
                padding-top: 1.5rem;
            }

            .comment-form {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .comment-form textarea {
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                padding: 0.75rem;
                resize: vertical;
                font-family: "Space Grotesk", sans-serif;
                color: #111827;
            }

            .comment {
                border-bottom: 1px solid #e5e7eb;
                padding: 1.2rem 0;
            }

            .social-share-btn {
                padding: 0.6rem 1.2rem;
                border-radius: 9999px;
                font-size: 1rem;
                font-weight: 500;
                border: 1px solid #e5e7eb;
                background: #f3f4f6;
                color: #374151;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .social-share-btn:hover {
                background: #e5e7eb;
                color: #1f2937;
            }

            #paymentModal,
            #preorderModal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                display: none;
                align-items: center;
                justify-content: center;
                z-index: 50;
            }

            .modal-content {
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                padding: 2rem;
                max-width: 500px;
                width: 90%;
                position: relative;
            }

            .modal-content h2 {
                font-size: 1.5rem;
                font-weight: 600;
                color: #111827;
                margin-bottom: 1rem;
            }

            .modal-content label {
                font-size: 0.9rem;
                color: #111827;
                margin-bottom: 0.5rem;
                display: block;
            }

            .modal-content select,
            .modal-content input {
                width: 100%;
                padding: 0.5rem;
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                font-family: "Space Grotesk", sans-serif;
                color: #111827;
                margin-bottom: 1rem;
            }

            .modal-content select:focus,
            .modal-content input:focus {
                outline: none;
                border-color: #111827;
                box-shadow: 0 0 0 2px rgba(17, 24, 39, 0.2);
            }

            .modal-content .close-modal {
                position: absolute;
                top: 1rem;
                right: 1rem;
                background: none;
                border: none;
                font-size: 1.2rem;
                color: #111827;
                cursor: pointer;
            }

            .modal-content .total-price {
                font-size: 1.1rem;
                font-weight: 500;
                color: #111827;
                margin-bottom: 1rem;
            }

            /* Media Query untuk Laptop (1024px - 1440px) */
            @media (min-width: 1024px) and (max-width: 1440px) {
                .event-detail-container {
                    padding: 2rem;
                }

                .btn-primary, .btn-secondary, .social-share-btn {
                    font-size: 0.95rem;
                    padding: 0.5rem 1.5rem;
                }

                .btn-preorder {
                    font-size: 1rem;
                    padding: 0.7rem 2rem;
                }

                .event-status, .tag {
                    font-size: 0.85rem;
                }

                .countdown-timer {
                    font-size: 1.2rem;
                }

                .gallery-image {
                    max-height: 350px;
                }

                .map-container {
                    height: 300px;
                }

                #event-detail-content {
                    gap: 2rem;
                }

                .modal-content {
                    max-width: 600px;
                }
            }

            /* Media Query untuk Mobile */
            @media (max-width: 767px) {
                .event-detail-container {
                    padding: 1rem;
                }

                .btn-primary, .btn-secondary, .social-share-btn {
                    font-size: 0.75rem;
                    padding: 0.4rem 1rem;
                }

                .btn-preorder {
                    font-size: 0.85rem;
                    padding: 0.5rem 1.5rem;
                }

                .event-status, .tag {
                    font-size: 0.7rem;
                }

                .countdown-timer {
                    font-size: 1rem;
                }

                .gallery-image {
                    max-height: 250px;
                }

                .map-container {
                    height: 250px;
                }

                .modal-content {
                    padding: 1rem;
                    width: 95%;
                }

                .modal-content h2 {
                    font-size: 1.2rem;
                }

                .modal-content select,
                .modal-content input {
                    font-size: 0.8rem;
                }
            }
        </style>
    @endpush

    <!-- Payment Modal -->
    <div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center" style="display: none">
        <div class="modal-content">
            <button class="close-modal"><i class="fas fa-times"></i></button>
            <h2>Pembayaran Tiket</h2>
            <label for="ticketQuantity">Jumlah Tiket</label>
            <select id="ticketQuantity">
                <option value="" disabled selected>Pilih jumlah tiket</option>
            </select>
            <label for="paymentMethod">Metode Pembayaran</label>
            <select id="paymentMethod">
                <option value="" disabled selected>Pilih metode</option>
                <option value="credit-card">Kartu Kredit</option>
                <option value="bank-transfer">Transfer Bank</option>
                <option value="e-wallet">E-Wallet</option>
            </select>
            <div id="paymentDetails"></div>
            <div class="total-price">Total: Rp 0</div>
            <div class="flex gap-4">
                <button id="payNowBtn" class="btn-primary" disabled>Bayar Sekarang</button>
                <button id="cancelPaymentBtn" class="btn-secondary">Batal</button>
            </div>
        </div>
    </div>

    <!-- Pre-Order Modal -->
    <div id="preorderModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none">
        <div class="modal-content">
            <button class="close-modal"><i class="fas fa-times"></i></button>
            <h2>Pre-Order Tiket</h2>
            <label for="preorderEmail">Email</label>
            <input type="email" id="preorderEmail" placeholder="Masukkan email Tuan">
            <label for="preorderQuantity">Jumlah Tiket</label>
            <select id="preorderQuantity">
                <option value="" disabled selected>Pilih jumlah tiket</option>
                <option value="1">1 Tiket</option>
                <option value="2">2 Tiket</option>
                <option value="3">3 Tiket</option>
                <option value="4">4 Tiket</option>
                <option value="5">5 Tiket</option>
            </select>
            <div class="flex gap-4">
                <button id="submitPreorderBtn" class="btn-primary" disabled>Pre-Order Sekarang</button>
                <button id="cancelPreorderBtn" class="btn-secondary">Batal</button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="pt-24 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="event-detail-container bg-white p-6 md:p-10 rounded-lg border border-gray-200 shadow-xl">
                <div id="event-detail-content" class="flex flex-col md:flex-row gap-6">
                    <p>Memuat detail event...</p>
                </div>
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/agenda" class="btn-primary inline-flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Event
                    </a>
                    <button id="shareBtn" class="btn-secondary inline-flex items-center">
                        <i class="fas fa-share-alt mr-2"></i> Bagikan
                    </button>
                    <button id="bookmarkBtn" class="btn-secondary inline-flex items-center">
                        <i class="far fa-bookmark mr-2"></i> Bookmark
                    </button>
                </div>
                <div id="social-share" class="mt-4 flex gap-4 justify-center"></div>
                <!-- Additional Event Info -->
                <div id="event-additional-info" class="mt-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Tambahan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div id="event-map" class="map-container"></div>
                        <div id="event-organizer-ticket" class="space-y-6">
                            <div id="event-countdown"></div>
                            <div class="organizer-info">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Penyelenggara</h3>
                                <p class="text-gray-700"></p>
                            </div>
                            <div class="ticket-info">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Harga Tiket</h3>
                                <p class="text-gray-700"></p>
                            </div>
                        </div>
                    </div>
                    <div id="event-tags" class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tag</h3>
                        <div class="flex flex-wrap gap-2"></div>
                    </div>
                </div>
                <!-- Comment Section -->
                <div id="comment-section" class="mt-10 comment-section">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Komentar</h2>
                    <div class="comment-form">
                        <textarea id="commentInput" rows="4" placeholder="Tulis komentar Tuan..." class="w-full text-gray-700"></textarea>
                        <button id="submitComment" class="btn-primary inline-flex items-center">
                            <i class="fas fa-comment mr-2"></i> Kirim Komentar
                        </button>
                    </div>
                    <div id="comments-list" class="mt-6"></div>
                </div>
                <!-- Related Events -->
                <div id="related-events" class="mt-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Event Terkait</h2>
                    <div id="related-events-list" class="grid grid-cols-1 md:grid-cols-3 gap-6"></div>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
       <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // ========== COUNTDOWN ==========
    const eventDate = new Date("2025-12-31T23:59:59").getTime();
    const countdownEl = document.getElementById("countdown");

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = eventDate - now;

        if (distance < 0) {
            countdownEl.innerHTML = "Acara telah berakhir";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        countdownEl.innerHTML = `${days}h ${hours}j ${minutes}m ${seconds}d`;
    }
    setInterval(updateCountdown, 1000);
    updateCountdown();

    // ========== MODAL PAYMENT ==========
    window.openPaymentModal = function () {
        const modal = document.getElementById("paymentModal");
        modal.style.display = "flex";
        anime({
            targets: ".modal-content",
            scale: [0.8, 1],
            opacity: [0, 1],
            duration: 400,
            easing: "easeOutElastic"
        });
    };

    window.closePaymentModal = function () {
        const modal = document.getElementById("paymentModal");
        if (modal) {
            anime({
                targets: ".modal-content",
                scale: [1, 0.8],
                opacity: [1, 0],
                duration: 200,
                easing: "easeInQuad",
                complete: () => {
                    modal.style.display = "none";
                }
            });
        }
    };

    // ========== MODAL PREORDER ==========
    window.openPreorderModal = function () {
        const modal = document.getElementById("preorderModal");
        modal.style.display = "flex";
        anime({
            targets: ".modal-content",
            scale: [0.8, 1],
            opacity: [0, 1],
            duration: 400,
            easing: "easeOutElastic"
        });
    };

    window.closePreorderModal = function () {
        const modal = document.getElementById("preorderModal");
        if (modal) {
            anime({
                targets: ".modal-content",
                scale: [1, 0.8],
                opacity: [1, 0],
                duration: 200,
                easing: "easeInQuad",
                complete: () => {
                    modal.style.display = "none";
                }
            });
        }
    };

    // ========== KOMENTAR ==========
    const commentForm = document.getElementById("commentForm");
    const commentList = document.getElementById("commentList");

    commentForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const input = document.getElementById("commentInput");
        const text = input.value.trim();

        if (text !== "") {
            const li = document.createElement("li");
            li.textContent = text;
            li.classList.add("p-2", "bg-gray-100", "rounded", "shadow");
            commentList.appendChild(li);

            input.value = "";

            anime({
                targets: li,
                opacity: [0, 1],
                translateY: [-10, 0],
                duration: 500,
                easing: "easeOutQuad"
            });
        }
    });

    // ========== GSAP ANIMASI MASUK ==========
    gsap.from(".fade-in", { duration: 1, opacity: 0, y: 30, stagger: 0.2 });
});
</script>

    @endpush
</x-layout>