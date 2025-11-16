(function ($) {
    'use strict';

    function initSlider($slider) {
        const $slides = $slider.find('.ellipsis-slide');
        const $dots = $slider.find('.ellipsis-dot');
        let current = 0;
        let timer;

        const autoplayEnabled = $slider.data('autoplay') === true || $slider.data('autoplay') === 'true';
        const speed = parseInt($slider.data('speed'), 10) || 7000;

        function setActive(index) {
            current = index;
            $slides.removeClass('active');
            $dots.removeClass('active');
            $slides.eq(index).addClass('active');
            $dots.eq(index).addClass('active');
        }

        function nextSlide() {
            const next = (current + 1) % $slides.length;
            setActive(next);
        }

        function startAutoplay() {
            if (!autoplayEnabled) return;
            stopAutoplay();
            timer = setInterval(nextSlide, speed);
        }

        function stopAutoplay() {
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
        }

        $dots.on('click', function () {
            const target = parseInt($(this).data('index'), 10);
            setActive(target);
            startAutoplay();
        });

        $slider.on('mouseenter', stopAutoplay);
        $slider.on('mouseleave', startAutoplay);

        // Init
        setActive(0);
        startAutoplay();
    }

    $(window).on('elementor/frontend/init', function () {
        const selector = '.elementor-widget-ellipsis_slider .ellipsis-slider';

        elementorFrontend.hooks.addAction('frontend/element_ready/global', function (scope) {
            const $sliders = $(scope).find(selector);
            if (!$sliders.length) return;

            $sliders.each(function () {
                const $slider = $(this);
                if (!$slider.data('initialized')) {
                    initSlider($slider);
                    $slider.data('initialized', true);
                }
            });
        });
    });
})(jQuery);
