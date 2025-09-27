<x-layout>
    <div class="max-w-7xl mx-auto px-6 py-12 mt-16">
        <div class="bg-white p-6 md:p-10 rounded-lg border border-gray-200 shadow-xl">
            <h1 class="text-2xl font-bold text-gray-900 mb-6 font-['Space_Grotesk']">Pembayaran Tiket</h1>
            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Detail Pemesanan</h2>
                <p class="text-gray-700 mb-1"><strong>Acara:</strong> {{ $registration->event->title }}</p>
                <p class="text-gray-700 mb-1"><strong>Tiket:</strong> {{ $registration->ticket->type }}</p>
                <p class="text-gray-700 mb-1"><strong>Harga per Tiket:</strong> Rp {{ number_format($registration->ticket->price, 0, ',', '.') }}</p>
                <p class="text-gray-700 mb-1"><strong>Jumlah Tiket:</strong> {{ $registration->quantity }}</p>
                <p class="text-gray-700 mb-1"><strong>Total:</strong> <span class="total-price">Rp {{ number_format($registration->ticket->price * $registration->quantity, 0, ',', '.') }}</span></p>
                <p class="text-gray-700 mb-1"><strong>Status:</strong> 
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-medium {{ $registration->status == 'booked' ? 'bg-yellow-100 text-yellow-800' : ($registration->status == 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                        {{ ucfirst($registration->status) }}
                    </span>
                </p>
            </div>
            <form action="{{ route('event.processPayment', $registration->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="ticketQuantity" class="block text-sm font-medium text-gray-700">Jumlah Tiket</label>
                    <select id="ticketQuantity" name="ticket_quantity" class="w-full border rounded-md p-2 text-gray-700" required>
                        <option value="" disabled selected>Pilih jumlah tiket</option>
                        @for ($i = 1; $i <= min($registration->ticket->quantity_available - $registration->ticket->quantity_sold, 5); $i++)
                            <option value="{{ $i }}" {{ $registration->quantity == $i ? 'selected' : '' }}>{{ $i }} Tiket</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-4">
                    <label for="paymentMethod" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                    <select id="paymentMethod" name="payment_method" class="w-full border rounded-md p-2 text-gray-700" required>
                        <option value="" disabled selected>Pilih metode</option>
                        <option value="credit_card">Kartu Kredit</option>
                        <option value="bank_transfer">Transfer Bank</option>
                        <option value="ewallet">E-Wallet</option>
                    </select>
                </div>
                <div id="paymentDetails" class="mb-4"></div>
                <div class="mb-4">
                    <label for="paymentProof" class="block text-sm font-medium text-gray-700">Unggah Bukti Pembayaran (Opsional)</label>
                    <input type="file" id="paymentProof" name="payment_proof" accept=".jpg,.png,.pdf" class="w-full border rounded-md p-2 text-gray-700">
                </div>
                <div class="flex gap-4">
                    <button type="submit" id="payNowBtn" class="btn-primary" disabled>Proses Pembayaran</button>
                    <a href="{{ route('events.show', $registration->event_id) }}" class="btn-secondary">Kembali</a>
                </div>
            </form>
            <form action="{{ route('event.cancelRegistration', $registration->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn-cancel">Batalkan Pemesanan</button>
            </form>
        </div>
    </div>

    @push('styles')
        <style>
            body {
                font-family: "Space Grotesk", sans-serif;
                background: #ffffff;
                color: #111827;
            }

            .btn-primary {
                padding: 0.5rem 1.5rem;
                border-radius: 9999px;
                font-size: 0.9rem;
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

            .btn-secondary {
                padding: 0.5rem 1.5rem;
                border-radius: 9999px;
                font-size: 0.9rem;
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

            .btn-cancel {
                padding: 0.5rem 1.5rem;
                border-radius: 9999px;
                font-size: 0.9rem;
                font-weight: 500;
                background: #dc2626;
                color: #ffffff;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .btn-cancel:hover {
                background: #b91c1c;
            }

            .total-price {
                font-size: 1.1rem;
                font-weight: 500;
                color: #111827;
            }

            @media (max-width: 767px) {
                .btn-primary,
                .btn-secondary,
                .btn-cancel {
                    font-size: 0.75rem;
                    padding: 0.4rem 1rem;
                }

                .total-price {
                    font-size: 1rem;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const ticketQuantitySelect = document.getElementById('ticketQuantity');
                const paymentMethodSelect = document.getElementById('paymentMethod');
                const paymentDetailsDiv = document.getElementById('paymentDetails');
                const totalPriceDiv = document.querySelector('.total-price');
                const payNowBtn = document.getElementById('payNowBtn');
                const ticketPrice = {{ $registration->ticket->price }};

                function updateTotalPrice() {
                    const quantity = parseInt(ticketQuantitySelect.value) || 0;
                    const total = quantity * ticketPrice;
                    totalPriceDiv.textContent = `Total: Rp ${total.toLocaleString('id-ID')}`;
                    validateForm();
                }

                function updatePaymentDetails() {
                    const method = paymentMethodSelect.value;
                    paymentDetailsDiv.innerHTML = '';
                    if (method === 'credit_card') {
                        paymentDetailsDiv.innerHTML = `
                            <label for="cardNumber" class="block text-sm font-medium text-gray-700">Nomor Kartu</label>
                            <input type="text" id="cardNumber" name="card_number" placeholder="1234 5678 9012 3456" maxlength="19" class="w-full border rounded-md p-2 text-gray-700">
                            <label for="cardExpiry" class="block text-sm font-medium text-gray-700">Tanggal Kadaluarsa</label>
                            <input type="text" id="cardExpiry" name="card_expiry" placeholder="MM/YY" maxlength="5" class="w-full border rounded-md p-2 text-gray-700">
                            <label for="cardCVC" class="block text-sm font-medium text-gray-700">CVC</label>
                            <input type="text" id="cardCVC" name="card_cvc" placeholder="123" maxlength="3" class="w-full border rounded-md p-2 text-gray-700">
                        `;
                    } else if (method === 'bank_transfer') {
                        paymentDetailsDiv.innerHTML = `
                            <label for="bankName" class="block text-sm font-medium text-gray-700">Nama Bank</label>
                            <select id="bankName" name="bank_name" class="w-full border rounded-md p-2 text-gray-700">
                                <option value="" disabled selected>Pilih bank</option>
                                <option value="bca">BCA</option>
                                <option value="mandiri">Mandiri</option>
                                <option value="bni">BNI</option>
                                <option value="bri">BRI</option>
                            </select>
                        `;
                    } else if (method === 'ewallet') {
                        paymentDetailsDiv.innerHTML = `
                            <label for="ewalletProvider" class="block text-sm font-medium text-gray-700">Penyedia E-Wallet</label>
                            <select id="ewalletProvider" name="ewallet_provider" class="w-full border rounded-md p-2 text-gray-700">
                                <option value="" disabled selected>Pilih e-wallet</option>
                                <option value="ovo">OVO</option>
                                <option value="gopay">GoPay</option>
                                <option value="dana">Dana</option>
                            </select>
                        `;
                    }
                    validateForm();
                    anime({
                        targets: '#paymentDetails input, #paymentDetails select',
                        translateY: [20, 0],
                        opacity: [0, 1],
                        duration: 300,
                        easing: 'easeOutQuad',
                        delay: anime.stagger(100)
                    });
                }

                function validateForm() {
                    const quantity = ticketQuantitySelect.value;
                    const method = paymentMethodSelect.value;
                    let isValid = quantity && method;
                    if (method === 'credit_card') {
                        const cardNumber = document.getElementById('cardNumber')?.value;
                        const cardExpiry = document.getElementById('cardExpiry')?.value;
                        const cardCVC = document.getElementById('cardCVC')?.value;
                        isValid = isValid && cardNumber && cardNumber.length >= 16 && cardExpiry && cardExpiry.match(/^\d{2}\/\d{2}$/) && cardCVC && cardCVC.length === 3;
                    } else if (method === 'bank_transfer') {
                        const bankName = document.getElementById('bankName')?.value;
                        isValid = isValid && bankName;
                    } else if (method === 'ewallet') {
                        const ewalletProvider = document.getElementById('ewalletProvider')?.value;
                        isValid = isValid && ewalletProvider;
                    }
                    payNowBtn.disabled = !isValid;
                }

                ticketQuantitySelect.addEventListener('change', updateTotalPrice);
                paymentMethodSelect.addEventListener('change', updatePaymentDetails);
                paymentDetailsDiv.addEventListener('input', validateForm);

                updateTotalPrice();
                updatePaymentDetails();
            });
        </script>
    @endpush
</x-layout>