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

        <div class="card-header bg-success text-white">

            <h4 class="mb-0">
                Add Opening Hours
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('opening-hours.store') }}"
                  method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Day Name
                        </label>

                        <input type="text"
                               name="day_name"
                               class="form-control"
                               placeholder="Monday - Tuesday"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Opening Time
                        </label>

                        <input type="time"
                               name="opening_time"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Closing Time
                        </label>

                        <input type="time"
                               name="closing_time"
                               class="form-control">

                    </div>

                    <div class="col-md-12 mb-3">

                        <div class="form-check">

                            <input type="checkbox"
                                   name="is_closed"
                                   id="closed"
                                   class="form-check-input">

                            <label for="closed"
                                   class="form-check-label">

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
                            class="btn btn-success">

                        Save Data

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
</div>
</body>
@endsection