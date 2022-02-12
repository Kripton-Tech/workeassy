@extends('admin.layouts.app')

@section('meta')
@endsection

@section('title')
View Contact US
@endsection

@section('styles')
@endsection

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Contact US</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.contact') }}" class="text-muted">Contact US</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Name :</label>
                            <div class="col-sm-10 col-form-label">
                                {{ $data->name ?? '' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Email :</label>
                            <div class="col-sm-10 col-form-label">
                                {{ $data->email ?? '' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Subject :</label>
                            <div class="col-sm-10 col-form-label">
                                {{ $data->subject ?? '' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Message :</label>
                            <div class="col-sm-10 col-form-label">
                                {{ $data->message ?? '' }}
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <a href="{{ route('admin.contact') }}" class="btn waves-effect waves-light btn-rounded btn-outline-primary mb-3 ml-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection