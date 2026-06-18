@extends('Admin.layout.app')

@section('content')

@vite(['resources/css/app.css', 'resources/js/app.js'])
 <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Manage Banners') }}
                </h2>
            </x-slot>
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Reservations</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Guests</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($reservations as $reservation)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reservation->full_name }}</td>
                        <td>{{ $reservation->phone }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->guests }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->time }}</td>

                        <td>
                            <a href="{{ route('reservations.show',$reservation->id) }}"
                               class="btn btn-primary btn-sm">
                               View
                            </a>

                            <form action="{{ route('reservations.destroy',$reservation->id) }}"
                                  method="POST"
                                  style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="8" class="text-center">
                            No Reservations Found
                        </td>
                    </tr>

                @endforelse

                </tbody>
            </table>

            {{ $reservations->links() }}

        </div>
    </div>

</div>
</div>
</body>
@endsection