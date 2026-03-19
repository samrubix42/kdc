<?php

use Livewire\Component;
use App\Models\Blog;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app2')] class extends Component
{
    public function with(): array
    {
        return [
            'blogs' => Blog::where('is_active', true)
                ->latest()
                ->take(3)
                ->get(),
        ];
    }
};
?>

@section('meta_title', 'KDC Consultants | Architecture, Interiors & Project Delivery')
@section('meta_description', 'KDC Consultants delivers architecture, interiors, and project management services with over two decades of expertise across residential, commercial, and industrial sectors.')


<div>
    <!-- Hero Section -->
    <section class="relative min-h-[85vh] py-24 flex items-center overflow-hidden bg-slate-900">
        <!-- Background Image with Overlay (Properly Full Width) -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('building/banner3.jpg') }}" class="w-full h-full object-cover opacity-60 scale-105 animate-slow-zoom" alt="Hero Background">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/40 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full px-6 md:px-12 relative z-10 py-24">
            <div class="max-w-4xl space-y-10">
                <div x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 300)" class="space-y-8">
                    <span x-show="shown" x-cloak x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 -translate-x-4" x-transition:enter-end="opacity-100 translate-x-0"
                        class="inline-flex items-center gap-3 px-4 py-2 bg-white/5 border border-white/10 text-[#cee002] rounded-full text-[11px] font-black uppercase tracking-[0.3em] backdrop-blur-sm">
                        <span class="w-2 h-2 rounded-full bg-[#cee002] animate-pulse"></span>
                        Architectural Excellence
                    </span>

                    <h1 x-show="shown" x-cloak x-transition:enter="transition ease-out duration-1000 delay-300" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0"
                        class="text-5xl sm:text-7xl lg:text-[6.5rem] font-black text-white leading-[1.05] tracking-tight">
                        We define the <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-[#cee002] to-white/70 italic">Future of Space.</span>
                    </h1>

                    <p x-show="shown" x-cloak x-transition:enter="transition ease-out duration-1000 delay-500" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0"
                        class="text-slate-300 text-lg md:text-2xl max-w-2xl leading-relaxed font-medium border-l-4 border-[#cee002]/30 pl-8">
                        Redefining architecture and interiors through innovative design, strategic planning, and flawless execution for over two decades.
                    </p>
                </div>

                <div x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 1000)" class="flex flex-wrap gap-8 items-center pt-6">
                    <a x-show="shown" x-cloak x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        href="{{ route('project') }}"
                        class="px-10 py-5 bg-[#cee002] text-slate-900 rounded-xl font-heading font-black uppercase tracking-widest text-xs transition-all hover:bg-white hover:-translate-y-1 hover:shadow-2xl">
                        Our Portfolio
                    </a>
                    <a x-show="shown" x-cloak x-transition:enter="transition ease-out duration-1000 delay-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        href="{{ route('contact') }}"
                        class="px-10 py-5 bg-white/5 backdrop-blur-md text-white border border-white/20 rounded-xl font-heading font-black uppercase tracking-widest text-xs transition-all hover:bg-white hover:text-slate-900">
                        Start a Project
                    </a>
                </div>
            </div>
        </div>
        <!-- Scroll Indicator -->
        <div class="absolute bottom-12 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="section-padding bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#cee002]/5 rounded-full -mr-48 -mt-48 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="flex flex-col lg:flex-row items-center gap-24">
                <div class="lg:w-1/2 relative group">
                    <div class="relative z-10 rounded-[2.5rem] overflow-hidden shadow-2xl transition-transform duration-700">
                        <img src="{{ asset('building/19112.jpg') }}" alt="KDC Office" class="w-full h-[550px] grayscale-[40%] group-hover:grayscale-0 transition-all duration-700">
                    </div>
                    <!-- Experience Badge -->
                    <div class="absolute -bottom-8 -right-8 bg-slate-900 p-8 rounded-[2rem] shadow-2xl z-20 transition-transform duration-500 group-hover:translate-x-2 group-hover:translate-y-2">
                        <div class="text-[#cee002] text-5xl font-black font-heading leading-none">26</div>
                        <div class="text-white/60 text-[10px] font-black uppercase tracking-[0.2em] mt-3 leading-tight">Years Of<br>Global Vision</div>
                    </div>
                </div>

                <div class="lg:w-1/2 space-y-12">
                    <div class="space-y-6">
                        <div class="flex items-center gap-4 text-[#cee002]">
                            <span class="w-12 h-[2px] bg-[#cee002]"></span>
                            <span class="font-black uppercase tracking-[0.4em] text-[10px]">Since 1999</span>
                        </div>
                        <h2 class="text-5xl lg:text-6xl font-black text-slate-900 leading-[1.1] tracking-tighter">
                            Exceptional <br><span class="text-slate-400">Design Ethics.</span>
                        </h2>
                        <p class="text-slate-500 text-lg leading-relaxed font-medium">
                            KDC is a revolutionary emergence in the field of architectural assignments, formulated on the ethics of Professionalism and versatility. Our acumen has been dedicated for over 26 years to this industry.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-12 border-t border-slate-100 pt-10">
                        <div class="space-y-1">
                            <div class="text-4xl font-black text-slate-900 tracking-tighter">500<span class="text-[#cee002]">+</span></div>
                            <div class="text-slate-400 uppercase tracking-widest text-[9px] font-black leading-none">Global Assignments</div>
                        </div>
                        <div class="space-y-1">
                            <div class="text-4xl font-black text-slate-900 tracking-tighter">100<span class="text-[#cee002]">%</span></div>
                            <div class="text-slate-400 uppercase tracking-widest text-[9px] font-black leading-none">Design Precision</div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('profile') }}" class="group inline-flex items-center gap-4 text-slate-900 font-black uppercase tracking-[0.2em] text-[10px]">
                            <span class="flex items-center justify-center w-12 h-12 rounded-full border border-slate-200 transition-all group-hover:bg-slate-900 group-hover:text-white group-hover:border-slate-900">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </span>
                            Experience More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Projects Section -->
    <section class="section-padding bg-slate-50">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="flex flex-col md:flex-row justify-between items-end gap-12 mb-20">
                <div class="max-w-2xl space-y-6">
                    <div class="flex items-center gap-3 text-[#cee002]">
                        <span class="w-8 h-[2px] bg-[#cee002]"></span>
                        <span class="font-black uppercase tracking-[0.4em] text-[9px]">Portfolio Excellence</span>
                    </div>
                    <h2 class="text-5xl font-black text-slate-900 tracking-tighter">Recent <span class="text-slate-400">Works.</span></h2>
                </div>
                <a href="{{ route('project') }}" class="px-8 py-3.5 bg-white text-slate-900 border border-slate-200 shadow-sm rounded-xl font-black uppercase tracking-[0.2em] text-[9px] hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all">
                    View Comprehensive Portfolio
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @php
                $featuredProjects = [
                ['title' => 'The Forest Residence', 'type' => 'Residential Design', 'image' => 'images/projects/1-426x574.jpg'],
                ['title' => 'Industrial Complex', 'type' => 'Infrastructure', 'image' => 'images/projects/2-426x574.jpg'],
                ['title' => 'Corporate Hub', 'type' => 'Commercial Hub', 'image' => 'images/projects/3-426x574.jpg'],
                ];
                @endphp

                @foreach ($featuredProjects as $project)
                <div class="group relative aspect-[4/5.5] rounded-[3rem] overflow-hidden bg-slate-100 transition-all duration-700 hover:-translate-y-2">
                    <img src="{{ asset($project['image']) }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110 grayscale-[20%] group-hover:grayscale-0" alt="{{ $project['title'] }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-12 translate-y-4 group-hover:translate-y-0 transition-all duration-500">
                        <span class="text-[#cee002] font-black uppercase tracking-[0.3em] text-[8px] border-b border-[#cee002]/30 pb-1 mb-4 inline-block">{{ $project['type'] }}</span>
                        <h3 class="text-white text-3xl font-black leading-tight">{{ $project['title'] }}</h3>
                        <div class="opacity-0 group-hover:opacity-100 transition-all duration-500 mt-6 overflow-hidden">
                            <a href="#" class="inline-flex items-center gap-3 text-white/60 text-[9px] font-black uppercase tracking-[0.3em] hover:text-[#cee002]">
                                Project Details
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CEO Section -->
    <section class="section-padding bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0 100 L100 0 L100 100 Z" fill="currentColor"></path>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-6 md:px-12 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-24">
                <div class="md:w-5/12">
                    <div class="relative group">
                        <div class="absolute -inset-6 border border-dashed border-white/10 rounded-full animate-spin-slow"></div>
                        <img src="{{ asset('images/kachroo.jpg') }}" alt="Vijay Kachroo" class="w-80 h-80 md:w-full md:aspect-square object-cover rounded-full shadow-2xl grayscale hover:grayscale-0 transition-all duration-1000 border-2 border-white/5">
                        <div class="absolute top-1/2 -right-8 bg-[#cee002] text-slate-900 px-5 py-3 rounded-xl shadow-2xl font-black uppercase text-[9px] tracking-[0.3em] transform -rotate-12 group-hover:rotate-0 transition-transform duration-500">
                            The Visionary
                        </div>
                    </div>
                </div>

                <div class="md:w-7/12 space-y-12">
                    <div class="space-y-6">
                        <div class="flex items-center gap-4 text-[#cee002]">
                            <span class="w-12 h-[2px] bg-[#cee002]"></span>
                            <span class="font-black uppercase tracking-[0.4em] text-[10px]">Leader Presence</span>
                        </div>
                        <h2 class="text-5xl lg:text-7xl font-black leading-[1.05] tracking-tighter">
                            A Legacy Of <br><span class="italic text-transparent bg-clip-text bg-gradient-to-r from-white to-white/40">Pure Brilliance.</span>
                        </h2>
                    </div>
                    <div class="space-y-8">
                        <p class="text-slate-400 text-xl leading-relaxed italic font-medium">
                            "Vision is the art of seeing what is invisible to others. Since our inception, we've focused on creating deep emotional connections between people and their environment."
                        </p>
                        <div class="pt-6 border-t border-white/10">
                            <span class="block text-3xl font-black text-white tracking-tight">Vijay Kachroo</span>
                            <span class="block text-[#cee002] font-black uppercase tracking-[0.4em] text-[10px] mt-2">Principal Architect & Founder</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="flex flex-col md:flex-row justify-between items-end gap-12 mb-20">
                <div class="max-w-xl space-y-6">
                    <div class="flex items-center gap-4 text-[#cee002]">
                        <span class="w-12 h-[2px] bg-[#cee002]"></span>
                        <span class="font-black uppercase tracking-[0.4em] text-[10px]">Knowledge Base</span>
                    </div>
                    <h2 class="text-5xl font-black text-slate-900 tracking-tighter">Insights & <span class="text-slate-400">Journal.</span></h2>
                </div>
                <a href="{{ route('blog') }}" class="group flex items-center gap-4 text-slate-900 font-black uppercase tracking-[0.2em] text-[10px]">
                    Read Our Stories
                    <span class="w-12 h-12 rounded-full border border-slate-200 flex items-center justify-center group-hover:bg-slate-900 group-hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
                @forelse($blogs as $blog)
                <article class="group space-y-8">
                    <div class="relative aspect-[16/10] rounded-[2rem] overflow-hidden shadow-2xl">
                        <img src="{{ $blog->image ? Storage::url($blog->image) : asset('images/news/1-370x370.jpg') }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" alt="{{ $blog->title }}">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-all duration-700"></div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="text-[#cee002] font-black uppercase tracking-widest text-[8px]">{{ $blog->created_at?->format('M d, Y') }}</span>
                            <span class="w-4 h-[1px] bg-slate-200"></span>
                            <span class="text-slate-400 font-black uppercase tracking-widest text-[8px]">Articles</span>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 group-hover:text-[#cee002] transition-colors leading-tight">{{ $blog->title }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed line-clamp-2">{{ $blog->description ?: Str::limit(strip_tags($blog->content), 120) }}</p>
                        <a href="{{ route('blog.detail', $blog->slug) }}" class="inline-flex items-center gap-2 text-slate-900 font-black uppercase tracking-[0.2em] text-[9px] border-b-2 border-slate-100 group-hover:border-[#cee002] transition-all pb-1">
                            Continue Selection
                        </a>
                    </div>
                </article>
                @empty
                <div class="col-span-full py-24 bg-slate-50 rounded-[3rem] text-center border-2 border-dashed border-slate-200">
                    <p class="text-slate-400 font-black uppercase tracking-widest text-xs">Awaiting new journal entries...</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Clients Marquee / Partner Logos -->
    <section class="py-20 bg-slate-50 border-y border-slate-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 mb-16">
            <h4 class="text-center text-slate-400 font-black uppercase tracking-[0.5em] text-[8px]">Strategic Power Partners</h4>
        </div>

        <div class="relative flex overflow-x-hidden">
            <div class="flex animate-marquee items-center space-x-20 whitespace-nowrap">
                @php
                $partnerImages = collect(\Illuminate\Support\Facades\File::files(public_path('images/partner')))
                ->sortBy(fn ($file) => $file->getFilename(), SORT_NATURAL | SORT_FLAG_CASE)
                ->values();
                @endphp
                @foreach ($partnerImages as $partnerImage)
                <img alt="{{ pathinfo($partnerImage->getFilename(), PATHINFO_FILENAME) }}"
                    class="h-12 md:h-16 opacity-30 grayscale hover:opacity-100 hover:grayscale-0 transition-all cursor-pointer"
                    src="{{ asset('images/partner/' . $partnerImage->getFilename()) }}">
                @endforeach
            </div>
            <!-- Duplicate for infinite marquee effect -->
            <div class="flex absolute top-0 animate-marquee2 items-center space-x-20 whitespace-nowrap">
                @foreach ($partnerImages as $partnerImage)
                <img alt="{{ pathinfo($partnerImage->getFilename(), PATHINFO_FILENAME) }}"
                    class="h-12 md:h-16 opacity-30 grayscale hover:opacity-100 hover:grayscale-0 transition-all cursor-pointer"
                    src="{{ asset('images/partner/' . $partnerImage->getFilename()) }}">
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .animate-slow-zoom {
            animation: slow-zoom 20s ease-in-out infinite alternate;
        }

        @keyframes slow-zoom {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        .animate-marquee {
            animation: marquee 40s linear infinite;
        }

        .animate-marquee2 {
            animation: marquee2 40s linear infinite;
            left: 100%;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        @keyframes marquee2 {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .animate-spin-slow {
            animation: spin 10s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        [x-cloak] {
            display: none !important;
        }
    </style>

</div>