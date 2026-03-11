<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
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

    <!-- Navbar -->
    <div class="menu">
        <span class="close-menu icon-cross2 right-boxed"></span>

        <ul class="menu-list right-boxed">
            @foreach ($navItems as $navItem)
                <li class="{{ request()->routeIs($navItem['route']) ? 'active' : '' }}">
                    <a href="{{ route($navItem['route']) }}">{{ $navItem['label'] }}</a>
                </li>
            @endforeach
        </ul>
        <div class="menu-footer right-boxed">
            <div class="social-list">
                <a href="" class="icon ion-social-facebook"></a>
                <a href="" class="icon ion-social-whatsapp"></a>
                <a href="" class="icon ion-social-linkedin"></a>
            </div>
            <div class="copy"><img src="{{ asset('images/kdc-5.png') }}" style="height: 20px;" alt="">. All Rights Reseverd <br> Design by Techonika</div>
        </div>
    </div>

    <header class="navbar boxed js-navbar">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a href="{{ route('home') }}">
            <img alt="" src="{{ asset('images/KDC-Logo-crop.png') }}" style="height: auto; width: 170px;">
        </a>


        <div class="social-list hidden-xs">
            <a href="" class="icon ion-social-facebook"></a>
            <a href="" class="icon ion-social-whatsapp"></a>
            <a href="" class="icon ion-social-linkedin"></a>
        </div>

        <div class="navbar-spacer hidden-sm hidden-xs"></div>

        <address class="navbar-address hidden-sm hidden-xs">call us: <span class="text-dark">+917503123111</span></address>
    </header>
</div>
