<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <h2 class="text-xl font-semibold leading-tight text-slate-900">
                {{ __('Departments') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div
            class="flex flex-col gap-4 border-b border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-slate-900">Edit User</h3>
            </div>
        </div>
        <form method="POST" action="{{ route('users.update', $user->id) }}" class="space-y-6 p-6">
            @csrf
            @method('PUT')

            <div class="grid gap-4 md:grid-cols-2">
                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">User Name</span>
                    <input type="text" name="name"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="John Doe" value="{{ $user->name }}"/>
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Role</span>
                    <select name="role"
                        class="select select-bordered select-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white">
                        <option value="" disabled selected hidden>Select a role</option>
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Email</span>
                    <input type="email" name="email"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="john.doe@example.com" value="{{ $user->email }}" />
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
</x-app-layout>
