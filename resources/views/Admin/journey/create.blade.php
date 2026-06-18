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

<div class="container-fluid">

    <div class="card">

        <div class="card-header">
            <h3>Add Journey</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('journey.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        Year
                    </label>

                    <input type="text"
                           name="year"
                           class="form-control"
                           placeholder="2012"
                           value="{{ old('year') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Title
                    </label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Description
                    </label>

                    <textarea name="description"
                              rows="5"
                              class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Position
                    </label>

                    <input type="number"
                           name="position"
                           class="form-control"
                           value="0">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-control">

                        <option value="1">
                            Active
                        </option>

                        <option value="0">
                            Inactive
                        </option>

                    </select>
                </div>

                <button type="submit"
                        class="btn btn-success">
                    Save Journey
                </button>

                <a href="{{ route('journey.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>
</div>
</body>

@endsection