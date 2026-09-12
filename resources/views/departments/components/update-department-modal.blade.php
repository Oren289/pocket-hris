<dialog id="add_department_modal" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div class="flex items-start justify-between border-b border-slate-200 px-6 py-5">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-500">Department profile</p>
                <h3 class="mt-2 text-2xl font-bold text-slate-900">Add department</h3>
            </div>
        </div>

        <form method="POST" action="{{ route('departments.store') }}" class="space-y-6 p-6">
            @csrf

            <div class="grid gap-4 md:grid-cols-2">
                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Department Name</span>
                    <input type="text" name="name"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Engineering" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Department Code</span>
                    <input type="text" name="code"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="ENG" />
                </label>
            </div>
            <div class="grid gap-4 md:grid-cols-1">
                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Department Description</span>
                    <textarea name="description"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Engineering Department"></textarea>
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-slate-200 pt-5">
                <button type="button" class="btn btn-ghost rounded-xl px-4 text-slate-600"
                    onclick="document.getElementById('add_department_modal').close()">Cancel</button>
                <button type="submit"
                    class="btn btn-primary rounded-xl bg-indigo-600 px-5 text-white hover:bg-indigo-500">Save
                    department</button>
            </div>
        </form>
    </div>
</dialog>
