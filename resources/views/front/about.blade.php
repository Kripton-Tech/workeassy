@extends('front.layouts.app')

@section('meta')
@endsection

@section('title')
About
@endsection

@section('styles')
@endsection

@section('content')
<main id="main">
    <section id="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <h2 class="text-center fw-bold">WorkEasy Coworking Space is a Venture by Unadkat Family.</h2>
                </div>
                <div class="col-lg-6 about-img mb-5">
                    <img src="{{ asset('frontend/img/about/family.jpg') }}" alt="">
                </div>
                <div class="col-lg-6 content px-5 mb-5">
                    <p>WorkEasy Coworking Space is a Venture by Unadkat Family. We have a real estate arm named Amar Estate Agency which was established in 1980 and hotel apartments named – The Nest Service Apartments which was established in 2009.
                        Amar Estate Agency, is one of the leading real estate consultancy firm in the cities of Rajkot and Ahmedabad.
                        The Nest Service Apartment is an established provider of service apartments which provides accommodation for NRI long stay, holiday, corporate lodging, short stay, vacation rentals, relocation or extended stays.
                        We are now entering in to the foray of Coworking spaces under the able gaidance and foresight of Late Shri Parsottambhai Unadkat and his sons, Mr. Ashwin, Mr. Deepak, Mr. Amit & Mr. Ashish.
                    </p>
                </div>
                <div class="col-lg-6 content px-5 mb-5">
                    <p>The 3rd generation of the family Pavak, Tapan, Varad, Manshree and Devansh believes in modern day entrepreneurship and providing value to the customers every step of the way. We have always brought something unique to the city of Rajkot with starts ups like The Waffling Station (waffles food truck), Rajkot Social (cafe) and Pukka Media (media agency). Now we continue our journey with Workeasy.</p>
                </div>
                <div class="col-lg-6 about-img mb-5">
                    <img src="{{ asset('frontend/img/about/family-1.jpg') }}" alt="">
                </div>
                @if($data->isNotEmpty())
                    @php $is_check = 1; @endphp
                    @foreach($data as $row)
                        <hr>
                        @if($is_check == 1)
                            <div class="col-lg-6 about-img mb-5 mt-5 text-center">
                                <img src="{{ $row->image }}" alt="">
                            </div>
                            <div class="col-lg-6 content px-5 mb-5 mt-5">
                                <p>{{ $row->description }}</p>
                            </div>
                        @else
                            <div class="col-lg-6 content px-5 mb-5 mt-5">
                                <p>{{ $row->description }}</p>
                            </div>
                            <div class="col-lg-6 about-img mb-5 mt-5 text-center">
                                <img src="{{ $row->image }}" alt="">
                            </div>
                        @endif
                        @php $is_check == 1 ? $is_check = 0 : $is_check = 1; @endphp
                    @endforeach
                @endif
            </div>
        </div>
    </section>    
</main>
@endsection

@section('scripts')
@endsection