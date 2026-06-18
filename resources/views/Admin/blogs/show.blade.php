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

    <div class="card">

        <div class="card-header">
            <h3>{{ $blog->title }}</h3>
        </div>

        <div class="card-body">

            @if($blog->image)

            <img src="{{ asset('uploads/blogs/'.$blog->image) }}"
                 width="300"
                 class="mb-3">

            @endif

            <p>
                <strong>Category:</strong>
                {{ $blog->category }}
            </p>

            <p>
                <strong>Author:</strong>
                {{ $blog->author }}
            </p>

            <p>
                <strong>Comments:</strong>
                {{ $blog->comments }}
            </p>

            <p>
                <strong>Publish Date:</strong>
                {{ $blog->publish_date }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ $blog->status ? 'Active' : 'Inactive' }}
            </p>

            <hr>

            <p>
                {{ $blog->description }}
            </p>

        </div>

    </div>

</div>
</div>
</body>
@endsection