@extends('backoffice._layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('backoffice.account_management.create') }}" class="btn btn-primary">Create Account</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($records as $index => $record)
                                    <tr>
                                        <td>
                                            {{ $record->full_name }}
                                        </td>
                                        <td>
                                            {{ $record->email_address }}
                                        </td>
                                        <td>
                                            <a href="{{ route('backoffice.account_management.edit', $record->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('backoffice.account_management.show', $record->id) }}"
                                                class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
@endsection