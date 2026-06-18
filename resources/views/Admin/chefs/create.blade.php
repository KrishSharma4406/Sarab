@extends('Admin.layout.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4>Add New Chef</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('chefs.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Name</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Designation</label>

                        <input type="text"
                               name="designation"
                               class="form-control"
                               placeholder="Head Chef"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Experience (Years)</label>

                        <input type="number"
                               name="experience"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

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

                    <div class="col-md-12 mb-3">

                        <label>Chef Image</label>

                        <input type="file"
                               name="image"
                               class="form-control"
                               required>

                    </div>

                </div>

                <button class="btn btn-success">
                    Save Chef
                </button>

                <a href="{{ route('chefs.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

@endsection