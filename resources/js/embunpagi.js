import './bootstrap';

import Splide, { Autoplay } from '@splidejs/splide';
window.Splide = Splide;
import { Fancybox } from "@fancyapps/ui";
import Isotope from 'isotope-layout';

import * as echarts from 'echarts/core';
import { PieChart } from 'echarts/charts';
import { TooltipComponent } from 'echarts/components';
import { CanvasRenderer } from 'echarts/renderers';
import { TitleComponent } from 'echarts/components';
echarts.use([PieChart, TooltipComponent, CanvasRenderer, TitleComponent]);

const getUriPath = window.location.pathname;
const lastSegment = getUriPath.split("/").filter(Boolean).pop();

const btnMenuMobile = document.getElementById('btn-menu-mobile');
if (btnMenuMobile) {
  btnMenuMobile.addEventListener('click', function() {
    const menuElm = document.getElementById('menu-mobile');

    if (menuElm.classList.contains('block')) {
      menuElm.classList.remove('block');
      menuElm.classList.add('hidden');
    } else {
      menuElm.classList.remove('hidden');
      menuElm.classList.add('block');
    }
  });
}

window.addEventListener('scroll', () => {
  const header = document.getElementById('header-main');
  if (window.scrollY > 100) {
    header.classList.add('bg-white');
  } else {
    header.classList.remove('bg-white');
  }
});

