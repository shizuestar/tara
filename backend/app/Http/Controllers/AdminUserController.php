<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $users = User::latest()->paginate(10);
        return view('Administrator.Admin.User.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Administrator.Admin.User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:75',
            'username'  => 'required|string|max:50|unique:users',
            'email'     => 'required|email|max:100|unique:users',
            'password'  => 'required|string|min:8|confirmed',
            'avatar'    => 'nullable|string|max:225',
            'bio'       => 'nullable|string',
            'role'      => ['required', Rule::in(['admin', 'kurator', 'member'])],
            'status'    => ['required', Rule::in(['active', 'inactive', 'banned'])],
        ]);

        User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'avatar'    => $request->avatar,
            'bio'       => $request->bio,
            'role'      => $request->role,
            'status'    => $request->status,
        ]);

        return redirect()->route('Administrator.Admin.User.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('Administrator.Admin.User.index')->with('success', 'User berhasil dihapus.');
    }
}
