@extends('Admin.layout.app')

@section('content')

<div class="container-fluid py-4">

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">About Section</h2>
        <p class="text-muted mb-0">
            Manage your restaurant About Section
        </p>
    </div>

    <a href="{{ route('about.index') }}"
       class="btn btn-outline-secondary">
        Back
    </a>
</div>

<form action="{{ isset($about)
                    ? route('about.update',$about->id)
                    : route('about.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    @if(isset($about))
        @method('PUT')
    @endif

    <div class="row">

        <!-- LEFT SIDE -->
        <div class="col-lg-8">

            <div class="card admin-card mb-4">
                <div class="card-body">

                    <div class="section-title">
                        Basic Information
                    </div>

                    <div class="mb-3">
                        <label>Small Title</label>
                        <input type="text"
                               name="small_title"
                               class="form-control"
                               value="{{ $about->small_title ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Main Heading</label>
                        <input type="text"
                               name="title_line_1"
                               class="form-control"
                               value="{{ $about->title_line_1 ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Highlight Text</label>
                        <input type="text"
                               name="title_highlight"
                               class="form-control"
                               value="{{ $about->title_highlight ?? '' }}">
                    </div>

                    <div>
                        <label>Description</label>

                        <textarea name="description"
                                  class="form-control">{{ $about->description ?? '' }}</textarea>
                    </div>

                </div>
            </div>

            <div class="card admin-card mb-4">
                <div class="card-body">

                    <div class="section-title">
                        Experience Badge
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label>Years</label>

                            <input type="text"
                                   name="experience_years"
                                   class="form-control"
                                   value="{{ $about->experience_years ?? '' }}">
                        </div>

                        <div class="col-md-6">
                            <label>Text</label>

                            <input type="text"
                                   name="experience_text"
                                   class="form-control"
                                   value="{{ $about->experience_text ?? '' }}">
                        </div>

                    </div>

                </div>
            </div>

            <div class="card admin-card mb-4">
                <div class="card-body">

                    <div class="section-title">
                        Features
                    </div>

                    <div class="feature-box">

                        <h6>Feature 1</h6>

                        <input type="text"
                               name="feature1_title"
                               class="form-control mb-2"
                               placeholder="Title"
                               value="{{ $about->feature1_title ?? '' }}">

                        <textarea name="feature1_description"
                                  class="form-control"
                                  placeholder="Description">{{ $about->feature1_description ?? '' }}</textarea>

                    </div>

                    <div class="feature-box">

                        <h6>Feature 2</h6>

                        <input type="text"
                               name="feature2_title"
                               class="form-control mb-2"
                               value="{{ $about->feature2_title ?? '' }}">

                        <textarea name="feature2_description"
                                  class="form-control">{{ $about->feature2_description ?? '' }}</textarea>

                    </div>

                    <div class="feature-box">

                        <h6>Feature 3</h6>

                        <input type="text"
                               name="feature3_title"
                               class="form-control mb-2"
                               value="{{ $about->feature3_title ?? '' }}">

                        <textarea name="feature3_description"
                                  class="form-control">{{ $about->feature3_description ?? '' }}</textarea>

                    </div>

                </div>
            </div>

            <div class="card admin-card">
                <div class="card-body">

                    <div class="section-title">
                        Button Settings
                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <input type="text"
                                   name="button_text"
                                   class="form-control"
                                   placeholder="Button Text"
                                   value="{{ $about->button_text ?? '' }}">

                        </div>

                        <div class="col-md-6">

                            <input type="text"
                                   name="button_link"
                                   class="form-control"
                                   placeholder="Button Link"
                                   value="{{ $about->button_link ?? '' }}">

                        </div>

                    </div>

                </div>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-lg-4">

            <div class="publish-card">

                <div class="card admin-card mb-4">

                    <div class="card-header bg-white">
                        Images
                    </div>

                    <div class="card-body">

                        <label>Main Image</label>

                        <img id="mainPreview"
                             src="{{ isset($about->main_image)
                                    ? asset('uploads/about/'.$about->main_image)
                                    : 'https://placehold.co/500x300?text=Main+Image' }}"
                             class="image-preview mb-3">

                        <input type="file"
                               name="main_image"
                               class="form-control">

                        <hr>

                        <label>Small Image</label>

                        <img id="smallPreview"
                             src="{{ isset($about->small_image)
                                    ? asset('uploads/about/'.$about->small_image)
                                    : 'https://placehold.co/300x200?text=Small+Image' }}"
                             class="image-preview mb-3">

                        <input type="file"
                               name="small_image"
                               class="form-control">

                    </div>

                </div>

                <div class="card admin-card">

                    <div class="card-body">

                        <button type="submit"
                                class="btn btn-success w-100">

                            <i class="fas fa-save me-2"></i>

                            {{ isset($about)
                                ? 'Update About Section'
                                : 'Save About Section' }}

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

</div>

@endsection
