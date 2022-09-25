@extends('layouts.master')

@section('title', 'Single Picture')

@section('content')
    <main class="py-4 my-2 px-sm-2">
        <!--~~~~~~~~~ SINGLE IMAGE START ~~~~~~~~~-->
        <section class="single-image-show">
            <div class="container-xl">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                        <div class="author d-flex align-items-center gap-2">
                            <img src="{{ $picture->user->picture_url }}" class="rounded-circle d-block"
                                alt="{{ $picture->user->full_name }}" />
                            <div>
                                <h6 class="mb-0 fw-semibold">
                                    <a href="#" class="text-decoration-none">{{ $picture->user->full_name }}</a>
                                </h6>
                                <small class="d-block"><i class="fa-solid fa-award text-secondary"></i>
                                    popular</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-row gap-2 gap-sm-3">
                            @if (Auth::user()->favorites()->where('picture_id', '=', $picture->id)->count() > 0)
                                <button id="singlePageFavBtn" data-id="{{ $picture->id }}"
                                    class="btn btn-sm btn-outline-secondary">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            @else
                                <button id="singlePageFavBtn" data-id="{{ $picture->id }}"
                                    class="btn btn-sm btn-outline-secondary">
                                    <i class="fa-regular fa-heart"></i>
                                </button>
                            @endif

                            <a href="{{ route('download', $picture->slug) }}" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-download me-1 d-none d-sm-inline"></i>
                                Download
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-4 mb-5">
                            <div class="col-sm-12 col-xl-8 text-center">
                                <div class="bg-light">
                                    <img src="{{ $picture->picture_url }}" class="img-fluid single-image"
                                        alt="{{ $picture->title }}" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-4">
                                <h4 class="mb-4 text-dark">{{ $picture->title }}</h4>
                                <div class="row">
                                    <div class="col-lg-6 col-xl-12">
                                        <div class="d-flex align-items-center gap-3 gap-md-4 gap-xl-3 mb-4">
                                            <div>
                                                <h6 class="mb-1 fw-semibold">
                                                    Views
                                                </h6>
                                                <p class="mb-0 small text-muted">
                                                    {{ $picture->views }}
                                                </p>
                                            </div>
                                            <div class="vr"></div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold">
                                                    Downloads
                                                </h6>
                                                <p class="mb-0 small text-muted">
                                                    {{ $picture->downloads }}
                                                </p>
                                            </div>
                                            <div class="vr"></div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold">
                                                    Favorite
                                                </h6>
                                                <p class="mb-0 small text-muted">
                                                    {{ $picture->favorites()->count() }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-12">
                                        <p class="mb-1 small">
                                            <i class="fa-regular fa-calendar me-1 text-muted"></i>
                                            Published {{ $picture->created_at }}
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-4"></div>
                                <button class="copyToClipboard btn btn-sm btn-outline-secondary me-2"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Copy Link"
                                    data-link="{{ route('singlePicture', $picture->slug) }}">
                                    <i class="fa-solid fa-share me-1"></i>
                                    Share the Picture
                                </button>
                                @if ($picture->description)
                                    <div class="mt-4">
                                        <h6 class="text-dark">Description: </h6>
                                        <p class="mb-0 text-muted small">{{ $picture->description }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="image-tags d-flex flex-wrap gap-2">
                                    @foreach ($picture->tags as $tag)
                                        <a class="badge rounded-pill" href="#" role="button">{{ $tag->name }}</a>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <!-- Related Images -->
                        <h4 class="text-dark mb-2">Related Images</h4>
                        <div class="gallery-section">
                            <div class="row g-4">
                                @foreach ($related_pictures as $r_picture)
                                    <div class="col-sm-6 col-xl-3 grid-item">
                                        <div class="img-card">
                                            <a href="{{ route('singlePicture', $r_picture->slug) }}"
                                                class="image-wrapper-link d-block" data-id="{{ $r_picture->id }}">
                                                <img class="img-fluid" src="{{ $r_picture->picture_url }}"
                                                    alt="{{ $r_picture->title }}"
                                                    style="width: 100%; height: 250px; object-fit: cover" />
                                            </a>
                                            <div class="card-hover-content p-2 d-flex flex-column text-white">
                                                <div
                                                    class="card-hover-content__header d-flex align-items-center justify-content-between">
                                                    <div class="caption fw-semibold">
                                                        {{ $r_picture->title }}
                                                    </div>
                                                </div>
                                                <div
                                                    class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                                    <div class="author d-flex align-items-center gap-2">
                                                        <img src="{{ $r_picture->user->picture_url }}"
                                                            class="rounded-circle d-block" alt="{{ $r_picture->title }}" />
                                                        <div>
                                                            <h6 class="mb-0 fw-semibold">
                                                                <a href="#"
                                                                    class="text-decoration-none">{{ $r_picture->user->full_name }}</a>
                                                            </h6>
                                                            <small class="d-block text-light"><i
                                                                    class="fa-solid fa-award"></i>
                                                                popular</small>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('download', $r_picture->slug) }}"
                                                        class="btn download-btn">
                                                        <i class="fa-solid fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between py-3">
                        <p class="fw-light text-dark mb-0">
                            <i class="fa-solid fa-shield-halved me-1 text-muted"></i>
                            Under the license of Yourpics
                        </p>
                        <a href="#" class="btn btn-sm px-4 btn-secondary">
                            <i class="fa-solid fa-left-long me-1"></i> Gallery
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('components.toast')
@endsection


@section('scripts')
    <script>
        $(document).on('click', '#singlePageFavBtn', function() {
            var picture_id = $(this).data('id');
            axios.post('/addToFavorite', {
                    id: picture_id
                })
                .then(res => {
                    // console.log(res)
                    if (res.status == 200) {
                        const toast = new bootstrap.Toast($('#successToast'));
                        $('#successToast .toastMessage').html(res.data.message);
                        toast.show();

                        $(this).html('<i class="fa-solid fa-heart "></i>');


                    } else if (res.status == 201) {
                        const toast = new bootstrap.Toast($('#warningToast'));
                        $('#warningToast .toastMessage').html(res.data.message);
                        toast.show();

                        $(this).html('<i class="fa-regular fa-heart "></i>');
                    }
                })
                .catch(err => {
                    console.error(err);
                })
        });
    </script>
@endsection
