<html>
<head>
</head>
<body>
<canvas id="graphSpace" width="800" height="400">
</canvas>
</body>
</html>
<script>var graphCanvas = document.getElementById('graphSpace');
// Ensure that the element is available within the DOM
if (graphCanvas && graphCanvas.getContext) {
  // Open a 2D context within the canvas
  var context = graphCanvas.getContext('2d');

  // Bar chart data
  var data = new Array(10);
  data[0] = "apples,200";
  data[1] = "oranges,120";
  data[2] = "bananas,80";
  data[3] = "kiwis,230";
  data[4] = "tangarines,140";
  data[5] = "tangarines,40";
  data[6] = "tangarines,240";
  data[7] ="a,10";
  data[8] ="a,20";
  data[9] ="";
 

  // Draw the bar chart
  drawBarChart(context, data, 50, 50, (graphCanvas.height -20), 20);
}
function drawBarChart(context, data, startX, barWidth, chartHeight, markDataIncrementsIn) {
  // Draw the x and y axes
  context.lineWidth = "1.0";
  var startY = 380;
  drawLine(context, startX, startY, startX, 30); 
  drawLine(context, startX, startY, 560, startY);			
  context.lineWidth = "0.0";
  var maxValue = 0;
  for (var i=0; i < data.length; i++) {
    // Extract the data
    var values = data[i].split(",");
    var name = values[0];
    var height = parseInt(values[1]);
    if (parseInt(height) > parseInt(maxValue)) maxValue = height;
	
    // Write the data to the chart
    context.fillStyle = "#b90000";
    drawRectangle(context,startX + (i * barWidth) + i,(chartHeight - height),barWidth,height,true);
	
    // Add the column title to the x-axis
    context.textAlign = "left";
    context.fillStyle = "#000";
    context.fillText(name, startX + (i * barWidth) + i, chartHeight + 10, 200);		
  }
  // Add some data markers to the y-axis
  var numMarkers = Math.ceil(maxValue / markDataIncrementsIn);
  context.textAlign = "right";
  context.fillStyle = "#000";
  var markerValue = 0;
  for (var i=0; i < numMarkers; i++) {		
    context.fillText(markerValue, (startX - 5), (chartHeight - markerValue), 50);
    markerValue += markDataIncrementsIn;
  }
}
// drawLine - draws a line on a canvas context from the start point to the end point 
function drawLine(contextO, startx, starty, endx, endy) {
  contextO.beginPath();
  contextO.moveTo(startx, starty);
  contextO.lineTo(endx, endy);
  contextO.closePath();
  contextO.stroke();
}

// drawRectangle - draws a rectangle on a canvas context using the dimensions specified
function drawRectangle(contextO, x, y, w, h, fill) {			
  contextO.beginPath();
  contextO.rect(x, y, w, h);
  contextO.closePath();
  contextO.stroke();
  if (fill) contextO.fill();
}
</script>