<?php

use Livewire\Component;

new class extends Component
{
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
};
?>

<header 
    x-data="{ profileOpen:false }"
    class="h-16 flex items-center justify-between px-6 bg-slate-50">

    {{-- LEFT SECTION --}}
    <div class="flex items-center gap-5">

        {{-- MOBILE MENU --}}
        <button 
            @click="$dispatch('toggle-sidebar')"
            class="lg:hidden p-2 rounded-lg hover:bg-sky-100 transition">

            <i class="ri-menu-line text-xl text-sky-600"></i>

        </button>

        {{-- PAGE TITLE --}}
        <h1 class="text-lg font-semibold text-slate-700">
            Admin Dashboard
        </h1>

    </div>

    {{-- RIGHT SECTION --}}
    <div class="flex items-center gap-4">

        {{-- SEARCH --}}
        <div class="hidden md:flex items-center bg-white rounded-full px-4 py-2 shadow-sm">

            <i class="ri-search-line text-slate-400 mr-2"></i>

            <input
                type="text"
                placeholder="Search..."
                class="bg-transparent text-sm focus:outline-none w-48 placeholder-slate-400">

        </div>

        {{-- NOTIFICATION --}}
        <button class="relative p-2 rounded-full hover:bg-sky-100 transition">

            <i class="ri-notification-3-line text-xl text-slate-600"></i>

            <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 rounded-full animate-pulse"></span>

        </button>

        {{-- PROFILE --}}
        <div class="relative">

            <button
                @click="profileOpen = !profileOpen"
                class="flex items-center gap-3 hover:bg-sky-100 px-3 py-1.5 rounded-full transition">

                <img
                    src="https://ui-avatars.com/api/?background=random&name={{ urlencode($user->name) }}"
                    class="w-9 h-9 rounded-full shadow-sm">

                <div class="hidden md:block text-left">

                    <div class="text-sm font-semibold text-slate-700 leading-none">
                        {{ $user->name }}
                    </div>

                    <div class="text-xs text-slate-400">
                        Administrator
                    </div>

                </div>

                <i class="ri-arrow-down-s-line text-slate-500"></i>

            </button>

            {{-- DROPDOWN --}}
            <div
                x-show="profileOpen"
                @click.outside="profileOpen=false"
                x-transition
                class="absolute right-0 mt-3 w-52 bg-white rounded-xl shadow-lg overflow-hidden">

                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-sky-50 transition">

                    <i class="ri-user-line text-sky-600"></i>
                    Profile

                </a>

                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-sky-50 transition">

                    <i class="ri-settings-3-line text-sky-600"></i>
                    Settings

                </a>

                <button
                    wire:click="logout"
                    class="w-full text-left flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-red-50 transition">

                    <i class="ri-logout-box-line text-red-500"></i>
                    Logout

                </button>

            </div>

        </div>

    </div>

</header>