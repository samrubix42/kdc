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
  <main class="page-header-3">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="title-hr"></div>
        </div>
        <div class="col-md-8 col-lg-6">
          <h1>Enjoy Coffee With Us</h1>
        </div>
      </div>
    </div>
  </main>

  <div class="content">
    <div>
      <iframe id="map" class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.9792507989614!2d77.31764017306799!3d28.60039927568221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce570956bdb5f%3A0x7be2be2480166be2!2sVardhman%20sunrise%20plaza%2C%20Vasundhra%20Enclave%2CDelhi!5e0!3m2!1sen!2sin!4v1773292215251!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="page-inner">
      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="section-info">
                <div class="title-hr"></div>
                <div class="info-title">Keep in touch</div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="row-contact row">
                <div class="col-contact col-lg-6">
                  <h3 class="contact-title contact-top">New Delhi, <span>India</span></h3>
                  <p class="contact-address text-muted"><strong>KACHROO DESIGN CONSULTANTS (P) LTD.</strong><br>Regd. Office<br>341, 3rd Floor, Vardhman Sunrise Plaza,<br>Plot No.1, LSC, Vasundhara Enclave,<br>New Delhi-110 096, India</p>
                  <p class="contact-row"><strong class="text-dark">Email:</strong> kdc.search@gmail.com</p>
                  <p class="contact-row"><strong class="text-dark">Email:</strong> search@kdcteam.com</p>
                </div>
                <div class="col-contact col-lg-6">
                  <p class="contact-top"><strong class="text-muted">Studio</strong></p>
                  <p class="contact-address text-muted"><strong>B-71, Sector-64,<br>Noida-201301, U.P.</strong></p>
                  <p class="contact-row"><strong class="text-dark">Call directly:</strong></p>
                  <p class="phone-lg text-dark">+91 120 4121525</p>
                  <p class="phone-lg text-dark">+91 7503123111</p>
                  <p class="phone-lg text-dark">+91 9811506001</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-message section">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="section-info">
                <div class="title-hr"></div>
                <div class="info-title">You need help</div>
              </div>
            </div>
            <div class="col-md-9">
              <form wire:submit="submit">
                <div class="row">
                  <div class="form-group col-sm-6 col-lg-4">
                    <input class="input-gray" type="text" wire:model.live="name" required placeholder="Name*">
                    @error('name') <span class="error-message" style="display:block;">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group col-sm-6 col-lg-4">
                    <input class="input-gray" type="email" wire:model.live="email" placeholder="Email">
                    @error('email') <span class="error-message" style="display:block;">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group col-sm-6 col-lg-4">
                    <input class="input-gray" type="text" wire:model.live="phone" placeholder="Phone">
                    @error('phone') <span class="error-message" style="display:block;">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group col-sm-12 col-lg-4">
                    <input class="input-gray" type="text" wire:model.live="subject" placeholder="Subject (Optional)">
                    @error('subject') <span class="error-message" style="display:block;">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group col-sm-12">
                    <textarea class="input-gray" wire:model.live="message" required placeholder="Message*"></textarea>
                    @error('message') <span class="error-message" style="display:block;">{{ $message }}</span> @enderror
                  </div>
                  <div class="col-sm-12">
                    <button type="submit" class="btn-upper btn-yellow btn" wire:loading.attr="disabled">
                      <span wire:loading.remove wire:target="submit">Send Message</span>
                      <span wire:loading wire:target="submit">Sending...</span>
                    </button>
                  </div>
                </div>
                @if (session('success'))
                <div class="success-message" style="display:block;"><i class="fa fa-check text-primary"></i> {{ session('success') }}</div>
                @endif
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
