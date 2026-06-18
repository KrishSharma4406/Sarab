<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function index()
{
    dd('hello');
    $reservations = Reservation::latest()->paginate(10);

    return view('admin.reservation.index',
        compact('reservations'));
}

public function show(Reservation $reservation)
{
    return view('admin.reservation.show',
        compact('reservation'));
}
protected $fillable = [
        'full_name',
        'phone',
        'email',
        'guests',
        'date',
        'time',
        'special_request'
    ];
}

    
