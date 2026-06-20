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

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4>Edit Banner</h4>

        </div>

        <div class="card-body">

            <form action="{{ route('banner.update',$banner->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Banner Title
                    </label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title',$banner->title) }}">

                    @error('title')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Banner Image
                    </label>

                    <input type="file"
                           name="image"
                           class="form-control">

                    @error('image')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                @if($banner->image)

                    <div class="mb-3">

                        <img src="{{ asset('uploads/banners/'.$banner->image) }}"
                             width="250"
                             class="img-thumbnail">

                    </div>

                @endif

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-control">

                        <option value="1"
                            {{ $banner->status == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ $banner->status == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>

                <button type="submit"
                        class="btn btn-success">

                    Update Banner

                </button>

                <a href="{{ route('banner.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>
</div>
</body>
@endsection