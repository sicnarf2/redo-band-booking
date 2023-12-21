<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Band;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $bookings = Booking::with('band')->get();
        $bands = Band::get();
        return view('bookings.index', compact('bookings', 'bands'));
    }

    public function store(Request $request, Booking $booking)
    {
        try {
            $validatedData = $request->validate([
                'name'=> 'required|string',
                'email'=> 'required|string',
                'booking_date'=> 'required|string',
                'booking_time'=> 'required|string',
                'band_id' => 'required|exists:bands,id'

            ]);

            $booking->name = $validatedData['name'];
            $booking->email = $validatedData['email'];
            $booking->booking_date = $validatedData['booking_date'];
            $booking->booking_time = $validatedData['booking_time'];
            $booking->band_id = $validatedData['band_id'];
            $booking->save();

            return redirect()->route('bookings.store')->with('success', 'Booking created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating booking: ' . $e->getMessage());
    return redirect()->back()->with('error', 'An error occurred while creating the user.');
        }
    }


    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.booking-update', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|string',
            'booking_date'=> 'required|string',
            'booking_time'=> 'required|string',
            'band_id' => 'required|exists:bands,id'
        ]);

        $booking = Booking::findOrFail($id);

        $booking->name = $validatedData['name'];
        $booking->email = $validatedData['email'];
        $booking->booking_date = $validatedData['booking_date'];
        $booking->booking_time = $validatedData['booking_time'];
        $booking->band_id = $validatedData['band_id'];

        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }


    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Task deleted successfully.');
    }
}
