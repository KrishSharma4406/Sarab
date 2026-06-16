@extends('layouts.app')

@section('content')

<style>
    body{
        background:#f4f6f9;
    }

    .page-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
    }

    .page-title{
        font-size:30px;
        font-weight:700;
        color:#2c3e50;
        margin:0;
    }

    .card-custom{
        background:#fff;
        border:none;
        border-radius:16px;
        box-shadow:0 5px 25px rgba(0,0,0,0.08);
        overflow:hidden;
    }

    .card-header-custom{
        background:#0d6efd;
        color:#fff;
        padding:20px 30px;
    }

    .card-header-custom h4{
        margin:0;
        font-weight:600;
    }

    .card-body-custom{
        padding:35px;
    }

    .form-label{
        font-weight:600;
        color:#495057;
        margin-bottom:8px;
    }

    .form-control,
    .form-select{
        height:52px;
        border-radius:10px;
        border:1px solid #dee2e6;
    }

    .form-control:focus,
    .form-select:focus{
        box-shadow:none;
        border-color:#0d6efd;
    }

    .btn-save{
        background:#198754;
        color:#fff;
        border:none;
        padding:12px 28px;
        border-radius:10px;
        font-weight:600;
        margin-top:10px;
    }

    .btn-save:hover{
        background:#157347;
        color:#fff;
    }

    .btn-back{
        padding:12px 28px;
        border-radius:10px;
        font-weight:600;
    }

    .btn-secondary{
        background:blue;
        color:#fff;
        border:none;
        border-radius:10px;
        height:52px;
        width:180px;
        text-align:center;
        align-items:center;
        display:flex;
        justify-content:center;
    }

    .required{
        color:red;
    }
</style>

<div class="container-fluid">

    <div class="page-header">

        <div>
            <h2 class="page-title">Menu Management</h2>
            <small class="text-muted">
                Create a new navigation menu item
            </small>
        </div>

        <a href="{{ route('menu.index') }}"
           class="btn btn-secondary">
            ← Back to Menus
        </a>

    </div>

    <div class="card card-custom">

        <div class="card-header-custom">
            <h4>Add New Menu</h4>
        </div>

        <div class="card-body-custom">

            <form action="{{ route('menu.store') }}"
                  method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">
                        <label class="form-label">
                            Menu Title
                            <span class="required">*</span>
                        </label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               placeholder="Example: About Us">

                        @error('title')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">
                            URL
                            <span class="required">*</span>
                        </label>

                        <input type="text"
                               name="url"
                               class="form-control"
                               placeholder="/about">
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="form-label">
                            Position
                        </label>

                        <input type="number"
                               name="position"
                               value="0"
                               class="form-control">
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="form-label">
                            Open Link In
                        </label>

                        <select name="target"
                                class="form-select">

                            <option value="_self">
                                Same Tab
                            </option>

                            <option value="_blank">
                                New Tab
                            </option>

                        </select>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="1">
                                Active
                            </option>

                            <option value="0">
                                Inactive
                            </option>

                        </select>
                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('menu.index') }}"
                       class="btn btn-outline-secondary btn-back">
                        Cancel
                    </a>

                    <button type="submit"
                            class="btn-save">
                        Save Menu
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
