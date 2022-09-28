@extends('layouts.master')

@section('title', 'Gallery')

@section('content')
    <main class="mb-5">
        <!--~~~~~~~~ FILTER SECTION START ~~~~~~~~-->
        <section class="filter-section mb-4 bg-light py-4 px-sm-2">
            <div class="container-xl py-2 py-md-3">
                <div class="row align-items-center gy-3">
                    <div class="col-12 col-md-7 col-lg-8">
                        <p class="mb-0 text-uppercase fw-bold small text-secondary" style="letter-spacing: 0.2rem">
                            Pictures by Tag
                        </p>
                        <h2 class="mb-0 text-uppercase fw-bold text-primary">
                            {{ $tag->name }}
                            <span class="text-secondary ms-1"><i
                                    class="fa-solid fa-hashtag"></i>{{ $pictures->count() }}</span>
                        </h2>
                    </div>
                    <div class="col-12 col-md-5 col-lg-4">
                        <form id="searchForm" method="GET">
                            <div class="input-group search-input-group">
                                <input type="text" name="search" class="form-control shadow-none py-2 px-3"
                                    placeholder="Search..." value="{{ request()->get('search') }}" aria-label="search"
                                    aria-describedby="search" />
                                <button id="searchBtn" class="btn btn-primary" type="submit">
                                    <i class="fa-solid fa-magnifying-glass me-1"></i>
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

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
                        @foreach ($tags as $tag)
                            <a href="{{ route('picturesByTag', $tag->slug) }}"
                                class="badge rounded-pill bg-primary bg-opacity-10 text-primary">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!--~~~~~~~~~~ GALLERY SECTION ~~~~~~~~~~~-->
        <section id="gallery-section" class="gallery-section">
            <div class="container-xl">
                <div class="mansonry-grid row g-4 overflow-hidden">
                    @if ($pictures)
                        @foreach ($pictures as $picture)
                            <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                                <div class="img-card">
                                    <a href="#" class="image-wrapper-link d-block showModalBtn"
                                        data-id="{{ $picture->id }}">
                                        <img class="img-fluid" src="{{ $picture->picture_url }}"
                                            alt="{{ $picture->title }}" />
                                    </a>
                                    <div class="card-hover-content p-2 d-flex flex-column text-white">
                                        <div
                                            class="card-hover-content__header d-flex align-items-center justify-content-between">
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
                                        <div
                                            class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                            <div class="author d-flex align-items-center gap-2">
                                                <img src="{{ $picture->user->picture_url }}" class="rounded-circle d-block"
                                                    alt=".." />
                                                <div>
                                                    <h6 class="mb-0 fw-semibold">
                                                        <a href="{{ route('author.index', $picture->user->slug) }}"
                                                            class="text-decoration-none">{{ $picture->user->full_name }}</a>
                                                    </h6>
                                                    <small class="d-block text-light"><i class="fa-solid fa-award"></i>
                                                        popular</small>
                                                </div>
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

                @if ($pictures->count() < 1)
                    <p class="text-center mt-4">No pictures found</p>
                @endif
                {{ $pictures->links() }}
            </div>
        </section>
    </main>

    @include('_show-modal')

@endsection


