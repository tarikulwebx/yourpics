@extends('profile.layout.profile-layout')

@section('title', 'Your Uploads')

@section('profile-content')
    @include('components.alert')
    <div class="d-flex align-items-center justify-content-between mb-2 pb-1">
        <h3 class="text-primary mb-0">Your Uploads <i class="fa-solid fa-grip text-secondary"></i></h3>
        <a href="{{ route('profile.upload.create', Auth::user()->slug) }}" class="btn btn-sm btn-outline-primary">
            <i class="fa-solid fa-upload"></i> New upload</a>
    </div>
    <div class="filter mb-4">

        <form id="searchForm" method="GET">
            <div class="input-group search-input-group">
                <input type="text" name="search" class="form-control form-control-sm shadow-none py-2 px-3"
                    placeholder="Search..." value="{{ request('search') }}" aria-label="search" aria-describedby="search" />
                <button id="searchBtn" class="btn btn-primary" type="submit">
                    <i class="fa-solid fa-magnifying-glass me-1"></i>
                    Search
                </button>
            </div>
        </form>
    </div>
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
                                    @guest
                                        <button class="btn fav-btn" data-id="{{ $picture->id }}">
                                            <i class="fa-regular fa-heart"></i>
                                        </button>
                                    @elseif (Auth::user()->favorites()->where('picture_id', '=', $picture->id)->count() > 0)
                                        <button class="btn fav-btn text-white" data-id="{{ $picture->id }}">
                                            <i class="fa-solid fa-heart "></i>
                                        </button>
                                    @else
                                        <button class="btn fav-btn" data-id="{{ $picture->id }}">
                                            <i class="fa-regular fa-heart"></i>
                                        </button>
                                    @endguest
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

        {{ $pictures->links() }}
    </section>



    @include('profile._modal-uploads-show')

@endsection
