<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {

var dataPoints = [];

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title: {
    text: "Sales prediction Data"
  },
  axisY: {
    title: "Units",
    titleFontSize: 24,
    includeZero: true
  },
  data: [{
    type: "column",
    yValueFormatString: "#,### Units",
    dataPoints: dataPoints
  }]
});

function addData(data) {
  for (var i = 0; i < data.length; i++) {
    dataPoints.push({
      x: new Date(data[i].Date),
      y: data[i].pred_value
    });
    console.log(data[i].pred_value);
  }
  chart.render();

}

$.getJSON("http://localhost:5002/api", addData);

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>