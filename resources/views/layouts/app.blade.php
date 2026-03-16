<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="@yield('meta_description', 'KDC Consultants offers architecture, interior design, project planning, and execution services across residential, commercial, and institutional projects.')">
<meta name="keywords" content="@yield('meta_keywords', 'KDC Consultants, architecture, interior design, project management, construction planning')">
<meta name="author" content="">

<!-- Favicons -->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon.ico') }}">

<title>@yield('meta_title', 'KDC Consultants | Architecture, Interiors & Project Management')</title> 

<!-- Styles -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Poppins:300,400,500,600,700" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">


@livewireStyles
</head>
<body>
<div class="animsition">
  <div class="wrapper boxed">

    <!-- Content CLick Capture-->

   

    <!-- Sidebar Menu-->

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
