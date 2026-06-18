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

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Food Showcase</h2>

        <a href="{{ route('foods_showcase.create') }}"
           class="btn btn-primary">
            Add New
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subtitle</th>
                <th>Title</th>
                <th>Highlight Text</th>
                <th>Image</th>
                <th width="180">Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($foods as $food)

            <tr>
                <td>{{ $food->id }}</td>
                <td>{{ $food->subtitle }}</td>
                <td>{{ $food->title }}</td>
                <td>{{ $food->highlight_text }}</td>

                <td>
                    @if($food->image1)
                        <img src="{{ asset('uploads/foodshowcase/'.$food->image1) }}"
                             width="80">
                    @endif
                </td>

                <td>
                    <a href="{{ route('foods_showcase.edit',$food->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('foods_showcase.destroy',$food->id) }}"
                          method="POST"
                          style="display:inline-block">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this record?')">
                            Delete
                        </button>

                    </form>
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    No Data Found
                </td>
            </tr>

        @endforelse

        </tbody>
    </table>

</div>
</div>
</body>
@endsection