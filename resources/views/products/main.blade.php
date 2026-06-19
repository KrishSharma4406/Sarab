<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
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

        .table img{
            width:70px;
            height:70px;
            object-fit:cover;
            border-radius:8px;
        }

        .badge-active{
            background:#198754;
        }

        .badge-inactive{
            background:#dc3545;
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

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Products</h2>

        <a href="{{ route('products.create') }}"
           class="btn btn-primary">
            + Create Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-header">
            <h4 class="mb-0">Product List</h4>
        </div>

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($products as $product)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            @if($product->image)
                                <img src="{{ asset('UI/img/products/'.$product->image) }}"
                                     alt="Product">
                            @else
                                No Image
                            @endif
                        </td>

                        <td>{{ $product->name }}</td>

                        <td>{{ $product->category?->name }}</td>

                        <td>{{ $product->sku }}</td>

                        <td>₹{{ number_format($product->price,2) }}</td>

                        <td>
                            @if($product->status)
                                <span class="badge badge-active">
                                    Active
                                </span>
                            @else
                                <span class="badge badge-inactive">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="btn btn-dark btn-sm">
                                Edit
                                </a>

                                <a href="{{ route('products.destroy', $product->id) }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $product->id }}').submit(); }">
                                    Delete
                                </a>

                                <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            No Products Found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
</div>
</body>
</html>