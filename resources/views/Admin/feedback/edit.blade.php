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
        <h4>Edit Feedback</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('feedbacks.update',$feedback->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Name</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $feedback->name }}">

            </div>

            <div class="mb-3">

                <label>Designation</label>

                <input type="text"
                       name="designation"
                       class="form-control"
                       value="{{ $feedback->designation }}">

            </div>

            <div class="mb-3">

                <label>Current Image</label>

                <br>

                @if($feedback->image)

                    <img src="{{ asset($feedback->image) }}"
                         width="100">

                @endif

            </div>

            <div class="mb-3">

                <label>Change Image</label>

                <input type="file"
                       name="image"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Rating</label>

                <select name="rating"
                        class="form-control">

                    @for($i=1;$i<=5;$i++)

                        <option value="{{ $i }}"
                        {{ $feedback->rating==$i ? 'selected':'' }}>

                            {{ str_repeat('★',$i) }}

                        </option>

                    @endfor

                </select>

            </div>

            <div class="mb-3">

                <label>Message</label>

                <textarea name="message"
                          rows="5"
                          class="form-control">{{ $feedback->message }}</textarea>

            </div>

            <button class="btn btn-primary">
                Update Feedback
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
