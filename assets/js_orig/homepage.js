$(function () {
    // =================================
    // Fixed header
    // =================================
    window.addEventListener("scroll", function () {
        var topbar = document.querySelector(".header-fp");
        if (topbar) {
            if (window.scrollY >= 60) {
                topbar.classList.add("header-sticky");
            } else {
                topbar.classList.remove("header-sticky");
            }
        }
    });


      $('.leadership-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        margin: 30,
        navText: [
            '<i class="ti ti-arrow-left display-6 round-48 hstack justify-content-center bg-secondary rounded-circle"></i>',  // Previous button
            '<i class="ti ti-arrow-right display-6 round-48 hstack justify-content-center bg-secondary rounded-circle"></i>'  // Next button
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            992: {
                items: 3
            },
            1024: {
                items: 4
            }
        }
    })

    $('.template-carousel').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2500,
        margin: 30,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            992: {
                items: 3
            },
            1024: {
                items: 4
            }
        }
    })

    $('.testimonial-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        navText: [
            '<i class="ti ti-chevron-left fs-4 round-32 hstack justify-content-center bg-primary-subtle rounded-circle"></i>',  // Previous button
            '<i class="ti ti-chevron-right fs-4 round-32 hstack justify-content-center bg-primary-subtle rounded-circle"></i>'  // Next button
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

    $(document).on('click', '.header-fp .navbar-nav .nav-link', function(){
        $(this).addClass('active').siblings().removeClass('active')
    })
    
});