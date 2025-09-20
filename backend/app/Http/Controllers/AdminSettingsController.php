<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Backup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::first();
        $backups = Backup::orderBy('created_at', 'desc')->get();
        $backup_schedule = config('backup.schedule', 'disabled');

        return view('administrator.admin.settings.index', compact(
            'settings', 'backups', 'backup_schedule'
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

        config(['backup.schedule' => $validated['schedule']]);

        Settings::updateOrCreate([], [
            'backup_schedule' => $validated['schedule'],
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Jadwal backup disimpan.');
    }
}
