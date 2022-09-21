@extends('layouts.master')

@section('title', 'Gallery')

@section('content')
    <main class="py-4 px-sm-2">
        <!--~~~~~~~~ FILTER SECTION START ~~~~~~~~-->
        <section class="filter-section mb-3 pb-1">
            <div class="container-xl">
                <div class="d-flex align-items-md-center gap-3 justify-content-between flex-column flex-md-row">
                    <div>
                        <h4 class="mb-0 text-black text-uppercase fw-bold">
                            Gallery
                            <i class="fa-solid fa-grip text-primary ms-1"></i>
                        </h4>
                    </div>
                    <form action="">
                        <div class="d-flex flex-column flex-sm-row gap-3">
                            <div class="select-input-wrapper shadow-sm rounded-1">
                                <select class="select2-tags form-control w-100" name="tags">
                                    <option value="tag1">Tag one</option>
                                    <option value="tag2">Tag two</option>
                                    <option value="tag3">Tag three</option>
                                </select>
                            </div>
                            <div class="input-group shadow-sm rounded-1 search-input-group">
                                <input type="search" class="form-control shadow-none" placeholder="Search..."
                                    aria-label="Recipient's username with two button addons" />
                                <button class="btn btn-primary" type="button">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
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
