<div>
    {{-- Flash Messages --}}
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <span class="material-symbols-outlined align-middle" style="font-size:17px">check_circle</span>
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <span class="material-symbols-outlined align-middle" style="font-size:17px">error</span>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="ke-dash-card">

        {{-- Card Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h5 class="mb-0" style="color:var(--ke-primary);font-family:'Manrope',sans-serif;font-weight:700">
                <span class="material-symbols-outlined align-middle" style="font-size:20px">manage_accounts</span>
                All Registered Users
            </h5>
            <div style="max-width:280px;width:100%">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Search by name or email..."
                    wire:model.live.debounce.300ms="search"
                    style="font-size:14px"
                >
            </div>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table ke-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td style="color:var(--ke-outline);font-size:13px">{{ $user->id }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div style="width:32px;height:32px;border-radius:50%;background:var(--ke-surface-cont);color:var(--ke-primary);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;flex-shrink:0">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                {{ $user->name }}
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role === 'admin')
                                <span class="badge" style="background:var(--ke-primary);font-size:11px">Admin</span>
                            @else
                                <span class="badge bg-secondary" style="font-size:11px">User</span>
                            @endif
                        </td>
                        <td style="font-size:13px;color:var(--ke-on-surface-var)">
                            {{ $user->created_at->format('M d, Y') }}
                        </td>
                        <td>
                            @if($user->id !== auth()->id())
                                <button
                                    class="btn btn-sm btn-outline-danger"
                                    style="font-size:12px;border-radius:8px"
                                    wire:click="deleteUser({{ $user->id }})"
                                    wire:confirm="Are you sure you want to delete {{ $user->name }}?"
                                    wire:loading.attr="disabled"
                                >
                                    <span class="material-symbols-outlined" style="font-size:14px">delete</span>
                                    Delete
                                </button>
                            @else
                                <span class="badge" style="background:var(--ke-tertiary-fixed);color:#291800;font-size:11px">You</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5" style="color:var(--ke-on-surface-var)">
                            <span class="material-symbols-outlined d-block mb-2" style="font-size:40px;opacity:0.4">search_off</span>
                            No users found matching your search.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($users->hasPages())
        <div class="mt-3">
            {{ $users->links() }}
        </div>
        @endif

    </div>
</div>