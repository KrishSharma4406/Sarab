<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
/* Navbar Scroll */
.admin-navbar {
    overflow-x: auto;
    white-space: nowrap;
    scrollbar-width: thin;
}

.admin-navbar::-webkit-scrollbar {
    height: 6px;
}

.admin-navbar::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

/* Content Area */
.admin-content {
    width: 100%;
    padding: 20px;
}

/* Tables */
.table-responsive {
    overflow-x: auto;
}

table {
    width: 100%;
    min-width: 900px;
}

/* Cards */
.admin-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,.08);
}

/* Mobile */
@media (max-width: 768px) {

    .admin-content {
        padding: 10px;
    }

    .admin-card {
        padding: 12px;
    }

    .scrollbar-hide::-webkit-scrollbar {
    height: 5px;
}

.scrollbar-hide::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 20px;
}

.scrollbar-hide {
    scrollbar-width: thin;
}

    table {
        min-width: 700px;
    }

    .btn {
        font-size: 12px;
        padding: 6px 10px;
    }
}
</style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
