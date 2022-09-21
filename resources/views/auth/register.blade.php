@extends('layouts.master')

@section('title', 'Register')

@section('content')
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
                                <h4 class="fw-bold mb-4 pb-2 text-center">
                                    Register Account
                                </h4>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            <input type="text"
                                                class="form-control rounded-5 py-2 px-3 @error('first_name') is-invalid @enderror"
                                                name="first_name" value="{{ old('first_name') }}" placeholder="First name"
                                                autocomplete="first_name" autofocus />
                                            @error('first_name')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text"
                                                class="form-control rounded-5 py-2 px-3  @error('last_name') is-invalid @enderror"
                                                name="last_name" value="{{ old('last_name') }}" autocomplete="last_name"
                                                placeholder="Last name" />
                                            @error('last_name')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <input type="email"
                                                class="form-control rounded-5 py-2 px-3 @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" placeholder="Your email" required
                                                autocomplete="email" />
                                            @error('email')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror


                                        </div>
                                        <div class="col-12">
                                            <input type="password"
                                                class="form-control rounded-5 py-2 px-3 @error('password') is-invalid @enderror"
                                                name="password" placeholder="Password" required
                                                autocomplete="new-password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @else
                                                <div id="passwordHelp" class="form-text">
                                                    Your password must be at
                                                    least 8 characters
                                                </div>
                                            @enderror

                                        </div>
                                        <div class="col-12">
                                            <input type="password" class="form-control rounded-5 py-2 px-3"
                                                name="password_confirmation" placeholder="Confirm password" required
                                                autocomplete="new-password" />
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-primary w-100 rounded-5 py-2 text-uppercase">
                                                Register
                                            </button>

                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="small account-help-text">
                                                    Already have an account?
                                                    <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
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
