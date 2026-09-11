@props(['employees' => []])

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xs">
    <div class="flex flex-col gap-4 border-b border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-slate-900">Department directory</h3>
        </div>

        <button
            type="button"
            class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-xs transition hover:bg-indigo-500"
            onclick="add_department_modal.showModal()"
        >
            Add Department
        </button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr class="bg-slate-50 text-slate-600">
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Department</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Code</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departments as $department)
                    <tr class="align-middle text-sm text-slate-700">
                        <td class="px-5 py-4">{{ $department->name }}</td>
                        <td class="px-5 py-4">{{ $department->code }}</td>
                        <td class="px-5 py-4">{{ $department->description }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-5 py-8 text-center text-sm text-slate-500">
                            No departments found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('departments.components.create-department-modal')
