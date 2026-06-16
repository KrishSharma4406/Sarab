@extends('layouts.app')

@section('content')

<style>

body{
    background:#f8fafc;
}

.page-wrapper{
    padding:30px;
}

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.page-title{
    font-size:32px;
    font-weight:700;
    color:#1e293b;
}

.page-subtitle{
    color:#64748b;
}

.stats-card{
    background:#fff;
    border-radius:18px;
    padding:25px;
    box-shadow:0 5px 20px rgba(0,0,0,.05);
    transition:.3s;
}

.stats-card:hover{
    transform:translateY(-4px);
}

.stats-title{
    color:#64748b;
    font-size:14px;
}

.stats-number{
    font-size:30px;
    font-weight:700;
}

.table-card{
    background:#fff;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,.05);
}

.table-header{
    background:#2563eb;
    color:white;
    padding:20px 25px;
}

.table-header h4{
    margin:0;
}

.table{
    margin-bottom:0;
}

.table th{
    background:#f8fafc;
    padding:18px;
    font-weight:600;
}

.table td{
    padding:18px;
    vertical-align:middle;
}

.table tbody tr:hover{
    background:#f9fafb;
}

.status-active{
    background:#dcfce7;
    color:#166534;
    padding:6px 14px;
    border-radius:50px;
    font-size:13px;
    font-weight:600;
}

.status-inactive{
    background:#fee2e2;
    color:#991b1b;
    padding:6px 14px;
    border-radius:50px;
    font-size:13px;
    font-weight:600;
}

.btn-add{
    background:#16a34a;
    color:white;
    border:none;
    padding:12px 22px;
    border-radius:12px;
    font-weight:600;
}

.btn-add:hover{
    background:#15803d;
    color:white;
}

.search-box{
    max-width:300px;
}

.action-btn{
    width:40px;
    height:40px;
    border-radius:10px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
}

</style>

<div class="container-fluid page-wrapper">

    <div class="page-header">

        <div>

            <h2 class="page-title">
                Menu Management
            </h2>

            <div class="page-subtitle">
                Manage website navigation menus
            </div>

        </div>

        <a href="{{ route('menu.create') }}"
           class="btn btn-add">

            + Add Menu

        </a>

    </div>

    {{-- Statistics Cards --}}

    <div class="row mb-4">

        <div class="col-md-4">

            <div class="stats-card">

                <div class="stats-title">
                    Total Menus
                </div>

                <div class="stats-number">
                    {{ $menu->count() }}
                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="stats-card">

                <div class="stats-title">
                    Active Menus
                </div>

                <div class="stats-number text-success">
                    {{ $menu->where('status',1)->count() }}
                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="stats-card">

                <div class="stats-title">
                    Inactive Menus
                </div>

                <div class="stats-number text-danger">
                    {{ $menu->where('status',0)->count() }}
                </div>

            </div>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="table-card">

        <div class="table-header d-flex justify-content-between align-items-center">

            <h4>All Menus</h4>

            <input type="text"
                   class="form-control search-box"
                   placeholder="Search menu...">

        </div>

        <div class="table-responsive">

            <table class="table">

                <thead>

                <tr>

                    <th>ID</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th width="150">Actions</th>

                </tr>

                </thead>

                <tbody>

                @forelse($menu as $menu)

                <tr>

                    <td>{{ $menu->id }}</td>

                    <td>
                        <strong>
                            {{ $menu->title }}
                        </strong>
                    </td>

                    <td>
                        {{ $menu->url }}
                    </td>

                    <td>
                        {{ $menu->position }}
                    </td>

                    <td>

                        @if($menu->status)

                            <span class="status-active">
                                Active
                            </span>

                        @else

                            <span class="status-inactive">
                                Inactive
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('menu.edit',$menu->id) }}"
                           class="btn btn-warning action-btn">

                            Edit

                        </a>

                        <form action="{{ route('menu.destroy',$menu->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Delete this menu?')"
                                    class="btn btn-danger action-btn">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-5">

                        No menu found

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
