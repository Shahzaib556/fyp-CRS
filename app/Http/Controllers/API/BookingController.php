<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // User: Make a booking
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Check if car is already booked for requested period
        $overlap = Booking::where('car_id', $request->car_id)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                      ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                      ->orWhere(function ($query) use ($request) {
                          $query->where('start_date', '<=', $request->start_date)
                                ->where('end_date', '>=', $request->end_date);
                      });
            })->exists();

        if ($overlap) {
            return response()->json(['message' => 'Car already booked for selected dates'], 409);
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'pending',
        ]);

        return response()->json(['message' => 'Booking created', 'booking' => $booking]);
    }

    // Admin: View all bookings
    public function index()
    {
        $bookings = Booking::with(['user', 'car'])->get();
        return response()->json($bookings);
    }

    // Admin: Change booking status
    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:approved,cancelled',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return response()->json(['message' => 'Booking status updated', 'booking' => $booking]);
    }

    // Optional: View user's own bookings
    public function myBookings()
    {
        return Auth::user()->bookings()->with('car')->get();
    }
}
