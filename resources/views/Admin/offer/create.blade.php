@extends('Admin.layout.app')

@section('title', 'Create Offer')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Create Offer Section</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('offer.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Badge Text</label>
                        <input type="text"
                               name="badge"
                               class="form-control"
                               value="LIMITED TIME OFFER">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label>

                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Main Title</label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               placeholder="Get 30% Off Our Signature">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Highlight Text</label>

                        <input type="text"
                               name="highlight_text"
                               class="form-control"
                               placeholder="Burger Meal"
                               required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Description</label>

                        <textarea
                            name="description"
                            rows="4"
                            class="form-control"></textarea>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Old Price</label>

                        <input type="text"
                               name="old_price"
                               class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>New Price</label>

                        <input type="text"
                               name="new_price"
                               class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Hours</label>

                        <input type="number"
                               name="hours"
                               class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Minutes</label>

                        <input type="number"
                               name="minutes"
                               class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Seconds</label>

                        <input type="number"
                               name="seconds"
                               class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Button Text</label>

                        <input type="text"
                               name="button_text"
                               class="form-control"
                               value="Grab the Deal">
                    </div>

                    <div class="col-md-8 mb-3">
                        <label>Button Link</label>

                        <input type="text"
                               name="button_link"
                               class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Offer Image</label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>

                    <div class="col-md-12">

                        <button class="btn btn-success">
                            Save Offer
                        </button>

                        <a href="{{ route('offer.index') }}"
                           class="btn btn-secondary">
                            Back
                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection