@extends('Admin.layout.app')

@section('title', 'Offer Sections')

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
        <h3 class="fw-bold">Offer Sections</h3>

        <a href="{{ route('offer.create') }}"
           class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Offer
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">
                <tr>
                    <th width="70">ID</th>
                    <th width="120">Image</th>
                    <th>Title</th>
                    <th>Offer Price</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
                </thead>

                <tbody>

                @forelse($offers as $offer)

                    <tr>

                        <td>{{ $offer->id }}</td>

                        <td>
                            @if($offer->image)
                                <img src="{{ asset('uploads/offers/'.$offer->image) }}"
                                     width="100"
                                     class="img-thumbnail">
                            @endif
                        </td>

                        <td>
                            <strong>{{ $offer->title }}</strong>
                            <br>
                            <small class="text-muted">
                                {{ $offer->highlight_text }}
                            </small>
                        </td>

                        <td>
                            <del>${{ $offer->old_price }}</del>
                            <br>
                            <strong class="text-danger">
                                ${{ $offer->new_price }}
                            </strong>
                        </td>

                        <td>
                            @if($offer->status)
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

                            <a href="{{ route('offer.edit',$offer->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('offer.destroy',$offer->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete this record?')"
                                    class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No Record Found
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
@endsection