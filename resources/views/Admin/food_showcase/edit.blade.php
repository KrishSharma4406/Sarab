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

<div class="container">

    <h2>Edit Food Showcase</h2>

    <form action="{{ route('foods_showcase.update',$food->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Subtitle</label>
            <input type="text"
                   name="subtitle"
                   class="form-control"
                   value="{{ $food->subtitle }}">
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ $food->title }}">
        </div>

        <div class="mb-3">
            <label>Highlight Text</label>
            <input type="text"
                   name="highlight_text"
                   class="form-control"
                   value="{{ $food->highlight_text }}">
        </div>

        @for($i=1;$i<=5;$i++)

            <div class="mb-3">

                <label>Image {{ $i }}</label>

                <input type="file"
                       name="image{{ $i }}"
                       class="form-control">

                @php
                    $imageField = 'image'.$i;
                @endphp

                @if($food->$imageField)

                    <img src="{{ asset('uploads/foodshowcase/'.$food->$imageField) }}"
                         width="120"
                         class="mt-2 rounded">

                @endif

            </div>

        @endfor

        <button type="submit"
                class="btn btn-primary">
            Update
        </button>

    </form>

</div>
</div>
</body>
@endsection