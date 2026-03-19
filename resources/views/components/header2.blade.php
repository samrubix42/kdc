<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div x-data="{ open: false, isScrolled: false }" 
     @scroll.window="isScrolled = window.pageYOffset > 50"
     role="navigation" 
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-white/95 backdrop-blur-md border-b border-slate-100"
     :class="isScrolled ? 'py-3 shadow-sm' : 'py-5 shadow-xs'">
    
    <div class="max-w-7xl mx-auto px-6 md:px-12 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="relative group">
            <img src="{{ asset('images/KDC-Logo-crop.png') }}" alt="KDC Consultants" 
                 class="transition-all duration-300 transform group-hover:scale-105"
                 :class="isScrolled ? 'h-8 md:h-10' : 'h-10 md:h-14'">
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center space-x-10">
            @php
                $navItems = [
                    ['label' => 'Home', 'route' => 'home'],
                    ['label' => 'Projects', 'route' => 'project'],
                    ['label' => 'Profile', 'route' => 'profile'],
                    ['label' => 'Service', 'route' => 'service'],
                    ['label' => 'Clients', 'route' => 'client'],
                    ['label' => 'Blog', 'route' => 'blog'],
                    ['label' => 'Contact', 'route' => 'contact'],
                ];
            @endphp

            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}" 
                   class="relative overflow-hidden font-heading text-[12px] uppercase tracking-[0.2em] font-bold text-slate-800 transition-colors hover:text-[#cee002] group">
                    {{ $item['label'] }}
                    <span class="absolute bottom-0 left-0 w-0 h-[2px] bg-[#cee002] transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endforeach
            
            <div class="h-6 w-[1px] bg-slate-200 mx-2"></div>

            <a href="tel:+917503123111" 
               class="px-5 py-2.5 bg-slate-900 text-white rounded-xl text-[11px] font-heading font-bold uppercase tracking-widest transition-all duration-300 hover:bg-[#cee002] hover:text-slate-900 hover:shadow-xl hover:shadow-[#cee002]/20 focus:outline-none">
               Call +91 7503123111
            </a>
        </nav>

        <!-- Mobile Menu Toggle -->
        <button @click="open = !open" 
                class="lg:hidden p-2 text-slate-900 rounded-xl hover:bg-slate-50 transition-colors focus:outline-none">
            <svg x-show="!open" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
            </svg>
            <svg x-show="open" x-cloak class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>


    <!-- Mobile Menu Overlay -->
    <div x-show="open" 
         x-cloak
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="lg:hidden absolute top-full left-0 right-0 bg-white/95 backdrop-blur-xl shadow-2xl overflow-hidden border-t">
        <div class="px-8 py-10 space-y-6">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}" 
                   class="block font-heading text-lg font-semibold text-slate-900 hover:text-[#cee002] transition-colors border-b border-slate-100 pb-4">
                    {{ $item['label'] }}
                </a>
            @endforeach
            <div class="pt-6">
                <a href="tel:+917503123111" 
                   class="w-full flex items-center justify-center px-8 py-4 bg-[#cee002] text-slate-900 rounded-2xl font-heading font-bold uppercase tracking-widest transition-all hover:bg-slate-900 hover:text-white transform hover:scale-[1.02]">
                   Call: +91 7503123111
                </a>
            </div>
            
            <div class="social-list flex justify-center space-x-8 pt-4">
                <a href="#" class="text-slate-400 hover:text-blue-600 transition-colors"><i class="icon ion-social-facebook text-2xl"></i></a>
                <a href="#" class="text-slate-400 hover:text-green-600 transition-colors"><i class="icon ion-social-whatsapp text-2xl"></i></a>
                <a href="#" class="text-slate-400 hover:text-blue-800 transition-colors"><i class="icon ion-social-linkedin text-2xl"></i></a>
            </div>
        </div>
    </div>
</div>