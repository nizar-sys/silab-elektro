@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="authentication-wrapper authentication-cover">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="auth-cover-brand d-flex align-items-center gap-2">
            <span class="app-brand-logo demo">
                <img src="{{ asset('/fe') }}/images/icon.jpeg" width="50px" alt="Brand Logo"
                    class="logo-icon me-2" />
            </span>
            <span class="app-brand-text demo text-heading fw-semibold">{{ config('app.name') }}</span>
        </a>
        <!-- /Logo -->
        <div class="authentication-inner row m-0">
            <!-- /Left Section -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-12 pb-2">
                <img src="{{ asset('/materialize') }}/assets/img/illustrations/auth-login-illustration-light.png"
                    class="auth-cover-illustration w-100" alt="auth-illustration"
                    data-app-light-img="illustrations/auth-login-illustration-light.png"
                    data-app-dark-img="illustrations/auth-login-illustration-dark.png" />
                <img src="{{ asset('/materialize') }}/assets/img/illustrations/auth-cover-login-mask-light.png"
                    class="authentication-image" alt="mask"
                    data-app-light-img="illustrations/auth-cover-login-mask-light.png"
                    data-app-dark-img="illustrations/auth-cover-login-mask-dark.png" />
            </div>
            <!-- /Left Section -->

            <!-- Login -->
            <div
                class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-12 px-12 py-6">
                <div class="w-px-400 mx-auto pt-5 pt-lg-0">

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <h4 class="alert-heading d-flex align-items-center">
                                <span class="alert-icon rounded">
                                    <i class="ri-error-warning-line ri-22px"></i>
                                </span>
                                Something went wrong!
                            </h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <h4 class="mb-1">Welcome to {{ config('app.name') }}! 👋</h4>
                    <p class="mb-5">Please sign-in to your account and start the adventure</p>

                    <form id="formAuthentication" class="mb-5" action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text"
                                class="form-control @error('email')
                            is-invalid
                            @enderror"
                                id="email" name="email" placeholder="Enter your email" autofocus
                                value="{{ old('email') }}" />
                            <label for="email">Email</label>

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password"
                                            class="form-control @error('password')
                                            is-invalid
                                        @enderror"
                                            name="password"
                                            placeholder="{!! passwordPlainText() !!}"
                                            aria-describedby="password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-5 d-flex justify-content-between mt-5">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                            </div>
                            <a href="{{ route('password.email') }}" class="float-end mb-1 mt-2">
                                <span>Forgot Password?</span>
                            </a>
                        </div>
                        <button class="btn btn-primary d-grid w-100">Sign in</button>
                    </form>

                    <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="{{ route('register') }}">
                            <span>Create an account</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
@endsection
