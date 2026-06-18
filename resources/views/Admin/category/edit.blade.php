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

    <div class="card shadow-sm border-0">

        <div class="card-header bg-warning">
            <h4 class="mb-0 text-dark">
                <i class="fas fa-edit me-2"></i>
                Edit Category
            </h4>
        </div>

        <div class="card-body">

            <form action="{{ route('categories.update',$category->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Category Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name',$category->name) }}"
                           required>
                </div>

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Current Image
                    </label>

                    <br>

                    @if($category->image)

                        <img src="{{ asset('uploads/categories/'.$category->image) }}"
                             width="120"
                             class="rounded shadow mb-3">

                    @endif

                </div>

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Change Image
                    </label>

                    <input type="file"
                           name="image"
                           class="form-control"
                           accept="image/*">

                </div>

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Status
                    </label>

                    <select name="is_active"
                            class="form-select">

                        <option value="1"
                            {{ $category->is_active ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ !$category->is_active ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>

                <div class="text-end">

                    <a href="{{ route('categories.index') }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>

                    <button type="submit"
                            class="btn btn-warning">
                        Update Category
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
</div>
</body>
@endsection