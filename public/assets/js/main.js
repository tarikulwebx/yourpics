$(document).ready(function() {

    /**Flipster */
    $('.flipster').imagesLoaded(function() {
        $('.flipster').removeClass('d-none');
        $('.flipster-spinner').addClass('d-none');
        $(".flipster").flipster({
            style: "carousel",
            spacing: -0.5,
            nav: false,
            buttons: false,
        });  
    });
      


    /**
     * Gallery Mansonry Grid
     */
    $(".mansonry-grid").imagesLoaded(function () {
        $(".mansonry-grid").masonry({
            itemSelector: '.grid-item',
            columnWidth: '.grid-item',
            // transitionDuration: 0
        });
    });
    

    /**
     * Image Modal Show
     */
    $(".showModal").on("click", function () {
    
        const myModal = new bootstrap.Modal("#imageShowModal");
        myModal.show();

        $("#imageShowModal").on("shown.bs.modal", function () {
            $("#mansonryGridModalImages").imagesLoaded(function () {
                $("#mansonryGridModalImages").masonry({
                    // options
                    itemSelector: ".grid-item",
                });
            });
        });
    });


    /**
     * Uploads Modal Content Work
     */
    function renderData($picture) {
        let $user = $picture.user;
        let tags = $picture.tags;
        $('#imageShowProfileUploadsModal #userName').html($user.first_name + ' ' + $user.last_name);
        $('#imageShowProfileUploadsModal #userRank').html($picture.user_rank);

        $('#imageShowProfileUploadsModal  #pictureTitle').html($picture.title);
        

        $('#imageShowProfileUploadsModal  #pictureHolderImg').attr("src", '/storage/' + $picture.picture);
        if ($user.picture) {
            $('#imageShowProfileUploadsModal  #authorImage').attr('src', '/storage/' + $user.picture);
        }
        $('#imageShowProfileUploadsModal #downloadBtn').attr('href', '/download/' +$picture.slug);
        $('#imageShowProfileUploadsModal #totalViews').html($picture.views);
        $('#imageShowProfileUploadsModal #totalDownloads').html($picture.downloads);
        $('#imageShowProfileUploadsModal #totalFavs').html($picture.favorites_count);
        $('#imageShowProfileUploadsModal #uploadDate').html($picture.created_at);

        $('#imageShowProfileUploadsModal .editLink').attr('href', '/profile/'+$user.slug+'/uploads/'+$picture.slug+'/edit')

        if ($picture.description) {
            $('#imageShowProfileUploadsModal .description-wrapper').removeClass('d-none');
            $('#imageShowProfileUploadsModal #description').html($picture.description);
        }
        

         $('#imageShowProfileUploadsModal #pictureTags').empty();
        $.each(tags, function(index, tag) {
            $('#imageShowProfileUploadsModal #pictureTags').append('<a class="badge rounded-pill" href="/tag/'+tag.slug+'" role="button">'+tag.name+'</a>');
        });
    }


    $(document).on('click', '.showUploadsModal', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        const myModal = new bootstrap.Modal("#imageShowProfileUploadsModal");
        myModal.show();

        axios.get('/profile/getPictureById/'+id)
        .then(res => {
            $picture = res.data.picture;
            renderData($picture);
            // console.log( $picture)
        })
        .catch(err => {
            console.error(err); 
        });

    
    });

    $("#imageShowProfileUploadsModal").on('hidden.bs.modal', function() {
        $('#imageShowProfileUploadsModal  #pictureHolderImg').attr('src', '/assets/images/picture-placeholder.jpg');
    });


    /**
     * Author Gallery Mansonry
     */

     $("#mansonryGridAuthorUploads").imagesLoaded(function () {
            $("#mansonryGridAuthorUploads").masonry({
                itemSelector: ".grid-item",
            });
        });

    $('button[data-bs-toggle="tab"]').on("shown.bs.tab", function () {
        $("#mansonryGridAuthorFavs").imagesLoaded(function () {
            $("#mansonryGridAuthorFavs").masonry({
                itemSelector: ".grid-item",
            });
        });
        
    });


    


    $('button[data-bs-toggle="tab"]').on("shown.bs.tab", function () {
        $(".gallery-grid-abcd").imagesLoaded(function () {
            $(".gallery-grid-abcd").masonry({
                // options
                itemSelector: ".grid-item",
            });
            
        });
        
    });


    /**
     * Tags Navigation
     */
    $(".tag-section .btn-left").on("click", function () {
        let currentValue = $(".tags-wrapper").scrollLeft();
        $(".tags-wrapper").animate(
            {
                scrollLeft: currentValue - 100,
            },
            400
        );
    });

    $(".tag-section .btn-right").on("click", function () {
        let currentValue = $(".tags-wrapper").scrollLeft();

        $(".tags-wrapper").animate(
            {
                scrollLeft: currentValue + 100,
            },
            400
        );
    });



    /**
     * Tooltip Initialize
     */
    const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'
    );
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );


    /**
     * Copy to clipboard with bootstrap tooltip
     */
    $(".copyToClipboard").on("click", function () {
        let copyText = $(this).data("link");
        navigator.clipboard.writeText(copyText);
        $(".copyToClipboard")
            .tooltip("dispose")
            .tooltip({ title: "Link Copied!" })
            .tooltip("show");
    });



    /**
     * Select 2
     */
    $('.select2-tags').select2({
        theme: 'bootstrap-5',
        placeholder: 'Select an option',
        width: '100%',
    });



    /**
     * Favorite Item control
     */
    $(document).on('click', '.fav-btn', function() {
        var picture_id = $(this).data('id');
        axios.post('/addToFavorite',{id: picture_id})
        .then(res => {
            // console.log(res)
            if (res.status == 200) {
                const toast = new bootstrap.Toast($('#successToast'));
                $('#successToast .toastMessage').html(res.data.message);
                toast.show();
                $(this).addClass('text-white').html('<i class="fa-solid fa-heart "></i>');
            } else if (res.status == 201) {
                const toast = new bootstrap.Toast($('#warningToast'));
                $('#warningToast .toastMessage').html(res.data.message);
                toast.show();
                $(this).removeClass('text-white').html('<i class="fa-regular fa-heart "></i>');
            }
        })
        .catch(err => {
            console.error(err); 
        })
    });

    $(document).on('click', '#modalFavBtn', function () { 
        
        var picture_id = $(this).data('id');
        
        axios.post('/addToFavorite',{id: picture_id})
        .then(res => {
            // console.log(res)
            if (res.status == 200) {
                $(this).html('<i class="fa-solid fa-heart "></i>');
                $('.fav-btn[data-id='+picture_id+']').addClass('text-white').html('<i class="fa-solid fa-heart "></i>');
                const toast = new bootstrap.Toast($('#successToast'));
                $('#successToast .toastMessage').html(res.data.message);
                toast.show();
            } else if (res.status == 201) {
                $(this).html('<i class="fa-regular fa-heart "></i>');
                $('.fav-btn[data-id='+picture_id+']').addClass('text-white').html('<i class="fa-regular fa-heart "></i>');
                const toast = new bootstrap.Toast($('#warningToast'));
                $('#warningToast .toastMessage').html(res.data.message);
                toast.show();
            }
        })
        .catch(err => {
            console.error(err); 
        })
    });

});
