@extends('front.layouts.app')

@section('meta')
@endsection

@section('title')
    Blog
@endsection

@section('styles')
    <style>
        .box{
            padding: 12px;
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
        }
    </style>
@endsection

@section('content')
<main id="main">
    <section id="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <h2 class="text-center fw-bold">What is Coworking?</h2>
                    <p>Coworking spaces act as hubs of productivity, community and technology offering great network connectivity and opportunities to meet others who work in a variety of industries. They can be utilised by people with full time jobs, freelance careers and even entrepreneurs who want to rent out an office space or a desk for themselves or their small staff. It can be said that coworking spaces are a halfway point between a traditional office and a non-traditional workspace giving you the comfort of working from home and combining it with the professional amenities and networking opportunities that you would find in a corporate environment. The amount of cost savings by working in a co working space is enormous compared to what you spend for a traditional office.</p>
                </div>
                <div class="col-lg-6 content pr-5 mb-5">
                    <h2 class="fw-bold">Efficiency, affordability and Flexibility</h2>
                    <p>WorkEasy Coworking Space is a Venture by Unadkat Family. We have a real estate arm named Amar Estate Agency which was established in 1980 and hotel apartments named – The Nest Service Apartments which was established in 2009.
                        Amar Estate Agency, is one of the leading real estate consultancy firm in the cities of Rajkot and Ahmedabad.
                        The Nest Service Apartment is an established provider of service apartments which provides accommodation for NRI long stay, holiday, corporate lodging, short stay, vacation rentals, relocation or extended stays.
                        We are now entering in to the foray of Coworking spaces under the able gaidance and foresight of Late Shri Parsottambhai Unadkat and his sons, Mr. Ashwin, Mr. Deepak, Mr. Amit & Mr. Ashish.
                    </p>
                </div>
                <div class="col-lg-6 about-img mb-5">
                    <img src="{{ asset('frontend/img/blog/blog-header.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="p-5" style="background-color: #e1e1e1;" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <h2 class="text-center fw-bold">Why you should work in a coworking space?</h2>
                        <p>Imagine working in a space which is tastefully designed and draped in office plants, brainy quotes and elegant interior design. Sounds too good to be true right?</p>
                        <p>That’s exactly what you get when you choose to work at Workeasy instead of mainstream offices. And you know what the cherry on top of the cake is? It’s way more flexible and affordable than anything you have heard of.</p>
                        <p class="text-center m-0">So, let’s look at some of the benefits of working at a coworking space:</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5" data-aos="fade-up">
            <div class="row">
                <div class="accordion accordion-flush" id="accordion">
                    @if($data->isNotEmpty())
                        @php $i = 1; @endphp
                        @foreach($data as $row)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading{{ $i }}">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $i }}" aria-expanded="{{ $i == 1 ? true : false }}" aria-controls="flush-collapse{{ $i }}">
                                        {{ $row->title }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{ $i }}" class="accordion-collapse collapse {{ $i == 1 ? 'show' : '' }}" aria-labelledby="flush-heading{{ $i }}" data-bs-parent="#accordion">
                                    <div class="accordion-body">{{ $row->description }}</div>
                                </div>
                            </div>
                            @php $i++; @endphp
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="m-5" style="background-image: linear-gradient(rgba(255,255,255,85%), rgba(255,255,255,85%)), url('{{ asset("frontend/img/blog/blog-header.png") }}');" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <h2 class="text-center fw-bold">Who is it for?</h2>
                        <p>Coworking is absolutely the right choice for you if you are an entrepreneur, free-lancer, seasoned businessman, an established company or a start-up.</p>
                        <p class="text-center">This is a list of professionals who can make the best use of coworking space to grow their presence:</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row mt-5">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        @php 
                            $array = [
                                'Architect',
                                'Financial advisor',
                                'Real estate developer',
                                'Editor',
                                'Interior designer',
                                'Writer',
                                'Real estate agent',
                                'Counsellor',
                                'Web developer',
                                'Artist',
                                'Marketing professional',
                                'Civil engineer',
                                'Software engineer',
                                'Photographer',
                                'Social media influencer',
                                'Psychologists',
                                'Chartered accountant',
                                'Videographer',
                                'Lawyer',
                                'Nutritionists',
                                'Banker',
                                'Gifting professional',
                                'Financer'
                            ];  
                        @endphp
                        @foreach($array as $row)
                            <div class="col-lg-3 p-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                <div class="box d-flex flex-column align-items-center">
                                    <h4 class="title text-center">{{ $row }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-12">
                            <p>basically, this place is for anyone who wants to build or grow professionally while also connecting and collaborating with co-workers from a variety of fields.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <h2 class="text-center fw-bold">Comparing Traditional Offices VS Coworking Space</h2>
                            <p>Whether you are a businessman, entrepreneur, freelancer or a remote worker, you have got two choices at hand when looking for a physical working space. Renting/buying a traditional office or rent a desk or private office in a coworking space.</p>
                            <p class="text-center m-0">What would you do? Let us take you through a cost comparison to give you a better idea.</p>
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