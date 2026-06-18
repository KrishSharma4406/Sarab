@if(session('success'))

<style>
.hero-toast{
    position:fixed;
    top:25px;
    right:25px;
    min-width:320px;
    background:#ffffff;
    border-left:5px solid #28a745;
    border-radius:15px;
    padding:18px 20px;
    box-shadow:0 15px 35px rgba(0,0,0,.12);
    z-index:9999;
    display:flex;
    align-items:center;
    gap:15px;
    animation:slideIn .4s ease;
}

.hero-toast-icon{
    width:50px;
    height:50px;
    border-radius:50%;
    background:#28a745;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
    flex-shrink:0;
}

.hero-toast-content h5{
    margin:0;
    font-size:16px;
    font-weight:700;
    color:#222;
}

.hero-toast-content p{
    margin:3px 0 0;
    color:#666;
    font-size:14px;
}

.hero-toast-close{
    margin-left:auto;
    cursor:pointer;
    font-size:18px;
    color:#999;
}

.hero-toast-close:hover{
    color:#000;
}

@keyframes slideIn{
    from{
        opacity:0;
        transform:translateX(100%);
    }
    to{
        opacity:1;
        transform:translateX(0);
    }
}

@keyframes fadeOut{
    from{
        opacity:1;
    }
    to{
        opacity:0;
    }
}
</style>
@vite(['resources/css/app.css', 'resources/js/app.js'])
 <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Manage Banners') }}
                </h2>
            </x-slot>

<div class="hero-toast" id="heroToast">

    <div class="hero-toast-icon">
        <i class="fas fa-check"></i>
    </div>

    <div class="hero-toast-content">
        <h5>Success</h5>
        <p>{{ session('success') }}</p>
    </div>

    <div class="hero-toast-close" onclick="closeToast()">
        <i class="fas fa-times"></i>
    </div>

</div>

<script>
function closeToast(){
    document.getElementById('heroToast').style.display='none';
}

setTimeout(function(){
    let toast=document.getElementById('heroToast');

    if(toast){
        toast.style.animation='fadeOut .5s ease';

        setTimeout(function(){
            toast.style.display='none';
        },500);
    }
},3000);
</script>

@endif
@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white py-3">
            <h3 class="mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Hero Section
            </h3>
        </div>

        <div class="card-body">

            <form action="{{ route('hero-section.store') }}" method="POST">
                @csrf

                @include('admin.hero-section.form')

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>
                        Update Hero Section
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>
</div>
</body>
@endsection