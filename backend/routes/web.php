<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LearnMoreController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\AdminCommunityController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminLogActivityController;

Route::get('/', [DashboardController::class, 'index'])->name('home');

// Guest Routes (tidak login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Halaman Publik (Resource)
Route::resource('learn-more', LearnMoreController::class)->only(['index']);
Route::resource('komunitas', CommunityController::class)->only(['index', 'show']);
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
Route::resource('galeri', ArtworkController::class);
Route::post('/galeri/{artwork}/like', [ArtworkController::class, 'like'])->name('galeri.like');
Route::post('/galeri/{artwork}/comment', [ArtworkController::class, 'comment'])->name('galeri.comment');
Route::post('/galeri/{artwork}/comment/{comment}/like', [ArtworkController::class, 'commentLike'])->name('galeri.comment.like');

Route::get('galeri/tag/{tag}', [ArtworkController::class, 'index'])->name('galeri.tag');

// Rute untuk hasil 'search' (pencarian)
// GET /galeri/search
Route::get('galeri/search', [ArtworkController::class, 'index'])->name('galeri.search');

Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::post('events/{event}/comment', [EventController::class, 'storeComment'])->name('events.comment');
    Route::post('events/{event}/ticket/{ticket}/preorder', [EventController::class, 'preorderTicket'])->name('events.preorder');
    Route::get('events/registration/{registration}/payment', [EventController::class, 'payment'])->name('events.payment');
    Route::post('events/registration/{registration}/payment', [EventController::class, 'processPayment'])->name('events.processPayment');
    Route::patch('events/registration/{registration}/cancel', [EventController::class, 'cancelRegistration'])->name('events.cancelRegistration');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('profile', ProfileController::class)->only(['edit', 'update']);
    Route::post('profile/{id}/toggle-notifications', [ProfileController::class, 'toggleNotifications'])->name('profile.toggleNotifications');
    Route::resource('settings', SettingsController::class)->only(['index']);
    Route::get('bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::post('bookmarks', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('bookmarks/{id}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
    Route::post('bookmarks/toggle', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
});

// Admin Routes
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
    // Rute Settings tanpa parameter {setting}
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