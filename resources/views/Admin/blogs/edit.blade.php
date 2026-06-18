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

    <h3>Edit Blog</h3>

    <form action="{{ route('blogs.update',$blog->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   value="{{ $blog->title }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text"
                   name="category"
                   value="{{ $blog->category }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Author</label>
            <input type="text"
                   name="author"
                   value="{{ $blog->author }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Comments</label>
            <input type="number"
                   name="comments"
                   value="{{ $blog->comments }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Publish Date</label>
            <input type="date"
                   name="publish_date"
                   value="{{ $blog->publish_date }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea name="description"
                      class="form-control"
                      rows="5">{{ $blog->description }}</textarea>
        </div>

        <div class="mb-3">

            @if($blog->image)

            <img src="{{ asset('uploads/blogs/'.$blog->image) }}"
                 width="120"
                 class="mb-2">

            @endif

            <input type="file"
                   name="image"
                   class="form-control">
        </div>

        <div class="mb-3">

            <select name="status"
                    class="form-control">

                <option value="1"
                    {{ $blog->status ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0"
                    {{ !$blog->status ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>

        </div>

        <button class="btn btn-primary">
            Update Blog
        </button>

    </form>

</div>
</div>
</body>
@endsection