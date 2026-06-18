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
            <h4>Message Details</h4>
        </div>

        <div class="card-body">

            <p><strong>Name:</strong> {{ $message->name }}</p>
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Phone:</strong> {{ $message->phone }}</p>
            <p><strong>Subject:</strong> {{ $message->subject }}</p>

            <hr>

            <h6>Message</h6>

            <p>{{ $message->message }}</p>

        </div>

    </div>

</div>
</div>
</body>
@endsection