<?php

use App\Models\Contact;
use Livewire\Component;

new class extends Component
{
  public string $name = '';
  public string $email = '';
  public string $phone = '';
  public string $subject = '';
  public string $message = '';

  protected function rules(): array
  {
    return [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['nullable', 'email', 'max:255'],
      'phone' => ['nullable', 'string', 'max:30'],
      'subject' => ['nullable', 'string', 'max:255'],
      'message' => ['required', 'string', 'max:5000'],
    ];
  }

  public function submit(): void
  {
    $data = $this->validate();

    Contact::create([
      'name' => $data['name'],
      'email' => $data['email'] ?: null,
      'phone' => $data['phone'] ?: null,
      'subject' => $data['subject'] ?: null,
      'message' => $data['message'],
      'is_read' => false,
    ]);

    $this->reset(['name', 'email', 'phone', 'subject', 'message']);
    session()->flash('success', 'Thank you. Your message has been sent successfully.');
  }
};
?>
@section('meta_title', 'Contact | KDC Consultants')
@section('meta_description', 'Contact KDC Consultants for architecture, interiors, planning, and project management services in Delhi NCR and beyond.')
@section('meta_keywords', 'contact KDC Consultants, architecture consultation, interior design consultation, project planning Delhi NCR')

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
                    <h1 style="color: #95BF19; font-size: 48px; font-weight: 300; margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; letter-spacing: 1px; line-height: 1.15;">Get In Touch</h1>
                    <div class="breadcrumb" style="background:transparent; padding:0; margin: 20px 0 0;">
                        <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.7); font-size: 15px; text-decoration: none;">Home</a>
                        <span style="margin: 0 10px; color:rgba(255,255,255,0.4);">/</span>
                        <span style="color: #fff; font-size: 15px;">Contact Us</span>
                    </div>
                </div>
                
                <!-- Right Hero Image placeholder -->
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                     <img src="{{ asset('building/19112.jpg') }}" alt="Contact KDC" style="max-width: 100%; max-height: 250px; border-radius: 8px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: 4px solid #fff; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Content -->
    <div class="content" style="background-color: #f9f9f9; padding: 60px 0 0;">
        <section class="section">
            <div class="container">
                <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 40px;">
                
                    <!-- Left: Contact Info Boxes -->
                    <div class="col-md-4 col-sm-12" style="margin-bottom: 40px;">
                        <h2 class="section-title" style="color: #1a4276; font-weight: 700; margin-bottom: 20px; font-size: 32px;">Reach out</h2>
                        <div style="width: 50px; height: 3px; background: #95BF19; margin-bottom: 30px;"></div>
                        
                        <div style="background: #fff; padding: 25px; border-radius: 8px; border: 1px solid #eaedf0; margin-bottom: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                            <h4 style="color: #95BF19; margin-top: 0; font-weight: 600; font-size: 17px;"><i class="ion-ios-location" style="margin-right: 8px; font-size: 20px;"></i> Regd. Office (New Delhi)</h4>
                            <p style="color: #666; font-size: 14.5px; margin-bottom: 0; line-height: 1.6;"><strong>KACHROO DESIGN CONSULTANTS (P) LTD.</strong><br>341, 3rd Floor, Vardhman Sunrise Plaza,<br>Plot No.1, LSC, Vasundhara Enclave,<br>New Delhi-110 096, India</p>
                        </div>
                        
                        <div style="background: #fff; padding: 25px; border-radius: 8px; border: 1px solid #eaedf0; margin-bottom: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                            <h4 style="color: #95BF19; margin-top: 0; font-weight: 600; font-size: 17px;"><i class="ion-ios-home" style="margin-right: 8px; font-size: 20px;"></i> Studio (Noida)</h4>
                            <p style="color: #666; font-size: 14.5px; margin-bottom: 0; line-height: 1.6;"><strong>B-71, Sector-64,</strong><br>Noida-201301, U.P.</p>
                        </div>
                        
                        <div style="background: #1a4276; padding: 25px; border-radius: 8px; color: #fff; box-shadow: 0 10px 30px rgba(26,66,118,0.15);">
                            <h4 style="color: #fff; margin-top: 0; font-weight: 600; font-size: 17px;"><i class="ion-ios-telephone" style="margin-right: 8px; font-size: 20px;"></i> Contact Details</h4>
                            <p style="color: rgba(255,255,255,0.85); font-size: 14.5px; line-height: 1.7; margin-bottom: 12px;">
                                <strong>Emails:</strong><br>
                                <a href="mailto:kdc.search@gmail.com" style="color: #cee002;">kdc.search@gmail.com</a><br>
                                <a href="mailto:search@kdcteam.com" style="color: #cee002;">search@kdcteam.com</a>
                            </p>
                            <p style="color: rgba(255,255,255,0.85); font-size: 14.5px; line-height: 1.7; margin-bottom: 0;">
                                <strong>Phones:</strong><br>
                                +91 120 4121525<br>
                                +91 750 3123 111<br>
                                +91 981 1506 001
                            </p>
                        </div>
                    </div>

                    <!-- Right: Contact Form -->
                    <div class="col-md-8 col-sm-12">
                        <div style="background: #fff; padding: 40px; border-radius: 8px; border: 1px solid #eaedf0; box-shadow: 0 15px 40px rgba(0,0,0,0.04);">
                            <h3 style="color: #1a4276; font-weight: 700; margin-top: 0; margin-bottom: 25px;">Send Us A Message</h3>
                            <form wire:submit="submit">
                                <div class="row">
                                    <div class="form-group col-sm-6" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; font-size: 13.5px; margin-bottom: 8px;">Name *</label>
                                        <input class="form-control" type="text" wire:model.live="name" required style="border-radius: 4px; border: 1px solid #ddd; padding: 10px 15px; height: 46px; background: #fafafa; font-size: 15px; box-shadow: none;">
                                        @error('name') <span class="text-danger" style="display:block; margin-top: 5px; font-size: 13px;">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-6" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; font-size: 13.5px; margin-bottom: 8px;">Email *</label>
                                        <input class="form-control" type="email" wire:model.live="email" style="border-radius: 4px; border: 1px solid #ddd; padding: 10px 15px; height: 46px; background: #fafafa; font-size: 15px; box-shadow: none;">
                                        @error('email') <span class="text-danger" style="display:block; margin-top: 5px; font-size: 13px;">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-6" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; font-size: 13.5px; margin-bottom: 8px;">Phone</label>
                                        <input class="form-control" type="text" wire:model.live="phone" style="border-radius: 4px; border: 1px solid #ddd; padding: 10px 15px; height: 46px; background: #fafafa; font-size: 15px; box-shadow: none;">
                                        @error('phone') <span class="text-danger" style="display:block; margin-top: 5px; font-size: 13px;">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-6" style="margin-bottom: 20px;">
                                        <label style="font-weight: 600; color: #555; font-size: 13.5px; margin-bottom: 8px;">Subject</label>
                                        <input class="form-control" type="text" wire:model.live="subject" style="border-radius: 4px; border: 1px solid #ddd; padding: 10px 15px; height: 46px; background: #fafafa; font-size: 15px; box-shadow: none;">
                                        @error('subject') <span class="text-danger" style="display:block; margin-top: 5px; font-size: 13px;">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-12" style="margin-bottom: 25px;">
                                        <label style="font-weight: 600; color: #555; font-size: 13.5px; margin-bottom: 8px;">Message *</label>
                                        <textarea class="form-control" wire:model.live="message" required rows="6" style="border-radius: 4px; border: 1px solid #ddd; padding: 15px; background: #fafafa; font-size: 15px; resize: vertical; box-shadow: none;"></textarea>
                                        @error('message') <span class="text-danger" style="display:block; margin-top: 5px; font-size: 13px;">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn" wire:loading.attr="disabled" style="background: #95BF19; color: #fff; font-weight: 600; padding: 12px 35px; border-radius: 4px; border: none; font-size: 16px; transition: background 0.3s ease; text-transform: uppercase; letter-spacing: 0.5px;">
                                            <span wire:loading.remove wire:target="submit">Send Message</span>
                                            <span wire:loading wire:target="submit">Sending...</span>
                                        </button>
                                    </div>
                                </div>
                                @if (session('success'))
                                <div style="margin-top: 25px; padding: 15px; background: #e8f5e9; color: #2e7d32; border-radius: 4px; border-left: 4px solid #4caf50; font-weight: 500;">
                                    <i class="fa fa-check-circle" style="margin-right: 8px;"></i> {{ session('success') }}
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Map Full Width -->
        <div style="border-top: 5px solid #cee002;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.9792507989614!2d77.31764017306799!3d28.60039927568221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce570956bdb5f%3A0x7be2be2480166be2!2sVardhman%20sunrise%20plaza%2C%20Vasundhra%20Enclave%2CDelhi!5e0!3m2!1sen!2sin!4v1773292215251!5m2!1sen!2sin" width="100%" height="450" style="border:0; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
