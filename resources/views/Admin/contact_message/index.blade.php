@extends('Admin.layout.app')

@section('content')

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h4>Contact Messages</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($messages as $message)

                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ $message->subject }}</td>

                        <td>

                            <a href="{{ route('contact-messages.show',$message->id) }}"
                               class="btn btn-primary btn-sm">
                                View
                            </a>

                            <form action="{{ route('contact-messages.destroy',$message->id) }}"
                                  method="POST"
                                  style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No Messages Found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $messages->links() }}

        </div>

    </div>

</div>

@endsection