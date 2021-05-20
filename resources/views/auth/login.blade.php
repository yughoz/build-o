@extends('layouts.app-auth')

@section('content-login')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img width="400" height="230" src="{{ asset('app-assets/images/pages/login.png') }}" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">Login</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">{{ config('app.name', 'Laravel') }}</p>
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="Email atau NIP" value="{{ old('email') }}" required autocomplete="email" autofocus required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="user-name">Email atau NIP</label>
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="user-password">Password</label>
                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </fieldset>
                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="text-left">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">Remember me</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    @if (config('template.'))
                                                        <div class="text-right"><a href="{{ route('password.request') }}" class="card-link">Forgot Password?</a></div>    
                                                    @endif
                                                </div>
                                                @if (config('template.canRegister'))
                                                    <a href="{{ route('register') }}" class="btn btn-outline-primary float-left btn-inline">Register</a>
                                                @endif
                                                <button 
                                                    type="submit" 
                                                    class="btn btn-primary 
                                                    @if(config('template.canForgotPassword') && config('template.canRegister')) float-right @endif btn-inline"
                                                >
                                                    Login
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    {{-- Login with social media --}}
                                    @if(config('template.loginSocialMedia'))
                                        <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text">OR</div>
                                            </div>
                                            <div class="footer-btn d-inline">
                                                <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                                <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                                <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                                <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
