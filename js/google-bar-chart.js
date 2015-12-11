google.load("visualization", "1.1", {packages:["bar"]});

var CHART_HAS_CHANGED = 0;
var chartID = 'chart-bar-skillset';

var data = [];

var options = {
  animation: {
    duration: 10000,
    startup: true
  },
  backgroundColor: 'transparent',
  bars: 'horizontal', // Required for Material Bar Charts.
  colors: ['#006699'],
  hAxis: {
    // format: 'percent'
  },
};

var skillset = [
  [ // on load
    ['Skill',      'Percent'],
    ['PHP',        0],
    ['MySQL',      0],
    ['JavaScript', 0],
    ['jQuery',     0]
  ],
  [ // on change
    ['Skill',      'Percent'],
    ['PHP',        80],
    ['MySQL',      85],
    ['JavaScript', 60],
    ['jQuery',     70]
  ]
];

var chart;

function drawChart( iteration ){
  var deferred = $.Deferred();
  iteration = ( parseInt( iteration ) ) ? 1 : 0;
  console.log( iteration );
  google.visualization.events.addListener(chart, 'ready', function(){});
  // chart.draw(data, options);
  chart.draw(data[iteration], google.charts.Bar.convertOptions( options ));
  return deferred.resolve().promise();
}

function initGoogleChart(){
  var deferred = $.Deferred();
  chart = new google.charts.Bar(document.getElementById( chartID ));
  $.each(skillset, function( i, v ){
    data[i] = google.visualization.arrayToDataTable( v );
  });
  return deferred.resolve().promise();
}


$(document).ready(function(){

  $.when( initGoogleChart() )
   .then( drawChart() )
   .then( checkIfChartIsSeen() );
});
$(window).scroll( checkIfChartIsSeen );


function checkIfChartIsSeen(){
  if( !CHART_HAS_CHANGED ){
    // get chart div
    var chart = $('#'+chartID);
    // chart lives between...
    var chartTop    = chart.offset().top;
    var chartBottom = chartTop + chart.innerHeight;
    // window is showing...
    var windowTop    = window.pageYOffset;
    var windowBottom = windowTop + window.innerHeight;

    if(
      (chartTop > windowTop && chartTop < windowBottom) ||
      (chartBottom > windowTop && chartBottom < windowBottom)
    ){
      // change the chart values to trigger chart animation
      CHART_HAS_CHANGED = 1;
      drawChart( 1 );
    }
  }
}
