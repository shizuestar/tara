```blade
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
    <?php $__env->startPush('styles'); ?>
        <style>
            body {
                font-family: "Space Grotesk", sans-serif;
                background: #ffffff;
                color: #111827;
                box-sizing: border-box;
            }

            *,
            *::before,
            *::after {
                box-sizing: inherit;
            }

            .community-banner {
                width: 100%;
                height: 300px;
                object-fit: cover;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            }

            .post-card {
                background: linear-gradient(145deg, #ffffff, #f9fafb);
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                padding: 1.5rem;
                position: relative;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .post-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            }

            .post-card-header {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 1rem;
            }

            .post-card-header h3 {
                font-size: 1.25rem;
                font-weight: 600;
                color: #111827;
                margin: 0;
                flex: 1;
                transition: color 0.2s ease;
            }

            .post-card-header h3:hover {
                color: #374151;
            }

            .post-card-meta {
                display: flex;
                flex-wrap: wrap;
                gap: 0.75rem;
                font-size: 0.875rem;
                color: #6b7280;
            }

            .post-card-content {
                font-size: 1rem;
                color: #4b5563;
                line-height: 1.5;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .post-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 1rem;
                padding-top: 1rem;
                border-top: 1px solid #e5e7eb;
            }

            .vote-container {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .attachment-container {
                display: flex;
                flex-wrap: wrap;
                gap: 0.75rem;
                margin-top: 1rem;
            }

            .attachment-container img {
                max-width: 120px;
                height: auto;
                border-radius: 8px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                transition: transform 0.2s ease;
            }

            .attachment-container img:hover {
                transform: scale(1.05);
            }

            .attachment-container a {
                color: #374151;
                text-decoration: none;
                font-weight: 500;
                padding: 0.25rem 0.5rem;
                border-radius: 4px;
                transition: background 0.2s ease;
            }

            .attachment-container a:hover {
                background: #e6f0ff;
            }

            .recommended-community {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                padding: 0.5rem 0;
            }

            .recommended-community img {
                width: 80px;
                height: 80px;
                object-fit: cover;
                border-radius: 8px;
            }

            .badge {
                display: inline-flex;
                align-items: center;
                padding: 0.25rem 0.75rem;
                font-size: 0.75rem;
                font-weight: 500;
                border-radius: 9999px;
                margin-left: 0.5rem;
            }

            .badge-populer {
                background: linear-gradient(90deg, #facc15, #fde68a);
                color: #111827;
            }

            .badge-baru {
                background: linear-gradient(90deg, #d1fae5, #a7f3d0);
                color: #065f46;
            }

            .badge-moderator {
                background: linear-gradient(90deg, #3b82f6, #60a5fa);
                color: #ffffff;
            }

            .notification-badge {
                position: absolute;
                top: -8px;
                right: -8px;
                background: #facc15;
                color: #111827;
                font-size: 0.75rem;
                font-weight: 500;
                border-radius: 9999px;
                padding: 0.1rem 0.5rem;
            }

            .join-btn {
                padding: 0.5rem 1.5rem;
                border-radius: 9999px;
                font-size: 0.875rem;
                font-weight: 500;
                background: linear-gradient(90deg, #111827, #374151);
                color: #ffffff;
            }

            .sidebar {
                background: #f9fafb;
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                padding: 2rem;
            }

            .sidebar a {
                display: block;
                padding: 0.5rem 0;
                color: #374151;
                font-weight: 500;
            }

            .notification-bar {
                background: linear-gradient(145deg, #f3f4f6, #e5e7eb);
                border: 1px solid #d1d5db;
                border-radius: 8px;
                padding: 1rem;
                margin-bottom: 1.5rem;
                cursor: pointer;
            }

            .notification-modal {
                position: fixed;
                top: 0;
                right: 0;
                height: 100%;
                width: 100%;
                max-width: 400px;
                background: #ffffff;
                border-left: 1px solid #e5e7eb;
                z-index: 50;
                transform: translateX(100%);
                transition: transform 0.3s ease;
            }

            .notification-modal.open {
                transform: translateX(0);
            }

            .notification-modal .close-btn {
                position: absolute;
                top: 1rem;
                right: 1rem;
                font-size: 1.5rem;
                color: #374151;
                cursor: pointer;
            }

            .notification-card {
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 1rem;
                margin-bottom: 1rem;
                cursor: pointer;
            }

            .notification-card.unread {
                background: linear-gradient(145deg, #f3f4f6, #e5e7eb);
            }

            .notification-card p {
                font-size: 0.9rem;
                color: #4b5563;
            }

            .notification-card .time {
                font-size: 0.75rem;
                color: #6b7280;
            }

            .filter-btn {
                padding: 0.5rem 1rem;
                border-radius: 9999px;
                font-size: 0.8rem;
                font-weight: 500;
                border: 1px solid #e5e7eb;
                background: #f3f4f6;
                color: #374151;
                transition: all 0.3s ease;
            }

            .filter-btn.active {
                background: linear-gradient(90deg, #111827, #374151);
                color: #ffffff;
                border-color: #facc15;
            }

            .vote-btn {
                cursor: pointer;
                font-size: 1rem;
                transition: color 0.2s ease;
            }

            .vote-btn:hover {
                color: #374151;
            }

            .event-item {
                padding: 0.5rem;
                border-radius: 8px;
                cursor: pointer;
            }

            .community-section {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
            }

            .highlight-post {
                border-left: 4px solid #facc15;
                background: linear-gradient(145deg, #f3f4f6, #f3f4f6);
            }

            .moderator-modal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 60;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease, visibility 0.3s ease;
            }

            .moderator-modal.open {
                opacity: 1;
                visibility: visible;
            }

            .moderator-modal-content {
                background: #ffffff;
                border-radius: 12px;
                padding: 2rem;
                max-width: 500px;
                width: 90%;
                max-height: 80vh;
                overflow-y: auto;
                position: relative;
            }

            .moderator-modal-content .close-btn {
                position: absolute;
                top: 1rem;
                right: 1rem;
                font-size: 1.5rem;
                color: #374151;
                cursor: pointer;
            }

            .show-more-btn {
                color: #2563eb;
                font-size: 0.9rem;
                cursor: pointer;
                margin-top: 0.5rem;
                display: inline-block;
            }

            .moderator-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .moderator-item {
                display: flex;
                align-items: center;
                gap: 1rem;
                padding: 0.75rem;
                border-bottom: 1px solid #e5e7eb;
                transition: background 0.2s ease;
            }

            .moderator-item:last-child {
                border-bottom: none;
            }

            .moderator-item:hover {
                background: #f9fafb;
            }

            .moderator-icon {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: #e5e7eb;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #374151;
                font-size: 1.25rem;
            }

            .moderator-name {
                flex: 1;
                font-size: 1rem;
                font-weight: 500;
                color: #111827;
            }

            .pagination {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 0.5rem;
                margin-top: 1.5rem;
            }

            .pagination-btn {
                padding: 0.5rem 1rem;
                border-radius: 9999px;
                font-size: 0.875rem;
                font-weight: 500;
                border: 1px solid #e5e7eb;
                background: #f3f4f6;
                color: #374151;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .pagination-btn.active {
                background: linear-gradient(90deg, #111827, #374151);
                color: #ffffff;
                border-color: #facc15;
            }

            .pagination-btn:disabled {
                opacity: 0.5;
                cursor: not-allowed;
            }

            .post-menu {
                position: relative;
            }

            .post-menu-btn {
                cursor: pointer;
                font-size: 1rem;
                color: #6b7280;
                transition: color 0.2s ease;
            }

            .post-menu-btn:hover {
                color: #374151;
            }

            .post-menu-content {
                position: absolute;
                top: 100%;
                right: 0;
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                min-width: 150px;
                z-index: 10;
                display: none;
            }

            .post-menu-content.open {
                display: block;
            }

            .post-menu-item {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
                color: #374151;
                cursor: pointer;
                transition: background 0.2s ease;
            }

            .post-menu-item:hover {
                background: #f9fafb;
            }

            .post-menu-item.danger {
                color: #dc2626;
            }

            .admin-btn {
                padding: 0.5rem 1rem;
                border-radius: 9999px;
                font-size: 0.875rem;
                font-weight: 500;
                border: 1px solid #e5e7eb;
                background: #dc2626;
                color: #ffffff;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .admin-btn:hover {
                background: #b91c1c;
            }

            .edit-form {
                display: none;
                margin-top: 1rem;
            }

            .edit-form.active {
                display: block;
            }

            @media (min-width: 768px) {
                .community-section {
                    flex-direction: row;
                    align-items: flex-start;
                }
            }

            @media (max-width: 768px) {
                .notification-modal {
                    width: 100%;
                    max-width: 100%;
                }

                .sidebar {
                    padding: 1.5rem;
                }

                .post-footer {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 0.5rem;
                }

                .moderator-item {
                    padding: 0.5rem;
                }

                .moderator-icon {
                    width: 32px;
                    height: 32px;
                    font-size: 1rem;
                }

                .pagination {
                    flex-wrap: wrap;
                }
            }
        </style>
    <?php $__env->stopPush(); ?>

    <!-- Moderator Modal -->
    <div id="moderator-modal" class="moderator-modal">
        <div class="moderator-modal-content">
            <i class="fas fa-times close-btn" onclick="toggleModeratorModal()"></i>
            <h2 class="text-2xl font-bold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                Manage Moderators
            </h2>
            <div class="mb-4">
                <input type="text" id="add-moderator" placeholder="Enter user email..." class="w-full border border-gray-300 rounded-md p-2" />
                <button onclick="addModerator()" class="mt-2 px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-yellow-400 hover:text-black transition">
                    Add Moderator
                </button>
            </div>
            <ul id="moderator-list" class="moderator-list"></ul>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="notification-modal" class="notification-modal">
        <i class="fas fa-times close-btn" onclick="toggleNotifications()"></i>
        <div class="p-6">
            <h2 class="text-2xl font-bold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                Notifications
            </h2>
            <div class="flex gap-2 mb-4">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="unread">Unread</button>
            </div>
            <button id="mark-all-read" class="px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-yellow-400 hover:text-black transition mb-4">
                Mark All as Read
            </button>
            <div id="notification-list" class="space-y-4"></div>
        </div>
    </div>

    <!-- Community Detail Section -->
    <section class="relative pt-24 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Notification Bar -->
            <div id="notification-bar" class="notification-bar" onclick="dismissNotification()">
                <p class="text-sm text-gray-700">
                    Welcome to the admin panel! Manage your community settings.
                </p>
            </div>

            <!-- Main Content and Sidebar -->
            <div class="forum-section flex gap-6">
                <!-- Main Content -->
                <div class="flex-1">
                    <div class="mb-8 flex items-center gap-3">
                        <a href="#" 
                            class="relative inline-block px-5 py-2 text-sm text-black border border-black rounded-full overflow-hidden group"
                            style="font-family: 'Space Grotesk', sans-serif;">
                            <span class="absolute inset-0 bg-black transition-all duration-300 ease-in-out group-hover:translate-y-0 translate-y-full rounded-full"></span>
                            <span class="relative z-10 group-hover:text-white transition-colors duration-300">
                                ← Back to Communities
                            </span>
                        </a>
                    </div>

                    <div class="forum-header">
                        <div class="flex items-center gap-2 mb-4">
                            <h1 id="community-name" class="text-3xl font-bold text-black" style="font-family: 'Space Grotesk', sans-serif">
                                Sample Community
                            </h1>
                            <span id="community-badge" class="badge badge-populer">Populer</span>
                        </div>
                        <p id="community-description" class="text-lg text-gray-600 mb-4">A vibrant community for enthusiasts to connect and share ideas.</p>
                        <div class="flex items-center gap-4">
                            <button onclick="toggleEditForm()" class="relative inline-block px-5 py-2 text-sm text-white bg-blue-600 border border-blue-600 rounded-full overflow-hidden group">
                                <span class="absolute inset-0 bg-blue-800 transition-all duration-300 ease-in-out group-hover:translate-y-0 translate-y-full rounded-full"></span>
                                <span class="relative z-10 group-hover:text-white transition-colors duration-300">
                                    Edit Community
                                </span>
                            </button>
                            <button onclick="deleteCommunity()" class="admin-btn">
                                Delete Community
                            </button>
                        </div>
                        <!-- Edit Community Form -->
                        <div id="edit-community-form" class="edit-form">
                            <h2 class="text-xl font-bold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                                Edit Community Details
                            </h2>
                            <input type="text" id="edit-community-name" value="Sample Community" placeholder="Community Name..." class="mb-4 w-full border border-gray-300 rounded-md p-2" />
                            <textarea id="edit-community-description" placeholder="Community Description..." class="mb-4 w-full border border-gray-300 rounded-md p-2">A vibrant community for enthusiasts to connect and share ideas.</textarea>
                            <input type="text" id="edit-community-category" value="General" placeholder="Category..." class="mb-4 w-full border border-gray-300 rounded-md p-2" />
                            <select id="edit-community-badge" class="mb-4 w-full border border-gray-300 rounded-md p-2">
                                <option value="">Select Badge</option>
                                <option value="populer" selected>Populer</option>
                                <option value="baru">Baru</option>
                            </select>
                            <div class="flex justify-end mt-3">
                                <button onclick="saveCommunityChanges()" class="px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-yellow-400 hover:text-black transition">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Join Requests -->
                    <div class="mt-8">
                        <h2 class="text-xl font-bold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                            Join Requests
                        </h2>
                        <div id="join-requests" class="space-y-4">
                            <div class="post-card">
                                <div class="post-card-header">
                                    <h3>User One</h3>
                                    <p class="text-sm text-gray-500">user1@example.com</p>
                                </div>
                                <div class="flex gap-2">
                                    <button onclick="approveJoinRequest(1)" class="px-4 py-2 bg-green-600 text-white text-sm rounded-full hover:bg-green-700 transition">
                                        Approve
                                    </button>
                                    <button onclick="denyJoinRequest(1)" class="px-4 py-2 bg-red-600 text-white text-sm rounded-full hover:bg-red-700 transition">
                                        Deny
                                    </button>
                                </div>
                            </div>
                            <div class="post-card">
                                <div class="post-card-header">
                                    <h3>User Two</h3>
                                    <p class="text-sm text-gray-500">user2@example.com</p>
                                </div>
                                <div class="flex gap-2">
                                    <button onclick="approveJoinRequest(2)" class="px-4 py-2 bg-green-600 text-white text-sm rounded-full hover:bg-green-700 transition">
                                        Approve
                                    </button>
                                    <button onclick="denyJoinRequest(2)" class="px-4 py-2 bg-red-600 text-white text-sm rounded-full hover:bg-red-700 transition">
                                        Deny
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Threads -->
                    <div id="forum-threads" class="space-y-6 mt-8">
                        <div class="post-card">
                            <div class="post-card-header">
                                <h3>First Post Title</h3>
                                <div class="post-menu">
                                    <i class="fas fa-ellipsis-v post-menu-btn" onclick="togglePostMenu(1)"></i>
                                    <div id="post-menu-1" class="post-menu-content">
                                        <div class="post-menu-item danger" onclick="deletePost(1)">Delete Post</div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-card-content">This is a sample post content that discusses community topics.</div>
                        </div>
                        <div class="post-card">
                            <div class="post-card-header">
                                <h3>Second Post Title</h3>
                                <div class="post-menu">
                                    <i class="fas fa-ellipsis-v post-menu-btn" onclick="togglePostMenu(2)"></i>
                                    <div id="post-menu-2" class="post-menu-content">
                                        <div class="post-menu-item danger" onclick="deletePost(2)">Delete Post</div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-card-content">Another example of a community discussion post.</div>
                        </div>
                    </div>
                    <div id="pagination" class="pagination">
                        <button class="pagination-btn active">1</button>
                        <button class="pagination-btn">2</button>
                        <button class="pagination-btn">3</button>
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="sidebar md:w-80">
                    <p id="sidebar-community-name" class="text-base font-semibold text-gray-700">Sample Community</p>
                    <p id="sidebar-community-category" class="text-sm text-gray-500"><i class="fas fa-tag mr-1"></i>Kategori: General</p>
                    <p id="sidebar-community-description" class="text-sm text-gray-500">A vibrant community for enthusiasts to connect and share ideas.</p>
                    <p id="sidebar-community-creator" class="text-sm text-gray-500"><i class="fas fa-user mr-1"></i>Pembuat: Admin User</p>
                    <p id="sidebar-community-created" class="text-sm text-gray-500"><i class="fas fa-calendar-alt mr-1"></i>Dibuat: 2023-01-01</p>
                    <p id="sidebar-community-discussions" class="text-sm text-gray-500"><i class="fas fa-comment-alt mr-1"></i>Total Diskusi: 2</p>
                    <p id="sidebar-community-moderators" class="text-sm text-gray-500"><i class="fas fa-user-shield mr-1"></i>Moderator: Moderator One <span class="badge badge-moderator">Moderator</span></p>
                    <p id="sidebar-community-members" class="text-sm text-gray-500"><i class="fas fa-user-friends mr-1"></i>100 Anggota</p>
                    <p id="sidebar-community-online" class="text-sm text-gray-500"><i class="fas fa-circle text-green-500 mr-1 text-xs"></i>10 Online</p>
                    <span id="show-more-moderators" class="show-more-btn">Show More</span>
                    <div id="sidebar-community-events" class="space-y-4 mb-6">
                        <div class="event-item" onclick="viewEvent(1)">
                            <p class="text-sm font-medium text-gray-700">Community Meetup</p>
                            <p class="text-xs text-gray-500">2023-10-10 • Online</p>
                        </div>
                        <div class="event-item" onclick="viewEvent(2)">
                            <p class="text-sm font-medium text-gray-700">Q&A Session</p>
                            <p class="text-xs text-gray-500">2023-11-15 • In-Person</p>
                        </div>
                    </div>
                    <div id="recommended-communities" class="space-y-4">
                        <div class="recommended-community">
                            <img src="https://via.placeholder.com/80" alt="Tech Enthusiasts" />
                            <div>
                                <p class="text-sm font-medium text-gray-700">Tech Enthusiasts</p>
                                <p class="text-xs text-gray-500">50 Anggota</p>
                            </div>
                        </div>
                        <div class="recommended-community">
                            <img src="https://via.placeholder.com/80" alt="Creative Hub" />
                            <div>
                                <p class="text-sm font-medium text-gray-700">Creative Hub</p>
                                <p class="text-xs text-gray-500">30 Anggota</p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script>
            // Mock data for dummy display
            const community = {
                id: 1,
                name: "Sample Community",
                description: "A vibrant community for enthusiasts to connect and share ideas.",
                category: "General",
                badge: "populer",
                creator: { name: "Admin User" },
                created_at: "2023-01-01",
                members_count: 100,
                online_members_count: 10,
                moderators: [
                    { id: 1, name: "Moderator One", is_moderator: true },
                    { id: 2, name: "Moderator Two", is_moderator: true }
                ],
                join_requests: [
                    { id: 1, user: { name: "User One", email: "user1@example.com" } },
                    { id: 2, user: { name: "User Two", email: "user2@example.com" } }
                ]
            };
            const communityPosts = [
                { id: 1, title: "First Post Title", content: "This is a sample post content that discusses community topics." },
                { id: 2, title: "Second Post Title", content: "Another example of a community discussion post." }
            ];
            const communityEvents = [
                { id: 1, name: "Community Meetup", date: "2023-10-10", type: "Online" },
                { id: 2, name: "Q&A Session", date: "2023-11-15", type: "In-Person" }
            ];
            const notifications = [
                { id: 1, message: "New join request received.", created_at: "2023-10-01T10:00:00Z", read: false },
                { id: 2, message: "New post added.", created_at: "2023-10-02T12:00:00Z", read: true }
            ];
            const recommended = [
                { id: 2, name: "Tech Enthusiasts", image: "https://via.placeholder.com/80", members_count: 50 },
                { id: 3, name: "Creative Hub", image: "https://via.placeholder.com/80", members_count: 30 }
            ];

            // Pagination Settings
            const POSTS_PER_PAGE = 5;
            let currentPage = 1;

            // Get Community ID
            function getCommunityId() {
                return community.id;
            }

            // Render Community Details
            function renderCommunityDetails() {
                document.getElementById("community-name").textContent = community.name;
                document.getElementById("community-badge").className = community.badge ? `badge badge-${community.badge}` : "";
                document.getElementById("community-badge").textContent = community.badge ? community.badge.charAt(0).toUpperCase() + community.badge.slice(1) : "";
                document.getElementById("community-description").textContent = community.description;
                document.getElementById("edit-community-name").value = community.name;
                document.getElementById("edit-community-description").value = community.description;
                document.getElementById("edit-community-category").value = community.category;
                document.getElementById("edit-community-badge").value = community.badge || "";
            }

            // Render Sidebar Community Details
            function renderSidebarDetails() {
                const posts = communityPosts || [];
                document.getElementById("sidebar-community-name").textContent = community.name;
                document.getElementById("sidebar-community-category").innerHTML = `<i class="fas fa-tag mr-1"></i>Kategori: ${community.category}`;
                document.getElementById("sidebar-community-description").textContent = community.description;
                document.getElementById("sidebar-community-creator").innerHTML = `<i class="fas fa-user mr-1"></i>Pembuat: ${community.creator.name}`;
                document.getElementById("sidebar-community-created").innerHTML = `<i class="fas fa-calendar-alt mr-1"></i>Dibuat: ${new Date(community.created_at).toLocaleDateString()}`;
                document.getElementById("sidebar-community-discussions").innerHTML = `<i class="fas fa-comment-alt mr-1"></i>Total Diskusi: ${posts.length}`;
                const moderators = community.moderators.slice(0, 1);
                document.getElementById("sidebar-community-moderators").innerHTML = `<i class="fas fa-user-shield mr-1"></i>Moderator: ${moderators.map(m => `${m.name} <span class="badge badge-moderator">Moderator</span>`).join(", ")}`;
                document.getElementById("sidebar-community-members").innerHTML = `<i class="fas fa-user-friends mr-1"></i>${community.members_count} Anggota`;
                document.getElementById("sidebar-community-online").innerHTML = `<i class="fas fa-circle text-green-500 mr-1 text-xs"></i>${community.online_members_count || 0} Online`;

                const showMoreBtn = document.getElementById("show-more-moderators");
                if (community.moderators.length > 1) {
                    showMoreBtn.classList.remove("hidden");
                    showMoreBtn.onclick = toggleModeratorModal;
                } else {
                    showMoreBtn.classList.add("hidden");
                }

                const eventsContainer = document.getElementById("sidebar-community-events");
                eventsContainer.innerHTML = communityEvents.map(e => `
                    <div class="event-item" onclick="viewEvent(${e.id})">
                        <p class="text-sm font-medium text-gray-700">${e.name}</p>
                        <p class="text-xs text-gray-500">${e.date} • ${e.type}</p>
                    </div>
                `).join("");

                const recommendedContainer = document.getElementById("recommended-communities");
                recommendedContainer.innerHTML = recommended.map(r => `
                    <div class="recommended-community">
                        <img src="${r.image}" alt="${r.name}" />
                        <div>
                            <p class="text-sm font-medium text-gray-700">${r.name}</p>
                            <p class="text-xs text-gray-500">${r.members_count} Anggota</p>
                        </div>
                    </div>
                `).join("");
            }

            // Render Moderator Modal
            function renderModeratorModal() {
                const moderatorList = document.getElementById("moderator-list");
                moderatorList.innerHTML = community.moderators.map(m => `
                    <li class="moderator-item">
                        <div class="moderator-icon"><i class="fas fa-user"></i></div>
                        <span class="moderator-name">${m.name}</span>
                        ${m.is_moderator ? '<span class="badge badge-moderator">Moderator</span>' : ""}
                        <button onclick="removeModerator(${m.id})" class="admin-btn">Remove</button>
                    </li>
                `).join("");

                gsap.from(".moderator-item", {
                    opacity: 0,
                    y: 20,
                    duration: 0.5,
                    stagger: 0.1,
                    ease: "power3.out",
                });
            }

            // Render Join Requests
            function renderJoinRequests() {
                document.getElementById("join-requests").innerHTML = community.join_requests.map(r => `
                    <div class="post-card">
                        <div class="post-card-header">
                            <h3>${r.user.name}</h3>
                            <p class="text-sm text-gray-500">${r.user.email}</p>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="approveJoinRequest(${r.id})" class="px-4 py-2 bg-green-600 text-white text-sm rounded-full hover:bg-green-700 transition">
                                Approve
                            </button>
                            <button onclick="denyJoinRequest(${r.id})" class="px-4 py-2 bg-red-600 text-white text-sm rounded-full hover:bg-red-700 transition">
                                Deny
                            </button>
                        </div>
                    </div>
                `).join("");
            }

            // Render Threads
            function renderThreads() {
                document.getElementById("forum-threads").innerHTML = communityPosts.map(p => `
                    <div class="post-card">
                        <div class="post-card-header">
                            <h3>${p.title}</h3>
                            <div class="post-menu">
                                <i class="fas fa-ellipsis-v post-menu-btn" onclick="togglePostMenu(${p.id})"></i>
                                <div id="post-menu-${p.id}" class="post-menu-content">
                                    <div class="post-menu-item danger" onclick="deletePost(${p.id})">Delete Post</div>
                                </div>
                            </div>
                        </div>
                        <div class="post-card-content">${p.content.substring(0, 150)}</div>
                    </div>
                `).join("");
            }

            // Toggle Edit Form
            function toggleEditForm() {
                const form = document.getElementById("edit-community-form");
                form.classList.toggle("active");
            }

            // Save Community Changes
            function saveCommunityChanges() {
                community.name = document.getElementById("edit-community-name").value;
                community.description = document.getElementById("edit-community-description").value;
                community.category = document.getElementById("edit-community-category").value;
                community.badge = document.getElementById("edit-community-badge").value;
                renderCommunityDetails();
                renderSidebarDetails();
                toggleEditForm();
                alert("Community updated successfully! (Dummy action)");
            }

            // Delete Community
            function deleteCommunity() {
                if (confirm("Are you sure you want to delete this community?")) {
                    alert("Community deleted successfully! (Dummy action)");
                    window.location.href = "#";
                }
            }

            // Add Moderator
            function addModerator() {
                const email = document.getElementById("add-moderator").value;
                if (email) {
                    community.moderators.push({ id: community.moderators.length + 1, name: email.split("@")[0], is_moderator: true });
                    renderModeratorModal();
                    renderSidebarDetails();
                    document.getElementById("add-moderator").value = "";
                    alert("Moderator added successfully! (Dummy action)");
                }
            }

            // Remove Moderator
            function removeModerator(moderatorId) {
                if (confirm("Remove this moderator?")) {
                    community.moderators = community.moderators.filter(m => m.id !== moderatorId);
                    renderModeratorModal();
                    renderSidebarDetails();
                    alert("Moderator removed successfully! (Dummy action)");
                }
            }

            // Approve Join Request
            function approveJoinRequest(requestId) {
                community.join_requests = community.join_requests.filter(r => r.id !== requestId);
                community.members_count += 1;
                renderJoinRequests();
                renderSidebarDetails();
                alert("Join request approved! (Dummy action)");
            }

            // Deny Join Request
            function denyJoinRequest(requestId) {
                community.join_requests = community.join_requests.filter(r => r.id !== requestId);
                renderJoinRequests();
                alert("Join request denied! (Dummy action)");
            }

            // Delete Post
            function deletePost(postId) {
                if (confirm("Delete this post?")) {
                    communityPosts.splice(communityPosts.findIndex(p => p.id === postId), 1);
                    renderThreads();
                    renderSidebarDetails();
                    alert("Post deleted successfully! (Dummy action)");
                }
            }

            // Toggle Post Menu
            function togglePostMenu(postId) {
                const menu = document.getElementById(`post-menu-${postId}`);
                menu.classList.toggle("open");
            }

            // Toggle Moderator Modal
            function toggleModeratorModal() {
                const modal = document.getElementById("moderator-modal");
                modal.classList.toggle("open");
                if (modal.classList.contains("open")) {
                    renderModeratorModal();
                }
            }

            // Toggle Notifications
            function toggleNotifications() {
                const modal = document.getElementById("notification-modal");
                modal.classList.toggle("open");
                if (modal.classList.contains("open")) {
                    const notificationList = document.getElementById("notification-list");
                    notificationList.innerHTML = notifications.map(n => `
                        <div class="notification-card ${n.read ? '' : 'unread'}">
                            <p>${n.message}</p>
                            <p class="time">${new Date(n.created_at).toLocaleString()}</p>
                        </div>
                    `).join("");
                }
            }

            // Dismiss Notification
            function dismissNotification() {
                document.getElementById("notification-bar").classList.add("hidden");
            }

            // View Event
            function viewEvent(id) {
                console.log("Viewing event:", id);
                alert(`Viewing event with ID: ${id} (Dummy action)`);
            }

            // Initial Render
            document.addEventListener("DOMContentLoaded", () => {
                renderCommunityDetails();
                renderSidebarDetails();
                renderModeratorModal();
                renderJoinRequests();
                renderThreads();

                // Handle notification filters
                document.querySelectorAll(".filter-btn").forEach(btn => {
                    btn.addEventListener("click", () => {
                        document.querySelectorAll(".filter-btn").forEach(b => b.classList.remove("active"));
                        btn.classList.add("active");
                        const filter = btn.dataset.filter;
                        const notificationList = document.getElementById("notification-list");
                        notificationList.innerHTML = notifications
                            .filter(n => filter === "all" || (filter === "unread" && !n.read))
                            .map(n => `
                                <div class="notification-card ${n.read ? '' : 'unread'}">
                                    <p>${n.message}</p>
                                    <p class="time">${new Date(n.created_at).toLocaleString()}</p>
                                </div>
                            `).join("");
                    });
                });

                // Mark all notifications as read
                document.getElementById("mark-all-read").addEventListener("click", () => {
                    notifications.forEach(n => n.read = true);
                    toggleNotifications();
                    alert("All notifications marked as read! (Dummy action)");
                });
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
<?php endif; ?>
```<?php /**PATH C:\xampp\htdocs\lomba\tara\backend\resources\views/administrator/admin/komunitas/show.blade.php ENDPATH**/ ?>