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
        @import url("https://fonts.googleapis.com/css2?family=Shippori+Antique&display=swap");
        #testimonial .content-wrapper {
            height: 100%;
            width: 70%;
            max-width: 100rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-bottom: 5rem;
        }
        #testimonial h1 {
            margin-bottom: calc(0.7rem + 0.5vmin);
            font-size: calc(2.3rem + 1vmin);
        }
        #testimonial .blue-line {
            height: 0.3rem;
            width: 6rem;
            background-color: rgb(79, 143, 226);
            margin-bottom: calc(3rem + 2vmin);
        }
        #testimonial .wrapper-for-arrows {
            position: relative;
            width: 70%;
            border-radius: 2rem;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            overflow: hidden;
            display: grid;
            place-items: center;
        }
        #testimonial .review-wrap {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: calc(2rem + 1vmin);
            width: 100%;
        }
        #testimonial #imgDiv {
            border-radius: 50%;
            width: calc(6rem + 4vmin);
            height: calc(6rem + 4vmin);
            position: relative;
            box-shadow: 5px -3px rgb(79, 143, 226);
            background-size: cover;
            margin-bottom: calc(0.7rem + 0.5vmin);
        }
        #testimonial .chicken {
            background-image: url("https://media0.giphy.com/media/A8Cdznswn5vnG/200w.gif?cid=790b7611e8c5980ee7141bc18ec12c49962b871eb404ba5b&rid=200w.gif&ct=s");
            width: 200px;
            height: 250px;
            position: absolute;
            top: 12%;
        }
        #testimonial #imgDiv::after {
            content: "''";
            font-size: calc(2rem + 2vmin);
            font-family: sans-serif;
            line-height: 150%;
            color: #fff;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background-color: rgb(79, 143, 226);
            position: absolute;
            top: 10%;
            left: -10%;
            width: calc(2rem + 2vmin);
            height: calc(2rem + 2vmin);
        }
        #testimonial #personName {
            margin-bottom: calc(0.7rem + 0.5vmin);
            font-size: calc(1rem + 0.5vmin);
            letter-spacing: calc(0.1rem + 0.1vmin);
            font-weight: bold;
        }
        #testimonial #profession {
            font-size: calc(0.8rem + 0.3vmin);
            margin-bottom: calc(0.7rem + 0.5vmin);
            color: rgb(79, 143, 226);
        }
        #testimonial #description {
            font-size: calc(0.8rem + 0.3vmin);
            width: 70%;
            max-width: 40rem;
            text-align: center;
            margin-bottom: calc(1.4rem + 1vmin);
            color: rgb(92, 92, 92);
            line-height: 2rem;
        }
        #testimonial .arrow-wrap {
            position: absolute;
            top: 50%;
        }
        #testimonial .arrow {
            width: calc(1.4rem + 0.6vmin);
            height: calc(1.4rem + 0.6vmin);
            border: solid rgb(79, 143, 226);
            border-width: 0 calc(0.5rem + 0.2vmin) calc(0.5rem + 0.2vmin) 0;
            cursor: pointer;
            transition: transform 0.3s;
        }
        #testimonial .arrow:hover {
            transition: 0.3s;
            transform: scale(1.15);
        }
        #testimonial .left-arrow-wrap {
            left: 5%;
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
        }
        #testimonial .right-arrow-wrap {
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
            right: 5%;
        }
        #testimonial .surprise-me-btn {
            border: 2px solid rgb(79, 143, 226);
            background-color: rgb(224, 238, 255);
            color: rgb(79, 143, 226);
            border-radius: 2rem;
            padding: calc(0.5rem + 0.2vmin) 0;
            width: calc(7rem + 5vmin);
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            cursor: pointer;
            margin-bottom: calc(1.4rem + 1vmin);
        }
        #testimonial .surprise-me-btn:hover {
            transition: background-color 0.3s, transform 0.3s;
            background-color: rgb(255, 255, 255);
            transform: rotate(5deg);
        }
        #testimonial .move-head {
            animation: moveHead 1.55s infinite;
            animation-delay: -0.8s;
        }
        #testimonial .hide-chicken-btn {
            border: 2px solid rgb(226, 89, 79);
            background-color: rgb(255, 224, 224);
            color: rgb(226, 79, 79);
            border-radius: 2rem;
            padding: calc(0.5rem + 0.2vmin) 0;
            width: calc(10rem + 5vmin);
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            cursor: pointer;
            margin-bottom: calc(1.4rem + 1vmin);
        }
        #testimonial .hide-chicken-btn:hover {
            transition: background-color 0.3s, transform 0.3s;
            background-color: rgb(255, 255, 255);
            transform: rotate(5deg);
        }
        @keyframes moveHead {
            0% {
            }
            25% {
                transform: translate(0.5rem, 1rem) rotate(5deg);
            }
            100% {
                transform: translate(0, 0) rotate(-5deg);
            }
        }
        @media screen and (max-width: 900px) {
            #testimonial .content-wrapper {
                width: 100%;
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
    <section id="clients">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Clients</h2>
            </div>
            <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper align-items-center">
                    @for($i = 1; $i <= 8; $i++)
                        <div class="swiper-slide">
                            <img src='{{ asset("frontend/img/clients/client-$i.png") }}' class="img-fluid" alt="client-{{ $i }}">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
    <section id="testimonial">
        <div class="container" data-aos="fade-up">
            <div class="section-header text-center">
                <h1>Our Reviews</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="wrapper-for-arrows">
                    <div style="opacity: 0;" class="chicken"></div>
                    <div id="reviewWrap" class="review-wrap">
                        <div id="imgDiv" class=""></div>
                        <div id="personName"></div>
                        <div id="profession"></div>
                        <div id="description"></div>
                    </div>
                    <div class="left-arrow-wrap arrow-wrap">
                        <div class="arrow" id="leftArrow"></div>
                    </div>
                    <div class="right-arrow-wrap arrow-wrap">
                        <div class="arrow" id="rightArrow"></div>
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
<?php
    $peoples = [];
    $testimonials_i = 0;
    
    if($testimonials->isNotEmpty()){
        foreach($testimonials as $row){
            $object = [
                'photo' => 'url("'.$row->image.'")', 
                'name' => $row->name, 
                'profession' => $row->title, 
                'description' => $row->description
            ];

            $peoples[] = $object;
            $testimonials_i++;
        }
    }
?>
@endsection

@section('scripts')
    <script src="{{ asset('frontend/js/gsap.3.9.1.js') }}"></script>
    
    <script>
        const reviewWrap = document.getElementById("reviewWrap");
        const leftArrow = document.getElementById("leftArrow");
        const rightArrow = document.getElementById("rightArrow");
        const imgDiv = document.getElementById("imgDiv");
        const personName = document.getElementById("personName");
        const profession = document.getElementById("profession");
        const description = document.getElementById("description");

        let people = <?php echo json_encode($peoples); ?>;
        
        imgDiv.style.backgroundImage = people[0].photo;
        personName.innerText = people[0].name;
        profession.innerText = people[0].profession;
        description.innerText = people[0].description;
        let currentPerson = 0;

        //Select the side where you want to slide
        function slide(whichSide, personNumber) {
            let reviewWrapWidth = reviewWrap.offsetWidth + "px";
            let descriptionHeight = description.offsetHeight + "px";
            //(+ or -)
            let side1symbol = whichSide === "left" ? "" : "-";
            let side2symbol = whichSide === "left" ? "-" : "";

            let tl = gsap.timeline();

            tl.to(reviewWrap, {
                duration: 0.4,
                opacity: 0,
                translateX: `${side1symbol + reviewWrapWidth}`
            });

            tl.to(reviewWrap, {
                duration: 0,
                translateX: `${side2symbol + reviewWrapWidth}`
            });

            setTimeout(() => {
                imgDiv.style.backgroundImage = people[personNumber].photo;
            }, 400);
            setTimeout(() => {
                description.style.height = descriptionHeight;
            }, 400);
            setTimeout(() => {
                personName.innerText = people[personNumber].name;
            }, 400);
            setTimeout(() => {
                profession.innerText = people[personNumber].profession;
            }, 400);
            setTimeout(() => {
                description.innerText = people[personNumber].description;
            }, 400);

            tl.to(reviewWrap, {
                duration: 0.4,
                opacity: 1,
                translateX: 0
            });
        }

        function setNextCardLeft() {
            if (currentPerson === "{{ $testimonials_i - 1 }}") {
                currentPerson = 0;
                slide("left", currentPerson);
            } else {
                currentPerson++;
            }

            slide("left", currentPerson);
        }

        function setNextCardRight() {
            if (currentPerson === 0) {
                currentPerson = "{{ $testimonials_i - 1 }}";
                slide("right", currentPerson);
            } else {
                currentPerson--;
            }

            slide("right", currentPerson);
        }

        leftArrow.addEventListener("click", setNextCardLeft);
        rightArrow.addEventListener("click", setNextCardRight);

        window.addEventListener("resize", () => {
            description.style.height = "100%";
        });
    </script>

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