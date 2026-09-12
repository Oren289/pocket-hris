@props(['employees' => collect()])

@php
    $employeeRows = $employees instanceof \Illuminate\Support\Collection ? $employees->all() : $employees;
@endphp

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    <div class="flex flex-col gap-4 border-b border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-slate-900">Employee directory</h3>
        </div>

        <button type="button"
            class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-indigo-500"
            onclick="add_employee_modal.showModal()">
            Add employee
        </button>
    </div>

    <div class="p-3">
        <table id="employee-table" class="table table-zebra w-full">
            <thead>
                <tr class="bg-slate-50 text-slate-600">
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Employee</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Email</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Role</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Department</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Location</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Status</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Employment Type
                    </th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Phone</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Hire Date</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Termination
                        Date</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Salary</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Currency</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Date of Birth
                    </th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Gender</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">National ID
                    </th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">City</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">State</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Postal Code
                    </th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Country</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em]">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employeeRows as $employee)
                    @php
                        $employeeName =
                            data_get($employee, 'full_name') ??
                            (trim(
                                (data_get($employee, 'first_name', '') ?: '') .
                                    ' ' .
                                    (data_get($employee, 'last_name', '') ?: ''),
                            ) ??
                                data_get($employee, 'name', 'Unknown Employee'));

                        $employeeCode = data_get($employee, 'employee_code', '—');
                        $email = data_get($employee, 'email', '—');
                        $jobTitle = data_get($employee, 'job_title', '—');
                        $department = $employee->department?->name ?? '—';
                        $location = data_get($employee, 'location', data_get($employee, 'city', '—'));
                        $status = data_get($employee, 'status', 'inactive');
                        $employmentType = Str::headline(data_get($employee, 'employment_type', '—'));
                        $phone = data_get($employee, 'phone', '—');
                        $hireDate = $employee->hire_date?->format('d M Y') ?? '—';
                        $terminationDate = data_get($employee, 'termination_date', '—');
                        $salary = data_get($employee, 'salary', '—');
                        $currency = data_get($employee, 'currency', '—');
                        $dateOfBirth = $employee->date_of_birth?->format('d M Y') ?? '—';
                        $gender = data_get($employee, 'gender', '—');
                        $nationalId = data_get($employee, 'national_id', '—');
                        $city = data_get($employee, 'city', '—');
                        $state = data_get($employee, 'state', '—');
                        $postalCode = data_get($employee, 'postal_code', '—');
                        $country = data_get($employee, 'country', '—');

                        $statusClasses = [
                            'active' => 'badge-success',
                            'on_leave' => 'badge-warning',
                            'inactive' => 'badge-neutral',
                            'terminated' => 'badge-error',
                        ];
                        $statusClass = $statusClasses[$status] ?? 'badge-info';
                        $initial = strtoupper(substr(preg_replace('/\s+/', '', $employeeName), 0, 1) ?: 'E');
                    @endphp

                    <tr class="align-middle text-sm text-slate-700">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <div>
                                    <div class="font-semibold text-slate-900">{{ $employeeName }}</div>
                                    <div class="text-xs text-slate-500">{{ $employeeCode }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4">{{ $email }}</td>
                        <td class="px-5 py-4">{{ $jobTitle }}</td>
                        <td class="px-5 py-4">{{ $department }}</td>
                        <td class="px-5 py-4">{{ $location }}</td>
                        <td class="px-5 py-4">
                            <span class="badge {{ $statusClass }} px-3 py-2 text-xs font-medium capitalize text-white">
                                {{ str_replace('_', ' ', $status) }}
                            </span>
                        </td>
                        <td class="px-5 py-4">{{ $employmentType }}</td>
                        <td class="px-5 py-4">{{ $phone }}</td>
                        <td class="px-5 py-4">{{ $hireDate }}</td>
                        <td class="px-5 py-4">{{ $terminationDate }}</td>
                        <td class="px-5 py-4">{{ $salary }}</td>
                        <td class="px-5 py-4">{{ $currency }}</td>
                        <td class="px-5 py-4">{{ $dateOfBirth }}</td>
                        <td class="px-5 py-4">{{ $gender }}</td>
                        <td class="px-5 py-4">{{ $nationalId }}</td>
                        <td class="px-5 py-4">{{ $city }}</td>
                        <td class="px-5 py-4">{{ $state }}</td>
                        <td class="px-5 py-4">{{ $postalCode }}</td>
                        <td class="px-5 py-4">{{ $country }}</td>
                        <td class="px-5 py-4">
                            <a href="{{ route('employees.edit', $employee->id) }}"
                                class="text-indigo-600 hover:text-indigo-900 btn btn-soft btn-info btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form id="delete-employee-form-{{ $employee->id }}"
                                action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:text-red-900 btn btn-soft btn-error btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this employee?')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="20" class="px-5 py-8 text-center text-sm text-slate-500">
                            No employees found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('employees.components.create-employee-popup')

<script>
    $(function() {
        $('#employee-table').DataTable({
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
            ordering: true,
            searching: true,
            paging: true,
            info: true,
            scrollX: true,
            language: {
                search: 'Search: ',
                zeroRecords: 'No matching employees found.'
            },
            columnDefs: [{
                    targets: 0,
                    className: 'font-medium text-slate-800'
                },
                {
                    targets: 4,
                    className: 'text-center'
                }
            ]
        });
    });
</script>
