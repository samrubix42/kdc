<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<footer class="modern-footer">
    <div class="footer-container">
        <!-- Brand & About -->
        <div class="footer-column brand-column">
            <a href="{{ route('home') }}" class="footer-logo">
                <img src="{{ asset('images/KDC-Logo-crop.png') }}" alt="KDC Consultants Logo">
            </a>
            <p class="footer-description">
                Elevating architectural excellence for over two decades. Specialized in corporate buildings, industrial facilities, and luxury residential projects.
            </p>
            <div class="footer-social">
                <a href="#" class="social-icon" aria-label="Facebook"><i class="ion-social-facebook"></i></a>
                <a href="#" class="social-icon" aria-label="WhatsApp"><i class="ion-social-whatsapp"></i></a>
                <a href="#" class="social-icon" aria-label="LinkedIn"><i class="ion-social-linkedin"></i></a>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-column">
            <h3 class="footer-heading">Quick Links</h3>
            <ul class="footer-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('project') }}">Projects</a></li>
                <li><a href="{{ route('service') }}">Services</a></li>
                <li><a href="{{ route('our-team') }}">Our Team</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>

        <!-- Other Links -->
        <div class="footer-column">
            <h3 class="footer-heading">Company</h3>
            <ul class="footer-links">
                <li><a href="{{ route('profile') }}">Profile</a></li>
                <li><a href="{{ route('client') }}">Clients</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div class="footer-column contact-column">
            <h3 class="footer-heading">Contact Us</h3>
            <div class="contact-item">
                <i class="ion-ios-location-outline"></i>
                <span>Corporate Office, New Delhi, India</span>
            </div>
            <div class="contact-item">
                <i class="ion-ios-telephone-outline"></i>
                <a href="tel:+917503123111">+91 750 3123 111</a>
            </div>
            <div class="contact-item">
                <i class="ion-ios-email-outline"></i>
                <a href="mailto:info@kdcconsultants.in">info@kdcconsultants.in</a>
            </div>
          
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
        <div class="bottom-container">
            <p>&copy; {{ date('Y') }} KDC Consultants Design Consultants (P) Ltd. All Rights Reserved.</p>
            <p>Designed with excellence by <a href="https://techonika.com" target="_blank">Techonika</a></p>
        </div>
    </div>

    <style>
        .modern-footer {
            background: #ffffff;
            color: #333;
            padding: 80px 0 0;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .modern-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 90% 10%, rgba(206, 224, 2, 0.08) 0%, transparent 40%);
            pointer-events: none;
        }

        .footer-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 40px 60px;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 50px;
        }

        .footer-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .footer-logo img {
            height: auto;
            max-width: 200px;
            /* Filter removed for light theme */
        }

        .footer-description {
            line-height: 1.8;
            color: #666;
            font-size: 0.95rem;
        }

        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #333;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-size: 1.2rem;
            border: 1px solid #eee;
        }

        .social-icon:hover {
            background: #cee002;
            color: #000;
            transform: translateY(-5px);
            border-color: #cee002;
        }

        .footer-heading {
            color: #1a1a1a;
            font-size: 1.25rem;
            font-weight: 700;
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 12px;
        }

        .footer-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: #cee002;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 15px;
        }

        .footer-links a {
            color: #555;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            display: inline-block;
        }

        .footer-links a:hover {
            color: #cee002;
            transform: translateX(8px);
        }

        .contact-item {
            display: flex;
            align-items: center; /* Better vertical alignment */
            margin-bottom: 20px;
            color: #555;
            font-size: 0.95rem;
        }

        .contact-item i {
            color: #cee002;
            font-size: 1.4rem;
            min-width: 35px; /* Ensures all text aligns completely straight */
            text-align: left;
            margin-top: 0;
            display: flex;
            align-items: center;
        }

        .contact-item a, .contact-item span {
            color: #555;
            text-decoration: none;
            transition: color 0.3s;
            line-height: 1.5;
        }

        .contact-item a:hover {
            color: #cee002;
        }

        .cta-newsletter {
            margin-top: 30px;
            padding: 25px;
            background: #f8fcf0;
            border-radius: 12px;
            border: 1px solid #eef5d7;
            border-left: 4px solid #cee002;
        }

        .mini-heading {
            font-size: 0.95rem;
            margin-bottom: 15px;
            color: #1a1a1a;
            font-weight: 600;
        }

        .footer-cta {
            background: #cee002;
            color: #000;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(206, 224, 2, 0.2);
        }

        .footer-cta:hover {
            background: #000;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }

        .footer-bottom {
            background: #f9f9f9;
            padding: 25px 0;
            border-top: 1px solid #eee;
            margin-top: 40px;
        }

        .bottom-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #777;
        }

        .bottom-container a {
            color: #1a1a1a;
            text-decoration: none;
            font-weight: 600;
        }

        .bottom-container a:hover {
            color: #cee002;
        }

        @media (max-width: 1024px) {
            .footer-container {
                grid-template-columns: 1fr 1fr;
                gap: 40px;
            }
        }

        @media (max-width: 768px) {
            .footer-container {
                grid-template-columns: 1fr;
                padding: 0 25px 40px;
            }
            .bottom-container {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
        }
    </style>
</footer>
