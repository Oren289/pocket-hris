{{-- <dialog id="add_employee_modal" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div class="flex items-start justify-between border-b border-slate-200 px-6 py-5">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-500">Employee profile</p>
                <h3 class="mt-2 text-2xl font-bold text-slate-900">Add employee</h3>
            </div>
        </div>

        <form method="POST" action="#" class="space-y-6 p-6">
            @csrf

            <div class="grid gap-4 md:grid-cols-2">
                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">User ID</span>
                    <input type="number" name="user_id"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="1" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Manager ID</span>
                    <input type="number" name="manager_id"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Optional" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Employee code</span>
                    <input type="text" name="employee_code"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="EMP-001" required />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Email</span>
                    <input type="email" name="email"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="john.doe@company.com" required />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">First name</span>
                    <input type="text" name="first_name"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="John" required />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Last name</span>
                    <input type="text" name="last_name"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Doe" required />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Phone</span>
                    <input type="tel" name="phone"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="+62 812 3456 7890" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Department</span>
                    <input type="text" name="department"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Engineering" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Job title</span>
                    <input type="text" name="job_title"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Software Engineer" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Employment type</span>
                    <select name="employment_type"
                        class="select select-bordered select-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white">
                        <option value="full_time" selected>Full time</option>
                        <option value="part_time">Part time</option>
                        <option value="contract">Contract</option>
                        <option value="intern">Intern</option>
                    </select>
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Status</span>
                    <select name="status"
                        class="select select-bordered select-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="on_leave">On leave</option>
                        <option value="terminated">Terminated</option>
                    </select>
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Hire date</span>
                    <input type="date" name="hire_date"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Termination date</span>
                    <input type="date" name="termination_date"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Salary</span>
                    <input type="number" step="0.01" name="salary"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="0.00" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Currency</span>
                    <input type="text" name="currency"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        value="IDR" maxlength="3" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Date of birth</span>
                    <input type="date" name="date_of_birth"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Gender</span>
                    <select name="gender"
                        class="select select-bordered select-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white">
                        <option value="">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                        <option value="prefer_not_to_say">Prefer not to say</option>
                    </select>
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">National ID</span>
                    <input type="text" name="national_id"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="320101" />
                </label>

                <label class="form-control md:col-span-2">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Address line 1</span>
                    <input type="text" name="address_line1"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Jl. Merdeka Raya No. 12" />
                </label>

                <label class="form-control md:col-span-2">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Address line 2</span>
                    <input type="text" name="address_line2"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Apartment / Unit / Building" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">City</span>
                    <input type="text" name="city"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Jakarta" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">State</span>
                    <input type="text" name="state"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="DKI Jakarta" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Postal code</span>
                    <input type="text" name="postal_code"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="10110" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Country</span>
                    <input type="text" name="country"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Indonesia" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Emergency contact name</span>
                    <input type="text" name="emergency_contact_name"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Jane Doe" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Emergency contact phone</span>
                    <input type="tel" name="emergency_contact_phone"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="+62 812 0000 0000" />
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-slate-200 pt-5">
                <button type="button" class="btn btn-ghost rounded-xl px-4 text-slate-600"
                    onclick="document.getElementById('add_employee_modal').close()">Cancel</button>
                <button type="submit"
                    class="btn btn-primary rounded-xl bg-indigo-600 px-5 text-white hover:bg-indigo-500">Save
                    employee</button>
            </div>
        </form>
    </div>
</dialog> --}}

<!-- You can open the modal using ID.showModal() method -->
<dialog id="add_employee_modal" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="text-lg font-bold">Hello!</h3>
    <p class="py-4">Press ESC key or click on ✕ button to close</p>
  </div>
</dialog>