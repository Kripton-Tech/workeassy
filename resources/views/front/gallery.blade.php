@extends('front.layouts.app')

@section('meta')
@endsection

@section('title')
    Gallery
@endsection

@section('styles')
@endsection

@section('content')
<main id="main">
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Gallery</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        @if($categories->isNotEmpty())
                            @foreach($categories as $row)
                                <li data-filter=".filter-{{ $row->id }}">{{ $row->title }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @if($data->isNotEmpty())
                    @foreach($data as $row)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $row->category_id }}">
                            <img src="{{ $row->image }}" class="img-fluid" alt="{{ $row->title }}">
                            <div class="portfolio-info">
                                <p>{{ $row->title }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
@endsection