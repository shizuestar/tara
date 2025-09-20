<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LearnMoreController;
use App\Http\Controllers\AdminAgendaController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminProyekController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminCommunityController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLogActivityController;

// Routes Public (Accessible by guest)
Route::middleware('guest')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/komunitas', [CommunityController::class, 'index'])->name('komunitas.index');
    Route::get('/komunitas/{id}', [CommunityController::class, 'show'])->name('komunitas.show');
    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/learn-more', [LearnMoreController::class, 'index'])->name('learn_more.index');
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
    Route::get('/show', [AgendaController::class, 'ShowAgendaFound'])->name('agenda.showF');
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
    Route::get('/galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Routes Authenticated Users
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/{id}/toggle-notifications', [ProfileController::class, 'toggleNotifications'])->name('profile.toggleNotifications');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark');
    Route::delete('/bookmark/{id}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
});

// Routes Admin
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/galeri', [AdminGaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/{id}', [AdminGaleriController::class, 'show'])->name('galeri.show');
    Route::post('/galeri', [AdminGaleriController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{id}/edit', [AdminGaleriController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{id}', [AdminGaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [AdminGaleriController::class, 'destroy'])->name('galeri.destroy');
    Route::get('categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::post('categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::put('categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/admin/projects/', [AdminProyekController::class, 'index'])->name('projects.index');
    Route::get('/admin/projects/{id}', [AdminProyekController::class, 'show'])->name('projects.show');
    Route::post('/admin/projects', [AdminProyekController::class, 'store'])->name('projects.store');
    Route::get('/admin/projects/{id}/edit', [AdminProyekController::class, 'edit'])->name('projects.edit');
    Route::get('/admin/users/search', [AdminProyekController::class, 'searchUsers'])->name('users.search');
    Route::put('/admin/projects/{id}', [AdminProyekController::class, 'update'])->name('projects.update');
    Route::delete('/admin/projects/{id}', [AdminProyekController::class, 'destroy'])->name('projects.destroy');
    Route::get('/komunitas', [AdminCommunityController::class, 'index'])->name('komunitas.index');
    Route::get('/komunitas/{id}', [AdminCommunityController::class, 'show'])->name('komunitas.show');
    Route::post('/komunitas', [AdminCommunityController::class, 'store'])->name('komunitas.store');
    Route::get('/komunitas/{id}/edit', [AdminCommunityController::class, 'edit'])->name('komunitas.edit');
    Route::put('/komunitas/{id}', [AdminCommunityController::class, 'update'])->name('komunitas.update');
    Route::delete('/komunitas/{id}', [AdminCommunityController::class, 'destroy'])->name('komunitas.destroy');
    Route::resource('blog', AdminBlogController::class);
    Route::post('blog/publish-multiple', [AdminBlogController::class, 'publishMultiple'])->name('blog.publish-multiple');
    Route::delete('blog/destroy-multiple', [AdminBlogController::class, 'destroyMultiple'])->name('blog.destroy-multiple');
    Route::resource('users', AdminUserController::class);
    Route::get('/settings', [AdminSettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [AdminSettingsController::class, 'update'])->name('settings.update');
    Route::post('/roles', [AdminSettingsController::class, 'storeRole'])->name('roles.store');
    Route::put('/roles/permissions', [AdminSettingsController::class, 'updatePermissions'])->name('roles.update_permissions');
    Route::put('/notifications', [AdminSettingsController::class, 'updateNotifications'])->name('notifications.update');
    Route::post('/backups/{type}', [AdminSettingsController::class, 'createBackup'])->name('backups.create');
    Route::post('/backups/restore', [AdminSettingsController::class, 'restoreBackup'])->name('backups.restore');
    Route::get('/backups/{backup}/download', [AdminSettingsController::class, 'downloadBackup'])->name('backups.download');
    Route::put('/backups/schedule', [AdminSettingsController::class, 'updateBackupSchedule'])->name('backups.schedule');
    Route::resource('agenda', AdminAgendaController::class);
    Route::get('activity-logs', [AdminLogActivityController::class, 'index'])->name('activity-logs.index');
});