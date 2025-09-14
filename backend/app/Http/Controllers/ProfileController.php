<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if (Auth::id() !== $user->id) {
            abort(403);
        }
        $completion = 0;
        if ($user->name) $completion += 25;
        if ($user->username) $completion += 25;
        if ($user->avatar) $completion += 25;
        if ($user->bio) $completion += 25;
        return view('all.profile.edit', compact('user', 'completion'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (Auth::id() !== $user->id) {
            abort(403);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'bio' => 'nullable|string|max:500',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('profilePicture')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $path = $request->file('profilePicture')->store('avatars', 'public');
            $user->avatar = $path;
        }
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->bio = $request->input('bio');
        $user->save();
        return redirect()->route('profile.edit', $user->id)->with('success', 'Profil berhasil diperbarui.');
    }

    public function toggleNotifications($id)
    {
        $user = User::findOrFail($id);
        if (Auth::id() !== $user->id) {
            abort(403);
        }
        $user->notifications_enabled = !$user->notifications_enabled;
        $user->save();
        return response()->json(['success' => true, 'enabled' => $user->notifications_enabled]);
    }
}