<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Banner</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .banner-card{
            border:none;
            border-radius:15px;
            overflow:hidden;
        }

        .banner-header{
            background:linear-gradient(135deg,#0d6efd,#6610f2);
            color:white;
            padding:20px;
        }

        .form-control,
        .form-select{
            border-radius:10px;
        }

        .btn-save{
            background:linear-gradient(135deg,#0d6efd,#6610f2);
            border:none;
            color:white;
            padding:10px 25px;
            border-radius:10px;
        }

        .btn-save:hover{
            opacity:.9;
            color:white;
        }

        .preview-box{
            width:200px;
            height:120px;
            border:2px dashed #ddd;
            border-radius:10px;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
            margin-top:10px;
        }

        .preview-box img{
            width:100%;
            height:100%;
            object-fit:cover;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
 <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Manage Banners') }}
                </h2>
            </x-slot>

            @if(Session::has('success'))
<div class="alert alert-success shadow-sm">
    {{ Session::get('success') }}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger shadow-sm">
    {{ Session::get('error') }}
</div>
@endif

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4 font-semibold text-xl text-gray-800 leading-tight">
        <h2>Manage Banners</h2>
        
</div>

    <div class="card shadow banner-card">

        <div class="banner-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Create Banner</h3>

            <a href="{{ route('banners.index') }}"
               class="btn btn-light">
                Back
            </a>
        </div>

        <div class="card-body p-4">

            <form action="{{ route('banners.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Banner Title
                    </label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           placeholder="Enter banner title">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Banner Image
                    </label>

                    <input type="file"
                           name="image"
                           id="image"
                           class="form-control">

                    <div class="preview-box">
                        <img id="preview" style="display:none;">
                        <span id="placeholder">Image Preview</span>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">
                        Status
                    </label>

                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-save">
                    Save Banner
                </button>

            </form>

        </div>

    </div>

</div>

<script>
document.getElementById('image').addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){
        const reader = new FileReader();

        reader.onload = function(event){
            document.getElementById('preview').src = event.target.result;
            document.getElementById('preview').style.display = 'block';
            document.getElementById('placeholder').style.display = 'none';
        }

        reader.readAsDataURL(file);
    }
});
</script>

</body>
</html>