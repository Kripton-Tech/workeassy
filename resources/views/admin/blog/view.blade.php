@extends('admin.layouts.app')

@section('meta')
@endsection

@section('title')
    View Blogs 
@endsection

@section('styles')
@endsection

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Blogs</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog') }}" class="text-muted">Blogs</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right"></div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row main">
        <div class="col-12">
            <div class="card">
                <div class="row m-2">
                    <div class="form-group col-sm-12">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Plese enter title" value="{{ @old('title', $data->title) }}" readonly>
                        <span class="kt-form__help error title"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="description">description</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Plese enter description" cols="30" rows="5" readonly>{{ @old('description', $data->description) }}</textarea>
                        <span class="kt-form__help error description"></span>
                    </div>
                </div>
                <div class="ml-4">
                    <a href="{{ route('admin.blog') }}" class="btn waves-effect waves-light btn-rounded btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection

