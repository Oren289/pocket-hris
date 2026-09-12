@props(['departments' => collect()])

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    <div class="flex flex-col gap-4 border-b border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-slate-900">User directory</h3>
        </div>

        <button type="button"
            class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-indigo-500"
            onclick="add_user_modal.showModal()">
            Add User
        </button>
    </div>

    <div class="p-3">
        <table id="user-table" class="table table-zebra w-full">
            <thead>
                <tr class="bg-slate-50 text-slate-600">
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Name</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Email</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Role</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="align-middle text-sm text-slate-700">
                        <td class="px-5 py-4">{{ $user->name }}</td>
                        <td class="px-5 py-4">{{ $user->email }}</td>
                        <td class="px-5 py-4">{{ $user->role ?: '—' }}</td>
                        <td class="px-5 py-4">
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="text-indigo-600 hover:text-indigo-900 btn btn-soft btn-info btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form id="delete-user-form-{{ $user->id }}"
                                action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:text-red-900 btn btn-soft btn-error btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-5 py-8 text-center text-sm text-slate-500">
                            No users found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('users.components.create-user-modal')

<script>
    $(function() {
        $('#user-table').DataTable({
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
            ordering: true,
            searching: true,
            paging: true,
            info: true,
            scrollX: true,
            language: {
                search: 'Search: ',
                zeroRecords: 'No matching users found.'
            },
            columnDefs: [{
                    targets: 0,
                    className: 'font-medium text-slate-800'
                },
                {
                    targets: 2,
                    className: 'text-slate-600'
                }
            ]
        });
    });
</script>
