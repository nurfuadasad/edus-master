;(function ($) {

    "use strict";
    /*---------------------------------------------------
      * Initialize all widget js in elementor init hook
      ---------------------------------------------------*/
    $(window).on('elementor/frontend/init', function () {
        // Brand Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/edus-brand-carousel-one-widget.default', function ($scope) {
            activeBrandSlider($scope);
        });
        // Service Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/edus-course-slider-one-widget.default', function ($scope) {
            activeCourseGridSliderOne($scope);
        });
        // Service Slider Four
        elementorFrontend.hooks.addAction('frontend/element_ready/edus-course-slider-two-widget.default', function ($scope) {
            activeCourseGridSliderOne($scope);
        });
        // Testimonial Slider one
        elementorFrontend.hooks.addAction('frontend/element_ready/edus-testimonial-one-widget.default', function ($scope) {
            activeTestimonialSliderOne($scope);
        });
        // Testimonial Slider one
        elementorFrontend.hooks.addAction('frontend/element_ready/edus-testimonial-two-widget.default', function ($scope) {
            activeTestimonialSliderOne($scope);
        });
        // Team Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/edus-tutor-member-one-widget.default', function ($scope) {
            activeTutorMemberSliderOne($scope);
        });
        // Blog Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/edus-blog-one-widget.default', function ($scope) {
            activeBlogGridSliderOne($scope);
        });
        // Blog Slider Two
        elementorFrontend.hooks.addAction('frontend/element_ready/edus-blog-two-widget.default', function ($scope) {
            activeBlogGridSliderOne($scope);
        });
        /* Counter Up */
        elementorFrontend.hooks.addAction('frontend/element_ready/edus-counterup-one-widget.default', function ($scope) {
            counterupInit($scope.find('.count-num'));
        });

    });

    /*----------------------------------
        Brand Slider Widget
    --------------------------------*/
    function activeBrandSlider($scope) {
        var el = $scope.find('.brands-carousel')
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return;
        }
        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        }
        wowSlickInit($selector, sliderSettings);
    }

    /*----------------------------
       * Testimonial Slider
       * --------------------------*/
    function activeTestimonialSliderOne($scope) {
        var el = $scope.find('.testimonial-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }

        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: elSettings.nav === 'yes',
            appendArrows: $scope.find('.testimonial-carousel-controls .slider-nav'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            centerMode: elSettings.center === 'yes',
            centerPadding: '0',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        }
        wowSlickInit($selector, sliderSettings);

    }


    /*----------------------------
    * Blog Post Grid Slider
    * --------------------------*/
    function activeBlogGridSliderOne($scope) {
        var el = $scope.find('.blog-grid-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }
        let $selector = '#' + el.attr('id');
        let sliderSettings = {
            infinete: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: elSettings.nav === 'yes',
            appendArrows: $scope.find('.blog-slider-controls .slider-nav'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        }
        wowSlickInit($selector, sliderSettings);
    }


    /*----------------------------
       * Service Grid Slider
       * --------------------------*/
    function activeCourseGridSliderOne($scope) {
        var el = $scope.find('.course-grid-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }

        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: elSettings.nav === 'yes',
            appendArrows: $scope.find('.course-slider-controls .slider-nav'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            centerMode: elSettings.center === 'yes',
            centerPadding: '0',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        }
        wowSlickInit($selector, sliderSettings);
    }


    /*----------------------------
         Team Member Slider
    * --------------------------*/
    function activeTutorMemberSliderOne($scope) {
        var el = $scope.find('.team-member-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }

        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            centerMode: elSettings.center === 'yes',
            centerPadding: '0',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        }
        wowSlickInit($selector, sliderSettings);
    }

    //slick init function
    function wowSlickInit($selector, settings, animateOut = false) {
        $($selector).slick(settings);
    }

    /*------------------------------
            counter section activation
          -------------------------------*/
    function counterupInit($scope) {
        $scope.counterUp({
            delay: 20,
            time: 3000
        });
    }
    /**-----------------------------
     *  countdown
     * ---------------------------*/

    var maycountdown = $("#mycountdown");
    if (maycountdown.length > 0) {
        maycountdown.countdown(maycountdown.data('countdown'), function(event) {
            $('.month').text(
                event.strftime('%m')
            );
            $('.days').text(
                event.strftime('%n')
            );
            $('.hours').text(
                event.strftime('%H')
            );
            $('.mins').text(
                event.strftime('%M')
            );
            $('.secs').text(
                event.strftime('%S')
            );
        });

    }
    //===== niceSelect js

    $('.dream-course-category select').niceSelect();

    $(document).ready(function () {
        /*---------------------------------
        * Magnific Popup
        * --------------------------------*/
        $('.video-play-btn,.video-play-btn-02,.play-video-btn,.button-video').magnificPopup({
            type: 'video'
        });

    });

})(jQuery);