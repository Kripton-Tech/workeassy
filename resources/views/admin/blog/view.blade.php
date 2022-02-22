@extends('admin.layouts.app')

@section('meta')
@endsection

@section('title')
Blog View
@endsection

@section('styles')
<link href="{{ asset('backend/assets/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/css/sweetalert2.bundle.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/summernote-0.8.18/summernote.css') }}" rel="stylesheet">
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog') }}" class="text-muted">Blog</a></li>
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
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" id="heading" class="form-control" placeholder="Plese enter heading" value="{{ $data->heading }}" disabled>
                            <span class="kt-form__help error heading"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control" disabled>
                                <option value="">Select Category</option>
                                @if($categories->isNotEmpty())
                                    @foreach($categories as $row)
                                        <option value="{{ $row->id }}" @if($data->category_id == $row->id) selected @endif>{{ $row->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="kt-form__help error category_id"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" class="form-control" placeholder="Plese enter body" disabled>{{ $data->body }}</textarea>
                            <span class="kt-form__help error body"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="tags">Tags</label>
                            <input type="text" name="tags" id="tags" class="form-control" placeholder="Plese enter tags" value="{{ @old('tags', $data->tags) }}" disabled>
                            <span class="kt-form__help error tags"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="cover_image">Cover Image</label>
                            <input type="file" class="form-control dropify" id="cover_image" name="cover_image" data-default-file="{{ $data->cover_image ??'' }}" data-allowed-file-extensions="jpg png jpeg" data-max-file-size-preview="2M" data-show-remove="false" />
                            <span class="kt-form__help error cover_image"></span>
                        </div>  
                    </div>
                    <div class="form-group">
                        <a href="{{ route('admin.blog') }}" class="btn waves-effect waves-light btn-rounded btn-outline-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('backend/assets/dropify/dist/js/dropify.min.js') }}"></script>
<script src="{{ asset('backend/assets/summernote-0.8.18/summernote.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop profile image here or click',
                'remove':  'Remove',
                'error':   'Ooops, something wrong happended.'
            }
        });

        var drEvent = $('.dropify').dropify();
    });
</script>
@endsection