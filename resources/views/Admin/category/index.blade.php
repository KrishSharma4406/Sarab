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

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Manage Categories</h2>

        <a href="{{ route('categories.create') }}"
           class="btn btn-primary">
            + Add Category
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Category List</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th width="60">ID</th>
                            <th width="120">Image</th>
                            <th>Name</th>
                            <th width="120">Products</th>
                            <th width="120">Status</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($categories as $category)

                        <tr>

                            <td>{{ $category->id }}</td>

                            <td>

                                @if($category->image)
                                    <img src="{{ asset('uploads/categories/'.$category->image) }}"
                                         width="70"
                                         height="70"
                                         class="rounded"
                                         style="object-fit:cover;">
                                @else
                                    No Image
                                @endif

                            </td>

                            <td>
                                <strong>{{ $category->name }}</strong>
                            </td>

                            <td>
                                {{ $category->products_count }}
                            </td>

                            <td>

                                @if($category->is_active)
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>
                                @endif

                            </td>

                            <td>

                                <a href="{{ route('categories.edit',$category->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy',$category->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Delete Category?')"
                                            class="btn btn-danger btn-sm">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-5">
                                No Categories Found
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</div>
</body>
@endsection