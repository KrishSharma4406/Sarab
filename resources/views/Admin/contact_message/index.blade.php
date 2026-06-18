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
            <h4>Contact Messages</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($messages as $message)

                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ $message->subject }}</td>

                        <td>

                            <a href="{{ route('contact-messages.show',$message->id) }}"
                               class="btn btn-primary btn-sm">
                                View
                            </a>

                            <form action="{{ route('contact-messages.destroy',$message->id) }}"
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
                        <td colspan="6" class="text-center">
                            No Messages Found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $messages->links() }}

        </div>

    </div>

</div>
</div>
</body>
@endsection