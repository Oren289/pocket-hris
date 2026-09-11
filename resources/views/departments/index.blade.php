<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <h2 class="text-xl font-semibold leading-tight text-slate-900">
                {{ __('Departments') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl">
            @include('departments.components.department-table', ['departments' => $departments])
        </div>
    </div>
</x-app-layout>
