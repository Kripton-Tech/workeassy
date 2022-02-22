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
                    <div class="row m-2">
                        <div class="form-group col-sm-12">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Plese enter name" value="{{ @old('name', $data->name) }}" readonly>
                            <span class="kt-form__help error name"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Plese enter email" value="{{ @old('email', $data->email) }}" readonly>
                            <span class="kt-form__help error email"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Plese enter subject" value="{{ @old('subject', $data->subject) }}" readonly>
                            <span class="kt-form__help error subject"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="message">message</label>
                            <textarea name="message" id="message" class="form-control" placeholder="Plese enter message" cols="30" rows="10" readonly>{{ @old('message', $data->message) }}</textarea>
                            <span class="kt-form__help error message"></span>
                        </div>
                    </div>
                    <div class="ml-4 mb-3">
                        <a href="{{ route('admin.contact') }}" class="btn waves-effect waves-light btn-rounded btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection