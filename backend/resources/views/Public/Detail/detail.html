<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Detail Karya - TARA (Fixed)</title>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<!-- Particles.js -->
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<style>
  @font-face {
    font-family: "Vantage";
    src: url("./assets/fonts/VantageRegular-L3xY5.ttf") format("truetype");
  }
  .font-vantage { font-family: "Vantage", sans-serif; letter-spacing: .05em; }

  #particles-js-detail { position: fixed; inset:0; width:100%; height:100%; z-index:-1; }

  /* Scrollbar komentar */
  .custom-scrollbar::-webkit-scrollbar { width:6px; }
  .custom-scrollbar::-webkit-scrollbar-track { background:transparent; }
  .custom-scrollbar::-webkit-scrollbar-thumb { background:rgba(120,120,120,.35); border-radius:4px; }
  .custom-scrollbar::-webkit-scrollbar-thumb:hover { background:rgba(120,120,120,.55); }
  .custom-scrollbar { scrollbar-width:thin; scrollbar-color:rgba(120,120,120,.4) transparent; }

  /* Kolom komentar fixed (desktop) */
  #commentSection {
    position: fixed;
    top:0; right:0; bottom:0;
    width:360px;
    display:flex;
    flex-direction:column;
    background:rgba(255,255,255,.85);
    backdrop-filter:blur(6px);
    padding:1.25rem 1.25rem 0.75rem;
    border-left:1px solid #e5e7eb;
    z-index:80;
    overflow:hidden;
  }

  /* Floating action bar (like/share) di kanan konten */
  #floatingActions {
    position:absolute;
    top:1rem;
    right:-4rem;
    display:flex;
    flex-direction:column;
    gap:1rem;
    z-index:20;
  }
  @media (max-width: 640px) {
    #floatingActions { position:static; flex-direction:row; justify-content:flex-start; margin-top:1rem; right:auto; }
  }

  /* Close button offset karena panel fixed */
  #closeButton { right:380px; }

  /* Responsive panel komentar */
  @media (max-width: 1023px) {
    #commentSection {
      position:static;
      width:100%;
      height:auto;
      max-height:none;
      border-left:none;
      border-top:1px solid #e5e7eb;
      margin-top:2rem;
      backdrop-filter:none;
      background:rgba(255,255,255,.95);
    }
    #closeButton { right:1rem; }
    #contentWrapper { padding-right:0 !important; }
  }

  #ui-overlay { position:fixed; inset:0; z-index:2147483647; pointer-events:none; }
  #ui-overlay a { pointer-events:auto; }

  /* Comment menu PORTAL */
  #commentMenuPortal {
    position:fixed;
    z-index:9999;
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:8px;
    box-shadow:0 4px 16px rgba(0,0,0,.12);
    padding:4px 0;
    width:160px;
    display:none;
  }
  #commentMenuPortal.open { display:block; }
  #commentMenuPortal button {
    display:block;
    width:100%;
    padding:8px 12px;
    text-align:left;
    font-size:14px;
    line-height:1.2;
    background:transparent;
    border:none;
    cursor:pointer;
  }
  #commentMenuPortal button:hover { background:#f3f4f6; }
  #commentMenuPortal button.menu-report { color:#dc2626; }
  #commentMenuPortal.mobile {
    width:100%;
    left:0 !important;
    right:0 !important;
    bottom:0 !important;
    top:auto !important;
    border-radius:16px 16px 0 0;
    box-shadow:0 -4px 20px rgba(0,0,0,.25);
  }

  /* Placeholder komentar dibisukan */
  .muted-placeholder {
    cursor:pointer;
    font-style:italic;
    color:#9ca3af;
    text-align:left;
    width:100%;
  }
  .muted-placeholder:hover { text-decoration:underline; color:#6b7280; }

  /* Thread container */
  .comment-thread { margin-top:1rem; }
  .comment-children {
    margin-left:1.5rem; /* indent */
    border-left:2px solid #e5e7eb;
    padding-left:1rem;
    margin-top:1rem;
  }
  .comment-item + .comment-item { margin-top:0.75rem; }
  .toggle-replies-btn {
    font-size:0.8rem;
    color:#3b82f6;
    cursor:pointer;
    margin-top:0.5rem;
    display:block;
    text-align:left;
  }
  .toggle-replies-btn:hover { text-decoration:underline; }

  /* Gaya untuk konten yang direkomendasikan */
  .recommended-grid {
    display:grid;
    grid-template-columns:repeat(auto-fill, minmax(200px, 1fr));
    gap:1.5rem;
  }
  .recommended-item {
    background-color:#ffffff;
    border-radius:0.75rem;
    box-shadow:0 4px 6px rgba(0, 0, 0, 0.1);
    overflow:hidden;
    transition:transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
  }
  .recommended-item:hover {
    transform:translateY(-5px);
    box-shadow:0 10px 15px rgba(0, 0, 0, 0.15);
  }
  .recommended-item img {
    width:100%; height:150px; object-fit:cover;
  }
  .recommended-item-info { padding:1rem; }
  .recommended-item-info h3 {
    font-weight:600; font-size:1rem; margin-bottom:0.5rem; color:#374151; text-overflow:ellipsis; white-space:nowrap; overflow:hidden;
  }
  .recommended-item-info p { font-size:0.875rem; color:#6b7280; }
</style>
</head>
<body class="bg-white text-black font-vantage tracking-wide min-h-screen relative overflow-x-hidden">
<div id="particles-js-detail"></div>

<div id="ui-overlay">
  <a href="index.html" id="closeButton" class="fixed top-4 p-3 bg-white/80 backdrop-blur-md rounded-full shadow-lg hover:bg-white hover:scale-110 active:scale-95 transition-all duration-300 border border-gray-200" aria-label="Tutup detail & kembali">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
  </a>
</div>

<div id="contentWrapper" class="max-w-5xl mx-auto px-6 md:px-10 pt-8 pb-16 lg:pr-[380px]">
  <div class="flex items-center justify-between mb-5 opacity-0" id="uploaderBar">
    <div class="flex items-center gap-3">
      <img id="uploaderAvatar" src="https://i.pravatar.cc/60?img=8" alt="Avatar" class="w-12 h-12 rounded-full border border-gray-300 shadow-sm object-cover">
      <div>
        <button type="button" id="uploaderNameBtn" class="font-semibold text-gray-800 hover:underline text-left" data-user="Nama Uploader">
          <span id="uploaderName">Nama Uploader</span>
        </button>
        <p id="uploadTime" class="text-xs text-gray-500">Baru saja</p>
      </div>
    </div>
    <button id="followBtn" class="px-4 py-1.5 text-sm bg-blue-600 text-white rounded-full hover:bg-blue-700 active:scale-[.96] transition font-medium">Follow</button>
  </div>

  <div id="detailContent" class="opacity-0 relative">
    <div class="relative mb-4">
      <img id="detailImage" src="" alt="Detail Karya" class="w-full h-[430px] md:h-[500px] object-cover rounded-xl shadow-lg transform scale-95 opacity-0 select-none" draggable="false" />

      <div id="floatingActions" class="opacity-0">
        <button id="shareButton" class="p-3 rounded-full bg-gray-100 hover:bg-gray-200 transition shadow-sm active:scale-95" aria-haspopup="dialog" aria-controls="shareModal" aria-label="Bagikan karya">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342A3 3 0 119 12c0 .482-.114.938-.316 1.342m0 0l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684z"/></svg>
        </button>
        <button id="likeButton" class="p-3 rounded-full bg-gray-100 hover:bg-gray-200 transition relative shadow-sm active:scale-95" aria-label="Suka karya ini">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
          <span id="likeCount" class="absolute -top-1 -right-1 text-xs bg-red-500 text-white rounded-full px-1 leading-none py-[2px]">0</span>
        </button>
      </div>
    </div>

    <h1 id="detailTitle" class="text-xl md:text-2xl font-bold uppercase tracking-wide mb-3 opacity-0"></h1>
    <p id="detailDescription" class="text-gray-700 mb-8 leading-relaxed opacity-0">Deskripsi karya.</p>

    <div id="recommendedContent" class="mt-12 opacity-0">
      <h2 class="text-xl md:text-2xl font-bold uppercase tracking-wide mb-6">Karya Rekomendasi Lainnya</h2>
      <div id="recommendedGrid" class="recommended-grid"></div>
    </div>
  </div>
</div>

<aside id="commentSection" class="opacity-0 translate-x-10" aria-label="Komentar">
  <div class="flex items-center justify-between mb-4">
    <h2 class="text-lg font-bold text-gray-800">Komentar</h2>
    <span id="totalComments" class="text-xs text-gray-500"></span>
  </div>

  <div id="commentsList" class="flex-1 overflow-y-auto custom-scrollbar pr-1 mb-4" style="max-height: calc(100vh - 190px);">
    <!-- Thread rendered here -->
  </div>

  <form id="commentForm" class="pt-3 border-t border-gray-200" autocomplete="off">
    <input type="hidden" id="replyToId" value="">
    <textarea id="commentInput" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm" rows="3" maxlength="300" placeholder="Tambahkan komentar... (Maks 300 karakter)"></textarea>
    <div class="flex items-center justify-between mt-2">
      <span id="charCount" class="text-[11px] text-gray-400 select-none">0/300</span>
      <div class="space-x-2">
        <button id="cancelReplyButton" type="button" class="hidden px-3 py-2 text-sm rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 active:scale-95">Batal Balas</button>
        <button id="postCommentButton" type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 disabled:opacity-40 disabled:cursor-not-allowed transition active:scale-95">Kirim</button>
      </div>
    </div>
  </form>
</aside>

<div id="commentMenuPortal" role="menu" aria-hidden="true">
  <button type="button" class="menu-report">Laporkan</button>
  <button type="button" class="menu-mute">Bisukan</button>
  <button type="button" class="menu-reply">Balas</button>
</div>

<!-- Share Modal -->
<div id="shareModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-[120]" role="dialog" aria-modal="true" aria-labelledby="shareModalTitle">
  <div class="bg-white rounded-lg p-6 w-80 shadow-xl relative">
    <button id="closeModal" type="button" class="absolute top-2 right-2 text-gray-500 hover:text-black text-lg leading-none" aria-label="Tutup">✖</button>
    <h3 id="shareModalTitle" class="text-xl font-bold mb-4">Bagikan Karya</h3>
    <div class="space-y-3">
      <a id="shareWA" href="#" class="block bg-green-500 text-white py-2 rounded text-center hover:bg-green-600">WhatsApp</a>
      <a id="shareFB" href="#" class="block bg-blue-600 text-white py-2 rounded text-center hover:bg-blue-700">Facebook</a>
      <a id="shareTW" href="#" class="block bg-sky-400 text-white py-2 rounded text-center hover:bg-sky-500">Twitter</a>
      <button id="copyLink" class="block w-full bg-gray-600 text-white py-2 rounded hover:bg-gray-700">Salin Link</button>
    </div>
  </div>
</div>

<script>
/*************************************************
 * UTIL: SAFE LOCALSTORAGE PARSE / STRINGIFY
 *************************************************/
function lsGet(key, fallback) {
  try { const v = localStorage.getItem(key); return v ? JSON.parse(v) : fallback; } catch { return fallback; }
}
function lsSet(key, val) {
  try { localStorage.setItem(key, JSON.stringify(val)); } catch {/* ignore */}
}

/*************************************************
 * MAIN APP
 *************************************************/
document.addEventListener('DOMContentLoaded', () => {
  /* --------- ELEMENTS --------- */
  const params = new URLSearchParams(window.location.search);
  const id = params.get('id') || 'default';

  const detailTitle = document.getElementById('detailTitle');
  const detailImage = document.getElementById('detailImage');
  const detailDescription = document.getElementById('detailDescription');
  const uploaderNameEl = document.getElementById('uploaderName');
  const uploaderNameBtn = document.getElementById('uploaderNameBtn');
  const uploadTime = document.getElementById('uploadTime');

  const likeButton = document.getElementById('likeButton');
  const likeCount = document.getElementById('likeCount');
  const shareButton = document.getElementById('shareButton');
  const shareModal = document.getElementById('shareModal');
  const closeModal = document.getElementById('closeModal');
  const copyLink = document.getElementById('copyLink');

  const floatingActions = document.getElementById('floatingActions');

  const commentSection = document.getElementById('commentSection');
  const commentsList = document.getElementById('commentsList');
  const commentForm = document.getElementById('commentForm');
  const commentInput = document.getElementById('commentInput');
  const postCommentBtn = document.getElementById('postCommentButton');
  const cancelReplyBtn = document.getElementById('cancelReplyButton');
  const charCount = document.getElementById('charCount');
  const totalComments = document.getElementById('totalComments');
  const replyToIdInput = document.getElementById('replyToId');

  const commentMenuPortal = document.getElementById('commentMenuPortal');

  const recommendedContent = document.getElementById('recommendedContent');
  const recommendedGrid = document.getElementById('recommendedGrid');

  /* --------- STATE --------- */
  // Flat array of comments; hierarchical rendering done at runtime.
  // {id, parentId|null, author, text, likes, muted, timestamp}
  let comments = loadComments();

  // Track expanded comment IDs (those whose children are visible)
  const expanded = new Set();

  // ID comment yang sedang dibalas (null jika tidak)
  let replyToParentId = null;

  /* --------- POPULATE KONTEN DETAIL --------- */
  detailTitle.textContent = id === 'default' ? 'Karya Tanpa ID' : `Karya #${id}`;
  detailImage.src = `https://picsum.photos/1200/800?random=${id}`;
  detailDescription.textContent = `Ini adalah detail dari Karya #${id}. Sebuah representasi unik dari kreativitas dan inovasi yang dapat kamu kembangkan lagi.`;
  const uploaderName = 'Uploader Contoh';
  uploaderNameEl.textContent = uploaderName;
  uploaderNameBtn.dataset.user = uploaderName;
  uploadTime.textContent = 'Diposting hari ini';

  uploaderNameBtn.addEventListener('click', () => {
    const user = uploaderNameBtn.dataset.user || uploaderName;
    window.location.href = `profil_user.html?username=${encodeURIComponent(user)}`;
  });

  /* --------- LIKE KARYA --------- */
  let currentLikes = parseInt(localStorage.getItem(`likes_work_${id}`) || '0', 10);
  likeCount.textContent = currentLikes;
  likeButton.addEventListener('click', () => {
    currentLikes++;
    likeCount.textContent = currentLikes;
    localStorage.setItem(`likes_work_${id}`, currentLikes);
    gsap.from(likeButton, { scale: 0.78, duration: 0.22, ease: 'power2.out' });
  });

  /*************************************************
   * COMMENT STORAGE
   *************************************************/
  function loadComments() {
    const raw = lsGet(`comments_work_${id}`, []);
    // Normalize objects & ensure required fields exist
    return raw.map(c => ({
      id: c.id || crypto.randomUUID(),
      parentId: c.parentId || null,
      author: c.author || 'Pengguna Anonim',
      text: c.text || '',
      likes: typeof c.likes === 'number' ? c.likes : 0,
      muted: !!c.muted,
      timestamp: c.timestamp || new Date().toISOString()
    }));
  }
  function saveComments() { lsSet(`comments_work_${id}`, comments); }

  /*************************************************
   * COMMENT RENDERING (RECURSIVE)
   *************************************************/
  // Build lookup map parentId -> [children]
  function buildChildrenMap() {
    const map = new Map();
    for (const c of comments) {
      const p = c.parentId || null;
      if (!map.has(p)) map.set(p, []);
      map.get(p).push(c);
    }
    // sort each bucket: likes desc then timestamp asc
    for (const arr of map.values()) {
      arr.sort((a,b)=>{
        if (a.parentId === null && b.parentId === null) {
          // top-level sort by likes desc then ts asc
          if (b.likes !== a.likes) return b.likes - a.likes;
          return new Date(a.timestamp) - new Date(b.timestamp);
        } else {
          // replies: timestamp asc
          return new Date(a.timestamp) - new Date(b.timestamp);
        }
      });
    }
    return map;
  }

  function escapeHTML(str) {
    return str.replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;','\'':'&#39;'}[m]));
  }

  function createCommentElement(c, depth) {
    const item = document.createElement('div');
    item.className = 'comment-item bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200 relative';
    item.dataset.id = c.id;
    item.dataset.author = c.author;
    item.dataset.depth = depth;

    if (c.muted) {
      item.innerHTML = `\n        <button type="button" class="muted-placeholder text-sm">Komentar disembunyikan (klik untuk tampilkan)</button>\n      `;
      return item;
    }

    const ts = new Date(c.timestamp).toLocaleString('id-ID');
    item.innerHTML = `
      <button type="button" class="comment-author font-semibold text-gray-800 mb-1 break-words hover:underline text-left" data-user="${escapeHTML(c.author)}">${escapeHTML(c.author)}</button>
      <p class="text-gray-700 text-sm whitespace-pre-line break-words mt-1">${escapeHTML(c.text)}</p>
      <div class="mt-3 flex items-center justify-between text-xs text-gray-500">
        <span>${ts}</span>
        <div class="flex items-center gap-2">
          <button type="button" class="like-comment flex items-center gap-1 px-2 py-1 rounded-md bg-white border border-gray-200 hover:bg-red-50 transition text-[11px]" aria-label="Suka komentar">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            <span class="like-count">${c.likes}</span>
          </button>
          <button type="button" class="comment-menu-btn px-2 py-1 rounded-md bg-white border border-gray-200 hover:bg-gray-100 text-gray-600 text-[16px] leading-none" aria-haspopup="menu" aria-controls="commentMenuPortal">⋮</button>
        </div>
      </div>`;
    return item;
  }

  function renderThread(parentId, depth, childrenMap, animatedIds) {
    const wrapper = document.createElement('div');
    if (depth === 0) {
      wrapper.className = 'comment-thread';
    } else {
      wrapper.className = 'comment-children';
      wrapper.dataset.parent = parentId;
      // collapsed state handled outside
    }

    const arr = childrenMap.get(parentId) || [];
    for (const c of arr) {
      const node = createCommentElement(c, depth);
      wrapper.appendChild(node);

      // If this comment has children, add toggle
      const hasKids = (childrenMap.get(c.id) || []).length > 0;
      if (hasKids) {
        const toggleBtn = document.createElement('button');
        toggleBtn.type = 'button';
        toggleBtn.className = 'toggle-replies-btn';
        toggleBtn.dataset.commentId = c.id;
        const count = childrenMap.get(c.id).length;
        const isOpen = expanded.has(c.id);
        toggleBtn.textContent = isOpen ? `Sembunyikan Balasan (${count})` : `Lihat Balasan (${count})`;
        node.appendChild(toggleBtn);

        if (isOpen) {
          const subtree = renderThread(c.id, depth+1, childrenMap, animatedIds);
          node.appendChild(subtree);
        }
      }

      if (animatedIds.includes(c.id)) {
        gsap.fromTo(node, { opacity: 0, y: 18 }, { opacity: 1, y: 0, duration: .4, ease: 'power2.out' });
      }
    }
    return wrapper;
  }

  function renderComments(animatedIds = []) {
    commentsList.innerHTML = '';
    const map = buildChildrenMap();
    // Render top-level (parentId=null)
    const tree = renderThread(null, 0, map, animatedIds);
    commentsList.appendChild(tree);
    totalComments.textContent = `${comments.length} komentar`;
  }

  /*************************************************
   * COMMENT MENU PORTAL LOGIC
   *************************************************/
  let currentMenuCommentId = null;
  function openCommentMenu(btn, commentId) {
    currentMenuCommentId = commentId;

    // Update menu text for Bisukan / Tampilkan
    const idx = comments.findIndex(c => c.id === commentId);
    if (idx !== -1) {
      const isMuted = !!comments[idx].muted;
      commentMenuPortal.querySelector('.menu-mute').textContent = isMuted ? 'Tampilkan' : 'Bisukan';
    }

    // Responsive: mobile bottom sheet
    const isMobile = window.matchMedia('(max-width:640px)').matches;
    if (isMobile) {
      commentMenuPortal.classList.add('mobile');
      commentMenuPortal.style.top = 'auto';
      commentMenuPortal.style.left = '0';
      commentMenuPortal.style.right = '0';
      commentMenuPortal.style.bottom = '0';
    } else {
      commentMenuPortal.classList.remove('mobile');
      const rect = btn.getBoundingClientRect();
      const menuWidth = 160;
      const menuHeight = 120; // approx
      let top = rect.bottom + 4;
      let left = rect.right - menuWidth;
      if (left < 4) left = 4;
      const vh = window.innerHeight;
      if (top + menuHeight > vh) top = rect.top - menuHeight - 4;
      if (top < 4) top = 4;
      commentMenuPortal.style.top = top + 'px';
      commentMenuPortal.style.left = left + 'px';
      commentMenuPortal.style.right = 'auto';
      commentMenuPortal.style.bottom = 'auto';
    }

    commentMenuPortal.classList.add('open');
    commentMenuPortal.setAttribute('aria-hidden', 'false');
  }
  function closeCommentMenu() {
    commentMenuPortal.classList.remove('open', 'mobile');
    commentMenuPortal.setAttribute('aria-hidden', 'true');
    currentMenuCommentId = null;
  }

  /* Menu portal actions */
  commentMenuPortal.addEventListener('click', e => {
    if (!currentMenuCommentId) return;
    const idx = comments.findIndex(c => c.id === currentMenuCommentId);
    if (idx === -1) return;

    if (e.target.classList.contains('menu-report')) {
      alert('Terima kasih, komentar telah dilaporkan (dummy).');
    }
    if (e.target.classList.contains('menu-reply')) {
      const user = comments[idx].author;
      prepareReply(comments[idx].id, user);
    }
    if (e.target.classList.contains('menu-mute')) {
      comments[idx].muted = !comments[idx].muted; // toggle
      saveComments();
      renderComments([comments[idx].id]);
    }
    closeCommentMenu();
  });

  /* Close menu on outside click, scroll, resize */
  document.addEventListener('click', e => {
    if (e.target.closest('#commentMenuPortal')) return; // click inside
    if (e.target.closest('.comment-menu-btn')) return; // handled in list
    closeCommentMenu();
  });
  commentsList.addEventListener('scroll', closeCommentMenu);
  window.addEventListener('resize', closeCommentMenu);

  /*************************************************
   * COMMENT LIST DELEGATED EVENTS
   *************************************************/
  commentsList.addEventListener('click', e => {
    const item = e.target.closest('.comment-item');
    const toggleBtnEl = e.target.closest('.toggle-replies-btn');
    const menuBtnEl = e.target.closest('.comment-menu-btn');
    const likeBtnEl = e.target.closest('.like-comment');

    if (toggleBtnEl) {
      const parentCommentId = toggleBtnEl.dataset.commentId;
      if (expanded.has(parentCommentId)) { expanded.delete(parentCommentId); } else { expanded.add(parentCommentId); }
      renderComments();
      return;
    }

    if (!item) return;
    const idComment = item.dataset.id;
    const idx = comments.findIndex(c => c.id === idComment);
    if (idx === -1) return;

    /* Placeholder (unmute) */
    if (e.target.classList.contains('muted-placeholder')) {
      comments[idx].muted = false;
      saveComments();
      renderComments([comments[idx].id]);
      return;
    }

    /* Klik nama → profil user */
    if (e.target.classList.contains('comment-author')) {
      const user = e.target.dataset.user || comments[idx].author;
      window.location.href = `profil_user.html?username=${encodeURIComponent(user)}`;
      return;
    }

    /* Like */
    if (likeBtnEl) {
      comments[idx].likes += 1;
      saveComments();
      renderComments([comments[idx].id]);
      highlightComment(comments[idx].id);
      return;
    }

    /* Menu button (open portal) */
    if (menuBtnEl) {
      openCommentMenu(menuBtnEl, idComment);
      return;
    }
  });

  function highlightComment(idTarget) {
    const el = commentsList.querySelector(`[data-id="${idTarget}"]`);
    if (!el) return;
    gsap.fromTo(el, { boxShadow: '0 0 0 rgba(59,130,246,0)' }, { boxShadow: '0 0 14px rgba(59,130,246,.45)', duration: .45, yoyo: true, repeat: 1 });
  }

  /*************************************************
   * REPLY HANDLING
   *************************************************/
  function prepareReply(parentId, username) {
    replyToParentId = parentId;
    replyToIdInput.value = parentId;
    commentInput.value = `@${username} `;
    updateCharCount();
    commentInput.focus();
    cancelReplyBtn.classList.remove('hidden');
    // auto-expand parent so user sees context
    expanded.add(parentId);
    renderComments();
  }
  function cancelReply() {
    replyToParentId = null;
    replyToIdInput.value = '';
    commentInput.value = '';
    updateCharCount();
    cancelReplyBtn.classList.add('hidden');
  }
  cancelReplyBtn.addEventListener('click', cancelReply);

  /*************************************************
   * FORM SUBMIT
   *************************************************/
  commentForm.addEventListener('submit', e => {
    e.preventDefault();
    const text = commentInput.value.trim();
    if (!text || text.length > 300) return;

    const newComment = {
      id: crypto.randomUUID(),
      parentId: replyToParentId, // may be null
      author: 'Pengguna Anonim', // TODO: ganti dgn user login
      text,
      likes: 0,
      muted: false,
      timestamp: new Date().toISOString()
    };
    comments.push(newComment);
    saveComments();

    // Expand parent chain so user sees reply
    if (replyToParentId) expanded.add(replyToParentId);

    renderComments([newComment.id]);
    commentInput.value = '';
    cancelReply();
    commentsList.scrollTo({ top: 0, behavior: 'smooth' });
  });

  /* Counter */
  commentInput.addEventListener('input', updateCharCount);
  function updateCharCount() {
    const len = commentInput.value.length;
    charCount.textContent = `${len}/300`;
    postCommentBtn.disabled = len === 0 || len > 300;
  }
  updateCharCount();

  /*************************************************
   * SHARE MODAL
   *************************************************/
  shareButton.addEventListener('click', () => {
    shareModal.classList.remove('hidden');
    gsap.fromTo(shareModal.querySelector('div'), { scale: .85, opacity: 0 }, { scale: 1, opacity: 1, duration: .3, ease: 'power2.out' });
  });
  closeModal.addEventListener('click', () => shareModal.classList.add('hidden'));
  shareModal.addEventListener('click', e => { if (e.target === shareModal) shareModal.classList.add('hidden'); });
  copyLink.addEventListener('click', () => {
    navigator.clipboard.writeText(window.location.href);
    alert('Link berhasil disalin!');
  });

  /*************************************************
   * REKOMENDASI KONTEN
   *************************************************/
  function generateRecommendedContent() {
    recommendedGrid.innerHTML = '';
    const currentWorkId = parseInt(id);
    const recommendations = [];
    while (recommendations.length < 5) {
      const randomId = Math.floor(Math.random() * 20) + 1; // Contoh range
      if (randomId !== currentWorkId && !recommendations.some(item => item.id === randomId)) {
        recommendations.push({
          id: randomId,
          title: `Karya Seni #${randomId}`,
          description: `Jelajahi keindahan lain dari Karya #${randomId}.`,
          imageUrl: `https://picsum.photos/300/200?random=${randomId}`
        });
      }
    }
    for (const item of recommendations) {
      const a = document.createElement('a');
      a.href = `detail.html?id=${item.id}`;
      a.className = 'recommended-item block';
      a.innerHTML = `
        <img src="${item.imageUrl}" alt="${item.title}" loading="lazy">
        <div class="recommended-item-info">
          <h3 class="font-vantage">${item.title}</h3>
          <p>${item.description}</p>
        </div>`;
      recommendedGrid.appendChild(a);
    }
  }
  generateRecommendedContent();

  /*************************************************
   * INITIAL RENDER
   *************************************************/
  renderComments();

  /* Animasi Masuk */
  gsap.to('#uploaderBar', { opacity: 1, y: 0, duration: .6 });
  gsap.to('#detailContent', { opacity: 1, duration: .8, delay: .2 });
  gsap.to('#detailImage', { scale: 1, opacity: 1, duration: .9, delay: .35, ease: 'power3.out' });
  gsap.to('#detailTitle', { opacity: 1, y: 0, duration: .6, delay: .65 });
  gsap.to('#detailDescription', { opacity: 1, y: 0, duration: .6, delay: .75 });
  gsap.to('#recommendedContent', { opacity: 1, y: 0, duration: .6, delay: 1.0 });
  gsap.to('#floatingActions', { opacity: 1, y: 0, duration: .6, delay: .9 });
  gsap.to('#commentSection', { opacity: 1, x: 0, duration: .8, delay: 1, ease: 'power3.out' });

  /* Particles */
  particlesJS('particles-js-detail', {
    particles: {
      number: { value: 70 },
      color: { value: '#cccccc' },
      size: { value: 3, random: true },
      line_linked: { enable: true, color: '#dddddd' },
      move: { enable: true, speed: 2 }
    }
  });
});
</script>
</body>
</html>
