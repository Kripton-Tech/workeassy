@extends('admin.auth.layout.app')

@section('meta')
@endsection

@section('title')
    Reset Password
@endsection

@section('styles')
@endsection

@section('content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url({{ asset('backend/assets/images/big/IMAGE1.png') }}) no-repeat center center;">
    <div class="auth-box row">
        <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{ asset('backend/assets/images/big/Asset1.png') }});"></div>
        <div class="col-lg-5 col-md-7 bg-white">
            <div class="p-3">
                <div class="text-center">
                    <img src="{{ _logo() }}" class="logo" alt="wrapkit">
                </div>
                <h2 class="mt-3 text-center">Reset password</h2>
                <form id="form" class="mt-4" action="{{ route('admin.recover.password') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="hidden" name="token" value="{{ $string }}">

                    <h2 class="login-title">Reset Password</h2>
                    <div class="form-group">
                        <div class="input-group-icon right">
                            <div class="input-icon"><i class="fa fa-envelope"></i></div>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off" value="{{ $email }}">
                            @error('email')
                                <div class="invalid-feedback" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-icon right">
                            <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-icon right">
                            <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                            <input type="confirm_password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                            @error('confirm_password')
                                <div class="invalid-feedback" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info btn-block" type="submit">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('scripts')
@endsection
