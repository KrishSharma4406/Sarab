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

<div class="container py-4">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                Edit Opening Hours
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('opening-hours.update',$hour->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Day Name
                        </label>

                        <input type="text"
                               name="day_name"
                               value="{{ $hour->day_name }}"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Opening Time
                        </label>

                        <input type="time"
                               name="opening_time"
                               value="{{ $hour->opening_time }}"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Closing Time
                        </label>

                        <input type="time"
                               name="closing_time"
                               value="{{ $hour->closing_time }}"
                               class="form-control">

                    </div>

                    <div class="col-md-12 mb-3">

                        <div class="form-check">

                            <input type="checkbox"
                                   name="is_closed"
                                   class="form-check-input"
                                   id="closed"

                                   {{ $hour->is_closed ? 'checked' : '' }}>

                            <label class="form-check-label"
                                   for="closed">

                                Mark as Closed

                            </label>

                        </div>

                    </div>

                </div>

                <div class="text-end">

                    <a href="{{ route('opening-hours.index') }}"
                       class="btn btn-secondary">

                        Back

                    </a>

                    <button type="submit"
                            class="btn btn-warning">

                        Update Data

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
</div>
</body>
@endsection