document.addEventListener('DOMContentLoaded', function () {
  if (document.querySelector('.slide-home')) {
    new Splide('.slide-home', {
      type: 'loop',
      autoplay: true,
      padding: '5rem',
      interval: 2000,
    }).mount({ Autoplay });
  }

  if (document.querySelector('.slide-alumni')) {
    // Use a lightweight vanilla carousel for the alumni slider (no Splide)
    (function initAlumniVanilla() {
      const root = document.querySelector('.slide-alumni');
      const track = root.querySelector('.splide__track');
      if (!track) return;
      const list = track.querySelector('.splide__list');
      const slides = Array.from(list.children);
      if (!slides.length) return;

      let idx = 0;
      let timer = null;
      const interval = 10000; // 10s

      // Ensure flex layout and slide sizing
      list.style.display = 'flex';
      list.style.transition = 'transform 0.7s ease';
      list.style.willChange = 'transform';

      function setSizes() {
        const w = track.clientWidth;
        slides.forEach(s => {
          s.style.flex = '0 0 ' + w + 'px';
          s.style.width = w + 'px';
          s.style.boxSizing = 'border-box';
        });
      }

      function goTo(i) {
        idx = (i + slides.length) % slides.length;
        const offset = idx * track.clientWidth;
        list.style.transform = `translateX(-${offset}px)`;
      }

      function next() { goTo(idx + 1); }

      function start() {
        stop();
        timer = setInterval(next, interval);
      }

      function stop() {
        if (timer) {
          clearInterval(timer);
          timer = null;
        }
      }

      // Resize observer for responsive sizing
      window.addEventListener('resize', () => {
        setSizes();
        goTo(idx);
      });

      // Initialize
      setSizes();
      goTo(0);
      start();

      // Optional: allow prev/next buttons if present
      const prev = root.querySelector('.splide__arrow--prev');
      const nextBtn = root.querySelector('.splide__arrow--next');
      if (prev) prev.addEventListener('click', () => { goTo(idx - 1); });
      if (nextBtn) nextBtn.addEventListener('click', () => { goTo(idx + 1); });

      // Keep autoplay running even if user focuses or hovers
      root.addEventListener('mouseenter', () => { /* no-op to keep running */ });
      root.addEventListener('focusin', () => { /* no-op */ });
    })();
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
      pagination: false,
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

  const elem = document.querySelector('.list-facilities');
  if (elem) {
    const iso = new Isotope(elem, {
      itemSelector: '.item',
      layoutMode: 'fitRows',
    });

    document.querySelectorAll('.filter-button').forEach(button => {
      button.addEventListener('click', () => {
        document.querySelectorAll('.filter-button').forEach(itemButton => {
          itemButton.classList.replace('bg-blue', 'bg-white');
          itemButton.classList.replace('text-white', 'text-blue');
        });

        button.classList.replace('bg-white', 'bg-blue');
        button.classList.replace('text-blue', 'text-white');

        iso.arrange({ filter: button.getAttribute('data-filter') });
      });
    });
  }
});

Fancybox.bind("[data-fancybox]", {});

const chartProgramHighlightsDom = document.getElementById('chart-program-highlights');
if (chartProgramHighlightsDom) {
  const chartProgramHighlights = echarts.init(chartProgramHighlightsDom);
  var option;

  // Function to simulate background-size cover using canvas
  function createResizedImage(src, width, height) {
    return new Promise((resolve, reject) => {
      const img = new Image();
      img.crossOrigin = 'Anonymous'; // Prevent CORS issues
      img.src = src;
      img.onload = () => {
        const canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;
        const ctx = canvas.getContext('2d');
        const scale = Math.max(canvas.width / img.width, canvas.height / img.height);
        const x = (canvas.width / 2) - (img.width / 2) * scale;
        const y = (canvas.height / 2) - (img.height / 2) * scale;
        ctx.drawImage(img, x, y, img.width * scale, img.height * scale);
        resolve(canvas.toDataURL());
      };
      img.onerror = reject;
    });
  }

  // Wait until all images are loaded
  let imagesLoaded = 0;
  function onImageLoad(appendData) {
    imagesLoaded++;
    if (imagesLoaded > 1) {
      // All images are loaded, set the option for the chart
      option = {
        title: {
          text: 'Program Highlights',  // The title text
          left: '50%',  // Horizontally center
          top: '50%',   // Vertically center
          textAlign: 'center',  // Ensure the title is aligned in the center
          textVerticalAlign: 'middle', // Align text vertically in the middle
          textStyle: {
            fontSize: 24,
            fontWeight: '400',
            color: '#1C94D2',
            lineHeight: 32,  // Set line height for better spacing between lines
            width: 120,  // Set a max width to force automatic wrapping
            overflow: 'break'
          }
        },
        tooltip: {
          trigger: 'item', // Show tooltip when hovering over an item
          formatter: function (params) {
            // Access custom properties using params.data
            return `
              <div style="max-width: 200px; white-space: wrap;">
                ${params.data.customInfo}
              </div>
            `;
          },
          backgroundColor: '#fff', // Tooltip background color
          borderColor: '#ccc', // Border color around tooltip
          borderWidth: 1,
          textStyle: {
            color: '#333', // Text color
            fontSize: 16,
            fontWeight: '400'
          },
          extraCssText: 'box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);', // Add shadow for style
        },
        series: [
          {
            type: 'pie',
            radius: ['35%', '70%'], // Donut chart
            avoidLabelOverlap: false,
            label: {
              show: true,
              position: 'inside',  // Move label inside donut segments
              overflow: 'break'
            },
            labelLine: {
              show: false,  // Hide the label lines because labels are inside
            },
            data: appendData
          }
        ]
      };

      // Render the chart with the option
      chartProgramHighlights.setOption(option);
    }
  }

  const dataColor = [
    '0, 177, 219, 0.4', // blue light
    '55, 225, 172, 0.4', // green
    '0, 203, 210, 0.4', // green light
    '161, 240, 136, 0.4', // green pastel
    '249, 248, 113, 0.4', // yellow
    '249, 170, 113, 0.4', // orange
    '238, 232, 169, 0.4', // pale golden rod
    '28, 148, 210, 0.4' // blue
  ];

  fetch(`${baseHref}/data_chart/${lastSegment}`)
  .then(response => response.json())
  .then(async response => {
    console.log("RESPONSE", response)
    if (response.success) {
      const getData = response.data;
      const appendData = [];
      const imageData = [];

      for (let index = 0; index < getData.length; index++) {
        const thisData = getData[index];
        let widthLabel = 200;
        let fontSize = 20;

        if (lastSegment === "junior-high-school") {
          widthLabel = 100;
          fontSize = 16;
        }

        if (lastSegment === "senior-high-school") {
          widthLabel = 100;
          fontSize = 18;
        }
        
        if (getData[index].title === 'Native Speaker') {
          widthLabel = 100;
        }

        let colorLabel = '#fff';
        if (
          getData[index].title === "HaTiQU" ||
          getData[index].title === "Fun Class" || 
          getData[index].title === "Public Speaking"
        ) {
          colorLabel = '#4D4D4D';
        }

        imageData[index] = new Image();
        imageData[index].src = thisData.image;
        const widthData = 100 / parseInt(getData.length);
        const resizeImage = await createResizedImage(thisData.image, 640, 640)

        appendData[index] = {
          value: widthData,
          name: thisData.title,
          customInfo: thisData.description,
          label: {
            formatter: '{b}',  // Display name of each segment
            color: colorLabel, // Label text color (white)
            fontSize: fontSize,
            fontWeight: '400',
            lineHeight: 24,
            letterSpacing: 2,
            width: widthLabel
          },
          itemStyle: {
            color: {
              image: resizeImage,
              repeat: 'no-repeat'
            },
            // Semi-transparent color overlay
            decal: {
              symbol: 'rect',
              symbolSize: 500,
              color: `rgba(${dataColor[index]})` // Red with 50% transparency
            }
          }
        }

        imageData[index].onload = onImageLoad(appendData);
      }
    }
  });

  window.addEventListener('resize', function() {
    chartProgramHighlights.resize(); // Adjusts chart size automatically
  });
}
