@extends('Admin.layout.app')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Opening Hours Management
            </h4>

            <a href="{{ route('opening-hours.create') }}"
               class="btn btn-light">
                <i class="fas fa-plus"></i> Add Opening Hours
            </a>

        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                    <tr>
                        <th width="80">ID</th>
                        <th>Day Name</th>
                        <th>Opening Time</th>
                        <th>Closing Time</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse($hours as $hour)

                        <tr>

                            <td>{{ $hour->id }}</td>

                            <td>{{ $hour->day_name }}</td>

                            <td>{{ $hour->opening_time }}</td>

                            <td>{{ $hour->closing_time }}</td>

                            <td>

                                @if($hour->is_closed)

                                    <span class="badge bg-danger">
                                        Closed
                                    </span>

                                @else

                                    <span class="badge bg-success">
                                        Open
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('opening-hours.edit',$hour->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('opening-hours.destroy',$hour->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Delete this record?')"
                                            class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                No Data Found
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection