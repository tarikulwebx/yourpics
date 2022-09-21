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
    $(".gallery-grid").imagesLoaded(function () {
        $(".gallery-grid").masonry({
            // options
            itemSelector: ".grid-item",
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
     * Image Modal Show
     */
    $(".show-modal").on("click", function () {
        const myModal = new bootstrap.Modal("#imageShowModal");
        myModal.show();

        $("#imageShowModal").on("shown.bs.modal", function () {
            $("#gallery-grid-related-images").imagesLoaded(function () {
                $("#gallery-grid-related-images").masonry({
                    // options
                    itemSelector: ".grid-item",
                });
            });
        });
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
     * Author Gallery Mansonry
     */

     $("#gallery-grid-author-upload-images").imagesLoaded(function () {
            $("#gallery-grid-author-upload-images").masonry({
                itemSelector: ".grid-item",
            });
        });

    $('button[data-bs-toggle="tab"]').on("shown.bs.tab", function () {
        $("#gallery-grid-author-favs-image").imagesLoaded(function () {
            $("#gallery-grid-author-favs-image").masonry({
                itemSelector: ".grid-item",
            });
        });
        
    });


});
