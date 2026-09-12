<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <h2 class="text-xl font-semibold leading-tight text-slate-900">
                {{ __('Employees') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div
            class="flex flex-col gap-4 border-b border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-slate-900">Edit Employee</h3>
            </div>
        </div>
        <form method="POST" action="{{ route('employees.update', $employee->id) }}" class="space-y-6 p-6">
            @csrf
            @method('PUT')

            <div class="grid gap-4 md:grid-cols-2">
                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">User ID</span>
                    <select name="user_id"
                        class="searchable-select select select-bordered select-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white">
                        <option value="" disabled selected hidden>Select a user</option>
                        @foreach ($user as $u)
                            <option value="{{ $u->id }}" {{ $employee->user_id == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Manager ID</span>
                    <input type="number" name="manager_id"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Optional" value="{{ $employee->manager_id }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Employee code</span>
                    <input type="text" name="employee_code"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="EMP-001" value="{{ $employee->employee_code }}" required />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Email</span>
                    <input type="email" name="email"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="john.doe@company.com" value="{{ $employee->email }}" required />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">First name</span>
                    <input type="text" name="first_name"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="John" value="{{ $employee->first_name }}" required />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Last name</span>
                    <input type="text" name="last_name"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Doe" value="{{ $employee->last_name }}" required />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Phone</span>
                    <input type="tel" name="phone"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="+62 812 3456 7890" value="{{ $employee->phone }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Department</span>
                    <select name="department_id"
                        class="searchable-select select select-bordered select-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white">
                        <option value="" disabled selected hidden>Select a department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Job title</span>
                    <input type="text" name="job_title"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Software Engineer" value="{{ $employee->job_title }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Employment type</span>
                    <select name="employment_type"
                        class="select select-bordered select-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white">
                        <option value="full_time" {{ $employee->employment_type == 'full_time' ? 'selected' : '' }}>Full time</option>
                        <option value="part_time" {{ $employee->employment_type == 'part_time' ? 'selected' : '' }}>Part time</option>
                        <option value="contract" {{ $employee->employment_type == 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="intern" {{ $employee->employment_type == 'intern' ? 'selected' : '' }}>Intern</option>
                    </select>
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Status</span>
                    <select name="status"
                        class="select select-bordered select-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white">
                        <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="on_leave" {{ $employee->status == 'on_leave' ? 'selected' : '' }}>On leave</option>
                        <option value="terminated" {{ $employee->status == 'terminated' ? 'selected' : '' }}>Terminated</option>
                    </select>
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Hire date</span>
                    <input type="date" name="hire_date"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white" value="{{ old('hire_date', $employee->hire_date ? $employee->hire_date->format('Y-m-d') : null) }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Termination date</span>
                    <input type="date" name="termination_date"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white" value="{{ old('termination_date', $employee->termination_date ? $employee->termination_date->format('Y-m-d') : null) }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Salary</span>
                    <input type="number" step="0.01" name="salary"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="0.00" value="{{ $employee->salary }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Currency</span>
                    <input type="text" name="currency"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        value="{{ $employee->currency }}" maxlength="3" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Date of birth</span>
                    <input type="date" name="date_of_birth"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white" value="{{ old('date_of_birth', $employee->date_of_birth ? $employee->date_of_birth->format('Y-m-d') : null) }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Gender</span>
                    <select name="gender"
                        class="select select-bordered select-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white">
                        <option value="">Select gender</option>
                        <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $employee->gender == 'other' ? 'selected' : '' }}>Other</option>
                        <option value="prefer_not_to_say" {{ $employee->gender == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                    </select>
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">National ID</span>
                    <input type="text" name="national_id"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="320101" value="{{ $employee->national_id }}" />
                </label>

                <label class="form-control md:col-span-2">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Address line 1</span>
                    <input type="text" name="address_line1"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Jl. Merdeka Raya No. 12" value="{{ $employee->address_line1 }}" />
                </label>

                <label class="form-control md:col-span-2">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Address line 2</span>
                    <input type="text" name="address_line2"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Apartment / Unit / Building" value="{{ $employee->address_line2 }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">City</span>
                    <input type="text" name="city"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Jakarta" value="{{ $employee->city }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">State</span>
                    <input type="text" name="state"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="DKI Jakarta" value="{{ $employee->state }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Postal code</span>
                    <input type="text" name="postal_code"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="10110" value="{{ $employee->postal_code }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Country</span>
                    <input type="text" name="country"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Indonesia" value="{{ $employee->country }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Emergency contact name</span>
                    <input type="text" name="emergency_contact_name"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Jane Doe" value="{{ $employee->emergency_contact_name }}" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Emergency contact phone</span>
                    <input type="tel" name="emergency_contact_phone"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="+62 812 0000 0000" value="{{ $employee->emergency_contact_phone }}" />
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-slate-200 pt-5">
                <a type="button" class="btn btn-ghost rounded-xl px-4 text-slate-600"
                    href="{{ route('employees.index') }}">Cancel</a>
                <button type="submit"
                    class="btn btn-primary rounded-xl bg-indigo-600 px-5 text-white hover:bg-indigo-500">Save
                    employee</button>
            </div>
        </form>
    </div>
</x-app-layout>
