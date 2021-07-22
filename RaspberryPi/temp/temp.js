config = {

  data: data,
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Humidity', 'Temperature'],
  fillOpacity: 0.6,
  behaveLikeLine: true,
  //hideHover: true,
  parseTime: false,
  resize: false,
  pointFillColors:['#ffffff'],
  pointStrokeColors: ['black'],
  lineColors:['gray','red']
};

config.element = 'line-chart';
Morris.Line(config);