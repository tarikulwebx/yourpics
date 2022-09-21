@extends('layouts.master')

@section('content')
    <!--=====================================================-->
    <!--================ MAIN SECTION START =================-->
    <!--=====================================================-->
    <main class="py-4 my-md-2 px-sm-2">
        <!-- Profile section -->
        <section class="profile-section">
            <div class="container-xl">
                <div class="row gy-4">
                    <!--~~~~~~~~~ PROFILE NAVIGATION ~~~~~~~~~-->
                    <div class="col-md-4 col-xl-3">
                        @include('profile.includes.nav')
                    </div>
                    <div class="col-md-8 col-xl-9">
                        @yield('profile-content')
                    </div>
                </div>
            </div>
        </section>
    </main>


    @yield('profile-modal')
@endsection
