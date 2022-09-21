<!--=====================================================-->
<!--=============== NAVBAR SECTION START ================-->
<!--=====================================================-->
<header class="navbar navbar-expand-lg navbar-dark sticky-top navbar-top px-sm-2 shadow-sm">
    <div class="container-xl">
        <a class="navbar-brand fw-semibold text-uppercase" href="{{ url('/') }}"><img src="/assets/images/logo.png"
                alt="" srcset="" width="40" />
            Yourpics
        </a>
        <!-- Profile dropdown for small device -->
        <div class="d-flex align-items-center d-lg-none gap-2">
            @guest
                <a class="btn btn-sm btn-outline-light" href="{{ route('login') }}">Sign In</a>
                <a class="btn btn-sm btn-primary" href="{{ route('register') }}">Sign Up</a>
            @else
                <div class="dropdown profile-dropdown profile-dropdown--small-device">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ Auth::user()->picture_url }}" class="rounded-circle" alt="" />
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li>
                            <h5 class="dropdown-header text-center">
                                {{ Auth::user()->full_name }}
                            </h5>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item active" href="{{ route('profile.index') }}"><i
                                    class="fa-solid fa-user"></i>
                                Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="profile-edit.html"><i class="fa-solid fa-pencil"></i> Edit
                                profile</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="profile-upload.html"><i class="fa-solid fa-camera-retro"></i>
                                Upload photo</a>
                        </li>

                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="fa-solid fa-right-from-bracket"></i>
                                Logout</a>
                        </li>
                    </ul>
                </div>
            @endguest

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Menu Items -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center gap-1">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact-us.html">Contact</a>
                </li>
                @guest
                    <li class="nav-item d-none d-lg-inline-block px-1">
                        <a class="btn btn-sm btn-outline-light" href="{{ route('login') }}">Sign In</a>
                    </li>
                    <li class="nav-item d-none d-lg-inline-block px-1">
                        <a class="btn btn-sm btn-primary" href="{{ route('register') }}">Sign Up</a>
                    </li>
                @else
                    <!-- Profile dropdown for large device -->
                    <li class="nav-item dropdown profile-dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ Auth::user()->picture_url }}" class="rounded-circle" alt="" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                            <li>
                                <h5 class="dropdown-header text-center">
                                    {{ Auth::user()->full_name }}
                                </h5>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item active" href="profile.html"><i class="fa-solid fa-user"></i>
                                    Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="profile-edit.html"><i class="fa-solid fa-pencil"></i>
                                    Edit
                                    profile</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="profile-upload.html"><i class="fa-solid fa-camera-retro"></i>
                                    Upload photo</a>
                            </li>

                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"><i
                                        class="fa-solid fa-right-from-bracket"></i>
                                    Logout</a>
                                <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest


            </ul>
        </div>
    </div>
</header>
