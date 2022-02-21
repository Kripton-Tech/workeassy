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

        #workspace_options .card-text{
            min-height: 100px; !important;
            max-height: 180px; !important;
        }
        
        #workspace_options .card img{
            border-top-right-radius: 8% !important;
            border-top-left-radius: 8% !important;
        }

        #approch .box{
            padding: 40px;
            box-shadow: 10px 10px 15px rgb(73 78 92 / 10%);
            background: #fff;
            transition: 0.4s;
            height: 100%;
        }

        #approch .box:hover {
            box-shadow: 0px 0px 30px rgb(73 78 92 / 15%);
            transform: translateY(-10px);
            -webkit-transform: translateY(-10px);
            -moz-transform: translateY(-10px);
        }

        #approch .box .icon i {
            color: #444;
            font-size: 64px;
            transition: 0.5s;
            line-height: 0;
            margin-top: 34px;
        }

        #approch .box h4 {
            font-weight: 700;
            font-size: 20px;
            margin: 0 !important;
        }
    </style>

    <style>
        #testimonial .card-main {
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px 0px #283593
        }

        #testimonial .card-0 {
            color: #fff;
            background-color: #0056b3;
            position: relative;
            margin-left: 70px;
            border-radius: 10px;
            min-height: 312px
        }

        #testimonial .carousel-indicators li {
            cursor: pointer;
            border-radius: 50% !important;
            width: 10px;
            height: 10px
        }

        #testimonial .profile {
            color: #000;
            background-color: #51d8af;
            position: absolute;
            left: -70px;
            top: 17%;
            border-radius: 8px;
            border-top-left-radius: 0px;
            border-bottom-right-radius: 0px
        }

        #testimonial .profile-pic {
            width: 120px;
            height: 120px;
            border-bottom-left-radius: 10px;
            border-top-right-radius: 10px
        }

        #testimonial .open-quotes {
            margin-left: 130px;
            margin-top: 100px
        }

        #testimonial .content {
            margin-left: 150px;
            margin-right: 80px
        }

        #testimonial .close-quotes {
            margin-bottom: 100px;
            margin-right: 60px
        }

        @media screen and (max-width: 600px) {
            #testimonial .card-main {
                padding: 20px 10px
            }

            #testimonial .card-0 {
                min-height: 432px
            }

            #testimonial .profile {
                top: 24%
            }

            #testimonial .profile-pic {
                width: 90px;
                height: 90px
            }

            #testimonial .open-quotes {
                margin-left: 100px
            }

            #testimonial .content {
                margin-left: 120px;
                margin-right: 50px
            }

            #testimonial .close-quotes {
                margin-right: 30px
            }
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
                        <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <img src="{{ $row->image }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $row->title ?? '' }}</h5>
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
    <section id="approch">
        <div data-aos="fade-up">
            <div class="section-header">
               <h1 class="text-center">APPROACH TOWARDS THE PANDEMIC</h1>
            </div>
            <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper align-items-center">
                    @if($towards->isNotEmpty())
                        @foreach($towards as $row)
                            <div class="swiper-slide">
                                <img src="{{ $row->image }}" class="img-fluid" alt="{{ $row->title }}">
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section id="about" class="container">
        <div class="row gy-4">
            @if($abouts->isNotEmpty())
                @foreach($abouts as $row)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="{{ $row->image }}" style="max-height: 250px; min-height: 250px;" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $row->title ?? '' }}</h5>
                                <p class="card-text">{{ $row->description ?? '' }}</p>
                                <a href="{{ route('about') }}" class="card-link">Read More...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <section id="testimonial">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
               <h2>Testimonial</h2>
            </div>
            <div class="container-fluid m-0 p-0">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 col-lg-12 col-xl-12">
                        <div class="card card-main border-0 text-center">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @if($testimonials->isNotEmpty())
                                        @php $i = 0; @endphp
                                        @foreach($testimonials as $row)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
                                            @php $i++; @endphp
                                        @endforeach
                                    @endif
                                </ol>
                                <div class="carousel-inner">
                                    @if($testimonials->isNotEmpty())
                                        @php $i = 0; @endphp
                                        @foreach($testimonials as $row)
                                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                <div class="card border-0 card-0">
                                                    <div class="card profile py-3 px-4">
                                                        <div class="text-center"> 
                                                            <img src="{{ $row->image }}" class="img-fluid profile-pic"> 
                                                        </div>
                                                        <h6 class="mb-0 mt-2">{{ $row->name }}</h6> 
                                                        <small>{{ $row->title }}</small>
                                                    </div> 
                                                    <img class="img-fluid open-quotes" src="{{ asset('frontend/img/left-quote.png') }}" width="20" height="20">
                                                    <p class="content mb-0">{{ $row->description }}</p> 
                                                    <img class="img-fluid close-quotes ml-auto" src="{{ asset('frontend/img/right-quote.png') }}" width="20" height="20">
                                                </div>
                                            </div>
                                        @php $i++; @endphp
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Contact Us</h2>
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