<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\EventRegistration;
use App\Models\EventComment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AdminAgendaController extends Controller
{
    /**
     * Menampilkan daftar semua event
     */
    public function index()
    {
        $events = Event::with(['organizers', 'tickets'])->latest()->get();
        $categories = Category::all(); // ambil semua kategori dari tabel categories

        return view('administrator.admin.agenda.index', [
            'events' => $events,
            'categories' => $categories,
        ]);
    }

    /**
     * Form tambah event
     */
    public function create()
    {
        return view('administrator.admin.agenda.create');
    }

    /**
     * Simpan event baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'   => 'required|integer',
            'title'         => 'required|string|max:100',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date',
            'time_start'    => 'required',
            'time_end'      => 'required',
            'location'      => 'required|string|max:100',
            'description'   => 'required|string',
            'image'         => 'nullable|image|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        }

        $event = Event::create([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'time_start'  => $request->time_start,
            'time_end'    => $request->time_end,
            'location'    => $request->location,
            'description' => $request->description,
            'status'      => 'upcoming',
            'image_path'  => $imagePath
        ]);

        return redirect()->route('administrator.admin.agenda.index')->with('success', 'Event berhasil ditambahkan');
    }

    /**
     * Detail event
     */
    public function show($id)
    {
        $event = Event::with(['organizers', 'tickets', 'comments', 'registrations'])->findOrFail($id);
        return view('administrator.admin.agenda.show', compact('event'));
    }

    /**
     * Form edit event
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('administrator.admin.agenda.edit', compact('event'));
    }

    /**
     * Update event
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id'   => 'required|integer',
            'title'         => 'required|string|max:100',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date',
            'time_start'    => 'required',
            'time_end'      => 'required',
            'location'      => 'required|string|max:100',
            'description'   => 'required|string',
            'image'         => 'nullable|image|max:2048'
        ]);

        $event = Event::findOrFail($id);

        // Jika ganti gambar
        if ($request->hasFile('image')) {
            if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
                Storage::disk('public')->delete($event->image_path);
            }
            $event->image_path = $request->file('image')->store('events', 'public');
        }

        $event->update([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'time_start'  => $request->time_start,
            'time_end'    => $request->time_end,
            'location'    => $request->location,
            'description' => $request->description,
        ]);

        return redirect()->route('administrator.admin.agenda.index')->with('success', 'Event berhasil diperbarui');
    }

    /**
     * Hapus event
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
            Storage::disk('public')->delete($event->image_path);
        }

        $event->delete();

        return redirect()->route('administrator.admin.agenda.index')->with('success', 'Event berhasil dihapus');
    }
}
