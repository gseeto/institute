<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<script type="text/javascript">

function DisplayPAverageChart(chartData) {
		var chart;
		
 // RADAR CHART
    chart = new AmCharts.AmRadarChart();
    chart.dataProvider = chartData;
    chart.categoryField = "P";
    chart.startDuration = 2;
    chart.colors = ['red','blue', 'green'];
    chart.addTitle("Average Drivers of Corporate Impact (10-Ps) Results", 14, '#000000', 0, true);

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
    graph.valueField = "head";
    graph.bullet = "round";
    graph.balloonText = "[[category]] Head: [[value]]"
    chart.addGraph(graph);

    var graph2 = new AmCharts.AmGraph();
    graph2.valueField = "hands";
    graph2.bullet = "round";
    graph2.balloonText = "[[category]] Hands: [[value]]"
    chart.addGraph(graph2);

    var graph3 = new AmCharts.AmGraph();
    graph3.valueField = "heart";
    graph3.bullet = "round";
    graph3.balloonText = "[[category]] Heart: [[value]]"
    chart.addGraph(graph3);
    
    // WRITE
    chart.write("pAverageChartdiv");
}

function DisplayFAverageChart(chartData) {
	var chart;
	
// RADAR CHART
chart = new AmCharts.AmRadarChart();
chart.dataProvider = chartData;
chart.categoryField = "F";
chart.startDuration = 2;
chart.colors = ['red','blue', 'green'];
chart.addTitle("Average Drivers of Personal Impact (10-Ps) Results", 14, '#000000', 0, true);

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
graph.valueField = "head";
graph.bullet = "round";
graph.balloonText = "[[category]] Head: [[value]]"
chart.addGraph(graph);

var graph2 = new AmCharts.AmGraph();
graph2.valueField = "hands";
graph2.bullet = "round";
graph2.balloonText = "[[category]] Hands: [[value]]"
chart.addGraph(graph2);

var graph3 = new AmCharts.AmGraph();
graph3.valueField = "heart";
graph3.bullet = "round";
graph3.balloonText = "[[category]] Heart: [[value]]"
chart.addGraph(graph3);

// WRITE
chart.write("fAverageChartdiv");
}

function DisplayPTenureChart(chartData) {
	var chart;
	
// RADAR CHART
chart = new AmCharts.AmRadarChart();
chart.dataProvider = chartData;
chart.categoryField = "P";
chart.startDuration = 2;
chart.colors = ['red','blue', 'green'];
chart.addTitle("Drivers of Corporate Impact (10-Ps) By Tenure Results", 14, '#000000', 0, true);

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
graph.valueField = "zeroTothree";
graph.bullet = "round";
graph.balloonText = "[[category]] for Tenure of 0-3 years: [[value]]"
chart.addGraph(graph);

var graph2 = new AmCharts.AmGraph();
graph2.valueField = "fourToseven";
graph2.bullet = "round";
graph2.balloonText = "[[category]] for Tenure of 4-7 years: [[value]]"
chart.addGraph(graph2);

var graph3 = new AmCharts.AmGraph();
graph3.valueField = "sevenPlus";
graph3.bullet = "round";
graph3.balloonText = "[[category]] for Tenure of > 7 years: [[value]]"
chart.addGraph(graph3);

// WRITE
chart.write("pTenureChartdiv");
}

function DisplayFTenureChart(chartData) {
	var chart;
	
// RADAR CHART
chart = new AmCharts.AmRadarChart();
chart.dataProvider = chartData;
chart.categoryField = "F";
chart.startDuration = 2;
chart.colors = ['red','blue', 'green'];
chart.addTitle("Drivers of Personal Impact (10-Ps) By Tenure Results", 14, '#000000', 0, true);

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
graph.valueField = "zeroTothree";
graph.bullet = "round";
graph.balloonText = "[[category]] for Tenure of 0-3 years: [[value]]"
chart.addGraph(graph);

var graph2 = new AmCharts.AmGraph();
graph2.valueField = "fourToseven";
graph2.bullet = "round";
graph2.balloonText = "[[category]] for Tenure of 4-7 years: [[value]]"
chart.addGraph(graph2);

var graph3 = new AmCharts.AmGraph();
graph3.valueField = "sevenPlus";
graph3.bullet = "round";
graph3.balloonText = "[[category]] for Tenure of > 7 years: [[value]]"
chart.addGraph(graph3);

// WRITE
chart.write("fTenureChartdiv");
}

function DisplayPTitleChart(chartData) {
	var chart;
	
// RADAR CHART
chart = new AmCharts.AmRadarChart();
chart.dataProvider = chartData;
chart.categoryField = "P";
chart.startDuration = 2;
chart.colors = ['red','blue', 'green'];
chart.addTitle("Drivers of Corporate Impact (10-Ps) By Title Results", 14, '#000000', 0, true);

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
graph.valueField = "executive";
graph.bullet = "round";
graph.balloonText = "[[category]] for Executives: [[value]]"
chart.addGraph(graph);

var graph2 = new AmCharts.AmGraph();
graph2.valueField = "manager";
graph2.bullet = "round";
graph2.balloonText = "[[category]] for Managers: [[value]]"
chart.addGraph(graph2);

var graph3 = new AmCharts.AmGraph();
graph3.valueField = "other";
graph3.bullet = "round";
graph3.balloonText = "[[category]] for Other Employees: [[value]]"
chart.addGraph(graph3);

// WRITE
chart.write("pTitleChartdiv");
}

function DisplayFTitleChart(chartData) {
	var chart;
	
// RADAR CHART
chart = new AmCharts.AmRadarChart();
chart.dataProvider = chartData;
chart.categoryField = "F";
chart.startDuration = 2;
chart.colors = ['red','blue', 'green'];
chart.addTitle("Drivers of Personal Impact (10-Fs) By Title Results", 14, '#000000', 0, true);

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
graph.valueField = "executive";
graph.bullet = "round";
graph.balloonText = "[[category]] for Executives: [[value]]"
chart.addGraph(graph);

var graph2 = new AmCharts.AmGraph();
graph2.valueField = "manager";
graph2.bullet = "round";
graph2.balloonText = "[[category]] for Managers: [[value]]"
chart.addGraph(graph2);

var graph3 = new AmCharts.AmGraph();
graph3.valueField = "other";
graph3.bullet = "round";
graph3.balloonText = "[[category]] for Other Employees: [[value]]"
chart.addGraph(graph3);

// WRITE
chart.write("fTitleChartdiv");
}
</script>
<h2>Leadership Readiness Group Aggregation Results for <?php _p($this->objGroupAssessment->KeyCode)?></h2>
<h3>List of Users within this Leadership Readiness Assessment Group:</h3>
<?php $this->dtgUsers->Render(); ?>
<br>
<?php $this->btnSubmit->Render();?>
<br><br>
<?php $this->lblDebug->Render(); ?>

<div id="tabs">
 <ul>
    <li><a href="#tabs-1">Average</a></li>
    <li><a href="#tabs-2">Title</a></li>
    <li><a href="#tabs-3">Tenure</a></li>
  </ul>
  <div id="tabs-1">
    <h3>Average Leadership Readiness Assessment</h3> 
   <div id="pAverageChartdiv" style="width:700px; height:500px;"></div>
   <div id="fAverageChartdiv" style="width:700px; height:500px;"></div>
  </div>
  <div id="tabs-2">
    <h3>By Title Leadership Readiness Assessment</h3> 
   <div id="pTitleChartdiv" style="width:700px; height:500px;"></div>
   <div id="fTitleChartdiv" style="width:700px; height:500px;"></div>
  </div>
  <div id="tabs-3">
    <h3>By Tenure Leadership Readiness Assessment</h3> 
   <div id="pTenureChartdiv" style="width:700px; height:500px;"></div>
   <div id="fTenureChartdiv" style="width:700px; height:500px;"></div>
  </div>
  </div>


<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
