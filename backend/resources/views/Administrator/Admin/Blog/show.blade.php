<x-admin-layout>
    <div class="bg-gray-100 min-h-screen p-2">
        <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 border-b border-gray-200 pb-4">
                <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                    <i class="fas fa-blog text-yellow-400 text-xl"></i>
                    Detail Artikel
                </h1>
                <div class="flex items-center gap-3">
                    <button id="edit-btn" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                        <i class="fas fa-edit text-sm"></i>
                        Edit
                    </button>
                    <button id="delete-btn" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors" onclick="showDeleteModal()">
                        <i class="fas fa-trash text-sm"></i>
                        Hapus
                    </button>
                    <select id="status-change" class="p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:ring-2 focus:ring-yellow-400">
                        <option value="published">Tayang</option>
                        <option value="pending">Menunggu</option>
                        <option value="rejected">Ditolak</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>

            <!-- Thumbnail -->
            <div class="mb-6">
                <div class="w-full h-[400px] sm:h-[400px] overflow-hidden rounded-md border border-gray-300">
                    <img id="article-hero-image" src="https://picsum.photos/id/1015/1200/800" alt="Gambar Artikel" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Article Detail -->
            <div id="view-mode">
                <h2 id="article-title" class="text-xl font-semibold text-gray-900 mb-4">Wawancara: Kerennya Karya Anak Muda</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6 bg-gray-50 p-4 rounded-md">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Kategori</label>
                        <div id="article-category" class="text-sm text-gray-900 font-medium">Wawancara</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Penulis</label>
                        <div id="article-author" class="text-sm text-gray-900 font-medium">Uploader Contoh</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Tanggal</label>
                        <div id="article-date" class="text-sm text-gray-900 font-medium">10 Jul 2025</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Status</label>
                        <div id="article-status" class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-600 text-xs font-medium">Tayang</div>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Deskripsi</label>
                    <div id="article-description" class="text-sm text-gray-700">Inspirasi dari kreator muda Indonesia</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Isi Artikel</label>
                    <div id="article-body-view" class="text-sm text-gray-700 prose prose-sm max-w-none"></div>
                </div>
            </div>
            <div id="edit-mode" class="hidden">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Judul</label>
                    <input id="edit-title" type="text" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" value="Wawancara: Kerennya Karya Anak Muda" />
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Kategori</label>
                        <select id="edit-category" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="wawancara">Wawancara</option>
                            <option value="tutorial">Tutorial</option>
                            <option value="tips">Tips</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Penulis</label>
                        <select id="edit-author" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="1">Uploader Contoh</option>
                            <option value="2">Penulis Lain</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal</label>
                        <input id="edit-date" type="date" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" value="2025-07-10" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                        <select id="edit-status" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="published">Tayang</option>
                            <option value="pending">Menunggu</option>
                            <option value="rejected">Ditolak</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Deskripsi</label>
                    <textarea id="edit-description" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="3">Inspirasi dari kreator muda Indonesia</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Isi Artikel</label>
                    <div id="editor-container" class="border border-gray-300 rounded-md overflow-hidden">
                        <textarea id="edit-body" class="hidden"></textarea>
                    </div>
                </div>
                <div class="flex gap-3 mt-4">
                    <button id="save-btn" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Simpan</button>
                    <button id="cancel-btn" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Batal</button>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="mt-10">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-900">Komentar</h2>
                    <div id="comment-count" class="text-sm text-gray-600">4 Komentar</div>
                </div>
                <div class="bg-white border border-gray-300 rounded-md overflow-hidden">
                    <div class="max-h-[300px] overflow-y-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600 w-1/5">Pengguna</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600 w-3/5">Komentar</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600 w-1/5">Tanggal</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600 w-10">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="comment-list" class="divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 text-sm text-gray-900">Pengguna Anonim</td>
                                    <td class="p-3 text-sm text-gray-600">Ini Karya ID 7</td>
                                    <td class="p-3 text-sm text-gray-600">19 Jul 2025, 23:46</td>
                                    <td class="p-3">
                                        <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="deleteComment(101)" aria-label="Hapus Komentar"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 text-sm text-gray-900">Pengguna Lain</td>
                                    <td class="p-3 text-sm text-gray-600">Mantap konsepnya!</td>
                                    <td class="p-3 text-sm text-gray-600">19 Jul 2025, 23:46</td>
                                    <td class="p-3">
                                        <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="deleteComment(102)" aria-label="Hapus Komentar"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 text-sm text-gray-900">Brian RB Keren</td>
                                    <td class="p-3 text-sm text-gray-600">Keren banget idenya, boleh tau gear kameranya?</td>
                                    <td class="p-3 text-sm text-gray-600">20 Jul 2025, 08:12</td>
                                    <td class="p-3">
                                        <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="deleteComment(103)" aria-label="Hapus Komentar"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex justify-center mt-4 gap-2">
                    <button id="first-page-btn" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-300 text-gray-900 hover:bg-yellow-400 hover:text-gray-900 text-sm disabled:opacity-50" aria-label="First page">First</button>
                    <button id="prev-page-btn" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-300 text-gray-900 hover:bg-yellow-400 hover:text-gray-900 text-sm disabled:opacity-50" aria-label="Previous page"><i class="fas fa-chevron-left"></i></button>
                    <div id="page-numbers" class="flex gap-1">
                        <button class="w-9 h-9 flex items-center justify-center rounded-md bg-yellow-400 text-gray-900 font-medium text-sm" aria-label="Page 1">1</button>
                        <button class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-300 text-gray-900 hover:bg-yellow-400 hover:text-gray-900 text-sm" aria-label="Page 2">2</button>
                    </div>
                    <button id="next-page-btn" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-300 text-gray-900 hover:bg-yellow-400 hover:text-gray-900 text-sm" aria-label="Next page"><i class="fas fa-chevron-right"></i></button>
                    <button id="last-page-btn" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-300 text-gray-900 hover:bg-yellow-400 hover:text-gray-900 text-sm" aria-label="Last page">Last</button>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
                <div class="bg-white rounded-lg p-6 w-full max-w-md">
                    <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                        <h3 class="text-lg font-semibold text-gray-900">Hapus Artikel</h3>
                        <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                    </div>
                    <div class="mb-4 text-sm text-gray-600">
                        <p class="mb-2">Yakin ingin menghapus artikel <strong id="deleteArticleName">Wawancara: Kerennya Karya Anak Muda</strong>?</p>
                        <p>Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeDeleteModal()">Batal</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md">Hapus</button>
                    </div>
                </div>
            </div>

            @push('styles')
            <style>
                body {
                    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                }
                .prose h2 {
                    font-size: 1.25rem;
                    font-weight: 600;
                    color: #111827;
                    margin-top: 1.5rem;
                    margin-bottom: 0.75rem;
                    padding-bottom: 0.5rem;
                    border-bottom: 2px solid #FACC15;
                }
                .prose h3 {
                    font-size: 1.125rem;
                    font-weight: 600;
                    color: #111827;
                    margin-top: 1.25rem;
                    margin-bottom: 0.5rem;
                }
                .prose p {
                    color: #374151;
                    margin-bottom: 1rem;
                    line-height: 1.7;
                }
                .prose blockquote {
                    border-left: 4px solid #FACC15;
                    padding: 1rem 1.5rem;
                    background-color: #FFFBEB;
                    color: #6b7280;
                    font-style: italic;
                    margin: 1.5rem 0;
                    border-radius: 0.375rem;
                }
                .prose pre {
                    background-color: #1F2937;
                    color: #E5E7EB;
                    padding: 1rem;
                    border-radius: 0.375rem;
                    margin-bottom: 1.5rem;
                    overflow-x: auto;
                    font-size: 0.875rem;
                }
                .prose code {
                    background-color: #F3F4F6;
                    color: #111827;
                    padding: 0.2rem 0.4rem;
                    border-radius: 0.25rem;
                    font-size: 0.875rem;
                }
                .prose pre code {
                    background-color: transparent;
                    color: inherit;
                    padding: 0;
                }
                .prose img {
                    max-width: 100%;
                    border-radius: 0.5rem;
                    margin: 1.5rem 0;
                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                }
                .max-h-\[300px\]::-webkit-scrollbar {
                    width: 6px;
                }
                .max-h-\[300px\]::-webkit-scrollbar-track {
                    background: #f3f4f6;
                    border-radius: 3px;
                }
                .max-h-\[300px\]::-webkit-scrollbar-thumb {
                    background: #6b7280;
                    border-radius: 3px;
                }
                .max-h-\[300px\]::-webkit-scrollbar-thumb:hover {
                    background: #4b5563;
                }
                .article-info-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    gap: 1rem;
                    background-color: #FFFBEB;
                    padding: 1.5rem;
                    border-radius: 0.5rem;
                    border-left: 4px solid #FACC15;
                }
                .article-info-item {
                    display: flex;
                    flex-direction: column;
                }
                .article-info-label {
                    font-size: 0.75rem;
                    font-weight: 600;
                    color: #92400E;
                    margin-bottom: 0.25rem;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                }
                .article-info-value {
                    font-size: 0.875rem;
                    font-weight: 500;
                    color: #111827;
                }
                .status-badge {
                    display: inline-flex;
                    align-items: center;
                    padding: 0.25rem 0.75rem;
                    border-radius: 9999px;
                    font-size: 0.75rem;
                    font-weight: 600;
                }
                .status-published {
                    background-color: #FEF3C7;
                    color: #92400E;
                }
                .status-pending {
                    background-color: #FEF3C7;
                    color: #92400E;
                }
                .status-rejected {
                    background-color: #FEE2E2;
                    color: #B91C1C;
                }
                .status-draft {
                    background-color: #F3F4F6;
                    color: #374151;
                }
                /* Styling untuk editor */
                .tox-tinymce {
                    border: 1px solid #d1d5db !important;
                    border-radius: 0.375rem;
                }
                .tox .tox-toolbar__primary {
                    background: #f9fafb;
                    border-bottom: 1px solid #e5e7eb;
                }
                .tox .tox-edit-area__iframe {
                    background-color: white;
                }
                .tox .tox-statusbar {
                    border-top: 1px solid #e5e7eb;
                }
            </style>
            @endpush

            @push('scripts')
            <!-- Load TinyMCE -->
            <script src="https://cdn.tiny.cloud/1/vcya58nqfw4vp8bbe79scjwpyqp4vlnlbzodc3utt7zjubiz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
            <script>
                // Inisialisasi TinyMCE
                let editor;
                
                const initEditor = () => {
                    return tinymce.init({
                        selector: '#edit-body',
                        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media table emoticons',
                        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code emoticons | preview',
                        height: 400,
                        menubar: false,
                        statusbar: true,
                        branding: false,
                        automatic_uploads: true,
                        images_upload_url: '/upload/image', // Ganti dengan endpoint upload gambar Anda
                        file_picker_types: 'image',
                        content_style: `
                            body { 
                                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; 
                                font-size: 14px; 
                                line-height: 1.6; 
                                color: #374151;
                            }
                            h2 {
                                font-size: 1.25rem;
                                font-weight: 600;
                                color: #111827;
                                margin-top: 1.5rem;
                                margin-bottom: 0.75rem;
                                padding-bottom: 0.5rem;
                                border-bottom: 2px solid #FACC15;
                            }
                            h3 {
                                font-size: 1.125rem;
                                font-weight: 600;
                                color: #111827;
                                margin-top: 1.25rem;
                                margin-bottom: 0.5rem;
                            }
                            blockquote {
                                border-left: 4px solid #FACC15;
                                padding: 1rem 1.5rem;
                                background-color: #FFFBEB;
                                color: #6b7280;
                                font-style: italic;
                                margin: 1.5rem 0;
                                border-radius: 0.375rem;
                            }
                            pre {
                                background-color: #1F2937;
                                color: #E5E7EB;
                                padding: 1rem;
                                border-radius: 0.375rem;
                                margin-bottom: 1.5rem;
                                overflow-x: auto;
                                font-size: 0.875rem;
                            }
                            code {
                                background-color: #F3F4F6;
                                color: #111827;
                                padding: 0.2rem 0.4rem;
                                border-radius: 0.25rem;
                                font-size: 0.875rem;
                            }
                            img {
                                max-width: 100%;
                                border-radius: 0.5rem;
                                margin: 1.5rem 0;
                                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                            }
                        `,
                        setup: function(ed) {
                            editor = ed;
                        }
                    });
                };

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
                            el.className = "w-full rounded-lg";
                            break;
                        default:
                            return;
                    }
                    bodyView.appendChild(el);
                });

                // Ganti grid info dengan yang lebih estetis
                const infoGrid = document.querySelector('.grid.bg-gray-50');
                infoGrid.className = 'article-info-grid mb-6';
                
                const infoItems = infoGrid.querySelectorAll('div');
                infoItems.forEach(item => {
                    const label = item.querySelector('label');
                    const value = item.querySelector('div');
                    
                    if (label && value) {
                        label.className = 'article-info-label';
                        value.className = 'article-info-value';
                        
                        // Perbaiki tampilan status badge
                        if (value.id === 'article-status') {
                            value.className = `status-badge ${getStatusClass(value.textContent.trim().toLowerCase())}`;
                        }
                    }
                });

                function getStatusClass(status) {
                    const statusMap = {
                        'tayang': 'status-published',
                        'menunggu': 'status-pending',
                        'ditolak': 'status-rejected',
                        'draft': 'status-draft'
                    };
                    return statusMap[status] || 'status-draft';
                }

                const commentsData = [
                    { id: 101, user: "Pengguna Anonim", text: "Ini Karya ID 7", date: "2025-07-19T23:46:25Z" },
                    { id: 102, user: "Pengguna Lain", text: "Mantap konsepnya!", date: "2025-07-19T23:46:30Z" },
                    { id: 103, user: "Brian RB Keren", text: "Keren banget idenya, boleh tau gear kameranya?", date: "2025-07-20T08:12:10Z" },
                ];

                let currentPage = 1;
                const commentsPerPage = 4;
                const totalComments = commentsData.length;
                let totalPages = Math.ceil(totalComments / commentsPerPage);

                function renderComments(page) {
                    const start = (page - 1) * commentsPerPage;
                    const end = start + commentsPerPage;
                    const paginatedComments = commentsData.slice(start, end);

                    const commentList = document.getElementById('comment-list');
                    commentList.innerHTML = paginatedComments.map(comment => `
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-sm text-gray-900 font-medium">${comment.user}</td>
                            <td class="p-3 text-sm text-gray-600">${comment.text}</td>
                            <td class="p-3 text-sm text-gray-500">${fmtDateISOtoDisplay(comment.date)}</td>
                            <td class="p-3">
                                <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="deleteComment(${comment.id})" aria-label="Hapus Komentar"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    `).join('');
                    document.getElementById('comment-count').textContent = `${totalComments} Komentar`;
                    updatePagination();
                }

                function updatePagination() {
                    const pageNumbers = document.getElementById('page-numbers');
                    pageNumbers.innerHTML = '';
                    for (let i = 1; i <= totalPages; i++) {
                        pageNumbers.innerHTML += `
                            <button class="w-9 h-9 flex items-center justify-center rounded-md ${i === currentPage ? 'bg-yellow-400 text-gray-900' : 'bg-white border border-gray-300 text-gray-900 hover:bg-yellow-400 hover:text-gray-900'} text-sm" aria-label="Page ${i}" onclick="goToPage(${i})">${i}</button>
                        `;
                    }
                    document.getElementById('first-page-btn').disabled = currentPage === 1;
                    document.getElementById('prev-page-btn').disabled = currentPage === 1;
                    document.getElementById('next-page-btn').disabled = currentPage === totalPages;
                    document.getElementById('last-page-btn').disabled = currentPage === totalPages;
                    
                    // Tambahkan style untuk button disabled
                    const disabledButtons = document.querySelectorAll('button[disabled]');
                    disabledButtons.forEach(btn => {
                        btn.classList.add('opacity-50', 'cursor-not-allowed');
                    });
                }

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

                renderComments(currentPage);

                const viewMode = document.getElementById('view-mode');
                const editMode = document.getElementById('edit-mode');
                
                // Fungsi untuk mengonversi konten HTML ke format TinyMCE
                const convertToEditorContent = () => {
                    let htmlContent = '';
                    demoBody.forEach(block => {
                        switch (block.t) {
                            case "h2":
                                htmlContent += `<h2>${block.c}</h2>`;
                                break;
                            case "h3":
                                htmlContent += `<h3>${block.c}</h3>`;
                                break;
                            case "p":
                                htmlContent += `<p>${block.c}</p>`;
                                break;
                            case "blockquote":
                                htmlContent += `<blockquote>${block.c}</blockquote>`;
                                break;
                            case "code":
                                htmlContent += `<pre><code>${block.c}</code></pre>`;
                                break;
                            case "img":
                                htmlContent += `<img src="${block.src}" alt="${block.alt || ''}" style="max-width: 100%; border-radius: 0.5rem; margin: 1.5rem 0; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">`;
                                break;
                        }
                    });
                    return htmlContent;
                };

                document.getElementById('edit-btn').addEventListener('click', async () => {
                    viewMode.classList.add('hidden');
                    editMode.classList.remove('hidden');
                    
                    // Inisialisasi editor jika belum diinisialisasi
                    if (!editor) {
                        await initEditor();
                    }
                    
                    // Set konten editor
                    editor.setContent(convertToEditorContent());
                });
                
                document.getElementById('cancel-btn').addEventListener('click', () => {
                    editMode.classList.add('hidden');
                    viewMode.classList.remove('hidden');
                    
                    // Hapus editor untuk menghemat memori
                    if (editor) {
                        editor.remove();
                        editor = null;
                    }
                });
                
                document.getElementById('save-btn').addEventListener('click', () => {
                    // Dapatkan konten dari editor
                    const content = editor.getContent();
                    console.log('Saving article details with content:', content);
                    
                    // Di sini Anda akan mengirim data ke server
                    // ...
                    
                    editMode.classList.add('hidden');
                    viewMode.classList.remove('hidden');
                    
                    // Hapus editor
                    if (editor) {
                        editor.remove();
                        editor = null;
                    }
                });

                const statusSelect = document.getElementById('status-change');
                statusSelect.addEventListener('change', (e) => {
                    const statusText = {
                        published: 'Tayang',
                        pending: 'Menunggu',
                        rejected: 'Ditolak',
                        draft: 'Draft'
                    }[e.target.value];
                    
                    document.getElementById('article-status').textContent = statusText;
                    document.getElementById('article-status').className = `status-badge ${getStatusClass(e.target.value)}`;
                });

                function showDeleteModal() {
                    document.getElementById('deleteModal').classList.remove('hidden');
                }

                function closeDeleteModal() {
                    document.getElementById('deleteModal').classList.add('hidden');
                }

                document.getElementById('deleteModal').addEventListener('click', (e) => {
                    if (e.target === document.getElementById('deleteModal')) closeDeleteModal();
                });

                function deleteComment(id) {
                    console.log('Deleting comment:', id);
                }

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