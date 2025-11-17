(function () {
  function initSlider(slider) {
    const slides = Array.from(slider.querySelectorAll('.ai-banner-slide'));
    const dots = Array.from(slider.querySelectorAll('.ai-banner-slider__dot'));
    if (!slides.length) return;

    let current = 0;
    let timer = null;
    const autoplay = slider.dataset.autoplay !== 'false';
    const interval = parseInt(slider.dataset.interval, 10) || 7000;

    const setActive = (index) => {
      slides.forEach((slide, i) => {
        slide.classList.toggle('is-active', i === index);
      });
      dots.forEach((dot, i) => {
        dot.classList.toggle('is-active', i === index);
      });
      current = index;
    };

    const nextSlide = () => {
      const next = (current + 1) % slides.length;
      setActive(next);
    };

    const resetTimer = () => {
      if (!autoplay) return;
      clearInterval(timer);
      timer = setInterval(nextSlide, interval);
    };

    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        setActive(index);
        resetTimer();
      });
    });

    slider.addEventListener('mouseenter', () => clearInterval(timer));
    slider.addEventListener('mouseleave', resetTimer);

    setActive(0);
    resetTimer();
  }

  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.ai-banner-slider').forEach(initSlider);
  });
})();
