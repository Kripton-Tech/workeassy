@extends('admin.layouts.app')

@section('meta')
@endsection

@section('title')
    Add Portfolio
@endsection

@section('styles')
<link href="{{ asset('backend/assets/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/css/sweetalert2.bundle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Portfolios</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.portfolio') }}" class="text-muted">Portfolios</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Add</li>
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
                <form action="{{ route('admin.portfolio.insert') }}" name="form" id="form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row m-2">
                        <div class="form-group col-sm-12">
                            <label for="category">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select category</option>
                                @if($categories->isNotEmpty())
                                    @foreach($categories as $row)
                                        <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="kt-form__help error category_id"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Plese enter title" value="{{ @old('title') }}">
                            <span class="kt-form__help error title"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control dropify" placeholder="Plese select image" data-show-remove="false" data-height="200" data-max-file-size="3M" data-show-errors="true" data-allowed-file-extensions="jpg png jpeg JPG PNG JPEG" data-max-file-size-preview="3M" />
                            <span class="kt-form__help error image"></span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Submit</button>
                        <a href="{{ route('admin.portfolio') }}" class="btn waves-effect waves-light btn-rounded btn-outline-secondary">Cancel</a>
                    </div>
                </form>
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

<script>
    $(document).ready(function() {
        var form = $('#form');
        $('.kt-form__help').html('');
        form.submit(function(e) {
            $('.help-block').html('');
            $('.m-form__help').html('');
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: new FormData($(this)[0]),
                dataType: 'json',
                async: false,
                processData: false,
                contentType: false,
                success: function(json) {
                    return true;
                },
                error: function(json) {
                    if (json.status === 422) {
                        e.preventDefault();
                        var errors_ = json.responseJSON;
                        $('.kt-form__help').html('');
                        $.each(errors_.errors, function(key, value) {
                            $('.' + key).html(value);
                        });
                    }
                }
            });
        });
    });
</script>
@endsection

