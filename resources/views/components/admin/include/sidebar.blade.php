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
    class="w-64 h-screen bg-white border-r flex flex-col"
>

    <div class="p-5 text-xl font-bold border-b">
        Admin Panel
    </div>

    <nav class="flex-1 overflow-y-auto p-3 space-y-2">

        @foreach ($menu as $index => $item)

            {{-- SIMPLE MENU --}}
            @if (!$item->hasSubmenu)

                <a href="{{ $item->url }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition
                   {{ request()->url() == $item->url ? 'bg-gray-200 font-semibold' : '' }}">

                    <i class="{{ $item->icon }} text-lg"></i>

                    <span>{{ $item->title }}</span>

                </a>

            @else

            {{-- MENU WITH SUBMENU --}}

            <div>

                <button
                    @click="openMenu === {{ $index }} ? openMenu = null : openMenu = {{ $index }}"
                    class="w-full flex items-center justify-between px-3 py-2 rounded-lg hover:bg-gray-100">

                    <div class="flex items-center gap-3">
                        <i class="{{ $item->icon }}"></i>
                        <span>{{ $item->title }}</span>
                    </div>

                    <svg class="w-4 h-4 transition-transform"
                        :class="openMenu === {{ $index }} ? 'rotate-180' : ''"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"/>
                    </svg>

                </button>

                {{-- SUBMENU --}}

                <div
                    x-show="openMenu === {{ $index }}"
                    x-transition
                    class="ml-8 mt-2 space-y-1">

                    @foreach ($item->submenu as $sub)

                        <a href="{{ $sub->url }}"
                           class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100
                           {{ request()->url() == $sub->url ? 'bg-gray-200 font-medium' : '' }}">

                            <i class="{{ $sub->icon }}"></i>

                            <span>{{ $sub->title }}</span>

                        </a>

                    @endforeach

                </div>

            </div>

            @endif

        @endforeach

    </nav>

</div>