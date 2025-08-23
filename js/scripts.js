jQuery(function ($) {

    $('.colleague').owlCarousel({
        rtl: true,
        responsiveClass: true,
        margin: 30,
        dots: false,
        autoplay: 2400,
        loop: true,
        autoplayStopOnLast: false,
        autoWidth: false,
        nav: true,
        navText: ["<i class='fa fa-angle-right'></i>", "<i class='fa fa-angle-left'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            800: {
                items: 2
            },
            1200: {
                items: 4
            }

        }

    });


}); // JQuery end
