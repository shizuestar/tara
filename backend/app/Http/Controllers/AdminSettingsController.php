<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Backup;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Settings::first();
        $backups = Backup::orderBy('created_at', 'desc')->get();
        $backup_schedule = config('backup.schedule', 'disabled');
        $activities = ActivityLog::where('type', 'settings')->latest()->take(10)->get();

        return view('administrator.admin.settings.index', compact(
            'settings', 'backups', 'backup_schedule', 'activities'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
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

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'settings',
            'description' => 'Pengaturan platform "' . $validated['platform_name'] . '" berhasil diperbarui',
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan disimpan.');
    }

    /**
     * Create a new backup.
     */
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

            $filePath = "backups/{$type}_" . now()->format('YmdHis') . '.zip';

            Backup::create([
                'type' => $type,
                'file_path' => $filePath,
            ]);

            ActivityLog::create([
                'user_id' => Auth::id(),
                'type' => 'settings',
                'description' => 'Backup ' . $type . ' berhasil dibuat',
            ]);

            return redirect()->route('admin.settings.index')->with('success', 'Backup berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('admin.settings.index')->with('error', 'Gagal membuat backup: ' . $e->getMessage());
        }
    }

    /**
     * Restore a backup.
     */
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

            ActivityLog::create([
                'user_id' => Auth::id(),
                'type' => 'settings',
                'description' => 'Proses restore backup dari file "' . $filePath . '" dimulai',
            ]);

            return redirect()->route('admin.settings.index')->with('success', 'Proses restore dimulai.');
        } catch (\Exception $e) {
            return redirect()->route('admin.settings.index')->with('error', 'Gagal restore: ' . $e->getMessage());
        }
    }

    /**
     * Download a backup file.
     */
    public function downloadBackup(Backup $backup)
    {
        $filePath = $backup->file_path;
        $disk = Storage::disk('public');

        if (!$disk->exists($filePath)) {
            abort(404, 'File backup tidak ditemukan.');
        }

        return response()->download($disk->path($filePath));
    }

    /**
     * Update the backup schedule.
     */
    public function updateBackupSchedule(Request $request)
    {
        $validated = $request->validate([
            'schedule' => 'required|in:disabled,daily,weekly,monthly',
        ]);

        config(['backup.schedule' => $validated['schedule']]);

        Settings::updateOrCreate([], [
            'backup_schedule' => $validated['schedule'],
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'settings',
            'description' => 'Jadwal backup diubah menjadi "' . $validated['schedule'] . '"',
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Jadwal backup disimpan.');
    }
}