@extends('Admin.layout.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Chef Management</h4>

            <a href="{{ route('chefs.create') }}"
               class="btn btn-success">
                Add Chef
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                <tr>
                    <th width="70">ID</th>
                    <th width="120">Image</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Experience</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>

                </thead>

                <tbody>

                @forelse($chefs as $chef)

                <tr>

                    <td>{{ $chef->id }}</td>

                    <td>
                        <img src="{{ asset('uploads/chefs/'.$chef->image) }}"
                             width="80"
                             height="80"
                             style="object-fit:cover;border-radius:10px;">
                    </td>

                    <td>{{ $chef->name }}</td>

                    <td>{{ $chef->designation }}</td>

                    <td>{{ $chef->experience }} Years</td>

                    <td>
                        @if($chef->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>

                    <td>

                        <a href="{{ route('chefs.edit',$chef->id) }}"
                           class="btn btn-primary btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('chefs.destroy',$chef->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete Chef?')">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center">
                        No Chef Found
                    </td>
                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection