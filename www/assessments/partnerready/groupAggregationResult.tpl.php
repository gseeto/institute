<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<script type="text/javascript">

function DisplayAggregateChart(chartData) {
		var chart;
		
 // RADAR CHART
    chart = new AmCharts.AmRadarChart();
    chart.dataProvider = chartData;
    chart.categoryField = "P";
    chart.startDuration = 2;
    chart.colors = ['red','blue'];
    chart.addTitle("Aggregate of Partnering Readiness Assessments", 14, '#000000', 0, true);

    // VALUE AXIS
    var valueAxis = new AmCharts.ValueAxis();
    valueAxis.axisAlpha = 0.15;
    valueAxis.minimum = 0;
    valueAxis.dashLength = 3;
    valueAxis.axisTitleOffset = 20;
    valueAxis.gridCount = 5;
    chart.addValueAxis(valueAxis);

    // GRAPH
    var graph = new AmCharts.AmGraph();
    graph.valueField = "importance";
    graph.bullet = "round";
    graph.balloonText = "[[category]] Importance: [[value]]"
    chart.addGraph(graph);

    var graph2 = new AmCharts.AmGraph();
    graph2.valueField = "performance";
    graph2.bullet = "round";
    graph2.balloonText = "[[category]] Performance: [[value]]"
    chart.addGraph(graph2);
   
    
    // WRITE
    chart.write("AggregateChartdiv");
}

function DisplayImportanceChart(chartData) {
	var chart;
	
	 var user1 =chartData[0].userName1;
	 var user2 =chartData[0].userName2;
	 
// RADAR CHART
chart = new AmCharts.AmRadarChart();
chart.dataProvider = chartData;
chart.categoryField = "P";
chart.startDuration = 2;
chart.colors = ['red','blue', 'green'];
chart.addTitle("Gaps in Importance in Partnering Readiness Assessments", 14, '#000000', 0, true);

// VALUE AXIS
var valueAxis = new AmCharts.ValueAxis();
valueAxis.axisAlpha = 0.15;
valueAxis.minimum = 0;
valueAxis.dashLength = 3;
valueAxis.axisTitleOffset = 20;
valueAxis.gridCount = 5;
chart.addValueAxis(valueAxis);

// GRAPH
var graph = new AmCharts.AmGraph();
graph.valueField = "user1";
graph.bullet = "round";
graph.balloonText = "[[category]] "+user1+ ": [[value]]"; 
chart.addGraph(graph);

var graph2 = new AmCharts.AmGraph();
graph2.valueField = "user2";
graph2.bullet = "round";
graph2.balloonText = "[[category]] "+user2+ ": [[value]]"; 
chart.addGraph(graph2);

// WRITE
chart.write("ImportanceGapChartdiv");
}

function DisplayWillingnessChart(chartData) {
	var chart;
	var user1 =chartData[0].userName1;
	var user2 =chartData[0].userName2;
	 
// RADAR CHART
chart = new AmCharts.AmRadarChart();
chart.dataProvider = chartData;
chart.categoryField = "P";
chart.startDuration = 2;
chart.colors = ['red','blue', 'green'];
chart.addTitle("Gaps in Willingness in Partnering Readiness Assessments", 14, '#000000', 0, true);

// VALUE AXIS
var valueAxis = new AmCharts.ValueAxis();
valueAxis.axisAlpha = 0.15;
valueAxis.minimum = 0;
valueAxis.dashLength = 3;
valueAxis.axisTitleOffset = 20;
valueAxis.gridCount = 5;
chart.addValueAxis(valueAxis);

// GRAPH
var graph = new AmCharts.AmGraph();
graph.valueField = "user1";
graph.bullet = "round";
graph.balloonText = "[[category]] "+user1+ ": [[value]]"; 
chart.addGraph(graph);

var graph2 = new AmCharts.AmGraph();
graph2.valueField = "user2";
graph2.bullet = "round";
graph2.balloonText = "[[category]] "+user2+ ": [[value]]"; 
chart.addGraph(graph2);

// WRITE
chart.write("WillingnessGapChartdiv");
}


</script>
<h2>Partnering Readiness Group Aggregation Results for <?php _p($this->objGroupAssessment->KeyCode)?></h2>
<h3>List of Users within this Partnering Readiness Assessment Group:</h3>
<?php $this->dtgUsers->Render(); ?>
<br>
<?php $this->btnSubmit->Render();?>
<br><br>
<?php $this->lblDebug->Render(); ?>

<div id="tabs">
 <ul>
    <li><a href="#tabs-1">Aggregate</a></li>
    <li><a href="#tabs-2">Importance Gaps</a></li>
    <li><a href="#tabs-3">Willingness Gaps</a></li>
  </ul>
  <div id="tabs-1">
    <h3>Aggregate of Partnering Readiness Assessments</h3> 
   <div id="AggregateChartdiv" style="width:700px; height:500px;"></div>
  </div>
  <div id="tabs-2">
    <h3>Gaps in Importance in Partnering Readiness Assessments</h3> 
   <div id="ImportanceGapChartdiv" style="width:700px; height:500px;"></div>
  </div>
  <div id="tabs-3">
    <h3>Gaps in Willingness in Partnering Readiness Assessment</h3> 
   <div id="WillingnessGapChartdiv" style="width:700px; height:500px;"></div>
  </div>
  </div>


<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
