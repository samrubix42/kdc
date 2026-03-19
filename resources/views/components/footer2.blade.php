<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<footer class="bg-slate-900 pt-24 pb-12 overflow-hidden relative">
    <!-- Sophisticated background pattern (subtle) -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:20px_20px]"></div>

    <div class="max-w-7xl mx-auto px-6 md:px-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-20">
            <!-- Brand Column -->
            <div class="lg:col-span-5 space-y-8">
                <a href="{{ route('home') }}" class="inline-block transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/KDC-Logo-crop.png') }}" alt="KDC Logo" class="h-16 brightness-0 invert">
                </a>
                <p class="text-slate-400 text-lg leading-relaxed max-w-md">
                    Leading the industry with over 26 years of excellence in architecture, interior design, and project management. Delivering visionary spaces with precision and passion.
                </p>
                <div class="flex items-center space-x-6">
                    <a href="#" class="w-12 h-12 rounded-full border border-slate-700 flex items-center justify-center text-slate-400 hover:text-[#cee002] hover:border-[#cee002] transition-all group">
                        <i class="icon ion-social-facebook text-xl group-hover:scale-110"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full border border-slate-700 flex items-center justify-center text-slate-400 hover:text-[#cee002] hover:border-[#cee002] transition-all group">
                        <i class="icon ion-social-whatsapp text-xl group-hover:scale-110"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full border border-slate-700 flex items-center justify-center text-slate-400 hover:text-[#cee002] hover:border-[#cee002] transition-all group">
                        <i class="icon ion-social-linkedin text-xl group-hover:scale-110"></i>
                    </a>
                </div>
            </div>

            <!-- Links Column -->
            <div class="lg:col-span-7 grid grid-cols-2 md:grid-cols-3 gap-12">
                <div>
                    <h4 class="font-heading text-white font-bold uppercase tracking-widest text-sm mb-8 border-b border-slate-800 pb-2">Quick Links</h4>
                    <ul class="space-y-4">
                        <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-[#cee002] transition-colors flex items-center group">
                            <span class="w-0 overflow-hidden transition-all duration-300 group-hover:w-4 group-hover:mr-2">──</span> Home
                        </a></li>
                        <li><a href="{{ route('project') }}" class="text-slate-400 hover:text-[#cee002] transition-colors flex items-center group">
                            <span class="w-0 overflow-hidden transition-all duration-300 group-hover:w-4 group-hover:mr-2">──</span> Projects
                        </a></li>
                        <li><a href="{{ route('profile') }}" class="text-slate-400 hover:text-[#cee002] transition-colors flex items-center group">
                            <span class="w-0 overflow-hidden transition-all duration-300 group-hover:w-4 group-hover:mr-2">──</span> Profile
                        </a></li>
                        <li><a href="{{ route('service') }}" class="text-slate-400 hover:text-[#cee002] transition-colors flex items-center group">
                            <span class="w-0 overflow-hidden transition-all duration-300 group-hover:w-4 group-hover:mr-2">──</span> Services
                        </a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-heading text-white font-bold uppercase tracking-widest text-sm mb-8 border-b border-slate-800 pb-2">Resources</h4>
                    <ul class="space-y-4">
                        <li><a href="{{ route('client') }}" class="text-slate-400 hover:text-[#cee002] transition-colors flex items-center group">
                            <span class="w-0 overflow-hidden transition-all duration-300 group-hover:w-4 group-hover:mr-2">──</span> Clients
                        </a></li>
                        <li><a href="{{ route('blog') }}" class="text-slate-400 hover:text-[#cee002] transition-colors flex items-center group">
                            <span class="w-0 overflow-hidden transition-all duration-300 group-hover:w-4 group-hover:mr-2">──</span> Journal
                        </a></li>
                        <li><a href="{{ route('contact') }}" class="text-slate-400 hover:text-[#cee002] transition-colors flex items-center group">
                            <span class="w-0 overflow-hidden transition-all duration-300 group-hover:w-4 group-hover:mr-2">──</span> Contact Us
                        </a></li>
                    </ul>
                </div>

                <div class="col-span-2 md:col-span-1">
                    <h4 class="font-heading text-white font-bold uppercase tracking-widest text-sm mb-8 border-b border-slate-800 pb-2">Reach Us</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3 text-slate-400 group">
                            <svg class="w-5 h-5 text-[#cee002] mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="group-hover:text-white transition-colors">Sector 18, Gurgaon,<br>Haryana, India</span>
                        </li>
                        <li class="flex items-center space-x-3 text-slate-400 group">
                            <svg class="w-5 h-5 text-[#cee002] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span class="group-hover:text-white transition-colors">+91 7503123111</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="pt-12 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/kdc-5.png') }}" class="h-6 brightness-0 invert opacity-60" alt="">
                <p class="text-slate-500 text-sm">
                    &copy; {{ date('Y') }} KDC Consultants. All Rights Reserved.
                </p>
            </div>
            <p class="text-slate-500 text-sm">
                Design by <a href="#" class="text-slate-400 hover:text-white transition-colors">Techonika</a>
            </p>
        </div>
    </div>
</footer>