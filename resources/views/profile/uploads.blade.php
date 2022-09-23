@extends('profile.layout.profile-layout')

@section('title', 'Your Uploads')

@section('profile-content')
    @include('components.alert')
    <h4 class="mb-3 fw-bold text-dark text-uppercase">YOur Uploads</h4>
    <!-- UPLOADS GALLERY -->
    <section id="gallery-section" class="gallery-section">
        <div id="mansonryGridAuthorUploads" class="row g-4">
            @if ($pictures)
                @foreach ($pictures as $picture)
                    <!-- Grid Item -->
                    <div class="col-sm-6 col-lg-4 grid-item">
                        <div class="img-card">
                            <a href="javascript:void(0);" class="image-wrapper-link d-block showUploadsModal"
                                data-id="{{ $picture->id }}">
                                <img class="img-fluid" src="{{ $picture->picture_url }}" alt="{{ $picture->title }}" />
                            </a>
                            <div class="card-hover-content p-2 d-flex flex-column text-white show-modal">
                                <div class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        {{ $picture->title }}
                                    </div>
                                </div>
                                <div class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div>
                                        <a href="{{ route('profile.uploads.edit', [Auth::user()->slug, $picture->slug]) }}"
                                            class="btn btn-sm text-light rounded-5 gallery-image-edit-btn"><i
                                                class="fa-solid fa-pen"></i></a>
                                    </div>
                                    <a href="{{ route('download', $picture->slug) }}" class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>

        <!-- Load More Btn -->
        <div class="text-center mt-4 pt-2 d-flex align-items-center justify-content-between gap-3">
            <hr class="border border-primary border-1 opacity-25 w-100" />
            <button class="btn btn-outline-primary rounded-circle loadmore-btn shadow">
                <span class="d-block">Load</span>
                <span class="d-block">More</span>
            </button>
            <hr class="border border-primary border-1 opacity-25 w-100" />
        </div>
    </section>



    @include('profile._modal-uploads-show')

@endsection
