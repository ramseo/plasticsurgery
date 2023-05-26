@extends('auth.layout')

@section('title') @lang('Reset Password') @endsection

@section('content')

<div class="col-xs-12 col-md-10 auth-inner-form-col margin-login">
    <div class="form-header">
        <a class="page-back-link" href="/"><img class="img-fluid" src="{{asset('images/back-arrow.png')}}" alt=""></a>
        <p class="header-title">@lang('Reset Password')</p>
        <p class="header-text">@lang("Enter your email address and set new password.")</p>
    </div>
    <div class="form-body">
        @include('flash::message')
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p><i class="fas fa-exclamation-triangle"></i> @lang('Please fix the following errors & try again!')</p>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form class="form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="form-group mat-group">
                <label for="">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('Email Address') }}" aria-label="Email" aria-describedby="input-email" required>
            </div>
            <div class="form-group mat-group">
                <label for="">Password</label>
                <div class="password-container">
                    <input id="password" type="password" class="form-control" name="password" placeholder="{{ __('Password') }}" aria-label="{{ __('Password') }}" aria-describedby="input-password" required autocomplete="new-password">
                    <span class="displayPassword"><img src="{{asset('images/view-password.png')}}" alt=""></span>
                </div>
            </div>
            <div class="form-group mat-group">
                <label for="">Confirm Password</label>
                <div class="password-container">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" aria-label="{{ __('Confirm Password') }}" aria-describedby="input-password_confirmation" required autocomplete="new-password">
                    <span class="displayPassword"><img src="{{asset('images/view-password.png')}}" alt=""></span>
                </div>
            </div>
            <div class="form-group submit-group">
                <input type="submit" class="btn btn-primary btn-block" value="{{ __('Reset Password') }}">
            </div>
            <div class="alternate-text-group">
                <p class="text-center">
                    <a class="text-primary" href="{{ route('register') }}">Sign up</a> |
                    <a class="text-primary" href="{{ route('login') }}" class="text-gray">Login</a>
                </p>
            </div>
        </form>
    </div>
</div>

@endsection
