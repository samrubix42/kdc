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
        .service-hero-copy {
            max-width: 640px;
        }

        .service-intro-text {
            margin-bottom: 28px;
        }

        .service-card {
            background: #fff;
            border: 1px solid #e9ecef;
            box-shadow: 0 18px 45px rgba(21, 32, 43, 0.06);
            height: 100%;
            padding: 36px 32px;
        }

        .service-card-label {
            color: #cee002;
            display: inline-block;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.14em;
            margin-bottom: 16px;
            text-transform: uppercase;
        }

        .service-card h3 {
            font-size: 26px;
            line-height: 1.3;
            margin-bottom: 14px;
        }

        .service-list-block {
            margin-bottom: 48px;
        }

        .service-list-box {
            background: #f7f7f7;
            height: 100%;
            padding: 34px 30px;
        }

        .service-list-box h3 {
            font-size: 24px;
            margin-bottom: 22px;
        }

        .service-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .service-list li {
            border-bottom: 1px solid #e6e6e6;
            padding: 12px 0;
            position: relative;
            padding-left: 22px;
        }

        .service-list li:last-child {
            border-bottom: 0;
        }

        .service-list li:before {
            color: #cee002;
            content: "+";
            font-weight: 700;
            left: 0;
            position: absolute;
            top: 12px;
        }

        .service-highlight {
            background: #1f2328;
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        .service-highlight:before {
            background: linear-gradient(135deg, rgba(206, 224, 2, 0.18), rgba(206, 224, 2, 0));
            content: "";
            inset: 0;
            position: absolute;
        }

        .service-highlight .container {
            position: relative;
            z-index: 1;
        }

        .service-stat {
            border-left: 2px solid rgba(206, 224, 2, 0.75);
            margin-bottom: 28px;
            padding-left: 18px;
        }

        .service-stat-number {
            color: #cee002;
            display: block;
            font-size: 34px;
            font-weight: 600;
            line-height: 1;
            margin-bottom: 8px;
        }

        .service-pillar {
            background: rgba(255, 255, 255, 0.06);
            height: 100%;
            padding: 30px 24px;
        }

        .service-pillar h3 {
            color: #fff;
            font-size: 22px;
            margin-bottom: 14px;
        }

        .service-pillar p,
        .service-highlight p,
        .service-highlight li {
            color: rgba(255, 255, 255, 0.82);
        }

        .service-image-stack img {
            margin-bottom: 24px;
            width: 100%;
        }

        .service-cta {
            background: #f7f7f7;
        }

        @media (max-width: 991px) {
            .service-card,
            .service-list-box,
            .service-pillar {
                margin-bottom: 30px;
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
                    <div class="service-hero-copy">
                        <h1>Integrated Architectural Services & Project Management</h1>
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
                            <div class="info-title">What KDC Delivers</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <strong class="section-subtitle">MULTI-PROFESSIONAL SERVICES</strong>
                        <h2 class="section-title section-about-title">Planning, design and execution support under one roof</h2>
                        <p class="service-intro-text">In varying capacities as consultants, KDC has completed assignments across planning, design and implementation for reputed business houses and residences of prominent personalities.</p>
                        <p class="service-intro-text">As a multi-professional service company, KDC offers the complete complement of services under one roof. This helps clients rationalize coordination, reduce project implementation time and maintain efficient budget control from concept to completion.</p>
                        <a href="{{ url('/contact') }}" class="btn btn-yellow btn-upper">Discuss Your Project</a>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <div class="dots-image">
                            <img alt="KDC service planning and coordination" class="about-img img-responsive" src="{{ asset('building/modern-industrial-building-dusk-with-clear-blue-sky_1282444-197292.jpg') }}">
                            <div class="dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    @foreach ($serviceStages as $stage)
                        <div class="col-md-4">
                            <div class="service-card">
                                <span class="service-card-label">{{ $stage['label'] }}</span>
                                <h3>{{ $stage['title'] }}</h3>
                                <p>{{ $stage['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section bg-dots">
            <div class="container">
                <div class="row">
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
                <div class="row service-list-block">
                    <div class="col-md-6">
                        <div class="service-list-box">
                            <span class="section-subtitle">STAGE I</span>
                            <h3>Core planning and engineering services</h3>
                            <ul class="service-list">
                                @foreach ($stageOneServices as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 service-image-stack">
                        <img alt="Architectural planning and site strategy" class="img-responsive item-shadow" src="{{ asset('building/19112.jpg') }}">
                        <img alt="Integrated technical planning" class="img-responsive item-shadow" src="{{ asset('building/industrial-park-factory-building-warehouse_1417-1918.jpg') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 service-image-stack">
                        <img alt="Specialized service coordination" class="img-responsive item-shadow" src="{{ asset('building/A-R-AIRWAYS-PVT-LTD.jpg') }}">
                        <img alt="Construction documentation and bid support" class="img-responsive item-shadow" src="{{ asset('building/industrial-park-factory-building-warehouse_1417-1942.jpg') }}">
                    </div>
                    <div class="col-md-6">
                        <div class="service-list-box">
                            <span class="section-subtitle">STAGE II</span>
                            <h3>Specialized systems, interiors and delivery support</h3>
                            <ul class="service-list">
                                @foreach ($stageTwoServices as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 40px;">
                    <div class="col-md-12">
                        <div class="service-list-box">
                            <span class="section-subtitle">DOCUMENTATION & SITE COORDINATION</span>
                            <h3>Deliverables that carry the project into execution</h3>
                            <div class="row">
                                @foreach ($stageTwoDeliverables as $item)
                                    <div class="col-sm-6">
                                        <ul class="service-list">
                                            <li>{{ $item }}</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section service-highlight">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <strong class="section-subtitle">STAGE III</strong>
                        <h2 class="section-title section-about-title" style="color: #fff;">Project management that protects time, cost and quality</h2>
                        <p>We ensure that the project is completed in conformity with specifications, within agreed timelines and without cost overruns. KDC stays involved so contractors receive timely design inputs and practical guidance on manpower, materials and machinery.</p>
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
                    <div class="col-md-7 col-md-offset-1">
                        <div class="row">
                            @foreach ($managementPillars as $pillar)
                                <div class="col-md-4">
                                    <div class="service-pillar">
                                        <h3>{{ $pillar['title'] }}</h3>
                                        <p>{{ $pillar['text'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row" style="margin-top: 34px;">
                            <div class="col-md-12">
                                <img alt="KDC project management supervision" class="img-responsive item-shadow" src="{{ asset('building/banner4.jpg') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section service-cta">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="section-info">
                            <div class="title-hr"></div>
                            <div class="info-title">Client Benefit</div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="section-title">One accountable team from concept to completion</h2>
                                <p>With KDC handling planning, design coordination, documentation and project management, clients benefit from clearer communication, faster decision-making, reduced implementation friction and tighter budget discipline across the life of the project.</p>
                            </div>
                            <div class="col-md-4 text-right" style="padding-top: 20px;">
                                <a href="{{ url('/project') }}" class="link-arrow-2">View Projects <i class="icon ion-ios-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
