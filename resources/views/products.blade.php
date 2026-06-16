<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body{
            background:#f5f7fb;
        }

        .card{
            border:none;
            border-radius:15px;
            overflow:hidden;
        }

        .card-header{
            background:linear-gradient(135deg,#0d6efd,#6610f2);
        }

        .form-control,
        .form-select{
            border-radius:10px;
        }

        .btn-submit{
            background:linear-gradient(135deg,#0d6efd,#6610f2);
            border:none;
        }

        .btn-submit:hover{
            opacity:.9;
        }
    </style>
</head>
<body>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

<div class="container py-5">

    <!-- Success Message -->
    @if(Session::has('success'))
<div class="alert alert-success shadow-sm">
    {{ Session::get('success') }}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger shadow-sm">
    {{ Session::get('error') }}
</div>
@endif

    <div class="card shadow-lg">

        <!-- Header -->
        <div class="card-header text-white d-flex justify-content-between align-items-center py-3">

            <h3 class="mb-0">
                <i class="bi bi-plus-square"></i>
                Create Product
            </h3>

            <a href="{{ route('products.main') }}"
               class="btn btn-light">
                <i class="bi bi-arrow-left"></i>
                Back
            </a>

        </div>

        <!-- Form -->
        <div class="card-body p-4">

            <form action="{{ route('products.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Product Name
                    </label>

                    <input type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="Enter product name">

                           @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                           @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Product Image
                    </label>

                    <input type="file"
                    name="image"
                    value="{{ old('image') }}"
                    class="form-control @error('image') is-invalid @enderror"
                    id="image"
                    placeholder="Enter product image URL">

                    @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            SKU
                        </label>

                        <input type="text"
                            name="sku"
                            value="{{ old('sku') }}"
                            class="form-control @error('sku') is-invalid @enderror"
                            id="sku"
                            placeholder="Enter SKU">

                        @error('sku')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Price
                        </label>

                        <input type="text"
                            name="price"
                            value="{{ old('price') }}"
                            class="form-control @error('price') is-invalid @enderror"
                            id="price"
                            placeholder="Enter price">
                            @error('price')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                    </div>

                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit"
                        class="btn btn-submit text-white px-4">
                    <i class="bi bi-save"></i>
                    Save Product
                </button>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>