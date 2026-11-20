@extends('backoffice._layouts.main')

@section('content')
    <div class="container py-4 py-md-5">
        <div class="mb-4">
            <div class="d-flex align-items-center gap-2">
                <h3 class="mb-0 fw-bold text-dark">Admin Account Management</h3>
                <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle">
                    {{ $records->count() }} {{ Str::plural('Account', $records->count()) }}
                </span>
            </div>
            <p class="text-muted small mb-0 mt-1">Manage administrator credentials, access levels, and account details.</p>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="row g-2 align-items-center justify-content-between">
                    <div class="col-12 col-md-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light border-end-0 text-muted">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </span>
                            <input type="text" id="adminTableSearch" class="form-control border-start-0 ps-0"
                                placeholder="Filter by name or email..." aria-label="Filter admin accounts">
                        </div>
                    </div>
                    <div class="col-12 col-md-auto text-muted small">
                        Showing <span id="adminVisibleCount" class="fw-semibold text-dark">{{ $records->count() }}</span> of
                        {{$records->count() }} records
                    </div>
                </div>
            </div>

            <div class="card-body p-0 d-none d-md-block">
                <table class="table table-hover align-middle mb-0" id="adminDesktopTable">
                    <thead class="table-light text-uppercase small text-muted">
                        <tr>
                            <th scope="col" class="ps-4" style="width: 60px;">#</th>
                            <th scope="col">Administrator</th>
                            <th scope="col">Email Address</th>
                            <th scope="col" class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($records as $index => $record)
                            <tr class="searchable-record" data-search="{{ strtolower($record->name . ' ' . $record->email) }}">
                                <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-flex align-items-center justify-content-center flex-shrink-0"
                                            style="width: 34px; height: 34px; font-size: 0.8rem;">
                                            {{ strtoupper(substr($record->name, 0, 1)) }}
                                        </div>
                                        <span class="fw-semibold text-dark">{{ $record->name }}</span>
                                    </div>
                                </td>
                                <td class="text-secondary">{{ $record->email }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <a href="{{ route('backoffice.admin_account_management.show', $record->id) }}"
                                            class="btn btn-sm btn-outline-info d-inline-flex align-items-center gap-1"
                                            title="View Details">
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                            </svg>
                                            <span>View</span>
                                        </a>
                                        <a href="{{ route('backoffice.admin_account_management.edit', $record->id) }}"
                                            class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1"
                                            title="Edit Account">
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                            </svg>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('backoffice.admin_account_management.delete', $record->id) }}"
                                            method="POST" class="d-inline m-0"
                                            onsubmit="return confirm('Delete this admin account?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1"
                                                title="Delete Account">
                                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <div class="fw-semibold mb-1">No administrator accounts found</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="list-group list-group-flush d-md-none">
                @forelse ($records as $index => $record)
                    <div class="list-group-item py-3 searchable-mobile-record"
                        data-search="{{ strtolower($record->name . ' ' . $record->email) }}">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 36px; height: 36px; font-size: 0.85rem;">
                                {{ strtoupper(substr($record->name, 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <div class="fw-bold text-dark text-truncate">{{ $record->name }}</div>
                                <div class="text-muted small text-break">{{ $record->email }}</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-2">
                            <a href="{{ route('backoffice.admin_account_management.show', $record->id) }}"
                                class="btn btn-sm btn-outline-info flex-fill">View</a>
                            <a href="{{ route('backoffice.admin_account_management.edit', $record->id) }}"
                                class="btn btn-sm btn-outline-primary flex-fill">Edit</a>
                            <form action="{{ route('backoffice.admin_account_management.delete', $record->id) }}" method="POST"
                                class="flex-fill m-0" onsubmit="return confirm('Delete this admin account?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger w-100">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="list-group-item text-center py-5 text-muted">
                        No administrator accounts found.
                    </div>
                @endforelse
            </div>

            @if (method_exists($records, 'links') && $records->hasPages())
                <div class="card-footer bg-white py-3">
                    {{ $records->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@section('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('adminTableSearch');
            const visibleCountEl = document.getElementById('adminVisibleCount');
            const desktopRows = document.querySelectorAll('.searchable-record');
            const mobileRows = document.querySelectorAll('.searchable-mobile-record');

            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    const query = this.value.trim().toLowerCase();
                    let visible = 0;

                    desktopRows.forEach(row => {
                        const match = row.dataset.search.includes(query);
                        row.classList.toggle('d-none', !match);
                        if (match) visible++;
                    });

                    mobileRows.forEach(item => {
                        const match = item.dataset.search.includes(query);
                        item.classList.toggle('d-none', !match);
                    });

                    if (visibleCountEl) {
                        visibleCountEl.textContent = visible;
                    }
                });
            }
        });
    </script>
@endsection