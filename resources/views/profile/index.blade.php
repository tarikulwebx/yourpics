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
                {{ $user->rank }}
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
                Uploads ({{ $upload_count }})
            </button>
            <button class="nav-link" id="nav-favs-tab" data-bs-toggle="tab" data-bs-target="#nav-favs" type="button"
                role="tab" aria-controls="nav-favs" aria-selected="false">
                Favourites ({{ $favs_count }})
            </button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <!-- Uploads Gallery -->
        <div class="tab-pane fade show active" id="nav-uploads" role="tabpanel" aria-labelledby="nav-uploads-tab"
            tabindex="0">
            <!--~~~~~~~~~~ UPLOADS GALLERY SECTION ~~~~~~~~~~~-->
            <section id="gallery-section" class="gallery-section uploads">
                <div id="mansonryGridAuthorUploads" class="row g-4 overflow-hidden">

                </div>

                <h5 class="text-center loading text-primary fw-bold mt-4">Loading...</h5>
                <p id="noMorePictureAlert" class="d-none text-center mt-3">No more pictures...</p>

                <!-- Load More Btn -->
                <div class="text-center mt-4 pt-2 d-flex align-items-center justify-content-between gap-3">
                    <hr class="border border-primary border-1 opacity-25 w-100" />
                    <button id="loadMorePictureBtn" class="btn btn-outline-primary rounded-circle loadmore-btn shadow"
                        data-paginate="2">
                        <span class="d-block">Load</span>
                        <span class="d-block">More</span>
                    </button>
                    <hr class="border border-primary border-1 opacity-25 w-100" />
                </div>
            </section>
        </div>

        <!-- Favs Gallery -->
        <div class="tab-pane fade" id="nav-favs" role="tabpanel" aria-labelledby="nav-favs-tab" tabindex="0">
            <!--~~~~~~~~~~ FAVS GALLERY SECTION ~~~~~~~~~~~-->
            <section id="gallery-section" class="gallery-section favs-section">
                <div id="mansonryGridAuthorFavs" class="row g-4 overflow-hidden">

                </div>
                <h5 class="text-center loading text-primary fw-bold mt-4">Loading...</h5>
                <p id="noMorePictureAlert" class="d-none text-center mt-3">No more pictures...</p>

                <!-- Load More Btn -->
                <div class="text-center mt-4 pt-2 d-flex align-items-center justify-content-between gap-3">
                    <hr class="border border-primary border-1 opacity-25 w-100" />
                    <button id="loadMoreFavPictureBtn" class="btn btn-outline-primary rounded-circle loadmore-btn shadow"
                        data-paginate="2">
                        <span class="d-block">Load</span>
                        <span class="d-block">More</span>
                    </button>
                    <hr class="border border-primary border-1 opacity-25 w-100" />
                </div>
            </section>
        </div>
    </div>
@endsection


@section('profile-modal')
    @include('profile._modal-uploads-show')
    @include('_show-modal')
@endsection


@section('scripts')
    <script>
        /*
         *   Load More Pictures
         *
         *   @ loadMoreUploadsData function call
         *   @ load_more_button click
         */


        var uploadsPaginate = 1;
        loadMoreUploadsData(uploadsPaginate); // first load

        // Load after button click
        $('.uploads #loadMorePictureBtn').click(function() {
            var page = $(this).data('paginate');
            loadMoreUploadsData(page);
            $(this).data('paginate', page + 1);
        });

        // Load Data on Container
        function loadMoreUploadsData(paginate) {
            $.ajax({
                    url: '?uploads_page=' + paginate,
                    type: 'get',
                    datatype: 'html',
                    beforeSend: function() {
                        $('.uploads .loading').show();
                    }
                })
                .done(function(data) {
                    if (data.length == 0) {
                        $('.uploads #noMorePictureAlert').removeClass('d-none');
                        $('.uploads #loadMorePictureBtn').hide();
                        $('.uploads .loading').hide();
                        return;
                    } else {
                        $('.uploads .loading').hide();

                        $("#mansonryGridAuthorUploads").append(data);
                        $("#mansonryGridAuthorUploads").imagesLoaded(function() {
                            $("#mansonryGridAuthorUploads").masonry("reloadItems").masonry("layout");
                        })

                        // $('#galleryContainer').append(data);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Something went wrong.');
                });
        }


        /*
         * Load More Favorites
         */
        $('#nav-favs-tab[data-bs-toggle="tab"]').on("shown.bs.tab", function() {
            var favsPaginate = 1;
            $("#mansonryGridAuthorFavs").empty();
            loadMoreFavsData(favsPaginate); // first load
        });

        // Load more favs after button click
        $('.favs-section #loadMoreFavPictureBtn').click(function() {
            var page = $(this).data('paginate');
            loadMoreFavsData(page);
            $(this).data('paginate', page + 1);
        });

        // Load more Favs function
        function loadMoreFavsData(paginate) {
            $.ajax({
                    url: '?favs_page=' + paginate,
                    type: 'get',
                    data: {
                        fav: 1
                    },
                    datatype: 'html',
                    beforeSend: function() {
                        $('.favs-section .loading').show();
                    }
                })
                .done(function(data) {
                    if (data.length == 0) {
                        $('.favs-section #noMorePictureAlert').removeClass('d-none');
                        $('.favs-section #loadMoreFavPictureBtn').hide();
                        $('.favs-section .loading').hide();
                        return;
                    } else {
                        $('.favs-section .loading').hide();

                        $("#mansonryGridAuthorFavs").append(data);
                        $("#mansonryGridAuthorFavs").imagesLoaded(function() {
                            $("#mansonryGridAuthorFavs").masonry("reloadItems").masonry("layout");
                        })

                        // $('#galleryContainer').append(data);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Something went wrong.');
                });
        }
    </script>


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

            $('#pictureShowModal #userRank').html(picture.user_rank);

            $('#pictureShowModal #userName').html(user.first_name + ' ' + user.last_name).attr('href', '/author/' + user
                .slug);
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

            $('#pictureShowModal #pictureTags').empty();
            $.each(tags, function(index, tag) {
                $('#pictureShowModal #pictureTags').append(
                    '<a class="badge rounded-pill" href="/tag/' + tag.slug + '" role="button">' + tag.name +
                    '</a>'
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
                                            <small class="d-block fw-normal text-white"><i class="fa-solid fa-award"></i>
                                                ${related_picture.user.rank}</small>
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
            $('#pictureShowModal #userRank').html('..');
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
