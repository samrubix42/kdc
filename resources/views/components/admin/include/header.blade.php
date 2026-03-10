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
    class="bg-white border-b h-16 flex items-center justify-between px-6">

    {{-- LEFT SECTION --}}
    <div class="flex items-center gap-4">

        {{-- MOBILE MENU BUTTON --}}
        <button 
            @click="$dispatch('toggle-sidebar')"
            class="lg:hidden p-2 rounded hover:bg-gray-100">

            <i class="ri-menu-line text-xl"></i>

        </button>

        <h1 class="text-lg font-semibold text-gray-700">
            Admin Dashboard
        </h1>

    </div>

    {{-- RIGHT SECTION --}}
    <div class="flex items-center gap-6">

        {{-- SEARCH --}}
        <div class="hidden md:block">
            <input
                type="text"
                placeholder="Search..."
                class="border rounded-lg px-3 py-1.5 focus:outline-none focus:ring w-64">
        </div>

        {{-- NOTIFICATIONS --}}
        <button class="relative p-2 rounded hover:bg-gray-100">

            <i class="ri-notification-3-line text-xl"></i>

            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>

        </button>

        {{-- USER DROPDOWN --}}
        <div class="relative">

            <button
                @click="profileOpen = !profileOpen"
                class="flex items-center gap-3">

                <img
                    src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                    class="w-9 h-9 rounded-full border">

                <div class="hidden md:block text-left">

                    <div class="text-sm font-medium">
                        {{ $user->name }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Admin
                    </div>

                </div>

                <i class="ri-arrow-down-s-line"></i>

            </button>

            {{-- DROPDOWN --}}
            <div
                x-show="profileOpen"
                @click.outside="profileOpen=false"
                x-transition
                class="absolute right-0 mt-3 w-48 bg-white border rounded-lg shadow-lg">

                <a href="#"
                   class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">

                    <i class="ri-user-line"></i>
                    Profile

                </a>

                <a href="#"
                   class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">

                    <i class="ri-settings-3-line"></i>
                    Settings

                </a>

                <button
                    wire:click="logout"
                    class="w-full text-left flex items-center gap-2 px-4 py-2 hover:bg-gray-100">

                    <i class="ri-logout-box-line"></i>
                    Logout

                </button>

            </div>

        </div>

    </div>

</header>