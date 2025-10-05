<x-layout>
    <style>
        body, * {
            font-family: 'Space Grotesk', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, p, a, span, button, input, select, option, div, label {
            font-family: 'Space Grotesk', sans-serif !important;
        }
        [class*="fa-"] {
            font-family: 'Font Awesome 6 Free', sans-serif !important;
        }
    </style>
    @section('title', $project->project_name)

    <div id="join-modal" class="join-modal fixed top-0 left-0 w-full h-full bg-black/60 flex items-center justify-center z-60 hidden">
        <div class="join-modal-content bg-white border border-gray-200 rounded-3xl p-6 w-full max-w-md mx-4">
            <i class="fas fa-times close-btn absolute top-4 right-4 text-xl text-gray-700 cursor-pointer hover:scale-110 transition-all" onclick="toggleJoinModal()"></i>
            <h2 class="text-xl font-bold mb-3 font-['Space_Grotesk']">Gabung Project</h2>
            <p class="text-sm text-gray-600 mb-4">Lengkapi formulir berikut untuk mengajukan bergabung dengan Project ini.</p>
            <form action="{{ route('projects.join', $project->id) }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium">Nama Lengkap</label>
                        <input type="text" name="name" id="join-name"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan nama Anda" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" id="join-email"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan email Anda" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Peran yang Diinginkan</label>
                        <input type="text" name="role" id="join-role"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Contoh: UI/UX Designer" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Pesan</label>
                        <textarea name="message" id="join-message"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            rows="5" placeholder="Mengapa Anda ingin bergabung?" required></textarea>
                    </div>
                    <button type="submit" id="submit-join" class="join-btn w-full px-6 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']">Kirim Pengajuan</button>
                </div>
            </form>
        </div>
    </div>

    <section class="pt-20 pb-12 mt-10">
        <div class="container mx-auto px-6">
            @if (session('success'))
                <div id="notification-bar" class="notification-bar bg-white border border-gray-200 rounded-3xl p-5 mb-8 cursor-pointer" onclick="dismissNotification()">
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            @endif
            <div class="project-header mb-8">
                <div class="inner">
                    <img src="{{ $project->cover_images ? asset('storage/' . $project->cover_images) : 'https://via.placeholder.com/1200x400' }}"
                         alt="{{ $project->project_name }}" class="w-full h-[450px] object-cover rounded-3xl border border-gray-200" />
                    <div class="mt-4">
                        <h1 class="text-2xl font-bold font-['Space_Grotesk']">{{ $project->project_name }}</h1>
                        <div class="flex items-center gap-2 mt-2 flex-wrap">
                            <span class="badge px-3 py-1 text-sm font-medium rounded-md bg-gray-200 text-gray-900">{{ $project->category->name }}</span>
                            <span class="badge px-3 py-1 text-sm font-medium rounded-md bg-gray-200 text-gray-900">{{ $project->community->name }}</span>
                            <span class="badge badge-{{ $project->status }} px-3 py-1 text-sm font-medium rounded-md {{ $project->status == 'ongoing' ? 'bg-yellow-500 text-white' : ($project->status == 'pending' ? 'bg-gray-200 text-gray-900' : 'bg-green-500 text-white') }}">
                                {{ $project->status_text }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Dibuat: {{ $project->created_at->format('d M Y') }}</p>
                        <p class="text-sm text-gray-600 mt-2">Mulai: {{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('d M Y') : 'Belum ditentukan' }}</p>
                        <p class="text-sm text-gray-600 mt-2">Selesai: {{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('d M Y') : 'Belum ditentukan' }}</p>
                        <p class="text-sm text-gray-600 mt-2">{{ $project->description }}</p>
                        <p class="text-sm text-gray-600 mt-2">Progress: {{ $project->progress }}%</p>
                        <div class="progress-bar mt-2 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                            <div class="progress h-full bg-yellow-500 rounded-full" style="width: {{ $project->progress }}%"></div>
                        </div>
                        <div class="flex gap-2 mt-4 flex-wrap">
                            <form action="{{ route('projects.like', $project->id) }}" method="POST">
                                @csrf
                                <button type="submit" id="like-project-btn" class="join-btn px-6 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']">
                                    <i class="fas fa-heart"></i> Suka ({{ $project->likes()->count() }})
                                </button>
                            </form>
                            <form action="{{ route('projects.bookmark', $project->id) }}" method="POST">
                                @csrf
                                <button type="submit" id="bookmark-project-btn" class="join-btn px-6 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']">
                                    <i class="fas fa-bookmark"></i> {{ $project->bookmarks()->where('user_id', Auth::id())->exists() ? 'Hapus Bookmark' : 'Bookmark' }}
                                </button>
                            </form>
                            <button id="share-project-btn" class="join-btn px-6 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']"><i class="fas fa-share"></i> Bagikan</button>
                            @if($project->status == 'ongoing')
                                <button id="join-project-btn" class="join-btn px-6 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']" onclick="toggleJoinModal()"><i class="fas fa-user-plus"></i> Gabung Project</button>
                            @endif
                            <button id="download-summary-btn" class="join-btn px-6 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']"><i class="fas fa-download"></i> Unduh Ringkasan</button>
                            <a href="{{ route('projects.index') }}" id="back-to-projects-btn" class="join-btn px-6 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']"><i class="fas fa-arrow-left"></i> Kembali ke Project</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <div class="lg:col-span-1 creator-card bg-white border border-gray-200 rounded-3xl p-6">
                    <h2 class="text-lg font-bold mb-3 font-['Space_Grotesk']">Pembuat Project</h2>
                    <div class="flex items-center gap-4">
                        <img src="{{ $project->creator->avatar ?? 'https://via.placeholder.com/100' }}"
                             alt="{{ $project->creator->name }}"
                             class="w-16 h-16 rounded-full border border-gray-200" />
                        <div>
                            <h3 class="text-base font-semibold">{{ $project->creator->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $project->creator->role ?? 'Pembuat' }}</p>
                            <a href="/profil/{{ $project->creator->id }}" class="text-sm text-yellow-400 hover:underline">Lihat Profil</a>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2 goals-card bg-white border border-gray-200 rounded-3xl p-6">
                    <h2 class="text-lg font-bold mb-3 font-['Space_Grotesk']">Tujuan Kolaborasi</h2>
                    <p class="text-sm text-gray-600">{{ $project->collaboration_goals ?? 'Belum ada tujuan kolaborasi.' }}</p>
                </div>
            </div>
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-4 font-['Space_Grotesk']">Anggota Tim</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 members-container">
                    @foreach($project->members as $member)
                        <div class="member-card bg-white border border-gray-200 rounded-3xl p-6">
                            <img src="{{ $member->user->avatar ?? 'https://via.placeholder.com/100' }}"
                                 alt="{{ $member->user->name }}"
                                 class="w-16 h-16 rounded-full mb-2 mx-auto border border-gray-200" />
                            <h3 class="text-sm font-semibold text-center">{{ $member->user->name }}</h3>
                            <p class="text-sm text-gray-600 text-center">{{ $member->role }}</p>
                            <a href="/profil/{{ $member->user->id }}" class="block text-sm text-yellow-400 hover:underline text-center mt-1">Lihat Profil</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-4 font-['Space_Grotesk']">Linimasa Project</h2>
                <div class="timeline space-y-6">
                    @forelse($project->milestones as $milestone)
                        <div class="timeline-event relative pl-10">
                            <div class="absolute left-2 top-0 w-4 h-4 bg-yellow-500 rounded-full border-2 border-white"></div>
                            <div class="absolute left-3 top-4 w-0.5 h-full bg-gray-200"></div>
                            <div class="bg-white border border-gray-200 rounded-3xl p-4">
                                <p class="text-sm text-gray-600">{{ $milestone->due_date ? \Carbon\Carbon::parse($milestone->due_date)->format('d M Y') : 'No date' }}</p>
                                <h3 class="text-base font-semibold">{{ $milestone->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $milestone->description ?? 'No description' }}</p>
                                <span class="badge px-3 py-1 text-sm font-medium rounded-md {{ $milestone->status == 'in_progress' ? 'bg-yellow-500 text-white' : ($milestone->status == 'upcoming' ? 'bg-gray-200 text-gray-900' : 'bg-green-500 text-white') }}">
                                    {{ ucfirst($milestone->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-600">Belum ada linimasa.</p>
                    @endforelse
                </div>
            </div>
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-4 font-['Space_Grotesk']">Progres Tugas</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 tasks-container">
                    @foreach($project->tasks as $task)
                        <div class="task-card bg-white border border-gray-200 rounded-3xl p-6">
                            <h3 class="text-base font-semibold">{{ $task->title }}</h3>
                            <p class="text-sm text-gray-600 mt-1">Progress: {{ $task->progress }}%</p>
                            <div class="progress-bar mt-2 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                <div class="progress h-full bg-yellow-500 rounded-full" style="width: {{ $task->progress }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold font-['Space_Grotesk']">Komentar</h2>
                    @if($project->creator_id == Auth::id())
                        <button id="show-hidden-comments" class="join-btn px-6 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']" onclick="showHiddenComments({{ $project->id }})"><i class="fas fa-eye"></i> Tampilkan Komentar Tersembunyi</button>
                    @endif
                </div>
                <div class="mb-4 flex items-center gap-2">
                    <form action="{{ route('projects.comment', $project->id) }}" method="POST" class="w-full flex items-center gap-2">
                        @csrf
                        <input type="text" name="comment" id="comment-input"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Tulis komentar Anda..." required />
                        <button type="submit" id="submit-comment" class="join-btn px-6 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
                <div class="comments-container space-y-4">
                    @foreach($project->comments->where('parent_comment_id', null) as $comment)
                        <div class="comment-card {{ $comment->hidden ? 'hidden' : '' }} bg-white border border-gray-200 rounded-3xl p-4" data-comment-id="{{ $comment->id }}">
                            <div class="flex gap-3 items-start">
                                <img src="{{ $comment->user->avatar ?? 'https://via.placeholder.com/50' }}"
                                     alt="{{ $comment->user->name }}"
                                     class="w-8 h-8 rounded-full border border-gray-200" />
                                <div class="flex-1">
                                    <div class="flex items-center gap-2">
                                        <h3 class="text-sm font-semibold">{{ $comment->user->name }}</h3>
                                        <p class="text-xs text-gray-600">{{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                    <p class="text-sm mt-1">{{ $comment->comment }}</p>
                                    <div class="flex items-center gap-3 mt-1">
                                        <span class="comment-action-btn cursor-pointer" onclick="toggleReplyForm({{ $project->id }}, {{ $comment->id }}, '{{ $comment->user->name }}')">
                                            <i class="fas fa-reply"></i> Balas
                                        </span>
                                        @if($comment->user_id == Auth::id() || $project->creator_id == Auth::id())
                                            <span class="comment-action-btn cursor-pointer" onclick="deleteComment({{ $project->id }}, {{ $comment->id }})">
                                                <i class="fas fa-trash"></i> Hapus
                                            </span>
                                        @endif
                                        @if($comment->user_id == Auth::id() || $project->creator_id == Auth::id())
                                            <span class="comment-action-btn cursor-pointer" onclick="toggleCommentVisibility({{ $project->id }}, {{ $comment->id }})">
                                                <i class="fas fa-eye{{ $comment->hidden ? '-slash' : '' }}"></i> {{ $comment->hidden ? 'Tampilkan' : 'Sembunyikan' }}
                                            </span>
                                        @endif
                                        <span class="comment-action-btn cursor-pointer {{ $comment->likes()->where('user_id', Auth::id())->exists() ? 'liked text-red-500' : '' }}"
                                              onclick="toggleCommentLike({{ $project->id }}, {{ $comment->id }})">
                                            <i class="fas fa-heart"></i> {{ $comment->likes()->count() }}
                                        </span>
                                    </div>
                                    <div class="reply-form hidden mt-2" data-comment-id="{{ $comment->id }}">
                                        <form action="{{ route('projects.comment', $project->id) }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                                            <input type="text" name="comment"
                                                class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                                placeholder="Tulis balasan Anda..." />
                                            <button type="submit" class="join-btn px-6 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']"><i class="fas fa-paper-plane"></i></button>
                                        </form>
                                    </div>
                                    <div class="reply-container mt-2 ml-6 space-y-2">
                                        @foreach($comment->replies as $reply)
                                            <div class="comment-card {{ $reply->hidden ? 'hidden' : '' }} bg-white border border-gray-200 rounded-3xl p-4" data-comment-id="{{ $reply->id }}">
                                                <div class="flex gap-3 items-start">
                                                    <img src="{{ $reply->user->avatar ?? 'https://via.placeholder.com/50' }}"
                                                         alt="{{ $reply->user->name }}"
                                                         class="w-8 h-8 rounded-full border border-gray-200" />
                                                    <div class="flex-1">
                                                        <div class="flex items-center gap-2">
                                                            <h3 class="text-sm font-semibold">{{ $reply->user->name }}</h3>
                                                            <p class="text-xs text-gray-600">{{ $reply->created_at->diffForHumans() }}</p>
                                                        </div>
                                                        <p class="text-sm mt-1"><span class="font-semibold cursor-pointer" onclick="window.location.href='/profil/{{ $reply->user->id }}'">@{{ $comment->user->name }}</span> {{ $reply->comment }}</p>
                                                        <div class="flex items-center gap-3 mt-1">
                                                            @if($reply->user_id == Auth::id() || $project->creator_id == Auth::id())
                                                                <span class="comment-action-btn cursor-pointer" onclick="deleteComment({{ $project->id }}, {{ $reply->id }})">
                                                                    <i class="fas fa-trash"></i> Hapus
                                                                </span>
                                                            @endif
                                                            @if($reply->user_id == Auth::id() || $project->creator_id == Auth::id())
                                                                <span class="comment-action-btn cursor-pointer" onclick="toggleCommentVisibility({{ $project->id }}, {{ $reply->id }})">
                                                                    <i class="fas fa-eye{{ $reply->hidden ? '-slash' : '' }}"></i> {{ $reply->hidden ? 'Tampilkan' : 'Sembunyikan' }}
                                                                </span>
                                                            @endif
                                                            <span class="comment-action-btn cursor-pointer {{ $reply->likes()->where('user_id', Auth::id())->exists() ? 'liked text-red-500' : '' }}"
                                                                  onclick="toggleCommentLike({{ $project->id }}, {{ $reply->id }})">
                                                                <i class="fas fa-heart"></i> {{ $reply->likes()->count() }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6 text-black font-['Space_Grotesk']">Rekomendasi Kolaborasi Lainnya</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="recommended-projects">
                    @foreach($recommendedProjects as $recommended)
                        <div class="recommended-project bg-white border border-gray-200 rounded-3xl p-4 cursor-pointer" onclick="window.location.href='{{ route('projects.show', $recommended->id) }}'">
                            <img src="{{ $recommended->cover_images ? asset('storage/' . $recommended->cover_images) : 'https://via.placeholder.com/600x400' }}"
                                 alt="{{ $recommended->project_name }}" class="w-full h-32 object-cover rounded-lg" />
                            <div class="p-4">
                                <p class="text-base font-semibold">{{ $recommended->project_name }}</p>
                                <p class="text-sm text-gray-600">{{ $recommended->members->count() }} Anggota</p>
                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($recommended->description, 60) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @push('styles')
    <style>
        .body {
            font-family: 'Space_Grotesk';
        }
        
        .project-header img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
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

        .badge-ongoing {
            background: #f59e0b;
            color: #ffffff;
        }

        .badge-pending {
            background: #ffffff;
            color: #f59e0b;
            border: 1px solid #f59e0b;
        }

        .badge-completed {
            background: #22c55e;
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
        .comment-card,
        .notification-card,
        .recommended-project,
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

        .action-btn,
        .join-btn {
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            background: #111;
            color: #ffffff;
            text-transform: uppercase;
            transition: transform 0.2s, background 0.3s;
        }

        .action-btn:hover,
        .join-btn:hover {
            transform: scale(1.05);
            background: #333;
        }

        .notification-bar {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 1.25rem;
            margin-bottom: 2rem;
            cursor: pointer;
        }

        .join-modal {
            display: none;
        }

        .join-modal.open {
            display: flex;
        }

        .comment-card.hidden {
            display: none;
        }

        .comment-action-btn {
            font-size: 0.85rem;
            color: #4b5563;
            transition: color 0.3s;
        }

        .comment-action-btn:hover {
            color: #1a202c;
        }

        .comment-action-btn.liked {
            color: #ef4444;
        }

        .reply-container {
            margin-left: 2.5rem;
            margin-top: 0.5rem;
        }

        .reply-form {
            margin-top: 0.5rem;
        }

        @media (max-width: 1024px) {
            .project-header img {
                height: 300px;
            }

            .join-modal-content {
                margin: 1rem;
                max-width: 90%;
            }

            .members-container,
            .tasks-container {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }

            .creator-card,
            .goals-card {
                padding: 1.25rem;
            }

            .recommended-project img {
                height: 100px;
            }
        }

        @media (max-width: 896px) {
            .project-header img {
                height: 250px;
            }

            .grid.grid-cols-1.lg:grid-cols-3 {
                grid-template-columns: 1fr;
            }

            .creator-card,
            .goals-card {
                padding: 1rem;
            }

            .members-container,
            .tasks-container {
                grid-template-columns: 1fr 1fr;
            }

            .recommended-project img {
                height: 90px;
            }

            .timeline-event {
                padding-left: 2rem;
            }

            .timeline-event::before {
                left: 0.5rem;
            }

            .timeline-event::after {
                left: 0.7rem;
            }
        }

        @media (max-width: 768px) {
            .project-header img {
                height: 200px;
            }

            .action-btn,
            .join-btn {
                padding: 0.3rem 0.8rem;
                font-size: 0.75rem;
            }

            .creator-card,
            .goals-card,
            .member-card,
            .task-card,
            .comment-card,
            .recommended-project {
                padding: 1rem;
            }

            .members-container,
            .tasks-container {
                grid-template-columns: 1fr;
            }

            .recommended-project img {
                height: 80px;
            }
        }

        @media (max-width: 640px) {
            .container {
                padding: 0 1rem;
            }

            .project-header img {
                height: 150px;
            }

            .action-btn,
            .join-btn {
                width: 100%;
                text-align: center;
                padding: 0.4rem;
                font-size: 0.7rem;
            }

            .badge {
                font-size: 0.7rem;
                padding: 0.2rem 0.5rem;
            }

            .creator-card,
            .goals-card,
            .member-card,
            .task-card,
            .comment-card,
            .recommended-project {
                padding: 0.75rem;
            }

            .recommended-project img {
                height: 70px;
            }

            .timeline-event {
                padding-left: 1.5rem;
            }

            .timeline-event::before {
                left: 0.25rem;
                width: 12px;
                height: 12px;
            }

            .timeline-event::after {
                left: 0.45rem;
            }

            .comment-card {
                padding: 0.5rem 0;
            }

            .comment-action-btn {
                font-size: 0.7rem;
            }

            .reply-container {
                margin-left: 1.5rem;
            }

            .join-modal-content {
                padding: 1.5rem;
            }
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        const currentUser = "{{ Auth::user()->name ?? 'Guest' }}";

        function toggleJoinModal() {
            const modal = document.getElementById('join-modal');
            modal.classList.toggle('open');
            if (modal.classList.contains('open')) {
                document.getElementById('join-name').focus();
            }
        }

        function dismissNotification() {
            const notificationBar = document.getElementById('notification-bar');
            notificationBar.classList.add('hidden');
        }

        function toggleReplyForm(projectId, commentId, taggedUser) {
            const replyForm = document.querySelector(`.reply-form[data-comment-id="${commentId}"]`);
            replyForm.classList.toggle('hidden');
            if (!replyForm.classList.contains('hidden')) {
                const input = replyForm.querySelector('input[name="comment"]');
                input.value = `@${taggedUser} `;
                input.focus();
            }
        }

        function deleteComment(projectId, commentId) {
            if (confirm("Apakah Anda yakin ingin menghapus komentar ini?")) {
                fetch(`/projects/${projectId}/comment/${commentId}/delete`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(response => response.json())
                  .then(data => {
                      if (data.success) {
                          window.location.reload();
                      } else {
                          alert(data.message || 'Gagal menghapus komentar.');
                      }
                  }).catch(() => {
                      alert('Terjadi kesalahan saat menghapus komentar.');
                  });
            }
        }

        function toggleCommentVisibility(projectId, commentId) {
            fetch(`/projects/${projectId}/comment/${commentId}/toggle-visibility`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      window.location.reload();
                  } else {
                      alert(data.message || 'Gagal mengubah visibilitas komentar.');
                  }
              }).catch(() => {
                  alert('Terjadi kesalahan saat mengubah visibilitas komentar.');
              });
        }

        function toggleCommentLike(projectId, commentId) {
            fetch(`/projects/${projectId}/comment/${commentId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      window.location.reload();
                  } else {
                      alert(data.message || 'Gagal menyukai komentar.');
                  }
              }).catch(() => {
                  alert('Terjadi kesalahan saat menyukai komentar.');
              });
        }

        function showHiddenComments(projectId) {
            fetch(`/projects/${projectId}/show-hidden-comments`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      window.location.reload();
                  } else {
                      alert(data.message || 'Gagal menampilkan komentar tersembunyi.');
                  }
              }).catch(() => {
                  alert('Terjadi kesalahan saat menampilkan komentar tersembunyi.');
              });
        }

        function shareProject(projectId) {
            fetch(`/projects/${projectId}/share`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      navigator.clipboard.writeText(data.data.url).then(() => {
                          alert('Link project telah disalin ke clipboard!');
                      }).catch(() => {
                          alert('Gagal menyalin link project.');
                      });
                  } else {
                      alert(data.message || 'Gagal membagikan project.');
                  }
              }).catch(() => {
                  alert('Terjadi kesalahan saat membagikan project.');
              });
        }

        function downloadSummary(projectId) {
            window.location.href = `/projects/${projectId}/download`;
        }

        window.addEventListener('load', () => {
            const joinButton = document.getElementById('join-project-btn');
            if (joinButton) {
                joinButton.addEventListener('click', toggleJoinModal);
            }

            const shareButton = document.getElementById('share-project-btn');
            if (shareButton) {
                shareButton.addEventListener('click', () => shareProject({{ $project->id }}));
            }

            const downloadButton = document.getElementById('download-summary-btn');
            if (downloadButton) {
                downloadButton.addEventListener('click', () => downloadSummary({{ $project->id }}));
            }

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    const modal = document.getElementById('join-modal');
                    if (modal.classList.contains('open')) {
                        toggleJoinModal();
                    }
                }
            });
        });
    </script>
    @endpush
</x-layout>