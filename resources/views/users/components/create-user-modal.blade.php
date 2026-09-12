<dialog id="add_user_modal" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div class="flex items-start justify-between border-b border-slate-200 px-6 py-5">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-500">User profile</p>
                <h3 class="mt-2 text-2xl font-bold text-slate-900">Add User</h3>
            </div>
        </div>

        <form method="POST" action="{{ route('users.store') }}" class="space-y-6 p-6">
            @csrf

            <div class="grid gap-4 md:grid-cols-2">
                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">User Name</span>
                    <input type="text" name="name"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="John Doe" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Role</span>
                    <select name="role"
                        class="select select-bordered select-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white">
                        <option value="" disabled selected hidden>Select a role</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Email</span>
                    <input type="email" name="email"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="john.doe@example.com" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Password</span>
                    <input type="password" name="password"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="********" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Confirm Password</span>
                    <input type="password" name="password_confirmation"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="********" />
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-slate-200 pt-5">
                <button type="button" class="btn btn-ghost rounded-xl px-4 text-slate-600"
                    onclick="document.getElementById('add_user_modal').close()">Cancel</button>
                <button type="submit"
                    class="btn btn-primary rounded-xl bg-indigo-600 px-5 text-white hover:bg-indigo-500">Save
                    user</button>
            </div>
        </form>
    </div>
</dialog>
