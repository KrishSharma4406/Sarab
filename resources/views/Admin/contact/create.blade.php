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

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                <i class="fas fa-address-book"></i>
                Add Contact Information
            </h4>
        </div>

        <div class="card-body">

            <form action="{{ route('contacts.store') }}"
                  method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Company Name
                        </label>

                        <input type="text"
                               name="company_name"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Phone Number
                        </label>

                        <input type="text"
                               name="phone"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Email Address
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Opening Hours
                        </label>

                        <input type="text"
                               name="opening_hours"
                               class="form-control"
                               placeholder="Mon - Sun : 9 AM - 11 PM">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">
                            Address
                        </label>

                        <textarea
                            name="address"
                            rows="4"
                            class="form-control"></textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">
                            Google Map Embed Code
                        </label>

                        <textarea
                            name="google_map"
                            rows="4"
                            class="form-control"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Facebook URL</label>

                        <input type="text"
                               name="facebook"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Instagram URL</label>

                        <input type="text"
                               name="instagram"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Twitter URL</label>

                        <input type="text"
                               name="twitter"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>LinkedIn URL</label>

                        <input type="text"
                               name="linkedin"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>YouTube URL</label>

                        <input type="text"
                               name="youtube"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Group Dining</label>
                        <input type="text"
                            name="group_dining"
                            class="form-control"
                            placeholder="Special menus for 10+ guests">
                    </div>

                </div>

                <button class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Save Contact Information
                </button>

            </form>

        </div>

    </div>

    </div>
</body>

</div>

@endsection