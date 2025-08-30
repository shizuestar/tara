<?php
namespace App\Http\Controllers;

// use App\Models\User;
// use App\Models\UserEmail;
// use App\Models\Content;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('User.settings');
    }

    // public function updateProfile(Request $request)
    // {
    //     $user = Auth::user();
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'public_email' => 'required|email|exists:user_emails,email',
    //         'bio' => 'nullable|string|max:500',
    //         'pronouns' => 'nullable|string|in:Tidak ingin menyebutkan,Dia/laki-laki,Dia/perempuan,Mereka',
    //         'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     if ($request->hasFile('profile_photo')) {
    //         if ($user->profile_photo_path) {
    //             Storage::delete($user->profile_photo_path);
    //         }
    //         $validated['profile_photo_path'] = $request->file('profile_photo')->store('profile_photos');
    //     }

    //     $user->update($validated);
    //     return redirect()->route('settings.index')->with('success', 'Profil diperbarui.');
    // }

    // public function updateAccount(Request $request)
    // {
    //     $validated = $request->validate([
    //         'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
    //         'email' => 'required|email|unique:users,email,' . Auth::id(),
    //         'phone' => 'nullable|string|max:20',
    //     ]);

    //     Auth::user()->update($validated);
    //     return redirect()->route('settings.index')->with('success', 'Akun diperbarui.');
    // }

    // public function deleteAccount()
    // {
    //     $user = Auth::user();
    //     $user->delete();
    //     Auth::logout();
    //     return redirect('/')->with('success', 'Akun telah dihapus.');
    // }

    // public function updateNotifications(Request $request)
    // {
    //     $validated = $request->validate([
    //         'mentions' => 'boolean',
    //         'new_content' => 'boolean',
    //         'followed_users_all' => 'boolean',
    //         'followed_users.*' => 'exists:users,id',
    //         'communities_all' => 'boolean',
    //         'communities.*' => 'exists:communities,id',
    //     ]);

    //     Auth::user()->update(['notification_settings' => $validated]);
    //     return redirect()->route('settings.index')->with('success', 'Pengaturan notifikasi diperbarui.');
    // }

    // public function updateContent(Request $request)
    // {
    //     $validated = $request->validate([
    //         'content' => 'array',
    //         'content.*' => 'exists:contents,id',
    //         'action' => 'required|in:delete,archive,move',
    //     ]);

    //     $contents = Content::whereIn('id', $request->content)->where('user_id', Auth::id())->get();
    //     foreach ($contents as $content) {
    //         if ($request->action === 'delete') {
    //             Storage::delete($content->path);
    //             $content->delete();
    //         } elseif ($request->action === 'archive') {
    //             $content->update(['archived' => true]);
    //         } elseif ($request->action === 'move') {
    //             // Logika untuk memindahkan konten (misal ke folder lain)
    //         }
    //     }

    //     return redirect()->route('settings.index')->with('success', 'Konten diperbarui.');
    // }

    // public function addEmail(Request $request)
    // {
    //     $validated = $request->validate(['email' => 'required|email|unique:user_emails,email']);
    //     UserEmail::create(['user_id' => Auth::id(), 'email' => $validated['email'], 'is_verified' => false]);
    //     return redirect()->route('settings.index')->with('success', 'Email ditambahkan, silakan verifikasi.');
    // }

    // public function deleteEmail($id)
    // {
    //     $email = UserEmail::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    //     if (!$email->is_primary) {
    //         $email->delete();
    //         return redirect()->route('settings.index')->with('success', 'Email dihapus.');
    //     }
    //     return redirect()->route('settings.index')->with('error', 'Email utama tidak dapat dihapus.');
    // }

    // public function setPrimaryEmail(Request $request)
    // {
    //     $validated = $request->validate(['email' => 'required|email|exists:user_emails,email']);
    //     $user = Auth::user();
    //     $user->update(['email' => $validated['email']]);
    //     UserEmail::where('user_id', $user->id)->update(['is_primary' => false]);
    //     UserEmail::where('user_id', $user->id)->where('email', $validated['email'])->update(['is_primary' => true]);
    //     return redirect()->route('settings.index')->with('success', 'Email utama diperbarui.');
    // }

    // public function setBackupEmail(Request $request)
    // {
    //     $validated = $request->validate(['backup_email' => 'required|email|exists:user_emails,email']);
    //     Auth::user()->update(['backup_email' => $validated['backup_email']]);
    //     return redirect()->route('settings.index')->with('success', 'Email cadangan diperbarui.');
    // }

    // public function updatePassword(Request $request)
    // {
    //     $validated = $request->validate([
    //         'current_password' => 'required|current_password',
    //         'password' => 'required|min:8|confirmed',
    //     ]);

    //     Auth::user()->update(['password' => Hash::make($validated['password'])]);
    //     return redirect()->route('settings.index')->with('success', 'Kata sandi diperbarui.');
    // }

    // public function toggleTwoFactor()
    // {
    //     $user = Auth::user();
    //     $user->update(['two_factor_enabled' => !$user->two_factor_enabled]);
    //     return redirect()->route('settings.index')->with('success', 'Pengaturan 2FA diperbarui.');
    // }

    // public function logoutAllDevices()
    // {
    //     Auth::logoutOtherDevices(request('password'));
    //     return redirect()->route('settings.index')->with('success', 'Berhasil keluar dari semua perangkat.');
    // }
}