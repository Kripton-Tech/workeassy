@extends('front.layouts.app')

@section('meta')
@endsection

@section('title')
    Best Coworking space in Rajkot
@endsection

@section('styles')
    <style>
        #hero {
            background: #000 !important;
            height: auto !important;
        }

        .carousel-inner{
            max-height: 575px !important;
        }

        #coworking_space .section-header h2::before {
            width: 0 !important;
        }
        
        #workspace_options .card{
            border-radius: 8% !important;
        }
        
        #workspace_options .card img{
            border-top-right-radius: 8% !important;
            border-top-left-radius: 8% !important;
        }
    </style>
@endsection

@section('content')
<section id="hero">
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @if($sliders->isNotEmpty())
                @php $i=0; @endphp
                @foreach($sliders as $row)
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}" aria-current="{{ $i == 0 ? 'true' : '' }}" aria-label="Slide {{ $i+1 }}"></button>
                    @php $i++; @endphp
                @endforeach
            @endif
        </div>
        <div class="carousel-inner">
            @if($sliders->isNotEmpty())
                @php $i=0; @endphp
                @foreach($sliders as $row)
                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                        <img src="{{ $row->image }}" class="d-block w-100" alt="Slide {{ $i+1 }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $row->title }}</h5>
                        </div>
                    </div>
                    @php $i++; @endphp
                @endforeach
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<main id="main">
    <section id="workspace_options">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2 class="">Workspace Options</h2>
                <p class="">Choose from a variety of workspaces designed to suit an individual or a team</p>
            </div>
            <div class="row gy-4">
                @if($options->isNotEmpty())
                    @foreach($options as $row)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <img src="{{ $row->image }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $row->title ?? '' }}</h5>
                                    <p class="card-text">{{ $row->description ?? '' }}</p>
                                    <a href="{{ route('option', ['id' => base64_encode($row->id)]) }}" class="card-link">Read More...</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
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
    <script>
        var myCarousel = document.querySelector('#carousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            wrap: true,
            touch: true,
            keyboard: true
        })
    </script>
@endsection