<div class="modal fade single-image-show" id="imageShowProfileUploadsModal" tabindex="-1"
    aria-labelledby="imageShowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="author d-flex align-items-center gap-2">
                    <img id="authorImage" src="/assets/images/profile-placeholder.jpg"
                        class="rounded-circle d-block shadow-sm" alt="" />
                    <div>
                        <h6 class="mb-0 fw-semibold">
                            <div id="userName" class="text-decoration-none text-primary">...</div>
                        </h6>
                        <small class="d-block"><i class="fa-solid fa-award text-secondary"></i>
                            <span id="userRank">..</span></small>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-row gap-2 gap-sm-3">
                    <button class="btn btn-sm text-muted" type="button" data-bs-dismiss="modal" data-bs-toggle="modal">
                        Close
                    </button>
                    <a href=""
                        class="btn btn-sm text-secondary bg-secondary bg-opacity-10 rounded-5 gallery-image-edit-btn editLink"><i
                            class="fa-solid fa-pen"></i></a>
                    <a id="downloadBtn" href="" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-download me-1 d-none d-sm-inline"></i>
                        Download
                    </a>
                </div>
            </div>
            <div class="modal-body px-1">
                <div class="container-fluid">
                    <div class="row gy-4">
                        <div class="col-sm-12 col-xl-8 text-center">
                            <div class="bg-light">
                                <img id="pictureHolderImg" src="/assets/images/picture-placeholder.jpg"
                                    class="img-fluid single-image" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-4">
                            <h4 class="mb-4" id="pictureTitle">...</h4>
                            <div class="row">
                                <div class="col-lg-6 col-xl-12">
                                    <div class="d-flex align-items-center gap-3 gap-md-4 gap-xl-3 mb-4">
                                        <div>
                                            <h6 class="mb-1 fw-semibold">
                                                Views
                                            </h6>
                                            <p id="totalViews" class="mb-0 small text-muted">
                                                ..
                                            </p>
                                        </div>
                                        <div class="vr"></div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold">
                                                Downloads
                                            </h6>
                                            <p id="totalDownloads" class="mb-0 small text-muted">
                                                ..
                                            </p>
                                        </div>
                                        <div class="vr"></div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold">
                                                Favorite
                                            </h6>
                                            <p id="totalFavs" class="mb-0 small text-muted">
                                                ..
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-12">
                                    <p class="mb-1 small">
                                        <i class="fa-regular fa-calendar me-1 text-muted"></i>
                                        Published <span id="uploadDate"></span>
                                    </p>
                                    {{-- <p class="mb-1 small">
                                        <i class="fa-solid fa-camera me-1 text-muted"></i>
                                        OPPO AK2, 108pixel camera
                                    </p>
                                    <p class="mb-4 mb-lg-2 mb-xl-4 small">
                                        <i class="fa-solid fa-location-dot me-1 text-muted"></i>
                                        Rangpur, Bangladesh
                                    </p> --}}
                                </div>
                            </div>
                            <div class="mt-4"></div>
                            <button class="copyToClipboard btn btn-sm btn-outline-secondary me-2"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Copy Link"
                                data-link="www.google.com">
                                <i class="fa-solid fa-share me-1"></i>
                                Share
                            </button>
                            <a href="single.html" class="btn btn-sm btn-primary">View in Page
                                <i class="fa-solid fa-arrow-right-long ms-1"></i></a>

                            <div class="mt-4 description-wrapper d-none">
                                <h6 class="fw-bold">Description:</h6>
                                <p id="description"></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="pictureTags" class="image-tags d-flex flex-wrap gap-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <p class="fw-light text-dark">
                    <i class="fa-solid fa-shield-halved me-1 text-muted"></i>
                    Under the license of Yourpics
                </p>
                <div class="d-flex flex-row">

                    <button type="button" class="btn btn-sm px-3 btn-secondary me-2" data-bs-dismiss="modal">
                        Close
                    </button>
                    <a href="#" class="btn btn-sm px-3 btn-primary  editLink">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
