<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::guest')] class extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function mount(): void
    {
        if (Auth::check()) {
            $this->redirect->route('admin.dashboard', navigate: true);
        }
    }

    public function login(): void
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $this->remember)) {
            $this->addError('email', 'The provided credentials do not match our records.');

            return;
        }

        request()->session()->regenerate();

        $this->redirectRoute('admin.dashboard', navigate: true);
    }
};
?>

<div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 px-4 py-12">
    <div class="mx-auto flex min-h-[calc(100vh-6rem)] max-w-6xl overflow-hidden rounded-3xl border border-white/10 bg-white shadow-2xl shadow-slate-950/25">
        <div class="hidden w-1/2 flex-col justify-between bg-slate-900 p-10 text-white lg:flex">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-cyan-300">KDC Admin</p>
                <h1 class="mt-6 max-w-sm text-4xl font-semibold leading-tight">
                    Sign in to manage the admin dashboard.
                </h1>
                <p class="mt-4 max-w-md text-sm text-slate-300">
                    Use the seeded admin credentials to access content, testimonials, blogs, and future admin tools.
                </p>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                <p class="text-sm text-slate-300">Access includes:</p>
                <ul class="mt-4 space-y-3 text-sm text-slate-100">
                    <li class="flex items-center gap-3">
                        <span class="h-2 w-2 rounded-full bg-cyan-300"></span>
                        Secure session-based authentication
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="h-2 w-2 rounded-full bg-cyan-300"></span>
                        Protected admin routes
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="h-2 w-2 rounded-full bg-cyan-300"></span>
                        Seeded admin account for first login
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex w-full items-center justify-center bg-white px-6 py-10 sm:px-10 lg:w-1/2">
            <div class="w-full max-w-md">
                <div class="mb-8">
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-400">Admin Login</p>
                    <h2 class="mt-3 text-3xl font-semibold text-slate-900">Welcome back</h2>
                    <p class="mt-2 text-sm text-slate-500">Enter your email and password to continue.</p>
                </div>

                <form wire:submit="login" class="space-y-5">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Email</label>
                        <input
                            wire:model="email"
                            id="email"
                            type="email"
                            autocomplete="email"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-slate-400 focus:bg-white"
                            placeholder="admin@example.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-medium text-slate-700">Password</label>
                        <input
                            wire:model="password"
                            id="password"
                            type="password"
                            autocomplete="current-password"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-slate-400 focus:bg-white"
                            placeholder="Enter your password">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <label class="flex items-center gap-3 text-sm text-slate-600">
                        <input wire:model="remember" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-400">
                        <span>Keep me signed in</span>
                    </label>

                    <button
                        type="submit"
                        class="w-full rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
