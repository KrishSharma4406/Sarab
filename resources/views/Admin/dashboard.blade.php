@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary">
                Manage Products
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('banners.index') }}" class="btn btn-success">
                Manage Banners
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('menus.index') }}" class="btn btn-warning">
                Manage Menus
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('contact.index') }}" class="btn btn-warning">
                Manage Contact Information
            </a>
        </div>
    </div>
</div>
@endsection