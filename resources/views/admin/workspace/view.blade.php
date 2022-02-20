@extends('admin.layouts.app')

@section('meta')
@endsection

@section('title')
    View Workspace 
@endsection

@section('styles')
<link href="{{ asset('backend/assets/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/css/sweetalert2.bundle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Workspaces</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.workspace') }}" class="text-muted">Workspaces</a></li>
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
                        <label for="sub_title">Sub Title</label>
                        <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Plese enter sub title" value="{{ @old('sub_title', $data->sub_title) }}" readonly>
                        <span class="kt-form__help error sub_title"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="description">description</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Plese enter description" cols="30" rows="5" readonly>{{ @old('description', $data->description) }}</textarea>
                        <span class="kt-form__help error description"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control dropify" placeholder="Plese select image" data-show-remove="false" data-height="200" data-max-file-size="3M" data-show-errors="true" data-allowed-file-extensions="jpg png jpeg JPG PNG JPEG" data-max-file-size-preview="3M" data-default-file="{{ $data->image }}" />
                        <span class="kt-form__help error image"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" name="cover_image" class="form-control dropify" placeholder="Plese select cover image" data-show-remove="false" data-height="200" data-max-file-size="3M" data-show-errors="true" data-allowed-file-extensions="jpg png jpeg JPG PNG JPEG" data-max-file-size-preview="3M" data-default-file="{{ $data->cover_image }}" />
                        <span class="kt-form__help error cover_image"></span>
                    </div>
                </div>
                <div class="ml-4 mb-3">
                    <a href="{{ route('admin.workspace') }}" class="btn waves-effect waves-light btn-rounded btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('backend/assets/dropify/dist/js/dropify.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/promise.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/sweetalert2.bundle.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop profile image here or click',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        var drEvent = $('.dropify').dropify();
    });
</script>
@endsection

