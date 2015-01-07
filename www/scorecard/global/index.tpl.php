<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>

<h1>The <?php _p($this->objScorecard->Name);?> Scorecard</h1>
<br>
<div class="scorecardnavbar"><ul class="scorecardnavbar">
<?php 
	// Display the Scorecard Navigation Menu
	$intWidth = floor(550 / count(InstituteForm::$NavScorecardArray));
	foreach (InstituteForm::$NavScorecardArray as $NavScorecardId => $strNavScorecardArray) {
		$strClassInfo = ($NavScorecardId == $this->intNavScorecardId) ? 'class="selected"' : null;
		if ($NavScorecardId == InstituteForm::NavScorecardGlobal) {
			if (QApplication::$Login->IsAdmin())
				printf('<li style="width: %spx;"><a href="%s%s/%s" %s title="%s">%s</a></li>',
				$intWidth, __SUBDIRECTORY__,$strNavScorecardArray[1],$this->objScorecard->Id, $strClassInfo, $strNavScorecardArray[0], $strNavScorecardArray[0]
				);
		} else {
			printf('<li style="width: %spx;"><a href="%s%s/%s" %s title="%s">%s</a></li>',
				$intWidth, __SUBDIRECTORY__,$strNavScorecardArray[1],$this->objScorecard->Id, $strClassInfo, $strNavScorecardArray[0], $strNavScorecardArray[0]
			);
		}
	}
?>
</ul></div>
<div style='width:960px;'>
<h2>Global Statistics</h2>
	<div style="float:left; margin-right:20px; position:relative; width:450px;">
		<h3>Total number of companies: <?php _p($this->totalScorecardCount)?></h3>
		<h3>Breakdown by Country</h3>
		<?php $this->dtgByCountry->Render();?>
		<h3>Breakdown by Industry</h3>
		<?php $this->dtgByIndustry->Render(); ?>
	</div>
	<div style="float:right; margin-left:20px; position:relative; width:450px;">
		<h3>Average KPI Globally: <?php _p($this->averageKPI)?></h3>
		<h3>Average KPI by Country</h3>
		<?php $this->dtgKPIByCountry->Render(); ?>
		<h3>Average KPI by Industry</h3>
		<?php $this->dtgKPIByIndustry->Render(); ?>
	</div>
</div>
<div style="clear:both;"></div>
<script type="text/javascript">

function DisplaySphereInvolvement(chartData) {
	var chart;
	var legend;

	// PIE CHART
    chart = new AmCharts.AmPieChart();
    chart.dataProvider = chartData;
    chart.titleField = "key";
    chart.valueField = "value";
    chart.outlineColor = "#FFFFFF";
    chart.outlineAlpha = 0.8;
    chart.outlineThickness = 1;
    chart.marginTop = 5;
    chart.marginLeft = 5;
    chart.colors = ['green','red'];
    chart.minRadius = 50;
    chart.labelRadius = 15;
    // this makes the chart 3D
    chart.depth3D = 10;
    chart.angle = 30;
    chart.addTitle("");
    chart.addTitle("Sphere Involvement Level", 14, '#000000', 0, true);

    // WRITE
    chart.write("sphereinvolvementchartdiv");
}

function DisplaySpheres(chartData) {
	var chart;

	// SERIAL CHART
    chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData;
    chart.categoryField = "sphere";
    chart.fontSize = 14;
    chart.startDuration = 1;
    chart.plotAreaFillAlphas = 0.2;
    // the following two lines makes chart 3D
    chart.angle = 30;
    chart.depth3D = 40;

    // AXES
    // category
    var categoryAxis = chart.categoryAxis;
    categoryAxis.gridAlpha = 0.2;
    categoryAxis.gridPosition = "start";
    categoryAxis.axisColor = "#DADADA";
    categoryAxis.axisAlpha = 1;
    categoryAxis.dashLength = 5;
    categoryAxis.labelRotation = 90;

    // value
    var valueAxis = new AmCharts.ValueAxis();
    valueAxis.stackType = "3d"; // This line makes chart 3D stacked (columns are placed one behind another)
    valueAxis.gridAlpha = 0.2;
    valueAxis.axisColor = "#DADADA";
    valueAxis.axisAlpha = 1;
    valueAxis.dashLength = 5;
    chart.addValueAxis(valueAxis);

    // GRAPHS         
    // first graph
    var graph1 = new AmCharts.AmGraph();
    graph1.title = "KPI Average";
    graph1.valueField = "KPIAverage";
    graph1.type = "column";
    graph1.lineAlpha = 0;
    graph1.lineColor = "#BEDF66";
    graph1.fillAlphas = 1;
    graph1.balloonText = "KPI Average Achieved in [[category]]:  [[value]]";
    graph1.colorField = "kpicolor";
    chart.addGraph(graph1);

 // second graph
    var graph2 = new AmCharts.AmGraph();
    graph2.title = "Strategy Count";
    graph2.valueField = "StrategyCount";
    graph2.type = "column";
    graph2.lineAlpha = 0;
    graph2.lineColor = "#D2CB00";
    graph2.fillAlphas = 1;
    graph2.balloonText = "Strategies in [[category]] : [[value]]";
    graph2.colorField = "strategycolor";
    chart.addGraph(graph2);
    
    chart.addTitle("Impact in Spheres Of Society", 16, '#000000', 0, true);
    chart.write("spherechartdiv");
}

function DisplayGiantInvolvement(chartData) {
	var chart;
	var legend;

	// PIE CHART
    chart = new AmCharts.AmPieChart();
    chart.dataProvider = chartData;
    chart.titleField = "key";
    chart.valueField = "value";
    chart.outlineColor = "#FFFFFF";
    chart.outlineAlpha = 0.8;
    chart.outlineThickness = 1;
    chart.marginTop = 5;
    chart.marginLeft = 5;
    chart.colors = ['green','red'];
    chart.minRadius = 50;
    chart.labelRadius = 15;
    // this makes the chart 3D
    chart.depth3D = 10;
    chart.angle = 30;
    chart.addTitle("");
    chart.addTitle("Societal Impact Involvement Level", 14, '#000000', 0, true);

    // WRITE
    chart.write("giantinvolvementchartdiv");
}
function CancelQuery() {
	var element = document.getElementById("spherechartdiv").innerHTML ="";
	var element = document.getElementById("sphereinvolvementchartdiv").innerHTML ="";
	var element = document.getElementById("giantchartdiv").innerHTML ="";
	var element = document.getElementById("giantinvolvementchartdiv").innerHTML ="";
}
function DisplayGiants(chartData) {
	var chart;

	// SERIAL CHART
    chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData;
    chart.categoryField = "giant";
    chart.fontSize = 14;
    chart.startDuration = 1;
    chart.plotAreaFillAlphas = 0.2;
    // the following two lines makes chart 3D
    chart.angle = 30;
    chart.depth3D = 40;

    // AXES
    // category
    var categoryAxis = chart.categoryAxis;
    categoryAxis.gridAlpha = 0.2;
    categoryAxis.gridPosition = "start";
    categoryAxis.axisColor = "#DADADA";
    categoryAxis.axisAlpha = 1;
    categoryAxis.dashLength = 5;
    categoryAxis.labelRotation = 90;

    // value
    var valueAxis = new AmCharts.ValueAxis();
    valueAxis.stackType = "3d"; // This line makes chart 3D stacked (columns are placed one behind another)
    valueAxis.gridAlpha = 0.2;
    valueAxis.axisColor = "#DADADA";
    valueAxis.axisAlpha = 1;
    valueAxis.dashLength = 5;
    chart.addValueAxis(valueAxis);

    // GRAPHS         
    // first graph
    var graph1 = new AmCharts.AmGraph();
    graph1.title = "KPI Average";
    graph1.valueField = "KPIAverage";
    graph1.type = "column";
    graph1.lineAlpha = 0;
    graph1.lineColor = "#BEDF66";
    graph1.fillAlphas = 1;
    graph1.balloonText = "KPI Average Achieved in [[category]]:  [[value]]";
    graph1.colorField = "kpicolor";
    chart.addGraph(graph1);

 // second graph
    var graph2 = new AmCharts.AmGraph();
    graph2.title = "Strategy Count";
    graph2.valueField = "StrategyCount";
    graph2.type = "column";
    graph2.lineAlpha = 0;
    graph2.lineColor = "#D2CB00";
    graph2.fillAlphas = 1;
    graph2.balloonText = "Strategies against [[category]] : [[value]]";
    graph2.colorField = "strategycolor";
    chart.addGraph(graph2);
    
    chart.addTitle("Societal Impact", 16, '#000000', 0, true);
    chart.write("giantchartdiv");
}
</script>

<div style="width:960px; margin-top:40px; position:relative;">
<h2>Spheres of Society and Societal Ills</h2>
<p>View the aggregated chart of Spheres Of Society and Societal Ills that Companies in the Online Scorecard are involved in.</p>
<?php $this->lstSphereSelect->RenderWithName();?>
<?php $this->btnSelectSphere->Render();?>
<?php $this->btnCancelQuery->Render();?>
<br><br>
<div id="spherechartdiv" style="width: 550px; height: 350px; float:left;"></div>
<div id="sphereinvolvementchartdiv" style="width: 350px; height: 300px; float:left;"></div>
<br>
<div id="giantchartdiv" style="width: 550px; height: 350px; float:left;"></div>
<div id="giantinvolvementchartdiv" style="width: 350px; height: 300px; float:left; margin-left:15px;"></div>
<div style="clear:both"></div>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>