<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Role;
use App\Models\Permission;
use App\Models\NotificationSettings;
use App\Models\Backup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Spatie\Backup\Tasks\Backup\BackupJob;
use Spatie\Backup\BackupDestination\BackupDestination;
use Spatie\Backup\Config\Config;
use Illuminate\Support\Collection;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::first() ?? new Settings(['platform_name' => 'TARA Admin Panel']);
        $roles = Role::all();
        $permissions = Permission::all();
        $selected_role_id = request()->input('role_id', $roles->first()->id ?? null);
        $selected_role = Role::find($selected_role_id);
        $selected_role_permissions = $selected_role ? $selected_role->permissions->pluck('id')->toArray() : [];
        $notification_settings = NotificationSettings::first() ?? new NotificationSettings();
        $backups = Backup::orderBy('created_at', 'desc')->get();
        $backup_schedule = config('backup.schedule', 'disabled');

        return view('administrator.admin.settings.index', compact(
            'settings', 'roles', 'permissions', 'selected_role_id',
            'selected_role', 'selected_role_permissions',
            'notification_settings', 'backups', 'backup_schedule'
        ));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'platform_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png|max:2048',
            'favicon' => 'nullable|image|mimes:png|max:2048',
        ]);

        $settings = Settings::first() ?? new Settings();

        if ($request->hasFile('logo')) {
            if ($settings->logo_path) {
                Storage::disk('public')->delete($settings->logo_path);
            }
            $validated['logo_path'] = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('favicon')) {
            if ($settings->favicon_path) {
                Storage::disk('public')->delete($settings->favicon_path);
            }
            $validated['favicon_path'] = $request->file('favicon')->store('favicons', 'public');
        }

        $settings->fill($validated)->save();

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan disimpan.');
    }

    public function storeRole(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        Role::create($validated);

        return redirect()->route('admin.settings.index')->with('success', 'Role ditambahkan.');
    }

    public function updatePermissions(Request $request)
    {
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::find($validated['role_id']);
        $role->permissions()->sync($validated['permissions'] ?? []);

        return redirect()->route('admin.settings.index', ['role_id' => $validated['role_id']])
            ->with('success', 'Hak akses diperbarui.');
    }

    public function updateNotifications(Request $request)
    {
        $validated = $request->validate([
            'email_enabled' => 'boolean',
            'browser_enabled' => 'boolean',
            'sms_enabled' => 'boolean',
            'new_user_enabled' => 'boolean',
            'system_update_enabled' => 'boolean',
        ]);

        $settings = NotificationSettings::first() ?? new NotificationSettings();
        $settings->fill($validated)->save();

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan notifikasi disimpan.');
    }

public function createBackup(Request $request, $type)
{
    $validated = $request->validate([
        'type' => 'required|in:database,media',
    ]);

    try {
        if ($type === 'database') {
            Artisan::call('backup:run', ['--only-db' => true]);
        } else {
            Artisan::call('backup:run', ['--only-files' => true]);
        }

        // Nama file backup biasanya otomatis ditaruh di storage/app/laravel-backup/
        $filePath = "backups/{$type}_" . now()->format('YmdHis') . '.zip';

        Backup::create([
            'type' => $type,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Backup berhasil dibuat.');
    } catch (\Exception $e) {
        return redirect()->route('admin.settings.index')->with('error', 'Gagal membuat backup: ' . $e->getMessage());
    }
}

    public function restoreBackup(Request $request)
    {
        $validated = $request->validate([
            'backup_file' => 'required|file|mimes:sql,zip',
        ]);

        $filePath = $request->file('backup_file')->store('backups', 'public');

        try {
            Artisan::call('backup:restore', [
                '--file' => Storage::disk('public')->path($filePath),
            ]);

            return redirect()->route('admin.settings.index')->with('success', 'Proses restore dimulai.');
        } catch (\Exception $e) {
            return redirect()->route('admin.settings.index')->with('error', 'Gagal restore: ' . $e->getMessage());
        }
    }

    public function downloadBackup(Backup $backup)
    {
        $filePath = $backup->file_path;
        $disk = Storage::disk('public');

        if (!$disk->exists($filePath)) {
            abort(404, 'File backup tidak ditemukan.');
        }

        return response()->download($disk->path($filePath));
    }

    public function updateBackupSchedule(Request $request)
    {
        $validated = $request->validate([
            'schedule' => 'required|in:disabled,daily,weekly,monthly',
        ]);

        // Simpan pengaturan jadwal backup
        config(['backup.schedule' => $validated['schedule']]);

        Settings::updateOrCreate([], [
            'backup_schedule' => $validated['schedule'],
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Jadwal backup disimpan.');
    }
}
