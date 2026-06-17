@extends('Admin.layout.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>About Section</h2>

        <a href="{{ route('about.create') }}"
           class="btn btn-primary">
            Add About Section
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($abouts->count())

        <div class="row">

            @foreach($abouts as $about)

                <div class="col-md-6 mb-4">

                    <div class="card shadow border-0">

                        <img src="{{ asset('uploads/about/'.$about->main_image) }}"
                             class="card-img-top"
                             style="height:250px;object-fit:cover;">

                        <div class="card-body">

                            <h4>
                                {{ $about->title_line_1 }}
                                <span class="text-danger">
                                    {{ $about->title_highlight }}
                                </span>
                            </h4>

                            <p>
                                {{ Str::limit($about->description,120) }}
                            </p>

                            <a href="{{ route('about.edit',$about->id) }}"
                               class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('about.destroy',$about->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="card shadow-sm border-0">

            <div class="card-body text-center py-5">

                <i class="fas fa-info-circle fa-4x text-secondary mb-3"></i>

                <h4>No About Section Added Yet</h4>

                <p class="text-muted">
                    Click the button above to create your first About Section.
                </p>

            </div>

        </div>

    @endif

</div>

@endsection