jQuery(document).ready(function ($) {
    $('html').removeClass('no-js');

    // Handling Search Toggle
    $('.search-nav-item > a').on('click', function () {
        $(".search-overlay").fadeIn();
    });

    $('.search-overlay .close-btn').on('click', function () {
        $(".search-overlay").fadeOut();
    });
});