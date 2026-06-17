@extends('Admin.layout.app')

@section('content')

<div class="container">

    <h2>Create Food Showcase</h2>

    <form action="{{ route('foods_showcase.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Subtitle</label>
            <input type="text"
                   name="subtitle"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Highlight Text</label>
            <input type="text"
                   name="highlight_text"
                   class="form-control">
        </div>

        @for($i=1;$i<=5;$i++)
            <div class="mb-3">
                <label>Image {{ $i }}</label>
                <input type="file"
                       name="image{{ $i }}"
                       class="form-control">
            </div>
        @endfor

        <button type="submit"
                class="btn btn-success">
            Save
        </button>

    </form>

</div>

@endsection