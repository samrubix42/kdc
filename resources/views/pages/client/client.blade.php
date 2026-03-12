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
        .client-page {
            overflow: hidden;
        }

        .client-section {
            padding: 46px 0;
        }

        .client-hero-copy {
            max-width: 680px;
        }

        .client-grid > [class*='col-'] {
            margin-bottom: 30px;
        }

        .client-copy {
            display: flex;
            flex-direction: column;
            gap: 18px;
            justify-content: center;
        }

        .client-lead {
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 0;
        }

        .client-panel {
            background: #fff;
            border: 1px solid #eaedf0;
            box-shadow: 0 18px 48px rgba(21, 32, 43, 0.08);
            height: 100%;
            padding: 32px 28px;
        }

        .client-panel-muted {
            background: #f7f7f7;
            border: 0;
            box-shadow: none;
        }

        .client-media,
        .client-media-grid {
            height: 100%;
        }

        .client-media img,
        .client-media-grid img,
        .client-dark-image img {
            display: block;
            object-fit: cover;
            width: 100%;
        }

        .client-media img {
            min-height: 340px;
        }

        .client-benefit-list {
            list-style: none;
            margin: 24px 0 0;
            padding: 0;
        }

        .client-benefit-list li {
            border-bottom: 1px solid #e3e6e8;
            padding: 14px 0 14px 22px;
            position: relative;
        }

        .client-benefit-list li:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .client-benefit-list li:before {
            color: #cee002;
            content: "+";
            font-weight: 700;
            left: 0;
            position: absolute;
            top: 14px;
        }

        .client-testimonial-grid {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .client-quote-card {
            background: #fff;
            border: 1px solid #eaedf0;
            box-shadow: 0 18px 48px rgba(21, 32, 43, 0.06);
            height: 100%;
            padding: 32px 28px;
            position: relative;
        }

        .client-quote-icon {
            height: 24px;
            margin-bottom: 18px;
            width: auto;
        }

        .client-name {
            color: #000;
            display: block;
            font-size: 20px;
            font-weight: 600;
            line-height: 1.2;
            margin-bottom: 4px;
        }

        .client-company {
            color: #888;
            display: block;
            font-size: 14px;
            margin-bottom: 16px;
        }

        .client-dark-section {
            background: #1f2328;
            color: #fff;
            padding: 56px 0;
            position: relative;
        }

        .client-dark-section:before {
            background: linear-gradient(135deg, rgba(206, 224, 2, 0.18), rgba(206, 224, 2, 0));
            content: "";
            inset: 0;
            position: absolute;
        }

        .client-dark-section .container {
            position: relative;
            z-index: 1;
        }

        .client-dark-copy {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            height: 100%;
            padding: 30px 24px;
        }

        .client-dark-copy .section-title {
            color: #fff;
            margin-bottom: 18px;
        }

        .client-dark-copy p {
            color: rgba(255, 255, 255, 0.82);
            margin-bottom: 18px;
        }

        .client-dark-copy p:last-child {
            margin-bottom: 0;
        }

        .client-metric {
            border-left: 2px solid rgba(206, 224, 2, 0.8);
            margin-top: 22px;
            padding-left: 16px;
        }

        .client-metric-number {
            color: #cee002;
            display: block;
            font-size: 30px;
            font-weight: 600;
            line-height: 1;
            margin-bottom: 8px;
        }

        .client-dark-image img {
            min-height: 300px;
        }

        .partner-grid {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            margin-top: 16px;
        }

        .partner-card {
            align-items: center;
            background: #fff;
            border: 1px solid #eaedf0;
            display: flex;
            justify-content: center;
            min-height: 140px;
            padding: 24px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .partner-card img {
            filter: grayscale(100%);
            max-height: 72px;
            max-width: 100%;
            opacity: 0.75;
            transition: filter 0.3s ease, opacity 0.3s ease;
        }

        .partner-card:hover {
            box-shadow: 0 16px 36px rgba(21, 32, 43, 0.08);
            transform: translateY(-2px);
        }

        .partner-card:hover img {
            filter: grayscale(0);
            opacity: 1;
        }

        @media (max-width: 1199px) {
            .partner-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 991px) {
            .client-section {
                padding: 38px 0;
            }

            .client-panel,
            .client-quote-card,
            .client-dark-copy {
                padding: 28px 24px;
            }

            .client-media img,
            .client-dark-image img {
                min-height: auto;
            }

            .client-testimonial-grid {
                grid-template-columns: 1fr;
            }

            .partner-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 767px) {
            .client-section {
                padding: 30px 0;
            }

            .client-lead {
                font-size: 16px;
            }

            .client-panel,
            .client-quote-card,
            .client-dark-copy {
                padding: 24px 20px;
            }

            .partner-grid {
                grid-template-columns: 1fr;
            }

            .partner-card {
                min-height: 120px;
            }

            .client-name {
                font-size: 18px;
            }

            .client-metric-number {
                font-size: 26px;
            }
        }
    </style>

    <div class="client-page">
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
            <section class="section-about client-section">
                <div class="container">
                    <div class="row client-grid">
                        <div class="col-md-6">
                            <div class="client-copy">
                                <div class="section-info">
                                    <div class="title-hr"></div>
                                    <div class="info-title">Who We Work With</div>
                                </div>
                                <div>
                                    <strong class="section-subtitle">ENDURING CLIENT RELATIONSHIPS</strong>
                                    <h2 class="section-title section-about-title">A portfolio built on repeat trust and delivery discipline</h2>
                                    <p class="client-lead">KDC has completed assignments for reputed business houses, institutions and private residences in varying consulting capacities. Each engagement is approached with the same focus on coordination, technical clarity and responsible execution.</p>
                                    <p>Our client relationships grow from the ability to manage complex project interfaces under one roof, reducing friction between design intent, site realities and budget priorities.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="client-media dots-image">
                                <img alt="KDC clients and partnerships" class="about-img img-responsive" src="{{ asset('building/banner3.jpg') }}">
                                <div class="dots"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="client-section">
                <div class="container">
                    <div class="row client-grid">
                        <div class="col-md-6">
                            <div class="client-panel">
                                <div class="section-info">
                                    <div class="title-hr"></div>
                                    <div class="info-title">Client Advantage</div>
                                </div>
                                <h3>Why long-term clients continue to work with KDC</h3>
                                <p>Clients choose KDC for more than design capability. They rely on structured coordination, practical project leadership and the ability to convert planning into deliverable, buildable outcomes.</p>
                                <ul class="client-benefit-list">
                                    @foreach ($clientBenefits as $benefit)
                                        <li>{{ $benefit }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="client-panel client-panel-muted">
                                <strong class="section-subtitle">RELATIONSHIP VALUE</strong>
                                <h3>Partnerships built on accountability</h3>
                                <p>KDC's client relationships are shaped by professional accountability, faster coordination and consistency in delivery across project stages.</p>
                                <p>That repeat trust is what allows the studio to work across diverse sectors, project scales and locations while maintaining a clear design and execution process.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="client-section bg-dots">
                <div class="container">
                    <div class="row client-grid">
                        <div class="col-md-3">
                            <div class="section-info">
                                <div class="title-hr"></div>
                                <div class="info-title">Client Experience</div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="client-testimonial-grid">
                                @foreach ($clientTestimonials as $testimonial)
                                    <div class="client-quote-card">
                                        <img alt="" class="client-quote-icon" src="{{ asset('images/image-icons/icon-quote.png') }}">
                                        <span class="client-name">{{ $testimonial['name'] }}</span>
                                        <span class="client-company">{{ $testimonial['company'] }}</span>
                                        <p>{{ $testimonial['text'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="client-dark-section">
                <div class="container">
                    <div class="row client-grid">
                        <div class="col-md-5">
                            <div class="client-dark-copy">
                                <strong class="section-subtitle">PARTNER NETWORK</strong>
                                <h2 class="section-title section-about-title">Reliable associations across consultants, vendors and project stakeholders</h2>
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
                        </div>
                        <div class="col-md-7">
                            <div class="client-dark-image">
                                <img alt="KDC partner network" class="img-responsive item-shadow" src="{{ asset('building/industrial-park-factory-building-warehouse_1417-1936.jpg') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="client-section">
                <div class="container">
                    <div class="row client-grid">
                        <div class="col-md-3">
                            <div class="section-info">
                                <div class="title-hr"></div>
                                <div class="info-title">Partner Logos</div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h2 class="section-title">Associated brands and organizations</h2>
                            <div class="partner-grid">
                                @foreach ($partnerImages as $partnerImage)
                                    <div class="partner-card">
                                        <img alt="{{ pathinfo($partnerImage->getFilename(), PATHINFO_FILENAME) }}" src="{{ asset('images/partner/' . $partnerImage->getFilename()) }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
