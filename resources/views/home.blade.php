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
                            <form action="{{ route('gallery') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control shadow-none"
                                        placeholder="Search content..." aria-label="search input"
                                        aria-describedby="search" />
                                    <span class="input-group-text p-0 m-0 border-0" id="search">
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


    <main class="py-4 mb-2 px-sm-2">
        <!--~~~~~~~~~ TAG SECTION START ~~~~~~~~~~-->
        <section class="tag-section mb-4 mt-2">
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
                            <a href="#"
                                class="badge rounded-pill bg-primary bg-opacity-10 text-primary">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!--~~~~~~~~~~ GALLERY SECTION ~~~~~~~~~~~-->
        <section id="gallery-section" class="gallery-section">
            <div class="container-xl">
                <div id="galleryContainer" class="mansonry-grid row g-4 overflow-hidden">

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
            </div>
        </section>
    </main>



    @include('_show-modal')
@endsection


@section('scripts')
    <script>
        /*
         *   Load More Pictures
         *
         *   @ loadMoreData function call
         *   @ load_more_button click
         */


        var paginate = 1;
        loadMoreData(paginate); // first load

        // Load after button click
        $('#loadMorePictureBtn').click(function() {
            var page = $(this).data('paginate');
            loadMoreData(page);
            $(this).data('paginate', page + 1);
        });



        // Load Data on Container
        function loadMoreData(paginate) {
            $.ajax({
                    url: '?page=' + paginate,
                    type: 'get',
                    datatype: 'html',
                    beforeSend: function() {
                        $('.loading').show();
                    }
                })
                .done(function(data) {
                    if (data.length == 0) {
                        $('#noMorePictureAlert').removeClass('d-none');
                        $('#loadMorePictureBtn').hide();
                        $('.loading').hide();
                        return;
                    } else {
                        $('.loading').hide();

                        $("#galleryContainer").append(data);
                        $("#galleryContainer").imagesLoaded(function() {
                            $("#galleryContainer").masonry("reloadItems").masonry("layout");
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
