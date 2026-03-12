<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    @php
        $serviceStages = [
            [
                'label' => 'Stage I',
                'title' => 'Concept, planning and complete project documentation',
                'description' => 'Conceptualizing, planning and final project documentation, tenders and working drawings that establish a clear technical and commercial foundation before execution begins.',
            ],
            [
                'label' => 'Stage II',
                'title' => 'Design management and interdisciplinary coordination',
                'description' => 'Design management and coordination of allied services for realization of the project, supported by process documentation and disciplined decision tracking.',
            ],
            [
                'label' => 'Stage III',
                'title' => 'Project management with owner-side control',
                'description' => 'Complete supervision, monitoring and control of the project on behalf of the owner with focus on time, quality, cost and site coordination.',
            ],
        ];

        $stageOneServices = [
            'Site investigation',
            'Master planning',
            'Preliminary concepts and design',
            'Architectural planning',
            'Structural planning',
            'Water supply, treatment and distribution systems',
            'Power generation, transmission and distribution',
            'Lighting systems',
            'Sanitary works and sewage disposal system',
            'Heating, ventilation, air-conditioning and refrigeration',
        ];

        $stageTwoServices = [
            'Cold storage',
            'Steam generation and distribution system',
            'Hot water generation and distribution system',
            'Kitchen engineering and installation',
            'Laundry engineering and installation',
            'Elevators, escalators and hoists',
            'Telephone and communication system',
            'Music, radio and public address system',
            'Acoustics',
            'Television system',
            'Materials handling system',
            'Fire alarm and protection system',
            'Facilities planning',
            'Garbage disposal',
            'Interior designs',
            'Selection of materials, fittings and fixtures',
            'Graphics, logos and publicity materials',
            'Landscaping and horticulture',
        ];

        $stageTwoDeliverables = [
            'Preparation of designs, drawings, specifications and bid documents',
            'Comparative analysis of bids and technical evaluation',
            'Preparation of cost estimates and project time schedules',
            'Construction management and coordination at site',
            'Administration of contracts and agency coordination',
            'Time schedule monitoring, inspection and payment certification',
        ];

        $serviceBenefits = [
            'Single-point responsibility across planning, design management and site coordination',
            'Reduced implementation delays through structured interdisciplinary alignment',
            'Stronger cost control through early documentation, bid review and schedule discipline',
            'Owner-side monitoring that protects quality, timelines and commercial intent',
        ];

        $managementPillars = [
            [
                'title' => 'Quality Management',
                'text' => 'Quality planning, quality assurance and quality control ensure every stage of the project conforms to the intended specifications.',
            ],
            [
                'title' => 'Time Management',
                'text' => 'Activity definition, sequencing, duration estimating, schedule development and schedule control keep delivery aligned with approved milestones.',
            ],
            [
                'title' => 'Cost Management',
                'text' => 'Resource planning, cost estimating, cost budgeting and budget control support viable delivery without cost overruns.',
            ],
        ];
    @endphp

    <style>
        .service-page {
            overflow: hidden;
        }

        .service-section {
            padding: 46px 0;
        }

        .service-hero-copy {
            max-width: 700px;
        }

        .service-grid > [class*='col-'] {
            margin-bottom: 30px;
        }

        .service-copy {
            display: flex;
            flex-direction: column;
            gap: 18px;
            justify-content: center;
        }

        .service-lead {
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 0;
        }

        .service-panel {
            background: #fff;
            border: 1px solid #eaedf0;
            box-shadow: 0 18px 48px rgba(21, 32, 43, 0.08);
            height: 100%;
            padding: 32px 28px;
        }

        .service-panel-muted {
            background: #f7f7f7;
            border: 0;
            box-shadow: none;
        }

        .service-stage-card {
            padding-top: 64px;
            position: relative;
        }

        .service-stage-badge {
            background: #95bf19;
            color: #000;
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            left: 28px;
            letter-spacing: 0.12em;
            padding: 10px 14px;
            position: absolute;
            text-transform: uppercase;
            top: -14px;
        }

        .service-stage-card h3,
        .service-panel h3,
        .service-pillar h3 {
            font-size: 25px;
            line-height: 1.3;
            margin: 0 0 14px;
        }

        .service-media,
        .service-media-stack {
            height: 100%;
        }

        .service-media img,
        .service-media-stack img,
        .service-dark-image img {
            display: block;
            object-fit: cover;
            width: 100%;
        }

        .service-media img {
            min-height: 340px;
        }

        .service-media-stack {
            display: grid;
            gap: 20px;
            grid-template-columns: 1fr;
        }

        .service-media-stack img {
            min-height: 220px;
        }

        .service-list,
        .service-benefit-list {
            list-style: none;
            margin: 24px 0 0;
            padding: 0;
        }

        .service-list li,
        .service-benefit-list li {
            border-bottom: 1px solid #e3e6e8;
            padding: 12px 0 12px 22px;
            position: relative;
        }

        .service-list li:last-child,
        .service-benefit-list li:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .service-list li:before,
        .service-benefit-list li:before {
            color: #cee002;
            content: "+";
            font-weight: 700;
            left: 0;
            position: absolute;
            top: 12px;
        }

        .service-pill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 24px;
        }

        .service-pill {
            background: #fff;
            border: 1px solid #e3e6e8;
            border-radius: 999px;
            display: inline-flex;
            padding: 12px 18px;
        }

        .service-dark-section {
            background: #1f2328;
            color: #fff;
            padding: 56px 0;
            position: relative;
        }

        .service-dark-section:before {
            background: linear-gradient(135deg, rgba(206, 224, 2, 0.18), rgba(206, 224, 2, 0));
            content: "";
            inset: 0;
            position: absolute;
        }

        .service-dark-section .container {
            position: relative;
            z-index: 1;
        }

        .service-dark-copy {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            height: 100%;
            padding: 30px 24px;
        }

        .service-dark-copy .section-title {
            color: #fff;
            margin-bottom: 18px;
        }

        .service-dark-copy p,
        .service-pillar p {
            color: rgba(255, 255, 255, 0.82);
        }

        .service-dark-copy p {
            margin-bottom: 18px;
        }

        .service-dark-copy p:last-child {
            margin-bottom: 0;
        }

        .service-stat {
            border-left: 2px solid rgba(206, 224, 2, 0.8);
            margin-top: 22px;
            padding-left: 16px;
        }

        .service-stat-number {
            color: #cee002;
            display: block;
            font-size: 30px;
            font-weight: 600;
            line-height: 1;
            margin-bottom: 8px;
        }

        .service-pillars {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            margin-bottom: 24px;
        }

        .service-pillar {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.08);
            height: 100%;
            padding: 24px 20px;
        }

        .service-dark-image img {
            min-height: 270px;
        }

        .service-cta {
            background: #f7f7f7;
        }

        .service-cta-box {
            align-items: center;
            display: flex;
            gap: 20px;
            justify-content: space-between;
        }

        @media (max-width: 1199px) {
            .service-pillars {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 991px) {
            .service-section {
                padding: 38px 0;
            }

            .service-panel,
            .service-dark-copy {
                padding: 28px 24px;
            }

            .service-media img,
            .service-media-stack img,
            .service-dark-image img {
                min-height: auto;
            }

            .service-cta-box {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 767px) {
            .service-section {
                padding: 30px 0;
            }

            .service-lead {
                font-size: 16px;
            }

            .service-panel,
            .service-dark-copy {
                padding: 24px 20px;
            }

            .service-stage-card {
                padding-top: 58px;
            }

            .service-stage-badge {
                left: 20px;
            }

            .service-stage-card h3,
            .service-panel h3,
            .service-pillar h3 {
                font-size: 22px;
            }

            .service-pillars {
                grid-template-columns: 1fr;
            }

            .service-stat-number {
                font-size: 26px;
            }

            .service-pill {
                border-radius: 18px;
                width: 100%;
            }
        }
    </style>

    <div class="service-page">
        <main class="page-header-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="title-hr"></div>
                    </div>
                    <div class="col-md-8 col-lg-7">
                        <div class="service-hero-copy">
                            <h1>Integrated Architectural Services & Project Management</h1>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div class="content">
            <section class="section-about service-section">
                <div class="container">
                    <div class="row service-grid">
                        <div class="col-md-6">
                            <div class="service-copy">
                                <div class="section-info">
                                    <div class="title-hr"></div>
                                    <div class="info-title">What KDC Delivers</div>
                                </div>
                                <div>
                                    <strong class="section-subtitle">MULTI-PROFESSIONAL SERVICES</strong>
                                    <h2 class="section-title section-about-title">Planning, design and execution support under one roof</h2>
                                    <p class="service-lead">In varying capacities as consultants, KDC has completed assignments across planning, design and implementation for reputed business houses and residences of prominent personalities.</p>
                                    <p>As a multi-professional service company, KDC offers the complete complement of services under one roof. This helps clients rationalize coordination, reduce project implementation time and maintain efficient budget control from concept to completion.</p>
                                </div>
                                <div>
                                    <a href="{{ route('contact') }}" class="btn btn-yellow btn-upper">Discuss Your Project</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="service-media dots-image">
                                <img alt="KDC service planning and coordination" class="about-img img-responsive" src="{{ asset('building/modern-industrial-building-dusk-with-clear-blue-sky_1282444-197292.jpg') }}">
                                <div class="dots"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="service-section">
                <div class="container">
                    <div class="row service-grid">
                        @foreach ($serviceStages as $stage)
                            <div class="col-md-4">
                                <div class="service-panel service-stage-card">
                                    <span class="service-stage-badge">{{ $stage['label'] }}</span>
                                    <h3>{{ $stage['title'] }}</h3>
                                    <p>{{ $stage['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="service-section bg-dots">
                <div class="container">
                    <div class="row service-grid">
                        <div class="col-md-3">
                            <div class="section-info">
                                <div class="title-hr"></div>
                                <div class="info-title">Scope Of Services</div>
                            </div>
                        </div>
                        <div class="col-md-9 text-display-1">
                            <p>KDC's scope extends from initial site understanding and concept formulation to engineering integration, tender support, construction administration and owner-side supervision.</p>
                            <p>Each package is structured to align design intent, technical systems, site execution and commercial control so that projects move forward without avoidable delay or interface conflict.</p>
                        </div>
                    </div>

                    <div class="row service-grid">
                        <div class="col-md-6">
                            <div class="service-panel service-panel-muted">
                                <span class="section-subtitle">STAGE I</span>
                                <h3>Core planning and engineering services</h3>
                                <p>Stage I establishes the project direction, technical framework and decision basis required for confident progress into documentation and procurement.</p>
                                <ul class="service-list">
                                    @foreach ($stageOneServices as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-media-stack">
                                <img alt="Architectural planning and site strategy" class="img-responsive item-shadow" src="{{ asset('building/19112.jpg') }}">
                                <img alt="Integrated technical planning" class="img-responsive item-shadow" src="{{ asset('building/industrial-park-factory-building-warehouse_1417-1918.jpg') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row service-grid">
                        <div class="col-md-6">
                            <div class="service-media-stack">
                                <img alt="Specialized service coordination" class="img-responsive item-shadow" src="{{ asset('building/A-R-AIRWAYS-PVT-LTD.jpg') }}">
                                <img alt="Construction documentation and bid support" class="img-responsive item-shadow" src="{{ asset('building/industrial-park-factory-building-warehouse_1417-1942.jpg') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-panel service-panel-muted">
                                <span class="section-subtitle">STAGE II</span>
                                <h3>Specialized systems, interiors and delivery support</h3>
                                <p>Stage II expands the project through specialist systems, interiors and coordinated engineering inputs required for detailed realization.</p>
                                <ul class="service-list">
                                    @foreach ($stageTwoServices as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row service-grid">
                        <div class="col-md-7">
                            <div class="service-panel">
                                <span class="section-subtitle">DOCUMENTATION & SITE COORDINATION</span>
                                <h3>Deliverables that carry the project into execution</h3>
                                <div class="service-pill-list">
                                    @foreach ($stageTwoDeliverables as $item)
                                        <div class="service-pill">{{ $item }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="service-panel service-panel-muted">
                                <span class="section-subtitle">CLIENT BENEFITS</span>
                                <h3>Why this integrated structure works</h3>
                                <ul class="service-benefit-list">
                                    @foreach ($serviceBenefits as $benefit)
                                        <li>{{ $benefit }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="service-dark-section">
                <div class="container">
                    <div class="row service-grid">
                        <div class="col-md-5">
                            <div class="service-dark-copy">
                                <strong class="section-subtitle">STAGE III</strong>
                                <h2 class="section-title section-about-title">Project management that protects time, cost and quality</h2>
                                <p>We ensure that the project is completed in conformity with specifications, within agreed timelines and without cost overruns. KDC stays involved so contractors receive timely design inputs and practical guidance on manpower, materials and machinery.</p>
                                <p>Project management also ensures smooth coordination amongst contractors, trades and interdisciplinary agencies so work can progress without interference, hold-ups or avoidable delay.</p>
                                <div class="service-stat">
                                    <span class="service-stat-number">01</span>
                                    <p>Project coordination across contractors, trades and interdisciplinary agencies.</p>
                                </div>
                                <div class="service-stat">
                                    <span class="service-stat-number">02</span>
                                    <p>Continuous monitoring to avoid interference, hold-ups and cascading schedule delays.</p>
                                </div>
                                <div class="service-stat">
                                    <span class="service-stat-number">03</span>
                                    <p>Owner-side supervision that keeps the project viable, deliverable and commercially controlled.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="service-pillars">
                                @foreach ($managementPillars as $pillar)
                                    <div class="service-pillar">
                                        <h3 style="color: #95bf19;">{{ $pillar['title'] }}</h3>
                                        <p>{{ $pillar['text'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="service-dark-image">
                                <img alt="KDC project management supervision" class="img-responsive item-shadow" src="{{ asset('building/banner4.jpg') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="service-section service-cta">
                <div class="container">
                    <div class="row service-grid">
                        <div class="col-md-3">
                            <div class="section-info">
                                <div class="title-hr"></div>
                                <div class="info-title">Client Benefit</div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="service-panel service-panel-muted service-cta-box">
                                <div>
                                    <h2 class="section-title">One accountable team from concept to completion</h2>
                                    <p>With KDC handling planning, design coordination, documentation and project management, clients benefit from clearer communication, faster decision-making, reduced implementation friction and tighter budget discipline across the life of the project.</p>
                                </div>
                                <div>
                                    <a href="{{ route('project') }}" class="link-arrow-2">View Projects <i class="icon ion-ios-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
