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

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">Banner Management</h2>

        <a href="{{ route('banners.create') }}"
           class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Banner
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th width="80">#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th width="220">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($banners as $key => $banner)

                        <tr>

                            <td>{{ $key + 1 }}</td>

                            <td>

                                @if($banner->image)

                                    <img src="{{ asset('uploads/banners/'.$banner->image) }}"
                                         width="120"
                                         class="img-thumbnail">

                                @else

                                    <span class="badge bg-secondary">
                                        No Image
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $banner->title }}
                            </td>

                            <td>

                                @if($banner->status)

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

                                <a href="{{ route('banners.edit',$banner->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>
                                    Edit

                                </a>

                                <form action="{{ route('banners.destroy',$banner->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this banner?')">

                                        <i class="fas fa-trash"></i>
                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center">

                                No Banner Found

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