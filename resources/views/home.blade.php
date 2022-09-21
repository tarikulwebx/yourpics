@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <!--=====================================================-->
    <!--================ HERO SECTION START =================-->
    <!--=====================================================-->
    <section id="hero-section" class="hero-section pt-5 mb-4 px-sm-2">
        <div class="container-xl">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators mb-0">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <!-- carousel item 1 -->
                    <div class="carousel-item active">
                        <div class="row align-items-center gy-4">
                            <div class="col-lg-5">
                                <h1 class="text-light fw-bold">
                                    Slide Heading 1
                                </h1>
                                <p class="lead fw-normal text-white-50">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. In quidem sequi
                                    placeat odit et? Id aut libero ratione
                                    iure sit, delectus quibusdam
                                </p>
                                <a href="#" class="btn btn-sm btn-secondary me-2 mb-2 shadow-sm">Shared link 1</a>
                                <a href="#" class="btn btn-sm btn-outline-light me-2 mb-2">Shared link 2</a>
                            </div>
                            <div class="col-lg-7">
                                <div class="flipster-spinner text-center">
                                    <div class="spinner-grow spinner-grow-sm text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow spinner-grow-sm text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow spinner-grow-sm text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>

                                <div id="flipster-1" class="flipster d-none">
                                    <ul class="flip-items">
                                        <li class="flip-item">
                                            <img src="assets/images/slider-images/slide (1).jpg" />
                                        </li>
                                        <li class="flip-item">
                                            <img src="assets/images/slider-images/slide (2).jpg" />
                                        </li>
                                        <li class="flip-item">
                                            <img src="assets/images/slider-images/slide (3).jpg" />
                                        </li>
                                        <li class="flip-item">
                                            <img src="assets/images/slider-images/slide (5).jpg" />
                                        </li>
                                        <li class="flip-item">
                                            <img src="assets/images/slider-images/slide (6).jpg" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- carousel item 2 -->
                    <div class="carousel-item">
                        <div class="row align-items-center gy-4">
                            <div class="col-lg-5">
                                <h1 class="text-light fw-bold">
                                    Slide Heading 2
                                </h1>
                                <p class="lead fw-normal text-white-50">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. In quidem sequi
                                    placeat odit et? Id aut libero ratione
                                    iure sit, delectus quibusdam
                                </p>
                                <a href="#" class="btn btn-sm btn-secondary me-2 mb-2 shadow-sm">Shared link 1</a>
                                <a href="#" class="btn btn-sm btn-outline-light me-2 mb-2">Shared link 2</a>
                            </div>
                            <div class="col-lg-7">
                                <div class="flipster-spinner text-center">
                                    <div class="spinner-grow spinner-grow-sm text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow spinner-grow-sm text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow spinner-grow-sm text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div id="flipster-2" class="flipster d-none">
                                    <ul class="flip-items">
                                        <li class="flip-item">
                                            <img src="assets/images/slider-images/slide (1).jpg" />
                                        </li>
                                        <li class="flip-item">
                                            <img src="assets/images/slider-images/slide (1).jpg" />
                                        </li>
                                        <li class="flip-item">
                                            <img src="assets/images/slider-images/slide (1).jpg" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- carousel item 3 -->
                    <div class="carousel-item">
                        <div class="row align-items-center gy-4">
                            <div class="col-lg-5">
                                <h1 class="text-light fw-bold">
                                    Slide Heading 3
                                </h1>
                                <p class="lead fw-normal text-white-50">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. In quidem sequi
                                    placeat odit et? Id aut libero ratione
                                    iure sit, delectus quibusdam
                                </p>
                                <a href="#" class="btn btn-sm btn-secondary me-2 mb-2 shadow-sm">Shared link 1</a>
                                <a href="#" class="btn btn-sm btn-outline-light me-2 mb-2">Shared link 2</a>
                            </div>
                            <div class="col-lg-7">
                                <div class="flipster-spinner text-center">
                                    <div class="spinner-grow spinner-grow-sm text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow spinner-grow-sm text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow spinner-grow-sm text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div id="flipster-3" class="flipster d-none">
                                    <ul class="flip-items">
                                        <li class="flip-item">
                                            <img src="assets/images/slider-images/slide (1).jpg" />
                                        </li>
                                        <li class="flip-item">
                                            <img src="assets/images/slider-images/slide (1).jpg" />
                                        </li>
                                        <li class="flip-item">
                                            <img src="assets/images/slider-images/slide (1).jpg" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-4 pt-5 mt-5 position-relative">
                <div class="row align-items-end gy-4">
                    <div class="col-lg-7">
                        <strong class="text-black">Popular Tags: </strong>
                        <span class="badge rounded-pill text-bg-primary">Primary</span>
                        <span class="badge rounded-pill text-bg-secondary">Secondary</span>
                        <span class="badge rounded-pill text-bg-success">Success</span>
                        <span class="badge rounded-pill text-bg-danger">Danger</span>
                        <span class="badge rounded-pill text-bg-warning">Warning</span>
                        <span class="badge rounded-pill text-bg-info">Info</span>
                        <span class="badge rounded-pill text-bg-light">Light</span>
                        <span class="badge rounded-pill text-bg-dark">Dark</span>
                    </div>
                    <div class="col-lg-5" style="margin-bottom: -3.75rem">
                        <div class="search-wrapper p-3 rounded shadow-sm w-100">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control shadow-none"
                                        placeholder="Search content..." aria-label="search input"
                                        aria-describedby="basic-addon2" />
                                    <span class="input-group-text p-0 m-0 border-0" id="basic-addon2">
                                        <button class="btn btn-primary h-100 px-3" type="submit">
                                            <i class="fa-solid fa-magnifying-glass me-1"></i>
                                            Search
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <main class="py-5 px-sm-2">
        <!--~~~~~~~~~ TAG SECTION START ~~~~~~~~~~-->
        <section class="tag-section mb-4">
            <div class="container-xl">
                <div class="tag-section-inner position-relative">
                    <button class="btn btn-left">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <button class="btn btn-right">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                    <div class="tags-wrapper d-flex align-items-center gap-2 text-nowrap">
                        <a href="#" class="badge rounded-pill bg-primary bg-opacity-10 text-primary">Default
                            Colored</a>
                        <a href="#" class="badge rounded-pill bg-secondary bg-opacity-10 text-secondary">Secondary
                            Color</a>
                        <a href="#" class="badge rounded-pill bg-success bg-opacity-10 text-success">Success
                            Color</a>

                        <a href="#" class="badge rounded-pill bg-success bg-opacity-10 text-success">Success
                            Color</a>
                        <a href="#" class="badge rounded-pill bg-primary bg-opacity-10 text-primary">Default
                            Colored</a>
                        <a href="#" class="badge rounded-pill bg-success bg-opacity-10 text-success">Success
                            Color</a>

                        <a href="#" class="badge rounded-pill bg-danger bg-opacity-10 text-danger">Danger Color</a>
                        <a href="#" class="badge rounded-pill bg-warning bg-opacity-10 text-warning">Warning
                            Color</a>
                        <a href="#" class="badge rounded-pill bg-primary bg-opacity-10 text-primary">Default
                            Colored</a>
                        <a href="#" class="badge rounded-pill bg-secondary bg-opacity-10 text-secondary">Secondary
                            Color</a>
                        <a href="#" class="badge rounded-pill bg-success bg-opacity-10 text-success">Success
                            Color</a>

                        <a href="#" class="badge rounded-pill bg-success bg-opacity-10 text-success">Success
                            Color</a>
                    </div>
                </div>
            </div>
        </section>

        <!--~~~~~~~~~~ GALLERY SECTION ~~~~~~~~~~~-->
        <section id="gallery-section" class="gallery-section">
            <div class="container-xl">
                <div class="gallery-grid row g-4">
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (1).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (13).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (3).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (4).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (5).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (6).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (7).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (8).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (9).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (10).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (11).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <img class="img-fluid" src="assets/images/gallery-images/image (12).jpg" alt="" />
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        Caption Title
                                    </div>
                                    <button class="btn btn-sm fav-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="assets/images/profile-pic.jpg" class="rounded-circle d-block"
                                            alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#" class="text-decoration-none">Tarikul Islam</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <button class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <a class="btn btn-primary w-100 mt-4 py-2 d-none" href="#" role="button">Continue Browsing with
                    Gallery
                    <i class="fa-solid fa-arrow-right-long ms-2"></i></a>

                <!-- Load More Btn -->
                <div class="text-center mt-4 pt-2 d-flex align-items-center justify-content-between gap-3">
                    <hr class="border border-primary border-1 opacity-25 w-100" />
                    <button class="btn btn-outline-primary rounded-circle loadmore-btn shadow">
                        <span class="d-block">Load</span>
                        <span class="d-block">More</span>
                    </button>
                    <hr class="border border-primary border-1 opacity-25 w-100" />
                </div>
            </div>
        </section>
    </main>
@endsection
