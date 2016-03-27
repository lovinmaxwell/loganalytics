@extends('backend.templates.login')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-box">
        <div class="login-logo">
            <img src="{{ getenv('PRODUCT_LOGO') }}" style="width: 50%;">
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form class="form-horizontal" role="form" method="POST" action="/login">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" >
                    <i class="fa fa-envelope form-control-feedback"></i>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" />
                    <i class="fa fa-lock form-control-feedback"></i>
                </div>
                <div class="row">
                        <button type="submit" class="btn btn-success btn-block btn-lg btn-flat">Sign In</button>
                </div>
            </form>

            <!--
             <div class="social-auth-links text-center">

             <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
             <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>

            </div>

            <a href="/auth/forget-password">I forgot my password</a><br>

            <a href="/auth/register" class="text-center">Register a new membership</a>
            -->
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection
