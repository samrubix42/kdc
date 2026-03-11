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
    class="w-64 h-screen bg-white border-r border-slate-200 flex flex-col"
>

    <!-- LOGO / HEADER -->

    <div class="px-6 py-5 border-b border-slate-200 flex items-center gap-2">

        <div class="w-8 h-8 bg-blue-600 text-white flex items-center justify-center rounded-md text-sm font-bold">
            A
        </div>

        <span class="text-sm font-semibold text-slate-800 tracking-wide">
            Admin Panel
        </span>

    </div>


    <!-- MENU -->

    <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">

        @foreach ($menu as $index => $item)

            <!-- SIMPLE MENU -->

            @if (!$item->hasSubmenu)

                <a
                    href="{{ $item->url }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm transition
                    {{ request()->url() == $item->url
                        ? 'bg-blue-50 text-blue-600 font-medium'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900'
                    }}">

                    <i class="{{ $item->icon }} text-lg"></i>

                    <span>{{ $item->title }}</span>

                </a>

            @else


            <!-- MENU WITH SUBMENU -->

            <div>

                <button
                    @click="openMenu === {{ $index }} ? openMenu = null : openMenu = {{ $index }}"
                    class="w-full flex items-center justify-between px-3 py-2 rounded-md text-sm text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">

                    <div class="flex items-center gap-3">

                        <i class="{{ $item->icon }} text-lg"></i>

                        <span>{{ $item->title }}</span>

                    </div>

                    <i
                        class="ri-arrow-down-s-line transition-transform"
                        :class="openMenu === {{ $index }} ? 'rotate-180 text-blue-600' : ''">
                    </i>

                </button>


                <!-- SUBMENU -->

                <div
                    x-show="openMenu === {{ $index }}"
                    x-transition
                    class="ml-6 mt-1 space-y-1">

                    @foreach ($item->submenu as $sub)

                        <a
                            href="{{ $sub->url }}"
                            class="flex items-center gap-2 px-3 py-2 rounded-md text-sm transition
                            {{ request()->url() == $sub->url
                                ? 'bg-blue-50 text-blue-600 font-medium'
                                : 'text-slate-500 hover:bg-slate-100 hover:text-slate-800'
                            }}">

                            <i class="{{ $sub->icon }}"></i>

                            <span>{{ $sub->title }}</span>

                        </a>

                    @endforeach

                </div>

            </div>

            @endif

        @endforeach

    </nav>


    <!-- FOOTER -->

    <div class="px-4 py-3 border-t border-slate-200 text-xs text-slate-400">
        Admin Dashboard
    </div>

</div>