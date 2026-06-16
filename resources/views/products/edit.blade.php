<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
        color:white;
    }

    .form-control,
    .form-select{
        border-radius:10px;
    }

    .btn-update{
        background:linear-gradient(135deg,#0d6efd,#6610f2);
        border:none;
        color:white;
    }

    .btn-update:hover{
        opacity:.9;
        color:white;
    }

    .product-image{
        width:120px;
        height:120px;
        object-fit:cover;
        border-radius:10px;
        border:1px solid #ddd;
    }
</style>

 
     <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
 <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

<div class="container py-5">

<div class="card shadow-lg">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Edit Product</h3>

        <a href="{{ route('products.main') }}"
           class="btn btn-light">
            Back
        </a>
    </div>

    <div class="card-body p-4">

        <form action="{{ route('products.update',$product->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Product Name
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name',$product->name) }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Current Image
                </label>

                <div class="mb-2">
                    <img src="{{ asset('UI/img/products/'.$product->image) }}"
                         class="product-image">
                </div>

                <input type="file"
                       name="image"
                       class="form-control">
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        SKU
                    </label>

                    <input type="text"
                           name="sku"
                           value="{{ old('sku',$product->sku) }}"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Price
                    </label>

                    <input type="number"
                           name="price"
                           value="{{ old('price',$product->price) }}"
                           class="form-control">
                </div>

            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Status
                </label>

                <select name="status" class="form-select">
                    <option value="1"
                        {{ $product->status == 1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ $product->status == 0 ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
            </div>

            <button type="submit"
                    class="btn btn-update px-4">
                Update Product
            </button>

        </form>

    </div>

</div>

</div>
</div>
</body>
</html>
