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
                <h3 class="text-lg font-semibold text-slate-900">Edit department</h3>
            </div>
        </div>
        <form method="POST" action="{{ route('departments.update', $department->id) }}" class="space-y-6 p-6">
            @csrf
            @method('PUT')

            <div class="grid gap-4 md:grid-cols-2">
                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Department Name</span>
                    <input type="text" name="name" value="{{ $department->name }}"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="Engineering" />
                </label>

                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Department Code</span>
                    <input type="text" name="code" value="{{ $department->code }}"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white"
                        placeholder="ENG" />
                </label>
            </div>
            <div class="grid gap-4 md:grid-cols-1">
                <label class="form-control">
                    <span class="label-text mb-2 text-sm font-medium text-slate-700">Department Description</span>
                    <textarea name="description" placeholder="Engineering Department"
                        class="input input-bordered input-sm h-11 w-full rounded-xl border-slate-200 bg-slate-50 focus:border-indigo-400 focus:bg-white">{{ $department->description }}</textarea>
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-slate-200 pt-5">
                <a href="{{ route('departments.index') }}" class="btn btn-ghost rounded-xl px-4 text-slate-600">
                    Cancel
                </a>
                <button type="submit"
                    class="btn btn-primary rounded-xl bg-indigo-600 px-5 text-white hover:bg-indigo-500">Save
                    department</button>
            </div>
        </form>
    </div>
</x-app-layout>
