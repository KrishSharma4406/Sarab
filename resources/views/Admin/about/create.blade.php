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

<div class="container-fluid py-4">

```
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Create About Section</h2>
        <p class="text-muted mb-0">
            Add content for the About section displayed on your website.
        </p>
    </div>

    <a href="{{ route('about.index') }}"
       class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>
        Back
    </a>
</div>

<form action="{{ route('about.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="row">

        <!-- LEFT SIDE -->
        <div class="col-lg-8">

            <div class="card admin-card mb-4">
                <div class="card-body">

                    <h5 class="mb-4">Basic Information</h5>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Small Title
                        </label>

                        <input type="text"
                               name="small_title"
                               class="form-control"
                               placeholder="Our Story">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Main Heading
                        </label>

                        <input type="text"
                               name="title_line_1"
                               class="form-control"
                               placeholder="We Invite You to Visit">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Highlight Text
                        </label>

                        <input type="text"
                               name="title_highlight"
                               class="form-control"
                               placeholder="Our Food Restaurant">
                    </div>

                    <div>
                        <label class="form-label fw-semibold">
                            Description
                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="5"
                                  placeholder="Write about your restaurant..."></textarea>
                    </div>

                </div>
            </div>

            <div class="card admin-card mb-4">
                <div class="card-body">

                    <h5 class="mb-4">
                        Experience Badge
                    </h5>

                    <div class="row">

                        <div class="col-md-6">
                            <label class="form-label">
                                Experience Years
                            </label>

                            <input type="text"
                                   name="experience_years"
                                   class="form-control"
                                   placeholder="12+">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">
                                Experience Text
                            </label>

                            <input type="text"
                                   name="experience_text"
                                   class="form-control"
                                   placeholder="Years of Excellence">
                        </div>

                    </div>

                </div>
            </div>

            <div class="card admin-card mb-4">

                <div class="card-body">

                    <h5 class="mb-4">
                        Features
                    </h5>

                    <div class="feature-box">

                        <h6>Feature 1</h6>

                        <input type="text"
                               name="feature1_title"
                               class="form-control mb-2"
                               placeholder="100% Fresh Ingredients">

                        <textarea name="feature1_description"
                                  class="form-control"
                                  rows="3"></textarea>

                    </div>

                    <div class="feature-box">

                        <h6>Feature 2</h6>

                        <input type="text"
                               name="feature2_title"
                               class="form-control mb-2"
                               placeholder="Award-Winning Recipes">

                        <textarea name="feature2_description"
                                  class="form-control"
                                  rows="3"></textarea>

                    </div>

                    <div class="feature-box">

                        <h6>Feature 3</h6>

                        <input type="text"
                               name="feature3_title"
                               class="form-control mb-2"
                               placeholder="Lightning-Fast Delivery">

                        <textarea name="feature3_description"
                                  class="form-control"
                                  rows="3"></textarea>

                    </div>

                </div>

            </div>

            <div class="card admin-card">

                <div class="card-body">

                    <h5 class="mb-4">
                        Button Settings
                    </h5>

                    <div class="row">

                        <div class="col-md-6">

                            <input type="text"
                                   name="button_text"
                                   class="form-control"
                                   placeholder="View Full Menu">

                        </div>

                        <div class="col-md-6">

                            <input type="text"
                                   name="button_link"
                                   class="form-control"
                                   placeholder="#menu">

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

                        <label class="fw-semibold">
                            Main Image
                        </label>

                        <img id="mainPreview"
                             src="https://placehold.co/600x400?text=Main+Image"
                             class="image-preview mb-3">

                        <input type="file"
                               name="main_image"
                               class="form-control"
                               onchange="previewMainImage(event)">

                        <hr>

                        <label class="fw-semibold">
                            Small Image
                        </label>

                        <img id="smallPreview"
                             src="https://placehold.co/300x250?text=Small+Image"
                             class="image-preview mb-3">

                        <input type="file"
                               name="small_image"
                               class="form-control"
                               onchange="previewSmallImage(event)">

                    </div>

                </div>

                <div class="card admin-card">

                    <div class="card-body">

                        <button type="submit"
                                class="btn btn-success w-100">

                            <i class="fas fa-save me-2"></i>

                            Save About Section

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</form>
```

</div>

<script>

function previewMainImage(event)
{
    document.getElementById('mainPreview').src =
        URL.createObjectURL(event.target.files[0]);
}

function previewSmallImage(event)
{
    document.getElementById('smallPreview').src =
        URL.createObjectURL(event.target.files[0]);
}

</script>

</div>
</body>
@endsection
