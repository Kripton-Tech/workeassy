@extends('admin.layouts.app')

@section('meta')
@endsection

@section('title')
    Dashboard
@endsection

@section('styles')
<link href="{{ asset('backend/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ol>   
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card-group">
            <div class="card border-right">
                <!-- <a href="">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center justify-content-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $data['categories'] ?? 0 }}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Categories</h6>
                            </div>
                        </div>
                    </div>
                </a> -->
            </div>
            <div class="card border-right">
                <!-- <a href="">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center justify-content-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $data['blogs'] ?? 0 }}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Blogs</h6>
                            </div>
                        </div>
                    </div>
                </a> -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection