<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login Cover | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="{{asset('assetsAdmin/assets/img/favicon.ico')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('assetsAdmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assetsAdmin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assetsAdmin/assets/css/authentication/form-1.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/assets/css/forms/switches.css')}}">
</head>
<body class="form">


<div class="form-container">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1 class="">Log In to <a href=""><span class="brand-name">Egypt Metropolitan Travel</span></a></h1>
{{--                    <p class="signup-link">New Here? <a href="auth_register.html">Create an account</a></p>--}}
                    @include('partials.session')
                    <form class="text-left" method="post" action="{{route('login.index')}}">
                        @csrf
                        <div class="form">

                            <div id="username-field" class="field-wrapper input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <input id="email" name="email" type="email" class="form-control  @error('email') is-invalid fparsley-error parsley-error @enderror" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                                  <p>{{ $message }}</p>
                                </span>
                                @enderror
                            </div>

                            <div id="password-field" class="field-wrapper input mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <input id="password" name="password" type="password" class="form-control  @error('password') is-invalid fparsley-error parsley-error @enderror" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                  <p>{{ $message }}</p>
                                </span>
                                @enderror
                            </div>
                            <div class="d-sm-flex justify-content-between">

                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Log In</button>
                                </div>

                            </div>



                        </div>
                    </form>
                    <p class="terms-conditions">© 2019 All Rights Reserved. <a href="">Egypt Metropolitan Travel</a> </p>

                </div>
            </div>
        </div>
    </div>
    <div class="form-image">
        <div class="l-image">
        </div>
    </div>
</div>
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assetsAdmin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('assetsAdmin/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assetsAdmin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assetsAdmin/assets/js/authentication/form-1.js')}}"></script>

</body>
</html>

