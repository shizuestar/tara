<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LearnMoreController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\VisitorLogController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminCommunityController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLogActivityController;
use App\Http\Controllers\CuratorDashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
});

Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email from TARA.', function ($message) {
            $message->to('byrn.uiy@gmail.com')
                    ->subject('Test Email');
        });
        Log::info('Test email sent to byrn.uiy@gmail.com');
        return 'Test email sent!';
    } catch (\Exception $e) {
        Log::error('Failed to send test email: ' . $e->getMessage());
        return 'Failed to send test email: ' . $e->getMessage();
    }
});

// --- Rute Profil Pengguna Biasa ---
Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/id/{id}', [ProfileController::class, 'showById'])->name('profile.showById');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{username}', [ProfileController::class, 'update'])->name('profile.update');
});
// ------------------------------------

Route::get('/profile/{username}/settings', action: fn($username) => redirect()->route('profile.show', $username))->name('profile.settings');
Route::get('/badges', fn() => redirect()->back())->name('badges.index');
Route::get('/badge/{id}', fn($id) => redirect()->back())->name('badge.detail');
Route::get('/portfolio/{username}', action: fn($username) => redirect()->route('profile.show', $username))->name('portfolio.index');
Route::get('/artwork/{id}', fn($id) => redirect()->back())->name('artwork.detail');
Route::get('/project/{id}/dashboard', fn($id) => redirect()->back())->name('project.dashboard');
Route::get('/blog/{id}', fn($id) => redirect()->back())->name('blog.detail');

Route::resource('learn-more', LearnMoreController::class)->only(['index']);

Route::get('/komunitas', [CommunityController::class, 'index'])->name('komunitas.index');
Route::get('/komunitas/saya', [CommunityController::class, 'saya'])->name('komunitas.saya');
Route::get('/komunitas/populer', [CommunityController::class, 'populer'])->name('komunitas.populer');
Route::get('/komunitas/create', [CommunityController::class, 'create'])->name('komunitas.create');
Route::post('/komunitas', [CommunityController::class, 'store'])->name('komunitas.store');
Route::get('/komunitas/{community}', [CommunityController::class, 'show'])->name('komunitas.show');
Route::get('/komunitas/{community}/edit', [CommunityController::class, 'edit'])->name('komunitas.edit');
Route::put('/komunitas/{community}', [CommunityController::class, 'update'])->name('komunitas.update');
Route::delete('/komunitas/{community}', [CommunityController::class, 'destroy'])->name('komunitas.destroy');
Route::post('/komunitas/{community}/join', [CommunityController::class, 'join'])->name('komunitas.join');
Route::get('/komunitas/{community}/posts/create', [CommunityController::class, 'createPostForm'])->name('posts.create');
Route::post('/komunitas/{community}/posts', [CommunityController::class, 'storePost'])->name('posts.store');
Route::get('posts/{post}/edit', [CommunityController::class, 'editPostForm'])->name('posts.edit'); // Baru
Route::put('posts/{post}', [CommunityController::class, 'updatePost'])->name('posts.update'); // Baru
Route::delete('posts/{post}', [CommunityController::class, 'destroyPost'])->name('posts.destroy'); // Baru
Route::get('/komunitas/{community}/posts/{post}', [CommunityController::class, 'showPost'])->name('posts.show');

Route::resource('projects', ProjectController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update']);
Route::post('/projects/{project}/comment', [ProjectController::class, 'comment'])->name('projects.comment');
Route::post('/projects/{project}/join', [ProjectController::class, 'join'])->name('projects.join');
Route::post('/projects/{project}/like', [ProjectController::class, 'like'])->name('projects.like');
Route::post('/projects/{project}/bookmark', [ProjectController::class, 'bookmark'])->name('projects.bookmark');
Route::post('/projects/{project}/share', [ProjectController::class, 'share'])->name('projects.share');
Route::get('/projects/{project}/download', [ProjectController::class, 'downloadSummary'])->name('projects.download');
Route::delete('/projects/{project}/comment/{commentId}/delete', [ProjectController::class, 'deleteComment'])->name('projects.comment.delete');
Route::post('/projects/{project}/comment/{commentId}/toggle-visibility', [ProjectController::class, 'toggleCommentVisibility'])->name('projects.comment.toggle-visibility');
Route::post('/projects/{project}/comment/{commentId}/like', [ProjectController::class, 'likeComment'])->name('projects.comment.like');
Route::post('/projects/{project}/show-hidden-comments', [ProjectController::class, 'showHiddenComments'])->name('projects.show-hidden-comments');
Route::get('/projects/search-users', [ProjectController::class, 'searchUsers'])->name('projects.search-users');

Route::resource('blogs', BlogController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
Route::post('blogs/{blog}/like', [BlogController::class, 'like'])->name('blogs.like');
Route::post('blogs/{blog}/comment', [BlogController::class, 'comment'])->name('blogs.comment');
Route::post('blogs/{blog}/reply/{comment}', [BlogController::class, 'reply'])->name('blogs.reply');
Route::resource('events', EventController::class)->only(['index', 'show']);
Route::get('/galeri', [ArtworkController::class, 'index'])->name('galeri.index');
Route::post('/galeri', [ArtworkController::class, 'store'])->name('galeri.store');
Route::get('/galeri/create', [ArtworkController::class, 'create'])->name('galeri.create');
Route::get('/galeri/search', [ArtworkController::class, 'index'])->name('galeri.search');
Route::get('/galeri/tag/{tag}', [ArtworkController::class, 'index'])->name('galeri.tag');
Route::get('/galeri/{galeri}', [ArtworkController::class, 'show'])->name('galeri.show');
Route::post('/galeri/{galeri}/comment', [ArtworkController::class, 'comment'])->name('galeri.comment');
Route::post('/galeri/{galeri}/comment/{comment}/like', [ArtworkController::class, 'commentLike'])->name('galeri.comment.like');
Route::post('/galeri/{galeri}/like', [ArtworkController::class, 'like'])->name('galeri.like');
Route::put('/galeri/{galeri}', [ArtworkController::class, 'update'])->name('galeri.update');
Route::delete('/galeri/{galeri}', [ArtworkController::class, 'destroy'])->name('galeri.destroy');
Route::get('/galeri/{galeri}/edit', [ArtworkController::class, 'edit'])->name('galeri.edit');

Route::get('galeri/tag/{tag}', [ArtworkController::class, 'index'])->name('galeri.tag');
Route::get('galeri/search', [ArtworkController::class, 'index'])->name('galeri.search');

Route::middleware('auth')->group(function () {
    Route::post('events/{event}/comment', [EventController::class, 'storeComment'])->name('events.comment');
    Route::post('events/{event}/ticket/{ticket}/preorder', [EventController::class, 'preorderTicket'])->name('events.preorder');
    Route::get('events/registration/{registration}/payment', [EventController::class, 'payment'])->name('events.payment');
    Route::post('events/registration/{registration}/payment', [EventController::class, 'processPayment'])->name('events.processPayment');
    Route::patch('events/registration/{registration}/cancel', [EventController::class, 'cancelRegistration'])->name('events.cancelRegistration');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/log-visit', [VisitorLogController::class, 'logVisit'])->name('log.visit');

    Route::prefix('admin')->group(function() {
        Route::resource('my-profile', AdminProfileController::class)
             ->only(['edit', 'update'])
             ->names('admin.my-profile');
    });

    Route::post('profile/{id}/toggle-notifications', [AdminProfileController::class, 'toggleNotifications'])->name('profile.toggleNotifications');
    Route::resource('settings', SettingsController::class)->only(['index']);
    Route::get('bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::delete('bookmarks/{id}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
    Route::post('bookmarks/toggle', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
});

Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::resource('dashboard', AdminDashboardController::class)->only(['index']);
    Route::resource('galeri', AdminGaleriController::class);
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
    Route::resource('projects', AdminProjectController::class);
    Route::get('projects/users/search', [AdminProjectController::class, 'searchUsers'])->name('projects.users.search');
    Route::resource('communities', AdminCommunityController::class);
    Route::resource('blogs', AdminBlogController::class);
    Route::post('blogs/publish-multiple', [AdminBlogController::class, 'publishMultiple'])->name('blogs.publish-multiple');
    Route::delete('blogs/destroy-multiple', [AdminBlogController::class, 'destroyMultiple'])->name('blogs.destroy-multiple');
    Route::resource('users', AdminUserController::class);
    Route::get('settings', [AdminSettingsController::class, 'index'])->name('settings.index');
    Route::put('settings', [AdminSettingsController::class, 'update'])->name('settings.update');
    Route::post('backups/{type}', [AdminSettingsController::class, 'createBackup'])->name('backups.create');
    Route::post('backups/restore', [AdminSettingsController::class, 'restoreBackup'])->name('backups.restore');
    Route::get('backups/{backup}/download', [AdminSettingsController::class, 'downloadBackup'])->name('backups.download');
    Route::put('backups/schedule', [AdminSettingsController::class, 'updateBackupSchedule'])->name('backups.schedule');
    Route::resource('reports', AdminReportController::class);
    Route::get('reports/export/{format}', [AdminReportController::class, 'export'])->name('reports.export');
    Route::resource('events', AdminEventController::class);
    Route::resource('activity-logs', AdminLogActivityController::class)->only(['index']);
});

Route::prefix('curator')->middleware(['auth', 'role:kurator'])->name('curator.')->group(function () {
    Route::resource('dashboard', CuratorDashboardController::class)->only(['index']);
    Route::resource('galeri', AdminGaleriController::class);
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
    Route::resource('communities', AdminCommunityController::class);
    Route::resource('blogs', AdminBlogController::class);
    Route::post('blogs/publish-multiple', [AdminBlogController::class, 'publishMultiple'])->name('blogs.publish-multiple');
    Route::delete('blogs/destroy-multiple', [AdminBlogController::class, 'destroyMultiple'])->name('blogs.destroy-multiple');
    Route::resource('events', AdminEventController::class);
    
    // --- Rute Tambahan untuk Kurator dari Admin ---
    Route::resource('projects', AdminProjectController::class);
    Route::get('projects/users/search', [AdminProjectController::class, 'searchUsers'])->name('projects.users.search');
    
    
    Route::resource('reports', AdminReportController::class);
    Route::get('reports/export/{format}', [AdminReportController::class, 'export'])->name('reports.export');
    Route::resource('activity-logs', AdminLogActivityController::class)->only(['index']);
});
