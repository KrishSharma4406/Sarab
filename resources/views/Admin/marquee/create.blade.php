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

    <div class="card shadow-sm">

        <div class="card-header">
            <h4>Add Marquee Item</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('marquees.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label>Title</label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Status</label>

                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-success">
                    Save
                </button>

            </form>

        </div>

    </div>

</div>
</div>
</body>
@endsection