@extends('admin.layouts.app')

@section('meta')
@endsection

@section('title')
Category View
@endsection

@section('styles')
@endsection

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Categories</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category') }}" class="text-muted">Categories</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Plese enter name" value="{{ $data->name ?? '' }}" disabled>
                            <span class="kt-form__help error name"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="discription">discription</label>
                            <textarea name="discription" id="discription" class="form-control" placeholder="Plese enter discription" disabled>{{ $data->discription ?? '' }}</textarea>
                            <span class="kt-form__help error discription"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('admin.category') }}" class="btn waves-effect waves-light btn-rounded btn-outline-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection