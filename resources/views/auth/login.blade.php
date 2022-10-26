@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row no-gutter">
        <style type="text/css">
            .login,
            .image {
                min-height: 100vh;
            }

            .bg-image {
                background-image: url('https://bootstrapious.com/i/snippets/sn-page-split/bg.jpg');
                background-size: cover;
                background-position: center center;
            }

            .btn-custom {
                color: #FF0A0A;
                background-color: #ffffff;
                /* border-color: #E51DF0;  */
            }
        </style>
        <!-- The image half -->
        <div class="col-md-8 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-4" style="background-color:red;">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-12 text-center" style="color:white;">{{ __('Login') }}</h3>
                            <p class="text-muted mb-4"></p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="email" class="col-md-6 col-form-label" style="color:white;">{{ __('Email Address') }}</label>
                                    <div class="form-group mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-6 col-form-label" style="color:white;">{{ __('Password') }}</label>
                                    <div class="form-group mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-custom" >
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>

                                <div class="text-center d-flex justify-content-between mt-4" style="color:white;">
                                    <p>Don't have an account yet?
                                        <a href="{{ route('register') }}" class="font-italic" style="color: blue;">
                                            <strong>{{ __('Register') }}</strong>
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>
@endsection
