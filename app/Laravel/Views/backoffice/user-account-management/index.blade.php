@extends('backoffice._layouts.main')

@section('content')
    <div class="container mt-4 mt-md-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3 class="mb-0 fs-4">User Account Management</h3>
                    </div>

                    <div class="card-body d-none d-md-block">
                        <table class="table table-striped align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($records as $index => $record)
                                    <tr>
                                        <td class="fw-medium">{{ $record->name }}</td>
                                        <td>{{ $record->email }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('backoffice.user_account_management.edit', $record->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('backoffice.user_account_management.show', $record->id) }}"
                                                class="btn btn-sm btn-info">View</a>
                                            <form action="{{ route('backoffice.user_account_management.delete', $record->id) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Delete this user account?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="list-group list-group-flush d-md-none">
                        @forelse ($records as $index => $record)
                            <div class="list-group-item py-3">
                                <div class="fw-bold text-dark">{{ $record->name }}</div>
                                <div class="text-muted small text-break mb-2">{{ $record->email }}</div>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('backoffice.user_account_management.edit', $record->id) }}"
                                        class="btn btn-sm btn-primary flex-fill">Edit</a>
                                    <a href="{{ route('backoffice.user_account_management.show', $record->id) }}"
                                        class="btn btn-sm btn-info flex-fill">View</a>
                                    <form action="{{ route('backoffice.user_account_management.delete', $record->id) }}"
                                        method="POST" class="flex-fill m-0"
                                        onsubmit="return confirm('Delete this user account?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger w-100">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="list-group-item text-center py-4 text-muted">
                                No records found.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection