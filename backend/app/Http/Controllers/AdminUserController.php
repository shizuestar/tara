<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('year') && $request->year != '') {
            $query->whereYear('created_at', $request->year);
        }

        if ($request->has('keyword') && $request->keyword != '') {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->keyword . '%')
                  ->orWhere('username', 'like', '%' . $request->keyword . '%')
                  ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        $users = $query->latest()->paginate(10);

        $activities = ActivityLog::where('type', 'user')->latest()->take(10)->get();

        return view('administrator.admin.user.index', compact('users', 'activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'nullable|url|max:255',
            'bio' => 'nullable|string',
            'role' => ['required', Rule::in(['admin', 'kurator', 'member'])],
            'status' => ['required', Rule::in(['active', 'inactive', 'banned'])],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $request->avatar,
            'bio' => $request->bio,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'user',
            'description' => 'Pengguna baru "' . $user->name . '" telah ditambahkan',
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:50', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|url|max:255',
            'bio' => 'nullable|string',
            'role' => ['required', Rule::in(['admin', 'kurator', 'member'])],
            'status' => ['required', Rule::in(['active', 'inactive', 'banned'])],
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'avatar' => $request->avatar,
            'bio' => $request->bio,
            'role' => $request->role,
            'status' => $request->status,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'user',
            'description' => 'Pengguna "' . $user->name . '" berhasil diperbarui datanya',
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $userName = $user->name;
        $user->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'user',
            'description' => 'Pengguna "' . $userName . '" berhasil dihapus',
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}