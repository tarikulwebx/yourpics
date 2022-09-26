@extends('layouts.master')

@section('title', 'Gallery')

@section('content')
    <main class="py-4 my-2 px-sm-2">
        <!--~~~~~~~~ FILTER SECTION START ~~~~~~~~-->
        <section class="filter-section mb-4">
            <div class="container-xl">
                <div class="d-flex align-items-md-center gap-3 justify-content-between flex-column flex-md-row">
                    <div>
                        <h3 class="mb-0 text-uppercase fw-bold text-primary">
                            Gallery
                            <i class="fa-solid fa-grip text-secondary ms-1"></i>
                        </h3>
                    </div>
                    <form id="searchForm" method="GET">
                        <div class="d-flex flex-column flex-sm-row gap-3">
                            {{-- <div class="select-input-wrapper shadow-sm rounded-1">
                                <select class="select2-tags form-control w-100" name="tags">
                                    <option></option>
                                    <option value="tag1">Tag one</option>
                                    <option value="tag2">Tag two</option>
                                    <option value="tag3">Tag three</option>
                                </select>
                            </div> --}}
                            <div class="input-group shadow-sm rounded-1 search-input-group">
                                <input id="searchInput" type="text" name="search" class="form-control shadow-none"
                                    value="{{ request()->get('search') }}" placeholder="Search..." aria-label="Search" />
                                <button id="searchBtn" class="btn btn-primary" type="submit">
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
                                                        <a href="#"
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
                    '<a class="badge rounded-pill" href="#" role="button">' + tag.name + '</a>'
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
                                                <a href="#" class="text-decoration-none">${related_picture.user.first_name + ' '+ related_picture.user.last_name}</a>
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
