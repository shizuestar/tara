<?php

namespace App\Http\Controllers;
// Jika controller kamu berada di App\Http\Controllers langsung, ganti namespace ke App\Http\Controllers

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class AdminAgendaController extends Controller
{
    // Tampilkan index (di sini kita kirim $events dan $categories)
    public function index(Request $request)
    {
        $query = Event::with(['category', 'registrations']);

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $events = $query->latest()->paginate(10);
        $categories = Category::orderBy('name')->get();

        // sesuaikan nama view dengan struktur project-mu:
        // contoh 1: resources/views/admin/events/index.blade.php
        return view('administrator.admin.agenda.index', compact('events', 'categories'));

        // jika view-mu ada di resources/views/administrator/admin/agenda/index.blade.php
        // return view('administrator.admin.agenda.index', compact('events', 'categories'));
    }

    // Simpan event baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:100',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'time_start'  => 'required',
            'time_end'    => 'required',
            'location'    => 'required|string|max:100',
            'description' => 'required|string',
            'status'      => 'required|in:upcoming,ongoing,past',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,svg|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('agenda', 'public');
        }

        Event::create([
            'category_id' => $validated['category_id'],
            'title'       => $validated['title'],
            'start_date'  => $validated['start_date'],
            'end_date'    => $validated['end_date'],
            'time_start'  => $validated['time_start'],
            'time_end'    => $validated['time_end'],
            'location'    => $validated['location'],
            'description' => $validated['description'],
            'status'      => $validated['status'],
            'image_path'  => $validated['image_path'] ?? null,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    // Hapus event
    public function destroy(Event $event)
    {
        if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
            Storage::disk('public')->delete($event->image_path);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus');
    }
}
