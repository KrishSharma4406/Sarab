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

    <h3>Add Blog</h3>

    <form action="{{ route('blogs.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text"
                   name="category"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Author</label>
            <input type="text"
                   name="author"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Comments</label>
            <input type="number"
                   name="comments"
                   class="form-control"
                   value="0">
        </div>

        <div class="mb-3">
            <label>Publish Date</label>
            <input type="date"
                   name="publish_date"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description"
                      class="form-control"
                      rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file"
                   name="image"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>

            <select name="status"
                    class="form-control">

                <option value="1">
                    Active
                </option>

                <option value="0">
                    Inactive
                </option>

            </select>
        </div>

        <button class="btn btn-success">
            Save Blog
        </button>

    </form>

</div>
</div>
</body>
@endsection