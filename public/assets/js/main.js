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
            // options
            itemSelector: ".grid-item",
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


    function renderData($picture) {
        let $user = $picture.user;
        let tags = $picture.tags;
        $('#imageShowProfileUploadsModal #userName').html($user.first_name + ' ' + $user.last_name);
        $('#imageShowProfileUploadsModal  #pictureTitle').html($picture.title);

        $('#imageShowProfileUploadsModal  #pictureHolderImg').attr("src", '/storage/' + $picture.picture);
        if ($user.picture) {
            $('#imageShowProfileUploadsModal  #authorImage').attr('src', '/storage/' + $user.picture);
        }
        $('#downloadBtn').attr('href', '/download/' +$picture.slug);
        $('#totalViews').html($picture.views);
        $('#totalDownloads').html($picture.downloads);
        $('#uploadDate').html($picture.created_at);

        $('#editLink').attr('href', '/profile/'+$user.slug+'/uploads/'+$picture.slug+'/edit')

        if ($picture.description) {
            $('.description-wrapper').removeClass('d-none');
            $('#description').html($picture.description);
        }
        

         $('#pictureTags').empty();
        $.each(tags, function(index, tag) {
            $('#pictureTags').append('<a class="badge rounded-pill" href="#" role="button">'+tag.name+'</a>');
        });
    }


    $('.showUploadsModal').on('click', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        const myModal = new bootstrap.Modal("#imageShowProfileUploadsModal");
        myModal.show();

        axios.get('/profile/getPictureById/'+id)
        .then(res => {
            $picture = res.data.picture;
            renderData($picture);
            console.log( $picture)
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
});
