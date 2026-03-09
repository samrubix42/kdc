<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
   <!-- Footer -->

    <footer id="footer" class="footer section"> 
      <div class="footer-flex">
        <div class="flex-item">
          <a class="brand pull-left" href="#">
            <img alt="" src="{{ asset('images/KDC-Logo-crop.png') }}">
            
          </a>
        </div>
        <div class="flex-item">
          <div class="inline-block"><img src="{{ asset('images/kdc-5.png') }}" style="height:20px" alt=""><br>All Rights Resevered</div>
        </div>
        <div class="flex-item">
          <ul>
            <li><a href="#home">HOME</a></li>
            <li><a href="#projects">PROJECTS</a></li>
            <li><a href="#profile">PROFILE</a></li>
            <li><a href="#our-team">OUR TEAM</a></li>
            <li><a href="#services">SERVICES</a></li>
          </ul> 
        </div>
        <div class="flex-item">
          <ul>
            <li><a href="#gallery">GALLERY</a></li>
            <li><a href="#certifications">CERTIFICATIONS</a></li>
            <li><a href="#clients">CLIENTS</a></li>
            <li><a href="#footer">CONTACT</a></li>
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
