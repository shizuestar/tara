<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\EventComment;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::with(['category', 'tickets']);

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

        $events = $query->paginate(3);
        $categories = Category::all();

        return view('public.event.index', compact('events', 'categories'));
    }

    public function show(Event $event)
    {
        $event->load(['category', 'tickets', 'comments.user', 'comments.replies']);
        $relatedEvents = Event::where('category_id', $event->category_id)
                            ->where('id', '!=', $event->id)
                            ->take(3)
                            ->get();

        return view('public.event.show', compact('event', 'relatedEvents'));
    }

    public function storeComment(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:500',
            'parent_id' => 'nullable|exists:event_comments,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        EventComment::create([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function preorderTicket(Request $request, Event $event, Ticket $ticket)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'email' => 'required|email',
            'quantity' => 'required|integer|min:1|max:5',
        ]);

        $existingRegistration = EventRegistration::where([
            'event_id' => $event->id,
            'user_id' => $request->user_id,
            'ticket_id' => $ticket->id,
        ])->first();

        if ($existingRegistration && $existingRegistration->status == 'booked') {
            return redirect()->route('event.payment', $existingRegistration->id);
        }

        if ($ticket->quantity_sold + $request->quantity > $ticket->quantity_available) {
            return redirect()->back()->withErrors(['quantity' => 'Stok tiket tidak cukup.']);
        }

        $registration = EventRegistration::updateOrCreate(
            [
                'event_id' => $event->id,
                'user_id' => $request->user_id,
                'ticket_id' => $ticket->id,
            ],
            [
                'quantity' => $request->quantity,
                'registration_date' => now(),
                'status' => 'booked',
            ]
        );

        return redirect()->route('event.payment', $registration->id);
    }

    public function payment(Request $request, EventRegistration $registration)
    {
        if ($registration->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Akses tidak diizinkan');
        }

        if ($registration->status === 'paid') {
            return redirect()->back()->with('error', 'Pembayaran sudah diproses');
        }

        return view('public.event.payment', compact('registration'));
    }

    public function processPayment(Request $request, EventRegistration $registration)
    {
        if ($registration->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Akses tidak diizinkan');
        }

        $request->validate([
            'ticket_quantity' => 'required|integer|min:1|max:5',
            'payment_method' => 'required|in:credit_card,bank_transfer,ewallet',
            'payment_proof' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        if ($registration->ticket->quantity_sold + $request->ticket_quantity > $registration->ticket->quantity_available) {
            return redirect()->back()->withErrors(['ticket_quantity' => 'Stok tiket tidak cukup.']);
        }

        $registration->update([
            'quantity' => $request->ticket_quantity,
            'payment_method' => $request->payment_method,
            'status' => 'paid',
        ]);

        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('payment_proofs', 'public');
            $registration->update(['payment_proof' => $path]);
        }

        $registration->ticket->increment('quantity_sold', $request->ticket_quantity);

        return redirect()->route('events.show', $registration->event_id)->with('success', 'Pembayaran berhasil!');
    }

    public function cancelRegistration(Request $request, EventRegistration $registration)
    {
        if ($registration->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Akses tidak diizinkan');
        }

        if ($registration->status !== 'booked') {
            return redirect()->back()->with('error', 'Registrasi tidak dapat dibatalkan karena sudah diproses atau dibatalkan');
        }

        $registration->update([
            'status' => 'canceled',
        ]);

        return redirect()->route('events.show', $registration->event_id)->with('success', 'Registrasi berhasil dibatalkan');
    }
}