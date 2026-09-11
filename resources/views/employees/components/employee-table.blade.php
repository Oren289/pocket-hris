@props(['employees' => []])

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xs">
    <div class="flex flex-col gap-4 border-b border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-slate-900">Employee directory</h3>
        </div>

        <button
            type="button"
            class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-xs transition hover:bg-indigo-500"
            onclick="add_employee_modal.showModal()"
        >
            Add employee
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr class="bg-slate-50 text-slate-600">
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Employee</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Role</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Department</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Location</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    @php
                        $statusClasses = [
                            'active' => 'badge-success',
                            'on_leave' => 'badge-warning',
                            'inactive' => 'badge-neutral',
                            'terminated' => 'badge-error',
                        ];
                        $statusClass = $statusClasses[$employee['status']] ?? 'badge-info';
                    @endphp

                    <tr class="align-middle text-sm text-slate-700">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 text-sm font-semibold text-indigo-700">
                                    {{ strtoupper(substr($employee['name'], 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-semibold text-slate-900">{{ $employee['name'] }}</div>
                                    <div class="text-xs text-slate-500">{{ $employee['employee_code'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4">{{ $employee['job_title'] }}</td>
                        <td class="px-5 py-4">{{ $employee['department'] }}</td>
                        <td class="px-5 py-4">{{ $employee['location'] }}</td>
                        <td class="px-5 py-4">
                            <span class="badge {{ $statusClass }} px-3 py-2 text-xs font-medium capitalize text-white">
                                {{ str_replace('_', ' ', $employee['status']) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-8 text-center text-sm text-slate-500">
                            No employees found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('employees.components.create-employee-popup')
