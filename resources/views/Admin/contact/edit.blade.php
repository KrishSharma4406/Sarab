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

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                <i class="fas fa-edit"></i>
                Update Contact Information
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('contacts.update',$contact->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Company Name</label>

                        <input type="text"
                               name="company_name"
                               value="{{ $contact->company_name }}"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Phone Number</label>

                        <input type="text"
                               name="phone"
                               value="{{ $contact->phone }}"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email</label>

                        <input type="email"
                               name="email"
                               value="{{ $contact->email }}"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Opening Hours</label>

                        <input type="text"
                               name="opening_hours"
                               value="{{ $contact->opening_hours }}"
                               class="form-control">
                    </div>

                    <div class="col-12 mb-3">

                        <label>Address</label>

                        <textarea
                            name="address"
                            rows="4"
                            class="form-control">{{ $contact->address }}</textarea>

                    </div>

                    <div class="col-12 mb-3">

                        <label>Google Map Embed Code</label>

                        <textarea
                            name="google_map"
                            rows="4"
                            class="form-control">{{ $contact->google_map }}</textarea>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Facebook URL</label>

                        <input type="text"
                               name="facebook"
                               value="{{ $contact->facebook }}"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Instagram URL</label>

                        <input type="text"
                               name="instagram"
                               value="{{ $contact->instagram }}"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Twitter URL</label>

                        <input type="text"
                               name="twitter"
                               value="{{ $contact->twitter }}"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>LinkedIn URL</label>

                        <input type="text"
                               name="linkedin"
                               value="{{ $contact->linkedin }}"
                               class="form-control">
                    </div>

                </div>

                <button class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Update Contact
                </button>

            </form>

        </div>

    </div>
    </div>
</body>

</div>

@endsection