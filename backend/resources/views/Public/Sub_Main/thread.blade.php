<x-layout>
    <section class="pt-24 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div
                id="notification-bar"
                class="notification-bar"
                onclick="dismissNotification()"
            >
                <p class="text-sm text-gray-600">
                    Selamat datang, Tuan! Nikmati detail aktivitas komunitas.
                </p>
            </div>
            <div class="mb-8 flex items-center gap-3">
                <a
                    href="/komunitas.html"
                    class="px-5 py-2 text-sm text-black border border-gray-200 rounded-full"
                    style="font-family: 'Space Grotesk', sans-serif"
                >
                    ← Komunitas
                </a>
                <a
                    id="community-link"
                    href=""
                    class="px-5 py-2 text-sm text-gray-700 border border-gray-200 rounded-full"
                    style="font-family: 'Space Grotesk', sans-serif"
                >
                    Kembali ke Komunitas
                </a>
            </div>
            <div id="thread-detail" class="thread-container">
                <div class="thread-header">
                    <h1 id="thread-title"></h1>
                    <div class="post-menu">
                        <i
                            class="fas fa-ellipsis-h post-menu-btn"
                            onclick="togglePostMenu(event, 'thread')"
                        ></i>
                        <div class="post-menu-content" id="post-menu-thread">
                            <div class="post-menu-item" onclick="sharePost()">
                                Bagikan
                            </div>
                            <div class="post-menu-item" onclick="savePost()">
                                Simpan
                            </div>
                            <div
                                class="post-menu-item danger"
                                onclick="reportPost()"
                            >
                                Laporkan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="thread-meta">
                    <span id="thread-author"></span>
                    <span id="thread-time"></span>
                    <span id="thread-community"></span>
                </div>
                <div class="thread-content" id="thread-content"></div>
                <div id="thread-attachments" class="attachment-container"></div>
                <div class="thread-footer">
                    <div class="vote-container">
                        <i
                            class="fas fa-arrow-up vote-btn"
                            onclick="votePost(event, 'thread', 1)"
                        ></i>
                        <span id="thread-votes" class="text-sm text-gray-500"
                            >0</span
                        >
                        <i
                            class="fas fa-arrow-down vote-btn"
                            onclick="votePost(event, 'thread', -1)"
                        ></i>
                    </div>
                    <div class="flex items-center gap-4">
                        <span
                            id="thread-replies"
                            class="text-xs text-gray-500"
                        ></span>
                        <span
                            id="thread-last-activity"
                            class="text-xs text-gray-500"
                        ></span>
                    </div>
                </div>
            </div>
            <div class="comment-form-container mt-3">
                <h3 class="font-semibold text-black mb-4">Tulis Komentar</h3>
                <form class="comment-form" onsubmit="postComment(event)">
                    <textarea
                        placeholder="Tulis komentar Tuan..."
                        required
                        class="mb-4"
                    ></textarea>
                    <button type="submit">Kirim Komentar</button>
                </form>
            </div>
            <div id="comments-section" class="space-y-4"></div>
        </div>
    </section>

    @push('styles')
    <style>
        body {
            font-family: "Space Grotesk", sans-serif;
            background: #ffffff;
            color: #111;
            box-sizing: border-box;
        }

        *,
        *::before,
        *::after {
            box-sizing: inherit;
        }

        .thread-container,
        .comment-container {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .thread-header,
        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .thread-header h1,
        .comment-header h3 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #111;
            margin: 0;
            flex: 1;
        }

        .comment-header h3 {
            font-size: 1.25rem;
        }

        .thread-meta,
        .comment-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            font-size: 0.875rem;
            color: #6b7280;
        }

        .thread-content,
        .comment-content {
            font-size: 1rem;
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 1.5rem;
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
        }

        .attachment-container a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
        }

        .thread-footer,
        .comment-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }

        .vote-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .vote-btn {
            cursor: pointer;
            font-size: 1rem;
            color: #6b7280;
        }

        .post-menu {
            position: relative;
        }

        .post-menu-btn {
            cursor: pointer;
            font-size: 1rem;
            color: #6b7280;
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
        }

        .post-menu-item.danger {
            color: #dc2626;
        }

        .notification-bar {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            cursor: pointer;
        }

        .comment-form-container {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 1.5rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .comment-form textarea {
            width: 100%;
            min-height: 100px;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            color: #4b5563;
            resize: vertical;
            background: #f9fafb;
        }

        .comment-form textarea:focus {
            outline: none;
            border-color: #f59e0b;
        }

        .comment-form button {
            background: #111;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .thread-container,
            .comment-container {
                padding: 1.5rem;
            }

            .thread-header h1,
            .comment-header h3 {
                font-size: 1.5rem;
            }

            .thread-footer,
            .comment-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .comment-form-container {
                padding: 1rem;
            }
        }
    </style>
    @endpush @push('scripts')
    <script>
        const communityPosts = [
            {
                id: 1,
                communityId: 1,
                title: "Puisi Senja",
                content:
                    "SeIbuah puisi tentang keindahan senja di ufuk barat, menggambarkan perasaan damai dan nostalgia.",
                time: "2 jam lalu",
                votes: 42,
                pinned: true,
                attachments: [
                    {
                        type: "image",
                        url: "https://picsum.photos/100/100?poetry",
                    },
                ],
                replies: 15,
                lastActivity: new Date().toISOString(),
                author: "Rudi Santoso",
            },
            {
                id: 999,
                communityId: 999,
                title: "Selamat Datang!",
                content:
                    "Selamat datang di komunitas ini! Mulai diskusi Anda di sini.",
                time: "Baru saja",
                votes: 0,
                pinned: false,
                attachments: [],
                replies: 0,
                lastActivity: new Date().toISOString(),
                author: "Admin Tara",
            },
        ];
        const communities = [
            {
                id: 1,
                name: "Komunitas Puisi",
                category: "Puisi",
                description:
                    "Berbagi kata, menenun makna dalam puisi. Bergabunglah untuk mengeksplorasi keindahan bahasa dan emosi.",
                members: 1200,
                image: "https://picsum.photos/600/400?poetry",
                badge: "populer",
                joined: true,
                createdDate: "Januari 2023",
                creator: "Rudi Santoso",
                onlineMembers: 50,
            },
            {
                id: 999,
                name: "Komunitas Umum",
                category: "Umum",
                description:
                    "Tempat untuk berbagai diskusi kreatif dan kolaborasi lintas kategori.",
                members: 100,
                image: "https://picsum.photos/600/400?general",
                badge: null,
                joined: false,
                createdDate: "Oktober 2024",
                creator: "Admin Tara",
                onlineMembers: 10,
            },
        ];
        const comments = [
            {
                id: 1,
                threadId: 1,
                author: "Siti Nurhaliza",
                content:
                    "Puisi ini benar-benar menyentuh! Mengingatkan saya pada senja di kampung halaman.",
                time: "1 jam lalu",
                votes: 10,
                attachments: [],
            },
            {
                id: 2,
                threadId: 1,
                author: "Budi Hartono",
                content:
                    "Bagus sekali! Apakah ada rencana untuk membuat antologi puisi?",
                time: "30 menit lalu",
                votes: 5,
                attachments: [],
            },
            {
                id: 999,
                threadId: 999,
                author: "Guest User",
                content: "Ayo kita mulai diskusi yang menarik di sini!",
                time: "5 menit lalu",
                votes: 0,
                attachments: [],
            },
        ];
        function getThreadParams() {
            const params = new URLSearchParams(window.location.search);
            const threadId = parseInt(params.get("thread")) || 999;
            const communityId = parseInt(params.get("community")) || 999;
            return { threadId, communityId };
        }
        function renderThreadDetails() {
            const { threadId, communityId } = getThreadParams();
            const thread =
                communityPosts.find((p) => p.id === threadId) ||
                communityPosts.find((p) => p.id === 999);
            const community =
                communities.find((c) => c.id === communityId) ||
                communities.find((c) => c.id === 999);
            document.getElementById("thread-title").textContent = thread.title;
            document.getElementById(
                "thread-author"
            ).innerHTML = `Diposting oleh <a href="sudah_login/profil_user.html" class="text-blue-600">${thread.author}</a>`;
            document.getElementById("thread-time").textContent = thread.time;
            document.getElementById(
                "thread-community"
            ).innerHTML = `<a href="/forum.html?community=${community.id}" class="text-blue-600">${community.name}</a>`;
            document.getElementById("thread-content").textContent =
                thread.content;
            document.getElementById("thread-votes").textContent = thread.votes;
            document.getElementById(
                "thread-replies"
            ).innerHTML = `<i class="fas fa-comment mr-1"></i>${thread.replies} Balasan`;
            document.getElementById(
                "thread-last-activity"
            ).textContent = `Aktivitas Terakhir: ${thread.time}`;
            document.getElementById(
                "community-link"
            ).href = `/detail_komunitas.html?community=${community.id}`;
            const attachmentsContainer =
                document.getElementById("thread-attachments");
            attachmentsContainer.innerHTML = thread.attachments
                .map((att) =>
                    att.type === "image"
                        ? `<img src="${att.url}" alt="Lampiran" />`
                        : `<a href="${att.url}" target="_blank">${att.text}</a>`
                )
                .join("");
            if (thread.pinned) {
                document.getElementById("thread-title").innerHTML += `
                  <i class="fas fa-thumbtack text-yellow-400 ml-2" title="Postingan Disematkan"></i>
                `;
            }
            renderComments();
        }
        function renderComments() {
            const { threadId } = getThreadParams();
            const threadComments = comments.filter(
                (c) => c.threadId === threadId
            );
            const commentsContainer =
                document.getElementById("comments-section");
            commentsContainer.innerHTML = threadComments
                .map(
                    (comment) => `
                <div class="comment-container">
                  <div class="comment-header">
                    <h3>${comment.author}</h3>
                    <div class="post-menu">
                      <i class="fas fa-ellipsis-h post-menu-btn" onclick="togglePostMenu(event, 'comment-${
                          comment.id
                      }')"></i>
                      <div class="post-menu-content" id="post-menu-comment-${
                          comment.id
                      }">
                        <div class="post-menu-item" onclick="shareComment(${
                            comment.id
                        })">Bagikan</div>
                        <div class="post-menu-item" onclick="saveComment(${
                            comment.id
                        })">Simpan</div>
                        <div class="post-menu-item danger" onclick="reportComment(${
                            comment.id
                        })">Laporkan</div>
                      </div>
                    </div>
                  </div>
                  <div class="comment-meta">
                    <span>${comment.time}</span>
                  </div>
                  <div class="comment-content">${comment.content}</div>
                  <div class="attachment-container">
                    ${comment.attachments
                        .map((att) =>
                            att.type === "image"
                                ? `<img src="${att.url}" alt="Lampiran" />`
                                : `<a href="${att.url}" target="_blank">${att.text}</a>`
                        )
                        .join("")}
                  </div>
                  <div class="comment-footer">
                    <div class="vote-container">
                      <i class="fas fa-arrow-up vote-btn" onclick="voteComment(event, ${
                          comment.id
                      }, 1)"></i>
                      <span class="text-sm text-gray-500">${
                          comment.votes
                      }</span>
                      <i class="fas fa-arrow-down vote-btn" onclick="voteComment(event, ${
                          comment.id
                      }, -1)"></i>
                    </div>
                  </div>
                </div>
              `
                )
                .join("");
        }
        function togglePostMenu(event, id) {
            event.preventDefault();
            const menu = document.getElementById(`post-menu-${id}`);
            const isOpen = menu.classList.contains("open");
            document
                .querySelectorAll(".post-menu-content.open")
                .forEach((m) => m.classList.remove("open"));
            if (!isOpen) {
                menu.classList.add("open");
            }
        }
        function sharePost() {
            const { threadId, communityId } = getThreadParams();
            const url = `/forum.html?community=${communityId}&thread=${threadId}`;
            navigator.clipboard.writeText(window.location.origin + url);
            const notificationBar = document.getElementById("notification-bar");
            notificationBar.querySelector("p").textContent =
                "Link aktivitas telah disalin, Tuan!";
            notificationBar.classList.remove("hidden");
        }
        function savePost() {
            const { threadId } = getThreadParams();
            const notificationBar = document.getElementById("notification-bar");
            notificationBar.querySelector(
                "p"
            ).textContent = `Aktivitas ${threadId} telah disimpan, Tuan!`;
            notificationBar.classList.remove("hidden");
        }
        function reportPost() {
            const { threadId } = getThreadParams();
            const notificationBar = document.getElementById("notification-bar");
            notificationBar.querySelector(
                "p"
            ).textContent = `Aktivitas ${threadId} telah dilaporkan, Tuan.`;
            notificationBar.classList.remove("hidden");
        }
        function votePost(event, id, value) {
            event.preventDefault();
            const { threadId } = getThreadParams();
            const post = communityPosts.find((p) => p.id === threadId);
            post.votes += value;
            post.lastActivity = new Date().toISOString();
            renderThreadDetails();
            const notificationBar = document.getElementById("notification-bar");
            notificationBar.querySelector(
                "p"
            ).textContent = `Suara Tuan telah diberikan!`;
            notificationBar.classList.remove("hidden");
        }
        function postComment(event) {
            event.preventDefault();
            const { threadId } = getThreadParams();
            const textarea = event.target.querySelector("textarea");
            const content = textarea.value.trim();
            if (!content) return;
            const newComment = {
                id: comments.length + 1,
                threadId: threadId,
                author: "Tuan Pengguna",
                content: content,
                time: "Baru saja",
                votes: 0,
                attachments: [],
            };
            comments.push(newComment);
            const post = communityPosts.find((p) => p.id === threadId);
            post.replies += 1;
            post.lastActivity = new Date().toISOString();
            textarea.value = "";
            renderThreadDetails();
            const notificationBar = document.getElementById("notification-bar");
            notificationBar.querySelector("p").textContent =
                "Komentar Tuan telah diposting!";
            notificationBar.classList.remove("hidden");
        }
        function shareComment(commentId) {
            const { threadId, communityId } = getThreadParams();
            const url = `/forum.html?community=${communityId}&thread=${threadId}#comment-${commentId}`;
            navigator.clipboard.writeText(window.location.origin + url);
            const notificationBar = document.getElementById("notification-bar");
            notificationBar.querySelector("p").textContent =
                "Link komentar telah disalin, Tuan!";
            notificationBar.classList.remove("hidden");
        }
        function saveComment(commentId) {
            const notificationBar = document.getElementById("notification-bar");
            notificationBar.querySelector(
                "p"
            ).textContent = `Komentar ${commentId} telah disimpan, Tuan!`;
            notificationBar.classList.remove("hidden");
        }
        function reportComment(commentId) {
            const notificationBar = document.getElementById("notification-bar");
            notificationBar.querySelector(
                "p"
            ).textContent = `Komentar ${commentId} telah dilaporkan, Tuan.`;
            notificationBar.classList.remove("hidden");
        }
        function voteComment(event, commentId, value) {
            event.preventDefault();
            const comment = comments.find((c) => c.id === commentId);
            comment.votes += value;
            renderComments();
            const notificationBar = document.getElementById("notification-bar");
            notificationBar.querySelector(
                "p"
            ).textContent = `Suara Tuan telah diberikan untuk komentar!`;
            notificationBar.classList.remove("hidden");
        }
        function dismissNotification() {
            const notificationBar = document.getElementById("notification-bar");
            notificationBar.classList.add("hidden");
            notificationBar.querySelector("p").textContent =
                "Selamat datang, Tuan! Nikmati detail aktivitas komunitas.";
        }
        document.addEventListener("click", (event) => {
            if (!event.target.closest(".post-menu")) {
                document
                    .querySelectorAll(".post-menu-content.open")
                    .forEach((m) => m.classList.remove("open"));
            }
        });
        document.getElementById("notification-bar").classList.remove("hidden");
        renderThreadDetails();
    </script>
    @endpush
</x-layout>
