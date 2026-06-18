@extends('Admin.layout.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h4>Edit Chef</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('chefs.update',$chef->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Name</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ $chef->name }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Designation</label>

                        <input type="text"
                               name="designation"
                               class="form-control"
                               value="{{ $chef->designation }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Experience</label>

                        <input type="number"
                               name="experience"
                               class="form-control"
                               value="{{ $chef->experience }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Status</label>

                        <select name="status"
                                class="form-control">

                            <option value="1"
                            {{ $chef->status == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0"
                            {{ $chef->status == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Current Image</label>

                        <br>

                        <img src="{{ asset('uploads/chefs/'.$chef->image) }}"
                             width="150"
                             class="mb-3 rounded">

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Change Image</label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>

                </div>

                <button class="btn btn-primary">
                    Update Chef
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