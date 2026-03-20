<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>
@section('meta_title', 'Our Team - KDC Consultants')
@section('meta_description', 'Meet the expert team of architects, engineers, and project managers at KDC Consultants.')

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
                    <h1 style="color: #95BF19; font-size: 54px; font-weight: 300; margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; letter-spacing: 1px;">Our Team</h1>
                    <div class="breadcrumb" style="background:transparent; padding:0; margin: 20px 0 0;">
                        <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.7); font-size: 15px; text-decoration: none;">Home</a>
                        <span style="margin: 0 10px; color:rgba(255,255,255,0.4);">/</span>
                        <span style="color: #fff; font-size: 15px;">Our Team</span>
                    </div>
                </div>
                
                <!-- Right Hero Image placeholder -->
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                     <img src="{{ asset('images/KDC-Logo-crop.png') }}" alt="KDC Consultants" style="max-width: 100%; max-height: 150px; object-fit: contain; filter: brightness(0) invert(1); opacity: 0.9;">
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content section" style="padding: 60px 0;">
        <div class="container">
            <div class="row">
                
                <!-- Left Column: Main Profiles -->
                <div class="col-md-9 col-sm-12">
                    
                    <!-- Profile 1 -->
                    <div class="team-profile row" style="margin-bottom: 50px; border-bottom: 1px solid #eaeaea; padding-bottom: 40px;">
                        <div class="col-sm-3 col-xs-12">
                            <div class="profile-image-placeholder" style="background:#e9ecef; border-radius:8px; padding-bottom:120%; position:relative; box-shadow:0 10px 20px rgba(0,0,0,0.05); border:1px solid #ddd; margin-bottom: 20px;">
                                <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); text-align:center; color:#999;">
                                    <i class="icon ion-image" style="font-size:40px;"></i>
                                    <p style="font-size:12px; margin-top:10px;">Mr. Vijay Kachroo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <h3 style="color:#1d4e89; margin-top:0; font-weight:700;">Mr. Vijay Kachroo</h3>
                            <h5 style="color:#555; margin-top:5px; margin-bottom:15px; font-weight:600; font-size:16px;">Principal Architect, the backbone of the Organization.</h5>
                            <p style="color:#666; font-size:15px;">As a Illustrious Project leader, he looks after the overall development of the Project, starting from the conceptualization stage up till the handing over of each project.</p>
                            
                            <h6 style="color:#95BF19; font-weight:700; margin-top:25px; margin-bottom:10px;">Educational / Professional Qualifications</h6>
                            <ul style="color:#666; line-height:1.8; padding-left:20px;">
                                <li>Master in Architecture (Landscape Architecture).</li>
                                <li>Graduate in Architecture from Indian Institute of Architects, Delhi.</li>
                                <li>Associate of the Indian Institute of Architecture.</li>
                                <li>Council of Architecture.</li>
                                <li>The Indian Institution of Valuers, India (Fellowship).</li>
                                <li>Member IGBC (Indian Green Building Council).</li>
                                <li>Member NIPH.</li>
                            </ul>

                            <h6 style="color:#95BF19; font-weight:700; margin-top:25px; margin-bottom:10px;">Experience</h6>
                            <ul style="color:#666; line-height:1.8; padding-left:20px;">
                                <li>Vijay Kachroo had completed numerous landmark Industrial, Institutional and Residential Building Projects in the Country.</li>
                                <li>Successfully executed and completed more than 10 million sq.ft. in last 20 years.</li>
                                <li>Having special interest in academics has been a visiting faculty to various educational Institutions of repute.</li>
                                <li>Heads the design studio and is the one who sets standards for design, drawings and documentation.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Profile 2 -->
                    <div class="team-profile row" style="margin-bottom: 50px; border-bottom: 1px solid #eaeaea; padding-bottom: 40px;">
                        <div class="col-sm-3 col-xs-12">
                            <div class="profile-image-placeholder" style="background:#e9ecef; border-radius:8px; padding-bottom:120%; position:relative; box-shadow:0 10px 20px rgba(0,0,0,0.05); border:1px solid #ddd; margin-bottom: 20px;">
                                <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); text-align:center; color:#999;">
                                    <i class="icon ion-image" style="font-size:40px;"></i>
                                    <p style="font-size:12px; margin-top:10px;">Mr. Jatinder Kaw</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <h3 style="color:#1d4e89; margin-top:0; font-weight:700;">Mr. Jatinder Kaw</h3>
                            <h5 style="color:#555; margin-top:5px; margin-bottom:15px; font-weight:600; font-size:16px;">Director</h5>
                            <p style="color:#666; font-size:15px;">An eminent Civil Engineer having 38 years of Vast Experience and with his proficiency and Knowledge has worked on many Civil and related Projects.</p>
                        </div>
                    </div>

                    <!-- Profile 3 -->
                    <div class="team-profile row" style="margin-bottom: 50px; border-bottom: 1px solid #eaeaea; padding-bottom: 40px;">
                        <div class="col-sm-3 col-xs-12">
                            <div class="profile-image-placeholder" style="background:#e9ecef; border-radius:8px; padding-bottom:120%; position:relative; box-shadow:0 10px 20px rgba(0,0,0,0.05); border:1px solid #ddd; margin-bottom: 20px;">
                                <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); text-align:center; color:#999;">
                                    <i class="icon ion-image" style="font-size:40px;"></i>
                                    <p style="font-size:12px; margin-top:10px;">Mr. Prabhu Dayal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <h3 style="color:#1d4e89; margin-top:0; font-weight:700;">Mr. Prabhu Dayal</h3>
                            <h5 style="color:#555; margin-top:5px; margin-bottom:15px; font-weight:600; font-size:16px;">Architect - In-charge design studio.</h5>
                            <p style="color:#666; font-size:15px;">An adept design coordinator, looks after the detailed design, interaction with the owner, preparation of drawings with support team of architects and manages issue of drawings/documents for construction.</p>
                            
                            <h6 style="color:#95BF19; font-weight:700; margin-top:25px; margin-bottom:10px;">Experience</h6>
                            <ul style="color:#666; line-height:1.8; padding-left:20px;">
                                <li>Mr. Prabhu Dayal has an experience of over 30 years and has worked on various projects of varying nature and size.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Profile 4 -->
                    <div class="team-profile row" style="margin-bottom: 50px; border-bottom: 1px solid #eaeaea; padding-bottom: 40px;">
                        <div class="col-sm-3 col-xs-12">
                            <div class="profile-image-placeholder" style="background:#e9ecef; border-radius:8px; padding-bottom:120%; position:relative; box-shadow:0 10px 20px rgba(0,0,0,0.05); border:1px solid #ddd; margin-bottom: 20px;">
                                <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); text-align:center; color:#999;">
                                    <i class="icon ion-personal" style="font-size:40px;"></i>
                                    <p style="font-size:12px; margin-top:10px;">Mrs. Shweta Kachroo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <h3 style="color:#1d4e89; margin-top:0; font-weight:700;">Mrs. Shweta Kachroo</h3>
                            <h5 style="color:#555; margin-top:5px; margin-bottom:15px; font-weight:600; font-size:16px;">Director / General Manager (Technical Administration & Business Development)</h5>
                            <p style="color:#666; font-size:15px;">Being an administrative head, she looks after the policies and procedures and ensures that deadlines for project deliverables are strictly adhered to.</p>
                            
                            <h6 style="color:#95BF19; font-weight:700; margin-top:25px; margin-bottom:10px;">Qualifications</h6>
                            <ul style="color:#666; line-height:1.8; padding-left:20px;">
                                <li>Graduate from Jammu University.</li>
                                <li>GNIIT (Graduate from NIIT).</li>
                                <li>MPMC (Member of Project Management Consultancy).</li>
                                <li>B.Ed. (Bachelor of Education from CCS University, Meerut).</li>
                            </ul>

                            <h6 style="color:#95BF19; font-weight:700; margin-top:25px; margin-bottom:10px;">Experience</h6>
                            <ul style="color:#666; line-height:1.8; padding-left:20px;">
                                <li>Mrs. Shweta Kachroo has an experience of 15 years at senior administrative level in various organizations.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Profile 5 -->
                    <div class="team-profile row" style="margin-bottom: 50px; border-bottom: 1px solid #eaeaea; padding-bottom: 40px;">
                        <div class="col-sm-3 col-xs-12">
                            <div class="profile-image-placeholder" style="background:#e9ecef; border-radius:8px; padding-bottom:120%; position:relative; box-shadow:0 10px 20px rgba(0,0,0,0.05); border:1px solid #ddd; margin-bottom: 20px;">
                                <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); text-align:center; color:#999;">
                                    <i class="icon ion-image" style="font-size:40px;"></i>
                                    <p style="font-size:12px; margin-top:10px;">Mr. N.J. Braroo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <h3 style="color:#1d4e89; margin-top:0; font-weight:700;">Mr. N. J. Braroo (Administration)</h3>
                            <h5 style="color:#555; margin-top:5px; margin-bottom:15px; font-weight:600; font-size:16px;">Co-ordination and Administration</h5>
                            <p style="color:#666; font-size:15px;">Being an administrative head, he looks after administration and co-ordination of the organization and ensures the implementation of laid down management policies.</p>
                            
                            <h6 style="color:#95BF19; font-weight:700; margin-top:25px; margin-bottom:10px;">Experience</h6>
                            <ul style="color:#666; line-height:1.8; padding-left:20px;">
                                <li>Mr. N. J. Braroo has experience of more than 40 years at senior administration level in various organizations.</li>
                            </ul>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Sidebar Teams -->
                <div class="col-md-3 col-sm-12">
                    <div class="sidebar" style="background:#fcfcfc; padding:20px; border-radius:8px; border:1px solid #eee;">
                        
                        <div class="sidebar-widget mb-40" style="margin-bottom:25px;">
                            <h5 style="color:#95BF19; font-weight:700; margin-bottom:10px; font-size:14px;">Our Architect Team</h5>
                            <ul style="list-style:none; padding:0; color:#555; line-height:1.6; font-size:13px;">
                                <li>Mr. Sanjay Kaushik</li>
                                <li>Mr. Sourish Rao</li>
                                <li>Mrs. Shruti Tayal</li>
                                <li>Mr. Abhishek Sharma</li>
                                <li>Mr. Kunwar Pal Singh</li>
                                <li>Mr. Jatin Saraswat</li>
                                <li>Miss Suchita</li>
                            </ul>
                        </div>

                        <div class="sidebar-widget mb-40" style="margin-bottom:25px;">
                            <h5 style="color:#95BF19; font-weight:700; margin-bottom:10px; font-size:14px;">Project Management Team</h5>
                            <ul style="list-style:none; padding:0; color:#555; line-height:1.6; font-size:13px;">
                                <li>Mr. Sunil Kaul</li>
                                <li>Mr. Sumit Tickoo</li>
                                <li>Mr. Kuldeep Kumar Singh</li>
                                <li>Mr. M. M. Jha</li>
                                <li>Mr. Shrawan Pandita</li>
                                <li>Mr. Ashwani Kumar</li>
                                <li>Mr. Jaffar Iqbal</li>
                            </ul>
                        </div>

                        <div class="sidebar-widget mb-40" style="margin-bottom:25px;">
                            <h5 style="color:#95BF19; font-weight:700; margin-bottom:10px; font-size:14px;">Accounts/Administration</h5>
                            <ul style="list-style:none; padding:0; color:#555; line-height:1.6; font-size:13px;">
                                <li>Mr. N.J. Braroo</li>
                                <li>Mr. Lalit Negi</li>
                                <li>Mr. Suresh Singh</li>
                                <li>Mr. Viplove Haldar</li>
                            </ul>
                        </div>

                        <div class="sidebar-widget">
                            <h5 style="color:#95BF19; font-weight:700; margin-bottom:10px; font-size:14px;">Supporting Staff</h5>
                            <ul style="list-style:none; padding:0; color:#555; line-height:1.6; font-size:13px;">
                                <li>Mr. Brijesh</li>
                                <li>Mr. Anuj Kumar</li>
                                <li>Mr. Sonu Singh</li>
                                <li>Mr. Vijay Mandal</li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            
            <!-- Bottom Section: Consultants -->
            <div class="row" style="margin-top: 50px;">
                <div class="col-xs-12">
                    <h3 style="color:#1d4e89; font-weight:700; margin-bottom:40px; border-bottom:2px solid #95BF19; display:inline-block; padding-bottom:10px;">List of Some Our Consultants</h3>
                </div>

                <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                    <div style="background:#fff; border:1px solid #f0f0f0; border-radius:8px; padding:25px; height:100%; box-shadow:0 5px 15px rgba(0,0,0,0.02);">
                        <div style="display:flex; align-items:center; margin-bottom:15px;">
                            <span style="background:#95BF19; color:#fff; font-size:12px; font-weight:700; padding:2px 8px; border-radius:4px; margin-right:10px;">1</span>
                            <h5 style="color:#95BF19; margin:0; font-weight:700;">Structural Consultant</h5>
                        </div>
                        <h4 style="color:#333; font-weight:700; margin-top:0; margin-bottom:5px; font-size:16px;">Mr. Yashpal Singh</h4>
                        <p style="font-weight:600; color:#555; margin-bottom:10px;">T.C. Structural Consultant Pvt. Ltd.</p>
                        <p style="color:#777; font-size:14px; line-height:1.6; margin:0;">R-307, Dua Complex,<br>24, Veer Savarkar Block,<br>Shakarpur, Vikas Marg,<br>Delhi-110092</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                    <div style="background:#fff; border:1px solid #f0f0f0; border-radius:8px; padding:25px; height:100%; box-shadow:0 5px 15px rgba(0,0,0,0.02);">
                        <div style="display:flex; align-items:center; margin-bottom:15px;">
                            <span style="background:#95BF19; color:#fff; font-size:12px; font-weight:700; padding:2px 8px; border-radius:4px; margin-right:10px;">2</span>
                            <h5 style="color:#95BF19; margin:0; font-weight:700;">MEP Consultant</h5>
                        </div>
                        <h4 style="color:#333; font-weight:700; margin-top:0; margin-bottom:5px; font-size:16px;">Mr. S.K.Poddar</h4>
                        <p style="font-weight:600; color:#555; margin-bottom:10px;">Design Centre Consulting Engineer Pvt. Ltd.</p>
                        <p style="color:#777; font-size:14px; line-height:1.6; margin:0;">Office No.44 to 47, 4th Floor, Ansal<br>Plaza Mall, Dabur Chowk, Vaishali,<br>Ghaziabad (U.P.) 201010</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                    <div style="background:#fff; border:1px solid #f0f0f0; border-radius:8px; padding:25px; height:100%; box-shadow:0 5px 15px rgba(0,0,0,0.02);">
                        <div style="display:flex; align-items:center; margin-bottom:15px;">
                            <span style="background:#95BF19; color:#fff; font-size:12px; font-weight:700; padding:2px 8px; border-radius:4px; margin-right:10px;">3</span>
                            <h5 style="color:#95BF19; margin:0; font-weight:700;">Senior Vastu Consultant</h5>
                        </div>
                        <h4 style="color:#333; font-weight:700; margin-top:0; margin-bottom:5px; font-size:16px;">Dr. Anand Bhardwaj, Director</h4>
                        <p style="font-weight:600; color:#555; margin-bottom:10px;">International Institute of<br>Vedic Culcutre (Regd.)</p>
                        <p style="color:#777; font-size:14px; line-height:1.6; margin:0;">Qualification - Ph.D. Vastu,<br>D.Sc.Eq., D.Lit (Vastu),<br>Experience - 37 Years</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                    <div style="background:#fff; border:1px solid #f0f0f0; border-radius:8px; padding:25px; height:100%; box-shadow:0 5px 15px rgba(0,0,0,0.02);">
                        <div style="display:flex; align-items:center; margin-bottom:15px;">
                            <span style="background:#95BF19; color:#fff; font-size:12px; font-weight:700; padding:2px 8px; border-radius:4px; margin-right:10px;">4</span>
                            <h5 style="color:#95BF19; margin:0; font-weight:700;">Walk Through Consultant</h5>
                        </div>
                        <p style="font-weight:600; color:#555; margin-bottom:10px;">Mint Infotech Pvt. Ltd.</p>
                        <p style="color:#777; font-size:14px; line-height:1.6; margin:0;">Plot No.828,<br>Laxmi Deep Building,<br>District Centre, Laxmi Nagar,<br>Delhi-110092</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                    <div style="background:#fff; border:1px solid #f0f0f0; border-radius:8px; padding:25px; height:100%; box-shadow:0 5px 15px rgba(0,0,0,0.02);">
                        <div style="display:flex; align-items:center; margin-bottom:15px;">
                            <span style="background:#95BF19; color:#fff; font-size:12px; font-weight:700; padding:2px 8px; border-radius:4px; margin-right:10px;">5</span>
                            <h5 style="color:#95BF19; margin:0; font-weight:700;">Model Making</h5>
                        </div>
                        <h4 style="color:#333; font-weight:700; margin-top:0; margin-bottom:5px; font-size:16px;">Mr. Brham Prakash Sharma, Director</h4>
                        <p style="font-weight:600; color:#555; margin-bottom:10px;">New Marvel Models</p>
                        <p style="color:#777; font-size:14px; line-height:1.6; margin:0;">RZ-16B, E-Block, Syndicate Enclave,<br>Janakpuri, Delhi-110045</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>