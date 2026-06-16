@extends('Admin.layout.app')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Contact Management</h2>
            <p class="text-muted mb-0">
                Manage website contact information
            </p>
        </div>

        <a href="{{ route('contacts.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i> Add Contact
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow border-0">

        <div class="card-header bg-white">
            <h5 class="mb-0">Contact List</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($contacts as $contact)

                        <tr>

                            <td>{{ $contact->id }}</td>

                            <td>
                                <strong>
                                    {{ $contact->company_name }}
                                </strong>
                            </td>

                            <td>{{ $contact->phone }}</td>

                            <td>{{ $contact->email }}</td>

                            <td>

                                <a href="{{ route('contacts.edit',$contact->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>
                                </a>

                                <form
                                    action="{{ route('contacts.delete',$contact->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete this contact?')"
                                        class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center">
                                No Contact Found
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