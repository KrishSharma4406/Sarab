@extends('Admin.layout.app')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header">
            <h4>Add Marquee Item</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('marquees.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label>Title</label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Status</label>

                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-success">
                    Save
                </button>

            </form>

        </div>

    </div>

</div>

@endsection