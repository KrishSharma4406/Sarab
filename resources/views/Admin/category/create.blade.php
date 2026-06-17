@extends('Admin.layout.app')

@section('content')

<h1 style="color:red">CREATE CATEGORY PAGE</h1>

<div class="container-fluid py-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Create Category</h2>
            <p class="text-muted mb-0">
                Add a new category for your food menu.
            </p>
        </div>

        <a href="{{ route('categories.index') }}"
           class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Categories
        </a>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row">

            <!-- Left Section -->
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0 fw-semibold">
                            Category Information
                        </h5>
                    </div>

                    <div class="card-body">

                        <!-- Category Name -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Category Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg"
                                   placeholder="Enter category name"
                                   value="{{ old('name') }}"
                                   required>

                        </div>

                        <!-- Category Image -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Category Image
                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control"
                                   accept="image/*"
                                   onchange="previewImage(event)">

                            <small class="text-muted">
                                Recommended size: 500x500 px
                            </small>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Right Section -->
            <div class="col-lg-4">

                <!-- Image Preview -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white">
                        <h6 class="mb-0 fw-semibold">
                            Preview
                        </h6>
                    </div>

                    <div class="card-body text-center">

                        <img id="imagePreview"
                             src="https://placehold.co/250x250?text=Preview"
                             class="img-fluid rounded border"
                             style="max-height:250px; object-fit:cover;">

                    </div>

                </div>

                <!-- Publish Settings -->
                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white">
                        <h6 class="mb-0 fw-semibold">
                            Publish
                        </h6>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Status
                            </label>

                            <select name="is_active"
                                    class="form-select">

                                <option value="1">
                                    Active
                                </option>

                                <option value="0">
                                    Inactive
                                </option>

                            </select>

                        </div>

                        <div class="d-grid gap-2">

                            <button type="submit"
                                    class="btn btn-success">

                                <i class="fas fa-save me-2"></i>
                                Save Category

                            </button>

                            <a href="{{ route('categories.index') }}"
                               class="btn btn-light border">

                                Cancel

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

<script>
function previewImage(event)
{
    const reader = new FileReader();

    reader.onload = function()
    {
        document.getElementById('imagePreview').src = reader.result;
    }

    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection