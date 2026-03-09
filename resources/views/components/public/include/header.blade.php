<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <!-- Navbar -->
    <div class="menu">
        <span class="close-menu icon-cross2 right-boxed"></span>

        <ul class="menu-list right-boxed">
            <li class="active">
                <a href="/">Home</a>
             
            </li>
            <li>
                <a href="works.html">Projects</a>
                <ul>
                    <li><a href="works-grid.html">Grid</a></li>
                    <li><a href="works-masonry.html">Masonry</a></li>
                    <li><a href="works-carousel.html">Carousel</a></li>
                    <li><a href="project-detail.html">Project Detail</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Profile</a>

            </li>
            <li>
                <a href="#">Service</a>
                <ul>
                    <li><a href="post-image.html">Image</a></li>
                    <li><a href="post-gallery.html">Gallery</a></li>
                    <li><a href="post-video.html">Video</a></li>
                    <li><a href="post-right-sidebar.html">Right Sidebar</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Gallery</a>
            </li>
            <li>
                <a href="#">Certifications</a>
            </li>
            <li>
                <a href="#">Clients</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
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

        <img alt="" src="{{ asset('images/KDC-Logo-crop.png') }}" style="height: auto; width: 170px;">


        <div class="social-list hidden-xs">
            <a href="" class="icon ion-social-facebook"></a>
            <a href="" class="icon ion-social-whatsapp"></a>
            <a href="" class="icon ion-social-linkedin"></a>
        </div>

        <div class="navbar-spacer hidden-sm hidden-xs"></div>

        <address class="navbar-address hidden-sm hidden-xs">call us: <span class="text-dark">+917503123111</span></address>
    </header>
</div>