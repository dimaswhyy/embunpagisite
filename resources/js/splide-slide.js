import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', function () {
  if (document.querySelector('.slide-home')) {
    new Splide('.slide-home', {
      type: 'loop',
      autoplay: true,
      padding: '5rem',
      interval: 2000,
    }).mount();
  }

  const optionSlide4Column = {
    perPage: 4,
    padding: '5px',
    breakpoints: {
      980: { perPage: 2 },
      680: { perPage: 1 }
    }
  };

  const optionSlide3Column = {
    perPage: 3,
    padding: '5px',
    breakpoints: {
      980: { perPage: 2 },
      680: { perPage: 1 }
    }
  };

  ['slide-news', 'slide-core-values', 'slide-team', 'slide-how-to-enroll'].forEach(selector => {
    if (document.querySelector(`.${selector}`)) {
      new Splide(`.${selector}`, selector === 'slide-news' || selector === 'slide-how-to-enroll' ? optionSlide3Column : optionSlide4Column).mount();
    }
  });

  if (document.getElementById('testimoni-carousel') && document.getElementById('testimoni-thumbnail')) {
    const testimoniCarousel = new Splide('#testimoni-carousel', {
      type: 'fade',
      pagination: false,
      arrows: false,
    }).mount();

    const testimoniThumbnail = new Splide('#testimoni-thumbnail', {
      fixedWidth: 90,
      fixedHeight: 90,
      isNavigation: true,
      arrows: false,
      gap: 10,
      focus: 'center',
      direction: 'ttb',
      height: '310px',
      breakpoints: {
        1024: {
          direction: 'ltr',
          height: 'auto',
          fixedWidth: 80,
          fixedHeight: 80,
        },
        600: {
          fixedWidth: 40,
          fixedHeight: 40,
        }
      }
    }).mount();

    testimoniCarousel.sync(testimoniThumbnail);
  }
});