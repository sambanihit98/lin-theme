jQuery(document).ready(function ($) {

    let currentCategory = 'all';

    function loadPortfolio(category = 'all', page = 1) {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'lin_filter_portfolio',
                category: category,
                page: page
            },
            // Loading animations
            // beforeSend: function () {
            //     $('#portfolio-container').html(`
            //         <div class="d-flex justify-content-center my-5">
            //             <div class="spinner-border text-primary" role="status">
            //                 <span class="visually-hidden">Loading...</span>
            //             </div>
            //         </div>
            //     `);
            // },
            success: function (response) {
                $('#portfolio-container').html(response);
            }
        });
    }

    // Initial load
    loadPortfolio();

    // Filter click
    $('.filter-btn').on('click', function () {
        currentCategory = $(this).data('category');

        $('.filter-btn').removeClass('active');
        $(this).addClass('active');

        loadPortfolio(currentCategory, 1);
    });

    // Pagination click
    $(document).on('click', '#portfolio-pagination .filter-btn', function () {
        let page = $(this).data('page');
        if (!page) return;

        loadPortfolio(currentCategory, page);

        // Update active class for numeric buttons only
        $('#portfolio-pagination .filter-btn').removeClass('active');
        $(this).addClass('active');
    });

});