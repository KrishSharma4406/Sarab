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

    <div class="card-header bg-primary text-white">
        <h4>Add Feedback</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('feedbacks.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Designation</label>
                <input type="text"
                       name="designation"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Photo</label>
                <input type="file"
                       name="image"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Rating</label>

                <select name="rating" class="form-control">

                    <option value="5">★★★★★</option>
                    <option value="4">★★★★</option>
                    <option value="3">★★★</option>
                    <option value="2">★★</option>
                    <option value="1">★</option>

                </select>
            </div>

            <div class="mb-3">

                <label>Feedback Message</label>

                <textarea name="message"
                          rows="5"
                          class="form-control"
                          required></textarea>

            </div>

            <button class="btn btn-success">
                Save Feedback
            </button>

            <a href="{{ route('feedbacks.index') }}"
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
