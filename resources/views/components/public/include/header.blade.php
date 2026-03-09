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
      <div class="menu-lang right-boxed">
        <a href="" class="active">Eng</a>
        <a href="">Fra</a>
        <a href="">Ger</a>
      </div>
      <ul class="menu-list right-boxed">
        <li class="active">
          <a href="index.html">Home</a>
          <ul>
            <li class="active"><a href="index.html">Classic</a></li>
            <li><a href="home-fullpage.html">Full page</a></li>
            <li><a href="../dark/index.html">Dark</a></li>
          </ul>
        </li>
        <li>
          <a href="works.html">Works</a>
          <ul>
            <li><a href="works-grid.html">Grid</a></li>
            <li><a href="works-masonry.html">Masonry</a></li>
            <li><a href="works-carousel.html">Carousel</a></li>
            <li><a href="project-detail.html">Project Detail</a></li>
          </ul>
        </li>
        <li>
          <a href="#">News</a>
          <ul>
            <li><a href="news-grid.html">Grid</a></li>
            <li><a href="news-listing.html">Listing</a></li>
            <li><a href="news-masonry.html">Masonry</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Post detail</a>
          <ul>
            <li><a href="post-image.html">Image</a></li>
            <li><a href="post-gallery.html">Gallery</a></li>
            <li><a href="post-video.html">Video</a></li>
            <li><a href="post-right-sidebar.html">Right Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Pages</a>
          <ul>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </li>
      </ul>
      <div class="menu-footer right-boxed">
        <div class="social-list">
          <a href="" class="icon ion-social-twitter"></a>
          <a href="" class="icon ion-social-facebook"></a>
          <a href="" class="icon ion-social-googleplus"></a>
          <a href="" class="icon ion-social-linkedin"></a>
          <a href="" class="icon ion-social-dribbble-outline"></a>
        </div>
        <div class="copy">� Bauhaus 2017. All Rights Reseverd<br> Design by LoganCee</div>
      </div>
    </div>

    <header class="navbar boxed js-navbar">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="brand" href="#">
        <img alt="" src="{{ asset('images/KDC-Logo.png') }}" style="height: 50px; margin-bottom: 10px;">
        <!-- <div class="brand-info">
          <div class="brand-name">bauhaus</div>
          <div class="brand-text">architecture</div>
        </div> -->
      </a>

      <div class="social-list hidden-xs">
        <a href="" class="icon ion-social-twitter"></a>
        <a href="" class="icon ion-social-facebook"></a>
        <a href="" class="icon ion-social-googleplus"></a>
        <a href="" class="icon ion-social-linkedin"></a>
        <a href="" class="icon ion-social-dribbble-outline"></a>
      </div>

      <div class="navbar-spacer hidden-sm hidden-xs"></div>

      <address class="navbar-address hidden-sm hidden-xs">call us: <span class="text-dark">(+080) 9684 32 45 789</span></address>
    </header>
</div>