@section('scripts')

    <script>
        /*
         *   Show Picture Modal with Data Render
         * 
         *   @pictureShowModal Modal
         *   @dataRenderOnModal DataRedering
         * 
         * */

        // Modal Initialization
        const showModal = new bootstrap.Modal('#pictureShowModal');

        // Data Renering when load modal
        function dataRenderOnModal(picture) {
            let user = picture.user;
            let tags = picture.tags;
            let related_pictures = picture.related;

            if (user.picture) {
                $('#pictureShowModal #userImg').attr('src', '/storage/' + user.picture);
            } else {
                $('#pictureShowModal #userImg').attr('src', '/assets/images/profile-placeholder.jpg');
            }

            $('#pictureShowModal #userName').html(user.first_name + ' ' + user.last_name);
            $('#pictureShowModal #downloadBtn').attr('href', '/download/' + picture.slug);
            $('#pictureShowModal #pictureImg').attr('src', '/storage/' + picture.picture);
            $('#pictureShowModal #pictureImg').attr('alt', picture.title);
            $('#pictureShowModal #pictureTitle').html(picture.title);
            $('#pictureShowModal #pictureViews').html(picture.views);
            $('#pictureShowModal #pictureDownloads').html(picture.downloads);
            $('#pictureShowModal #pictureFavs').html(picture.favorites_count);
            $('#pictureShowModal #picturePublished').html(picture.created_at);
            $('#pictureShowModal #modalFavBtn').attr('data-id', picture.id);
            $('#pictureShowModal #showInPageLink').attr('href', '/gallery/' + picture.slug);
            $('#pictureShowModal #pictureShareLink').attr('data-link', window.location.origin + '/gallery/' + picture.slug);

            if (picture.favorite) {
                $('#pictureShowModal #modalFavBtn').html('<i class="fa-solid fa-heart "></i>');
            } else {
                $('#pictureShowModal #modalFavBtn').html('<i class="fa-regular fa-heart "></i>');
            }

            if (picture.description) {
                $('#pictureShowModal #pictureDescription').removeClass('d-none');
                $('#pictureShowModal #pictureDescription p').html(picture.description);
            }

            $('#pictureTags').empty();
            $.each(tags, function(index, tag) {
                $('#pictureTags').append(
                    '<a class="badge rounded-pill" href="' + tag.slug + '" role="button">' + tag.name + '</a>'
                );
            });


            // Render Related Pictures
            $('#relatedModalPicturesGrid').empty();
            $.each(related_pictures, function(index, related_picture) {
                let item = `
                    <div class="col-sm-6 col-xl-3 grid-item">
                        <div class="img-card">
                            <a href="javascript:void(0);" class="image-wrapper-link d-block showModalRelateBtn"
                                 data-id="${related_picture.id}">
                                <img class="img-fluid" src="/storage/${related_picture.picture}"
                                    alt="${related_picture.title}" style="width: 100%; height: 250px; object-fit: cover" />
                            </a>
                            <div class="card-hover-content p-2 d-flex flex-column text-white">
                                <div
                                    class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        ${related_picture.title}
                                    </div>
                                </div>
                                <div
                                    class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="${related_picture.user.picture ? related_picture.user.picture : '/assets/images/profile-placeholder.jpg'}"
                                            class="rounded-circle d-block" alt="" />
                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="/author/${related_picture.user.slug}" class="text-decoration-none">${related_picture.user.first_name + ' '+ related_picture.user.last_name}</a>
                                            </h6>
                                            <small class="d-block"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <a href="/download/${related_picture.slug}" class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                `
                $('#relatedModalPicturesGrid').append(item);
            });


            // Related Picture Click Render Elements Again
            $('.showModalRelateBtn').on('click', function() {

                let id = $(this).data('id');
                $('#pictureId').html(id);

                let pictureId = $('#pictureId').html();

                axios.get('/getPictureById/' + pictureId)
                    .then(res => {
                        if (res.data) {
                            dataRenderOnModal(res.data);
                        }
                    })
                    .catch(err => {
                        console.error(err);
                    })
            });

        }

        // Show Modal By onClick Picture
        $(document).on('click', '.showModalBtn', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            $('#pictureId').html(id);

            showModal.show();

            let pictureId = $('#pictureId').html();

            axios.get('/getPictureById/' + pictureId)
                .then(res => {
                    if (res.data) {
                        dataRenderOnModal(res.data);
                    }
                })
                .catch(err => {
                    console.error(err);
                })

        });


        // Modal Data Reset on hidden modal
        $('#pictureShowModal').on('hidden.bs.modal', function() {
            $('#pictureShowModal #userImg').attr('src', '/assets/images/profile-placeholder.jpg');
            $('#pictureShowModal #pictureImg').attr('src', '/assets/images/picture-placeholder.jpg');

            $('#pictureShowModal #userName').html('..');
            $('#pictureShowModal #downloadBtn').attr('href', '');
            $('#pictureShowModal #pictureImg').attr('alt', '..');
            $('#pictureShowModal #pictureTitle').html('...');
            $('#pictureShowModal #pictureViews').html('..');
            $('#pictureShowModal #pictureDownloads').html('..');
            $('#pictureShowModal #pictureFavs').html('..');
            $('#pictureShowModal #picturePublished').html('...');
            $('#pictureShowModal #pictureDescription').addClass('d-none');
            $('#pictureShowModal #pictureDescription p').html('...');

            $('#relatedModalPicturesGrid').empty();
        });
    </script>
@endsection
