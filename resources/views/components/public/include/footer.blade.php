<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
   @php
      $footerColumnOne = [
         ['label' => 'HOME', 'route' => 'home'],
         ['label' => 'PROJECTS', 'route' => 'project'],
         ['label' => 'PROFILE', 'route' => 'profile'],
         ['label' => 'SERVICES', 'route' => 'service'],
      ];

      $footerColumnTwo = [
         ['label' => 'CLIENTS', 'route' => 'client'],
         ['label' => 'BLOG', 'route' => 'blog'],
         ['label' => 'CONTACT', 'route' => 'contact'],
      ];
   @endphp

   <!-- Footer -->

    <footer id="footer" class="footer section"> 
      <div class="footer-flex">
        <div class="flex-item">
          <a class="brand pull-left" href="{{ route('home') }}">
            <img alt="" src="{{ asset('images/KDC-Logo-crop.png') }}">
            
          </a>
        </div>
        <div class="flex-item">
          <div class="inline-block"><img src="{{ asset('images/kdc-5.png') }}" style="height:20px" alt=""><br>All Rights Resevered</div>
        </div>
        <div class="flex-item">
          <ul>
            @foreach ($footerColumnOne as $item)
              <li><a href="{{ route($item['route']) }}">{{ $item['label'] }}</a></li>
            @endforeach
          </ul> 
        </div>
        <div class="flex-item">
          <ul>
            @foreach ($footerColumnTwo as $item)
              <li><a href="{{ route($item['route']) }}">{{ $item['label'] }}</a></li>
            @endforeach
          </ul> 
        </div>
      
        <div class="flex-item">
          <div class="social-list">
            <a href="" class="icon ion-social-facebook"></a>
            <a href="" class="icon ion-social-whatsapp"></a>
            <a href="" class="icon ion-social-linkedin"></a>
          </div>
        </div>
      </div>
    </footer>
</div>
