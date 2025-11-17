(function () {
  const activateSlide = (container, index) => {
    const slides = container.querySelectorAll('.hour-ai-slide');
    const dots = container.querySelectorAll('.hour-ai-slider__dot');

    slides.forEach((slide, idx) => {
      slide.classList.toggle('is-active', idx === index);
    });

    dots.forEach((dot, idx) => {
      dot.classList.toggle('is-active', idx === index);
      dot.setAttribute('aria-pressed', idx === index ? 'true' : 'false');
    });
  };

  const bindSlider = (container) => {
    const slides = container.querySelectorAll('.hour-ai-slide');
    if (!slides.length) return;

    const defaultInterval = 9000;
    const configuredInterval = parseInt(container.dataset.speed, 10);
    const interval = Number.isFinite(configuredInterval) && configuredInterval > 0 ? configuredInterval : defaultInterval;

    let current = 0;
    let timer = null;

    const next = () => {
      current = (current + 1) % slides.length;
      activateSlide(container, current);
    };

    const start = () => {
      timer = window.setInterval(next, interval);
    };

    const stop = () => {
      if (timer) {
        window.clearInterval(timer);
      }
    };

    container.querySelectorAll('.hour-ai-slider__dot').forEach((dot) => {
      dot.addEventListener('click', () => {
        const target = parseInt(dot.dataset.target, 10);
        if (Number.isNaN(target)) return;
        stop();
        current = target;
        activateSlide(container, current);
        start();
      });
    });

    activateSlide(container, 0);
    start();

    container.addEventListener('mouseenter', stop);
    container.addEventListener('mouseleave', start);
  };

  window.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.hour-ai-slider').forEach(bindSlider);
  });
})();
