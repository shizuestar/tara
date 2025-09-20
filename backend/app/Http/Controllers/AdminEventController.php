<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Event::with(['category', 'registrations', 'tickets']);

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date')) {
            $today = now()->startOfDay();
            switch ($request->date) {
                case 'today':
                    $query->whereDate('start_date', $today);
                    break;
                case 'week':
                    $query->whereBetween('start_date', [$today, $today->copy()->endOfWeek()]);
                    break;
                case 'month':
                    $query->whereBetween('start_date', [$today, $today->copy()->endOfMonth()]);
                    break;
            }
        }

        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%')
                  ->orWhere('location', 'like', '%' . $request->keyword . '%');
        }

        $events = $query->paginate(10);
        $categories = Category::all();
        $activities = ActivityLog::where('type', 'event')->latest()->take(10)->get();

        return view('administrator.admin.event.index', compact('events', 'categories', 'activities'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event->load(['category', 'registrations.user', 'comments.user', 'tickets']);
        $categories = Category::all();
        return view('administrator.admin.event.show', compact('event', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'time_start' => 'required',
            'time_end' => 'required',
            'location' => 'required|string|max:100',
            'description' => 'required|string',
            'status' => 'required|in:upcoming,ongoing,past',
            'image' => 'nullable|image|max:5120',
            'tickets' => 'required|array',
            'tickets.*.type' => 'required|string|max:50',
            'tickets.*.price' => 'required|numeric|min:0',
            'tickets.*.quantity_available' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('events', 'public');
        }

        $event = Event::create($data);

        foreach ($request->tickets as $ticketData) {
            $event->tickets()->create([
                'type' => $ticketData['type'],
                'price' => $ticketData['price'],
                'quantity_available' => $ticketData['quantity_available'],
                'quantity_sold' => 0,
            ]);
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'event',
            'description' => 'Event baru "' . $event->title . '" telah ditambahkan',
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event dan tiket berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'time_start' => 'required',
            'time_end' => 'required',
            'location' => 'required|string|max:100',
            'description' => 'required|string',
            'status' => 'required|in:upcoming,ongoing,past',
            'image' => 'nullable|image|max:5120',
            'tickets' => 'required|array',
            'tickets.*.type' => 'required|string|max:50',
            'tickets.*.price' => 'required|numeric|min:0',
            'tickets.*.quantity_available' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($event->image_path) {
                Storage::disk('public')->delete($event->image_path);
            }
            $data['image_path'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        $event->tickets()->delete();
        foreach ($request->tickets as $ticketData) {
            $event->tickets()->create([
                'type' => $ticketData['type'],
                'price' => $ticketData['price'],
                'quantity_available' => $ticketData['quantity_available'],
                'quantity_sold' => 0,
            ]);
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'event',
            'description' => 'Event "' . $event->title . '" berhasil diperbarui',
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event dan tiket berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $eventTitle = $event->title;

        if ($event->image_path) {
            Storage::disk('public')->delete($event->image_path);
        }
        $event->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'event',
            'description' => 'Event "' . $eventTitle . '" berhasil dihapus',
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus');
    }

    /**
     * Preorder a ticket for the event.
     */
    public function preorderTicket(Request $request, Event $event, Ticket $ticket)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!$ticket->isAvailable()) {
            return redirect()->back()->with('error', 'Tiket tidak tersedia');
        }

        $event->registrations()->create([
            'user_id' => $request->user_id,
            'ticket_id' => $ticket->id,
            'registration_date' => now(),
            'status' => 'booked',
        ]);

        $ticket->increment('quantity_sold');

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'event',
            'description' => 'Tiket untuk event "' . $event->title . '" berhasil dipesan',
        ]);

        return redirect()->back()->with('success', 'Tiket berhasil dipesan');
    }
}