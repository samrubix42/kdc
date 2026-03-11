<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    @php
        $clientTestimonials = [
            [
                'name' => 'Rohit Mehta',
                'company' => 'Director, Mehta Infrastructure Pvt. Ltd.',
                'text' => 'KDC delivered exactly what we envisioned for our corporate office in Gurgaon. Planning, execution and detail control were handled with consistency from concept to handover.',
            ],
            [
                'name' => 'Neha Kapoor',
                'company' => 'Founder, Kapoor Lifestyle Homes',
                'text' => 'Our luxury residence in South Delhi was designed with elegance and practicality. The team stayed professional, responsive and transparent throughout the project.',
            ],
            [
                'name' => 'Sanjay Verma',
                'company' => 'Operations Head, Verma Auto Components',
                'text' => 'The industrial facility designed by KDC improved workflow efficiency and safety standards significantly. Their technical understanding and site coordination were strong.',
            ],
            [
                'name' => 'Priya Nair',
                'company' => 'Trustee, Nair Education Foundation',
                'text' => 'KDC handled our institutional campus project with commitment and creativity. Timelines were respected and the final outcome met both function and identity goals.',
            ],
        ];

        $clientBenefits = [
            'Single-point coordination across architecture, engineering and execution interfaces',
            'Faster resolution of site issues and design clarifications',
            'Better control over timelines, budgets and construction quality',
            'Long-term professional relationships built on accountability and delivery',
        ];

        $partnerImages = collect(\Illuminate\Support\Facades\File::files(public_path('images/partner')))
            ->sortBy(fn ($file) => $file->getFilename(), SORT_NATURAL | SORT_FLAG_CASE)
            ->values();
    @endphp

    <style>
        .client-hero-copy {
            max-width: 620px;
        }

        .client-benefit-box {
            background: #f7f7f7;
            height: 100%;
            padding: 34px 30px;
        }

        .client-benefit-box h3 {
            font-size: 24px;
            margin-bottom: 18px;
        }

        .client-benefit-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .client-benefit-list li {
            border-bottom: 1px solid #e6e6e6;
            padding: 14px 0 14px 22px;
            position: relative;
        }

        .client-benefit-list li:last-child {
            border-bottom: 0;
        }

        .client-benefit-list li:before {
            color: #cee002;
            content: "+";
            font-weight: 700;
            left: 0;
            position: absolute;
            top: 14px;
        }

        .client-highlight {
            background: #1f2328;
            color: #fff;
            position: relative;
        }

        .client-highlight:before {
            background: linear-gradient(135deg, rgba(206, 224, 2, 0.18), rgba(206, 224, 2, 0));
            content: "";
            inset: 0;
            position: absolute;
        }

        .client-highlight .container {
            position: relative;
            z-index: 1;
        }

        .client-metric {
            border-left: 2px solid rgba(206, 224, 2, 0.7);
            margin-bottom: 28px;
            padding-left: 18px;
        }

        .client-metric-number {
            color: #cee002;
            display: block;
            font-size: 34px;
            font-weight: 600;
            line-height: 1;
            margin-bottom: 8px;
        }

        .client-highlight p {
            color: rgba(255, 255, 255, 0.82);
        }

        .partner-grid {
            margin-top: 5rem;
        }

        .partner-grid .col-partner {
            text-align: center;
        }

        .partner-grid .col-partner img {
            filter: grayscale(100%);
            opacity: 0.75;
            transition: all 0.4s ease;
        }

        .partner-grid .col-partner:hover img {
            filter: grayscale(0);
            opacity: 1;
        }

        @media (max-width: 991px) {
            .client-benefit-box {
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
                    <div class="client-hero-copy">
                        <h1>Clients, Collaborations & Trusted Partnerships</h1>
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
                            <div class="info-title">Who We Work With</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <strong class="section-subtitle">ENDURING CLIENT RELATIONSHIPS</strong>
                        <h2 class="section-title section-about-title">A portfolio built on repeat trust and delivery discipline</h2>
                        <p>KDC has completed assignments for reputed business houses, institutions and private residences in varying consulting capacities. Each engagement is approached with the same focus on coordination, technical clarity and responsible execution.</p>
                        <p>Our client relationships grow from the ability to manage complex project interfaces under one roof, reducing friction between design intent, site realities and budget priorities.</p>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <div class="dots-image">
                            <img alt="KDC clients and partnerships" class="about-img img-responsive" src="{{ asset('building/banner3.jpg') }}">
                            <div class="dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-info">
                            <div class="title-hr"></div>
                            <div class="info-title">Client Advantage</div>
                        </div>
                        <div class="text-display-1">
                            <p>Clients choose KDC for more than design capability. They rely on structured coordination, practical project leadership and the ability to convert planning into deliverable, buildable outcomes.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="client-benefit-box">
                            <h3>Why long-term clients continue to work with KDC</h3>
                            <ul class="client-benefit-list">
                                @foreach ($clientBenefits as $benefit)
                                    <li>{{ $benefit }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-clients section bg-dots">
            <div class="container">
                <h2 class="section-title">Client Experience</h2>
                <div class="client-carousel owl-carousel">
                    @foreach ($clientTestimonials as $testimonial)
                        <div class="client-carousel-item">
                            <div class="client-box">
                                <img alt="" class="image-quote" src="{{ asset('images/image-icons/icon-quote.png') }}">
                                <div class="client-title">
                                    <span class="client-name">{{ $testimonial['name'] }}</span>
                                    <span class="client-company">/ {{ $testimonial['company'] }}</span>
                                </div>
                                <p class="client-description">{{ $testimonial['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section client-highlight">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <strong class="section-subtitle">PARTNER NETWORK</strong>
                        <h2 class="section-title section-about-title" style="color: #fff;">Reliable associations across consultants, vendors and project stakeholders</h2>
                        <p>KDC's project delivery model depends on disciplined coordination with partner organizations, technical agencies and supply-side stakeholders. These relationships help maintain continuity from documentation through execution.</p>
                        <div class="client-metric">
                            <span class="client-metric-number">{{ $partnerImages->count() }}</span>
                            <p>Partner logos currently available in the project asset library.</p>
                        </div>
                        <div class="client-metric">
                            <span class="client-metric-number">360</span>
                            <p>Integrated coordination across architecture, engineering, services and construction teams.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                        <img alt="KDC partner network" class="img-responsive item-shadow" src="{{ asset('building/industrial-park-factory-building-warehouse_1417-1936.jpg') }}">
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="section-info">
                            <div class="title-hr"></div>
                            <div class="info-title">Partner Logos</div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h2 class="section-title">Associated brands and organizations</h2>
                    </div>
                </div>
                <div class="row row-partners partner-grid">
                    @foreach ($partnerImages as $partnerImage)
                        <div class="col-md-3 col-sm-4 col-xs-6 col-partner">
                            <img alt="{{ pathinfo($partnerImage->getFilename(), PATHINFO_FILENAME) }}" src="{{ asset('images/partner/' . $partnerImage->getFilename()) }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
