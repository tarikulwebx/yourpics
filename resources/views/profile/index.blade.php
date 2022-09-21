@extends('profile.layout.profile-layout')

@section('title', 'My Profile')

@section('profile-content')
    <div class="row gy-4 mb-4 pb-2">
        <div class="col-sm-4 col-xl-3">
            <img src="{{ Auth::user()->picture_url }}" class="img-fluid rounded-circle shadow-sm" alt="" />
        </div>
        <div class="col-sm-8 col-xl-9">
            <h3 class="mb-1">{{ $user->full_name }}</h3>
            <h6 class="text-muted mb-3 fw-normal">
                <i class="fa-solid fa-award me-1 text-secondary"></i>
                Most Popular
            </h6>
            <p class="lead">
                {{ $user->bio }}
            </p>
            <div>
                @ <a href="#">{{ $user->email }}</a>
            </div>
        </div>
    </div>

    <nav class="mb-4">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-uploads-tab" data-bs-toggle="tab" data-bs-target="#nav-uploads"
                type="button" role="tab" aria-controls="nav-uploads" aria-selected="true">
                Uploads (1234)
            </button>
            <button class="nav-link" id="nav-favs-tab" data-bs-toggle="tab" data-bs-target="#nav-favs" type="button"
                role="tab" aria-controls="nav-favs" aria-selected="false">
                Favourites (1234)
            </button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <!-- Uploads Gallery -->
        <div class="tab-pane fade show active" id="nav-uploads" role="tabpanel" aria-labelledby="nav-uploads-tab"
            tabindex="0">
            @include('profile.includes.uploads-gallery')
        </div>

        <!-- Favs Gallery -->
        <div class="tab-pane fade" id="nav-favs" role="tabpanel" aria-labelledby="nav-favs-tab" tabindex="0">
            @include('profile.includes.favs-gallery')
        </div>
    </div>
@endsection


@section('profile-modal')
    @include('profile.includes.profile-modal')
@endsection
