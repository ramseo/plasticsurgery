@extends('frontend.layouts.app')

@section('title') {{$$module_name_singular->name}}'s Profile @endsection

@section('content')

<section id="breadcrumb-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section id="user-profile-section">
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 user-profile-main-col">

{{--            <div class="row text-right">--}}
{{--                @if ($$module_name_singular->email_verified_at == null)--}}
{{--                    <p class="lead">--}}
{{--                        <a href="{{route('frontend.users.emailConfirmationResend', $$module_name_singular->id)}}">Confirm Email</a>--}}
{{--                    </p>--}}
{{--                @endif--}}
{{--                @include('frontend.includes.messages')--}}
{{--            </div>--}}

        </div>
    </div>
</section>

<section class="profile-form-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-3">
                <div class="menu-menu-col">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('frontend.users.profileEdit', auth()->user()->id) }}"><i class="fa fa-user"></i> My Profile</a></li>
                        <li><a class="active" href="{{ route('frontend.users.changePassword', auth()->user()->id) }}"><i class="fa fa-key"></i> Change Password</a></li>
                        <li><a href="{{ route('frontend.users.quotations', auth()->user()->id) }}"><i class="far fa-file-alt"></i> Quotations</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('account-logout-form').submit();">
                                Logout
                            </a>
                        </li>
                        <form id="account-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card bg-white border-light shadow-soft flex-md-row no-gutters p-4">
                    <div class="card-body d-flex flex-column justify-content-between col-auto py-4 p-lg-5">
                        <div class="row mt-4 mb-4">
                            <div class="col">
                                {{ html()->form('PATCH', route('frontend.users.changePasswordUpdate', auth()->user()->username))->class('form-horizontal')->open() }}

                                <div class="form-group">
                                    <div class="">
                                        {{ html()->label(__('labels.backend.users.fields.password'))->class('form-control-label')->for('password') }}
                                        {{ html()->password('password')
                                            ->class('form-control')
                                            ->placeholder(__('labels.backend.users.fields.password'))
                                            ->required() }}
                                    </div>
                                </div><!--form-group-->

                                <div class="form-group">
                                    <div class="">
                                        {{ html()->label(__('labels.backend.users.fields.password_confirmation'))->class('form-control-label')->for('password_confirmation') }}
                                        {{ html()->password('password_confirmation')
                                            ->class('form-control')
                                            ->placeholder(__('labels.backend.users.fields.password_confirmation'))
                                            ->required() }}
                                    </div>
                                </div><!--form-group-->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {{ html()->button($text = "Save", $type = 'submit')->class('btn btn-primary btn-block') }}
                                        </div>
                                    </div>
                                </div>
                                {{ html()->closeModelForm() }}
                            </div>
                            <!--/.col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
