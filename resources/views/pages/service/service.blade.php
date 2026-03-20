<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>
@section('meta_title', 'Services | KDC Consultants - Architecture & Project Management')
@section('meta_description', 'Explore KDC Consultants services including architecture, engineering coordination, design management, and end-to-end project supervision.')

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
                    <h1 style="color: #95BF19; font-size: 54px; font-weight: 300; margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; letter-spacing: 1px;">Services</h1>
                    <div class="breadcrumb" style="background:transparent; padding:0; margin: 20px 0 0;">
                        <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.7); font-size: 15px; text-decoration: none;">Home</a>
                        <span style="margin: 0 10px; color:rgba(255,255,255,0.4);">/</span>
                        <span style="color: #fff; font-size: 15px;">Services</span>
                    </div>
                </div>
                
                <!-- Right Hero Image placeholder (architectural sketch) -->
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                     <img src="{{ asset('building/modern_corporate_sketch.png') }}" alt="Architectural Sketch" style="max-width: 100%; max-height: 250px; border-radius: 8px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: 4px solid #fff;">
                </div>
            </div>
        </div>
    </div>

    <!-- Intro Section -->
    <div class="section" style="padding: 70px 0 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center" style="margin: 0 auto; float: none;">
                    <p style="font-size: 17px; color: #555; line-height: 1.9; margin-bottom: 25px;">
                        In varying capacities as consultants, KDC has completed various assignments of planning, designing and implementing. The extensive list of projects done by KDC includes business houses of repute and residences of prominent personalities.
                    </p>
                    <p style="font-size: 17px; color: #555; line-height: 1.9;">
                        Being a multi-professional service company, KDC under one roof can offer the entire complement of services, which would be of considerable benefits to the client in rationalizing the co-ordination problems, cutting down the Project Implementation Time and ensuring efficient Budget control.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Stages Overview -->
    <div class="section" style="padding-bottom: 90px;">
        <div class="container">
            <!-- STAGE I -->
            <div class="row align-items-center" style="margin-bottom: 60px; display: flex; flex-wrap: wrap;">
                <div class="col-md-5 col-sm-12" style="padding: 20px 30px;">
                    <div style="border-left: 4px solid #cee002; padding-left: 20px;">
                        <h3 style="color:#1d4e89; font-weight: 700; margin-bottom: 15px; margin-top: 0;">STAGE I</h3>
                        <p style="font-size: 16px; color: #666; line-height: 1.8; margin: 0;">Conceptualizing, Planning and Final project documentation, tenders and working drawings.</p>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12">
                    <img src="{{ asset('building/banner3.jpg') }}" alt="Stage I Render" style="width:100%; border-radius:12px; box-shadow:0 15px 40px rgba(0,0,0,0.1); object-fit: cover; height: 350px;">
                </div>
            </div>

            <!-- STAGE II -->
            <div class="row align-items-center" style="margin-bottom: 60px; display: flex; flex-wrap: wrap; flex-direction: row-reverse;">
                <div class="col-md-5 col-sm-12" style="padding: 20px 30px;">
                    <div style="border-left: 4px solid #cee002; padding-left: 20px;">
                        <h3 style="color:#1d4e89; font-weight: 700; margin-bottom: 15px; margin-top: 0;">STAGE II</h3>
                        <p style="font-size: 16px; color: #666; line-height: 1.8; margin: 0;">Other services design management & co-ordination for realization of the Project, with process documentation.</p>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12">
                    <img src="{{ asset('building/19112.jpg') }}" alt="Stage II Map" style="width:100%; border-radius:12px; box-shadow:0 15px 40px rgba(0,0,0,0.1); object-fit: cover; height: 350px;">
                </div>
            </div>

            <!-- STAGE III -->
            <div class="row align-items-center" style="display: flex; flex-wrap: wrap;">
                <div class="col-md-5 col-sm-12" style="padding: 20px 30px;">
                    <div style="border-left: 4px solid #cee002; padding-left: 20px;">
                        <h3 style="color:#1d4e89; font-weight: 700; margin-bottom: 10px; margin-top: 0;">STAGE III</h3>
                        <h4 style="color:#555; margin-bottom: 15px; font-weight: 600;">Project Management</h4>
                        <p style="font-size: 16px; color: #666; line-height: 1.8; margin: 0;">We offer complete and effective supervision and control of the project on behalf of the owner.</p>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12">
                    <img src="{{ asset('building/Untitled-5.jpg') }}" alt="Stage III Management" style="width:100%; border-radius:12px; box-shadow:0 15px 40px rgba(0,0,0,0.1); object-fit: cover; height: 350px;">
                </div>
            </div>
        </div>
    </div>

    <!-- The Scope of KDC services includes: -->
    <div class="section scope-section" style="background-color: #1a4276; color: #fff; padding: 100px 0 80px;">
        <div class="container">
            <div class="row" style="margin-bottom: 60px;">
                <div class="col-md-12">
                    <h2 style="color: #fff; font-weight: 600; font-size: 30px; display: flex; align-items: center; margin: 0;">
                        <span style="display: inline-block; width: 40px; height: 40px; background: #cee002; line-height: 40px; text-align: center; border-radius: 50%; color: #000; margin-right: 15px; font-size: 18px;">
                            <i class="ion-arrow-right-c"></i>
                        </span>
                        The Scope of KDC services includes:
                    </h2>
                </div>
            </div>

            <div class="row">
                <!-- Column 1: Stage I -->
                <div class="col-md-4 scope-column" style="border-right: 1px solid rgba(255,255,255,0.1); padding-right: 40px;">
                    <h3 style="color: #cee002; font-weight: 600; margin-bottom: 30px; font-size: 22px;">STAGE I</h3>
                    <ul class="scope-list">
                        <li>Site Investigation</li>
                        <li>Master Planning</li>
                        <li>Preliminary Concepts and Design</li>
                        <li>Architectural Planning</li>
                        <li>Structural Planning</li>
                        <li>Water Supply, Treatment and Distribution Systems</li>
                        <li>Power Generation, Transmission and Distribution</li>
                        <li>Lighting Systems</li>
                        <li>Sanitary Works and Sewage Disposal System</li>
                        <li>Heating, Ventilation, Air-conditioning and Refrigeration</li>
                    </ul>
                </div>

                <!-- Column 2: Stage II -->
                <div class="col-md-4 scope-column" style="border-right: 1px solid rgba(255,255,255,0.1); padding: 0 40px;">
                    <h3 style="color: #cee002; font-weight: 600; margin-bottom: 30px; font-size: 22px;">STAGE II</h3>
                    <ul class="scope-list">
                        <li>Cold Storage</li>
                        <li>Steam Generation and Distribution System</li>
                        <li>Hot Water Generation and Distribution System</li>
                        <li>Kitchen Engineering & Installation</li>
                        <li>Laundry Engineering & Installation</li>
                        <li>Elevators, Escalators and Hoists</li>
                        <li>Telephone and Communication System</li>
                        <li>Music, Radio and Public Address System</li>
                        <li>Acoustics</li>
                        <li>Television System</li>
                        <li>Materials Handling System</li>
                        <li>Fire Alarm and Protection System</li>
                        <li>Facilities Planning</li>
                        <li>Garbage Disposal</li>
                        <li>Interior Designs</li>
                        <li>Selection of Materials, Fittings and Fixtures</li>
                        <li>Graphics, Logos and Publicity Materials</li>
                        <li>Landscaping and Horticulture</li>
                        <li>Preparation of Designs, Drawings, Specifications, Bid Documents, Comparative Analysis of Bids, etc. for above items. Preparation of cost Estimate and Project Time Schedules.</li>
                        
                        <li style="font-weight: 700; color: #fff; font-size: 15px; margin-top: 25px; margin-bottom: 15px;" class="no-bullet">Construction Management & Co-ordination at Site:</li>
                        
                        <li>Co-ordination of various Agencies.</li>
                        <li>Administration of Contracts</li>
                        <li>Time schedule Monitoring.</li>
                        <li>Inspection and Approval of Works</li>
                        <li>Certification for payments</li>
                    </ul>
                </div>

                <!-- Column 3: Stage III -->
                <div class="col-md-4 scope-column" style="padding-left: 40px;">
                    <h3 style="color: #cee002; font-weight: 600; margin-bottom: 30px; font-size: 22px;">STAGE III</h3>
                    <div class="scope-text">
                        <p>We ensure that project gets completed conforming to specifications, adhering to agreed time lines without any cost over runs.</p>
                        <p><strong>Project Quality Management</strong> ensures that the project will meet the specifications for which it was planned. It consists of quality planning, quality assurance and quality control.</p>
                        <p><strong>Project Time Management</strong> is achieved by processes such as activity definition, activity sequencing, activity duration estimating, schedule development and schedule control.</p>
                        <p><strong>Project Cost Management</strong> involves processes of resource planning, cost estimating, cost budgeting and budget control.</p>
                        <p><strong>Project Management</strong> ensures that the Contractor gets all timely inputs on design with guidance to arrange required man power, materials & machinery.</p>
                        <p><strong>Project Management</strong> gets involved and ensures the most vital parameter that makes a project viable, deliverable in time with cost control and quality is met. Project co-ordination amongst various contractors, trades and inter disciplinary agencies to ensure smooth progressing of Project without interference or hold up to each other that causes the overall delay in the project.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Images Footer Block -->
    <div style="background-color: #12305a; padding: 0;">
        <div class="container-fluid" style="padding: 0;">
             <div class="row" style="margin: 0; display: flex; flex-wrap: wrap;">
                 <div class="col-sm-6" style="padding: 0;">
                     <img src="{{ asset('building/A-R-AIRWAYS-PVT-LTD.jpg') }}" alt="Building Project" style="width: 100%; height: 350px; object-fit: cover; display: block; opacity: 0.9;">
                 </div>
                 <div class="col-sm-6" style="padding: 0;">
                     <img src="{{ asset('building/industrial-park-factory-building-warehouse_1417-1918.jpg') }}" alt="Building Project" style="width: 100%; height: 350px; object-fit: cover; display: block; opacity: 0.9;">
                 </div>
             </div>
        </div>
        <div style="background: linear-gradient(90deg, #95BF19 0%, #cee002 100%); height: 8px; width: 100%;"></div>
    </div>

    <style>
        .scope-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .scope-list li {
            position: relative;
            padding-left: 18px;
            margin-bottom: 12px;
            font-size: 14.5px;
            color: rgba(255,255,255,0.85);
            line-height: 1.6;
        }
        .scope-list li:not(.no-bullet)::before {
            content: "•";
            position: absolute;
            left: 0;
            top: 0;
            color: #cee002;
            font-size: 18px;
            line-height: 1.35;
        }
        .scope-list li.no-bullet {
            padding-left: 0;
        }
        
        .scope-text p {
            font-size: 14.5px;
            color: rgba(255,255,255,0.85);
            line-height: 1.7;
            margin-bottom: 20px;
        }
        .scope-text strong {
            color: #fff;
            font-weight: 600;
        }
        
        @media (max-width: 991px) {
            .align-items-center {
                flex-direction: column !important;
            }
            .scope-column {
                border-right: none !important;
                padding: 0 15px !important;
                margin-bottom: 50px;
            }
        }
        @media (min-width: 992px) {
            .align-items-center {
                align-items: center;
            }
        }
    </style>
</div>
