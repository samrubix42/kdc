<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons -->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon.ico') }}">

<title>Bauhaus - Architecture & Interior HTML Template</title> 

<!-- Styles -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Poppins:300,400,500,600,700" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">


@livewireStyles
</head>
<body>
<div class="animsition">
  <div class="wrapper boxed">

    <!-- Content CLick Capture-->

    <div class="click-capture"></div>

    <!-- Sidebar Menu-->

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

   <livewire:public.include.header />
    
    <!-- Jumbotron -->
    
   
    {{ $slot ?? '' }}

    <livewire:public.include.footer />
  </div>
</div>

<!-- jQuery -->

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/animsition.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/smoothscroll.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/sly.min.js') }}"></script>


<!-- Slider revolution -->
<script src="{{ asset('js/rev-slider/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('js/rev-slider/jquery.themepunch.revolution.min.js') }}"></script>

<!-- Slider revolution 5x Extensions   -->
<script src="{{ asset('js/rev-slider/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('js/rev-slider/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('js/rev-slider/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('js/rev-slider/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('js/rev-slider/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('js/rev-slider/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('js/rev-slider/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('js/rev-slider/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('js/rev-slider/revolution.extension.video.min.js') }}"></script>


<!-- Scripts -->
<script src="{{ asset('js/scripts.js') }}"></script> 
<script src="{{ asset('js/rev-slider-init.js') }}"></script>

@livewireScripts
</body>
</html>