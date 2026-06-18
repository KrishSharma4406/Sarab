<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->paginate(20);

        return view(
            'admin.reservation.index',
            compact('reservations')
        );
    }

    public function show(Reservation $reservation)
    {
        return view('admin.reservation.show',
            compact('reservation'));
    }
    
    public function store(Request $request)
{
    Reservation::create([
        'full_name' => $request->full_name,
        'phone' => $request->phone,
        'email' => $request->email,
        'guests' => $request->guests,
        'date' => $request->date,
        'time' => $request->time,
        'special_request' => $request->special_request,
    ]);

    return back()->with('success', 'Reservation Submitted');
}
}
