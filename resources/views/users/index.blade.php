<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <h2 class="text-xl font-semibold leading-tight text-slate-900">
                {{ __('Employees') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl">
            @include('users.components.user-table', ['users' => $users])
        </div>
    </div>
</x-app-layout>
