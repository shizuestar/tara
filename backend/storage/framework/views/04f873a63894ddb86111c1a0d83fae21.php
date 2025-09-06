<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="bg-gray-50 min-h-screen p-6">
        <div class="max-w-7xl mx-auto bg-white rounded-xl shadow-lg p-6">
            <!-- Project Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 border-b border-gray-200 pb-4">
                <h1 class="text-2xl font-bold text-black flex items-center gap-3">
                    <i class="fas fa-project-diagram text-gray-600"></i>
                    Detail Proyek
                </h1>
                <div class="flex items-center gap-3">
                    <button id="edit-btn" class="join-btn bg-gray-100 hover:bg-gray-200 text-gray-800">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button id="delete-btn" class="join-btn bg-red-100 hover:bg-red-200 text-red-800" onclick="showDeleteModal()">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <select id="status-change" class="p-2 border border-gray-200 rounded-lg text-sm text-gray-800 focus:ring-2 focus:ring-gray-500">
                        <option value="inprogress">Berjalan</option>
                        <option value="completed">Selesai</option>
                        <option value="delayed">Tertunda</option>
                    </select>
                </div>
            </div>

            <!-- Project Thumbnail -->
            <div class="mb-6">
                <div class="w-full h-64 overflow-hidden rounded-md border border-gray-200">
                    <img src="https://picsum.photos/1200/400?project" alt="Project Image" class="w-full h-full object-cover rounded-md transition-transform duration-300 hover:scale-105">
                </div>
            </div>

            <!-- Project Details -->
            <div id="view-mode">
                <h2 id="project-title" class="text-xl font-bold text-black mb-4">Proyek Kreatif Anak Muda</h2>
                <div class="flex items-center gap-2 mb-4 flex-wrap">
                    <span class="badge bg-white border border-gray-200 text-gray-800">Kreativitas</span>
                    <span class="badge bg-yellow-400 text-white">Populer</span>
                    <span class="badge bg-white border border-gray-200 text-gray-800">Buka Kolaborasi</span>
                </div>
                <p class="text-sm text-gray-600 mb-2">Dibuat: 01 Agu 2025</p>
                <p id="project-description" class="text-sm text-gray-600 mb-2">Inisiatif untuk mendukung kreativitas anak muda Indonesia, terinspirasi dari event Karya Kreatif Indonesia 2025.</p>
                <p id="project-progress" class="text-sm text-gray-600 mb-4">Progress: 50% (Business matching Rp168,3 miliar tercapai)</p>
                <div class="progress-bar mb-4 bg-gray-200 h-2 rounded-full">
                    <div class="progress bg-yellow-400 h-2 rounded-full" style="width: 50%"></div>
                </div>

                <!-- Creator and Goals -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <div class="creator-card bg-white border border-gray-200 rounded-lg p-4">
                        <h2 class="text-lg font-bold text-black mb-3">Penanggung Jawab</h2>
                        <div class="flex items-center gap-4">
                            <img src="https://picsum.photos/100/100?person1" id="creator-avatar" alt="Pembuat" class="w-16 h-16 rounded-full border border-gray-200">
                            <div>
                                <h3 id="project-responsible" class="text-base font-semibold text-black">Tim Kreator</h3>
                                <p class="text-sm text-gray-600">Koordinator</p>
                            </div>
                        </div>
                    </div>
                    <div class="goals-card bg-white border border-gray-200 rounded-lg p-4">
                        <h2 class="text-lg font-bold text-black mb-3">Status</h2>
                        <div id="project-status" class="status-badge status-inprogress inline-block">Berjalan</div>
                    </div>
                </div>

                <!-- Team Members -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-black mb-4">Anggota Tim</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 members-container">
                        <div class="member-card bg-white border border-gray-200 rounded-lg p-4 text-center">
                            <img src="https://picsum.photos/100/100?person1" alt="Member" class="w-16 h-16 rounded-full mx-auto mb-2 border border-gray-200">
                            <h3 class="text-sm font-semibold text-black">Pengguna Anonim</h3>
                            <p class="text-sm text-gray-600">Desainer</p>
                        </div>
                        <div class="member-card bg-white border border-gray-200 rounded-lg p-4 text-center">
                            <img src="https://picsum.photos/100/100?person2" alt="Member" class="w-16 h-16 rounded-full mx-auto mb-2 border border-gray-200">
                            <h3 class="text-sm font-semibold text-black">Pengguna Lain</h3>
                            <p class="text-sm text-gray-600">Developer</p>
                        </div>
                        <div class="member-card bg-white border border-gray-200 rounded-lg p-4 text-center">
                            <img src="https://picsum.photos/100/100?person3" alt="Member" class="w-16 h-16 rounded-full mx-auto mb-2 border border-gray-200">
                            <h3 class="text-sm font-semibold text-black">Brian RB Keren</h3>
                            <p class="text-sm text-gray-600">Koordinator</p>
                        </div>
                    </div>
                </div>

                <!-- Project Timeline -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-black mb-4">Milestones</h2>
                    <div class="timeline">
                        <div class="timeline-event">
                            <p class="text-sm text-gray-600">01 Agu 2025</p>
                            <h3 class="text-base font-semibold text-black">Proyek Dimulai</h3>
                            <p class="text-sm text-gray-600">Tim awal dibentuk dan perencanaan dimulai.</p>
                        </div>
                        <div class="timeline-event">
                            <p class="text-sm text-gray-600">10 Agu 2025</p>
                            <h3 class="text-base font-semibold text-black">Pengembangan Konsep</h3>
                            <p class="text-sm text-gray-600">Konsep awal selesai 20%.</p>
                        </div>
                    </div>
                </div>

                <!-- Task Progress Tracker -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-black mb-4">Progres Tugas</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 tasks-container">
                        <div class="task-card bg-white border border-gray-200 rounded-lg p-4">
                            <h3 class="text-base font-semibold text-black">Pengembangan Konsep</h3>
                            <p class="text-sm text-gray-600 mt-1">Progress: 20%</p>
                            <div class="progress-bar mt-2 bg-gray-200 h-2 rounded-full">
                                <div class="progress bg-yellow-400 h-2 rounded-full" style="width: 20%"></div>
                            </div>
                        </div>
                        <div class="task-card bg-white border border-gray-200 rounded-lg p-4">
                            <h3 class="text-base font-semibold text-black">Desain Awal</h3>
                            <p class="text-sm text-gray-600 mt-1">Progress: 40%</p>
                            <div class="progress-bar mt-2 bg-gray-200 h-2 rounded-full">
                                <div class="progress bg-yellow-400 h-2 rounded-full" style="width: 40%"></div>
                            </div>
                        </div>
                        <div class="task-card bg-white border border-gray-200 rounded-lg p-4">
                            <h3 class="text-base font-semibold text-black">Pelaksanaan Event</h3>
                            <p class="text-sm text-gray-600 mt-1">Progress: 70%</p>
                            <div class="progress-bar mt-2 bg-gray-200 h-2 rounded-full">
                                <div class="progress bg-yellow-400 h-2 rounded-full" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Content -->
                <div class="mb-8 bg-white border border-gray-200 rounded-lg p-4">
                    <h2 class="text-xl font-bold text-black mb-4">Isi Proyek</h2>
                    <div id="project-body-view" class="text-sm text-gray-700 prose prose-sm max-w-none">
                        <p>Proyek ini terinspirasi dari Karya Kreatif Indonesia 2025, event yang mempromosikan UMKM dan kreativitas anak muda.</p>
                        <h3>Awal Perjalanan</h3>
                        <p>Dimulai pada Agustus 2025, proyek ini melibatkan talkshow, fashion show, dan kolaborasi UMKM.</p>
                        <blockquote>Jangan tunggu sempurna. Mulai aja dulu. – Naya, ilustrator</blockquote>
                        <img src="https://picsum.photos/seed/project1/1100/600" alt="Event KKI 2025" class="w-full rounded-lg mb-4">
                        <p>Prestasi seperti proyek Wrapioca dan PIVY menjadi inspirasi utama.</p>
                    </div>
                </div>
            </div>

            <!-- Edit Mode -->
            <div id="edit-mode" class="hidden">
                <div class="mb-4 bg-white border border-gray-200 rounded-lg p-4">
                    <label class="block text-sm font-medium text-gray-600">Judul</label>
                    <input id="edit-title" type="text" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-1" value="Proyek Kreatif Anak Muda" />
                </div>
                <div class="mb-4 bg-white border border-gray-200 rounded-lg p-4">
                    <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
                    <textarea id="edit-description" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-1" rows="3">Inisiatif untuk mendukung kreativitas anak muda Indonesia, terinspirasi dari event Karya Kreatif Indonesia 2025.</textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div class="bg-white border border-gray-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-600">Kategori</label>
                        <input id="edit-category" type="text" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-1" value="Kreativitas" />
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-600">Penanggung Jawab</label>
                        <input id="edit-responsible" type="text" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-1" value="Tim Kreator" />
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-600">Tanggal Mulai</label>
                        <input id="edit-start-date" type="date" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-1" value="2025-08-01" />
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-600">Status</label>
                        <select id="edit-status" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-1">
                            <option value="inprogress">Berjalan</option>
                            <option value="completed">Selesai</option>
                            <option value="delayed">Tertunda</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4 bg-white border border-gray-200 rounded-lg p-4">
                    <label class="block text-sm font-medium text-gray-600">Anggota Tim</label>
                    <ul id="edit-team-list" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-1 min-h-[100px] bg-white drag-list">
                        <li class="draggable p-2 bg-gray-100 mb-1 rounded transition-all duration-200" draggable="true">Pengguna Anonim - Desainer</li>
                        <li class="draggable p-2 bg-gray-100 mb-1 rounded transition-all duration-200" draggable="true">Pengguna Lain - Developer</li>
                        <li class="draggable p-2 bg-gray-100 mb-1 rounded transition-all duration-200" draggable="true">Brian RB Keren - Koordinator</li>
                    </ul>
                </div>
                <div class="mb-4 bg-white border border-gray-200 rounded-lg p-4">
                    <label class="block text-sm font-medium text-gray-600">Progress</label>
                    <input id="edit-progress" type="text" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-1" value="50% (Business matching Rp168,3 miliar tercapai)" />
                </div>
                <div class="mb-4 bg-white border border-gray-200 rounded-lg p-4">
                    <label class="block text-sm font-medium text-gray-600">Karya Terkait</label>
                    <ul id="edit-related-works-list" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-1 min-h-[100px] bg-white drag-list">
                        <li class="draggable p-2 bg-gray-100 mb-1 rounded transition-all duration-200" draggable="true">Desain Kreator Muda TARA</li>
                        <li class="draggable p-2 bg-gray-100 mb-1 rounded transition-all duration-200" draggable="true">Ilustrasi oleh Naya</li>
                        <li class="draggable p-2 bg-gray-100 mb-1 rounded transition-all duration-200" draggable="true">Proyek Wrapioca dari SMP Regina Pacis</li>
                        <li class="draggable p-2 bg-gray-100 mb-1 rounded transition-all duration-200" draggable="true">PIVY - Inovasi Payment & Wallet</li>
                    </ul>
                </div>
                <div class="mb-4 bg-white border border-gray-200 rounded-lg p-4">
                    <label class="block text-sm font-medium text-gray-600">Milestones</label>
                    <ul id="edit-milestones-list" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-1 min-h-[100px] bg-white drag-list">
                        <li class="draggable p-2 bg-gray-100 mb-1 rounded transition-all duration-200" draggable="true">Pengembangan Konsep - 20% (Selesai 10 Agu 2025)</li>
                        <li class="draggable p-2 bg-gray-100 mb-1 rounded transition-all duration-200" draggable="true">Desain Awal - 40% (Berjalan)</li>
                        <li class="draggable p-2 bg-gray-100 mb-1 rounded transition-all duration-200" draggable="true">Pelaksanaan Event - 70% (Menunggu)</li>
                        <li class="draggable p-2 bg-gray-100 mb-1 rounded transition-all duration-200" draggable="true">Evaluasi - 100% (Belum Dimulai)</li>
                    </ul>
                </div>
                <div class="mb-4 bg-white border border-gray-200 rounded-lg p-4">
                    <label class="block text-sm font-medium text-gray-600">Isi Proyek</label>
                    <div id="editor-container" class="border border-gray-300 rounded-md overflow-hidden mt-1">
                        <textarea id="edit-body" class="hidden"></textarea>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button id="save-btn" class="join-btn bg-green-100 hover:bg-green-200 text-green-800">Simpan</button>
                    <button id="cancel-btn" class="join-btn bg-gray-200 hover:bg-gray-300 text-gray-800">Batal</button>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
                <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-lg">
                    <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                        <h3 class="text-lg font-bold text-black">Hapus Proyek</h3>
                        <button class="text-xl text-gray-600 hover:text-gray-900 transition-colors duration-200" onclick="closeDeleteModal()">&times;</button>
                    </div>
                    <div class="mb-4 text-sm text-gray-600">
                        <p class="mb-2">Yakin ingin menghapus proyek <strong id="deleteProjectName">Proyek Kreatif Anak Muda</strong>?</p>
                        <p>Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button class="join-btn bg-gray-200 hover:bg-gray-300 text-gray-800" onclick="closeDeleteModal()">Batal</button>
                        <button class="join-btn bg-red-100 hover:bg-red-200 text-red-800">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('styles'); ?>
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
            background: #f8fafc;
            color: #1a202c;
        }
        .badge {
            padding: 0.3rem 0.8rem;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 6px;
            margin-right: 0.5rem;
            border: 1px solid #e5e7eb;
            background: #ffffff;
            color: #111;
        }
        .badge-populer {
            background: #f59e0b;
            color: #ffffff;
        }
        .progress-bar {
            height: 5px;
            background: #e5e7eb;
            border-radius: 2.5px;
            overflow: hidden;
        }
        .progress {
            height: 100%;
            background: #f59e0b;
            border-radius: 2.5px;
        }
        .member-card,
        .task-card,
        .creator-card,
        .goals-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 1.5rem;
        }
        .timeline-event {
            position: relative;
            padding-left: 2.5rem;
            margin-bottom: 2rem;
        }
        .timeline-event::before {
            content: '';
            position: absolute;
            left: 0.75rem;
            top: 0;
            width: 14px;
            height: 14px;
            background: #f59e0b;
            border-radius: 50%;
            border: 3px solid #ffffff;
        }
        .timeline-event::after {
            content: '';
            position: absolute;
            left: 0.95rem;
            top: 1.25rem;
            width: 2px;
            height: calc(100% - 1.25rem);
            background: #e5e7eb;
        }
        .join-btn {
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            background: #111;
            color: #ffffff;
            transition: transform 0.2s, background 0.3s;
        }
        .join-btn:hover {
            transform: scale(1.05);
            background: #333;
        }
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .status-inprogress {
            background-color: #f9fafb;
            color: #6b7280;
        }
        .status-completed {
            background-color: #f3f4f6;
            color: #4b5563;
        }
        .status-delayed {
            background-color: #f9fafb;
            color: #9ca3af;
        }
        .drag-list {
            min-height: 100px;
            background-color: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            padding: 0.5rem;
            transition: all 0.2s ease;
        }
        .draggable {
            cursor: move;
            background-color: #f9fafb;
            margin-bottom: 0.5rem;
            padding: 0.75rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease;
        }
        .draggable.drag-over {
            background-color: #e5e7eb;
        }
        .draggable.dragging {
            opacity: 0.5;
            transform: scale(0.98);
        }
        .tox-tinymce {
            border: 1px solid #e5e7eb !important;
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
            border-left: 4px solid #e5e7eb;
            padding: 1rem 1.5rem;
            background-color: #f9fafb;
            color: #6b7280;
            font-style: italic;
            margin: 1.5rem 0;
            border-radius: 0.375rem;
        }
        .prose img {
            max-width: 100%;
            border-radius: 0.5rem;
            margin: 1.5rem 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .prose img:hover {
            transform: scale(1.02);
        }
    </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
    <!-- Load TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/vcya58nqfw4vp8bbe79scjwpyqp4vlnlbzodc3utt7zjubiz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
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
                images_upload_url: '/upload/image',
                file_picker_types: 'image',
                content_style: `
                    body { font-family: 'Space Grotesk', sans-serif; font-size: 14px; line-height: 1.6; color: #374151; }
                    h3 { font-size: 1.125rem; font-weight: 600; color: #111827; margin-top: 1.25rem; margin-bottom: 0.5rem; }
                    p { color: #374151; margin-bottom: 1rem; line-height: 1.7; }
                    blockquote { border-left: 4px solid #e5e7eb; padding: 1rem 1.5rem; background-color: #f9fafb; color: #6b7280; font-style: italic; margin: 1.5rem 0; border-radius: 0.375rem; }
                    img { max-width: 100%; border-radius: 0.5rem; margin: 1.5rem 0; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease; }
                    img:hover { transform: scale(1.02); }
                `,
                setup: function(ed) {
                    editor = ed;
                }
            });
        };

        const demoBody = [
            { t: "p", c: "Proyek ini terinspirasi dari Karya Kreatif Indonesia 2025, event yang mempromosikan UMKM dan kreativitas anak muda." },
            { t: "h3", c: "Awal Perjalanan" },
            { t: "p", c: "Dimulai pada Agustus 2025, proyek ini melibatkan talkshow, fashion show, dan kolaborasi UMKM." },
            { t: "blockquote", c: "Jangan tunggu sempurna. Mulai aja dulu. – Naya, ilustrator" },
            { t: "img", src: "https://picsum.photos/seed/project1/1100/600", alt: "Event KKI 2025" },
        ];

        const bodyView = document.getElementById('project-body-view');
        demoBody.forEach(block => {
            let el;
            switch (block.t) {
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

        const viewMode = document.getElementById('view-mode');
        const editMode = document.getElementById('edit-mode');

        // Drag and Drop Functionality
        const dragLists = ['edit-team-list', 'edit-related-works-list', 'edit-milestones-list'];
        dragLists.forEach(listId => {
            const list = document.getElementById(listId);
            list.addEventListener('dragover', (e) => {
                e.preventDefault();
                list.classList.add('drag-over');
            });
            list.addEventListener('dragleave', () => list.classList.remove('drag-over'));
            list.addEventListener('drop', (e) => {
                e.preventDefault();
                const item = document.querySelector('.draggable.dragging');
                if (item) {
                    list.appendChild(item);
                    item.classList.remove('dragging');
                    list.classList.remove('drag-over');
                }
            });
        });

        document.querySelectorAll('.draggable').forEach(item => {
            item.addEventListener('dragstart', () => {
                item.classList.add('dragging');
                setTimeout(() => item.classList.add('hidden'), 0);
            });
            item.addEventListener('dragend', () => {
                item.classList.remove('dragging', 'hidden');
            });
            item.addEventListener('dragover', (e) => e.preventDefault());
            item.addEventListener('drop', (e) => {
                e.preventDefault();
                const dragged = document.querySelector('.draggable.dragging');
                if (dragged && dragged !== item) {
                    const items = Array.from(item.parentNode.children);
                    const draggedIndex = items.indexOf(dragged);
                    const targetIndex = items.indexOf(item);
                    if (draggedIndex < targetIndex) {
                        item.parentNode.insertBefore(dragged, item.nextSibling);
                    } else {
                        item.parentNode.insertBefore(dragged, item);
                    }
                    dragged.classList.remove('dragging', 'hidden');
                }
            });
        });

        const convertToEditorContent = () => {
            let htmlContent = '';
            demoBody.forEach(block => {
                switch (block.t) {
                    case "h3":
                        htmlContent += `<h3>${block.c}</h3>`;
                        break;
                    case "p":
                        htmlContent += `<p>${block.c}</p>`;
                        break;
                    case "blockquote":
                        htmlContent += `<blockquote>${block.c}</blockquote>`;
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
            if (!editor) {
                await initEditor();
            }
            editor.setContent(convertToEditorContent());
        });

        document.getElementById('cancel-btn').addEventListener('click', () => {
            editMode.classList.add('hidden');
            viewMode.classList.remove('hidden');
            if (editor) {
                editor.remove();
                editor = null;
            }
        });

        document.getElementById('save-btn').addEventListener('click', () => {
            const title = document.getElementById('edit-title').value;
            const description = document.getElementById('edit-description').value;
            const category = document.getElementById('edit-category').value;
            const responsible = document.getElementById('edit-responsible').value;
            const startDate = document.getElementById('edit-start-date').value;
            const statusValue = document.getElementById('edit-status').value;
            const statusText = { inprogress: 'Berjalan', completed: 'Selesai', delayed: 'Tertunda' }[statusValue];
            const team = Array.from(document.getElementById('edit-team-list').children).map(li => li.textContent);
            const progress = document.getElementById('edit-progress').value;
            const relatedWorks = Array.from(document.getElementById('edit-related-works-list').children).map(li => li.textContent);
            const milestones = Array.from(document.getElementById('edit-milestones-list').children).map(li => li.textContent);
            const content = editor.getContent();

            document.getElementById('project-title').textContent = title;
            document.getElementById('project-description').textContent = description;
            document.getElementById('project-category').textContent = category;
            document.getElementById('project-responsible').textContent = responsible;
            document.getElementById('project-start-date').textContent = new Date(startDate).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
            document.getElementById('project-status').textContent = statusText;
            document.getElementById('project-status').className = `status-badge ${statusValue === 'inprogress' ? 'status-inprogress' : statusValue === 'completed' ? 'status-completed' : 'status-delayed'}`;
            document.getElementById('project-progress').textContent = `Progress: ${progress}`;
            document.getElementById('team-list').innerHTML = team.map(member => `<li draggable="true">${member}</li>`).join('');
            document.getElementById('related-works-list').innerHTML = relatedWorks.map(work => `<li draggable="true">${work}</li>`).join('');
            document.getElementById('milestones-list').innerHTML = milestones.map(milestone => `<li>${milestone}</li>`).join('');
            document.getElementById('project-body-view').innerHTML = content;

            editMode.classList.add('hidden');
            viewMode.classList.remove('hidden');
            if (editor) {
                editor.remove();
                editor = null;
            }
        });

        const statusSelect = document.getElementById('status-change');
        statusSelect.addEventListener('change', (e) => {
            const statusText = { inprogress: 'Berjalan', completed: 'Selesai', delayed: 'Tertunda' }[e.target.value];
            const statusClass = { inprogress: 'status-inprogress', completed: 'status-completed', delayed: 'status-delayed' }[e.target.value];
            document.getElementById('project-status').textContent = statusText;
            document.getElementById('project-status').className = `status-badge ${statusClass}`;
            document.getElementById('project-progress').textContent = `Progress: ${statusText === 'Berjalan' ? '50%' : statusText === 'Selesai' ? '100%' : '0%'} Selesai`;
        });

        function showDeleteModal() {
            document.getElementById('deleteProjectName').textContent = document.getElementById('project-title').textContent;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        document.getElementById('deleteModal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('deleteModal')) closeDeleteModal();
        });
    </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\lomba\tara\backend\resources\views/administrator/admin/proyek/show.blade.php ENDPATH**/ ?>