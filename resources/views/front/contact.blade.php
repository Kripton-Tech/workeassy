@extends('front.layouts.app')

@section('meta')
@endsection

@section('title')
Contact US
@endsection

@section('styles')
@endsection

@section('content')
<main id="main">
<section id="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Contact Us</h2>
                <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet
                    veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute
                    nulla ipsum velit export irure minim illum fore</p>
            </div>
            <div class="row contact-info">
                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <address>{!! _settings('CONTACT_ADDRESS') !!}</address>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="bi bi-phone"></i>
                        <h3>Phone Number</h3>
                        <p><a href="tel:{{ _settings('CONTACT_NUMBER') }}">{{ _settings('CONTACT_NUMBER') }}</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="bi bi-envelope"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:{{ _settings('CONTACT_EMAIL') }}">{{ _settings('CONTACT_EMAIL') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-4">
            <iframe src="{!! _settings('LOCATION') !!}" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="container">
            <div class="form">
                <form action="{{ route('contactus') }}" method="post" role="form" class="php-email-form" name="contact" id="contact" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" id="name" class="form-control input" placeholder="Your Name">
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" name="email" id="email" class="form-control input" placeholder="Your Email">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" name="subject" id="subject" class="form-control input" placeholder="Subject">
                    </div>
                    <div class="form-group mt-3">
                        <textarea name="message" id="message" class="form-control input" rows="5" placeholder="Message"></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button id="form-submit" type="submit">Send Message</button></div>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
@endsection