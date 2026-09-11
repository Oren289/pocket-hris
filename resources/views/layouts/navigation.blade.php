@php
    $navItems = [
        ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'home'],
        ['label' => 'Employees', 'route' => 'employees.index', 'icon' => 'user'],
        ['label' => 'Departments', 'route' => 'departments.index', 'icon' => 'department'],
        ['label' => 'Settings', 'route' => 'employees.index', 'icon' => 'settings'],
    ];
@endphp

<aside x-data="{ open: false }"
    class="border-b border-slate-200 bg-slate-900 text-slate-100 lg:sticky lg:top-0 lg:h-screen lg:w-72 lg:border-b-0 lg:border-r">
    <div class="flex items-center justify-between border-b border-slate-800 px-4 py-4 lg:px-6">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <div
                class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-500/20 text-sm font-semibold text-indigo-200 ring-1 ring-inset ring-indigo-400/40">
                PH
            </div>
            <div>
                <p class="text-sm font-semibold tracking-wide text-white">Pocket HRIS</p>
                <p class="text-[11px] uppercase tracking-[0.22em] text-slate-400">Workspace</p>
            </div>
        </a>

        <button type="button" @click="open = !open"
            class="rounded-lg border border-slate-700 p-2 text-slate-200 hover:bg-slate-800 lg:hidden">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <nav :class="{ 'flex': open, 'hidden': !open }" class="hidden flex-col gap-6 px-4 py-5 lg:flex lg:px-5">
        <div class="space-y-1">
            @foreach ($navItems as $item)
                @php
                    $isActive = request()->routeIs($item['route']);
                @endphp

                <a href="{{ route($item['route']) }}"
                    class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ $isActive ? 'bg-slate-800 text-white shadow-xs ring-1 ring-inset ring-slate-700' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                    <span
                        class="inline-flex h-8 w-8 items-center justify-center rounded-lg {{ $isActive ? 'bg-indigo-500/20 text-indigo-200' : 'bg-slate-800 text-slate-300 group-hover:bg-slate-700' }}">
                        @switch($item['icon'])
                            @case('home')
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M3 10.5 12 3l9 7.5V20a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1v-9.5Z" />
                                </svg>
                            @break

                            @case('user')
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M16 18v-1a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v1M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
                                </svg>
                            @break

                            @case('department')
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M3 21h18M5 21V7l7-4 7 4v14M9 9h1M9 13h1M9 17h1M14 9h1M14 13h1M14 17h1" />
                                </svg>
                            @break

                            @case('settings')
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0-2.572 1.065c-.94 1.543-3.31.826-2.37 2.37a1.724 1.724 0 0 0-1.066 2.573c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0-2.572-1.065c-.94 1.543-3.31.826-2.37-2.37a1.724 1.724 0 0 0-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.065-2.572c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 0 0 2.572-1.065Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            @break
                        @endswitch
                    </span>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </div>

        <div class="mt-auto rounded-2xl border border-slate-800 bg-slate-950/60 p-3">
            <div class="flex items-center gap-3">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-500/20 text-sm font-semibold text-indigo-200">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="truncate text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
                    <p class="truncate text-xs text-slate-400">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <div class="mt-4 space-y-2">
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center justify-between rounded-lg px-2.5 py-2 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
                    <span>Profile settings</span>
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 6l6 6-6 6" />
                    </svg>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex w-full items-center justify-between rounded-lg px-2.5 py-2 text-left text-sm text-rose-300 hover:bg-slate-800 hover:text-rose-200">
                        <span>Log out</span>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</aside>
