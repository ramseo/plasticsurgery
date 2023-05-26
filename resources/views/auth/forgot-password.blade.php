@extends('auth.layout')

@section('title') @lang('Forgot your password?') @endsection

@section('content')

<div class="col-xs-12 col-md-10 auth-inner-form-col margin-login">
    <div class="form-header">
        <a class="page-back-link" href="/"><img class="img-fluid" src="{{asset('images/back-arrow.png')}}" alt=""></a>
        <p class="header-title">@lang('Forgot your password?')</p>
        <p class="header-text">Please enter your email here and details instructions will be sent to your email inbox.</p>
    </div>
    <div class="form-body">
        @include('flash::message')
        @if (Session::has('status'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <p><i class="fas fa-bolt"></i> {{ Session::get('status') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
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
        <form role="form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group mat-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" aria-label="email" aria-describedby="email" required>
            </div>
            <div class="form-group submit-group">
                <input type="submit" class="btn btn-primary btn-block" value="{{ __('Email Password Reset Link') }}">
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
