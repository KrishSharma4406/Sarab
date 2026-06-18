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
    <div class="d-flex justify-content-between mb-3">
        <h3>Blogs</h3>

        <a href="{{ route('blogs.create') }}"
           class="btn btn-primary">
            Add Blog
        </a>
    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th width="220">Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($blogs as $blog)

        <tr>

            <td>{{ $blog->id }}</td>

            <td>
                @if($blog->image)
                <img src="{{ asset('uploads/blogs/'.$blog->image) }}"
                     width="80">
                @endif
            </td>

            <td>{{ $blog->title }}</td>

            <td>{{ $blog->category }}</td>

            <td>{{ $blog->author }}</td>

            <td>
                {{ $blog->status ? 'Active' : 'Inactive' }}
            </td>

            <td>

                <a href="{{ route('blogs.show',$blog->id) }}"
                   class="btn btn-info btn-sm">
                    View
                </a>

                <a href="{{ route('blogs.edit',$blog->id) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('blogs.destroy',$blog->id) }}"
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
            <td colspan="7" class="text-center">
                No Blogs Found
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>
</div>
</body>
@endsection