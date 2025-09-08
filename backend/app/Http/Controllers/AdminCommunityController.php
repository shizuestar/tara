<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminCommunityController extends Controller
{

    public function index(Request $request)
    {
        $query = Community::query();

        if ($request->has('type') && $request->type !== '') {
            $query->where('type', $request->type);
        }

        if ($request->has('member_count') && $request->member_count !== '') {
            if ($request->member_count === '0-50') {
                $query->where('member_count', '<=', 50);
            } elseif ($request->member_count === '51-100') {
                $query->whereBetween('member_count', [51, 100]);
            } elseif ($request->member_count === '101+') {
                $query->where('member_count', '>=', 101);
            }
        }

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        if ($request->has('keyword') && $request->keyword !== '') {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->keyword . '%')
                  ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }

        $communities = $query->paginate(6);

        return view('Administrator.Admin.Komunitas.index', compact('communities'));
    }

    public function create()
    {
        return view('Administrator.Admin.Komunitas.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:Puisi,Desain,Musik,Coding,Fotografi,Umum',
            'description' => 'required|string',
            'type' => 'required|string|in:public,private',
            'status' => 'required|string|in:active,inactive',
            'user_id' => 'required|integer|exists:users,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'moderator_ids' => 'nullable|string',
            'rules' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('community_covers', 'public');
        }

        Community::create($data);

        return redirect()->route('komunitas.index')->with('success', 'Komunitas berhasil dibuat.');
    }

    public function show(string $id)
    {
        $getCommunityById = Community::findOrFail($id);
        return view('Administrator.Admin.Komunitas.show', compact('getCommunityById'));
    }

    public function edit(string $id)
    {
        $community = Community::findOrFail($id);
        return response()->json($community);
    }

    public function update(Request $request, string $id)
    {
        $community = Community::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:Puisi,Desain,Musik,Coding,Fotografi,Umum',
            'description' => 'required|string',
            'type' => 'required|string|in:public,private',
            'status' => 'required|string|in:active,inactive',
            'user_id' => 'required|integer|exists:users,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'moderator_ids' => 'nullable|string',
            'rules' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            if ($community->cover_image) {
                Storage::disk('public')->delete($community->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('community_covers', 'public');
        }

        $community->update($data);

        return redirect()->route('komunitas.index')->with('success', 'Komunitas berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $community = Community::findOrFail($id);

        if ($community->cover_image) {
            Storage::disk('public')->delete($community->cover_image);
        }

        $community->delete();

        return redirect()->route('komunitas.index')->with('success', 'Komunitas berhasil dihapus.');
    }
}