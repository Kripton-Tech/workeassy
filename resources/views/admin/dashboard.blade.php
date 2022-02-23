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
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning {{ auth()->user()->name }}!</h3>
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
    <!-- <div class="container-fluid">
        <div class="card-group">
            <div class="card border-right">
                <a href="">
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
                </a>
            </div>
            <div class="card border-right">
                <a href="">
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
                </a>
            </div>
        </div>
    </div> -->
    <div class="container-fluid row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">Unread Contactus</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap v-middle mb-0">
                            <thead>
                                <tr class="border-0">
                                    <th class="border-0 font-14 font-weight-medium text-muted">Sr. No</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted">Name</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted">Email</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted">Subject</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data['contactus']->isNotEmpty())
                                    @php $i = 1; @endphp
                                    @foreach($data['contactus'] as $row)
                                        <tr>
                                            <td class="border-top-0">{{ $i }}</td>
                                            <td class="border-top-0">{{ $row->name }}</td>
                                            <td class="border-top-0">{{ $row->email }}</td>
                                            <td class="border-top-0">{{ $row->subject }}</td>
                                            <td class="border-top-0">{{ $row->message }}</td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            <h4 class="text-center">No Unread Contact</h4>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection