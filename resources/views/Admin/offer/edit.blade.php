@extends('Admin.layout.app')

@section('title', 'Edit Offer')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Offer Section</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('offer-section.update',$offer->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Badge Text</label>

                        <input type="text"
                               name="badge"
                               value="{{ $offer->badge }}"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label>

                        <select name="status"
                                class="form-control">

                            <option value="1"
                                {{ $offer->status == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0"
                                {{ $offer->status == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Main Title</label>

                        <input type="text"
                               name="title"
                               value="{{ $offer->title }}"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Highlight Text</label>

                        <input type="text"
                               name="highlight_text"
                               value="{{ $offer->highlight_text }}"
                               class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Description</label>

                        <textarea
                            name="description"
                            rows="4"
                            class="form-control">{{ $offer->description }}</textarea>

                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Old Price</label>

                        <input type="text"
                               name="old_price"
                               value="{{ $offer->old_price }}"
                               class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>New Price</label>

                        <input type="text"
                               name="new_price"
                               value="{{ $offer->new_price }}"
                               class="form-control">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Hours</label>

                        <input type="number"
                               name="hours"
                               value="{{ $offer->hours }}"
                               class="form-control">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Minutes</label>

                        <input type="number"
                               name="minutes"
                               value="{{ $offer->minutes }}"
                               class="form-control">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Seconds</label>

                        <input type="number"
                               name="seconds"
                               value="{{ $offer->seconds }}"
                               class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Button Text</label>

                        <input type="text"
                               name="button_text"
                               value="{{ $offer->button_text }}"
                               class="form-control">
                    </div>

                    <div class="col-md-8 mb-3">
                        <label>Button Link</label>

                        <input type="text"
                               name="button_link"
                               value="{{ $offer->button_link }}"
                               class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Current Image</label>

                        <br>

                        @if($offer->image)
                            <img src="{{ asset('uploads/offers/'.$offer->image) }}"
                                 width="250"
                                 class="img-thumbnail mb-3">
                        @endif

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>

                    <div class="col-md-12">

                        <button class="btn btn-success">
                            Update Offer
                        </button>

                        <a href="{{ route('offer-section.index') }}"
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