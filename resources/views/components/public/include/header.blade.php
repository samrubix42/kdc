<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div x-data="{ mobileMenuOpen: false, scrolled: false }" 
     @scroll.window="scrolled = (window.scrollY > 20)"
     class="header-container"
     :class="{ 'scrolled': scrolled }">
    @php
        $navItems = [
            ['label' => 'Home', 'route' => 'home'],
            ['label' => 'Projects', 'route' => 'project'],
            ['label' => 'Profile', 'route' => 'profile'],
            ['label' => 'Service', 'route' => 'service'],
            ['label' => 'Our Team', 'route' => 'our-team'],
            ['label' => 'Clients', 'route' => 'client'],
            ['label' => 'Blog', 'route' => 'blog'],
            ['label' => 'Contact', 'route' => 'contact'],
        ];
    @endphp

    <style>
        .header-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            padding: 1.5rem 0;
        }

        .header-container.scrolled {
            padding: 0.8rem 0;
            background: rgba(255, 255, 255, 0.98);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .logo-area img {
            height: clamp(35px, 6vw, 45px);
            transition: height 0.3s ease;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-item {
            color: #1a1a1a;
            font-weight: 500;
            text-decoration: none;
            font-size: 1.05rem;
            transition: color 0.3s, transform 0.3s;
            position: relative;
        }

        .nav-item::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #95BF19;
            transition: width 0.3s;
        }

        .nav-item:hover {
            color: #95BF19;
            text-decoration: none;
        }

        .nav-item:hover::after {
            width: 100%;
        }

        .nav-item.active {
            color: #95BF19;
        }

        .nav-item.active::after {
            width: 100%;
        }

        .right-side {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .contact-pill {
            background: #f8f9fa;
            padding: 0.6rem 1.2rem;
            border-radius: 50px;
            font-weight: 600;
            color: #333;
            text-decoration: none;
            font-size: 0.95rem;
            border: 1px solid #eee;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .contact-pill:hover {
            background: #95BF19;
            color: #fff;
            border-color: #95BF19;
            text-decoration: none;
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px;
            z-index: 1002;
            position: relative;
        }

        .hamburger {
            width: 25px;
            height: 2px;
            background: #333;
            display: block;
            transition: all 0.3s ease;
            position: relative;
        }

        .hamburger::before,
        .hamburger::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 2px;
            background: #333;
            left: 0;
            transition: all 0.3s ease;
        }

        .hamburger::before { top: -8px; }
        .hamburger::after { bottom: 8px; }

        .active .hamburger {
            background: transparent;
        }

        .active .hamburger::before {
            transform: rotate(45deg);
            top: 0;
        }

        .active .hamburger::after {
            transform: rotate(-45deg);
            bottom: 0;
        }

        /* Mobile Menu */
        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: #fff;
            z-index: 1001;
            padding: 6rem 2rem;
            transform: translateX(100%);
            transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
            overflow-y: auto;
        }

        .mobile-overlay.open {
            transform: translateX(0);
        }

        .mobile-nav-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            text-align: center;
        }

        .mobile-nav-item {
            font-size: 2rem;
            font-weight: 700;
            color: #1a1a1a;
            text-decoration: none;
            transition: color 0.3s;
        }

        .mobile-nav-item:hover, .mobile-nav-item.active {
            color: #95BF19;
        }

        @media (max-width: 1024px) {
            .nav-links, .right-side .contact-pill {
                display: none;
            }
            .mobile-toggle {
                display: block;
            }
            .header-content {
                padding: 0 1.5rem;
            }
            .header-container {
                padding: 1rem 0;
            }
        }
    </style>

    <div class="header-content" :class="{ 'active': mobileMenuOpen }">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo-area">
            <img src="{{ asset('images/KDC-Logo-crop.png') }}" alt="KDC Consultants Logo">
        </a>

        <!-- Desktop Navigation -->
        <nav class="nav-links">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}" 
                   class="nav-item {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <!-- Right Side CTA & Mobile Toggle -->
        <div class="right-side">
            <a href="tel:+917503123111" class="contact-pill shadow-sm">
                <i class="ion-ios-telephone"></i> Call: +91 750 3123 111
            </a>
            
            <button class="mobile-toggle" 
                    @click="mobileMenuOpen = !mobileMenuOpen; if(mobileMenuOpen) document.body.style.overflow = 'hidden'; else document.body.style.overflow = 'auto'"
                    :class="{ 'active': mobileMenuOpen }"
                    aria-label="Toggle navigation">
                <div class="hamburger"></div>
            </button>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" 
         :class="{ 'open': mobileMenuOpen }"
         x-cloak>
        <div class="mobile-nav-list">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}" 
                   class="mobile-nav-item {{ request()->routeIs($item['route']) ? 'active' : '' }}"
                   @click="mobileMenuOpen = false; document.body.style.overflow = 'auto'">
                    {{ $item['label'] }}
                </a>
            @endforeach

            <div style="margin-top: 3rem; border-top: 1px solid #eee; padding-top: 2rem;">
                <p style="font-size: 1rem; color: #666; margin-bottom: 1rem;">Let's Connect</p>
                <a href="tel:+917503123111" style="font-size: 1.5rem; font-weight: 700; color: #95BF19; text-decoration: none;">
                    +91 750 3123 111
                </a>
                <div style="display: flex; gap: 2rem; justify-content: center; margin-top: 2.5rem; font-size: 2rem;">
                    <a href="#" style="color: #333;"><i class="ion-social-facebook"></i></a>
                    <a href="#" style="color: #333;"><i class="ion-social-whatsapp"></i></a>
                    <a href="#" style="color: #333;"><i class="ion-social-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
