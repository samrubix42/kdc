<?php

use Livewire\Component;
use App\View\Builders\AdminSidebar;

new class extends Component
{
    public $menu = [];

    public function mount()
    {
        $this->menu = AdminSidebar::menu(auth()->user())->get();
    }
};
?>

<div 
    x-data="{ openMenu: null }"
    class="w-64 h-screen shadow bg-slate-50 flex flex-col shadow-sm"
>

    {{-- LOGO / TITLE --}}
    <div class="px-6 py-5 text-xl font-semibold text-sky-700 tracking-wide">
        Admin Panel
    </div>

    {{-- MENU --}}
    <nav class="flex-1 overflow-y-auto px-4 py-3 space-y-2">

        @foreach ($menu as $index => $item)

            {{-- SIMPLE MENU --}}
            @if (!$item->hasSubmenu)

                <a href="{{ $item->url }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600
                   hover:bg-sky-50 hover:text-sky-700 transition-all
                   {{ request()->url() == $item->url ? 'bg-sky-100 text-sky-700 font-medium' : '' }}">

                    <i class="{{ $item->icon }} text-lg text-sky-600"></i>

                    <span>{{ $item->title }}</span>

                </a>

            @else

            {{-- MENU WITH SUBMENU --}}
            <div>

                <button
                    @click="openMenu === {{ $index }} ? openMenu = null : openMenu = {{ $index }}"
                    class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg text-slate-600
                    hover:bg-sky-50 hover:text-sky-700 transition">

                    <div class="flex items-center gap-3">

                        <i class="{{ $item->icon }} text-lg text-sky-600"></i>

                        <span>{{ $item->title }}</span>

                    </div>

                    <svg class="w-4 h-4 transition-transform"
                        :class="openMenu === {{ $index }} ? 'rotate-180 text-sky-600' : ''"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"/>

                    </svg>

                </button>

                {{-- SUBMENU --}}
                <div
                    x-show="openMenu === {{ $index }}"
                    x-transition
                    class="ml-7 mt-2 space-y-1">

                    @foreach ($item->submenu as $sub)

                        <a href="{{ $sub->url }}"
                           class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-500
                           hover:bg-sky-50 hover:text-sky-700 transition
                           {{ request()->url() == $sub->url ? 'bg-sky-100 text-sky-700 font-medium' : '' }}">

                            <i class="{{ $sub->icon }} text-sky-500"></i>

                            <span>{{ $sub->title }}</span>

                        </a>

                    @endforeach

                </div>

            </div>

            @endif

        @endforeach

    </nav>

</div>