<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function book(Request $request, $eventId ) {
        $event = Event::find($eventId);
        $userId = Auth::id();
        if ($event->availableTickets > 0) {
            $booking = Booking::create([
                'user_id' => $userId,
                'event_id' => $eventId,
            ]);
            $event->decrement('availableTickets');
            return redirect()->route('book.history')->with('success', 'User deleted successfully');
        }
        return response()->json(['success' => false, 'message' => 'No tickets available']);
    }
    
    public function history() {
        $userId = Auth::id();
        $bookings = Booking::where('user_id', $userId)->with(['event', 'user'])->get();
        return view('book.history',compact('bookings'));
    }
    
}
