<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    @php
        $profileHighlights = [
            'More than two decades of experience across institutional, industrial and luxury residential projects',
            'Integrated project management approach for effective site coordination and timely delivery',
            'ISO-2015 (URS) certification reflecting structured quality management standards',
            'Focus on innovative construction methods and greener material choices to reduce carbon footprint',
        ];

        $profilePrinciples = [
            [
                'title' => 'Design Collaboration',
                'text' => 'We believe inspirational design emerges through a collaborative process that brings together the right talent for the client, the site and the project ambition.',
            ],
            [
                'title' => 'Quality & Delivery',
                'text' => 'Our design excellence and timely delivery have helped build a high-profile clientele and a strong base of repeat clients who continue to trust KDC Consultants.',
            ],
            [
                'title' => 'Innovation & Sustainability',
                'text' => 'We stay conversant with world-class construction methodologies and material innovations while keeping pace with green building concepts.',
            ],
        ];
    @endphp

    <style>
        .profile-hero-copy {
            max-width: 620px;
        }

        .profile-text {
            margin-bottom: 24px;
        }

        .profile-info-box {
            background: #f7f7f7;
            height: 100%;
            padding: 36px 30px;
        }

        .profile-info-box h3 {
            font-size: 24px;
            margin-bottom: 18px;
        }

        .profile-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .profile-list li {
            border-bottom: 1px solid #e6e6e6;
            padding: 14px 0 14px 22px;
            position: relative;
        }

        .profile-list li:last-child {
            border-bottom: 0;
        }

        .profile-list li:before {
            color: #cee002;
            content: "+";
            font-weight: 700;
            left: 0;
            position: absolute;
            top: 14px;
        }

        .profile-highlight {
            background: #1f2328;
            color: #fff;
            position: relative;
        }

        .profile-highlight:before {
            background: linear-gradient(135deg, rgba(206, 224, 2, 0.18), rgba(206, 224, 2, 0));
            content: "";
            inset: 0;
            position: absolute;
        }

        .profile-highlight .container {
            position: relative;
            z-index: 1;
        }

        .profile-stat {
            border-left: 2px solid rgba(206, 224, 2, 0.7);
            margin-bottom: 28px;
            padding-left: 18px;
        }

        .profile-stat-number {
            color: #cee002;
            display: block;
            font-size: 34px;
            font-weight: 600;
            line-height: 1;
            margin-bottom: 8px;
        }

        .profile-principle {
            background: rgba(255, 255, 255, 0.06);
            height: 100%;
            padding: 30px 24px;
        }

        .profile-principle h3 {
            color: #fff;
            font-size: 22px;
            margin-bottom: 14px;
        }

        .profile-highlight p {
            color: rgba(255, 255, 255, 0.82);
        }

        .profile-logo {
            height: 28px;
            margin-bottom: 18px;
        }

        @media (max-width: 991px) {
            .profile-info-box,
            .profile-principle {
                margin-top: 30px;
            }
        }
    </style>

    <main class="page-header-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="title-hr"></div>
                </div>
                <div class="col-md-8 col-lg-7">
                    <div class="profile-hero-copy">
                        <h1>Profile & Introduction</h1>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="content">
        <section class="section-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="section-info">
                            <div class="title-hr"></div>
                            <div class="info-title">Introduction</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('images/kdc-5.png') }}" alt="KDC Consultants" class="profile-logo">
                        <h2 class="section-title section-about-title">Professional ethics, design versatility and delivery focus</h2>
                        <p class="profile-text">KDC Consultants is a revolutionary emergence in the field of architectural assignments, formulated on the ethics of professionalism and driven by a young and dynamic team of professional acumen built over many years in the industry.</p>
                        <p class="profile-text">KDC Consultants was founded by its Principal Architect, Vijay Kachroo, who has more than two decades of rich experience in the field. Prior to incorporation of KDC Consultants, Vijay Kachroo was managing the company under the name of "Archivision".</p>
                        <p class="profile-text">We have about two decades of working experience in the institutional, industrial and luxury residential market. By honing our skills through exciting design, design excellence and timely delivery, we have developed a high-profile clientele whose continued support gives us the opportunity to work across diverse ranges and locations.</p>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <div class="dots-image">
                            <img alt="KDC Consultants profile" class="about-img img-responsive" src="{{ asset('building/19112.jpg') }}">
                            <div class="dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="dots-image">
                            <img alt="Principal Architect Vijay Kachroo" class="about-img img-responsive" src="{{ asset('images/kachroo.jpg') }}">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                        <strong class="section-subtitle">FOUNDATION & LEADERSHIP</strong>
                        <h2 class="section-title section-about-title">Built on experience, strengthened by repeat client trust</h2>
                        <p class="profile-text">Customer satisfaction with quality delivered is recognized by the fact that KDC Consultants continues to receive repeat orders from clients. That continuity is a direct result of disciplined planning, reliable execution and professional accountability.</p>
                        <p class="profile-text">We believe and understand inspirational design through a collaborative design process. We place strong emphasis on establishing a proficient design team that can draw the best talent to suit both client expectations and project needs.</p>
                        <p class="profile-text">Over time, we have also established lasting relationships with high-profile consultants who share the same pursuit of design excellence.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section bg-dots">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-info-box">
                            <span class="section-subtitle">QUALITY ASSURANCE</span>
                            <h3>ISO-2015 (URS) certified quality management</h3>
                            <p>KDC Consultants had the honour of obtaining ISO-2015 (URS) Certification, reflecting a highly compatible quality management standard for the organization. It sets out the requirements of a quality managed system and reinforces customer confidence that our services meet prescribed norms with adherence to time stipulations.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-info-box">
                            <span class="section-subtitle">CORE STRENGTHS</span>
                            <h3>What defines the KDC approach</h3>
                            <ul class="profile-list">
                                @foreach ($profileHighlights as $highlight)
                                    <li>{{ $highlight }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section profile-highlight">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <strong class="section-subtitle">OUR APPROACH</strong>
                        <h2 class="section-title section-about-title" style="color: #fff;">Integrated management with innovative and greener building thinking</h2>
                        <p>We adopt an integrated approach towards project management to ensure apposite coordination at project sites. Our objective is to create spaces that enrich the rituals of daily life while remaining practical, deliverable and technically sound.</p>
                        <p>We provide remarkable quality building measures by adopting innovative ideas and keeping ourselves conversant with emerging world-class construction methodology trends. We also believe in updated usage of construction materials while keeping pace with the green building concept to reduce carbon footprint.</p>
                        <div class="profile-stat">
                            <span class="profile-stat-number">20+</span>
                            <p>Years of cross-sector experience in institutional, industrial and residential assignments.</p>
                        </div>
                        <div class="profile-stat">
                            <span class="profile-stat-number">ISO</span>
                            <p>Quality-driven systems that reinforce service consistency and customer satisfaction.</p>
                        </div>
                        <div class="profile-stat">
                            <span class="profile-stat-number">Green</span>
                            <p>Material awareness and green building thinking aimed at reducing carbon footprint.</p>
                        </div>
                    </div>
                    <div class="col-md-7 col-md-offset-1">
                        <div class="row">
                            @foreach ($profilePrinciples as $principle)
                                <div class="col-md-4">
                                    <div class="profile-principle">
                                        <h3>{{ $principle['title'] }}</h3>
                                        <p>{{ $principle['text'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row" style="margin-top: 34px;">
                            <div class="col-md-12">
                                <img alt="KDC integrated design and project management" class="img-responsive item-shadow" src="{{ asset('building/banner4.jpg') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
