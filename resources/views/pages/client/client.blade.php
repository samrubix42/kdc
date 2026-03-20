<?php

use Livewire\Component;
use App\Models\Testimonial;

new class extends Component
{
    public function with(): array
    {
        return [
            'clientTestimonials' => Testimonial::query()
                ->where('is_active', true)
                ->take(4)
                ->get(['name', 'client_info', 'message']),
        ];
    }
};
?>
@section('meta_title', 'Clients & Partnerships | KDC Consultants')
@section('meta_description', 'Read client experiences and explore KDC Consultants partnerships built on accountability, delivery discipline, and long-term trust.')
@section('meta_keywords', 'KDC clients, client testimonials, architecture partnerships, consulting client experience, KDC Consultants')

<div>
    @php
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
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .partner-card img {
            filter: grayscale(100%);
            max-height: 72px;
            max-width: 100%;
            opacity: 0.75;
            transition: filter 0.3s ease, opacity 0.3s ease;
        }

        .partner-card:hover {
            box-shadow: 0 10px 30px rgba(149, 191, 25, 0.15);
            border-color: #95BF19;
            transform: translateY(-4px);
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
        <!-- Hero Banner matched to Theme -->
        <div style="position: relative; background-color: #1a4276; overflow: hidden; padding: 110px 0 60px;">
            <!-- Diagonal Green Accent -->
            <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 300px; background-color: #95BF19; transform: skewY(-4deg); transform-origin: bottom left; z-index: 0; opacity: 0.9;"></div>
            <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 280px; background-color: #f9f9f9; transform: skewY(-4deg); transform-origin: bottom left; z-index: 1;"></div>
            
            <div class="container" style="position: relative; z-index: 2;">
                <div class="row" style="display:flex; flex-wrap:wrap; align-items:center;">
                    <!-- Left Title Content -->
                    <div class="col-md-6 col-sm-12" style="margin-bottom: 30px;">
                        <div style="width: 50px; height: 6px; background: #fff; margin-bottom: 20px;"></div>
                        <h1 style="color: #95BF19; font-size: 48px; font-weight: 300; margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; letter-spacing: 1px; line-height: 1.15;">Clients & Partnerships</h1>
                        <div class="breadcrumb" style="background:transparent; padding:0; margin: 20px 0 0;">
                            <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.7); font-size: 15px; text-decoration: none;">Home</a>
                            <span style="margin: 0 10px; color:rgba(255,255,255,0.4);">/</span>
                            <span style="color: #fff; font-size: 15px;">Clients</span>
                        </div>
                    </div>
                    
                    <!-- Right Hero Image placeholder -->
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                         <img src="{{ asset('building/banner4.jpg') }}" alt="Partnerships" style="max-width: 100%; max-height: 250px; border-radius: 8px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: 4px solid #fff; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>

        <div class="content" style="padding-bottom: 80px; background-color: #f9f9f9;">
            <section class="client-section" style="padding-top: 60px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 text-center" style="margin: 0 auto; float: none; margin-bottom: 50px;">
                            <h2 class="section-title" style="color: #1a4276; margin-bottom: 20px; font-weight: 700;">Our Esteemed Partnerships</h2>
                            <div style="width: 60px; height: 4px; background: #95BF19; margin: 0 auto 25px;"></div>
                            <p style="font-size: 16px; color: #666; line-height: 1.8;">KDC has had the privilege of completing assignments for reputed business houses, institutions, and private residences. We are proud of our long-term professional relationships built on strict accountability, efficient delivery, and mutual trust. Below are some of the incredible organizations we have worked alongside.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
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
