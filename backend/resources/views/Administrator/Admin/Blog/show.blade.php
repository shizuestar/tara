<x-admin-layout>
    <div class="bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="w-full bg-white rounded-xl p-4 sm:p-6 shadow-lg">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 bg-white p-5 pt-2 rounded-lg shadow-sm">
                <h1 class="text-2xl lg:text-3xl font-semibold flex items-center gap-3 text-gray-800" style="font-family: 'Space Grotesk', sans-serif;">
                    <i class="fas fa-blog text-yellow-500 text-xl"></i>
                    Detail Artikel
                </h1>
                <div class="flex flex-wrap items-center gap-3">
                    <button id="edit-btn" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-300">
                        <i class="fas fa-edit text-xs"></i>
                        Edit
                    </button>
                    <button id="delete-btn" class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-300" onclick="showDeleteModal()">
                        <i class="fas fa-trash text-xs"></i>
                        Hapus
                    </button>
                    <div class="relative">
                        <select id="status-change" class="appearance-none bg-white border border-gray-200 rounded-lg pl-3 pr-8 py-2 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300">
                            <option value="published">Tayang</option>
                            <option value="pending">Menunggu</option>
                            <option value="rejected">Ditolak</option>
                            <option value="draft">Draft</option>
                        </select>
                        <span class="absolute inset-y-0 right-2 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Article Detail -->
            <div class="mb-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <!-- Hero Image -->
                    <div class="lg:col-span-6">
                        <div class="relative w-full h-[350px] sm:h-[450px] lg:h-[550px] overflow-hidden rounded-xl shadow-md">
                            <img id="article-hero-image" src="https://picsum.photos/id/1015/1200/800" alt="Gambar Artikel" class="w-full h-full object-cover rounded-xl">
                        </div>
                    </div>
                    <!-- Details -->
                    <div class="lg:col-span-6">
                        <div id="view-mode">
                            <h2 id="article-title" class="text-xl sm:text-2xl font-semibold text-gray-800 mb-5" style="font-family: 'Space Grotesk', sans-serif;">Wawancara: Kerennya Karya Anak Muda</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-6">
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Kategori</label>
                                    <div id="article-category" class="text-sm text-gray-800 font-medium">Wawancara</div>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Penulis</label>
                                    <div id="article-author" class="text-sm text-gray-800 font-medium">Uploader Contoh</div>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Tanggal</label>
                                    <div id="article-date" class="text-sm text-gray-800 font-medium">10 Jul 2025</div>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Status</label>
                                    <div id="article-status" class="px-3 py-1.5 rounded-full bg-amber-100 text-amber-700 text-xs font-semibold inline-block">Tayang</div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Deskripsi</label>
                                <div id="article-description" class="text-sm text-gray-700 leading-relaxed">Inspirasi dari kreator muda Indonesia</div>
                            </div>
                            <div class="mt-6">
                                <label class="block text-xs font-medium text-gray-500 mb-1">Isi Artikel</label>
                                <div id="article-body-view" class="text-sm text-gray-700 leading-relaxed prose prose-sm"></div>
                            </div>
                        </div>
                        <div id="edit-mode" class="hidden opacity-0 transition-all duration-500">
                            <div class="mb-5">
                                <label class="block text-xs font-medium text-gray-500 mb-1">Judul</label>
                                <input id="edit-title" type="text" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300" value="Wawancara: Kerennya Karya Anak Muda" />
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Kategori</label>
                                    <select id="edit-category" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300">
                                        <option value="wawancara">Wawancara</option>
                                        <option value="tutorial">Tutorial</option>
                                        <option value="tips">Tips</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Penulis</label>
                                    <select id="edit-author" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300">
                                        <option value="1">Uploader Contoh</option>
                                        <option value="2">Penulis Lain</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Tanggal</label>
                                    <input id="edit-date" type="date" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300" value="2025-07-10" />
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Status</label>
                                    <select id="edit-status" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300">
                                        <option value="published">Tayang</option>
                                        <option value="pending">Menunggu</option>
                                        <option value="rejected">Ditolak</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Deskripsi</label>
                                <textarea id="edit-description" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300" rows="3">Inspirasi dari kreator muda Indonesia</textarea>
                            </div>
                            <div class="mt-6">
                                <label class="block text-xs font-medium text-gray-500 mb-1">Isi Artikel</label>
                                <textarea id="edit-body" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300" rows="10"></textarea>
                            </div>
                            <div class="flex gap-3 mt-5">
                                <button id="save-btn" class="bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium px-5 py-2 rounded-lg transition-all duration-300">Simpan</button>
                                <button id="cancel-btn" class="bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium px-5 py-2 rounded-lg transition-all duration-300">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div>
                <style>
                    .comment-scroll::-webkit-scrollbar {
                        width: 6px;
                    }
                    .comment-scroll::-webkit-scrollbar-track {
                        background: #f3f4f6;
                        border-radius: 3px;
                    }
                    .comment-scroll::-webkit-scrollbar-thumb {
                        background: #4b5563;
                        border-radius: 3px;
                    }
                    .comment-scroll::-webkit-scrollbar-thumb:hover {
                        background: #374151;
                    }
                    .comment-scroll {
                        scrollbar-color: #4b5563 #f3f4f6;
                        scrollbar-width: thin;
                    }
                    .comment-table td {
                        vertical-align: top;
                        word-wrap: break-word;
                    }
                    .comment-table {
                        table-layout: fixed;
                    }
                </style>
                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-800" style="font-family: 'Space Grotesk', sans-serif;">Komentar</h2>
                    <div class="text-sm text-gray-500 font-medium" id="comment-count">4 Komentar</div>
                </div>
                <div class="comment-scroll max-h-[350px] overflow-y-auto rounded-lg shadow-sm bg-gray-50 p-4">
                    <table class="w-full border-collapse comment-table">
                        <thead>
                            <tr class="bg-amber-50 rounded-t-lg">
                                <th class="p-3 text-left text-xs font-semibold text-gray-600 w-1/5">Pengguna</th>
                                <th class="p-3 text-left text-xs font-semibold text-gray-600 w-3/5">Komentar</th>
                                <th class="p-3 text-left text-xs font-semibold text-gray-600 w-1/5">Tanggal</th>
                                <th class="p-3 text-left text-xs font-semibold text-gray-600 w-10">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="comment-list" class="divide-y divide-gray-200">
                            <tr class="hover:bg-amber-50 transition-all duration-300">
                                <td class="p-3 text-sm text-gray-800">Pengguna Anonim</td>
                                <td class="p-3 text-sm text-gray-800">Ini Karya ID 7</td>
                                <td class="p-3 text-sm text-gray-800">19 Jul 2025, 23:46</td>
                                <td class="p-3">
                                    <a href="#" class="w-8 h-8 rounded-lg bg-red-600 text-white flex items-center justify-center hover:bg-red-700 text-sm transition-all duration-300" onclick="deleteComment(101)"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr class="hover:bg-amber-50 transition-all duration-300">
                                <td class="p-3 text-sm text-gray-800">Pengguna Lain</td>
                                <td class="p-3 text-sm text-gray-800">Mantap konsepnya!</td>
                                <td class="p-3 text-sm text-gray-800">19 Jul 2025, 23:46</td>
                                <td class="p-3">
                                    <a href="#" class="w-8 h-8 rounded-lg bg-red-600 text-white flex items-center justify-center hover:bg-red-700 text-sm transition-all duration-300" onclick="deleteComment(102)"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr class="hover:bg-amber-50 transition-all duration-300">
                                <td class="p-3 text-sm text-gray-800">Brian RB Keren</td>
                                <td class="p-3 text-sm text-gray-800">Keren banget idenya, boleh tau gear kameranya?</td>
                                <td class="p-3 text-sm text-gray-800">20 Jul 2025, 08:12</td>
                                <td class="p-3">
                                    <a href="#" class="w-8 h-8 rounded-lg bg-red-600 text-white flex items-center justify-center hover:bg-red-700 text-sm transition-all duration-300" onclick="deleteComment(103)"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="flex justify-center items-center gap-2 mt-4">
                    <button id="first-page-btn" class="pagination-btn bg-gray-100 text-gray-700 disabled">First</button>
                    <button id="prev-page-btn" class="pagination-btn bg-gray-100 text-gray-700 disabled">Previous</button>
                    <div id="page-numbers" class="flex gap-1">
                        <button class="pagination-btn bg-gray-100 text-gray-700 active">1</button>
                        <button class="pagination-btn bg-gray-100 text-gray-700">2</button>
                    </div>
                    <button id="next-page-btn" class="pagination-btn bg-gray-100 text-gray-700">Next</button>
                    <button id="last-page-btn" class="pagination-btn bg-gray-100 text-gray-700">Last</button>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 opacity-0 transition-all duration-500" id="deleteModal">
                <div class="bg-white rounded-xl p-5 w-full max-w-sm shadow-xl transform scale-95 transition-transform duration-300">
                    <div class="flex justify-between items-center mb-3 border-b border-gray-200 pb-2">
                        <h3 class="text-lg font-semibold text-gray-800" style="font-family: 'Space Grotesk', sans-serif;">Hapus Artikel</h3>
                        <button class="text-lg text-gray-500 hover:text-gray-800 transition-all duration-300" onclick="closeDeleteModal()">&times;</button>
                    </div>
                    <div class="mb-5 text-sm text-gray-600 leading-relaxed">
                        <p class="mb-2">Yakin ingin menghapus artikel <strong id="deleteArticleName">Wawancara: Kerennya Karya Anak Muda</strong>?</p>
                        <p>Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button class="bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-all duration-300" onclick="closeDeleteModal()">Batal</button>
                        <button class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-all duration-300">Hapus</button>
                    </div>
                </div>
            </div>

            @push('styles')
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap');

                :root {
                    --amber-accent: #f59e0b;
                    --gray-dark: #1f2937;
                    --gray-muted: #6b7280;
                }

                body {
                    font-family: 'Space Grotesk', sans-serif;
                    background: #f9fafb;
                    color: var(--gray-dark);
                }

                h1, h2, h3, label, input, select, textarea, button {
                    font-family: 'Space Grotesk', sans-serif;
                }

                .transition-all {
                    transition: all 0.3s ease;
                }

                select {
                    background-image: none;
                }

                input:focus, select:focus, textarea:focus {
                    box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.3);
                }

                .rounded-xl {
                    border-radius: 0.75rem;
                }

                .shadow-lg {
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                }

                .shadow-xl {
                    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
                }

                .pagination-btn {
                    font-family: 'Space Grotesk', sans-serif;
                    font-size: 0.875rem;
                    padding: 0.5rem 1rem;
                    border-radius: 0.5rem;
                    transition: all 0.3s ease;
                }

                .pagination-btn:hover:not(.disabled) {
                    background-color: #f59e0b;
                    color: white;
                }

                .pagination-btn.disabled {
                    opacity: 0.5;
                    cursor: not-allowed;
                }

                .pagination-btn.active {
                    background-color: #f59e0b;
                    color: white;
                    font-weight: 600;
                }

                @media (max-width: 640px) {
                    .sm\:grid-cols-2 {
                        grid-template-columns: 1fr;
                    }
                    .comment-table td {
                        font-size: 0.75rem;
                    }
                }
            </style>
            @endpush

            @push('scripts')
            <script>
                // Demo Data for Article Body
                const demoBody = [
                    { t: "p", c: "Di artikel ini kita ngobrol santai dengan beberapa kreator muda yang karyanya viral di komunitas TARA." },
                    { t: "h2", c: "Awal Perjalanan" },
                    { t: "p", c: "Semua berawal dari rasa penasaran dan sering mencoba. Banyak yang memulai dari kamar kos dengan alat seadanya." },
                    { t: "blockquote", c: "Jangan tunggu sempurna. Mulai aja dulu. – Naya, ilustrator" },
                    { t: "p", c: "Platform digital membuat distribusi karya jadi mudah. Namun menjaga konsistensi tetap tantangan utama." },
                    { t: "img", src: "https://picsum.photos/seed/blog1b/1100/600", alt: "Studio kreator" },
                    { t: "h3", c: "Tools Favorit" },
                    { t: "p", c: "Mayoritas pakai tablet gambar, Canva, Figma, dan kadang AI untuk ide warna." },
                    { t: "code", c: "console.log('Halo kreator TARA!');" },
                ];

                // Render Article Body in View Mode
                const bodyView = document.getElementById('article-body-view');
                demoBody.forEach(block => {
                    let el;
                    switch (block.t) {
                        case "h2":
                            el = document.createElement("h2");
                            el.textContent = block.c;
                            break;
                        case "h3":
                            el = document.createElement("h3");
                            el.textContent = block.c;
                            break;
                        case "p":
                            el = document.createElement("p");
                            el.textContent = block.c;
                            break;
                        case "blockquote":
                            el = document.createElement("blockquote");
                            el.textContent = block.c;
                            break;
                        case "code":
                            el = document.createElement("pre");
                            el.innerHTML = `<code>${block.c}</code>`;
                            break;
                        case "img":
                            el = document.createElement("img");
                            el.src = block.src;
                            el.alt = block.alt || "";
                            break;
                        default:
                            return;
                    }
                    bodyView.appendChild(el);
                });

                // Sample Comments Data
                const commentsData = [
                    { id: 101, user: "Pengguna Anonim", text: "Ini Karya ID 7", date: "2025-07-19T23:46:25Z" },
                    { id: 102, user: "Pengguna Lain", text: "Mantap konsepnya!", date: "2025-07-19T23:46:30Z" },
                    { id: 103, user: "Brian RB Keren", text: "Keren banget idenya, boleh tau gear kameranya?", date: "2025-07-20T08:12:10Z" },
                ];

                // Pagination Variables
                let currentPage = 1;
                const commentsPerPage = 4;
                const totalComments = commentsData.length;
                let totalPages = Math.ceil(totalComments / commentsPerPage);

                // Render Comments
                function renderComments(page) {
                    const start = (page - 1) * commentsPerPage;
                    const end = start + commentsPerPage;
                    const paginatedComments = commentsData.slice(start, end);

                    const commentList = document.getElementById('comment-list');
                    commentList.innerHTML = paginatedComments.map(comment => `
                        <tr class="hover:bg-amber-50 transition-all duration-300">
                            <td class="p-3 text-sm text-gray-800 font-medium">${comment.user}</td>
                            <td class="p-3 text-sm text-gray-700">${comment.text}</td>
                            <td class="p-3 text-sm text-gray-700">${fmtDateISOtoDisplay(comment.date)}</td>
                            <td class="p-3">
                                <a href="#" class="w-8 h-8 rounded-lg bg-red-600 text-white flex items-center justify-center hover:bg-red-700 text-sm transition-all duration-300" onclick="deleteComment(${comment.id})"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    `).join('');
                    document.getElementById('comment-count').textContent = `${totalComments} Komentar`;
                    updatePagination();
                }

                // Update Pagination
                function updatePagination() {
                    const pageNumbers = document.getElementById('page-numbers');
                    pageNumbers.innerHTML = '';
                    for (let i = 1; i <= totalPages; i++) {
                        pageNumbers.innerHTML += `
                            <button class="pagination-btn bg-gray-100 text-gray-700 ${i === currentPage ? 'active' : ''}" onclick="goToPage(${i})">${i}</button>
                        `;
                    }
                    document.getElementById('first-page-btn').classList.toggle('disabled', currentPage === 1);
                    document.getElementById('prev-page-btn').classList.toggle('disabled', currentPage === 1);
                    document.getElementById('next-page-btn').classList.toggle('disabled', currentPage === totalPages);
                    document.getElementById('last-page-btn').classList.toggle('disabled', currentPage === totalPages);
                }

                // Pagination Navigation
                function goToPage(page) {
                    currentPage = page;
                    renderComments(currentPage);
                }

                document.getElementById('first-page-btn').addEventListener('click', () => {
                    if (currentPage !== 1) goToPage(1);
                });

                document.getElementById('prev-page-btn').addEventListener('click', () => {
                    if (currentPage > 1) goToPage(currentPage - 1);
                });

                document.getElementById('next-page-btn').addEventListener('click', () => {
                    if (currentPage < totalPages) goToPage(currentPage + 1);
                });

                document.getElementById('last-page-btn').addEventListener('click', () => {
                    if (currentPage !== totalPages) goToPage(totalPages);
                });

                // Initial Render
                renderComments(currentPage);

                // Edit Mode Toggle
                const viewMode = document.getElementById('view-mode');
                const editMode = document.getElementById('edit-mode');
                document.getElementById('edit-btn').addEventListener('click', () => {
                    viewMode.classList.add('hidden', 'opacity-0');
                    editMode.classList.remove('hidden');
                    setTimeout(() => editMode.classList.remove('opacity-0'), 50);
                    // Load body into edit textarea
                    document.getElementById('edit-body').value = demoBody.map(b => b.c).join('\n\n');
                });
                document.getElementById('cancel-btn').addEventListener('click', () => {
                    editMode.classList.add('opacity-0');
                    setTimeout(() => {
                        editMode.classList.add('hidden');
                        viewMode.classList.remove('hidden', 'opacity-0');
                    }, 300);
                });
                document.getElementById('save-btn').addEventListener('click', () => {
                    console.log('Saving article details');
                    editMode.classList.add('opacity-0');
                    setTimeout(() => {
                        editMode.classList.add('hidden');
                        viewMode.classList.remove('hidden', 'opacity-0');
                    }, 300);
                });

                // Status Change
                const statusSelect = document.getElementById('status-change');
                statusSelect.addEventListener('change', (e) => {
                    document.getElementById('article-status').textContent = {
                        published: 'Tayang',
                        pending: 'Menunggu',
                        rejected: 'Ditolak',
                        draft: 'Draft'
                    }[e.target.value];
                    document.getElementById('article-status').className = `px-3 py-1.5 rounded-full text-xs font-semibold inline-block ${
                        e.target.value === 'published' ? 'bg-amber-100 text-amber-700' :
                        e.target.value === 'pending' ? 'bg-yellow-100 text-yellow-700' :
                        e.target.value === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-gray-200 text-gray-700'
                    }`;
                });

                // Delete Modal
                function showDeleteModal() {
                    document.getElementById('deleteModal').classList.remove('hidden');
                    setTimeout(() => {
                        document.getElementById('deleteModal').classList.add('opacity-100');
                        document.querySelector('#deleteModal .transform').classList.remove('scale-95');
                    }, 50);
                }

                function closeDeleteModal() {
                    document.getElementById('deleteModal').classList.remove('opacity-100');
                    document.querySelector('#deleteModal .transform').classList.add('scale-95');
                    setTimeout(() => document.getElementById('deleteModal').classList.add('hidden'), 300);
                }

                document.getElementById('deleteModal').addEventListener('click', (e) => {
                    if (e.target === document.getElementById('deleteModal')) closeDeleteModal();
                });

                // Delete Comment
                function deleteComment(id) {
                    console.log('Deleting comment:', id);
                }

                // Utility Function for Date Formatting
                function fmtDateISOtoDisplay(iso) {
                    if (!iso) return "";
                    const d = new Date(iso);
                    return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' });
                }
            </script>
            @endpush
        </div>
    </div>
</x-admin-layout>