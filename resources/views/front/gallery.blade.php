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
    <section class="container">
        <div class="row">
            @if($data->isNotEmpty())
                @foreach($data as $row)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-3">
                        <img src="{{ $row->image }}" style="min-height:260px; max-height:260px; border-radius: 7%" class="fluid img-thumbnail" alt="Gallery">
                    </div>
                @endforeach
            @endif
        </div>
    </section>
</main>
@endsection

@section('scripts')
@endsection