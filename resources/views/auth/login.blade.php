<x-guest-layout>
    <div class="card border border-base-300 bg-base-100 shadow-2xl">
        <div class="card-body p-6 sm:p-8">
            <div class="mb-6 text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-primary text-2xl text-primary-content shadow-lg shadow-primary/20">
                    🔐
                </div>
                <h1 class="mt-4 text-2xl font-bold tracking-tight">Welcome back</h1>
                <p class="mt-2 text-sm text-base-content/70">Sign in to continue to your workspace</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div class="form-control">
                    <x-input-label for="email" :value="__('Email')" class="label pb-2" />
                    <x-text-input id="email" class="input input-bordered w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" />
                </div>

                <div class="form-control">
                    <x-input-label for="password" :value="__('Password')" class="label pb-2" />
                    <x-text-input id="password" class="input input-bordered w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" />
                </div>

                <div class="flex items-center justify-between gap-3 pt-1">
                    <label for="remember_me" class="label cursor-pointer justify-start gap-3 p-0">
                        <input id="remember_me" type="checkbox" class="checkbox checkbox-primary checkbox-sm" name="remember">
                        <span class="label-text text-sm">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="link link-primary link-hover text-sm" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="pt-2">
                    <x-primary-button class="btn btn-primary w-full">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
