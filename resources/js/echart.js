import * as echarts from 'echarts/core';
import { PieChart } from 'echarts/charts';
import { TooltipComponent, LegendComponent } from 'echarts/components';
import { CanvasRenderer } from 'echarts/renderers';
import { TitleComponent } from 'echarts/components';

const getUriPath = window.location.pathname;
const lastSegment = getUriPath.split("/").filter(Boolean).pop();
echarts.use([PieChart, TooltipComponent, LegendComponent, CanvasRenderer, TitleComponent]);

const chartProgramHighlightsDom = document.getElementById('chart-program-highlights');
if (chartProgramHighlightsDom) {
  const chartProgramHighlights = echarts.init(chartProgramHighlightsDom);

  function createResizedImage(src, width, height) {
    return new Promise((resolve, reject) => {
      const img = new Image();
      img.crossOrigin = 'Anonymous';
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

  let imagesLoaded = 0;
  function onImageLoad(appendData) {
    imagesLoaded++;
    if (imagesLoaded > 1) {
      const option = {
        title: {
          text: 'Program Highlights',
          left: '50%',
          top: '50%',
          textAlign: 'center',
          textVerticalAlign: 'middle',
          textStyle: { fontSize: 24, fontWeight: '400', color: '#1C94D2', lineHeight: 32, width: 120, overflow: 'break' },
        },
        tooltip: {
          trigger: 'item',
          formatter: params => `<div style="max-width: 200px; white-space: wrap;">${params.data.customInfo}</div>`,
          backgroundColor: '#fff',
          borderColor: '#ccc',
          borderWidth: 1,
          textStyle: { color: '#333', fontSize: 16, fontWeight: '400' },
          extraCssText: 'box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);',
        },
        series: [{
          type: 'pie',
          radius: ['35%', '70%'],
          avoidLabelOverlap: false,
          label: { show: true, position: 'inside', overflow: 'break' },
          labelLine: { show: false },
          data: appendData
        }]
      };
      chartProgramHighlights.setOption(option);
    }
  }

  const dataColor = [
    '0, 177, 219, 0.4', '55, 225, 172, 0.4', '0, 203, 210, 0.4',
    '161, 240, 136, 0.4', '249, 248, 113, 0.4', '249, 170, 113, 0.4',
    '238, 232, 169, 0.4', '28, 148, 210, 0.4'
  ];

  fetch(`${baseHref}/data_chart/${lastSegment}`)
    .then(response => response.json())
    .then(async response => {
      if (response.success) {
        const getData = response.data;
        const appendData = [];
        const imageData = [];

        for (let index = 0; index < getData.length; index++) {
          const thisData = getData[index];
          let widthLabel = 200;
          let fontSize = 20;

          if (lastSegment === "junior-high-school") { widthLabel = 100; fontSize = 16; }
          if (lastSegment === "senior-high-school") { widthLabel = 100; fontSize = 18; }
          if (getData[index].title === 'Native Speaker') { widthLabel = 100; }
          let colorLabel = '#fff';
          if (["HaTiQU", "Fun Class", "Public Speaking"].includes(getData[index].title)) { colorLabel = '#4D4D4D'; }

          imageData[index] = new Image();
          imageData[index].src = thisData.image;
          const resizeImage = await createResizedImage(thisData.image, 640, 640);

          appendData[index] = {
            value: 100 / parseInt(getData.length),
            name: thisData.title,
            customInfo: thisData.description,
            label: { formatter: '{b}', color: colorLabel, fontSize, fontWeight: '400', lineHeight: 24, letterSpacing: 2, width: widthLabel },
            itemStyle: {
              color: { image: resizeImage, repeat: 'no-repeat' },
              decal: { symbol: 'rect', symbolSize: 500, color: `rgba(${dataColor[index]})` }
            }
          };

          imageData[index].onload = () => onImageLoad(appendData);
        }
      }
    });

  window.addEventListener('resize', () => {
    chartProgramHighlights.resize();
  });
}
