google.load("visualization", "1", {packages:["corechart"]});

google.setOnLoadCallback( drawChart );

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Element", "Density", { role: "style" } ],

    ["PHP", 78.94, "#006699"],
    ["MySQL", 60.49, "#006699"],
    ["JavaScript", 20.30, "#006699"],
    ["jQuery", 30.45, "color: #006699"],
    ["AngularJS", 10.45, "color: #006699"],
  ]);

  var view = new google.visualization.DataView(data);
  view.setColumns(
    [
      0,
      1,
      {
        calc: "stringify",
        sourceColumn: 1,
        type: "string",
        role: "annotation"
      },
      2
    ]
  );

  var options = {
    backgroundColor: 'transparent',
    legend: { position: "none" },
  };

  var chart = new google.visualization.BarChart(document.getElementById("chart-bar-skillset"));

  chart.draw( view, options );
}
