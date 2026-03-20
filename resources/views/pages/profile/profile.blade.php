<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>
@section('meta_title', 'Introduction | KDC Consultants')

<div>
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
                    <h1 style="color: #95BF19; font-size: 54px; font-weight: 300; margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; letter-spacing: 1px;">Introduction</h1>
                    <div class="breadcrumb" style="background:transparent; padding:0; margin: 20px 0 0;">
                        <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.7); font-size: 15px; text-decoration: none;">Home</a>
                        <span style="margin: 0 10px; color:rgba(255,255,255,0.4);">/</span>
                        <span style="color: #fff; font-size: 15px;">Profile</span>
                    </div>
                </div>
                
                <!-- Right Hero Image placeholder (architectural sketch) -->
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                     <img src="{{ asset('building/modern_corporate_sketch.png') }}" alt="Architectural Sketch" style="max-width: 100%; max-height: 250px; border-radius: 8px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: 4px solid #fff;">
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="section" style="padding: 60px 0 100px; background-color: #f9f9f9;">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar: Logo -->
                <div class="col-md-3 col-sm-12" style="margin-bottom: 40px;">
                    <br>
                    <img src="{{ asset('images/KDC-Logo-crop.png') }}" alt="KDC Kachroo Design Consultants (P) LTD." style="max-width: 90%; height: auto; display: block;">
                </div>

                <!-- Right Content: Text Description -->
                <div class="col-md-9 col-sm-12">
                    <div class="profile-text-content">
                        @php
                            $kdcLogoInline = '<strong style="font-size: 1.1em; letter-spacing: -0.5px; font-family: \'Arial\', sans-serif;"><span style="color:#1a4276;">KD</span><span style="color:#95BF19;">C</span></strong>';
                        @endphp
                        
                        <p>{!! $kdcLogoInline !!} is a revolutionary emergence in the field of architectural assignments formulated on the ethics of Professionalism and to create versatility with a young and dynamic team of professional acumen who have been dedicated over so many years in this industry.</p>

                        <p>{!! $kdcLogoInline !!} was founded by its Principal Architect, Vijay Kachroo, who in the field has more than two decades of rich experience.</p>

                        <p>Prior to incorporation of {!! $kdcLogoInline !!}, Vijay Kachroo was managing the Company under the name of "Archivision".</p>

                        <p>We have about two decades of working experience in the institutional, industrial and luxury residential market. though honing our skills with exciting design and more so by our design excellence & timely delivery have developed a high profile clientele whose support provides us the opportunity to work for diverse range and locations. Customer satisfaction with quality delivered is recognized and certified by the veracity that at {!! $kdcLogoInline !!} we get repeat orders from clients.</p>

                        <p>We at {!! $kdcLogoInline !!} had the honour of obtaining the ISO-2015 (URS) Certification which is an embodiment of highly compatible standards that assures quality management system of the Organization. It sets out the requirement of a quality managed system and thus assures customer satisfaction with our services meeting all the prescribed norms of quality standards with adherence to time stipulations.</p>

                        <p>We believe and understand the inspirational design through collaborative design process and the importance of establishing a proficient design team where we are able to draw the best talent to suit the client and project needs as well. We are constantly driven by a passion to evoke spaces which enrich the rituals of daily life. Over the time we have also established lasting relationship with high-profile consultants who are also in pursuit of design excellence.</p>

                        <p>We at {!! $kdcLogoInline !!} adopt an integrated approach towards the project management to make sure apposite co-ordination at project sites.</p>

                        <p>We provide unmatchable remarkable quality building measures which are achieved by adopting innovative ideas keeping ourselves conversant with emerging world class construction methodology trends.</p>

                        <p style="margin-bottom: 0;">We also believe in update on usage of construction material keeping pace with the green building concept to reduce carbon foot print.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div style="background: linear-gradient(90deg, #1a4276 0%, #3a75c4 50%, #95BF19 100%); height: 6px; width: 100%;"></div>

    <style>
        .profile-text-content p {
            font-size: 15.5px;
            color: #555;
            line-height: 1.85;
            margin-bottom: 22px;
            text-align: justify;
        }

        @media (max-width: 768px) {
            .profile-text-content p {
                text-align: left;
            }
        }
    </style>
</div>
