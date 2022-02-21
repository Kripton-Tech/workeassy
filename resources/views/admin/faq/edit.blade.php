@extends('admin.layouts.app')

@section('meta')
@endsection

@section('title')
    Update Faq
@endsection

@section('styles')
@endsection

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Faqs</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.faq') }}" class="text-muted">Faqs</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Update</li>
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
                <form action="{{ route('admin.faq.update') }}" name="form" id="form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="id" value="{{ $data->id }}">

                    <div class="row m-2">
                        <div class="form-group col-sm-12">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Plese enter title" value="{{ @old('title', $data->title) }}">
                            <span class="kt-form__help error title"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="description">description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Plese enter description" cols="30" rows="5">{{ @old('description', $data->description) }}</textarea>
                            <span class="kt-form__help error description"></span>
                        </div>
                    </div>
                    <div class="ml-4 mb-3">
                        <button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Submit</button>
                        <a href="{{ route('admin.faq') }}" class="btn waves-effect waves-light btn-rounded btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
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

