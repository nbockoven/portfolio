google.load("visualization", "1.1", {packages:["bar"]});

var CHART_HAS_CHANGED = 0;
var chartID = 'chart-bar-skillset';

var data = [];

var options = {
  animation: {
    duration: 1000,
    easing: 'out',
    startup: false
  },
  backgroundColor: 'transparent',
  bars: 'horizontal', // Required for Material Bar Charts.
  colors: ['#006699'],
  hAxis: {
    // format: 'percent',
    minValue:0, maxValue:100
  }
};

var skillset = [
  [ // on load
    ['Skill',      'Proficiency'],
    ['PHP',        0],
    ['MySQL',      0],
    ['JavaScript', 0],
    ['jQuery',     0]
  ],
  [ // on change
    ['Skill',      'Proficiency'],
    ['PHP',        80],
    ['MySQL',      100],
    ['JavaScript', 60],
    ['jQuery',     70]
  ]
];

var THECHART;

function drawChart(){
  var deferred = $.Deferred();
  if( data[CHART_HAS_CHANGED] ){
    console.log( "showing iteration = "+CHART_HAS_CHANGED );
    // THECHART.draw(data[CHART_HAS_CHANGED], options);
    THECHART.draw(data[0], google.charts.Bar.convertOptions( options ));
  }

  return deferred.resolve().promise();
}

function initGoogleChart(){
  var deferred = $.Deferred();
  THECHART = new google.charts.Bar(document.getElementById( chartID ));
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
    var okay = $('#'+chartID);
    // chart lives between...
    var chartTop    = okay.offset().top;
    var chartBottom = chartTop + okay.innerHeight;
    // window is showing...
    var windowTop    = window.pageYOffset;
    var windowBottom = windowTop + window.innerHeight;

    if(
      (chartTop > windowTop && chartTop < windowBottom) ||
      (chartBottom > windowTop && chartBottom < windowBottom)
    ){
      // change the chart values to trigger chart animation
      CHART_HAS_CHANGED = 1;
      data[0].setValue(0, 1, skillset[1][1][1]);
      drawChart();
    }
  }
}
