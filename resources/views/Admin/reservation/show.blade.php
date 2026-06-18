@extends('Admin.layout.app')

@section('content')

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h4>Reservation Details</h4>
        </div>

        <div class="card-body">

            <p><strong>Name:</strong> {{ $reservation->full_name }}</p>
            <p><strong>Email:</strong> {{ $reservation->email }}</p>
            <p><strong>Phone:</strong> {{ $reservation->phone }}</p>
            <p><strong>Guests:</strong> {{ $reservation->guests }}</p>
            <p><strong>Date:</strong> {{ $reservation->date }}</p>
            <p><strong>Time:</strong> {{ $reservation->time }}</p>

            <p>
                <strong>Special Request:</strong><br>
                {{ $reservation->special_request }}
            </p>

        </div>

    </div>

</div>

@endsection