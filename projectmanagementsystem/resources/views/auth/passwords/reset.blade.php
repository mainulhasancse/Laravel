@extends('layouts.auth')

@section('content')


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal"  method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        @if(is_null($setting->logo))
                <!--This is dark logo icon-->
        <a href="javascript:void(0)" class="text-center db"><img src="{{ asset('logo-dark.png') }}" alt="Home" /></a>
        @else
            <a href="javascript:void(0)" class="text-center db "><img src="{{ asset('storage/company-logo.png') }}" alt="home" class="img-responsive pull-left" width="50" /> <span class="text-dark pull-left auth-logo"><?php
                    $company = explode(' ',trim($setting->company_name));
                    echo strtoupper($company[0]);
                    ?></span></a>
            <div class="clearfix"></div>

        @endif

        <h3 >Reset Password</h3>

        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-xs-12 ">E-Mail Address</label>
            <div class="col-xs-12">
                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-xs-12 ">Password</label>
            <div class="col-xs-12">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-xs-12 ">Confirm Password</label>
            <div class="col-xs-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        {{ $errors->first('password_confirmation') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset Password</button>
            </div>
        </div>

        <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
                <p><a href="{{ route('login') }}" class="text-primary m-l-5"><b>Sign In</b></a></p>
            </div>
        </div>

    </form>
@endsection