@extends('front.layouts.app')

@section('meta')
@endsection

@section('title')
    {{ $data->title ?? '' }}
@endsection

@section('styles')
    <style>
        .about-img img{
            max-width: inherit !important;
        }

        .box{
            padding: 40px;
            box-shadow: 10px 10px 15px rgb(73 78 92 / 10%);
            background: #fff;
            transition: 0.4s;
            height: 100%;
        }

        .box:hover {
            box-shadow: 0px 0px 30px rgb(73 78 92 / 15%);
            transform: translateY(-10px);
            -webkit-transform: translateY(-10px);
            -moz-transform: translateY(-10px);
        }

         .box .icon i {
            color: #444;
            font-size: 64px;
            transition: 0.5s;
            line-height: 0;
            margin-top: 34px;
        }

        .box h4 {
            font-weight: 700;
            font-size: 20px;
            margin: 0 !important;
            /* margin-left: 10px !important; */
        }
    </style>
@endsection

@section('content')
<main id="main">
    <section id="option">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="row my-5">
                <div class="col-lg-6 about-img">
                    <img src="{{ $data->image }}" alt="">
                </div>
                <div class="col-lg-6 content p-5">
                    <h2>{{ $data->title ?? '' }}</h2>
                    <p>{{ $data->sub_title ?? '' }}</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary mt-5">Book Now</a>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-6 content p-5">
                    <p>{{ $data->description ?? '' }}</p>
                </div>
                <div class="col-lg-6 about-img">
                    <img src="{{ $data->cover_image }}" alt="">
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-12">
                    <h1 class="text-center">Not just the basics, a plethora of amenities made available at Conference room!</h1>
                </div>
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-3 p-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="box d-flex flex-column align-items-center">
                                <div class="icon text-center"><i class='bx bxs-phone-call'></i></div>
                                <h4 class="title text-center">Reception</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 p-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="box d-flex flex-column align-items-center">
                                <div class="icon text-center"><i class='bx bx-wifi'></i></div>
                                <h4 class="title text-center">Internet & wifi</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 p-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="box d-flex flex-column align-items-center">
                                <div class="icon text-center"><i class='bx bxs-video'></i></div>
                                <h4 class="title text-center">Boardrooms</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 p-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="box d-flex flex-column align-items-center">
                                <div class="icon text-center"><i class='bx bxs-printer'></i></div>
                                <h4 class="title text-center">Photocopy & printing</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 p-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="box d-flex flex-column align-items-center">
                                <div class="icon text-center"><i class="bx bxs-briefcase-alt-2"></i></div>
                                <h4 class="title text-center">Meeting Room</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 p-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="box d-flex flex-column align-items-center">
                                <div class="icon text-center"><i class='bx bxs-drink'></i></div>
                                <h4 class="title text-center">Tea & coffee</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 p-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="box d-flex flex-column align-items-center">
                                <div class="icon text-center"><i class='bx bxs-calendar'></i></div>
                                <h4 class="title text-center">Networking events</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
@endsection