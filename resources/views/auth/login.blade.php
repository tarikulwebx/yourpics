@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <!--=====================================================-->
    <!--================ MAIN SECTION START =================-->
    <!--=====================================================-->
    <main class="py-4 my-2 px-sm-2">
        <section class="login-register-section">
            <div class="container">
                <div class="shadow-lg border rounded-3 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-5 d-none d-lg-block bg-light">
                            <div class="p-4 d-flex flex-column h-100">
                                <img src="assets/images/login-register-images/Data and settings_Monochromatic.svg"
                                    class="img-fluid w-100 my-auto" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="p-4 p-md-5">
                                <h4 class="fw-bold mb-4 pb-1 text-center">
                                    Login Account
                                </h4>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <input type="email"
                                                class="form-control rounded-5 py-2 px-3  @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" placeholder="Your email" required
                                                autocomplete="email" autofocus />
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <input type="password"
                                                class="form-control rounded-5 py-2 px-3 @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Password" />
                                            @error('password')
                                                <div class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label small" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-primary w-100 rounded-5 py-2 text-uppercase">
                                                Login
                                            </button>

                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="small account-help-text">
                                                    Don't have an account?
                                                    <a href="{{ route('register') }}" class="text-decoration-none">Login</a>
                                                </p>
                                                <p class="small account-help-text">
                                                    Forgot your password?
                                                    <a href="{{ route('password.request') }}"
                                                        class="text-decoration-none">Recover</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
