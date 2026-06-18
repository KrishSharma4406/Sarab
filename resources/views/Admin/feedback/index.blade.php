@extends('Admin.layout.app')

@section('content')

<div class="container py-4">

<div class="card shadow border-0">

    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Feedback Management</h4>

        <a href="{{ route('feedbacks.create') }}" class="btn btn-success">
            Add Feedback
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
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th width="250">Actions</th>
                </tr>
            </thead>

            <tbody>

            @forelse($feedbacks as $item)

                <tr>

                    <td>{{ $item->id }}</td>

                    <td>
                        @if($item->image)
                            <img src="{{ asset($item->image) }}"
                                 width="70"
                                 height="70"
                                 class="rounded-circle">
                        @endif
                    </td>

                    <td>{{ $item->name }}</td>

                    <td>{{ $item->designation }}</td>

                    <td>
                        @for($i=1;$i<=$item->rating;$i++)
                            &starf;
                        @endfor
                    </td>

                    <td>

                        @if($item->status)

                            <span class="badge bg-success">
                                Approved
                            </span>

                        @else

                            <span class="badge bg-warning">
                                Pending
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('feedbacks.edit',$item->id) }}"
                           class="btn btn-primary btn-sm">
                            Edit
                        </a>

                        @if(!$item->status)

                        <a href="{{ route('feedbacks.approve',$item->id) }}"
                           class="btn btn-success btn-sm">
                            Approve
                        </a>

                        @endif

                        <form action="{{ route('feedbacks.destroy',$item->id) }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete Feedback?')">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="7" class="text-center">
                        No Feedback Found
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
