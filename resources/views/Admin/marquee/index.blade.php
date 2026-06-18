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

    <div class="d-flex justify-content-between mb-3">

        <h3>Marquee Items</h3>

        <a href="{{ route('marquees.create') }}"
           class="btn btn-primary">
            Add New
        </a>

    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th width="200">Action</th>
            </tr>
        </thead>

        <tbody>

        @foreach($marquees as $item)

            <tr>

                <td>{{ $item->id }}</td>

                <td>{{ $item->title }}</td>

                <td>
                    {{ $item->status ? 'Active' : 'Inactive' }}
                </td>

                <td>

                    <a href="{{ route('marquees.edit',$item->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('marquees.destroy',$item->id) }}"
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

        @endforeach

        </tbody>

    </table>

</div>
</div>
</body>
@endsection