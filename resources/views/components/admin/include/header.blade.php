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
    class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-6">

    <!-- LEFT -->

    <div class="flex items-center gap-4">

        <!-- MOBILE MENU -->

        <button
            @click="$dispatch('toggle-sidebar')"
            class="lg:hidden p-2 rounded-md hover:bg-slate-100 transition">

            <i class="ri-menu-line text-xl text-slate-600"></i>

        </button>


        <!-- PAGE TITLE -->

        <h1 class="text-sm sm:text-base font-semibold text-slate-800">
            Admin Dashboard
        </h1>

    </div>



    <!-- RIGHT -->

    <div class="flex items-center gap-3 sm:gap-4">


        <!-- SEARCH -->

        <div class="hidden md:flex items-center border border-slate-200 rounded-md px-3 py-1.5 bg-slate-50">

            <i class="ri-search-line text-slate-400 mr-2"></i>

            <input
                type="text"
                placeholder="Search..."
                class="bg-transparent text-sm focus:outline-none w-40 placeholder-slate-400">

        </div>



        <!-- NOTIFICATION -->

        <button
            class="relative p-2 rounded-md hover:bg-slate-100 transition">

            <i class="ri-notification-3-line text-lg text-slate-600"></i>

            <span
                class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full">
            </span>

        </button>



        <!-- PROFILE -->

        <div class="relative">

            <button
                @click="profileOpen = !profileOpen"
                class="flex items-center gap-2 sm:gap-3 px-2 py-1 rounded-md hover:bg-slate-100 transition">

                <img
                    src="https://ui-avatars.com/api/?background=2563eb&color=fff&name={{ urlencode($user->name) }}"
                    class="w-8 h-8 rounded-full">

                <div class="hidden md:block text-left">

                    <div class="text-sm font-medium text-slate-800 leading-none">
                        {{ $user->name }}
                    </div>

                    <div class="text-xs text-slate-400">
                        Administrator
                    </div>

                </div>

                <i class="ri-arrow-down-s-line text-slate-500"></i>

            </button>


            <!-- DROPDOWN -->

            <div
                x-show="profileOpen"
                @click.outside="profileOpen=false"
                x-transition
                class="absolute right-0 mt-2 w-52 bg-white rounded-md shadow-lg border border-slate-200 overflow-hidden">

                <a
                    href="#"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50">

                    <i class="ri-user-line text-slate-500"></i>
                    Profile

                </a>

                <a
                    href="#"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50">

                    <i class="ri-settings-3-line text-slate-500"></i>
                    Settings

                </a>

                <div class="border-t border-slate-100"></div>

                <button
                    wire:click="logout"
                    class="w-full text-left flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50">

                    <i class="ri-logout-box-line"></i>
                    Logout

                </button>

            </div>

        </div>

    </div>

</header>